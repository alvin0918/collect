<?php

function tree($arr, $pid = 0, $level = 0)
{
    static $list = array();
    foreach ($arr as $v) {
        //如果是顶级分类，则将其存到$list中，并以此节点为根节点，遍历其子节点
        if ($v['pid'] == $pid) {
            $v['level'] = $level;
            $list[] = $v;
            tree($arr, $v['id'], $level + 1);
        }
    }
    return $list;
}




