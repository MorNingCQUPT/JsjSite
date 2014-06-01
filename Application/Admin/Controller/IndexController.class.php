<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;

class IndexController extends Controller {
    public function index() {
        // 显示后台登陆页面
    }

    protected function check($user_name, $user_password) {
        // 登陆成功跳转至User控制，失败返回错误页面
    }
}