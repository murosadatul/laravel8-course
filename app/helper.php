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

if ( ! function_exists('currencyToNumber'))
{
    /**
     * currency To Number
     *
     * @param [type] $var
     * @return void
     */
    function currencyToNumber($var) {
        $convert = 0;
        if (!empty($var)) {
            $convert = str_replace(",", ".", str_replace(".", "", $var));
        }
        return $convert;
    }
}
if ( ! function_exists('numberToCurrency'))
{
    function numberToCurrency($number) {
        $dcm_cvt = explode('.', $number);
        $dcm_param = 0;
        if (count($dcm_cvt) == 2)
        {
            if (strlen((int) $dcm_cvt[1]) > 3)
            {
                $dcm_param = 3;
            }
            else
            {
                if ((int) $dcm_cvt[1] > 0)
                {
                    $dcm_param = strlen($dcm_cvt[1]);
                }
            }
        }
        $result = empty($number) ? 0 : number_format($number, $dcm_param, ',', '.');
        return $result;
    }
}
