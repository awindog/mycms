<?php
/**
 * Created by PhpStorm.
 * User: awindog
 * Date: 2018/12/18
 * Time: 下午3:41
 */


if (! defined ( "A_ENTRANCE" )) {
	header ( "HTTP/1.0 404 Not Found" );
	exit ();
}
?>
<?php if(!isset($_SESSION["uid"])){ ?>
        <div class="modal fade" id="loginPanel" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                                <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">登录</h4>
                                </div>
                                <div class="modal-body">
                        <form action="#" method="post" id="hform-login">
                                <div class="form-group">
                                        <input type="text" class="form-control t-username" placeholder="用户名" autocomplete="off">
                                </div>
                                <div class="form-group">
                                        <input type="password" class="form-control t-password" placeholder="密码" autocomplete="off">
                                </div>
                                </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                        <button type="button" class="btn btn-primary" id="hform-login-btn">提交</button>
                                </div>
                        </form>
                        </div>
                </div>
        </div>
        <div class="modal fade" id="regPanel" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                                <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">注册</h4>
                                </div>
                                <div class="modal-body">
                                        <form action="#" method="post" id="hform-reg">
                                                <div class="form-group">
                                                        <input type="text" class="form-control t-username" placeholder="用户名" autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                        <input type="password" class="form-control t-password" placeholder="密码" autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                        <input type="password" class="form-control t-password2" placeholder="重复密码" autocomplete="off">
                                                </div>
                                        </form>
                                </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                        <button type="button" class="btn btn-primary" id="hform-reg-btn">提交</button>
                                </div>
                        </div>
                </div>
        </div>

<?php }else{?>
<div class="modal fade" id="chgPwdPanel" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                                <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">修改密码</h4>
                                </div>
                                <div class="modal-body">
                                <form action="#" method="post" id="hform-chgpwd">
                                        <div class="form-group">
                                                <input type="password" class="form-control t-pwd" placeholder="旧密码" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                                <input type="password" class="form-control t-pwd1" placeholder="新密码" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                                <input type="password" class="form-control t-pwd2" placeholder="重复新密码" autocomplete="off">
                                        </div>
                                        </div>
                                        <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                                <button type="button" class="btn btn-primary" id="chgPwd-btn">提交</button>
                                        </div>
                                </form>
                                </div>
                        </div>
                </div>
</div>
<?php }?>
<div class="hidden" id="token"><?php echo $_SESSION['token'];?></div>
<div class="jumbotron text-center" style="margin-bottom:0">
  <h5>Copyright@2020 Powered by DAScms</h5>
</div>
</body>
</html>
