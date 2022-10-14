<?php
$array = [
    ['id' => 1, 'date' => "12.01.2020", 'name' => "test1"],
    ['id' => 2, 'date' => "02.05.2020", 'name' => "test2"],
    ['id' => 4, 'date' => "08.03.2020", 'name' => "test4"],
    ['id' => 1, 'date' => "22.01.2020", 'name' => "test1"],
    ['id' => 2, 'date' => "11.11.2020", 'name' => "test4"],
    ['id' => 3, 'date' => "06.06.2020", 'name' => "test3"],
];

$uniqValuesArray = [];
$column = 'id';
$tmp = array_filter($array, fn($a) => key_exists($column, $a));
$tmp = array_map(fn($a) => $a[$column], $tmp);
$uniqValuesColumn = array_unique($tmp);
array_walk($uniqValuesColumn, function ($v, $k) use (&$uniqValuesArray, $array) {
    $uniqValuesArray[$k] = $array[$k];
});
//print_r($uniqValuesArray);

$sortedArray = [];
$column = 'date';
$tmp = array_map(fn($a) => $a[$column], $uniqValuesArray);
uasort($tmp, 'strnatcmp');
array_walk($tmp, function ($v, $k) use (&$sortedArray, $uniqValuesArray) {
    $sortedArray[$k] = $uniqValuesArray[$k];
});
//print_r($sortedArray);

$result = [];
$column = 'id';
$value = '2';
$result = array_filter($array, fn($a) => $a[$column] == $value);
//print_r($result);

$result = [];
$pattern = ['name' => 'id'];
array_walk($uniqValuesArray, function ($v) use (&$result, $pattern) {
    $keyName = key($pattern);
    $valueName = $pattern[$keyName];
    $result[$v[$keyName]] = $v[$valueName];
});
print_r($result);
