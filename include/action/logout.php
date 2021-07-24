<?php
/**
 * Created by PhpStorm.
 * User: awindog
 * Date: 2018/12/27
 * Time: 下午3:07
 */

if (! defined ( "A_ENTRANCE" )) {
    header ( "HTTP/1.0 404 Not Found" );
    exit ();
}

if(!isset($_SESSION['uid'])){
    die("请先登录.");
}elseif(A_validate_token()){
    A_logout();
    header('location: ./');
}else{
    die("invalid operation.");
}
