<?php

if (!function_exists('optionalString')) {


    function optionalString($string, $before = null, $after ='')
    {
        if(!empty($string)){
            return $before.$string.$after;
        }
    }
}

if (!function_exists('bapIsset')) {


    function bapIsset($array,$key)
    {
        if(isset($array[$key])){
            return $array[$key];
        }
    }
}


if (!function_exists('sectionSlug')) {


    function sectionSlug($string)
    {
        try{
            return \Stringy\Stringy::create($string)->slugify('_');

        }catch (\Exception $exception){

            return $string;

        }

    }
}
