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
<script type="text/javascript" src="js/date.js"></script>
<script type="text/javascript" >
//Không cho nhập ký tự
function keypress(e){
var keypressed = null;
if (window.event)
	keypressed = window.event.keyCode; //IE
else 
	keypressed = e.which; //NON-IE, Standard

if (keypressed < 48 || keypressed > 57)
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
function keypress2(e)
{
	var keypressed2 = null;
	if (window.event)
		keypressed2 = window.event.keyCode; //IE
	else 
		keypressed2 = e.which; //NON-IE, Standard
	
	if (keypressed2 > 48 && keypressed2 < 57)
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
$(document).ready(function() 
{ 
	document.frm_themcanbo.cbo_tendonvithem.focus();
	//load combo don vi
	fillcombo('get_list_donvi.php',document.frm_themcanbo.cbo_tendonvithem);
	fillcombo('get_list_donvi.php',document.frm_themcanbo.cbo_tendonvithem2);
	fillcombo('get_list_donvi.php',document.frm_xoacanbo.cbo_tendonvixoa);
	fillcombo('get_list_donvi.php',document.frm_suacanbo.cbo_tendonvisua);
	
	fillcombo2('get_list_canbo.php',document.frm_suacanbo.cbo_macanbosua);
	fillcombo2('get_list_canbo.php',document.frm_xoacanbo.cbo_macanboxoa);
	
	//load combo ngay, thang, nam cho nguoi dung chon
	init_date_input(document.frm_themcanbo.cbo_ngaysinh,document.frm_themcanbo.cbo_thangsinh,document.frm_themcanbo.cbo_namsinh);	
	init_date_input(document.frm_suacanbo.cbo_ngaysinhsua,document.frm_suacanbo.cbo_thangsinhsua,document.frm_suacanbo.cbo_namsinhsua);
	
	//su kien change combo ma can bo
	$('form[name="frm_suacanbo"] select[name="cbo_macanbosua"]').change(function(){
		get_info_canbo('get_info_canbo.php',document.frm_suacanbo);
	});
	//su kien change combo ma can bo trong form xoa can bo
	$('form[name="frm_xoacanbo"] select[name="cbo_macanboxoa"]').change(function(){
		get_info_canbo2('get_info_canbo.php',document.frm_xoacanbo);
	});
}); 

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
          	<form name="frm_themcanbo" id="frm_themcanbo">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
             
              <tr>
					<td height="22" align="right" class="level_1_2">Chọn đơn vị </td>
					<td width="70%" align="left" class="level_1_2">
                    <select class="cbo" name="cbo_tendonvithem" id="cbo_tendonvithem" style="width:80%"></select>
                    <input type="button" class="button_1" value="Thêm" >
                    </td>
              </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Mã số cán bộ</td>
					<td width="50%" align="left" class="level_1_2"><input name="txt_masocanbo" id="txt_masocanbo" class="txtbox" style="width:100%" value="" maxlength="6" onKeyPress="return keypress(event)"></td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_1">Tên cán bộ</td>
					<td width="50%" align="left" class="level_1_1"><input name="txt_tencanbo" id="txt_tencanbo" class="txtbox" style="width:100%" value="" onKeyPress="return keypress2(event)"></td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Giới tính</td>
					<td width="50%" align="left" class="level_1_2">
					 <select name="cbo_gioitinh" id="cbo_gioitinh">
                     	<option value="-1">Giới tính</option>
                     	<option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                     </select>					
					</td>
			  </tr>
			  <tr>
					<td height="22" align="right" class="level_1_1">Ngày sinh</td>
					<td width="50%" align="left" class="level_1_1">
                   		<select name="cbo_ngaysinh" id="cbo_ngaysinh" style="width:60">
                      
                   </select>
                   		/
						<select title="- Chọn Tháng -" name="cbo_thangsinh" id="cbo_thangsinh" class="" aria-required="true" tabindex="1" style="width:70">
                   
                              </select>
						/
						<select title="- Chọn Tháng -" name="cbo_namsinh" id="cbo_namsinh" class="" aria-required="true" tabindex="1" style="width:70">
                        		
                              </select>
					</td>
			  </tr>
               <tr>
					<td height="22" align="right" class="level_1_2">Email</td>
					<td width="50%" align="left" class="level_1_2">
					<input name="txt_email" id="txt_email" class="txtbox" type="text" style="width:100%">					</td>
			  </tr>
			   <tr>
					<td height="22" align="right" class="level_1_1">Địa chỉ</td>
					<td width="50%" align="left" class="level_1_1">
					<input name="txt_diachi" id="txt_diachi" class="txtbox" type="text" style="width:100%" value="">					</td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Số điện thoại</td>
					<td width="50%" align="left" class="level_1_2">
					<input name="txt_sodienthoai" id="txt_sodienthoai" class="txtbox"  type="text" style="width:100%" value="" maxlength="12" onKeyPress="return keypress(event)">					
					</td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_1">Mật khẩu</td>
					<td width="50%" align="left" class="level_1_1">
					<input name="txt_matkhau" id="matkhau" class="txtbox" type="password" style="width:100%" value="">					</td>
			  </tr>
			  <tr>
              		<td colspan="2" height="22" align="center" class="level_1_2"><input type="button" name="btn_themcanbo" id="btn_themcanbo" class="button_1" value="Thêm"></td>
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
          	<form name="frm_suacanbo" id="frm_suacanbo">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
              <tr>
              		<td height="22" align="right" class="level_1_1">Chọn mã số cán bộ</td>
                    <td width="70%" align="left" class="level_1_1"><select class="cbo" name="cbo_macanbosua" id="cbo_macanbosua" style="width:100%">
                    </select></td>
              </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Chọn đơn vị</td>
					<td width="50%" align="left" class="level_1_2"><select class="cbo" id="cbo_tendonvisua" name="cbo_tendonvisua" style="width:85%"></select><input type="button" class="button_1" value="Thêm" ></td>
			  </tr>
            
              <tr>
					<td height="22" align="right" class="level_1_1">Tên cán bộ</td>
					<td width="50%" align="left" class="level_1_1"><input name="txt_tencanbosua" id="txt_tencanbosua" class="txtbox" style="width:85%" value=""><input type="button" class="button_1" value="Tìm" ></td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Giới tính</td>
					<td width="50%" align="left" class="level_1_2">
					<select name="cbo_gioitinhsua" id="cbo_gioitinhsua">
                     	<option value="-1">Giới tính</option>
                     	<option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                     </select>				
                    </td>
			  </tr>
			  <tr>
					<td height="22" align="right" class="level_1_1">Ngày sinh</td>
					<td width="50%" align="left" class="level_1_1">
                   		<select name="cbo_ngaysinhsua" id="cbo_ngaysinhsua" style="width:60">
                      
                   </select>
                   		/
						<select title="- Chọn Tháng -" name="cbo_thangsinhsua" id="cbo_thangsinhsua" class="" aria-required="true" tabindex="1">
                   
                              </select>
						/
						<select title="- Chọn Tháng -" name="cbo_namsinhsua" id="cbo_namsinhsua" class="" aria-required="true" tabindex="1">
                        		
                              </select>
					</td>
			  </tr>
               <tr>
					<td height="22" align="right" class="level_1_2">Email</td>
					<td width="50%" align="left" class="level_1_2">
					<input name="txt_emailsua" id="txt_emailsua" class="txtbox" type="text" style="width:100%">
					</td>
			  </tr>
			   <tr>
					<td height="22" align="right" class="level_1_1">Địa chỉ</td>
					<td width="50%" align="left" class="level_1_1">
					<input name="txt_diachisua" id="txt_diachisua" class="txtbox" type="text" style="width:100%" value="">					</td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Số điện thoại</td>
					<td width="50%" align="left" class="level_1_2">
					<input name="txt_sodienthoaisua" id="txt_sodienthoaisua" class="txtbox"  type="text" style="width:100%" value="" maxlength="12" onKeyPress="return keypress(event)">					</td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_1">Mật khẩu</td>
					<td width="50%" align="left" class="level_1_1">
					<input name="txt_matkhausua" id="matkhausua" class="txtbox" type="password" style="width:100%" value="">					</td>
			  </tr>
              <tr>
              		<td colspan="2" height="22" align="center" class="level_1_2"><input id="btn_suacanbo" name="btn_suacanbo" type="button" class="button_1" value="Lưu" ></td>
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
          	<form name="frm_xoacanbo" id="frm_xoacanbo">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_2"></td>
              </tr>
              
              <tr>
					<td height="22" align="right" class="level_1_2">Chọn mã số cán bộ</td>
					<td width="70%" align="left" class="level_1_2"><select class="cbo" name="cbo_macanboxoa" id="cbo_macanboxoa" style="width:100%"></select></td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_1">Tên cán bộ</td>
					<td width="50%" align="left" class="level_1_1"><input name="txt_tencanboxoa" id="txt_tencanboxoa" class="txtbox" style="width:85%" value=""><input type="button" class="button_1" value="Tìm" ></td>
			  </tr>
              <tr>
              		<td colspan="2" height="22" align="center" class="level_1_2"><input id="btn_xoacanbo" name="btn_xoacanbo" type="button" class="button_1" value="Xóa"></td>
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

