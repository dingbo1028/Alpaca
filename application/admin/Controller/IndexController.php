<?php
namespace admin\controller;
use core\Controller;

class IndexController extends Controller{
    public function index(){
        $this->assign('name','Hello, Alpaca!');
        $this->display();
    }
}