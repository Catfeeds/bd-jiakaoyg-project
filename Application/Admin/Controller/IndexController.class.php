<?php
namespace Admin\Controller;

use Think\Controller;

class IndexController extends AllController
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->login()) {
            $this->display('Index/login');
            die();
        }
    }
    public function index()
    {
        $s1 = D('questions')->where(array('questions' => 1))->count();
        $s2 = D('questions')->where(array('questions' => 2))->count();
        $s3 = D('questions')->where(array('questions' => 3))->count();
        $s4 = D('questions')->where(array('questions' => 4))->count();
        $this->assign('s1', $s1);
        $this->assign('s2', $s2);
        $this->assign('s3', $s3);
        $this->assign('s4', $s4);
        $this->display();
    }

}
