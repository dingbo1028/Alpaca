<?php

namespace core;
use core\View;

class Controller
{
    protected $vars=[];
    protected $tpl;

    final protected function assign($name,$value=''){
        if (is_array($name)){
            $this->vars=array_merge($this->vars,$name);
            return $this;
        }else{
            $this->vars[$name]=$value;
        }
    }

    final protected function setTpl($tpl=''){
        $this->tpl=$tpl;
    }
    final protected function display(){
        $view = new View($this->vars);
        $view->display($this->tpl);
    }
}