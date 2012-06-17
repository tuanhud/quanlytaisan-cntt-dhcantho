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
<title>Cập nhật phiếu mẫu</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">

<script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="js/yui.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/fill.js"></script>
<script type="text/javascript" src="js/capnhatphieumau.js"></script>
<script type="text/javascript" src="js/table-noidung.js"></script>
<script type="text/javascript" src="js/table-noidungsua.js"></script>
<script type="text/javascript" src="js/date.js"></script>


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
	createTable();
	createTable1();
	fillcombo('get_list_phieumau.php',document.frm_suaphieumau.cbo_tenphieumausua);
	fillcombo('get_list_phieumau.php',document.frm_xoaphieumau.cbo_tenphieumauxoa);
	init_date_input(document.frm_themphieumau.cbo_ngay,document.frm_themphieumau.cbo_thang,document.frm_themphieumau.cbo_nam);
	init_date_input(document.frm_suaphieumau.cbo_ngaysua,document.frm_suaphieumau.cbo_thangsua,document.frm_suaphieumau.cbo_namsua);
	init_date_input(document.frm_xoaphieumau.cbo_ngayxoa,document.frm_xoaphieumau.cbo_thangxoa,document.frm_xoaphieumau.cbo_namxoa);
	$('form[name="frm_themphieumau"] input[name="btn_themphieumau"]').click(function(){		
		themnoidung(document.frm_themphieumau);
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
	(<?=$_SESSION['msclb']?>)
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
		 <table width="529" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="105" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="275" align="center">Thêm phiếu mẫu</td>
          <td width="149" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_themphieumau" id="frm_themphieumau">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1"></td>
                    <td width="50%" class="level_1_1"></td>
              </tr>
              <tr>
                <td height="22" align="right" class="level_1_2">Tên phiếu: </td>
                <td height="22" align="center" class="level_1_2"><label for="txttennd"></label>
                  <input type="text" name="txt_tenphieumau" id="txt_tenphieumau" style="width:100%"></td>
              </tr>
              <tr>
                <td height="22" align="right" class="level_1_1">Ngày lập phiếu:</td>
                <td height="22" align="left" class="level_1_1"><label for="txttendvt"></label>
                  <select name="cbo_ngay" id="cbo_ngay">
                    </select>
                  /
                  <label for="ng"></label>
                  <select name="cbo_thang" id="cbo_thang">
                    </select>
                  /
                  <label for="th">
                    <select name="cbo_nam" id="cbo_nam">
                      </select>
                    </label></td>
              </tr>
              <tr>
                <td height="22" align="right" class="level_1_2">Ghi chú: </td>
                <td height="22" align="center" class="level_1_2"><label for="txteraghichund"></label>
                  <label for="txtghind"></label>
                  <textarea name="txt_ghichu" rows="5" id="txt_ghichu" style="width:100%"></textarea></td>
              </tr>
              <tr>
                <td align="center" height="200" class="level_1_1" colspan="4" valign="top">
                    <div class="yui3-skin-sam">                    
                    <div id="mytable"></div>                    
                    </div>
                    </td>
              </tr>
              
              <tr>
                <td colspan="2" height="22" align="center" class="level_1_1"><input name="btn_themphieumau" type="button" class="button_1" id="btn_themphieumau" value="Thêm"></td>
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

        <table width="529" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="105" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="275" align="center">Sửa phiếu mẫu</td>
          <td width="149" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_suaphieumau" id="frm_suaphieumau">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_2"></td>
                    <td width="50%" class="level_1_2"></td>
              </tr>
              <tr>
                <td height="22" align="right" class="level_1_2">Chọn phiếu mẫu cần sửa:</td>
                <td align="left" class="level_1_2"><select name="cbo_tenphieumausua" class="cbo" id="cbo_tenphieumausua" style="width:100%;">
                </select></td>
                <tr>
                  <td height="22" align="right" class="level_1_2">Tên phiếu mẫu mới</td>
                  <td align="left" class="level_1_2"><label for="txttenphieumaumoi"></label>
                    <input type="text" name="txt_tenphieumaumoi" id="txt_tenphieumaumoi" style="width:100%"></td>
                <tr>
                  <td height="22" align="right" class="level_1_2">Ngày lập phiếu: </td>
                  <td align="left" class="level_1_2"><label for="ng2"></label>
                    <select name="cbo_ngaysua" id="cbo_ngaysua">
                    </select>
                    /
  <label for="th2"></label>
  <select name="cbo_thangsua" id="cbo_thangsua">
  </select>
  /
  <label for="nam"></label>
  <select name="cbo_namsua" id="cbo_namsua">
</select></td>
                  <tr>
                <td height="22" align="right" class="level_1_2">Ghi chú:: </td>
                <td align="left" class="level_1_2"><label for="ng2"></label>
                  <label for="txtghichu"></label>
                  <textarea name="txt_ghichu" rows="5" id="txt_ghichu" style="width:100%"></textarea></td>
              <tr>
                <td align="center" height="200" class="level_1_1" colspan="4" valign="top">
                    <div class="yui3-skin-sam">                    
                    <div id="mytable1"></div>                    
                    </div>
                    </td>
             </tr>
             <tr>
              <td colspan="2" height="22" align="center" class="level_1_2">
                <input name="btn_luuphieumau" type="button" class="button_1" id="btn_luuphieumau" value="Lưu">
                </td>
            </tr>
             <tr>
               <td colspan="2" height="22" align="center" class="level_1_2">&nbsp;</td>
             </tr>
				  						  
              </tbody>
        </table>
        	</form>
       </td>
      </tr>		
      </tbody>
      </table>

        <table width="591" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="105" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="275" align="center">Xóa phiếu mẫu</td>
          <td width="211" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_xoaphieumau" id="frm_xoaphieumau">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_2"></td>
                    <td width="50%" class="level_1_2"></td>
              </tr>
              <tr>
                <td height="22" align="right" class="level_1_1">Chọn phiếu mẫu: </td>
                <td align="left" class="level_1_1"><select name="cbo_tenphieumauxoa" class="cbo" id="cbo_tenphieumauxoa" style="width:100%;">
                </select></td>
              </tr>
              <tr>
                <td height="22" align="right" class="level_1_2">Mã phiếu: </td>
                <td align="left" class="level_1_2"><label for="txt_maphieu"></label>
                  <input name="txt_maphieumauxoa" type="text" disabled id="txt_maphieumauxoa" readonly="readonly"></td>
              <tr>
                <td height="22" align="right" class="level_1_2">Ngày lập phiếu: </td>
                <td align="left" class="level_1_2"><label for="ng3"></label>
                  <select name="cbo_ngayxoa" id="cbo_ngayxoa">
                  </select>
                  /
                  <label for="th3"></label>
                  <select name="cbo_thangxoa" id="cbo_thangxoa">
                  </select>
                  /
                  <label for="nam"></label>
                  <select name="cbo_namxoa" id="cbo_namxoa">
                  </select></td>
              <tr>
                <td height="22" align="right" class="level_1_2">Ghi chú:: </td>
                <td align="left" class="level_1_2"><label for="ng4"></label>
                  <label for="txtghichu"></label>
                  <textarea name="txt_ghichu" rows="5" disabled readonly="readonly" id="txt_ghichu" style="width:100%"></textarea></td>
                  
            <tr>
              <td colspan="2" height="22" align="center" class="level_1_2">
                <input name="btn_xoaphieumau" type="button" class="button_1" id="btn_xoaphieumau" value="Xóa">
                </td>
            </tr>
            <tr>
              <td colspan="2" height="22" align="center" class="level_1_2">&nbsp;</td>
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

