<?php
	session_start();
	session_unset();
	session_destroy();    
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trang Ban chủ nhiệm CLB đăng nhập</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<SCRIPT language=JavaScript>
	function check_mail()
	{
			var matkhau = document.frmLogin.txtMatKhau.value;	
	    	var taikhoan = document.frmLogin.txtDinhDanh.value;	
			//Kiem tra xem ten dang nhap co rong hay khong ?
			if ((taikhoan =="")||(taikhoan == null))
			{
				alert("Bạn chưa nhập tên đăng nhập.");
				frmLogin.txtDinhDanh.focus();
				return (false);
			}				
    		//Kiem tra xem mat khau co rong hay khong?
			if ((matkhau =="")||(matkhau ==null))
			{
				alert("Bạn chưa nhập mật khẩu.");
				frmLogin.txtMatKhau.focus();
				return (false);
			}
			return (true);
	}
	function _focus(){
		document.frmLogin.txtDinhDanh.focus();
		}
</script>
</head>
<body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0" ondragstart="return false" onselectstart="return false" onLoad="_focus()">  
<table width="778" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tbody>
  <!--Bắt đầu của HEADER-->
  <tr> 
    <td height="26" valign="top"> 
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tbody>
   <tr>
   	<td>
    
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
       <tbody><tr>
         <td class="tl_header">&nbsp;</td>
         <td class="tc_header">&nbsp;</td>
         <td class="tr_header">&nbsp;</td>
       </tr>
       <tr>
         <td class="cl_header">&nbsp;</td>
         <td class="cm_header"><table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tbody><tr>
            
             <td class="tittle_header">&nbsp;</td>
             
             
           </tr>
         </tbody></table></td>
         <td class="cr_header">&nbsp;</td>
       </tr>
       
     </tbody></table>
     
     </td>
   </tr>
 </tbody>
</table>
</td>
  </tr><!--Kết thúc của HEADER-->
  <tr>
    <td height="100%" valign="middle" align="center">
	<table width="300" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tbody><tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tbody>
      <tr>
        <td class="tl">&nbsp;</td>
        <td class="tc">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody><tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>
			  <div align="center"><strong class="headerlogin">Giảng viên đăng nhập</strong></div></td>
            </tr>
          </tbody></table>
		  </td>
        <td class="tr">&nbsp;</td>
      </tr>
    </tbody></table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tbody><tr>
        <td width="14" class="cl">&nbsp;</td>
        <td width="372">
        <form name="frmLogin" action="login.php" method="post" onSubmit="return check_mail()">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td class="textlogin">&nbsp;</td>
            <td class="textlogin">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="8%" class="textlogin">&nbsp;</td>
            <td width="30%" class="textlogin" align="right">Mã số CB:&nbsp;</td>
            <td width="62%"><input name="txtDinhDanh" id="txtDinhDanh" type="text" class="inputlogin" size="20" maxlength="30"></td>
          </tr>
          <tr>
            <td class="textlogin">&nbsp;</td>
            <td class="textlogin" align="right">Mật khẩu:&nbsp;</td>
            <td><input name="txtMatKhau" id="txtMatKhau" type="password" class="inputlogin" size="20" maxlength="30"></td>
          </tr>          
          <tr>
            <td colspan="3"><hr size="1" color="#CCCCCC"></td>
            </tr>
          <tr>
            <td colspan="3">
              <div align="center">
                <input type="submit" name="btnDangNhap" class="button_1" value="Đăng nhập" title="">              
                <input type="reset" name="btnLamLai" class="button_1" value="Làm lại" title="">            
              </div></td>
            </tr>
        </tbody></table>
        </form></td>
        <td width="14" class="cr">&nbsp;</td>
      </tr>
    </tbody></table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tbody><tr>
        <td class="bl">&nbsp;</td>
        <td class="bc">&nbsp;</td>
        <td class="br">&nbsp;</td>
      </tr>
    </tbody></table></td>
  </tr>
</tbody></table>
</td>    
  </tr>
  
  <tr>
    <td valign="bottom">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
  <tr height="100">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="cl_footer">&nbsp;</td>
    <td class="cm_footer"></td>
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
</tbody></table>

<!--<script language="javascript">remove_loading();</script> -->
<script language="javascript"><!--
    var meHigth = screen.height - 180;
    var meWidth = screen.width - 12;
//--></script>  

</body>
</html>
