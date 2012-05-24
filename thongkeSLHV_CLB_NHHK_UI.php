<?php
	//khoi dong session
	session_start();
	
	//kiem tra quyen truoc khi hien thi trang
	/*if(!session_is_registered("maquyen"))
	{
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	if($_SESSION['maquyen']!="AD")
	echo "<script language=javascript>window.location = './Admin/loginUI.php';</script>"; 
	if($_SESSION['maquyen']!="BCHHSVT")
	echo "<script language=javascript>window.location = './HSVT/loginUI.php';</script>";
	exit;
	}*/
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Thống kê số lượng hội viên theo CLB của từng NHHK</title>
<link rel="stylesheet" type="text/css" href="./css/style.css">
<link rel="stylesheet" type="text/css" href="./css/prettify-min.css">
<link rel="stylesheet" type="text/css" href="./css/widget-base.css">
<link rel="stylesheet" type="text/css" href="./css/widget-stack.css">
<style>
#mychart {
    margin:10px 10px 10px 10px;
    width:90%;
    max-width: 800px;
    height:400px;
}
</style>

<script type="text/javascript" src="js/yui-min_3.5.js"></script>
<script type="text/javascript" src="./js/prettify-min.js"></script>

<script type="text/javascript" src="./js/jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="./js/ajax.js"></script>
<script type="text/javascript" src="./js/thongke.js"></script>
<script type="text/javascript" src="./js/fill.js"></script>
<script type="text/javascript" >
$(document).ready(function() { 
	fillcombo('./get_list_namhoc.php',document.frm_thongkeSLHV_CLB_NHHK.cbo_tennamhoc);
	fillcombo('./get_list_clb.php',document.frm_thongkeSLHV_CLB_NHHK.cbo_tenclb);

	//su kien Chon Nam hoc
	$('form[name="frm_thongkeSLHV_CLB_NHHK"] select[name="cbo_tennamhoc"]').change(function(){
			_fillcombo('./get_list_hocki.php',document.frm_thongkeSLHV_CLB_NHHK.cbo_tennamhoc, document.frm_thongkeSLHV_CLB_NHHK.cbo_tenhocki);
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
			document.location = './logout.php';
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
	(<?php
    if($_SESSION['msad']) echo $_SESSION['msad'];
	if($_SESSION['mshsvt']) echo $_SESSION['mshsvt'];
	?>)
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
    <td valign="top">
    
        <table width="752px" align="center" height="100%" border="0" cellpadding="0" cellspacing="0">
        <tbody>
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
        <table width="90%" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="./images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="500" align="center">Thống kê số lượng hội viên theo từng CLB</td>
          <td width="180" align="right"> <img height="25" src="./images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_thongkeSLHV_CLB_NHHK">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_2" colspan="4"></td>
              </tr>
             <tr>
					<td height="22" width="20%" align="right" class="level_1_1">Chọn Năm học</td>
					<td width="32%" align="left" class="level_1_1">
                    	<select name="cbo_tennamhoc" class="cbo" style="width:90%;">                      
                        </select>                       
                    </td>
                    <td width="19%" height="22" align="right" class="level_1_1">Chọn Học kì</td>
					<td width="29%" align="left" class="level_1_1">
                    	<select name="cbo_tenhocki" class="cbo" style="width:90%;">                      
                        </select>                       
                    </td>
			</tr>             			
            <tr>
					<td height="22" align="right" class="level_1_1">Chọn CLB</td>
					<td align="left" colspan="3" class="level_1_1">
                    	<select name="cbo_tenclb" class="cbo" style="width:40%;">                      
                        </select>                       
                    </td>                    
			</tr>
                 <tr>
					<td height="300" align="right" class="level_1_1">Kết quả</td>
					<td align="left" class="level_1_1" colspan="3">
                    <div id="mychart"></div>
                    </td>
			</tr>               
              <tr>
            <tr>
						<td colspan="4" height="22" align="center" class="level_1_2">
                        <input type="button" class="button_1" value="In">
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
        var menu = Y.one("#menu");
        menu.plug(Y.Plugin.NodeMenuNav);
        //  Show the menu now that it is ready
        menu.get("ownerDocument").get("documentElement").removeClass("yui3-loading");
    });
</script>
</html>

