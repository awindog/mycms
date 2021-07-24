<?php
/**
 * Created by PhpStorm.
 * User: awindog
 * Date: 2018/12/19
 * Time: 下午5:24
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
$msg = "登录失败！";
$data = array();

if($username == "" || $password == ""){
    $msg = "账号密码不许为空！";
}else{
    $userObj = new AUser();

    if($userObj->validatePassword($username, $password)){
        $status = 1;
        $msg = "success";
        $userinfo = $userObj->getDetailUsr($username);
        $userObj->login($userinfo['id']);
    }
}
json_resp($status, $msg, $data);
