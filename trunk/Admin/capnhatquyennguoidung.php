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
<title>Cập nhật quyền - người dùng</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script type="text/javascript" src="../js/yui.js"></script>
<script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/fill.js"></script>
<script type="text/javascript" src="js/capnhatdonvi.js"></script>
<script type="text/javascript" src="js/table-quyen-nguoidung.js"></script>
<script type="text/javascript" src="js/quyen-nguoidung.js"></script>
<script type="text/javascript" >

$(document).ready(function() { 
	/*document.frm_themdonvi.txt_tendonvithem.focus();
	
	fillcombo('get_list_donvi.php',document.frm_xoadonvi.cbo_tendonvixoa);	
	$('form[name="frm_suadonvi"] select[name="cbo_tendonvisua"]').change(function(){
		get_info_donvi('get_info_donvi.php',document.frm_suadonvi);
	});*/
	createTable_nguoidung();
	fillcombo('get_list_donvi.php',document.frm_capnhatquyen_nguoidung.cbo_tendonvi);
	//Create table after loading page
	$('form[name="frm_capnhatquyen_nguoidung"] select[name="cbo_tendonvi"]').change(function(){		
			
			getRecord2('get_list_canbo_donvi.php',document.frm_capnhatquyen_nguoidung.cbo_tendonvi.value);
		});
	$('form[name="frm_capnhatquyen_nguoidung"] input[name="btn_capnhat"]').click(function(){		
		themlistquyen_nguoidung('themquyen_nguoidung.php',document.frm_capnhatquyen_nguoidung);
	});
	
}); 
//addRow_('get_list_canbo_donvi.php',document.frm_capnhatquyen_nguoidung);
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
    <br>Xin chào, <?=$_SESSION['hotencanbo']?>
    <br>
	(<?=$_SESSION['masocanbo']?>)
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
    <td height="100%" align="center" valign="middle">   
		 <table width="700" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Cập nhật quyền người dùng</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_capnhatquyen_nguoidung" id="frm_capnhatquyen_nguoidung">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_2"></td>
                    <td class="level_1_2"></td>
              </tr>
               <tr>
					<td height="22" align="right" class="level_1_1">Chọn đơn vị</td>
					<td width="80%" align="left" class="level_1_1">
                    	<select id="cbo_tendonvi" name="cbo_tendonvi" class="cbo" style="width:80%;">
                        </select></td>
			</tr>
              <!--bang thuoc tinh dat o day-->
               
                    <tr>
                        <td align="center" height="400" class="level_1_1" colspan="4" valign="top">
                        <div class="yui3-skin-sam">                    
                        <div id="mytable"></div>                    
                        </div>
                        </td>
                </tr>
                      
              <tr>
              		<td colspan="2" height="22" align="center" class="level_1_2"><input type="button" name="btn_capnhat" id="btn_capnhat" class="button_1" value="Lưu"></td>
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

