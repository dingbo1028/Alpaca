<?php
/**
 * Created by PhpStorm.
 * User: Dingbo
 * Date: 2017-03-29
 * Time: 9:47
 */

namespace core;


class Parser
{
    private $content;
    function __construct($file)
    {
        $this->content=file_get_contents($file);
        if (!$this->content){
            exit('Template file read failed');
        }
    }
    private function parVar(){
        $patter ='/\{\$([\w]+)\}/';
        $repVar = preg_match($patter,$this->content);
        if ($repVar){
            $this->content=preg_replace($patter,"<?php echo \$this->vars[$1];?>",$this->content);
        }
    }

    private function compile($parser_file){
        $this->parVar();
        file_put_contents($parser_file,$this->content);
    }}