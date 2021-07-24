<?php
/**
 * Created by PhpStorm.
 * User: awindog
 * Date: 2018/12/27
 * Time: 下午3:14
 */

if (! defined ( "A_ENTRANCE" )) {
    header ( "HTTP/1.0 404 Not Found" );
    exit ();
}

if(!A_validate_token()){
    die("invalid operation.");
}

$username = isset($_POST['username'])?trim($_POST['username']):"";
$password = isset($_POST['password'])?$_POST['password']:"";

$status = 0;
$msg = "注册失败！";
$data = array();

$userObj = new AUser();

if($username == "" || $password == ""){
    $msg = "账号密码不许为空！";
}elseif(mb_strlen($username) < 5){
    $msg = "账号长度必须大于或等于5位！";
}elseif(mb_strlen($password) < 5){
    $msg = "密码长度必须大于或等于6位！";
}elseif($userObj->isExistName($username)){
    $msg = "用户名已注册！";
}elseif(strlen($username) > 50){
    $msg = "注册失败！";
}else{
    if($userObj->add($username, $password)){
        $status = 1;
        $msg = "success";
        $userObj->login($userObj->id);
    }else{
        $msg = "注册失败！";
    }
}

json_resp($status, $msg, $data);


