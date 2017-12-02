/*
 * Your installation or use of this SugarCRM file is subject to the applicable
 * terms available at
 * http://support.sugarcrm.com/Resources/Master_Subscription_Agreements/.
 * If you do not agree to all of the applicable terms or do not have the
 * authority to bind the entity as an authorized representative, then do not
 * install or use this SugarCRM file.
 *
 * Copyright (C) SugarCRM Inc. All rights reserved.
 */

({
    extendsFrom: 'RecordView',

    /**
     * @inheritdoc
     */
    initialize: function (options) {
        var self = this;
        this.plugins = _.union(this.plugins || [], ['HistoricalSummary']);
        this._super('initialize', [options]);

        this.context.on('button:search_google:click', this.searchGoogle, this);
        this.model.once('sync', function () {
            self.model.on('change:date_of_birth', self.getSign.bind(self));
        }, this);
    },

    /**
     * Gets and sets the horoscope sign based on date_of_birth
     * @returns {undefined}
     */
    getSign: function () {
        var dob = this.model.get('date_of_birth'),
                self = this;
        if (dob) {
            App.api.call('fetch', App.api.buildURL('horoscope', dob), {}, {
                success: function (data) {
                    self.model.set('horoscope_sign', data.sign);
                }
            });
        } else {
            this.model.set('horoscope_sign', '');
        }
    },
    /**
     * Opens new window / tab (browser dependent that is a google search of the contact name
     * @returns {undefined}
     */
    searchGoogle: function () {
        window.open('https://www.google.com/search?q=' + (this.model.get('first_name') ? this.model.get('first_name') + '+' : '') + this.model.get('last_name'));
    }
})
