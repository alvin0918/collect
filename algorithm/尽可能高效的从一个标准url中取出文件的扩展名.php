<?php

function getExt($url)
{
    $arr = parse_url($url);//parse_url解析一个 URL 并返回一个关联数组，包含在 URL 中出现的各种组成部分
    //'scheme' => string 'http' (length=4)
    //'host' => string 'www.sina.com.cn' (length=15)
    //'path' => string '/abc/de/fg.php' (length=14)
    //'query' => string 'id=1' (length=4)
    $file = basename($arr['path']);// basename函数返回路径中的文件名部分
    $ext = explode('.', $file);
    return $ext[count($ext) - 1];
}

print(getExt('http://www.sina.com.cn/abc/de/fg.html.php?id=1'));
