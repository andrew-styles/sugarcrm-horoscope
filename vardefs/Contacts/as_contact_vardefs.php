<?php

$dictionary['Contact']['fields']['date_of_birth'] = !empty($dictionary['Contact']['fields']['date_of_birth']) ? $dictionary['Contact']['fields']['date_of_birth'] : array();
$dictionary['Contact']['fields']['horoscope_sign'] = !empty($dictionary['Contact']['fields']['horoscope_sign']) ? $dictionary['Contact']['fields']['horoscope_sign'] : array();

$dictionary['Contact']['fields']['date_of_birth'] = array_merge(
        [
    'name' => 'date_of_birth',
    'type' => 'date',
    'vname' => 'LBL_DATE_OF_BIRTH',
    'len' => 10,
        ], $dictionary['Contact']['fields']['date_of_birth']
);

$dictionary['Contact']['fields']['horoscope_sign'] = array_merge(
        [
    'name' => 'horoscope_sign',
    'type' => 'enum',
    'vname' => 'LBL_HOROSCOPE_SIGN',
    'options' => 'horoscope_sign_list',
    'len' => 100,
        ], $dictionary['Contact']['fields']['horoscope_sign']
);
