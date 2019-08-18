<?php

function insert_sort($arr)
{

    $count = count($arr);

    for ($i = 1; $i < $count; $i++) {

        $tmp = $arr[$i];

        $j = $i - 1;

        while ($arr[$j] > $tmp) {

            $arr[$j + 1] = $arr[$j];

            $arr[$j] = $tmp;

            $j--;

        }

    }

    return $arr;

}