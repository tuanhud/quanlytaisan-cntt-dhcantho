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
<title>Cập nhật nội dung con</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/fill.js"></script>
<script type="text/javascript" src="js/capnhatnoidungcon.js"></script>
<script type="text/javascript" src="js/table-noidungcon.js"></script>
<script type="text/javascript" src="js/yui/yui-min.js"></script>
 
<script type="text/javascript">
$(document).ready(function() { 
	createTable();
	fillcombo('get_list_noidunglon.php',document.frm_themnoidungcon.cbo_tennoidunglon);
	fillcombo('get_list_noidunglon.php',document.frm_suanoidungcon.cbo_tennoidunglon);
	fillcombo('get_list_noidunglon.php',document.frm_themnoidungcon.cbo_tennoidungcon);
	//fillcombo('get_list_noidungcon.php',document.frm_suanoidungcon.cbo_tennoidungcon);
	$('form[name="frm_themnoidungcon"] select[name="cbo_tennoidunglon"]').change(function(){
		get_info_manoidunglonthem('get_info_manoidunglon.php',document.frm_themnoidungcon);
	});
	$('form[name="frm_suanoidungcon"] select[name="cbo_tennoidunglon"]').change(function(){
		get_info_noidungconsua('get_info_noidungcon.php',document.frm_suanoidungcon.cbo_tennoidunglon.value);
	});

    });
</script>
<script>	
	function thoat(){
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
    <td width="778" height="26" valign="middle">       	 
	<!--Thẻ hiển thị thông tin khi đăng nhập-->
	<div style="Z-INDEX: 1; LEFT: 538px; WIDTH: 200px; POSITION: absolute; TOP: 51px; HEIGHT: 30px" align="center">
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
         <td width="20" class="tl_header">&nbsp;</td>
         <td width="740" class="tc_header">&nbsp;</td>
         <td width="19" class="tr_header">&nbsp;</td>
       </tr>
       <tr>
         <td class="cl_header">&nbsp;</td>
         <td class="cm_header">
         <table width="103%" border="0" cellspacing="0" cellpadding="0">
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
    	<table align="center" border="0" cellpadding="0" cellspacing="0" width="751">      
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
        <td width="1%" align="center" >&nbsp;</td>
        <td width="1%" align="center" >&nbsp;</td>
        </tr>                        
      <tr>
      <!--BẮT ĐẦU LEFT MAIN INFO-->
      <td align="center" width="98%"><table width="707" border="0" cellpadding="0" cellspacing="0">
        <tbody>
          <tr class="main_1">
            <td width="212" align="left"><img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
            <td width="366" align="center">Thêm nội dung con</td>
            <td width="129" align="right"><img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
          </tr>
          <tr>
            <td colspan="3" align="left"><form name="frm_themnoidungcon" id="frm_themnoidungcon">
              <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">
                <tbody>
                  <tr>
                    <td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_2">Chọn tên nội dung lớn:</td>
                    <td width="50%" align="left" class="level_1_2"><select name="cbo_tennoidunglon" class="cbo" id="cbo_tennoidunglon" style="width:100%;">
                    </select></td>
                  
                  <tr>
                    <td height="22" align="right" class="level_1_1">Mã nội dung lớn:</td>
                    <td height="22" align="left" class="level_1_1"><label for="txtmndl"></label>
                      <input name="txt_manoidunglon" type="text" disabled id="txt_manoidunglon" readonly="readonly"></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Tên nội dung con:</td>
                    <td height="22" align="center" class="level_1_1"><label for="txttendc"></label>
                      <label for="cbo_tennoidungcon"></label>
                      <select name="cbo_tennoidungcon" id="cbo_tennoidungcon" style="width:100%">
                      </select></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Thêm nội dung con từ file:</td>
                    <td height="22" align="left" class="level_1_1"><label for="textfield"></label>
                      <input type="file" name="txt_browse" id="txt_browse"></td>
                  </tr>
                  <tr>
                    <td colspan="2" height="22" align="center" class="level_1_2"><input type="button" class="button_1" id="btn_themnoidungcon" value="Thêm">
                      <input name="Reset" type="reset" class="button_1" id="btn_huy" value="Hủy"></td>
                  </tr>
                  <tr>
                    <td colspan="2" height="22" align="center" class="level_1_1">     </td>
                  </tr>
                </tbody>
              </table>
              
            </form>
            </td>
          </tr>
        </tbody>
      </table>
      <table width="710" border="0" cellpadding="0" cellspacing="0">
        <tbody>
          <tr class="main_1">
            <td width="211" align="left"><img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
            <td width="368" align="center">Sửa nội dung con</td>
            <td width="131" align="right"><img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
          </tr>
          <tr>
            <td colspan="3" align="left"><form name="frm_suanoidungcon" id="frm_suanoidungcon">
              <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">
                <tr>
                  <td height="22" align="right" class="level_1_1">&nbsp;</td>
                  <td width="50%" height="22" align="center" class="level_1_1">&nbsp;</td>
                </tr>
                <tr>
                  <td height="22" align="right" class="level_1_1">Chọn tên nội dung:</td>
                  <td height="22" align="center" class="level_1_1"><label for="txttendc3"></label>
                    <label for="cbo_tennoidungconsua"></label>
                    <select name="cbo_tennoidunglon" id="cbo_tennoidunglon" style="width:100%">
                    </select></td>
                </tr>
                <tr>
                <td align="center" height="200" class="level_1_1" colspan="4" valign="top">
                    <div class="yui3-skin-sam">                    
                    <div id="mytable"></div>                    
                    </div>
                    </td>
                  </tr>
                <tbody>
                  <tr>
                    <td colspan="2" height="22" align="center" class="level_1_2"><input name="btn_luunoidungcon" type="button" class="button_1" id="btn_luunoidungcon" value="Lưu">
                      <input name="Reset" type="reset" class="button_1" id="btn_huy" value="Hủy"></td>
                  </tr>
                  <tr>
                    <td colspan="2" height="22" align="center" class="level_1_1"></td>
                    </tr>
                </tbody>
              </table>
              
            </form>
            </td>
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
  <tbody>
  <tr>
    <td width="20" class="cl_footer">&nbsp;</td>
    <td width="738" class="cm_footer"><div align="right" class="copy"><!--Copyright © 2008 by <a href="http://www.cuscsoft.com" target="_blank" class="white"><strong>CUSC</strong></a>--></div></td>
    <td width="20" class="cr_footer">&nbsp;</td>
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
