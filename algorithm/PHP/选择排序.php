<?php

function select_sort($arr)
{

    $count = count($arr);

    for ($i = 0; $i < $count; $i++) {

        $k = $i;

        for ($j = $i + 1; $j < $count; $j++) {

            if ($arr[$k] > $arr[$j]) $k = $j;

        }

        if ($k != $i) {

            $tmp = $arr[$i];

            $arr[$i] = $arr[$k];

            $arr[$k] = $tmp;

        }

    }

    return $arr;

}