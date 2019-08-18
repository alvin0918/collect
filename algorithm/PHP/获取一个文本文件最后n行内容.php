<?php

/**
 * 获取一个文本文件最后n行内容
 *
 * @param $file 文件路径
 * @param $num 行数
 * @return array
 */
function tail($file, $num)
{

    $fp = fopen($file, "r");

    $pos = -2;

    $eof = "";

    $head = false;   //当总行数小于Num时，判断是否到第一行了

    $lines = array();

    while ($num > 0) {

        while ($eof != PHP_EOL) {

            if (fseek($fp, $pos, SEEK_END) == 0) {    //fseek成功返回0，失败返回-1

                $eof = fgetc($fp);

                $pos--;

            } else {                            //当到达第一行，行首时，设置$pos失败

                fseek($fp, 0, SEEK_SET);

                $head = true;                   //到达文件头部，开关打开

                break;

            }

        }

        array_unshift($lines, str_replace(PHP_EOL, '', fgets($fp)));

        if ($head) {//这一句，只能放上一句后，因为到文件头后，把第一行读取出来再跳出整个循环

            break;

        }

        $eof = "";

        $num--;

    }

    fclose($fp);

    return $lines;
}