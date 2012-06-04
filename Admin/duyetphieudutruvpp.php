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
<title>Duyệt phiếu dự trù văn phòng phẩm</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">

<script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/fill.js"></script>
<script type="text/javascript" src="js/duyetphieudutruvpp.js"></script>
<script type="text/javascript" >
$(document).ready(function() { 
	fillcombo('get_list_donvi.php',document.frm_duyetphieudutruvpp.cbo_donviduyet);
	fillcombo2('get_list_nam.php',document.frm_duyetphieudutruvpp.cbo_namduyet);
	fillcombo2('get_list_quy.php',document.frm_duyetphieudutruvpp.cbo_quyduyet);
	$('form[name="frm_duyetphieudutruvpp"] select[name="cbo_quyduyet"]').change(function(){
		fillcombo3bien('get_list_maphieudutruvpp.php',document.frm_duyetphieudutruvpp.cbo_donviduyet,document.frm_duyetphieudutruvpp.cbo_namduyet,document.frm_duyetphieudutruvpp.cbo_quyduyet, document.frm_duyetphieudutruvpp.cbo_maphieuduyet);
	});
	$('form[name="frm_duyetphieudutruvpp"] select[name="cbo_namduyet"]').change(function(){
		fillcombo3bien('get_list_maphieudutruvpp.php',document.frm_duyetphieudutruvpp.cbo_donviduyet,document.frm_duyetphieudutruvpp.cbo_namduyet,document.frm_duyetphieudutruvpp.cbo_quyduyet, document.frm_duyetphieudutruvpp.cbo_maphieuduyet);
	});
	$('form[name="frm_duyetphieudutruvpp"] select[name="cbo_donviduyet"]').change(function(){
		fillcombo3bien('get_list_maphieudutruvpp.php',document.frm_duyetphieudutruvpp.cbo_donviduyet,document.frm_duyetphieudutruvpp.cbo_namduyet,document.frm_duyetphieudutruvpp.cbo_quyduyet, document.frm_duyetphieudutruvpp.cbo_maphieuduyet);
	});
	
	fillcombo('get_list_donvi.php',document.frm_huyphieudutruvpp.cbo_donvihuy);
	fillcombo2('get_list_nam.php',document.frm_huyphieudutruvpp.cbo_namhuy);
	fillcombo2('get_list_quy.php',document.frm_huyphieudutruvpp.cbo_quyhuy);
	$('form[name="frm_huyphieudutruvpp"] select[name="cbo_namhuy"]').change(function(){
		fillcombo3bien('get_list_maphieudutruvpp2.php',document.frm_huyphieudutruvpp.cbo_donvihuy,document.frm_huyphieudutruvpp.cbo_namhuy,document.frm_huyphieudutruvpp.cbo_quyhuy, document.frm_huyphieudutruvpp.cbo_maphieuhuy);
	});
	$('form[name="frm_huyphieudutruvpp"] select[name="cbo_donvihuy"]').change(function(){
		fillcombo3bien('get_list_maphieudutruvpp2.php',document.frm_huyphieudutruvpp.cbo_donvihuy,document.frm_huyphieudutruvpp.cbo_namhuy,document.frm_huyphieudutruvpp.cbo_quyhuy, document.frm_huyphieudutruvpp.cbo_maphieuhuy);
	});
	$('form[name="frm_huyphieudutruvpp"] select[name="cbo_quyhuy"]').change(function(){
		fillcombo3bien('get_list_maphieudutruvpp2.php',document.frm_huyphieudutruvpp.cbo_donvihuy,document.frm_huyphieudutruvpp.cbo_namhuy,document.frm_huyphieudutruvpp.cbo_quyhuy, document.frm_huyphieudutruvpp.cbo_maphieuhuy);
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
             
             <td class="tittle_header"><img src="../images/ctulogo1.gif"></td>
             
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
          <td width="419" align="center">Duyệt</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_duyetphieudutruvpp" id="frm_duyetphieudutruvpp">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Chọn đơn vị</td>
					<td width="50%" align="left" class="level_1_2">
                    	<select name="cbo_donviduyet" id="cbo_donviduyet" class="cbo" style="width:100%;">
                        </select>                       
                    </td>
			</tr>
            <tr>
					<td height="30" align="right" class="level_1_1">Chọn năm</td>
					<td width="50%" align="left" class="level_1_1">
                    	<select name="cbo_namduyet" id="cbo_namduyet" class="cbo" style="width:100%;">
                        </select></td>
			</tr>    
             <tr>
					<td height="22" align="right" class="level_1_2">Chọn quý</td>
					<td width="50%" align="left" class="level_1_2"><select name="cbo_quyduyet" id="cbo_quyduyet" class="cbo" style="width:100%;">
                        </select></td>
			</tr>
             <tr>
					<td height="22" align="right" class="level_1_1">Chọn mã phiếu dự trù</td>
					<td width="50%" align="left" class="level_1_1"><select name="cbo_maphieuduyet" id="cbo_maphieuduyet" class="cbo" style="width:100%;">
                        </select></td>
			</tr>               
              <tr>
                <td colspan="2" height="22" align="center" class="level_1_2"><input type="button" name="btn_duyet" id="btn_duyet" class="button_1" value="Duyệt"></td>
              </tr>
			  
	
              </tbody>
           </table>
           </form>
          </td>
        </tr>		
        </tbody>
        </table>
<br/>
        <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Bỏ duyệt</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_huyphieudutruvpp" id="frm_huyphieudutruvpp">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Chọn đơn vị</td>
					<td width="50%" align="left" class="level_1_2">
                    	<select name="cbo_donvihuy" id="cbo_donvihuy" class="cbo" style="width:100%;">
                        </select>                       
                    </td>
			</tr>
            <tr>
					<td height="30" align="right" class="level_1_1">Chọn năm</td>
					<td width="50%" align="left" class="level_1_1">
                    	<select name="cbo_namhuy" id="cbo_namhuy" class="cbo" style="width:100%;">
                        </select></td>
			</tr>    
             <tr>
					<td height="22" align="right" class="level_1_2">Chọn quý</td>
					<td width="50%" align="left" class="level_1_2"><select name="cbo_quyhuy" id="cbo_quyhuy" class="cbo" style="width:100%;">
                        </select></td>
			</tr>
             <tr>
					<td height="22" align="right" class="level_1_1">Chọn mã phiếu dự trù</td>
					<td width="50%" align="left" class="level_1_1"><select name="cbo_maphieuhuy" id="cbo_maphieuhuy" class="cbo" style="width:100%;">
                        </select></td>
			</tr>         
            <tr>
              <td colspan="2" height="22" align="center" class="level_1_2">
                <input type="button" name="btn_huy" id="btn_huy" class="button_1" value="Bỏ duyệt">
                </td>
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

