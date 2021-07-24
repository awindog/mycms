<?php
/**
 * Created by PhpStorm.
 * User: awindog
 * Date: 2018/11/21
 * Time: 下午5:52
 */
header("Content-Type: text/html; charset=utf-8");
define("A_ENTRANCE",true);
define("A_PATH",dirname(__FILE__).'/');
require_once (A_PATH."config.php");
require_once (A_PATH."include/autoload.php");
require_once (A_PATH."include/functions.php");
A_debug_mode();


if (!is_session_started()){
    session_start();
}
if(!isset($_SESSION['token'])) {
    $_SESSION['token'] = get_salt(32);
}

$appObj =new AApp();
$appObj ->init();


