<?php
	//khoi dong session
	/*session_start();
	
	//kiem tra quyen truoc khi hien thi trang
	if(!session_is_registered("maquyen") || $_SESSION['maquyen']!="AD")
	{
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	echo "<script language=javascript>window.location = 'loginUI.php';</script>"; 
	exit;
	}*/
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cập nhật người dùng</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">

<script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/fill.js"></script>
<script type="text/javascript" src="js/capnhatnguoidung.js"></script>
<script type="text/javascript" >
//Không cho nhập ký tự
function keypress(e){
var keypressed = null;
if (window.event)
	keypressed = window.event.keyCode; //IE
else 
	keypressed = e.which; //NON-IE, Standard

if (keypressed <= 48 || keypressed >= 57)
{ 
	//CharCode của 0 là 48 (Theo bảng mã ASCII)
	//CharCode của 9 là 57 (Theo bảng mã ASCII)
	if (keypressed == 8 || keypressed == 127)
	{
	//Phím Delete và Phím Back
	return;
	}
	return false;
}
}
//khong cho nhap so
function keypress2(e){
var keypressed2 = null;
if (window.event)
	keypressed2 = window.event.keyCode; //IE
else 
	keypressed2 = e.which; //NON-IE, Standard

if (keypressed2 >= 48 && keypressed2 <= 57)
{ 
	//CharCode của 0 là 48 (Theo bảng mã ASCII)
	//CharCode của 9 là 57 (Theo bảng mã ASCII)
	if (keypressed2 == 8 || keypressed2 == 127)
	{
	//Phím Delete và Phím Back
	return;
	}
	return false;
}
}
$(document).ready(function() { 
	document.frm_themcanbo.txt_masocanbo.focus();
	fillcombo('get_list_donvi.php',document.frm_themcanbo.cbo_tendonvithem);
	fillcombo('get_list_donvi.php',document.frm_themcanbo.cbo_tendonvithem2);
	fillcombo('get_list_donvi.php',document.frm_suacanbo.cbo_tendonvisua);
	fillcombo('get_list_donvi.php',document.frm_xoacanbo.cbo_tendonvixoa);

	//su kien click button Them
	$('form[name="frm_themcanbo"] input[name="btn_themcanbo"]').click(function(){
		themcanbo('themcanbo.php',document.frm_themcanbo);				
	});
		
	/*$('form[name="frm_themcanbo"] select[name="cbo_tendonvi"]').change(function(){
		get_info_donvi('get_info_donvi.php',document.frm_suadonvi);
	});*/
	
	//Su kien click button Luu
	/*$('form[name="frm_suadonvi"] input[type="button"]').click(function(){
		suadonvi('suadonvi.php',document.frm_suadonvi);
	});
	
	//su kien click button Xoa
	$('form[name="frm_xoadonvi"] input[type="button"]').click(function(){
		if (confirm('Ban có chắc chắn muốn xóa không ?' )) {
			xoadonvi('xoadonvi.php',document.frm_xoadonvi);			
		}		
	});*/
}); 

/*function isValid(){
	madonvi = frm_themcanbo.cbo_tendonvithem;
	macanbo = frm_themcanbo.txt_masocanbo.value;
	tencanbo = frm_themcanbo.txt_tencanbo.value;
	gioitinh = frm_themcanbo.ra_gioitinh.value;
	ngaysinh = frm_themcanbo.txt_ngaysinh.value;
	email = frm_themcanbo.txt_email.value;
	diachi = frm_themcanbo.txt_diachi.value;
	dienthoai = frm_themcanbo.txt_sodienthoai.value;
	matkhau = frm_themcanbo.txt_matkhau.value;
	
	if(madonvi.value==-1){
		alert('Bạn chưa chọn đơn vị.');
		madonvi.focus();
		return false;
		}
	
	}*/
</script>
</head>
<body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0" class="yui3-skin-sam">
  
<table width="778" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tbody>
  
  <!--Bắt đầu của HEADER-->
  <tr> 
    <td height="26" valign="top"> 
      <script>
	
	function thoat() {
		if (confirm('Ban co chac chan muon thoat khong ?' )) {
			document.location = '../logout.php';
			return;
		}
	}
</script>
</head>
<body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0" class="yui3-skin-sam">
  
<table width="778" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tbody>
  
  <!--Bắt đầu của HEADER-->
  <tr> 
    <td height="26" valign="top"> 
      <script>
	
	function thoat() {
		if (confirm('Ban co chac chan muon thoat khong ?' )) {
			document.location = '../logout.php';
			return;
		}
	}
</script>	 

<!--Thẻ hiển thị thông tin khi đăng nhập-->
<div style="Z-INDEX: 1; LEFT: 575px; WIDTH: 200px; POSITION: absolute; TOP: 53px; HEIGHT: 30px" align="center">
<font style="FONT-WEIGHT: 700; FONT-SIZE: 8pt; line-height:20px;" face="Tahoma" color="#FFFFFF">
	<a class="white" href="javascript:thoat();">Thoát</a>
    <br>Xin chào, <?=$_SESSION['hoten']?>
    <br>
	(<?=$_SESSION['msad']?>)
    </font>
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
             
             <td class="tittle_header">&nbsp;</td>
             
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
    <td valign="middle" height="54%">
    
        <table width="752" align="center" border="0" cellpadding="0" cellspacing="0">
        <!--MENU-->
        <tr height="10">        
			<td align="center" colspan="3">
			<?php
			include_once('node-menunav-3.php');
			?> 
			</td>    
        </tr>
        
		<tr>
        <td align="center" >&nbsp;</td>
        <td align="center" >&nbsp;</td>
        <td align="center" >&nbsp;</td>
        </tr>              
		     
        <!--KET THUC MENU-->
        <tr>
    		<td height="100%" align="center" valign="top">   
		 	<table width="500" border="0" cellpadding="0" cellspacing="0">
       		<tbody>
					<tr class="main_1">
					  <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
					  <td width="419" align="center">Thêm cán bộ</td>
					  <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
					</tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_themcanbo">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
             
              <tr>
					<td height="22" align="right" class="level_1_2">Chọn đơn vị </td>
					<td width="50%" align="left" class="level_1_2"><select class="cbo" name="cbo_tendonvithem" style="width:100%">
					  </select>					</td>
              </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Mã số cán bộ</td>
					<td width="50%" align="left" class="level_1_2"><input name="txt_masocanbo" class="txtbox" style="width:100%" value="" maxlength="7" onKeyPress="return keypress(event)"></td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_1">Tên cán bộ</td>
					<td width="50%" align="left" class="level_1_1"><input name="txt_tencanbo" class="txtbox" style="width:100%" value="" onKeyPress="return keypress2(event)"></td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Giới tính</td>
					<td width="50%" align="left" class="level_1_2">
					 Nam<input name="ra_gioitinh" class="txtbox" type="radio"  value="1"> Nữ
					<input name="ra_gioitinh" class="txtbox" type="radio"  value="0">					
					</td>
			  </tr>
			  <tr>
					<td height="22" align="right" class="level_1_1">Ngày sinh</td>
					<td width="50%" align="left" class="level_1_1">
					<input name="txt_ngaysinh" class="txtbox" type="text" style="width:100%" value="">					</td>
			  </tr>
               <tr>
					<td height="22" align="right" class="level_1_2">Email</td>
					<td width="50%" align="left" class="level_1_2">
					<input name="txt_email" class="txtbox" type="text" style="width:100%" value="">					</td>
			  </tr>
			   <tr>
					<td height="22" align="right" class="level_1_1">Địa chỉ</td>
					<td width="50%" align="left" class="level_1_1">
					<input name="txt_diachi" class="txtbox" type="text" style="width:100%" value="">					</td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Số điện thoại</td>
					<td width="50%" align="left" class="level_1_2">
					<input name="txt_sodienthoai" class="txtbox"  type="text" style="width:100%" value="" maxlength="12" onKeyPress="return keypress(event)">					
					</td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_1">Mật khẩu</td>
					<td width="50%" align="left" class="level_1_1">
					<input name="txt_matkhau" class="txtbox" type="password" style="width:100%" value="">					</td>
			  </tr>
			  <tr>
              		<td colspan="2" height="22" align="center" class="level_1_2"><input type="button" name="btn_themcanbo" class="button_1" value="Thêm" onClick="return isValid();"></td>
              </tr>
			  
			  <tr>
			  		<td height="44" class="level_1_1" colspan="2"></td>
			  </tr>
              
               <tr>
					<td height="22" align="right" class="level_1_2">Chọn đơn vị </td>
					<td width="50%" align="left" class="level_1_2"><select class="cbo" name="cbo_tendonvithem2" style="width:100%">
					  </select>					</td>
              </tr>
			  <tr>
					<td height="22" align="right" class="level_1_2">Nhập file Excel</td>
					<td width="50%" align="left" class="level_1_2"><input name="nhapfile" type="file" style="width:100%"></td>
			  </tr>
              <tr>
              		<td colspan="2" height="22" align="center" class="level_1_1"><input type="button" name="btn_themcanbo2" class="button_1" value="Thêm"></td>
              </tr>
              </tbody>
           </table>
           </form>
          </td>
        </tr>		
        </tbody>
        </table>
		
        <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Sửa thông tin cán bộ</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_suacanbo">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
              <tr>
              		<td height="22" align="right" class="level_1_1">Chọn đơn vị </td>
                    <td width="50%" align="left" class="level_1_1"><select class="cbo" name="cbo_tendonvisua" style="width:100%">
                    </select></td>
              </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Chọn tên cán bộ </td>
					<td width="50%" align="left" class="level_1_2"><select class="cbo" name="choncanbo" style="width:100%"></select></td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_1">Chọn quyền </td>
					<td width="50%" align="left" class="level_1_1"><select class="cbo" name="chonquyen" style="width:100%"></select></td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Mã số cán bộ</td>
					<td width="50%" align="left" class="level_1_2"><input name="macanbo" class="txtbox" style="width:100%" value="" maxlength="7" onKeyPress="return keypress(event)" onBlur='isExist("isExistMSCB.php",this.value,this)'></td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_1">Tên cán bộ</td>
					<td width="50%" align="left" class="level_1_1"><input name="tencanbo" class="txtbox" style="width:100%" value=""></td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Giới tính</td>
					<td width="50%" align="left" class="level_1_2">
					Nam<input name="gioitinh" class="txtbox" type="radio"  value="1">
					Nữ<input name="gioitinh" class="txtbox" type="radio"  value="0">					</td>
			  </tr>
			  <tr>
					<td height="22" align="right" class="level_1_1">Ngày sinh</td>
					<td width="50%" align="left" class="level_1_1">
                   <input type="file">
					</td>
			  </tr>
               <tr>
					<td height="22" align="right" class="level_1_2">Email</td>
					<td width="50%" align="left" class="level_1_2">
					<input name="email2" class="txtbox" type="text" style="width:100%" value="">
					</td>
			  </tr>
			   <tr>
					<td height="22" align="right" class="level_1_1">Địa chỉ</td>
					<td width="50%" align="left" class="level_1_1">
					<input name="diachi" class="txtbox" type="text" style="width:100%" value="">					</td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Số điện thoại</td>
					<td width="50%" align="left" class="level_1_2">
					<input name="sodienthoai" class="txtbox"  type="text" style="width:100%" value="" maxlength="12" onKeyPress="return keypress(event)">					</td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_1">Mật khẩu</td>
					<td width="50%" align="left" class="level_1_1">
					<input name="matkhau" class="txtbox" type="password" style="width:100%" value="">					</td>
			  </tr>
              <tr>
              		<td colspan="2" height="22" align="center" class="level_1_2"><input type="button" class="button_1" value="Sửa" ></td>
              </tr>
              </tbody>
           </table>
           </form>
          </td>
        </tr>		
        </tbody>
        </table>
      
        <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Xóa cán bộ</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_xoacanbo">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_2"></td>
              </tr>
              
              <tr>
					<td height="22" align="right" class="level_1_2">Chọn đơn vị </td>
					<td width="50%" align="left" class="level_1_2"><select class="cbo" name="cbo_tendonvixoa" style="width:100%"></select></td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_1">Chọn tên cán bộ</td>
					<td width="50%" align="left" class="level_1_1"><select class="cbo" name="choncanbo" style="width:100%"></select></td>
			  </tr>
              
              <tr>
              		<td colspan="2" height="22" align="center" class="level_1_2"><input type="button" class="button_1" value="Xóa"></td>
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
</table>

		
	</td>
  </tr>
  <!--Kết thúc của MAINPAGE-->
  <!--Bắt đàu của FOOTER-->
  <tr>
    <td valign="bottom">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
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
<script>
    //  Call the "use" method, passing in "node-menunav".  This will load the
    //  script and CSS for the MenuNav Node Plugin and all of the required
    //  dependencies.
    YUI().use('node-menunav', function(Y) {
        //  Retrieve the Node instance representing the root menu
        //  (<div id="productsandservices">) and call the "plug" method
        //  passing in a reference to the MenuNav Node Plugin.
        var menu = Y.one("#admin");
        menu.plug(Y.Plugin.NodeMenuNav);
        //  Show the menu now that it is ready
        menu.get("ownerDocument").get("documentElement").removeClass("yui3-loading");
    });
</script>
</html>

