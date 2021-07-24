<?php
/**
 * Created by PhpStorm.
 * User: awindog
 * Date: 2018/12/27
 * Time: 下午4:03
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

if($_SESSION['uid'] != 1){
    die("权限不足！");
}

$id = isset($_GET['id'])?intval($_GET['id']):0;
$boolean = isset($_GET['boolean'])?(boolean)($_GET['boolean']):0;

if($id <= 0){
    die("出错啦");
}

$newsObj =  new ANews();

if($newsObj->verify($id, $boolean))
    die("修改成功");
else
    die("修改失败");
