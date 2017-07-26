<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{

    public function login()
    {
        $this->display();
    }
    public function isLogin()
    {
        if (session('sc_username')) {
            $tmp = D('user')->where(array('id'=>session('sc_user_id')))->find();
            if($tmp['token'] == session('sc_token')){
                $data['success'] = true;
            }else{
                $time = time() - session('sc_user_time');
                M('user')->where(array('id' => session('sc_user_id')))->setInc('beentime', $time);
                session('sc_username', null);
                session('sc_name', null);
                session('sc_user_id', null);
                session('sc_user_time', null);
                $data['success'] = false;
            }
        } else {
            $data['success'] = false;
        }
        $this->ajaxReturn($data);
    }

    public function logHandle()
    {
        $data = I('post.');
        $res  = D('user')->where($data)->find();
        if ($res) {
            if ($res['static'] != null) {
                if($res['timetmp'] != '0'){
                    $time = time() - $res['timetmp'];
                    M('User')->where(array('id' => $res['id']))->setInc('beentime', $time);
                }
                if ($res['static'] < $res['beentime']) {
                    $this->error("登陆失败！");
                    die();
                }
            }
            session('sc_username', $res['username']);
            session('sc_name', $res['name']);
            session('sc_user_id', $res['id']);
            session('sc_user_time', time());
            session('sc_token',randCode());
            $tmp['token'] = session('sc_token');
            $tmp['timetmp'] = time();
            D('User')->where(array('id'=>$res['id']))->save($tmp);
            $this->success("登陆成功！", 'index');
        } else {
            $this->error("登陆失败！");
        }
    }

    public function logout()
    {
        $time = time() - session('sc_user_time');
        M('User')->where(array('id' => session('sc_user_id')))->setInc('beentime', $time);
        M('User')->where(array('id' => session('sc_user_id')))->setField('timetmp', 0);
        session('sc_username', null);
        session('sc_name', null);
        session('sc_user_id', null);
        session('sc_user_time', null);
        $this->success("已退出！");
    }

    public function index()
    {
        $this->display();
    }
    public function index1()
    {
        $this->display();
    }
    public function index2()
    {
        $this->display();
    }
    public function indexFour()
    {
        $this->display();
    }

    /**
     * 速成练习
     */
    public function crash()
    {
        $this->display();
    }

    /**
     * 专项练习
     */
    public function special()
    {
        $this->display();
    }

    /**
     * 顺序练习
     */
    public function sequential()
    {
        $this->display('intensive');
    }
    //请求数量
    public function ajaxsequential()
    {
        $where=array();
        if (I('test') == 'test') {
            $sort = "1";
            $model = 'quetest';
        } else {
            $sort = I('sort');
            if(I('classification')=='110'){               
                $where['questions']='23';
            }else{
                $where['questions'] = I('questions');
            }
            $where['class']=I('class');
            $where['classification']=I('classification');
            $model = 'questions';
        }
        $data = D($model)->where($where)->order("orders asc")->select();
        if (!$sort) {
            shuffle($data);
        }
        $tmp = array();
        for ($i = 0; $i < count($data); $i++) {
            $tmp['Questions'][$i] = $data[$i]['id'];
        }
        $tmp['SumCount'] = count($data);
        $tmp['success']  = true;
        unset($data);
        $this->ajaxReturn($tmp);
    }
    //请求单道题
    public function getQuestionById()
    {
        if (I('test') == 'test') {
            $model = 'quetest';
        } else {
            $model = 'questions';
        }
        $id                = I('QuestionId');
        $arr               = D($model)->where(array('id' => $id))->find();
        $arr['options']    = unserialize($arr['options']);
        $arr['success']    = true;
        $arr['Collection'] = $arr['Test'] = 1;
        $this->ajaxReturn($arr);
    }
    //请求错题
    public function getErrorList()
    {
        $id        = I('post.id');
        $map['id'] = array('in', $id);
        $data      = D('questions')->where($map)->order("orders asc")->select();
        $tmp       = array();
        for ($i = 0; $i < count($data); $i++) {
            $tmp['Questions'][$i] = $data[$i]['id'];
        }
        $tmp['SumCount'] = count($data);
        $tmp['success']  = true;
        $this->ajaxReturn($tmp);
    }

    /**
     * 随机练习
     */
    public function randoms()
    {
        $this->display('IntensiveTrain');
    }

    /**
     * 联系我们
     */
    public function about()
    {
        $this->display();
    }
}
