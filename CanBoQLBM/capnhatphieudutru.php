<?php	
	//khoi dong session
	session_start();	
	//kiem tra quyen truoc khi hien thi trang
	//if(!session_is_registered("maquyen") || $_SESSION['maquyen']!="BCHCHSV")
	//{
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lập phiếu dự trù VPP</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">

	<link rel="stylesheet" href="../jqwidgets/styles/jqx.base.css" type="text/css" />
    <link rel="stylesheet" href="../jqwidgets/styles/jqx.classic.css" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxmenu.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxcheckbox.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxgrid.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxdata.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxgrid.selection.js"></script>
	<script type="text/javascript" src="../jqwidgets/jqxnumberinput.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxgrid.edit.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxgrid.pager.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxwindow.js"></script>
     <script type="text/javascript" src="../jqwidgets/jqxpanel.js"></script>
	<script type="text/javascript" src="js/table-vpp.js"></script>
    <script type="text/javascript" src="js/gettheme.js"></script>
    <script type="text/javascript" src="js/taopopupvpp.js"></script>
    <script type="text/javascript" src="js/table-vppsua.js"></script>
    
    
	<script type="text/javascript" src="js/ajax.js"></script>
    <script type="text/javascript" src="js/fill.js"></script>
    
<script type="text/javascript" src="js/capnhatphieudutruvpp.js"></script>
<script type="text/javascript">
function keypress(e){
var keypressed = null;
if (window.event)
	keypressed = window.event.keyCode; //IE
else 
	keypressed = e.which; //NON-IE, Standard

if (keypressed < 48 || keypressed > 57)
{ 
	//CharCode của 0 là 48 (Theo bảng mã ASCII)
	//CharCode của 9 là 57 (Theo bảng mã ASCII)
	if (keypressed == 8 || keypressed == 127)
	{
	//Phím Delete và Phím Back
	return;
	}
	alert("Bạn chỉ được phép nhập số!");
	return false;
}
}
$(document).ready(function() {
	
	taobangvpp();
	taopopup()
	function thoat() {
		if (confirm('Ban co chac chan muon thoat khong ?' )) {
			document.location = '../logout.php';
			return;
		}
	}
	
	
	$btn=0; 
	fillcombo2('get_list_nam.php',document.frm_lapphieudutru.cbo_namthem);
	fillcombo2('get_list_quy.php',document.frm_lapphieudutru.cbo_quythem);
	//sau nay bo don vi, vi su dung session khi can bo dang nhap
	fillcombo('get_list_donvi.php',document.frm_lapphieudutru.cbo_donvithem);
	
	fillcombo('get_list_donvi.php',document.frm_huyphieudutruvpp.cbo_donvihuy);
	fillcombo2('get_list_nam.php',document.frm_huyphieudutruvpp.cbo_namhuy);
	fillcombo2('get_list_quy.php',document.frm_huyphieudutruvpp.cbo_quyhuy);
	$('form[name="frm_huyphieudutruvpp"] select[name="cbo_namhuy"]').change(function(){
		fillcombo3bien('get_list_maphieudutruvpp.php',document.frm_huyphieudutruvpp.cbo_donvihuy,document.frm_huyphieudutruvpp.cbo_namhuy,document.frm_huyphieudutruvpp.cbo_quyhuy, document.frm_huyphieudutruvpp.cbo_maphieuhuy);
	});
	$('form[name="frm_huyphieudutruvpp"] select[name="cbo_quyhuy"]').change(function(){
		fillcombo3bien('get_list_maphieudutruvpp.php',document.frm_huyphieudutruvpp.cbo_donvihuy,document.frm_huyphieudutruvpp.cbo_namhuy,document.frm_huyphieudutruvpp.cbo_quyhuy, document.frm_huyphieudutruvpp.cbo_maphieuhuy);
	});
	$('form[name="frm_huyphieudutruvpp"] select[name="cbo_donvihuy"]').change(function(){
		fillcombo3bien('get_list_maphieudutruvpp.php',document.frm_huyphieudutruvpp.cbo_donvihuy,document.frm_huyphieudutruvpp.cbo_namhuy,document.frm_huyphieudutruvpp.cbo_quyhuy, document.frm_huyphieudutruvpp.cbo_maphieuhuy);
	});
});
</script>
</head>
<body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0" class="yui3-skin-sam">  
<table width="778" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tbody>  
  <!--Bắt đầu của HEADER-->
  <tr> 
    <td height="26" valign="middle">       	 
	<!--Thẻ hiển thị thông tin khi đăng nhập-->
	<div style="Z-INDEX: 1; LEFT: 557px; WIDTH: 200px; POSITION: absolute; TOP: 55px; HEIGHT: 30px" align="center">
		<font style="FONT-WEIGHT: 700; FONT-SIZE: 8pt; line-height:20px;" face="Tahoma" color="#FFFFFF">
			<a class="white" href="doimatkhauUI.php">Cập nhật thông tin cá nhân</a> | <a class="white" href="javascript:thoat();">Thoát</a>
    		<br>
    		Xin chào, <?=$_SESSION['hoten']?>
    		<br>(<?=$_SESSION['mschsv']?>)    
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
         <td class="cm_header">
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
         <tbody>
           <tr>            
             <td class="tittle_header"><img src="../images/ctulogo1.gif"></td>             
           </tr>
         </tbody>
         </table>
         </td>
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
	<td height="50%" valign="middle">
    	<table align="center" border="0" cellpadding="0" cellspacing="0" width="752">      
	    <tbody>
        <tr height="10">        
	   	<td align="center" colspan="3">
        <?php
		include_once('node-menunav-3.php');
		?> 
        </td>
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
      <td align="center" width="100%">
      
      <table width="700" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Lập phiếu dự trù văn phòng phẩm</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
           <form method='post' name='frm_lapphieudutru' id='frm_lapphieudutru'> 
		   <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		
                    </tr>
            <tr>
              <td width="50%" height="30" align="right" class="level_1_1">Năm áp dụng</td>
              <td width="50%" align="left" class="level_1_1"><select name="cbo_namthem" id="cbo_namthem" class="cbo" style="width:100%;">
              </select></td>
            </tr>    
             <tr>
					<td height="22" align="right" class="level_1_2">Quý áp dụng</td>
					<td width="50%" align="left" class="level_1_2"><select name="cbo_quythem" id="cbo_quythem" class="cbo" style="width:100%;">
					  </select></td>
			</tr>
             <tr>
					<td height="22" align="right" class="level_1_1">Phiếu dự toán của đơn vị</td>
					<td width="50%" align="left" class="level_1_1"><select name="cbo_donvithem" id="cbo_donvithem" class="cbo" style="width:100%;">
					  </select></td>
			</tr>   
                <tr>
					<td height="22" colspan="2" align="left" class="level_1_2"><em><strong>Chi tiết văn phòng phẩm:</strong> </em></td>
					</tr>
      				<tr>
                    <td colspan="2" align="center">
              
                            <div style="margin-top: 10px;" id="jqxgrid"></div>
                            <span> <strong>Tổng thành tiền:</strong></span> <span id="tongtien"></span>
                            </span> <span><strong>VNĐ</strong></span>
                            <div style="margin-top: 30px;">
                                <div id="cellbegineditevent"></div>
                                <div style="margin-top: 10px;" id="cellendeditevent"></div>
                 
                           <div style="margin-left: 30px; float: left;">
                                <div style="margin-top: 5px;">
                                    <input type="button" value="Thêm văn phòng phẩm" id="showWindowButton" />
                                </div> 
                                <div style="margin-top: 5px;">
                                    <input id="deleterowbutton" type="button" value="Xóa văn phòng phẩm" />
                                </div>
                               
                                
                         
                         <div style="width:600px; border: 0px solid #ccc; margin-top: 10px;"
                            id="mainDemoContainer">
                            </div>
                            <div id="eventWindow" style="display:none">
                                <div>
                                    <img width="14" height="14" src="../images/help.png" alt="" />
                                    Bảng chi tiết các văn phòng phẩm
                                </div>
                                <div>
                                
                                	<div style="margin-top: 10px;" id="jqxgrid2"></div>
                                    <div style="margin-top: 30px;">
                                        <div id="cellbegineditevent"></div>
                                        <div style="margin-top: 10px;" id="cellendeditevent"></div>
                                   </div>
                                    <div style="float: right; margin-top: 10px;">
                                        <input type="button" id="cancel" value="Thoát" />
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                         
                    </div>    
                    </td>
               </tr>         
              <tr>
                <td colspan="2" height="22" align="center" class="level_1_2"><input type="button" name="btn_lap" id="btn_lap" class="button_1" value="Lập" ></td>
              </tr>
              </form>
              </tbody>
           </table>   
          </td>
        </tr>		
        </tbody>
        </table>
<br/>
        <table width="700" border="0" cellpadding="0" cellspacing="0">
        
        
      </table>
<br/>
   <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Xóa phiếu dự trù văn phòng phẩm</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td height="165" colspan="3" align="left">
          	<form name="frm_huyphieudutruvpp" id="frm_huyphieudutruvpp">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
                <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
            <tr>
              <td width="50%" height="30" align="right" class="level_1_2">Năm áp dụng</td>
              <td width="50%" align="left" class="level_1_2"><select name="cbo_namhuy" id="cbo_namhuy" class="cbo" style="width:100%;">
                </select></td>
            </tr>    
             <tr>
					<td height="22" align="right" class="level_1_1">Quý áp dụng</td>
					<td width="50%" align="left" class="level_1_1"><select name="cbo_quyhuy" id="cbo_quyhuy" class="cbo" style="width:100%;">
                </select></td>
			</tr>
             <tr>
					<td height="22" align="right" class="level_1_2">Phiếu dự trù của đơn vị</td>
					<td width="50%" align="left" class="level_1_2"><select name="cbo_donvihuy" id="cbo_donvihuy" class="cbo" style="width:100%;">
                </select></td>
			</tr>
             <tr>
					<td height="22" align="right" class="level_1_1">Mã phiếu dự trù</td>
					<td width="50%" align="left" class="level_1_1"><select name="cbo_maphieuhuy" id="cbo_maphieuhuy" class="cbo" style="width:100%;">
                </select></td>
			</tr>          
            <tr>
              <td colspan="2" height="22" align="center" class="level_1_2">
                <input type="button" name="btn_xoa" id="btn_xoa" class="button_1" value="Xóa">
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
      <!--KẾT THÚC LEFT MAIN INFO-->            
      </tr>   
    </tbody></table></td>
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
        var menu = Y.one("#chsv");
        menu.plug(Y.Plugin.NodeMenuNav);
        //  Show the menu now that it is ready
        menu.get("ownerDocument").get("documentElement").removeClass("yui3-loading");
    });
</script>
</html>
