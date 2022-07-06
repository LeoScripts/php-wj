<?php

namespace App\Common;

class Environment {
    public static function load()
    {
        if(!file_exists($dir.'/.env'))
           return false;

        $lines = file($dir.'/.env');
       
    }
}