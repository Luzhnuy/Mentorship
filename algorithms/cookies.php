<?php

/*
 * Complete the 'cookies' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER k
 *  2. INTEGER_ARRAY A
 */

function getSmallestValues($A) {
    return [$A[0], $A[1]];
}

function removeElements(&$A, $smallestArr) {
    $counter = 0;
    foreach ($A as $key=>$value) {
        if (in_array($value, $smallestArr)) {
            if ($counter >= 2) {
                break;
            }
            unset($A[$key]);
            $counter++;
        }
    }
}


function cookies($k, $A) {
    $counter = 0;
    sort($A);
    while ($A[0] < $k) {
        if (count($A) <= 2) {
            return -1;
        }
        $smallestEls = [$A[0], $A[1]];
        removeElements($A, $smallestEls);
        $value = $smallestEls[0] + $smallestEls[0] * $smallestEls[1];
        $A = array($value) + $A;
        sort($A);
        $counter++;
    }
    print_r($A);
    return $counter;

}

//$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$n = intval($first_multiple_input[0]);

$k = intval($first_multiple_input[1]);

$A_temp = rtrim(fgets(STDIN));

$A = array_map('intval', preg_split('/ /', $A_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = cookies($k, $A);

echo $result;
//fwrite($fptr, $result . "\n");
//
//fclose($fptr);
