<?php
namespace Admin\Model;

use Think\Model;

class QuestionsModel extends Model
{
    public function getlist($where = array())
    {
        $data = $this->where($where)->order('id desc')->select();
        return $data;
    }

    public function getFind($id = null)
    {
        return $this->where(array('id' => $id))->find();
    }

    public function counts($where = array())
    {
        $count = $this->where($where)->count();
        return $count;
    }

}
