<?php
/*
* Complete the 'getMax' function below.
*
* The function is expected to return an INTEGER_ARRAY.
* The function accepts STRING_ARRAY operations as parameter.
*/

function getMax($operations) {
    $stack = [];
    $most = [];
    $x = (int) $operations[0];
    $v = 0;
    if (count($operations) > 1) {
        $v = (int) $operations[1];
    }
    if ($x == 1) {
        array_push($stack, $v);
        if ($most || array_slice($most, -1) <= $v) {
            array_push($most, $v);
        }
    } else if ($x == 2){
        $v = array_pop($stack);
        if (array_slice($most, -1) == $v) {
            array_pop($most);
        }
    } else {
        return array_slice($most, -1);
    }


}


$ops = array();

$n = intval(trim(fgets(STDIN)));

for ($i = 0; $i < $n; $i++) {
$ops_item = rtrim(fgets(STDIN), "\r\n");
$ops[] = $ops_item;
}

$res = getMax($ops);

print_r($res);
