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
<title>Cập nhật quyền</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">

<script type="text/javascript" src="../js/jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/fill.js"></script>
<script type="text/javascript" src="js/capnhatquyen.js"></script>
<script type="text/javascript" >

$(document).ready(function() { 
	document.frm_themquyen.txt_tenquyen.focus();
	fillcombo('get_list_quyen.php',document.frm_suaquyen.cbo_tenquyensua);
	fillcombo('get_list_quyen.php',document.frm_xoaquyen.cbo_tenquyenxoa);	
	$('form[name="frm_suaquyen"] select[name="cbo_tenquyensua"]').change(function()
	{
		get_info_quyen('get_info_quyen.php',document.frm_suaquyen);
	});
	$('form[name="frm_xoaquyen"] select[name="cbo_tenquyenxoa"]').change(function()
	{
		get_info_quyen2('get_info_quyen.php',document.frm_xoaquyen);
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
    		<td height="100%" align="center" valign="top">   
		 	<table width="500" border="0" cellpadding="0" cellspacing="0">
       		<tbody>
					<tr class="main_1">
					  <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
					  <td width="419" align="center">Thêm quyền </td>
					  <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
					</tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_themquyen" id="frm_themquyen">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Tên quyền</td>
					<td width="70%" align="left" class="level_1_2"><input name="txt_tenquyen" id="txt_tenquyen" class="txtbox" style="width:100%"></td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_1">Diển giải</td>
					<td width="50%" align="left" class="level_1_1"><textarea name="txt_diengiai" id="txt_diengiai" rows="5" style="width:100%"></textarea></td>
              </tr>
              <tr>
              		<td colspan="2" height="22" align="center" class="level_1_1"><input type="button" name="btn_themquyen" id="btn_themquyen" class="button_1" value="Thêm"></td>
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
          <td width="419" align="center">Sửa quyền </td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_suaquyen" id="frm_suaquyen">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
              <tr>
              		<td height="22" align="right" class="level_1_1">Chọn tên quyền </td>
                    <td width="70%" align="left" class="level_1_1"><select class="cbo" name="cbo_tenquyensua" id="cbo_tenquyensua" style="width:100%">
                    </select></td>
              </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Tên mới </td>
					<td width="50%" align="left" class="level_1_2"><input name="txt_tenquyensua" id="txt_tenquyensua" class="txtbox" style="width:100%"></td>
			  </tr>
              
           
			
              <tr>
					<td height="22" align="right" class="level_1_1">Diễn giải </td>
					<td width="50%" align="left" class="level_1_1">
					<textarea name="txt_diengiaisua" id="txt_diengiaisua" rows="5" style="width:100%"></textarea>					</td>
			  </tr>
              <tr>
              		<td colspan="2" height="22" align="center" class="level_1_2"><input type="button" class="button_1" name="btn_suaquyen" id="btn_suaquyen" value="Sửa" ></td>
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
          <td width="419" align="center">Xóa quyền </td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_xoaquyen" id="frm_xoaquyen">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_2"></td>
              </tr>
              
              <tr>
					<td height="22" align="right" class="level_1_2">Chọn tên quyền</td>
					<td width="70%" align="left" class="level_1_2"><select class="cbo" name="cbo_tenquyenxoa" id="cbo_tenquyenxoa" style="width:100%"></select></td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Diễn giải</td>
					<td width="70%" align="left" class="level_1_2"><textarea name="txt_diengiaixoa" id="txt_diengiaixoa" rows="5" style="width:100%"></textarea></td>
			  </tr>
              <tr>
              		<td colspan="2" height="22" align="center" class="level_1_2"><input type="button" name="btn_xoaquyen" id="btn_xoaquyen" class="button_1" value="Xóa"></td>
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

