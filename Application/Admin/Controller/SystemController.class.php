<?php
namespace Admin\Controller;

use Think\Controller;

class SystemController extends AllController
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->login()) {
            $this->display('Index/login');
            die();
        }
    }
    public function config()
    {
        $this->display();
    }

    public function configHandle()
    {
        if (IS_POST) {
            $data = I();
            foreach ($data as $key => $value) {
                if ($data[$key] == '') {
                    continue;
                }
                set_opinion($key, $value);
            }
            $this->success("配置成功！", 'config');
        }
    }

    public function freetitle()
    {
        $data         = pages('quetest');
        $data['list'] = getQuetype($data['list']);
        $this->assign('count', $data['count']);
        $this->assign('list', $data['list']);
        $this->assign('page', $data['page']);
        $this->display();
    }

    public function freetitleadd()
    {
        $this->display();
    }

    public function freetitleaddHandle()
    {
        $images = upload();
        $data   = I();
        if ($data['quetype'] == '1' || $data['quetype'] == '2') {
            $arr             = array('A' => $data['xza'], 'B' => $data['xzb'], 'C' => $data['xzc'], 'D' => $data['xzd']);
            $data['options'] = serialize($arr);
        }
        $data['images'] = $images;
        $id             = D('quetest')->data($data)->add();
        if ($id) {
            $this->success("添加成功！", 'freetitle');
        } else { $this->success("添加失败！", 'freetitleadd');}
    }

    public function freetitledel()
    {
        $id      = I('id');
        $quetest = D('quetest');
        $tmp     = $quetest->where(array('id' => $id))->delete();
        $this->ajaxReturn($tmp);
    }

    public function freetitleedit()
    {
        $id             = I('get.id');
        $arr            = D('quetest')->where(array('id' => $id))->find();
        $arr['options'] = unserialize($arr['options']);
        $this->assign('arr', $arr);
        $this->display();
    }

    public function freetitleeditHandle()
    {
        $data = I();
        $arr  = array('A' => $data['xza'], 'B' => $data['xzb'], 'C' => $data['xzc'], 'D' => $data['xzd']);
        if ($arr) {
            unset($data['xza'], $data['xzb'], $data['xzc'], $data['xzd']);
        }
        $data['options'] = serialize($arr);
        $quetest         = D('quetest');
        $id              = $quetest->where(array('id' => $data['id']))->save($data);
        if ($id) {
            $id = $quetest->where(array('id' => $data['id']))->field('class')->find();
            $id = getClassUrl($id);
            $this->success("修改成功", 'freetitle');
        } else {
            $this->success("修改失败", 'freetitleedit?id=' . I('id'));
        }
    }
}
