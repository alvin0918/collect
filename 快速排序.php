<?php
//快速排序
function quick_sort($arr)
{
    //先判断是否需要继续进行
    $length = count($arr);
    if ($length <= 1) {
        return $arr;
    }

    $base_num = $arr[0];//选择一个标尺 选择第一个元素

    //初始化两个数组
    $left_array = array();//小于标尺的
    $right_array = array();//大于标尺的
    for ($i = 1; $i < $length; $i++) {      //遍历 除了标尺外的所有元素，按照大小关系放入两个数组内
        if ($base_num > $arr[$i]) {
            //放入左边数组
            $left_array[] = $arr[$i];
        } else {
            //放入右边
            $right_array[] = $arr[$i];
        }
    }
    //再分别对 左边 和 右边的数组进行相同的排序处理方式
    //递归调用这个函数,并记录结果
    $left_array = quick_sort($left_array);
    $right_array = quick_sort($right_array);
    //合并左边 标尺 右边
    return array_merge($left_array, array($base_num), $right_array);
}

$arr = array(3, 1, 2);
var_dump(quick_sort($arr));



