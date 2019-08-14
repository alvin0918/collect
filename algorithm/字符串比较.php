<?php

function strcmp($s1, $s2)
{

    if (strlen($s1) < strlen($s2)) return -1;

    if (strlen($s1) > strlen($s2)) return 1;

    for ($i = 0; $i < strlen($s1); $i++) {

        if ($s1[$i] == $s2[$i]) {

            continue;

        } else {

            return false;

        }

    }

    return 0;

}