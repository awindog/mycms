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

if(!isset($_SESSION['uid'])){
        header('location: ./');
        exit;
}

$title="修改头像";

require_once(A_PATH.'include/view/header.inc.php');

$avatar = "./images/avatar/{$user['avatar']}";
if(!file_exists(A_PATH.$avatar)){
        $avatar = "./images/user_pic.png";
}
?>
<div id="main">
        <div class="main-item">
                <div class="title">修改头像</div>
                <div class="content">
                        <div style="text-align:center;"><img style="width:13em;border-radius:0.5em;overflow:hidden;" src="<?php echo $avatar;?>"><p>当前头像</p></div>
                        <form action="./index.php?action=action&mod=chgavatar" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="inputURL">来自外部图片</label>
                            <input name="url" type="text" class="form-control" id="inputURL" placeholder="图片链接地址">
                          </div>
                          <div class="form-group">
                            <label for="inputFile">本地图片(只支持.jpg,.png格式)</label>
                            <input name="file" type="file" class="form-control" id="inputFile">
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
