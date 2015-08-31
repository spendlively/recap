<?php

namespace vendor;

class DataPath {

    public static $path;

    public static function setPath($path, $level){

        if($level === 1){
            self::$path = array(1 => $path);
        }
        else{
            self::$path[$level] = $path;
        }
    }

    public static function getPath(){
        return self::$path;
    }
} 