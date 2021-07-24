<?php
/**
 * Created by PhpStorm.
 * User: awindog
 * Date: 2018/11/21
 * Time: 下午5:59
 */

function A_autoload($classname){
    $filename = A_PATH . "include/lib/class." .strtolower($classname) . ".php";
    if (is_readable($filename)){
        require $filename;
    }
}
if (version_compare ( PHP_VERSION, '5.1.2', '>=' )) {
    if (version_compare ( PHP_VERSION, '5.3.0', '>=' )) {
        spl_autoload_register ( 'A_autoload', true, true );
    } else {
        spl_autoload_register ( 'A_autoload' );
    }
} else {
    function __autoload($classname) {
        A_autoload ( $classname );
    }
}
