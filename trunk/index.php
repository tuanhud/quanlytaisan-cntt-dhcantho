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
<script type='text/javascript' src='scripts/l10n.js'></script>
<script type='text/javascript' src='scripts/toolbar.js'></script>
<script type="text/javascript">
function wp_attempt_focus(){
setTimeout( function(){ try{
d = document.getElementById('user_login');
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
<div id="login">

<form name="loginform" id="loginform" action="" method="post">
	<p>
		<label>Tên đăng nhập<br />
		<input type="text" name="txtDinhDanh" id="txtDinhDanh" class="input" value="" size="20" tabindex="10" /></label>
	</p>
	<p>
		<label>Mật khẩu<br />
		<input type="password" name="txtMatKhau" id="txtMatKhau" class="input" value="" size="20" tabindex="20" /></label>
	</p>
	<p class="forgetmenot"><label><a href="" title="Quên mật khẩu?">Quên mật khẩu?</a></label></p>
	<p class="submit">
		<input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="Đăng nhập" tabindex="100" />
	</p>
    <?php
	include('database.php');
	$db=new database();
    if (isset($_POST['txtDinhDanh']) && isset($_POST['txtMatKhau']))
	{   		
		//kiem tra xem co ton tai nguoi voi maso va matkhau duoc cung cap hay khong ?
			$sql="select * from nguoidung
					where MSCB ='".$_POST['txtDinhDanh']."'
					and Matkhau ='".$_POST['txtMatKhau']."'";
					
			$db->setQuery($sql);
		if ($db->numRecord()==1)
		{
		 $msclb =$_POST['txtDinhDanh'];
		 $sql = "Select MaQuyen from coquyen where MSCB = '".$msclb."'";
			$db->setQuery($sql);
			
			$result = $db->fetchAll();
			
			if(mysql_num_rows($result)){
			while($row = mysql_fetch_array($result)){
				if($row['MaQuyen']=="ADMIN"){
					//dua maso vao session
			        $msclb =$_POST['txtDinhDanh'];
			        session_register("msclb") ;
			        $sql = "Select TenCB from nguoidung where MSCB = '".$msclb."'";			
			        $db->setQuery($sql);
			        $result = $db->fetchAll();
			        $row = mysql_fetch_array($result);
			        $hoten = $row['TenCB'];
			        session_register("hoten");
			        //dua quyen vao session
			        $maquyen='ADMIN';
			        session_register("maquyen");
			
			         $sql = "Select MaQuyen from coquyen where MSCB = '".$msclb."'";
			         $db->setQuery($sql);
			
			         $result = $db->fetchAll();
			
			         if(mysql_num_rows($result)){
			             while($row = mysql_fetch_array($result)){
				             if($row['MaQuyen']=="THEMKK"){
					            $tkk="THEMKK";
					            session_register("tkk");
				              }
				             if($row['MaQuyen']=="THEMKHMS"){
					         $tkhms="THEMKHMS";
					         session_register("tkhms");
				             }
				             if($row['MaQuyen']=="SUAKHMS"){
					         $skhms="SUAKHMS";
					         session_register("skhms");
				             }
				             if($row['MaQuyen']=="SUAKK"){
					         $skk="SUAKK";
					         session_register("skk");
				             }
				             if($row['MaQuyen']=="THEMVPP"){
					         $tvpp="THEMVPP";
					         session_register("tvpp");
				             }
				             if($row['MaQuyen']=="SUAVPP"){
					         $svpp="SUAVPP";
					         session_register("svpp");
				             }
				             if($row['MaQuyen']=="DUYETKK"){
					         $dkk="DUYETKK";
					         session_register("dkk");
				             }
				             if($row['MaQuyen']=="DUYETKHMS"){
					         $dkhms="DUYETKHMS";
					         session_register("dkhms");
				             }
				             if($row['MaQuyen']=="DUYETVPP"){
					         $dvpp="DUYETVPP";
					         session_register("dvpp");
				             }
				
			             }
			          }
					echo "<script language=javascript>window.location = 'Admin/main.php';</script>"; 
			        exit;
				}
			    if($row['MaQuyen']=="CBQLBM"){
					
					//dua maso vao session
			           $msclb =$_POST['txtDinhDanh'];
			           session_register("msclb") ;
			           $sql = "Select TenCB from nguoidung where MSCB = '".$msclb."'";			
			           $db->setQuery($sql);
			           $result = $db->fetchAll();
			           $row = mysql_fetch_array($result);
			           $hoten = $row['TenCB'];
			           session_register("hoten");
			        //dua quyen vao session
			           $maquyen="CBQLBM";
			           session_register("maquyen");
			           echo "<script language=javascript>window.location = 'CanBoQLBM/main.php';</script>"; 
			           exit;
				}
				if($row['MaQuyen']=="GV"){
					
					//dua maso vao session
			           $msclb =$_POST['txtDinhDanh'];
			           session_register("msclb") ;
			           $sql = "Select TenCB from nguoidung where MSCB = '".$msclb."'";			
			           $db->setQuery($sql);
			           $result = $db->fetchAll();
			           $row = mysql_fetch_array($result);
			           $hoten = $row['TenCB'];
			           session_register("hoten");
			        //dua quyen vao session
			           $maquyen="GV";
			           session_register("maquyen");
			           echo "<script language=javascript>window.location = 'GiangVien/main.php';</script>"; 
			           exit;
				}
				
			
			
			}
			}
		}
	else
		{
			echo "<script language=javascript> alert('Tên đăng nhập và mật khẩu không chính xác!.');</script>";  
		}  
    }
	else
	{
			echo "<script language=javascript>alert('Bạn phải nhập đầy đủ tên đăng nhập và mật khẩu!.'); </script>";
	}
	
?>
</form>
	</div>
</body>
</html>
