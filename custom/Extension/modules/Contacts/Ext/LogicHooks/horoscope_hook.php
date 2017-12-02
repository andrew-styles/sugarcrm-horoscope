<?php
/**
 * Horoscope sign logic definition
 */
$hook_version = 1;

$hook_array['before_save'][] = array(
    99,
    'Sets Zodiac Sign based on date of birth',
    'custom/include/informed-dna/horoscope_hook.php',
    'HoroscopeHook',
    'beforeSave',
);
