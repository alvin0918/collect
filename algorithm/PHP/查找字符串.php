<?php

function strstr($str, $substr)
{

    $m = strlen($str);

    $n = strlen($substr);

    if ($m < $n) return false;

    for ($i = 0; $i <= ($m - $n + 1); $i++) {

        $sub = substr($str, $i, $n);

        if (strcmp($sub, $substr) == 0) return $i;

    }

    return false;

}