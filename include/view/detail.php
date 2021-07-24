<?php
/**
 * Created by PhpStorm.
 * User: awindog
 * Date: 2018/12/19
 * Time: 下午3:50
 */
if (!defined("A_ENTRANCE")){
    header("HTTP/1.0 404 Not Found");
    exit();
}

$id = isset($_GET['id'])?trim($_GET['id']):0;
$url =explode("&",$_SERVER['REQUEST_URI']);
for ($i=0; $i < count($url); $i++) { 
    $kv = explode("=",$url[$i]);
    $key = $kv[0];
    global $$key ;
    $GLOBALS[$key] = $kv[1];
}

parse_str($_SERVER['REQUEST_URI']);
if ($id <= 0){
    die("出错啦");
}

$newsObj = new ANews();
$detail = $newsObj->getDetailID($id);

if(!is_array($detail))
    die("出错啦！");

$title=$detail['title'];

require_once(A_PATH.'include/view/header.inc.php');
?>
    <div id="main">
        <?php
        $avatar = "./images/avatar/".$detail['avatar'];
        if(!file_exists(A_PATH.$avatar)){
            $avatar = "./images/user_pic.png";
        }
        ?>
        <div class="main-item">
            <div class="title"><?php echo $detail['title'];?></div>
            <div class="author"><span class="avatar" style="background-image:url(<?php echo $avatar;?>);"></span><?php echo esc_html($detail['username']);?></div>

            <div class="content"><?php echo $detail['content'];?></div>

        </div>
    </div>
<?php
require_once(A_PATH.'include/view/footer.inc.php');