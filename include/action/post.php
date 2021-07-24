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

#$title = isset($_POST['title'])?text_html(trim($_POST['title'])):"";
#$content = isset($_POST['content1'])?text_html(trim($_POST['content1'])):"";

$title = isset($_POST['title'])?trim($_POST['title']):"";
$content = isset($_POST['content1'])?trim($_POST['content1']):"";


if($title == "" || $content == ""){
    die("标题和内容不许为空");
}elseif(mb_strlen($title) < 5 || mb_strlen($content) < 10){
    die("文章或内容字数太少");
}else{
    $newsObj = new ANews();
    if($newsObj->add($_SESSION['uid'], $title, $content)){
        die("投稿成功，请等待管理员审核");
    }else{
        die("投稿失败");
    }
}