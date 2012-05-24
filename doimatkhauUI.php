<?php
	//khoi dong session
	session_start();
	
	//kiem tra quyen truoc khi hien thi trang
	if(!session_is_registered("maquyen"))
	{
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	if($_SESSION['maquyen']!="AD")
	echo "<script language=javascript>window.location = './Admin/loginUI.php';</script>"; 
	if($_SESSION['maquyen']!="BCHHSVT")
	echo "<script language=javascript>window.location = './HSVT/loginUI.php';</script>";
	exit;
	}	
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Đổi mật khẩu</title>
<link rel="stylesheet" type="text/css" href="./css/style.css">
<script type="text/javascript" src="./js/jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="./js/ajax.js"></script>
<script type="text/javascript" src="./js/doimatkhau.js"></script>

<script type="text/javascript" >
$(document).ready(function() { 

	$('form[name="frm_doimatkhau"] input[type="button"]').click(function()							{
		frm=document.frm_doimatkhau;		
		doiMatkhau('updatepassword.php',frm.mk_hientai,frm.mk_moi,frm.xacnhan_mk_moi);
	});	
}); 
</script>
</head>
<body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0">
  
<table width="778" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tbody>
  
  <!--Bắt đầu của HEADER-->
  <tr> 
    <td height="26" valign="top"> 
<script type="text/javascript">
	
	function thoat() {
		if (confirm('Ban co chac chan muon thoat khong ?' )) {
			document.location = './logout.php';
			return;
		}
	}
</script>	 

<!--Thẻ hiển thị thông tin khi đăng nhập-->
<div style="Z-INDEX: 1; LEFT: 575px; WIDTH: 200px; POSITION: absolute; TOP: 53px; HEIGHT: 30px" align="center">
<font style="FONT-WEIGHT: 700; FONT-SIZE: 8pt; line-height:20px;" face="Tahoma" color="#FFFFFF">
	<a class="white" href="main.php">Trang chủ</a> | <a class="white" href="javascript:thoat();">Thoát</a>
    <br>Xin chào, <?=$_SESSION['hoten']?>
    <br>(<?php
	if($_SESSION['mscb']) echo $_SESSION['mscb'];
	if($_SESSION['msbchhsvt']) echo $_SESSION['msbchhsvt'];
	?>)</font>
    </div>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tbody><tr>
     <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
       <tbody><tr>
         <td class="tl_header">&nbsp;</td>
         <td class="tc_header">&nbsp;</td>
         <td class="tr_header">&nbsp;</td>
       </tr>
       <tr>
         <td class="cl_header">&nbsp;</td>
         <td class="cm_header"><table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tbody><tr>
             <td class="logo">&nbsp;</td>
             <td class="tittle_header">&nbsp;</td>
             <td align="center" valign="middle" class="header">&nbsp;</td>
           </tr>
         </tbody></table></td>
         <td class="cr_header">&nbsp;</td>
       </tr>
       
     </tbody></table></td>
   </tr>
 </tbody></table>
    </td>
    
  </tr>
  <!--Kết thúc của HEADER-->
  <!--Bắt đàu của MAINPAGE-->
  <tr>
    <td valign="top">
    	<br/>
        <br/>
        <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
        <tbody><tr>
    <td height="100%" align="center" valign="top">   
		 <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="./images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Thay đổi mật khẩu</td>
          <td width="180" align="right"> <img height="25" src="./images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_doimatkhau">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Mật khẩu hiện tại</td>
					<td width="50%" align="left" class="level_1_2"><input name="mk_hientai" type="password" class="txtbox" style="width:100%" value=""></td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_1">Mật khẩu mới</td>
					<td width="50%" align="left" class="level_1_1"><input name="mk_moi" class="txtbox" type="password" style="width:100%" value=""></td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Xác nhận mật khẩu mới</td>
					<td width="50%" align="left" class="level_1_2"><input name="xacnhan_mk_moi" type="password" class="txtbox" style="width:100%" value=""></td>
			  </tr>
              <!--<tr>
					<td height="22" align="right" class="level_1_1">Địa chỉ</td>
					<td width="50%" align="left" class="level_1_1"><input name="diachi" class="txtbox" type="text" style="width:100%" value=""></td>
			  </tr><tr>
					<td height="22" align="right" class="level_1_2">Số điện thoại</td>
					<td width="50%" align="left" class="level_1_2"><input name="sodienthoai" class="txtbox"  type="text" style="width:100%" value=""></td>
			  </tr><tr>
					<td height="22" align="right" class="level_1_1">Có quyền duyệt điểm rèn luyện</td>
					<td width="50%" align="left" class="level_1_1"><input name="coquyen" class="txtbox" type="checkbox" style="width:100%" value="1"></td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Mật khẩu</td>
					<td width="50%" align="left" class="level_1_2"><input name="matkhau" class="txtbox" type="password" style="width:100%" value=""></td>
			  </tr>-->
              <tr>
              		<td colspan="2" height="22" align="center" class="level_1_1"><input type="button" class="button_1" value="Lưu"></td>
              </tr>
              </tbody>
           </table>
           </form>
          </td>
        </tr>		
        </tbody>
        </table>	
      
	</td>
</tr>
</tbody>
</table>

		
	</td>
  </tr>
  <!--Kết thúc của MAINPAGE-->
  <!--Bắt đàu của FOOTER-->
  <tr>
    <td valign="bottom">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody><tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="cl_footer">&nbsp;</td>
    <td class="cm_footer"><div align="right" class="copy"><!--Copyright © 2008 by <a href="http://www.cuscsoft.com" target="_blank" class="white"><strong>CUSC</strong></a>--></div></td>
    <td class="cr_footer">&nbsp;</td>
  </tr>
  <tr>
    <td class="bl_footer">&nbsp;</td>
    <td class="bc_footer">&nbsp;</td>
    <td class="br_footer">&nbsp;</td>
  </tr>
</tbody></table>
</td>
  </tr>
  <!--Kết thúc của FOOTER-->
</tbody></table>
</body>
</html>



