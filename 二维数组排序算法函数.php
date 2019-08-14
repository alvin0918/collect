<?php


function array_sort($arr, $keys, $order = 0)
{
    if (!is_array($arr)) {
        return false;
    }


    //根据指定的字段和内层数组的下标组成新的一维数组
    $keysvalue = array();
    foreach ($arr as $key => $val) {
        $keysvalue[$key] = $val[$keys];
    }
    print_r($keysvalue);


    //对数组按照指定字段排序并保持索引关系
    if ($order == 0) {
        asort($keysvalue);
    } else {
        arsort($keysvalue);
    }
    print_r($keysvalue);

    $new_array = array();
    //按照排好序的下标，重新组合原二维数组
    foreach ($keysvalue as $key => $val) {
        $new_array[$key] = $arr[$key];
    }
    return $new_array;
}

//测试
$person = array(
    array('id' => 2, 'name' => 'lhangsan', 'age' => 23),
    array('id' => 5, 'name' => 'zisi', 'age' => 28),
    array('id' => 3, 'name' => 'apple', 'age' => 17)
);
$result = array_sort($person, 'name', 0);

print_r($result);


?>