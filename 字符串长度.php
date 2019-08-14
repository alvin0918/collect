<?php

function strlen($str)
{

    if ($str == '') return 0;

    $count = 0;

    while (1) {

        if ($str[$count] != NULL) {

            $count++;

            continue;

        } else {

            break;

        }

    }

    return $count;

}