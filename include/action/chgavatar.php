<?php
/**
 * Created by PhpStorm.
 * User: awindog
 * Date: 2018/12/27
 * Time: 下午3:21
 */

if (! defined ( "A_ENTRANCE" )) {
    header ( "HTTP/1.0 404 Not Found" );
    exit ();
}

if(!A_validate_token()){
    die("invalid operation.");
}
$url = isset($_POST['url'])?trim($_POST['url']):"";
if($url != ""){
    $s1 = explode("://", $url);
    $ext = substr(strrchr($url, "."), 1);
    if(!in_array($s1[0], array("http","ftp","file")) && !in_array($ext, array("jpg","png"))){
        die("图片地址格式错误！");
    }
    #url绕过
    $imgdata = file_get_contents($url);
    if($imgdata == false || $imgdata == ""){
        die("抓取图片失败！");
    }
    if(file_put_contents(A_PATH."images/avatar/".$_SESSION['uid'].".{$ext}", $imgdata)){
        $userObj = new AUser();
        if($userObj->updateAvatar($_SESSION['uid'], $_SESSION['uid'].".{$ext}")){
            header('location: ./index.php?action=view&mod=chgavatar');
        }else{
            die("更新失败");
        }
    }else{
        die("写入图片失败");
    }

}elseif(isset($_FILES['file'])){
    if(!is_uploaded_file($_FILES['file']['tmp_name']))
        die("修改失败");
    move_uploaded_file($_FILES['file']['tmp_name'], A_PATH."images/avatar/".$_FILES['file']['name']);
    $ext = trim(strtolower(substr(strrchr($_FILES['file']['name'], "."), 1)));
    $evilext = array("php","php3","php4","php5",'pht');
    #phtml
    if(in_array($ext, $evilext)){
        unlink(A_PATH."images/avatar/".$_FILES['file']['name']);
        die("文件格式非法！");
    }
    rename(A_PATH."images/avatar/".$_FILES['file']['name'], A_PATH."images/avatar/".$_SESSION['uid'].".{$ext}");
    $userObj = new AUser();
    $userObj->updateAvatar($_SESSION['uid'], $_SESSION['uid'].".{$ext}");
    header('location: ./index.php?action=view&mod=chgavatar');
}else{
    die("修改失败");
}
