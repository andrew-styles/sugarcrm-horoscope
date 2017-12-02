<?php

class HoroscopeHelper {
    
    
    public static function getSign($date) {
        global $log;
        if (empty($date)) {
            return "";
        }
        if (is_string($date)) {
            $date = self::dateFromString($date);
        }
        if (!$date instanceof DateTime) {
            $log->fatal("[HoroscopeHelper] invalid date: " . print_r($date, true));
            return "";
        } 
        return self::_getSign($date);
    }
    
    protected static function _getSign($date) {
        $month_day = $date->format('m-d');
        switch ($month_day) {
            case ($month_day >= "03-21" && $month_day <= "04-19"):
                return "Aries";
            case ($month_day >= "04-20" && $month_day <= "05-20"):
                return "Taurus";
            case ($month_day >= "05-21" && $month_day <= "06-20"):
                return "Gemini";
            case ($month_day >= "06-21" && $month_day <= "07-22"):
                return "Cancer";
            case ($month_day >= "07-23" && $month_day <= "08-22"):
                return "Leo";
            case ($month_day >= "08-23" && $month_day <= "09-22"):
                return "Virgo";
            case ($month_day >= "09-23" && $month_day <= "10-22"):
                return "Libra";
            case ($month_day >= "10-23" && $month_day <= "11-21"):
                return "Scorpio";
            case ($month_day >= "11-22" && $month_day <= "12-21"):
                return "Sagittarius";
            case (($month_day >= "12-22" && $month_day <= "12-31") || ($month_day >= "01-01" && $month_day <= "01-19")):
                return "Capricorn";
            case ($month_day >= "01-20" && $month_day <= "02-18"):
                return "Aquarius";
            case ($month_day >= "02-19" && $month_day <= "03-20"):
                return "Pisces";
            default: 
                return "";
        }
    }
    
    protected static function dateFromString($date_string) {
        return DateTime::createFromFormat('Y-m-d', $date_string);
    }
}