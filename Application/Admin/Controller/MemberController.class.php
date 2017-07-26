<?php
namespace Admin\Controller;

use Think\Controller;

class MemberController extends AllController
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->login()) {
            $this->display('Index/login');
            die();
        }
    }
    public function getlist()
    {
        $list  = M('user')->select();
        $count = M('user')->count();
        $this->assign('count', $count);
        $this->assign('list', $list);
        $this->display();
    }

    public function add()
    {
        $this->display();
    }

    public function addHandle()
    {
        if (IS_POST) {
            $data             = array();
            $data['username'] = I('post.username');
            $data['password'] = I('post.password');
            $data['name']     = I('post.name');
            if ((int) I('post.static') != 0) {
                $data['static'] = (int) I('post.static') * 60 * 60;
            }
            $data['times'] = time();
            if (D('user')->data($data)->add()) {
                $this->success("添加成功！", 'getlist');
            } else {
                $this->success("添加失败！", 'add');
            }
        }
    }

    public function del()
    {
        $id  = I('id');
        $tmp = D('user')->where(array('id' => $id))->delete();
        $this->ajaxReturn($tmp);
    }

    public function edit()
    {
        $id  = I('get.id');
        $arr = M('user')->where(array('id' => $id))->find();
        $this->assign('arr', $arr);
        $this->display();
    }
    public function editHandle()
    {
        if (IS_POST) {
            $data             = array();
            $id               = I('post.id');
            $data['username'] = I('post.username');
            $data['password'] = I('post.password');
            $data['name']     = I('post.name');
            if ((int) I('post.static') != 0) {
                $tmp['static']   = (int) I('post.static') * 60 * 60;
                $tmp['beentime'] = 0;
                D('user')->where(array('id' => $id))->save($tmp);
            }
            D('user')->where(array('id' => $id))->save($data);
            $this->success("修改成功！", 'getlist');
        }
    }
}
