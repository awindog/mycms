<?php
/**
 * Created by PhpStorm.
 * User: awindog
 * Date: 2018/12/18
 * Time: 下午3:35
 */

if (! defined ( "A_ENTRANCE" )) {
    header ( "HTTP/1.0 404 Not Found" );
    exit ();
}

$title="首页";

require_once(A_PATH.'include/view/header.inc.php');
?>
<div id="main">
<?php
$newsObj = new ANews();
$all = $newsObj->getAllVerified();
if(is_array($all)){
foreach($all as $value){
$avatar = "./images/avatar/".$value['avatar'];
if(!file_exists(A_PATH.$avatar)){
        $avatar = "./images/user_pic.png";
}
?>
        <div class="main-item">
                <div class="title"><a href="./index.php?action=view&mod=detail&id=<?php echo $value['id'];?>"><?php echo $value['title'];?></a></div>
                <div class="author"><span class="avatar" style="background-image:url(<?php echo $avatar;?>);"></span><?php echo esc_html($value['username']);?></div>
<?php if(isset($_SESSION['uid']) && $_SESSION['uid'] == 1){?>
                <div class="operate pull-right">
                        <a href="./index.php?action=action&mod=verify&boolean=<?php echo ($value['verify']==1)?"0":"1";?>&id=<?php echo $value['id'];?>&token=<?php echo $_SESSION['token'];?>"><?php echo ($value['verify']==1)?"取消通过":"通过审核";?></a>
                        <a href="./index.php?action=action&mod=delete&id=<?php echo $value['id'];?>&token=<?php echo $_SESSION['token'];?>">删除</a>
                </div>
<?php }?>
                <div class="content"><?php echo $value['content'];?></div>

        </div>
<?php }}?>
</div>
<?php
require_once(A_PATH.'include/view/footer.inc.php');
?>
