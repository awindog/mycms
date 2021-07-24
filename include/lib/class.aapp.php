<?php
/**
 * Created by PhpStorm.
 * User: awindog
 * Date: 2018/12/11
 * Time: 下午4:11
 */

class AApp {

    private $DBH = NULL; // OPD数据连接句柄
    public $fileext = '.log';

    public function __construct() {

    }

    /**
     * Initialize the environment and template.
     */
    public function init() {

        $this->initPDO();
        $this->initRouter();
    }

    /**
     * Connect to MySQL server and set the environment.
     */
    public function initPDO() {
        try {
            $this->DBH = new APDO("mysql:host=" . A_DB_HOST . ";dbname=" . A_DB_NAME , A_DB_USER, A_DB_PASSWORD, array(
                PDO::ATTR_PERSISTENT => true,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
            ));
            $this->DBH->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            //全局变量在这里赋值
            $GLOBALS ["A_dbh"] = $this->DBH;
        } catch (Exception $e) {
            header('Content-Type: text/plain; charset=utf-8');
            if(A_DEBUG)
                die("Error!: " . $e->getMessage());
            else
                die("Connect database error.");
        }
    }

    /**
     * Initialize the router.
     */
    public function initRouter() {
        $router = new ARouter ();
        $router->init();
    }

    public function log(){
        $ext = $this->fileext;
        $logfile = A_PATH."log/".get_date().$ext;
        $info = json_encode($_SERVER);
        $data = "\$data[]=".var_export($info, true).";\n";
        @file_put_contents($logfile, $data, FILE_APPEND);
    }

    public function __destruct(){
        $this->log();
        $this->DBH = null;
        if(isset($GLOBALS ["A_dbh"]))
            $GLOBALS ["A_dbh"] = null;
    }

}

