<?php
namespace Admin\Controller;

use Think\Controller;

class CarController extends AllController
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
        $this->display("Index/index");
    }

    public function add()
    {
        if (I()) {
            if (I('class') == '1') {
                $this->display('classOneadd');
            } elseif (I('class') == '4') {
                $this->display('classFouradd');
            }
            if (I('questions')) {
                if (I('questions') == '2') {
                    $this->display('add2');
                } elseif (I('questions') == '3') {
                    $this->display('add3');
                }elseif(I('questions') == '23'){
                    $this->display('add4');
                }
            }
        }
    }

    public function addHandle()
    {
        $images = upload();
        $data   = I();
        if ($data['quetype'] == '1' || $data['quetype'] == '2') {
            $arr             = array('A' => $data['xza'], 'B' => $data['xzb'], 'C' => $data['xzc'], 'D' => $data['xzd']);
            $data['options'] = serialize($arr);
        }
        $data['images'] = $images;
        $id             = D('questions')->data($data)->add();
        if ($id) {
            $url = getClassUrl($id);
            $this->success("添加成功！", $url);
        } else { $this->success("添加失败！", 'add');}
    }

    public function edit()
    {
        $id             = I('get.id');
        $Questions      = D('Questions');
        $arr            = $Questions->getFind($id);
        $arr['options'] = unserialize($arr['options']);
        $this->assign('arr', $arr);
        $this->display();
    }

    public function editHandle()
    {
        $data = I();
        $arr  = array('A' => $data['xza'], 'B' => $data['xzb'], 'C' => $data['xzc'], 'D' => $data['xzd']);
        if ($arr) {
            unset($data['xza'], $data['xzb'], $data['xzc'], $data['xzd']);
        }
        $data['options'] = serialize($arr);
        $Questions       = D('Questions');
        $id              = $Questions->where(array('id' => $data['id']))->save($data);
        if ($id) {
            $id = $Questions->where(array('id' => $data['id']))->field('class')->find();
            $id = getClassUrl($id);
            $this->success("修改成功", $id);
        } else {
            $this->success("修改失败", 'edit?id=' . I('id'));
        }
    }

    public function del()
    {
        $id        = I('id');
        $questions = D('questions');
        $tmp       = $questions->where(array('id' => $id))->delete();
        $this->ajaxReturn($tmp);
    }

    public function classOne()
    {
        if (IS_POST) {
            $arr = search(I('post.'));
        }
        $arr['questions'] = 1;
        $arr['class']     = 1;
        $data             = pages('questions', $arr);
        $data['list']     = getQuetype($data['list']);
        $data['list']     = getClassification($data['list']);
        $this->assign('count', $data['count']);
        $this->assign('list', $data['list']);
        $this->assign('page', $data['page']);
        $this->display();
    }
    public function classOne2()
    {
        if (IS_POST) {
            $arr = search(I('post.'));
        }
        $arr['questions'] = 2;
        $arr['class']     = 1;
        $data             = pages('questions', $arr);
        $data['list']     = getQuetype($data['list']);
        $data['list']     = getClassification($data['list']);
        $this->assign('count', $data['count']);
        $this->assign('list', $data['list']);
        $this->assign('page', $data['page']);
        $this->display('classOne2');
    }
    public function classOne3()
    {
        if (IS_POST) {
            $arr = search(I('post.'));
        }
        $arr['questions'] = 3;
        $arr['class']     = 1;
        $data             = pages('questions', $arr);
        $data['list']     = getQuetype($data['list']);
        $data['list']     = getClassification($data['list']);
        $this->assign('count', $data['count']);
        $this->assign('list', $data['list']);
        $this->assign('page', $data['page']);
        $this->display('classOne3');
    }
    public function classFour()
    {
        if (IS_POST) {
            $arr = search(I('post.'));
        }
        $arr['questions'] = 1;
        $arr['class']     = 4;
        $data             = pages('questions', $arr);
        $data['list']     = getClassification($data['list']);
        $data['list']     = getQuetype($data['list']);
        $this->assign('count', $data['count']);
        $this->assign('list', $data['list']);
        $this->assign('page', $data['page']);
        $this->display();
    }
    public function classFour2()
    {
        if (IS_POST) {
            $arr = search(I('post.'));
        }
        $arr['questions'] = '23';
        $arr['class']     = '1';
        $data             = pages('questions', $arr);
        $data['list']     = getClassification($data['list']);
        $data['list']     = getQuetype($data['list']);
        $this->assign('count', $data['count']);
        $this->assign('list', $data['list']);
        $this->assign('page', $data['page']);
        $this->display();
    }
}
