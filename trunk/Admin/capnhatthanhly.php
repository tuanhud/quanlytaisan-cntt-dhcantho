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
            <td colspan="3" align="left"><form name="frm_themban">
              <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">
                <tbody>
                  <tr>
                    <td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_2">Chọn tài sản cần thanh lý:</td>
                    <td width="50%" align="left" class="level_1_2"><select name="cbo_tenloaithietbi" class="cbo" style="width:100%;">
                    </select></td>
                  <tr>
                    <td height="22" align="right" class="level_1_2">Mã tài sản:</td>
                    <td width="50%" align="left" class="level_1_2"><input name="txt_tenthietbi" type="text" disabled class="txtbox"  onKeyPress="return keypress(event)" value="" maxlength="31" readonly="readonly"></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Số lượng tài sản:</td>
                    <td width="50%" align="left" class="level_1_1"><input name="txt_donvitinh" maxlength="31" type="text" class="txtbox"  value="" onKeyPress="return keypress(event)"></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Năm thanh lý: </td>
                    <td width="50%" align="left" class="level_1_1"><label for="cbonamtl"></label>
                      <select name="cbonamtl" id="cbonamtl" style="width:40%">
                      </select></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Diễn giải thanh lý:</td>
                    <td width="50%" align="left" class="level_1_1"><textarea name="txt_model" class="txtbox" style="width:100%" onKeyPress="return keypress(event)"></textarea></td>
                  </tr>
                  <tr>
                    <td colspan="2" height="22" align="center" class="level_1_2"><input type="button" class="button_1" value="Thêm"></td>
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
            <td colspan="3" align="left"><form name="frm_themban">
              <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">
                <tbody>
                  <tr>
                    <td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_2">Chọn tài sản cần sửa thanh lý:</td>
                    <td width="50%" align="left" class="level_1_2"><select name="cbo_tenloaithietbi" class="cbo" style="width:100%;">
                    </select></td>
                  <tr>
                    <td height="22" align="right" class="level_1_2">Mã tài sản:</td>
                    <td width="50%" align="left" class="level_1_2"><input name="txt_tenthietbi" type="text" disabled class="txtbox" style="width:100%" onKeyPress="return keypress(event)" value="" maxlength="31" readonly="readonly"></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Mã thanh lý:</td>
                    <td align="left" class="level_1_1"><label for="txtmatl"></label>
                      <input name="txtmatl" type="text" disabled id="txtmatl" readonly="readonly"></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Số lượng tài sản:</td>
                    <td width="50%" align="left" class="level_1_1"><input name="txt_donvitinh" maxlength="31" type="text" class="txtbox" value="" onKeyPress="return keypress(event)"></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Năm thanh lý: </td>
                    <td width="50%" align="left" class="level_1_1"><label for="cbonamtl"></label>
                      <select name="cbonamtl" id="cbonamtl" style="width:40%">
                      </select></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Diễn giải thanh lý:</td>
                    <td width="50%" align="left" class="level_1_1"><textarea name="txt_model" class="txtbox" style="width:100%" onKeyPress="return keypress(event)"></textarea></td>
                  </tr>
                  <tr>
                    <td colspan="2" height="22" align="center" class="level_1_2"><input type="button" class="button_1" value="Lưu"></td>
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
            <td width="419" align="center">Xóa thanh lý</td>
            <td width="180" align="right"><img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
          </tr>
          <tr>
            <td colspan="3" align="left"><form name="frm_themban">
              <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">
                <tbody>
                  <tr>
                    <td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_2">Chọn tài sản cần xóa thanh lý:</td>
                    <td width="50%" align="left" class="level_1_2"><select name="cbo_tenloaithietbi" class="cbo" style="width:100%;">
                    </select></td>
                  <tr>
                    <td height="22" align="right" class="level_1_2">Mã tài sản:</td>
                    <td width="50%" align="left" class="level_1_2"><input name="txt_tenthietbi" type="text" disabled class="txtbox" style="width:100%" onKeyPress="return keypress(event)" value="" maxlength="31" readonly="readonly"></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Mã thanh lý:</td>
                    <td align="left" class="level_1_1"><label for="txtmatl"></label>
                      <input name="txtmatl" type="text" disabled id="txtmatl" readonly="readonly"></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Số lượng tài sản:</td>
                    <td width="50%" align="left" class="level_1_1"><input name="txt_donvitinh" type="text" disabled class="txtbox"  onKeyPress="return keypress(event)" value="" maxlength="31" readonly="readonly"></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Năm thanh lý: </td>
                    <td width="50%" align="left" class="level_1_1"><label for="cbonamtl"></label>
                      <select name="cbonamtl" id="cbonamtl" style="width:40%">
                      </select></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Diễn giải thanh lý:</td>
                    <td width="50%" align="left" class="level_1_1"><textarea name="txt_model" disabled readonly="readonly" class="txtbox" style="width:100%" onKeyPress="return keypress(event)"></textarea></td>
                  </tr>
                  <tr>
                    <td colspan="2" height="22" align="center" class="level_1_2"><input type="button" class="button_1" value="Xóa"></td>
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