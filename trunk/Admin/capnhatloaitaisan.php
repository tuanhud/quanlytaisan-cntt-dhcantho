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
<title>Cập nhật loại thiết bị</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">

<script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/fill.js"></script>
<script type="text/javascript" src="js/capnhatloaitaisan.js"></script>
<script type="text/javascript" >
//Không cho nhập ký tự

$(document).ready(function() { 
	document.frm_themloaitaisan.txt_tenloaitaisanthem.focus();
	fillcombo('get_list_loaitaisan.php',document.frm_sualoaitaisan.cbo_tenloaitaisansua);
	fillcombo('get_list_loaitaisan.php',document.frm_xoaloaitaisan.cbo_tenloaitaisanxoa);	
	$('form[name="frm_sualoaitaisan"] select[name="cbo_tenloaitaisansua"]').change(function()
	{
		get_info_loaitaisan('get_info_loaitaisan.php',document.frm_sualoaitaisan);
	});
	$('form[name="frm_xoaloaitaisan"] select[name="cbo_tenloaitaisanxoa"]').change(function()
	{
		get_info_loaitaisan2('get_info_loaitaisan.php',document.frm_xoaloaitaisan);
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
		 <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Thêm loại tài sản - thiết bị </td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_themloaitaisan" id="frm_themloaitaisan">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
               <tr>
					<td height="22" align="right" class="level_1_2">Tên loại thiết bị</td>
					<td width="70%" align="left" class="level_1_2">
                    	<input name="txt_tenloaitaisanthem" id="txt_tenloaitaisanthem" type="text" class="txtbox" style="width:100%"></td>
			</tr>
			 <tr>
					<td height="22" align="right" class="level_1_1">Diễn giải</td>
					<td width="50%" align="left" class="level_1_1">
                    	<textarea name="txt_diengiaithem" id="txt_diengiaithem" rows="5" style="width:100%"></textarea></td>
			</tr>                
				<tr>
              		<td colspan="2" height="22" align="center" class="level_1_1"><input name="btn_themloaitaisan" id="btn_themloaitaisan" type="button" class="button_1" value="Thêm"></td>
              </tr>  
              </tbody>
           </table>
           </form>
          </td>
        </tr>		
        </tbody>
        </table>
		<br>
		<br>
        <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Sửa loại thiết bị </td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_sualoaitaisan" id="frm_sualoaitaisan">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_2"></td>
                    <td class="level_1_2"></td>
              </tr>
             <tr>
					<td height="22" align="right" class="level_1_1">Chọn tên loại thiết bị </td>
					<td width="70%" align="left" class="level_1_1">
                    	<select name="cbo_tenloaitaisansua" id="cbo_tenloaitaisansua" class="cbo" style="width:100%;">
                        </select>                       
                    </td>
			</tr>
            <tr>
					<td height="22" align="right" class="level_1_1">Tên mới </td>
					<td width="50%" align="left" class="level_1_1">
                    	<input name="txt_tenloaitaisansua" id="txt_tenloaitaisansua" maxlength="31" type="text" class="txtbox" style="width:100%" value="" onKeyPress="return keypress(event)">
					</td>
			</tr>              
             <tr>
					<td height="22" align="right" class="level_1_2">Diễn giải</td>
					<td width="50%" align="left" class="level_1_2">
                    	<textarea name="txt_diengiaisua" id="txt_diengiaisua" rows="5" style="width:100%"></textarea>
					</td>
			</tr> 
            <tr>
						<td colspan="2" height="22" align="center" class="level_1_2">
                        <input name="btn_sualoaitaisan" id="btn_sualoaitaisan" type="button" class="button_1" value="Sửa">
                        </td>
			</tr>
				  						  
            </tbody>
        </table>
        	</form>
       </td>
      </tr>		
      </tbody>
      </table>
		<br>
		<br>
        <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Xóa loại thiết bị</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_xoaloaitaisan" id="frm_xoaloaitaisan">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_2"></td>
                    <td class="level_1_2"></td>
              </tr>
             <tr>
					<td height="22" align="right" class="level_1_1">Chọn tên loại thiết bị </td>
					<td width="50%" align="left" class="level_1_1">
                    	<select name="cbo_tenloaitaisanxoa" id="cbo_tenloaitaisanxoa" class="cbo" style="width:100%;">
                        </select>                       
                    </td>
			</tr> 
             <tr>
					<td height="22" align="right" class="level_1_1">Diễn giải</td>
					<td width="70%" align="left" class="level_1_1">
                    	<textarea name="txt_diengiaixoa" id="txt_diengiaixoa" rows="5" style="width:100%"></textarea>                       
                    </td>
			</tr>                 
              <tr>
            <tr>
						<td colspan="2" height="22" align="center" class="level_1_2">
                        <input name="btn_xoaloaitaisan" id="btn_xoaloaitaisan" type="button" class="button_1" value="Xóa">
                        </td>
			</tr>
				  						  
            </tbody>
        </table>
        	</form>
       </td>
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

