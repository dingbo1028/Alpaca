<?php
/**
 * Created by PhpStorm.
 * User: Dingbo
 * Date: 2017-03-29
 * Time: 18:59
 */

namespace admin\controller;
use core\Controller;
use core\Model;
use home\model\UserModel;

class UserController extends Controller
{
    public function get(){
        $model = new UserModel();
        $re = $model->select('name');
        if ($re){
            var_dump($re);
        }
    }
    public function save(){
        $model = new UserModel();
        if ($model->save(['name'=>'hello','password'=>'shiyanlou'])) {
            echo "Success";
        } else {
            echo 'Failed';
        }
    }
    public function update(){
        $model = new UserModel();
        if ($model->update(['password'=>'hahah'],['name'=>'hello'])) {
            echo "Success";
        } else {
            echo 'Failed';
        }
    }
    public function delete(){
        $model = new UserModel();
        /*if ($model->delete(['name'=>'hello'])){
            $model->free();
            echo "Success";
        }*/
        if ($model->delete("name='admin'")){
            $model->free();
            echo "Success";
        }
    }
}