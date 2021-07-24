<?php
/**
 * Created by PhpStorm.
 * User: awindog
 * Date: 2018/11/21
 * Time: 下午5:59
 */

function is_session_started(){
    if (php_sapi_name()!== 'cli'){
        if (version_compare(phpversion(),'5.4.0', '>=')){
            return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
        }else{
            return session_id() === ''? TRUE : FALSE;
        }
    }
    return FALSE;
}

function get_ip() {
    if(isset($_SERVER ['HTTP_X_FORWARDED_FOR']))
        return $_SERVER ['HTTP_X_FORWARDED_FOR'];
    elseif(isset($_SERVER ['REMOTE_ADDR']))
        return $_SERVER ['REMOTE_ADDR'];
    else
        return "";
}

function get_time() {
    return date ( 'Y-m-d H:i:s' );
}

function get_date() {
    return date ( 'Y-m-d' );
}

function is_json($string) {
    json_decode ( $string, true );
    return (json_last_error () == JSON_ERROR_NONE);
}

function esc_html($string) {
    if (is_array ( $string )) {
        foreach ( $string as $key => $val ) {
            $string [$key] = esc_html ( $val );
        }
    } else {
        $string = htmlspecialchars ( $string );
    }
    return $string;
}

function get_url() {
    $ssl = (! empty ( $_SERVER ['HTTPS'] ) && $_SERVER ['HTTPS'] == 'on') ? true : false;
    $sp = strtolower ( $_SERVER ['SERVER_PROTOCOL'] );
    $protocol = substr ( $sp, 0, strpos ( $sp, '/' ) ) . (($ssl) ? 's' : '');
    $port = $_SERVER ['SERVER_PORT'];
    $port = ((! $ssl && $port == '80') || ($ssl && $port == '443')) ? '' : ':' . $port;
    $host = isset ( $_SERVER ['HTTP_X_FORWARDED_HOST'] ) ? $_SERVER ['HTTP_X_FORWARDED_HOST'] : isset ( $_SERVER ['HTTP_HOST'] ) ? $_SERVER ['HTTP_HOST'] : $_SERVER ['SERVER_NAME'];
    return $protocol . '://' . $host . $port . $_SERVER ['REQUEST_URI'];
}

function get_url_domain($referer) {
    preg_match ( "/^(http:\/\/)?([^\/]+)/i", $referer, $matches );
    $domain = isset ( $matches [2] ) ? $matches [2] : "unknow";
    return $domain;
}

function gotourl($url) {
    header("Location: {$url}");
}

function get_user_info() {
    return array(
        "IP" => get_ip (),
        "TIME" => get_time(),
        "HTTP_ACCEPT"	=>	isset ( $_SERVER ["HTTP_ACCEPT"] ) ? $_SERVER ["HTTP_ACCEPT"] : "",
        "HTTP_REFERER"	=>	isset ( $_SERVER ["HTTP_REFERER"] ) ? $_SERVER ["HTTP_REFERER"] : "",
        "HTTP_USER_AGENT"	=>	isset ( $_SERVER ["HTTP_USER_AGENT"] ) ? $_SERVER ["HTTP_USER_AGENT"] : ""
    );
}

function get_salt($length = 8) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $salt = '';
    for($i = 0; $i < $length; $i ++) {
        $salt .= $chars [mt_rand ( 0, strlen ( $chars ) - 1 )];
    }
    return $salt;
}

function getTimestamp() {
    return time();
}

function A_check_php_mysql() {
    $required_php_version = "5.3.9";
    $php_version = phpversion ();
    if (version_compare ( $required_php_version, $php_version ) > 0) {
        header ( 'Content-Type: text/plain; charset=utf-8' );
        die ( "Your server is running PHP version {$php_version} but zRAT requires at least {$required_php_version}." );
    }

    if (! extension_loaded ( 'PDO' )) {
        header ( 'Content-Type: text/plain; charset=utf-8' );
        die ( "Your PHP installation appears to be missing the MySQL extension." );
    }
}

function A_debug_mode() {
    if (A_DEBUG) {
        error_reporting ( E_ALL );
    } else {
        error_reporting ( 0 );
    }
}

#json响应

function json_resp($status, $msg, $data = array()){
    header ( 'Content-Type: text/json; charset=utf-8' );
    $resp = array(
        "status" => $status,
        "msg" => $msg,
        "data"	=> $data
    );
    echo json_encode($resp);
    exit;
}


function  A_validate_token() {
    if (! isset ( $_REQUEST ['token'] )) {
        return FALSE;
    }
    $token = isset ( $_REQUEST ['token'] ) ? $_REQUEST ['token'] : "";
    if (md5 ( $_SESSION ["token"] ) == md5 ( $token )) {
        return TRUE;
    }
    return FALSE;
}

function A_logout() {
    unset($_SESSION);
    session_unset ();
    session_destroy ();
}


function cutstr_html($string){
    $string = strip_tags($string);
    $string = trim($string);
    $string = str_replace("\t","",$string);
    $string = str_replace("\r\n","",$string);
    $string = str_replace("\r","",$string);
    $string = str_replace("\n","",$string);
    $string = str_replace(" ","",$string);
    $string = str_replace("&nbsp;","",$string);
    return trim($string);
}

function text_html($string){
    $string = strip_tags($string);
    $string = str_replace("\t","&nbsp;&nbsp;&nbsp;&nbsp;",$string);
    $string = str_replace("\r\n","<br>",$string);
    $string = str_replace("\r","",$string);
    $string = str_replace("\n","<br>",$string);
    $string = str_replace(" ","&nbsp;",$string);
    return trim($string);
}
