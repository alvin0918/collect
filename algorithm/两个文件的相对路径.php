<?php

/**
 * 两个文件的相对路径
 *
 * @param $path1:路径一
 * @param $path2:路径二
 * @return string
 */
function getRelativePath($path1, $path2)
{
    $arr1 = explode('/', dirname($path1));
    $arr2 = explode('/', dirname($path2));
    for ($i = 0, $len = count($arr2); $i < $len; $i++) {
        if ($arr1[$i] != $arr2[$i]) {
            break;
        }
    }

    if ($i < $len) {
        $return_path = array_fill(0, $len - $i, '..');
    }
    //$b相对于$a
    $return_path = array_merge($return_path, array_slice($arr1, $i));
    //$a相对于$b
    // $return_path=array_merge($return_path,array_slice($arr2,$i));
    return implode('/', $return_path);

}

var_dump(getRelativePath("/Users/alvin/project/markdown/事务.md",
    "/Users/alvin/project/collect/algorithm/两个文件的相对路径.php"));