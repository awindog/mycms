<?php
/**
 * Created by PhpStorm.
 * User: awindog
 * Date: 2018/12/27
 * Time: 下午4:11
 */
if (! defined ( "A_ENTRANCE" )) {
	header ( "HTTP/1.0 404 Not Found" );
	exit ();
}

if(!isset($_SESSION['uid'])){
        header('location: ./');
        exit;
}

$title="投稿";

require_once(A_PATH.'include/view/header.inc.php');
?>

<link rel="stylesheet" href="./plugins/themes/default/default.css" />
<link rel="stylesheet" href="./plugins/plugins/code/prettify.css" />
<script charset="utf-8" src="./plugins/kindeditor.js"></script>
<script charset="utf-8" src="./plugins/lang/zh_CN.js"></script>
<script charset="utf-8" src="./plugins/plugins/code/prettify.js"></script>
<script>
      KindEditor.ready(function(K) {
      var editor1 = K.create('textarea[name="content1"]', {
        cssPath : './plugins/plugins/code/prettify.css',
        uploadJson : './plugins/php/upload_json.php',
        fileManagerJson : './plugins/php/file_manager_json.php',
        allowFileManager : true,
        afterCreate : function() {
          var self = this;
          K.ctrl(document, 13, function() {
            self.sync();
            K('form[name=example]')[0].submit();
          });
          K.ctrl(self.edit.doc, 13, function() {
            self.sync();
            K('form[name=example]')[0].submit();
          });
        }
      });
      prettyPrint();
    });
</script>

<div id="main">

        <div class="main-item">
                <div class="title">投稿</div>
                <div class="content">
                        <form action="./index.php?action=action&mod=post" method="post">
                          <div class="form-group">
                            <label for="inputTitle">标题</label>
                            <input name="title" type="text" class="form-control" id="inputTitle" placeholder="标题">
                          </div>
                          <div class="form-group">
                            <label for="content1">内容</label>
                              <textarea name="content1" class="form-control"  id="content1" style="width:809px;height:200px;visibility:hidden;"></textarea>
                              <br/>
                          </div>
                          <div class="form-group">
                                  <input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>">
                                  <button type="submit" class="btn btn-warning">提交</button>
                          </div>
                        </form>
                </div>
        </div>

<?php
require_once(A_PATH.'include/view/footer.inc.php');
?>
