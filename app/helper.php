<?php

function changeDateFormat($date,$format_date)
{
    return \Carbon\Carbon::createFromFormat('Y-m-d',$date)->format($format_date);
}

function read_more($text,$length)
{
    $length = empty($length) ? 200 : $length ;
    $result = $text;
    if(strlen($text) > $length){
        $result = substr($text,0,$length).' ...';
    }
    return $result;
}

function file_path($file)
{
    $result = 'storage/'.$file;
    return $result;
}
