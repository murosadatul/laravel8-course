<?php

function changeDateFormat($date,$new_format)
{
    return \Carbon\Carbon::createFromFormat('Y-m-d',$date)->format($new_format);
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

function changeDateTimeFormat($datetime,$new_format)
{
    $result = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$datetime)->format($new_format);
    return $result;

}
