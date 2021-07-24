<?php
/**
 * Created by PhpStorm.
 * User: awindog
 * Date: 2018/12/18
 * Time: 下午3:41
 */

if (! defined ( "A_ENTRANCE" )) {
    header ( "HTTP/1.0 404 Not Found" );
    exit ();
}

$user = null;

if(isset($_SESSION["uid"])){
    $userObj = new AUser();
    $user = $userObj->getDetailID($_SESSION["uid"]);
}



$url =  $_SERVER['REQUEST_URI'];
$url =explode("?",$_SERVER['REQUEST_URI']);


function a_check() {
    $url =  $_SERVER['REQUEST_URI'];
    $url =explode("?",$_SERVER['REQUEST_URI']);
    parse_str($url[1]);
    if (isset($check)) {
        return $check;
    }
    return -1;
}




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="awindog">
    <title><?php echo esc_html((isset($title))?$title:""); ?></title>
    <script src="./js/jquery-1.11.3.min.js"></script>
    <script src="./js/jquery-migrate-1.2.1.min.js"></script>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <script src="./js/ie-emulation-modes-warning.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/ie10-viewport-bug-workaround.js"></script>
    <link rel="stylesheet" href="./css/custom.css">
    <script src="./js/functions.js"></script>
    <script src="./js/custom.js"></script>
</head>
<body>
    <div class="jumbotron text-center" style="margin-bottom:0">
  <h1>等级保护</h1>
  <p>学习栏目</p>
</div>

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="./index.php?action=view&mod=index">首页</a></li>
                <?php if(isset($_SESSION['uid'])){?>
                    <li><a href="./index.php?action=view&mod=post">我要投稿</a></li>
                <?php }?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if(!isset($_SESSION['uid'])){
                    ?>
                    <li><a href="#" data-toggle="modal" data-target="#loginPanel">登录</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#regPanel">注册</a></li>
                    <?php
                }else{
                    $avatar = "./images/avatar/{$user['avatar']}";
                    if(!file_exists(A_PATH.$avatar)){
                        $avatar = "./images/user_pic.png";
                    }
                    ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="avatar" style="background-image:url(<?php echo $avatar;?>);"></span><?php echo esc_html($user['username']);?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php if($_SESSION['uid'] == 1){?>
                                <li><a href="./index.php?action=view&mod=manage">文章管理</a></li>
                            <?php }?>
                            <li><a href="./index.php?action=view&mod=percenter">个人中心</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#chgPwdPanel">修改密码</a></li>
                            <li><a href="./index.php?action=view&mod=chgavatar">修改头像</a></li>
                            <li><a href="./index.php?action=action&mod=logout&token=<?php echo $_SESSION['token'];?>">退出登录</a></li>
                        </ul>
                    </li>
                <?php }?>
            </ul>
        </div>

    </div>
</nav>
