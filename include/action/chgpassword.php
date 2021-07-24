<?php
/**
 * Created by PhpStorm.
 * User: awindog
 * Date: 2018/12/27
 * Time: 下午4:09
 */
if (! defined ( "A_ENTRANCE" )) {
	header ( "HTTP/1.0 404 Not Found" );
	exit ();
}

if(!A_validate_token()){
        die("invalid operation."); 
}

if(!isset($_SESSION['uid'])){
        header('location: ./');
        exit;
}

$status = 0;
$msg = "修改失败！";
$data = array();

$userObj = new AUser();

$password = isset($_POST['password'])?$_POST['password']:"";
$newpassword = isset($_POST['newpassword'])?$_POST['newpassword']:"";

if(strlen($newpassword) < 6){
       $msg = "密码长度必须大于6位！"; 
}elseif($userObj->validatePasswordByID($_SESSION['uid'], $password)){
        if($userObj->updatePassword($newpassword, $_SESSION['uid'])){
                $status = 1;
                $msg = "修改成功！";
                A_logout();
        }
}else{
        $msg = "原密码错误！";
}
json_resp($status, $msg, $data);
