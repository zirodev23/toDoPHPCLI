<?php

// $ary = array();
// parasts indeksēts masīvs
$ary = ["asd", "asd", "asd"];

// divdimensionāls masīvs
$md2ary = [
    ["asd", 34, false],
    ["qwe", 12, true],
    ["zxc", 0, false]
];

// piekļūstam 2D masīva elementiem
// var_dump($md2ary[0][0]);
// echo $md2ary[0][0];

foreach($md2ary as $ary) {
    // var_dump($ary); // $ary ir masīvs
    foreach ($ary as $element) {
        // echo $element . "\n";
    }
}


$md2aryAssoc = [
    [
        'name' => 'Aldis',
        'age' => 35,
        'isAdmin' => true
    ],
    [
        'name' => 'Kristīne',
        'age' => 12,
        'isAdmin' => false
    ]
];

// izprintēt katra lietotāja datus ar foreach


var_dump($ary);
unset($ary[0]);
var_dump($ary);