<?php
/**
 * Created by PhpStorm.
 * User: awindog
 * Date: 2018/12/17
 * Time: 上午9:10
 */

class ARouter {
    private $action = array(
        "view",
        "action"
    );
    private $action_val;
    private $module_val;

    /**
     * 获取并简单处理URL
     */
    public function __construct() {
        if(!isset($_GET['action']) || !isset($_GET['mod'])){
            header('location: ./index.php?action=view&mod=index');
            exit;
        }
        $this->action_val = isset($_GET['action'])?$_GET['action']:"view";
        $this->module_val = isset($_GET['mod'])?$_GET['mod']:"index";
    }

    /**
     * 初始化路由
     */
    public function init() {
        if (!in_array ( $this->action_val, $this->action )) {
            header ( "HTTP/1.0 404 Not Found" );
            header ( 'Content-Type: text/plain; charset=utf-8' );
            if(A_DEBUG)
                die("Action \"".$this->action_val."\" is invalid");
            #else
            #    exit ("404 Not Found");
        }

        if(count(explode("images",$this->module_val))>1)
            die("非法模块名");

        $filename = A_PATH. "include/" . $this->action_val . "/" . $this->module_val;
        if (is_readable ( $filename ) && is_file($filename)) {
            require_once ($filename);
        }elseif(is_readable ( $filename . ".php") && is_file( $filename . ".php")){
            require_once ($filename . ".php");
        } else {
            header ( 'Content-Type: text/plain; charset=utf-8' );

            if(A_DEBUG)
                die ( "ERROR: File ".A_PATH."include/" . $this->action_val . "/" . $this->module_val . ".php" . " is unreadable." );
            else
                exit ("404 Not Found");
        }
    }
}
