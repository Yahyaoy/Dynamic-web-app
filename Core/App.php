<?php

namespace Core;

class App
{
    protected static $container;

    public static function setContainer($container){
        static::$container = $container;
    }

    public static function container(){
        return static::$container;
    }

    public static function bind($key, $resolver){
        return static::container()->bind($key, $resolver);
    }
    public static function resolve($key){ // هان بدل ما نقول روح عالاآبapp  ومنو اعمل ريسولف بنعملها عالسريع اختصار
        return static::container()->resolve($key);
    }
}