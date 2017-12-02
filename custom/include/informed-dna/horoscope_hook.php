<?php

/**
 * Horoscope sign Logic Hook file
 *
 */
require_once 'custom/include/informed-dna/horoscope-helper/horoscopeHelper.php';

/**
 * Horoscope sign Logic hook class. Can be called by many module. Expand via switch
 *
 */
class HoroscopeHook {

    /**
     * 
     * @global type $log
     * @param type $bean Sugar Bean
     * @param type $event Hook event type
     * @param type $args
     */
    public function beforeSave($bean, $event, $args) {
        global $log;
        $log->fatal("horoscope hook");
        switch ($bean->module_dir) {
            case 'Contacts':
                $bean->horoscope_sign = HoroscopeHelper::getSign($bean->date_of_birth);
                break;
            default:
                break;
        }
    }

}
