<?php
	//khoi dong session
	session_start();
	/*
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
<title>Cập nhật thiết bị thuộc đơn vị</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<style>
			.th {
				background: url(http://yui.yahooapis.com/2.5.0/build/assets/skins/sam/sprite.png)  repeat-x 0 0;
			}
		</style>
<script type="text/javascript" src="js/yui.js"></script>
<script src="js/yuiloader-min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/fill.js"></script>
<script type="text/javascript" src="js/table-taisan.js"></script>
<script type="text/javascript" src="capnhatcanhan.js"></script>
<script type="text/javascript" src="js/date.js"></script>
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
$(document).ready(function() 
{ 
	init_date_input(document.frm_suattcanhan.cbo_ngaysinh,document.frm_suattcanhan.cbo_thangsinh,document.frm_suattcanhan.cbo_namsinh);	
	
    get_info_thongtin('get_info_thongtin.php',document.frm_suattcanhan);	//init_date_input(document.frm_suattcanhan.cbo_ngaysinh,document.frm_suattcanhan.cbo_thangsinh,document.frm_suattcanhan.cbo_namsinh);
}); 
</script>	 

<!--Thẻ hiển thị thông tin khi đăng nhập-->
<div style="Z-INDEX: 1; LEFT: 575px; WIDTH: 200px; POSITION: absolute; TOP: 53px; HEIGHT: 30px" align="center">
<font style="FONT-WEIGHT: 700; FONT-SIZE: 8pt; line-height:20px;" face="Tahoma" color="#FFFFFF">
	<a class="white" href="javascript:thoat();">Thoát</a>
    <br>Xin chào, <?=$_SESSION['hoten']?>
    		<br>(<?=$_SESSION['msclb']?>)    
            <?
			$msclb =$_SESSION['msclb'];
			session_register("msclb") ;
			?>
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
			include_once('node-menunav-3ad.php');
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
    <td height="100%" align="center" valign="middle"><table width="500" border="0" cellpadding="0" cellspacing="0">
      <tbody>
		     <tr class="main_1">
		       <td width="161" align="left"><img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
		       <td width="419" align="center">Sửa thông tin cá nhân</td>
		       <td width="180" align="right"><img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
		       </tr>
		     <tr>
		       <td colspan="3" align="left"><form name="frm_suattcanhan" id="frm_suattcanhan">
		         <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">
		           <tbody>
		             <tr>
		               <td height="22" class="level_1_1"></td>
		               <td class="level_1_1"></td>
		               </tr>
		             <tr>
		               <td height="22" align="right" class="level_1_2">Đơn vị </td>
		               <td width="70%" align="left" class="level_1_2"><input name="txt_donvi" class="txtbox" id="txt_donvi" style="width:100%" onKeyPress="return keypress(event)" maxlength="6" readonly="readonly"></td>
		               </tr>
		             <tr>
		               <td height="22" align="right" class="level_1_2">Mã số cán bộ</td>
		               <td width="70%" align="left" class="level_1_2"><input name="txt_masocanbo" class="txtbox" id="txt_masocanbo" style="width:100%" onKeyPress="return keypress(event)" maxlength="6" readonly="readonly"></td>
		               </tr>
		             <tr>
		               <td height="22" align="right" class="level_1_1">Tên cán bộ</td>
		               <td width="70%" align="left" class="level_1_1"><input name="txt_tencanbo" id="txt_tencanbo" class="txtbox" style="width:100%" onKeyPress="return keypress2(event)"></td>
		               </tr>
		             <tr>
		               <td height="22" align="right" class="level_1_2">Giới tính</td>
		               <td width="70%" align="left" class="level_1_2"><select name="cbo_gioitinh" id="cbo_gioitinh" >
		                 <?php
					  $gt=$_SESSION['gioitinh'];
					if($gt =='Nam'){
						echo "<option value='Nam' selected>Nam</option>";
						echo "<option value='Nữ' >Nữ</option>";
					}
					else
					{
						echo "<option value='Nam'>Nam</option>";
                      echo "<option value='Nữ' selected>Nữ</option>";
					}
					  ?>
		                 </select></td>
		               </tr>
		             <tr>
		               <td height="22" align="right" class="level_1_1">Ngày sinh</td>
		               <td width="70%" align="left" class="level_1_1"><select name="cbo_ngaysinh" id="cbo_ngaysinh" style="width:60">
		                 </select>
		                 /
		                 <select title="- Chọn Tháng -" name="cbo_thangsinh" id="cbo_thangsinh" class="" aria-required="true" tabindex="1" style="width:70">
		                   </select>
		                 /
		                 <select title="- Chọn Tháng -" name="cbo_namsinh" id="cbo_namsinh" class="" aria-required="true" tabindex="1" style="width:70">
		                   </select></td>
		               </tr>
		             <tr>
		               <td height="22" align="right" class="level_1_2">Email</td>
		               <td width="70%" align="left" class="level_1_2"><input name="txt_email" type="text" class="txtbox" id="txt_email" style="width:100%"></td>
		               </tr>
		             <tr>
		               <td height="22" align="right" class="level_1_1">Địa chỉ</td>
		               <td width="70%" align="left" class="level_1_1"><input name="txt_diachi" id="txt_diachi" class="txtbox" type="text" style="width:100%"></td>
		               </tr>
		             <tr>
		               <td height="22" align="right" class="level_1_2">Số điện thoại</td>
		               <td width="70%" align="left" class="level_1_2"><input name="txt_sodienthoai" id="txt_sodienthoai" class="txtbox"  type="text" style="width:100%" maxlength="12" onKeyPress="return keypress(event)"></td>
		               </tr>
		             <tr>
		               <td height="22" align="right" class="level_1_1">Mật khẩu</td>
		               <td width="70%" align="left" class="level_1_1"><input name="txt_matkhau" id="matkhau" class="txtbox" type="password" style="width:100%" value=""></td>
		               </tr>
		             <tr>
		               <td colspan="2" height="22" align="center" class="level_1_2"><input type="button" name="btn_capnhat" id="btn_capnhat" class="button_1" value="Cập nhật"></td>
		               </tr>
		             </tbody>
		           </table>
		         </form></td>
		       </tr>
		     </tbody>
		   </table>
<br>
        
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

