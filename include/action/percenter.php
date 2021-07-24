<?php
/**
 * Created by PhpStorm.
 * User: awindog
 * Date: 2018/12/27
 * Time: 下午4:10
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

$personal = isset($_POST['personal'])?text_html(trim($_POST['personal'])):"";
if($personal == ""){
    die("内容不许为空");
}else{
    $userObj = new AUser();
    if($userObj->updatePersonnal($personal,$_SESSION['uid'])){
        die("修改个人空间成功");
    }else{
        die("修改失败");
    }
}
