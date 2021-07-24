<?php
/**
 * Created by PhpStorm.
 * User: awindog
 * Date: 2018/12/19
 * Time: 下午5:29
 */
class AUser {
    public $id = NULL;

    private $dbh = NULL;
    private $hasher = NULL;

    public function __construct() {
        $this->dbh = $GLOBALS ['A_dbh'];
        $this->hasher = new PasswordHash ( 8, FALSE );
    }

    /**
     * 添加用户
     *
     * @param string $username
     * @param string $password
     *
     * @return boolean
     */
    public function add($username, $password) {
        global $table_prefix;
        $username = trim ( $username );
        $hash = $this->hasher->HashPassword ( $password );
        $ip = get_ip();
        if ($this->isExistName ( $username )) {
            return FALSE;
        }

        try {
            $sth = $this->dbh->prepare ( "INSERT INTO {$table_prefix}users(`username`,`password`,`ip`) VALUES(:username, :password, :ip)" );
            $sth->bindParam ( ':username', $username );
            $sth->bindParam ( ':password', $hash );
            $sth->bindParam ( ':ip', $ip );
            #var_dump($sth);exit;
            $sth->execute ();
            if (! ($sth->rowCount () > 0)) {
                return FALSE;
            }
            $this->id = $this->dbh->lastInsertId ();
            return TRUE;
        } catch ( PDOExecption $e ) {
            echo "<br>Error: " . $e->getMessage ();
        }
    }



    /**
     * 校验密码
     *
     * @param string $username
     * @param string $password
     * @return boolean
     */
    public function validatePassword($username, $password) {
        $username = strtolower(trim ( $username ));
        $detail = $this->getDetailUsr ( $username );
        $hash = $detail['password'];
        if ($this->hasher->CheckPassword ( $password, $hash ))
            return TRUE;
        else
            return FALSE;
    }

    public function validatePasswordByID($uid, $password) {
        $uid = intval($uid);
        $detail = $this->getDetailID ( $uid );
        $hash = $detail['password'];
        if ($this->hasher->CheckPassword ( $password, $hash ))
            return TRUE;
        else
            return FALSE;
    }

    /**
     * 登录
     * @param int $uid
     * @return boolean
     */
    public function login($uid) {
        $uid = intval($uid);
        $_SESSION["uid"] = $uid;
        return TRUE;
    }

    /**
     * 获取详细信息（用户ID）
     * @param int $uid
     *
     * @return boolean|array
     */
    public function getDetailID($uid) {
        global $table_prefix;
        try {
            $sth = $this->dbh->prepare ( "SELECT * FROM {$table_prefix}users WHERE `id` = {$uid} " );
            #{$id} -> :id
            $sth->bindParam ( ':uid', $uid );
            $sth->execute ();
            $result = $sth->fetch ( PDO::FETCH_ASSOC );
            return $result;
        } catch ( PDOExecption $e ) {
            echo "<br>Error: " . $e->getMessage ();
        }
    }

    /**
     * 获取详细信息（用户名）
     * @param string $username
     * @return boolean <>
     */
    public function getDetailUsr($username) {
        global $table_prefix;
        #$username = trim ( $username );
        try {
            $sth = $this->dbh->prepare ( "SELECT * FROM {$table_prefix}users WHERE `username` = '{$username}' " );
            #'{$username}' -> :username
            #$sth->bindParam ( ':username', $username );
            $sth->execute ();
            $result = $sth->fetch ( PDO::FETCH_ASSOC );
            return $result;
        } catch ( PDOExecption $e ) {
            echo "<br>Error: " . $e->getMessage ();
        }
    }

    /**
     * 更改密码
     * @param string $password
     * @param int $id
     * @return boolean
     */
    public function updatePassword($password, $id) {
        global $table_prefix;
        $hash = $this->hasher->HashPassword ( $password );
        $id = intval ( $id );
        try {
            $sth = $this->dbh->prepare ( "UPDATE {$table_prefix}users SET `password`= :password WHERE `id` = :id" );
            $sth->bindParam ( ':password', $hash );
            $sth->bindParam ( ':id', $id );
            $sth->execute ();
            if (! ($sth->rowCount () > 0))
                return FALSE;
            else
                return TRUE;
        } catch ( PDOExecption $e ) {
            echo "<br>Error: " . $e->getMessage ();
        }
    }

    /**
     * 更改personal
     * @param string $password
     * @param int $id
     * @return boolean
     */
    public function updatePersonnal($personal, $id) {
        global $table_prefix;
        $id = intval ( $id );
        try {
            $sth = $this->dbh->prepare ( "UPDATE {$table_prefix}users SET `personal`= :personal WHERE `id` = :id" );
            $sth->bindParam ( ':personal', $personal );
            $sth->bindParam ( ':id', $id );
            $sth->execute ();
            if (! ($sth->rowCount () > 0))
                return FALSE;
            else
                return TRUE;
        } catch ( PDOExecption $e ) {
            echo "<br>Error: " . $e->getMessage ();
        }
    }    


    /**
     * 更改头像
     * @param int $id
     * @return boolean
     */
    public function updateAvatar($id, $img) {
        global $table_prefix;
        $id = intval ( $id );
        try {
            $sth = $this->dbh->prepare ( "UPDATE {$table_prefix}users SET `avatar`= :avatar WHERE `id` = :id" );
            $sth->bindParam ( ':avatar', $img );
            $sth->bindParam ( ':id', $id );
            $sth->execute ();
            if (! ($sth->rowCount () > 0))
                return FALSE;
            else
                return TRUE;
        } catch ( PDOExecption $e ) {
            echo "<br>Error: " . $e->getMessage ();
        }
    }


    /**
     * 用户ID是否存在
     *
     * @param int $id
     * @return boolean
     */
    public function isExistID($id) {
        $id = intval ( $id );
        global $table_prefix;
        try {
            $sth = $this->dbh->prepare ( "SELECT count(*) FROM {$table_prefix}users WHERE `id` = :id " );
            $sth->bindParam ( ':id', $id );
            $sth->execute ();
            $row = $sth->fetch ();
            if ($row [0] > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch ( PDOExecption $e ) {
            echo "<br>Error: " . $e->getMessage ();
        }
    }

    /**
     * 用户名是否存在
     *
     * @param String $username
     *        	要查询的用户名
     * @return boolean
     */
    public function isExistName($username) {
        global $table_prefix;
        $name = strtolower(trim($username));
        try {
            $sth = $this->dbh->prepare ( "SELECT count(*) FROM {$table_prefix}users WHERE `username` = :username " );
            $sth->bindParam ( ':username', $username );
            $sth->execute ();
            $row = $sth->fetch ();
            if ($row [0] > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch ( PDOExecption $e ) {
            echo "<br>Error: " . $e->getMessage ();
        }
    }

    /**
     * 销毁hash
     */
    public function __destruct() {
        if (isset ( $this->hasher ))
            unset ( $this->hasher );
    }
}
