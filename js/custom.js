$(function(){
        $('[data-toggle="tooltip"]').tooltip();
        
        $("#hform-login-btn").live("click", function() {
		var username = $.trim($("#hform-login .t-username").val());
		var password = $("#hform-login .t-password").val();
		var token = $("#token").text();
		if(username == "" || password == ""){
		        alert('用户名和密码不准为空！');
		        return ;
		}
		if(password.length < 6){
		        alert('登录失败(leng)！');
		        return ;
		}
		var msg = $.login(username, password, token);
		if (msg == 'success') {
			$("#hform-login .t-username").val("");
			$("#hform-login .t-password").val("");
			delete username, password;
			$.gotoUrl("./");
		} else {
		        if(msg == 0)
		                msg = "登录失败(0)！";
			alert(msg);
		}
	});
	
	$("#hform-reg-btn").live("click", function() {
		var username = $.trim($("#hform-reg .t-username").val());
		var password = $("#hform-reg .t-password").val();
		var password2 = $("#hform-reg .t-password2").val();
		var token = $("#token").text();
		if(username == "" || password == ""){
		        alert('信息不完整！');
		        return ;
		}
		if(password != password2){
		        alert('两次输入密码不同！');
		        return ;
		}
		if(password.length < 6){
		        alert('密码长度必须大于6位！');
		        return ;
		}
		var msg = $.register(username, password, token);
		if (msg == 'success') {
			$.gotoUrl("./");
		} else {
			if(msg == 0)
		                msg = "注册失败！";
			alert(msg);
		}
	});
	
	$(".divlink").live("click", function() {
	        var url = $(this).attr('href');
	        if(url == "" || url == null)
	                return;
	        $.gotoUrl(url);
	});
	$("#chgPwd-btn").live("click", function() {
	        var token = $("#token").text();
	        var password = $.trim($("#chgPwdPanel .t-pwd").val());
	        var password1 = $.trim($("#chgPwdPanel .t-pwd1").val());
	        var password2 = $.trim($("#chgPwdPanel .t-pwd2").val());
	        if(password1 != password2){
		        alert('两次输入密码不同！');
		        return false;
		}
		if(password1.length < 6){
		        alert('密码长度必须大于6位！');
		        return false;
		}
		var resp = $.chgPassword(password, password1, token);
	        alert(resp.msg);
		if(resp.status == 1)
		        $.gotoUrl("./");
		return false;
	});
});
