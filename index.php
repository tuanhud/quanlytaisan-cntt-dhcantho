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
	<p>
	  <input type="radio" name="radio" id="admin" value="admin" checked="checked" />
	  <label for="admin"></label>
Quản trị
<input type="radio" name="radio" id="cbql" value="cbql" />
<label for="cbql"></label>
<label for="checkbox2"></label>
<label for="checkbox"></label>
	Cán bộ quản lý 
	<input type="radio" name="radio" id="gv" value="gv" />
	<label for="gv"></label>
<label for="checkbox3"></label>
	Giảng viên</p>
	<p>&nbsp;</p>
	
	<p class="submit">
		<input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="Đăng nhập" tabindex="100" />
         
	</p>
  
</form>

	</div>
    </div>
    
</body>
</html>
