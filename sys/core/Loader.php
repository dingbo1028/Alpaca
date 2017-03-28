<?php

namespace core;


class Loader
{
    protected static $prefixes=[];

    public static function register(){
        spl_autoload_register('core\\Loader::loadClass');
    }

    public static function addNamespace($prefix, $base_dir, $prepend=false){
        //规范命名空间规范
        $prefix = trim($prefix, "\\")."\\";

        //规范化文件基目录
        $base_dir = rtrim($base_dir,'/').DIRECTORY_SEPARATOR;
        $base_dir = rtrim($base_dir, DIRECTORY_SEPARATOR).'/';

        //初始化命名空间前缀组
        if(isset(self::$prefixes[$prefix])===false){
            self::$prefixes[$prefix]=[];
        }

        //将命名空间前缀与文件基目录插入保存数组
        if ($prepend){
            array_unshift(self::$prefixes[$prefix],$base_dir);
        }else{
            array_push(self::$prefixes[$prefix],$base_dir);
        }
    }

    public static function loadClass($class)
    {
        // 当前命名空间前缀
        $prefix = $class;

        // 从后面开始遍历完全合格类名中的命名空间名称, 来查找映射的文件名
        while (false !== $pos = strrpos($prefix, '\\')) {

            // 保留命名空间前缀中尾部的分隔符
            $prefix = substr($class, 0, $pos + 1);

            // 剩余的就是相对类名称
            $relative_class = substr($class, $pos + 1);

            // 利用命名空间前缀和相对类名来加载映射文件
            $mapped_file = self::loadMappedFile($prefix, $relative_class);
            if ($mapped_file) {
                return $mapped_file;
            }

            // 删除命名空间前缀尾部的分隔符，以便用于下一次strrpos()迭代
            $prefix = rtrim($prefix, '\\');
        }

        // 找不到相应文件
        return false;
    }

    protected static function loadMappedFile($prefix, $relative_class)
    {
        //命名空间前缀中有base目录吗？?
        if (isset(self::$prefixes[$prefix]) === false) {
            return false;
        }

        // 遍历命名空间前缀的base目录
        foreach (self::$prefixes[$prefix] as $base_dir) {

            // 用base目录替代命名空间前缀,
            // 在相对类名中用目录分隔符'/'来替换命名空间分隔符'\',
            // 并在后面追加.php组成$file的绝对路径
            $file = $base_dir
                . str_replace('\\', DIRECTORY_SEPARATOR, $relative_class)
                . '.php';
            $file = $base_dir
                . str_replace('\\', '/', $relative_class)
                . '.php';

            // 当文件存在时，载入之
            if (self::requireFile($file)) {
                // 完成载入
                return $file;
            }
        }

        // 找不到相应文件
        return false;
    }

    protected static function requireFile($file)
    {
        if (file_exists($file)) {
            require $file;
            return true;
        }
        return false;
    }

}