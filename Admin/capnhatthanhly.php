<?php	
	//khoi dong session
	session_start();	
	//kiem tra quyen truoc khi hien thi trang
	/*if(!session_is_registered("maquyen") || $_SESSION['maquyen']!="AD")
	{
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	echo "<script language=javascript>window.location = 'loginUI.php';</script>"; 
	exit;
	}*/
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cập nhật thanh lý</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/fill.js"></script>
<script type="text/javascript" src="js/date.js"></script>
<script type="text/javascript" src="js/capnhatthanhly.js"></script>
<script type="text/javascript">

$(document).ready(function() { 
	fillcombo('get_list_taisan.php',document.frm_themthanhly.cbo_tentaisanthanhlythem);
	fillcombo('get_list_taisan.php',document.frm_suathanhly.cbo_tentaisanthanhlysua);
	fillcombo('get_list_taisan.php',document.frm_xoathanhly.cbo_tentaisanthanhlyxoa);
	// Load ngay thang nam  cho nguoi dung chon them
	nam(document.frm_themthanhly.cbo_namthem);
	nam(document.frm_suathanhly.cbo_namsua);
	nam(document.frm_xoathanhly.cbo_namxoa);
	$('form[name="frm_themthanhly"] select[name="cbo_tentaisanthanhlythem"]').change(function(){
		get_info_mataisan('get_info_mataisan.php',document.frm_themthanhly);
	});
	//su kien nhan button them
	/*$('form[name="frm_themban"] input[type="button"]').click(function(){
		themban('../themban.php',document.frm_themban);	
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

<script>	
	function thoat() {
		if (confirm('Ban co chac chan muon thoat khong ?' )) {
			document.location = '../logout.php';
			return;
		}
	}
</script>
</head>
<body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0" ondragstart="return false" onselectstart="return false" class="yui3-skin-sam">  
<table width="778" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tbody>  
  <!--Bắt đầu của HEADER-->
  <tr> 
    <td height="26" valign="middle">       	 
	<!--Thẻ hiển thị thông tin khi đăng nhập-->
	<div style="Z-INDEX: 1; LEFT: 550px; WIDTH: 200px; POSITION: absolute; TOP: 46px; HEIGHT: 30px" align="center">
		<font style="FONT-WEIGHT: 700; FONT-SIZE: 8pt; line-height:20px;" face="Tahoma" color="#FFFFFF">
			<a class="white" href="../doimatkhauUI.php">Cập nhật thông tin cá nhân</a> | <a class="white" href="javascript:thoat();">Thoát</a>
      <br>Xin chào, <?=$_SESSION['hoten']?>
    		<br>
    		(<font style="FONT-WEIGHT: 700; FONT-SIZE: 8pt; line-height:20px;" face="Tahoma" color="#FFFFFF">
    		<?=$_SESSION['msad']?>
    		</font>)    	</font>    </div>
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
         <td class="cm_header">
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
         <tbody>
           <tr>            
             <td class="tittle_header"><img src="../images/ctulogo1.gif" alt=""></td>             
           </tr>
         </tbody>
         </table>         </td>
         <td class="cr_header">&nbsp;</td>
       </tr>       
     </tbody></table></td>
   </tr>
 </tbody></table>    </td>    
  </tr>
  <!--Kết thúc của HEADER--> 
  <!--Bắt đàu của MAINPAGE-->
  
  <tr>
	<td height="54%" valign="middle">
    	<table align="center" border="0" cellpadding="0" cellspacing="0" width="752">      
	    <tbody>
        <tr height="10">        
	   	<td align="center" colspan="3">
        <?php
		include_once('node-menunav-3ad.php');
		?> 
</script>        </td>
	    <!--<td align="center" >&nbsp;</td>
	    <td align="center">&nbsp;</td>-->
	    </tr>
        <tr>
        <td align="center" >&nbsp;</td>
        <td align="center" >&nbsp;</td>
        <td align="center" >&nbsp;</td>
        </tr>                        
      <tr>
      <!--BẮT ĐẦU LEFT MAIN INFO-->
      <td align="center" width="100%"><table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
          <tr class="main_1">
            <td width="161" align="left"><img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
            <td width="419" align="center">Thêm  thanh lý</td>
            <td width="180" align="right"><img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
          </tr>
          <tr>
            <td colspan="3" align="left"><form name="frm_themthanhly" id="frm_themthanhly">
              <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">
                <tbody>
                  <tr>
                    <td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_2">Chọn tài sản cần thanh lý:</td>
                    <td width="50%" align="left" class="level_1_2"><select name="cbo_tentaisanthanhlythem" class="cbo" id="cbo_tentaisanthanhlythem" style="width:100%;">
                    </select></td>
                  <tr>
                    <td height="22" align="right" class="level_1_2">Mã tài sản:</td>
                    <td width="50%" align="left" class="level_1_2"><input name="txt_mataisanthem" type="text" disabled class="txtbox" id="txt_mataisanthem"  onKeyPress="return keypress(event)" value="" maxlength="31" readonly="readonly"></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Số lượng tài sản:</td>
                    <td width="50%" align="left" class="level_1_1"><input name="txt_donvitinh" type="text" class="txtbox" id="txt_soluongtaisan" onKeyPress="return keypress(event)"  value="" maxlength="31"></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Năm thanh lý: </td>
                    <td width="50%" align="left" class="level_1_1"><label for="cbonamtl"></label>
                      <select name="cbo_namthem" id="cbo_namthem" style="width:40%">
                      </select></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Diễn giải thanh lý:</td>
                    <td width="50%" align="left" class="level_1_1"><textarea name="txt_diengiai" class="txtbox" id="txt_diengiai" style="width:100%" onKeyPress="return keypress(event)"></textarea></td>
                  </tr>
                  <tr>
                    <td colspan="2" height="22" align="center" class="level_1_2"><input name="btn_themthanhly" type="button" class="button_1" id="btn_themthanhly" value="Thêm">
                      <input name="btn_huy" type="reset" class="button_1" id="btn_huy" value="Hủy"></td>
                  </tr>
                  <tr>
                    <td colspan="2" height="22" align="center" class="level_1_1">&nbsp;</td>
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
            <td width="419" align="center">Sửa  thanh lý tài sản</td>
            <td width="180" align="right"><img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
          </tr>
          <tr>
            <td colspan="3" align="left"><form name="frm_suathanhly" id="frm_suathanhly">
              <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">
                <tbody>
                  <tr>
                    <td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_2">Chọn tài sản cần sửa thanh lý:</td>
                    <td width="50%" align="left" class="level_1_2"><select name="cbo_tentaisanthanhlysua" class="cbo" id="cbo_tentaisanthanhlysua" style="width:100%;">
                    </select></td>
                  <tr>
                    <td height="22" align="right" class="level_1_2">Mã tài sản:</td>
                    <td width="50%" align="left" class="level_1_2"><input name="txt_mataisansua" type="text" disabled class="txtbox" id="txt_mataisansua" onKeyPress="return keypress(event)" value="" maxlength="31" readonly="readonly"></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Mã thanh lý:</td>
                    <td align="left" class="level_1_1"><label for="txtmatl"></label>
                      <input name="txt_mathanhlysua" type="text" disabled id="txt_mathanhlysua" readonly="readonly"></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Số lượng tài sản:</td>
                    <td width="50%" align="left" class="level_1_1"><input name="txt_donvitinh" type="text" class="txtbox" id="txt_soluongtaisan" onKeyPress="return keypress(event)" value="" maxlength="31"></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Năm thanh lý: </td>
                    <td width="50%" align="left" class="level_1_1"><label for="cbonamtl"></label>
                      <select name="cbo_namsua" id="cbo_namsua" style="width:40%">
                      </select></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Diễn giải thanh lý:</td>
                    <td width="50%" align="left" class="level_1_1"><label for="txt_diengiai"></label>
                      <textarea name="txt_diengiai" id="txt_diengiai" style="width:100%"></textarea></td>
                  </tr>
                  <tr>
                    <td colspan="2" height="22" align="center" class="level_1_2"><input type="button" class="button_1" value="Lưu">
                      <input name="btn_huy" type="reset" class="button_1" id="btn_huy" value="Hủy"></td>
                  </tr>
                  <tr>
                    <td colspan="2" height="22" align="center" class="level_1_1">&nbsp;</td>
                  </tr>
                </tbody>
              </table>
            </form></td>
          </tr>
        </tbody>
      </table>
      <span class="level_1_1">
      <textarea name="txt_model2" class="txtbox" style="width:100%" onKeyPress="return keypress(event)"></textarea>
      </span>
      <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
          <tr class="main_1">
            <td width="161" align="left"><img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
            <td width="419" align="center">Xóa thanh lý</td>
            <td width="180" align="right"><img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
          </tr>
          <tr>
            <td colspan="3" align="left"><form name="frm_xoathanhly" id="frm_xoathanhly">
              <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">
                <tbody>
                  <tr>
                    <td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_2">Chọn tài sản cần xóa thanh lý:</td>
                    <td width="50%" align="left" class="level_1_2"><select name="cbo_tentaisanthanhlyxoa" id="cbo_tentaisanthanhlyxoa" class="cbo" style="width:100%;">
                    </select></td>
                  <tr>
                    <td height="22" align="right" class="level_1_2">Mã tài sản:</td>
                    <td width="50%" align="left" class="level_1_2"><input name="txt_tenthietbi" type="text" disabled class="txtbox" id="txt_mataisanxoa" onKeyPress="return keypress(event)" value="" maxlength="31" readonly="readonly"></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Mã thanh lý:</td>
                    <td align="left" class="level_1_1"><label for="txtmatl"></label>
                      <input name="txtmatl" type="text" disabled id="txt_mathanhlyxoa" readonly="readonly"></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Số lượng tài sản:</td>
                    <td width="50%" align="left" class="level_1_1"><input name="txt_donvitinh" type="text" disabled class="txtbox"  onKeyPress="return keypress(event)" value="" maxlength="31" readonly="readonly"></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Năm thanh lý: </td>
                    <td width="50%" align="left" class="level_1_1"><label for="cbonamtl"></label>
                      <select name="cbo_namxoa" id="cbo_namxoa" style="width:40%">
                      </select></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Diễn giải thanh lý:</td>
                    <td width="50%" align="left" class="level_1_1"><textarea name="txt_diengiai" disabled readonly="readonly" class="txtbox" id="txt_diengiai" style="width:100%" onKeyPress="return keypress(event)"></textarea></td>
                  </tr>
                  <tr>
                    <td colspan="2" height="22" align="center" class="level_1_2"><input type="button" class="button_1" value="Xóa">
                      <input name="btn_huy" type="reset" class="button_1" id="btn_huy" value="Hủy"></td>
                  </tr>
                  <tr>
                    <td colspan="2" height="22" align="center" class="level_1_1">&nbsp;</td>
                  </tr>
                </tbody>
              </table>
            </form></td>
          </tr>
        </tbody>
    </table></td>
      <!--KẾT THÚC LEFT MAIN INFO-->            
      </tr>   
    </tbody></table>    </td>
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
</tbody></table></td>
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
