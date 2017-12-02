<?php

/**
 * Adds the Search Google button to the Contacts Record View
 */
foreach ($viewdefs['Contacts']['base']['view']['record']['buttons'] as &$button) {
    if ($button['name'] === 'main_dropdown') {
        array_splice($button['buttons'], 2, 0, [
            [
                'type' => 'rowaction',
                'event' => 'button:search_google:click',
                'name' => 'search_google',
                'label' => 'LBL_BUTTON_SEARCH_CONTACT_ON_GOOGLE',
                'acl_action' => 'view',
            ]
        ]);
    }
}