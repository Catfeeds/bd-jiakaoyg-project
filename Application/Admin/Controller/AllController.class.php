<?php
namespace Admin\Controller;

use Think\Controller;

class AllController extends Controller
{
    public function login()
    {
        if (!session('sc_admin_name')) {
            return false;
        } else {
            return true;
        }
    }

    public function logHandle()
    {
        $data = I('post.');
        $arr  = array();
        $res  = D('admin')->where($data)->find();
        if ($res) {
            session('sc_admin_username', $res['username']);
            session('sc_admin_name', $res['name']);
        } else {
            $this->error("登陆失败！");
        }
        $this->success("登陆成功！", U('Index/index'));
    }

    public function logout()
    {
        session('sc_admin_username', null);
        session('sc_admin_name', null);
        $this->success("已退出！");
    }

}
