<?php
	session_start();
	//if(session_is_registered("maquyen") && $_SESSION['maquyen']=="AD")
	//{
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	//echo "<script language=javascript>window.location = 'main.php';</script>"; 
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Hệ thống quản lý tài sản thiết bị khoa Công Nghệ Thông Tin & TT</title>
<link rel='stylesheet' id='login-css'  href='styles/login.css' type='text/css' media='all' />
<link rel='stylesheet' id='colors-fresh-css'  href='styles/colors-fresh.css' type='text/css' media='all' />
<script type="text/javascript" src="Admin/js/jquery-1.7.2.min.js"></script>
<script type='text/javascript' src='scripts/l10n.js'></script>
<script type='text/javascript' src='js/quenmatkhau.js'></script>

<script type="text/javascript">
function wp_attempt_focus(){
setTimeout( function(){ try{
d = document.getElementById('txtDinhDanh');
d.focus();
d.select();
} catch(e){}
}, 200);
}

wp_attempt_focus();
if(typeof wpOnload=='function')wpOnload();
</script>

<!-- This site is optimized with the Yoast WordPress SEO plugin. -->
</head>
<body class="login">
<div id="login2">
<h1 align="center"><a href="http://cit.ctu.edu.vn/" title="KHOA CÔNG NGHỆ THÔNG TIN VÀ TRUYỀN THÔNG">KHOA CÔNG NGHỆ THÔNG TIN VÀ TRUYỀN THÔNG</a></h1>
<div id="login">
<form name="loginform" id="loginform" action="login.php" method="post">
	<p>
		<label>Tên đăng nhập<br />
		<input type="text" name="txtDinhDanh" id="txtDinhDanh" class="input" value="" size="20" tabindex="10" /></label>
	</p>
	<p>
		<label>Mật khẩu<br />
		<input type="password" name="txtMatKhau" id="txtMatKhau" class="input" value="" size="20" tabindex="20" /></label>
	</p>
	<p class="forgetmenot"><label><a href="javascript:void(0);" class="forgotpass">Quên mật khẩu</a></label></p>
	<p class="submit">
		<input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="Đăng nhập" tabindex="100" />
         
	</p>
  
</form>

	</div>
    </div>
    <div id="boxes">
        	<div id="dialog" class="window">
            	<div class="classic-popup">
               		 <div class="forgot-top">
                    <span class="forgot-title">
                        <img alt="" src="images/top_bul.png" style="position: relative;
                            top: 5px; float: left; margin: 5px;">
                        Chức năng phục hồi mật khẩu</span><span class="close-icon" style="margin-left: 0px;
                            margin-right: 0px;"><a class="close" title="Đóng"><img src="images/new_close_btn.png" /></a>
                    </span>
                </div>
              		  <div class="huongdan">
                    Hãy nhập đúng địa chỉ email.</div>
                	<div class="forgotform">
                  	 	 <form id="frmgetpass" name="frmgetpass" method="post">
                    <div class="forgot-item">
                        <span class="forgot-item-title">Nhập Email:</span> <span class="forgot-item-input">
                            <input type="text" id="tbxForGotEmail" name="tbxForGotEmail" style="width: 250px;" /></span>
                    </div>
                    <div class="forgot-item">
                        <span class="forgot-item-title">Mã xác nhận:</span> <span class="forgot-item-input">
                            <input type="text" id="tbxForGotCaptcha" name="tbxForGotCaptcha" style="width: 120px;"
                                maxlength="10" /></span> <span class="cpt_img">
                                    <img src="CaptchaSecurityImages.php?width=90&height=30&characters=5" /></span>
                    </div>
                    </form>
                   		<div class="forgot-item">
                        <span class="forgot-item-title">&nbsp;</span> <span class="forgot-item-btn"><a href="#">
                            Gửi</a></span> <span class="fwaiting">
                                <img alt="" src="images/ajax-loader(1).gif" /></span>
                    </div>
               	 	</div>
            	</div>
        		</div>
       
    		</div>
</body>
</html>
