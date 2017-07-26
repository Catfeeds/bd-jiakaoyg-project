<?php
header("Content-type: text/html; charset=utf-8");
//通过时间戳获取
function Sec2Time($time)
{
    if (is_numeric($time)) {
        $value = array(
            "days"    => 0, "hours"   => 0,
            "minutes" => 0, "seconds" => 0,
        );
        if ($time >= 86400) {
            $value["days"] = floor($time / 86400);
            $time          = ($time % 86400);
        }
        if ($time >= 3600) {
            $value["hours"] = floor($time / 3600);
            $time           = ($time % 3600);
        }
        if ($time >= 60) {
            $value["minutes"] = floor($time / 60);
            $time             = ($time % 60);
        }
        $value["seconds"] = floor($time);
        //return (array) $value;
        $t = $value["days"] . "天" . " " . $value["hours"] . "小时" . $value["minutes"] . "分" . $value["seconds"] . "秒";
        return $t;

    } else {
        return (bool) false;
    }
}

function upload()
{
    $upload           = new \Think\Upload(); // 实例化上传类
    $upload->maxSize  = 3145728; // 设置附件上传大小
    $upload->exts     = array('gif','GIF', 'jpg', 'png', 'jpeg'); // 设置附件上传类型
    $upload->saveName = 'time'; // 采用时间戳命名
    $upload->rootPath = './'; //设置附件上传目录
    $upload->savePath = '/Public/Uploads/'; //设置附件上传目录
    // 上传文件
    $info = $upload->uploadOne($_FILES['images']);
    if (!$info) {
        return false;
    } else {
        return $info['savepath'] . $info['savename'];
    }
}

//获取科目名称
function getClassName($data)
{
    foreach ($data as $key => $value) {
        if ($value['class'] == '1') {
            $data[$key]['class'] = '科目一';
        } elseif ($value['class'] == '4') {
            $data[$key]['class'] = '科目四';
        }
    }
    return $data;
}

//获取类别名称
function getQuetype($data)
{
    foreach ($data as $key => $value) {
        if ($value['quetype'] == '1') {
            $data[$key]['quetype'] = '单选';
        } elseif ($value['quetype'] == '2') {
            $data[$key]['quetype'] = '多选';
        } elseif ($value['quetype'] == '3') {
            $data[$key]['quetype'] = '判断';
        }
    }
    return $data;
}

/**
 * 获取基础练习名称
 */
function getClassification($data)
{
    foreach ($data as $key => $value) {
        switch ($value['classification']) {
            case '101':
                $data[$key]['classification'] = '标线及手势';
                break;
            case '102':
                $data[$key]['classification'] = '禁令标志';
                break;
            case '103':
                $data[$key]['classification'] = '警告标志';
                break;
            case '104':
                $data[$key]['classification'] = '指示标志';
                break;
            case '105':
                $data[$key]['classification'] = '指路标志';
                break;
            case '106':
                $data[$key]['classification'] = '机械常识';
                break;
            case '107':
                $data[$key]['classification'] = '基础补充';
                break;
            case '108':
                $data[$key]['classification'] = '客车专用题库';
                break;
            case '109':
                $data[$key]['classification'] = '货车专用题库';
                break;
            case '201':
                $data[$key]['classification'] = '速成练习一';
                break;
            case '202':
                $data[$key]['classification'] = '速成练习二';
                break;
            case '203':
                $data[$key]['classification'] = '速成练习三';
                break;
            case '204':
                $data[$key]['classification'] = '速成练习四';
                break;
            case '205':
                $data[$key]['classification'] = '速成练习五';
                break;
            case '206':
                $data[$key]['classification'] = '速成练习六';
                break;
            case '207':
                $data[$key]['classification'] = '速成练习七';
                break;
            case '208':
                $data[$key]['classification'] = '速成练习八';
                break;
            case '209':
                $data[$key]['classification'] = '速成练习九';
                break;
            case '210':
                $data[$key]['classification'] = '速成练习十';
                break;
            default:
                # code...
                break;
        }
    }
    return $data;
}

//获取题库名称
function getQuestions($data)
{
    foreach ($data as $key => $value) {
        if ($value['questions'] == '1') {
            $data[$key]['questions'] = '小车C1C2C3C4题库';
        } elseif ($value['questions'] == '2') {
            $data[$key]['questions'] = '客车A1B1题库';
        } elseif ($value['questions'] == '3') {
            $data[$key]['questions'] = '货车A2B2题库';
        } elseif ($value['questions'] == '4') {
            $data[$key]['questions'] = '摩托车EF题库';
        }
    }
    return $data;
}
function getQuestion($value)
{
    if ($value == '1') {
        $value = '小车C1C2C3C4题库';
    } elseif ($value == '2') {
        $value = '客车A1B1题库';
    } elseif ($value == '3') {
        $value = '货车A2B2题库';
    } elseif ($value == '4') {
        $value = '摩托车EF题库';
    }
    return $value;
}

/**
 * 获取设置
 * @param  string $key
 * @return mixed|string
 */
function get_opinion($key, $value)
{
    $res = D('options')->where(array('option_name' => $key))->find();
    if (empty($res)) {
        return false;
    }
    return $res[$value];
}

/**
 * 设置opinion
 * @param [type] $key
 * @param [type] $value
 */
function set_opinion($key, $value)
{
    $options              = D('options');
    $data['option_name']  = $key;
    $data['option_value'] = $value;

    $find = $options->where(array('option_name' => $key))->find();
    if (!$find) {
        $options->data($data)->add();
    } else {
        $options->where(array('id' => $find['id']))->save($data);
    }
}

/**
 * 数据分页
 * @param  [type]  $model 需要查询的表
 * @param  array   $where 查询条件
 * @param  integer $page  每页显示数量
 * @return [type]         分页数据
 */
function pages($model, $where = array(), $page = 10)
{
    $obj           = M($model); // 实例化User对象
    $count         = $obj->where($where)->count(); // 查询满足要求的总记录数
    $Page          = new \Think\Page($count, $page); // 实例化分页类 传入总记录数和每页显示的记录数(25)
    $show          = $Page->show(); // 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
    $list          = $obj->where($where)->order('orders desc')->limit($Page->firstRow . ',' . $Page->listRows)->select();
    $data          = array();
    $data['count'] = $count;
    $data['list']  = $list;
    $data['page']  = $show;
    return $data;
}

/**
 * 条件查询
 * @return array 查询条件
 */
function search($arr)
{
    foreach ($arr as $key => $value) {
        if ($value == '') {
            unset($arr[$key]);
        }
        if ($key == 'quecont' && $value != '') {
            $arr['quecont'] = array('like', '%' . $value . '%');
        }
    }
    return $arr;
}

/**
 * 获取跳转链接
 */
function getClassUrl($id)
{
    $tmp = D('questions')->where(array('id' => $id))->field('class')->find();
    if ($tmp['class'] == '1') {
        $url = 'classOne';
    } elseif ($tmp['class'] == '4') {
        $url = 'classFour';
    }
    return $url;
}

/*
 * 随机生成字符串
 */
function randCode($length = 5, $type = 0) {
    $arr = array(1 => "0123456789", 2 => "abcdefghijklmnopqrstuvwxyz", 3 => "ABCDEFGHIJKLMNOPQRSTUVWXYZ", 4 => "~@#$%^&*(){}[]|");
    if ($type == 0) {
        array_pop($arr);
        $string = implode("", $arr);
    } elseif ($type == "-1") {
        $string = implode("", $arr);
    } else {
        $string = $arr[$type];
    }
    $count = strlen($string) - 1;
    $code = '';
    for ($i = 0; $i < $length; $i++) {
        $code .= $string[rand(0, $count)];
    }
    return $code;
}