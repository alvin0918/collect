<?php

// 对微信表情过滤
function filterEmoji($str)
{
    $str = preg_replace_callback( '/./u',
        function (array $match) {
            return strlen($match[0]) >= 4 ? '' : $match[0];
        },
        $str);

    return $str;
}

// 对emoji表情转义
function emoji_encode($str)
{
    $strEncode = '';

    $length = mb_strlen($str, 'utf-8');

    for ($i = 0; $i < $length; $i++) {
        $_tmpStr = mb_substr($str, $i, 1, 'utf-8');
        if (strlen($_tmpStr) >= 4) {
            $strEncode .= '[[EMOJI:' . rawurlencode($_tmpStr) . ']]';
        } else {
            $strEncode .= $_tmpStr;
        }
    }

    return $strEncode;
}

// 对emoji表情转反义
function emoji_decode($str){
    $strDecode = preg_replace_callback('|\[\[EMOJI:(.*?)\]\]|', function($matches){
        return rawurldecode($matches[1]);
    }, $str);
    return $strDecode;
}

echo filterEmoji("😀😝👻💥👩dasdsda三啊哦哦");
echo PHP_EOL;
echo emoji_encode("😀😝👻💥👩dasdsda三啊哦哦");
echo PHP_EOL;
echo emoji_decode(emoji_encode("😀😝👻💥👩dasdsda三啊哦哦"));