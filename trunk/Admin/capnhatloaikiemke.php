<?php
	//khoi dong session
	session_start();
	
	//kiem tra quyen truoc khi hien thi trang
	if(!session_is_registered("tkk") || $_SESSION['tkk']!="THEMKK")
	{
		
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	echo "<script language=javascript>window.location = 'loginUI.php';</script>"; 
	exit;
		
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cập nhật loại kiểm kê</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">

<script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/fill.js"></script>
<script type="text/javascript" src="js/capnhatloaikiemke.js"></script>
<script type="text/javascript" >
//Không cho nhập ký tự
/*function keypress(e){
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
}*/
$(document).ready(function() { 
	document.frm_themloaikiemke.txt_tenloaikiemke.focus();
	fillcombo('get_list_loaikiemke.php',document.frm_sualoaikiemke.cbo_tenloaikiemkesua);
	fillcombo('get_list_loaikiemke.php',document.frm_xoaloaikiemke.cbo_tenloaikiemkexoa);
	
	$('form[name="frm_sualoaikiemke"] select[name="cbo_tenloaikiemkesua"]').change(function(){
		get_info_loaikiemkesua('get_info_loaikiemke.php',document.frm_sualoaikiemke);
	});
	
	$('form[name="frm_xoaloaikiemke"] select[name="cbo_tenloaikiemkexoa"]').change(function(){
		get_info_loaikiemkexoa('get_info_loaikiemke.php',document.frm_xoaloaikiemke);
	});
	//su kien nhan button them
	/*$('form[name="frm_themloaikiemke"] input[type="button"]').click(function(){
		themban('../themloaikiemke.php',document.frm_themloaikiemke);	
	});
	
	//su kien nhan button sua
	$('form[name="frm_suaban"] input[type="button"]').click(function(){
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
		 <table width="521" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="105" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="275" align="center">Thêm loại kiểm kê</td>
          <td width="141" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_themloaikiemke" id="frm_themloaikiemke">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
               <tr>
					<td height="22" align="right" class="level_1_2">Tên loại kiểm kê:</td>
					<td width="50%" align="left" class="level_1_2">
                    	<input name="txt_tenloaikiemke" type="text" class="txtbox" id="txt_tenloaikiemke" style="width:100%" onKeyPress="return keypress(event)" value="" maxlength="31"></td>
			</tr>                
              <tr>
                <td colspan="2" height="22" align="center" class="level_1_1"><input name="btn_themloaikiemke" type="button" class="button_1" id="btn_themloaikiemke" value="Thêm"></td>
              </tr>
			  
			  <tr>
			    <td colspan="2" height="22" align="center" class="level_1_2">
			      </td>
			    </tr>
				</tbody>
           </table>
           </form>
          </td>
        </tr>		
        </tbody>
        </table>

        <table width="519" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="105" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="275" align="center">Sửa loại kiểm kê</td>
          <td width="139" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_sualoaikiemke" id="frm_sualoaikiemke">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
             <tr>
					<td height="22" align="right" class="level_1_2">Chọn tên loại kiểm kê: </td>
					<td width="50%" align="left" class="level_1_2">
                    	<select name="cbo_tenloaikiemkesua" class="cbo" id="cbo_tenloaikiemkesua" style="width:100%;">
                        </select>                       
                    </td>
			</tr>
             <tr>
               <td height="22" align="right" class="level_1_1">Mã loại kiểm kê: </td>
               <td align="left" class="level_1_1"><label for="txt_maloaikiemke"></label>
                 <input name="txt_maloaikiemke" type="text" disabled id="txt_maloaikiemke" readonly="readonly"></td>
             </tr>
             <tr>
					<td height="22" align="right" class="level_1_1">Tên kiểm kê mới: </td>
					<td width="50%" align="left" class="level_1_1">
                    	<input name="txt_tenloaikiemkemoi" type="text" class="txtbox" id="txt_tenloaikiemkemoi" style="width:100%" onKeyPress="return keypress(event)" value="" maxlength="31">
					</td>
			</tr> 
            <tr>
              <td colspan="2" height="22" align="center" class="level_1_2">
                <input name="btn_luuloaikiemke" type="button" class="button_1" id="btn_luuloaikiemke" value="Lưu">
                </td>
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

        <table width="518" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="105" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="275" align="center">Xóa loại kiểm kê</td>
          <td width="138" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_xoaloaikiemke" id="frm_xoaloaikiemke">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
             <tr>
					<td height="22" align="right" class="level_1_2">Chọn loại kiểm kê:</td>
					<td width="50%" align="left" class="level_1_2">
                    	<select name="cbo_tenloaikiemkexoa" class="cbo" id="cbo_tenloaikiemkexoa" style="width:100%;">
                        </select>                       
                    </td>
			</tr>              
              <tr>
              <tr>
                <td height="22" align="right" class="level_1_1">Mã loại kiểm kê:</td>
                <td height="22" align="left" class="level_1_1"><label for="txtmakk"></label>
                  <input name="txtmakk" type="text" disabled id="txt_maloaikiemkexoa" readonly="readonly"></td>
              </tr>
              <tr>
						<td colspan="2" height="22" align="center" class="level_1_2">
                        <input name="btn_xoaloaikiemke" type="button" class="button_1" id="btn_xoaloaikiemke" value="Xóa">
                        </td>
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

