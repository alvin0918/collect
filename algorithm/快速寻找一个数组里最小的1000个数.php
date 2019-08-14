<?php

//寻找最小的k个数//题目描述//输入n个整数，输出其中最小的k个。
/**
 * 获取最小的k个数
 * @param  array $arr
 * @param  int $k [description]
 * @return array
 */
function get_min_array($arr, $k)
{

    $n = count($arr);


    $min_array = array();


    for ($i = 0; $i < $n; $i++) {

        if ($i < $k) {

            $min_array[$i] = $arr[$i];

        } else {

            if ($i == $k) {

                $max_pos = get_max_pos($min_array);

                $max = $min_array[$max_pos];

            }


            if ($arr[$i] < $max) {

                $min_array[$max_pos] = $arr[$i];


                $max_pos = get_max_pos($min_array);

                $max = $min_array[$max_pos];

            }

        }

    }


    return $min_array;
}

/**
 * 获取最大的位置
 * @param  array $arr
 * @return array
 */
function get_max_pos($arr)
{

    $pos = 0;

    for ($i = 1; $i < count($arr); $i++) {

        if ($arr[$i] > $arr[$pos]) {

            $pos = $i;

        }

    }


    return $pos;
}

$array = [1, 100, 20, 22, 33, 44, 55, 66, 23, 79, 18, 20, 11, 9, 129, 399, 145, 2469, 58];
$min_array = get_min_array($array, 10);
print_r($min_array);