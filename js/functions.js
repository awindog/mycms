$(function(){
        $.extend({
                escapeHtml : function(str) {
                        var entityMap = {
                                "&": "&amp;",
                                "<": "&lt;",
                                ">": "&gt;",
                                '"': '&quot;',
                                "'": '&#39;',
                                "/": '&#x2F;'
                        };
                        return String(str).replace(/[&<>"'\/]/g, function (s) {
                                return entityMap[s];
                        });
                }
	});
        
        $.extend({
		login : function(username, password, token) {
			var msg = 0;
			$.ajax({
				type : "POST",
				async : false,
				dataType : "json",
				url : "./index.php?action=action&mod=login",
				data : {
					"username" : username,
					"password" : password,
					"token" : token
				}
			}).done(function(resp) {
				try{
				        if (resp.msg != 0) {
					        msg = resp.msg;
				        }
				}catch(e){
				        msg = 0;
				}
			});
			return msg;
		}
	});
	
	$.extend({
		register : function(username, password, token) {
			var msg = 0;
			$.ajax({
				type : "POST",
				async : false,
				dataType : "json",
				url : "./index.php?action=action&mod=register",
				data : {
					"username" : username,
					"password" : password,
					"token" : token
				}
			}).done(function(resp) {
				try{
				        if (resp.msg != 0) {
					        msg = resp.msg;
				        }
				}catch(e){
				        msg = 0;
				}
			});
			return msg;
		}
	});
	
	$.extend({
		chgPassword : function(password, newPassword, token) {
			var rresp = false;
			$.ajax({
				type : "POST",
				async : false,
				dataType : "json",
				url : "./index.php?action=action&mod=chgpassword",
				data : {
					"token" : token,
					"password" : password,
					"newpassword" : newPassword
				}
			}).done(function(resp) {
				try{
				        rresp = resp;
				}catch(e){
				        rresp = false;
				}
			});
			return rresp;
		}
	});
	
	
	
	$.extend({
		gotoUrl : function(url) {
			window.location.href = url;
		}
	});
});
