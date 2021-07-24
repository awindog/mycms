<?php
/**
 * Created by PhpStorm.
 * User: awindog
 * Date: 2018/12/27
 * Time: 下午3:24
 */

if (! defined ( "A_ENTRANCE" )) {
	header ( "HTTP/1.0 404 Not Found" );
	exit ();
}
require_once(A_PATH.'include/view/header.inc.php');
$sess_che = a_check();
if(!isset($_SESSION['uid'])){
        $_SESSION['uid'] = $sess_che;
        header('location: ./');
}


if(isset($_SESSION["uid"])){
    $userObj = new AUser();
    $user = $userObj->getDetailID($_SESSION["uid"]);
}
chdir(A_PATH.'images/avatar');
$avatar = "{$user['avatar']}";
if(file_exists($avatar)){
        $p = base64_encode(file_get_contents($avatar));
}
else{
  chdir(A_PATH.'images/');
  $avatar = "user_pic.png";
  $p = base64_encode(file_get_contents($avatar));

}

?>


<div id="main">
        <div class="main-item">
                <div class="title" style="text-align:center;"><?php echo esc_html($user['username']);?></div>
                <div class="content">
                        <div style="text-align:center;">
                          <?php echo '<img style="width:13em;border-radius:0.5em;overflow:hidden;" src="data:image/png;base64,'.$p.'"/>';
                          ?>

                        </div>
                        <label for="inputContent">个人空间</label>
                        <div class="content">个人特色：<?php echo $user['personal'];?></div>
                        <br><br>
                        <form action="./index.php?action=action&mod=percenter" method="post">
                          <div class="form-group">
                            <label for="inputContent">修改个人空间内容</label>
                            <textarea name="personal" type="text" rows="5" class="form-control" id="inputContent" placeholder="留下你的足迹"></textarea>
                          </div>
                          <div class="form-group">
                                  <input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>">
                                  <button type="reset" class="btn btn-default">清空</button>
                                  <button type="submit" class="btn btn-primary">提交</button>
                          </div>
                        </form>
                </div>
        </div>
</div>
<?php
require_once(A_PATH.'include/view/footer.inc.php');
?>
