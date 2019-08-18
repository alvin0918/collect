<?php

/**
 * @param $total_money :红包总金额
 * @param $total_people :总人数/总分数
 * @param $min_money :每份红包的最小金额
 * @param $max_money :每份红包的最大金额
 * @return array
 */
function redpack($total_money, $total_people, $min_money, $max_money)
{

    if (empty($min_money)) $min_money = 0.1;
    if (empty($max_money)) $max_money = $total_money;

    $ret = array();
    $new_ret = array();

    $total_real_money = $total_money - $total_people * $min_money;

    $ret[0] = 0;
    for ($i = 1; $i < $total_people; $i++) {
        $ret[$i] = get_rand($ret[$i - 1], $total_real_money, ($max_money - $min_money));
    }

    sort($ret);

    for ($j = 0; $j < count($ret); $j++) {

        if ($j == count($ret) - 1) {
            $new_ret[count($ret) - 1] = $total_real_money - $ret[count($ret) - 1] + $min_money;
        } else {
            $new_ret[] = $ret[$j + 1] - $ret[$j] + $min_money;
        }
    }

    shuffle($new_ret);
    return $new_ret;

}

function get_rand($start, $end, $max)
{
    $tmp = rand($start, $end);
    $total_max = $start + $max;

    if ($tmp > ($total_max) || empty($tmp)) {
        return get_rand($start, $end, $max);
    } else {
        return $tmp;
    }

}