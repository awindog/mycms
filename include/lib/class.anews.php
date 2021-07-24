<?php
/**
 * Created by PhpStorm.
 * User: awindog
 * Date: 2018/12/18
 * Time: 下午3:39
 */

class ANews {
    public $id = NULL;

    private $dbh = NULL;
    private $hasher = NULL;

    public function __construct() {
        $this->dbh = $GLOBALS ['A_dbh'];
        $this->hasher = new PasswordHash ( 8, FALSE );
    }
    public function add($uid, $title, $content) {
        global $table_prefix;
        $uid = intval($uid);

        try {
            $sth = $this->dbh->prepare ( "INSERT INTO {$table_prefix}news(`uid`,`title`,`content`) VALUES(:uid, :title, :content)" );
            $sth->bindParam ( ':uid', $uid );
            $sth->bindParam ( ':title', $title );
            $sth->bindParam ( ':content', $content );
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

    public function getAllVerified() {
        global $table_prefix;
        try {
            $sth = $this->dbh->prepare ( "SELECT {$table_prefix}news.*, {$table_prefix}users.username, {$table_prefix}users.avatar FROM {$table_prefix}news,{$table_prefix}users WHERE {$table_prefix}news.uid = {$table_prefix}users.id AND {$table_prefix}news.verify = 1 ORDER BY {$table_prefix}news.id DESC" );
            $sth->execute ();
            $result = $sth->fetchAll ( PDO::FETCH_ASSOC );
            return $result;
        } catch ( PDOExecption $e ) {
            echo "<br>Error: " . $e->getMessage ();
        }
    }

    public function getAll($row = 9999) {
        global $table_prefix;
        try {
            $sth = $this->dbh->prepare ( "SELECT {$table_prefix}news.*, {$table_prefix}users.username, {$table_prefix}users.avatar FROM {$table_prefix}news,{$table_prefix}users WHERE {$table_prefix}news.uid = {$table_prefix}users.id ORDER BY {$table_prefix}news.id DESC limit 0,{$row}" );

            $sth->execute ();
            $result = $sth->fetchAll ( PDO::FETCH_ASSOC );
            return $result;
        } catch ( PDOExecption $e ) {
            echo "<br>Error: " . $e->getMessage ();
        }
    }

    public function getDetailID($id) {
        global $table_prefix;
        $id = trim($id);
        try {
            $sth = $this->dbh->prepare ( "SELECT {$table_prefix}news.*, {$table_prefix}users.username, {$table_prefix}users.avatar FROM {$table_prefix}news,{$table_prefix}users WHERE {$table_prefix}news.uid = {$table_prefix}users.id and {$table_prefix}news.id = {$id} " );
            #{$id} -> :id
            $sth->bindParam ( ':id', $id );
            $sth->execute ();
            $result = $sth->fetch ( PDO::FETCH_ASSOC );
            return $result;
        } catch ( PDOExecption $e ) {
            echo "<br>Error: " . $e->getMessage ();
        }
    }

    public function verify($id, $boolean) {
        global $table_prefix;
        $id = intval ( $id );
        $boolean = (boolean)$boolean;
        try {
            $sth = $this->dbh->prepare ( "UPDATE {$table_prefix}news SET `verify`= :boolean WHERE `id` = :id" );
            $sth->bindParam ( ':boolean', $boolean );
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

    public function delete($id) {
        global $table_prefix;
        $id = intval ( $id );
        try {
            $sth = $this->dbh->prepare ( "DELETE FROM {$table_prefix}news WHERE `id` = :id" );
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
}
