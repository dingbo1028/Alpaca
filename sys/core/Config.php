<?php

namespace core;


class Config
{
    private static $config = [];

    //读取配置
    public static function get($name = null){
        if (empty($name)){
            return self::$config;
        }
        return isset(self::$config[strtolower($name)])?self::$config[strtolower($name)]:null;
    }
    //动态设置配置
    public static function set($name, $value = null){
        if (is_string($name)){
            self::$config[strtolower($name)]=$value;
        }elseif (is_array($name)){
            if (!empty($value)){
                self::$config[$value]=isset(self::$config[$value])?array_merge(self::$config[$value],$name):self::$config[$value]=$name;
            }else{
                return self::$config = array_merge(self::$config,array_change_key_case($name));
            }
        }else{
            return self::$config;
        }
    }
    //判断配置是否存在
    public static function has($name){
        return isset(self::$config[strtolower($name)]);
    }
    //加载其他配置文件
    public static function load($file){
        if (is_file($file)) {
            $type = pathinfo($file,PATHINFO_EXTENSION);
            if ($type != 'php') {
                return self::$config;
            } else {
                return self::set(include $file);
            }
        } else {
            return self::$config;
        }
    }
}