<?php

/**
 * 生成包含数字和字母的随机数
 *
 * @param int $num | 总数
 * @param int $number | 数字总数
 * @return array
 */
function random($num = 6, $number = 5)
{
    $nums = array(0,1,2,3,4,5,6,7,8,9);
    $letter = "abcdefghijkmnpqrstuvwxyzABCDEFGHIJKMNPQRSTUVWXYZ";

    for ($i = 0; $i < $num - $number; $i++)
    {
        $str[] = $letter[rand(0, 47)];
    }

    for ($i = 0; $i < $number; $i++) {
        $str[] .= $nums[rand(0, 9)];
    }

    shuffle($str);

    $str = implode('', $str);

    return array(
        "lower"  => strtolower($str),
        "upper"  => strtoupper($str),
        "original" => $str
    );
}

print_r(random(10, 4)) ;

