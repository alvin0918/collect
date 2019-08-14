<?php

function actionToday()
{
    $today = '2018-03-05'; // 格式固定
    $days = explode('-', $today);
    $year = $days[0];
    $month = (int)$days[1];
    $day = (int)$days[2];

    // 判断是否为闰年
    $flag = false;
    if ($year % 400 == 0 || ($year % 4 == 0 && $year % 100 != 0)) {
        $flag = true;
    }

    // 对月份进行判断 1,3,5,7,8,10,12 为31天
    // 4,6,9,11 为30天
    // 2月份闰年为29天,否则为28天
    switch ($month) {
        case 1:
            $sum = 0;
            break;
        case 2:
            $sum = 31;
            break;
        case 3:
            $sum = 59;
            break;
        case 4:
            $sum = 90;
            break;
        case 5:
            $sum = 120;
            break;
        case 6:
            $sum = 151;
            break;
        case 7:
            $sum = 181;
            break;
        case 8:
            $sum = 212;
            break;
        case 9:
            $sum = 243;
            break;
        case 10:
            $sum = 273;
            break;
        case 11:
            $sum = 304;
            break;
        case 12:
            $sum = 334;
            break;
        default:
            break;
    }

    $sum = $sum + $day;
    if ($flag && $month > 2)
        $sum = $sum + 1;

    var_dump($sum);

}