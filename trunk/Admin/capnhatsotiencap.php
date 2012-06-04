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
<title>Cập nhật Ban</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">

<script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/fill.js"></script>
<script type="text/javascript" src="js/capnhatsotiencap.js"></script>
<script type="text/javascript" >
//Không cho nhập ký tự
function keypress(e){
var keypressed = null;
if (window.event)
	keypressed = window.event.keyCode; //IE
else 
	keypressed = e.which; //NON-IE, Standard

if (keypressed >= 48 && keypressed <= 57)
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
$(document).ready(function() { 
	fillcombo2('get_list_nam.php',document.frm_themsotiencap.cbo_chonnam);
	fillcombo('get_list_donvi.php',document.frm_themsotiencap.cbo_chondonvi);
	fillcombo2('get_list_nam.php',document.frm_suasotiencap.cbo_chonnamsua);
	fillcombo('get_list_donvi.php',document.frm_suasotiencap.cbo_chondonvisua);
	fillcombo2('get_list_nam.php',document.frm_xoasotiencap.cbo_chonnamxoa);
	fillcombo('get_list_donvi.php',document.frm_xoasotiencap.cbo_chondonvixoa);
	
    $('form[name="frm_suasotiencap"] select[name="cbo_chonnamsua"]').change(function(){
		$('form[name="frm_suasotiencap"] select[name="cbo_chondonvisua"]').change(function(){
			
			get_info_sotiencap('get_info_sotiencap.php',document.frm_suasotiencap);
		});
	});
	
	//su kien change combo ma can bo trong form xoa can bo
	$('form[name="frm_xoasotiencap"] select[name="cbo_chonnamxoa"]').change(function(){
		$('form[name="frm_xoasotiencap"] select[name="cbo_chondonvixoa"]').change(function(){
			
			get_info_sotiencap2('get_info_sotiencap.php',document.frm_xoasotiencap);
		});
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
    <td height="100%" align="center" valign="middle">   
		 <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Thêm tiền cấp</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_themsotiencap" id="frm_themsotiencap">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_2"></td>
                    <td class="level_1_2"></td>
              </tr>
               <tr>
                 <td height="22" align="right" class="level_1_1">Chọn năm:</td>
                 <td align="left" class="level_1_1"><label for="cbo_chonnam"></label>
                   <select name="cbo_chonnam" id="cbo_chonnam">
                   </select></td>
               </tr>
               <tr>
                 <td height="22" align="right" class="level_1_1">Chọn đơn vị:</td>
                 <td align="left" class="level_1_1"><label for="cbo_chondonvi"></label>
                   <select name="cbo_chondonvi" id="cbo_chondonvi">
                     <option>Bộ môn công nghệ phần mềm</option>
                   </select></td>
               </tr>
               <tr>
					<td height="22" align="right" class="level_1_1">Số tiền cấp:</td>
					<td width="50%" align="left" class="level_1_1"><label for="txt_sotiencap"></label>
					  <input type="text" name="txt_sotiencap" id="txt_sotiencap"> 
					  (triệu đồng)</td>
			</tr>              
              <tr>
              		<td colspan="2" height="22" align="center" class="level_1_2"><input name="btn_them" type="button" class="button_1" id="btn_them" value="Thêm"></td>
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
		       <td width="161" align="left"><img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
		       <td width="419" align="center">Sửa tiền cấp</td>
		       <td width="180" align="right"><img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
		       </tr>
		     <tr>
		       <td colspan="3" align="left"><form name="frm_suasotiencap" id="frm_suasotiencap">
		         <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">
		           <tbody>
		             <tr>
		               <td height="22" class="level_1_2"></td>
		               <td class="level_1_2"></td>
		               </tr>
		             <tr>
		               <td height="22" align="right" class="level_1_1">Chọn năm:</td>
		               <td align="left" class="level_1_1"><label for="select2"></label>
		                 <select name="cbo_chonnamsua" id="select2">
		                   </select></td>
		               </tr>
		             <tr>
		               <td height="22" align="right" class="level_1_1">Chọn đơn vị:</td>
		               <td align="left" class="level_1_1"><label for="cbo_chonnamsua"></label>
		                 <select name="cbo_chondonvisua" id="cbo_chondonvisua">
		                   <option>Bộ môn công nghệ phần mềm</option>
		                   </select></td>
		               </tr>
		             <tr>
		               <td height="22" align="right" class="level_1_1">Số tiền cấp:</td>
		               <td width="50%" align="left" class="level_1_1"><label for="textfield"></label>
		                 <input type="text" name="txt_sotiencap" id="textfield">
		                 (triệu đồng)</td>
		               </tr>
		             <tr>
		               <td colspan="2" height="22" align="center" class="level_1_2"><input name="btn_sua" type="button" class="button_1" id="btn_sua" value="Sửa"></td>
		               </tr>
		             </tbody>
		           </table>
		         </form></td>
		       </tr>
		     </tbody>
		   </table>
		 <table width="500" border="0" cellpadding="0" cellspacing="0">
		   <tbody>
		     <tr class="main_1">
		       <td width="161" align="left"><img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
		       <td width="419" align="center">Xóa tiền cấp</td>
		       <td width="180" align="right"><img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
		       </tr>
		     <tr>
		       <td colspan="3" align="left"><form name="frm_xoasotiencap" id="frm_xoasotiencap">
		         <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">
		           <tbody>
		             <tr>
		               <td height="22" class="level_1_2"></td>
		               <td class="level_1_2"></td>
		               </tr>
		             <tr>
		               <td height="22" align="right" class="level_1_1">Chọn năm:</td>
		               <td align="left" class="level_1_1"><label for="cbo_chonnamxoa"></label>
		                 <select name="cbo_chonnamxoa" id="cbo_chonnamxoa">
		                   </select></td>
		               </tr>
		             <tr>
		               <td height="22" align="right" class="level_1_1">Chọn đơn vị:</td>
		               <td align="left" class="level_1_1"><label for="select5"></label>
		                 <select name="cbo_chondonvixoa" id="select5">
		                   <option>Bộ môn công nghệ phần mềm</option>
		                   </select></td>
		               </tr>
		             <tr>
		               <td height="22" align="right" class="level_1_1">Số tiền cấp:</td>
		               <td width="50%" align="left" class="level_1_1"><label for="textfield"></label>
		                 <input name="txt_sotiencapxoa" type="text" id="textfield" readonly="readonly">
		                 (triệu đồng)</td>
		               </tr>
		             <tr>
		               <td colspan="2" height="22" align="center" class="level_1_2"><input name="btn_xoa" type="button" class="button_1" id="btn_xoa" value="Xóa"></td>
		               </tr>
		             </tbody>
		           </table>
		         </form></td>
		       </tr>
		     </tbody>
		   </table></td>
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

