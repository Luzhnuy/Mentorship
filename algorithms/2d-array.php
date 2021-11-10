<?php

/*
 * Complete the 'hourglassSum' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts 2D_INTEGER_ARRAY arr as parameter.
 */

function hourglassSum($arr) {
    $max_sum = 0;
    for ($i = 0; $i < (count($arr) - 2); $i++) {
        for ($j = 0; $j < (count($arr[$i]) - 2); $j++) {

            $sum = ($arr[$i][$j] + $arr[$i][$j + 1] +
                    $arr[$i][$j + 2]) +
                ($arr[$i + 1][$j + 1]) +
                ($arr[$i + 2][$j] +
                    $arr[$i + 2][$j + 1] +
                    $arr[$i + 2][$j + 2]);
            $max_sum = max($max_sum, $sum);

        }
    }
    return $max_sum;
}

$fptr = fopen('2d-array.txt', "w");

$arr = array();


for ($i = 0; $i < 6; $i++) {
    $arr_temp = rtrim(fgets(STDIN));

    $arr[] = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));
}

$result = hourglassSum($arr);

print_r($result);

fwrite($fptr, $result . "\n");

fclose($fptr);
