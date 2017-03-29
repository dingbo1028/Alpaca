<?php
return [
    //Database Config
    'db_host'       =>  '172.0.0.1',
    'db_user'       =>  'root',
    'db_pwd'        =>  'bnuz',
    'db_name'       =>  'Alpaca',
    'db_table_prefix'   =>  'al_',
    'db_charset'    =>  'utf8',

    //Module Config
    'default_module'    =>'home',
    'default_controller' =>'Index',
    'default_action' =>'index',

    //URL Config
    /*
     * 1 Common Mood
     * 2 PathInfo Mood default mood
     * */
    'url_type' =>2,

    //Cache Config
    'cache_path'    =>RUNTIME_PATH.'cache'.DS,
    'cache_prefix'  =>'cache_',
    'cache_type'    =>'file',
    'compile_path'  =>RUNTIME_PATH.'compile'.DS,

    'view_path'     =>APP_PATH.'home'.DS.'View'.DS,
    'view_suffix'   =>'.php',

    'auto_cache'    =>true,
    'url_html_suffix'=>'html',

    //Your Config

];