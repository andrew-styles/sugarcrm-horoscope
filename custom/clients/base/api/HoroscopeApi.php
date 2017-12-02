<?php

/**
 * API endpoint for retrieving Horoscope sign based on date
 */
require_once 'custom/include/informed-dna/horoscope-helper/horoscopeHelper.php';

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

/**
 * API class for retrieving Horoscope sign based on date
 */
class HoroscopeApi extends SugarApi {

    protected static $logOn = true;

    /**
     * Logs the given message
     * @global type $log
     * @param type $message
     * @return boolean
     */
    protected static function log($message) {
        if (!self::$logOn) {
            return false;
        }
        global $log;
        $trace = debug_backtrace();
        $log->fatal("[" . __CLASS__ . "][{$trace[1]['function']}] {$message}");
        return true;
    }

    /**
     * Registers the endpoint 
     * @return array
     */
    public function registerApiRest() {

        $horoscopeApi = [
            'getSign' => [
                'reqType' => 'GET',
                'path' => ['horoscope', '?'],
                'pathVars' => ['horoscope', 'dob'],
                'method' => 'getSign',
                'shortHelp' => 'Gets the horoscope sign for the given date',
                'longHelp' => '',
            ],
        ];

        return $horoscopeApi;
    }

    /**
     * Returns the zodiac sign based on date
     * @param type $api
     * @param type $args
     * @return string Zodiac sign
     */
    public function getSign($api, $args) {
        $dob = empty($args['dob']) ? null : $args['dob'];
        self::log("dob: {$dob}");
        $ret = [
            'sign' => '',
        ];
        if (empty($dob)) {
            return $ret;
        }
        $ret['sign'] = HoroscopeHelper::getSign($dob);
        return $ret;
    }

}
