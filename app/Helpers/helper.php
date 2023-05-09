<?php

function text($string='')
{
    return GoogleTranslate::trans( $string,\App::getLocale()) ;
}

function getAmount($amount, $length = 0)
{
    if(0 < $length){
        $amount = round($amount, $length);
    }else{
        $amount = round($amount,2);
    }
    return $amount + 0 .'.00';
}

function lang($string='')
{
    return __('language.'.$string);
}

function getYr($string='')
{
    $date = str_split($string);
    $year = $date[6].$date[7].$date[8].$date[9];

    return $year;
}
