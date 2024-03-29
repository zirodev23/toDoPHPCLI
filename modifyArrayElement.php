<?php

function findElementById(&$array, $id) {
    foreach ($array as &$element) {
        if ($element['id'] == $id) {
            return $element;
        }
    }
    unset($element); // Unset the reference variable after the loop
    return null;
}

// Example usage:
$myArray = [
    ['id' => 1, 'name' => 'John'],
    ['id' => 2, 'name' => 'Jane'],
    ['id' => 3, 'name' => 'Doe']
];

$desiredId = 2;
$element = findElementById($myArray, $desiredId);
if ($element !== null) {
    $element['name'] = 'New Name'; // Modify the found element // !!! not working
}

print_r($myArray); // Check the modified array


// function findElementById(&$array, $id) {
//     foreach ($array as $key => $element) {
//         if ($element['id'] == $id) {
//             $array[$key]['name'] = 'New Name'; // Modify the element directly
//             return $array[$key];
//         }
//     }
//     return null;
// }

// // Example usage:
// $myArray = [
//     ['id' => 1, 'name' => 'John'],
//     ['id' => 2, 'name' => 'Jane'],
//     ['id' => 3, 'name' => 'Doe']
// ];

// $desiredId = 2;
// $element = findElementById($myArray, $desiredId);

// print_r($myArray); // Check the modified array
