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
<title>Cập nhật nội dung kiểm kê</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">

<script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/fill.js"></script>
<script type="text/javascript" src="js/capnhatnoidungkiemke.js"></script>
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
	fillcombo('get_list_noidungkiemke.php',document.frm_suanoidungkiemke.cbo_tennoidungkiemkesua);
	fillcombo('get_list_noidungkiemke.php',document.frm_xoanoidungkiemke.cbo_tennoidungkiemkexoa);
	//su kien nhan button them
	$('form[name="frm_suanoidungkiemke"] select[name="cbo_tennoidungkiemkesua"]').change(function(){
		get_info_noidungkiemkesua('get_info_noidungkiemke.php',document.frm_suanoidungkiemke);
	});
	$('form[name="frm_xoanoidungkiemke"] select[name="cbo_tennoidungkiemkexoa"]').change(function(){
		get_info_noidungkiemkexoa('get_info_noidungkiemke.php',document.frm_xoanoidungkiemke);
	});
	
	//su kien nhan button sua
	/*$('form[name="frm_suaban"] input[type="button"]').click(function(){
		suaban('../suaban.php',document.frm_suaban);	
	});	
	//su kien click button xoa
	$('form[name="frm_xoaban"] input[type="button"]').click(function(){
		if (confirm('Bạn có chắc chắn muốn xóa không ?' )) {
			xoaban('../xoaban.php',document.frm_xoaban);	
		}		
	});*/
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
             
             <td class="tittle_header"><img src="../images/ctulogo1.gif" alt=""></td>
             
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
          <td width="419" align="center">Thêm nội dung kiểm kê</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_themnoidungkiemke" id="frm_themnoidungkiemke">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
                <td height="22" class="level_1_1"></td>
                <td width="50%" class="level_1_1"></td>
              </tr>
              <tr>
                <td height="22" align="right" class="level_1_2">Tên nội dung kiểm kê: </td>
                <td width="50%" align="center" class="level_1_2"><label for="txttennd"></label>
                  <input type="text" name="txt_tennoidungkiemke" id="txt_tennoidungkiemke" style="width:100%"></td>
              </tr>
              <tr>
                <td height="22" align="right" class="level_1_1">Tên đơn vị tính:</td>
                <td width="50%" align="center" class="level_1_1"><label for="txttendvt"></label>
                  <input type="text" name="txt_tendonvitinhthem" id="txt_tendonvitinhthem" style="width:100%"></td>
              </tr>
              <tr>
                <td height="22" align="right" class="level_1_2">Ghi chú nội dung:</td>
                <td width="50%" align="center" class="level_1_2"><label for="txtghichund"></label>
                  <textarea name="txt_ghichu" id="txt_ghichu" style="width:100%"></textarea></td>
              </tr>
              <tr>
                <td height="22" align="right" class="level_1_2">Thêm nội dung từ file:</td>
                <td align="left" class="level_1_2"><label for="textfield"></label>
                  <input type="file" name="txt_browse" id="txt_browse"></td>
              </tr>
              <tr>
                <td colspan="2" height="22" align="center" class="level_1_1"><input name="btn_themnoidungkiemke" type="button" class="button_1" id="btn_themnoidungkiemke" value="Thêm">
                  <input name="btn_huynoidungkiemke" type="reset" class="button_1" id="btn_huynoidungkiemke" value="Hủy"></td>
              </tr>
              <tr>
                <td colspan="2" height="22" align="center" class="level_1_1">&nbsp;</td>
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
          <td width="419" align="center">Sửa nội dung kiểm kê</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_suanoidungkiemke" id="frm_suanoidungkiemke">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr class="level_1_1">
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
             <tr>
					<td height="22" align="right" class="level_1_2">Chọn tên nội dung kiểm kê:</td>
					<td width="50%" align="left" class="level_1_2">
                    	<select name="cbo_tennoidungkiemkesua" id="cbo_tennoidungkiemkesua" class="cbo" style="width:100%;">
                        </select></td>
               <tr>
                 <td height="22" align="right" class="level_1_2">Mã nội dung kiểm kê:</td>
                 <td align="left" class="level_1_2"><label for="txt_manoidungsua"></label>
                   <input name="txt_manoidungkiemkesua" type="text" disabled id="txt_manoidungkiemkesua" readonly="readonly"></td>
               <tr>
					<td height="22" align="right" class="level_1_1">Tên nội dung kiểm kê mới:</td>
					<td width="50%" align="left" class="level_1_2"><label for="txttenndmoi"></label>
					  <input type="text" name="txt_tennoidungkiemkemoi" id="txt_tennoidungkiemkemoi" style="width:100%"></td>
			</tr>
			 <tr>
					<td height="22" align="right" class="level_1_2">Tên đơn vị tính:</td>
					<td width="50%" align="left" class="level_1_2">
                    	<input name="txt_tendonvitinhsua" type="text" class="txtbox" id="txt_tendonvitinhsua" style="width:100%"></td>
			</tr> 
			<tr>
					<td height="22" align="right" class="level_1_1">Ghi chú nội dung:</td>
					<td width="50%" align="left" class="level_1_1"><textarea name="txt_ghichusua" class="txtbox" id="txt_ghichusua" style="width:100%" onKeyPress="return keypress(event)"></textarea></td>
			</tr> 
            <tr>
              <td colspan="2" height="22" align="center" class="level_1_2">
                <input name="btn_luunoidungkiemke" type="button" class="button_1" id="btn_luunoidungkiemke" value="Lưu">
                <input name="btn_huynoidungkiemke" type="reset" class="button_1" id="btn_huynoidungkiemke" value="Hủy"></td>
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
          <td width="419" align="center">Xóa nội dung kiểm kê</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_xoanoidungkiemke" id="frm_xoanoidungkiemke">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_2"></td>
                    <td class="level_1_2"></td>
              </tr>
             <tr>
					<td height="22" align="right" class="level_1_1">Chọn tên nội dung kiểm kê:</td>
					<td width="50%" align="left" class="level_1_1">
                    	<select name="cbo_tennoidungkiemkexoa" id="cbo_tennoidungkiemkexoa" class="cbo" style="width:100%;">
                        </select>                       
                    </td>
					
			</tr>              
             <tr>
					<td height="22" align="right" class="level_1_1">Mã nội dung kiểm kê:</td>
					<td width="50%" align="left" class="level_1_1"><label for="txtmand"></label>
					  <input name="txt_manoidungkiemkexoa" type="text" disabled id="txt_manoidungkiemkexoa" readonly="readonly" "></td>
					
			</tr>    
             <tr>
               <td height="22" align="right" class="level_1_2">Tên đơn vị tính:</td>
               <td height="22" align="center" class="level_1_2"><label for="txtxoatendvt"></label>
                 <input name="txt_tendonvitinhxoa" type="text" disabled id="txt_tendonvitinhxoa" style="width:100%" readonly="readonly"></td>
             </tr>
             <tr>
               <td height="22" align="right" class="level_1_1">Ghi chú nội dung kiểm kê:</td>
               <td height="22" align="center" class="level_1_1"><label for="txtxoaghichundkk"></label>
                 <textarea name="txt_ghichuxoa" disabled readonly="readonly" id="txt_ghichuxoa" style="width:100%"></textarea></td>
             </tr>
             <tr>
						<td colspan="2" height="22" align="center" class="level_1_2">
                        <input name="btn_xoanoidungkiemke" type="button" class="button_1" id="btn_xoanoidungkiemke" value="Xóa">
                        <input name="btn_Huynoidungkiemke" type="reset" class="button_1" id="btn_Huynoidungkiemke" value="Huy"></td>
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

