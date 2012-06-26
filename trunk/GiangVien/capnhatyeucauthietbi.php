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
<title>Cập nhật tài sản - thiết bị</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">

	<link rel="stylesheet" href="../jqwidgets/styles/jqx.base.css" type="text/css" />
    <link rel="stylesheet" href="../jqwidgets/styles/jqx.classic.css" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="../scripts/demofunctions.js"></script>
    <script type="text/javascript" src="../jqwidgets/globalization/jquery.global.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxtabs.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxcheckbox.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxwindow.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxpanel.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxdocking.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxnavigationbar.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxcombobox.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxnumberinput.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxmaskedinput.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxslider.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxdropdownbutton.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxcolorpicker.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxprogressbar.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxtree.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxcheckbox.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxsplitter.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxradiobutton.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxexpander.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxgrid.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxmenu.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxgrid.selection.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxgrid.sort.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxpanel.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxcalendar.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxdatetimeinput.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxdata.js"></script>
        <script type="text/javascript" src="../jqwidgets/jqxgrid.edit.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxgrid.pager.js"></script>
    <script type="text/javascript" src="../scripts/initwidgets.js"></script>
	
    <script type="text/javascript" src="js/gettheme.js"></script>
   
    <script type="text/javascript" src="js/table-khmsam.js"></script>
    
	<script type="text/javascript" src="js/ajax.js"></script>
    <script type="text/javascript" src="js/fill.js"></script>
<!--<script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="js/yui.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/fill.js"></script>
<script type="text/javascript" src="js/capnhattaisan.js"></script>
<script type="text/javascript" src="js/table-khms.js"></script>-->

<script type="text/javascript" >
$(document).ready(function() { 
	/*document.frm_themtaisan.cbo_tenloaitaisanthem.focus();
	fillcombo('get_list_loaitaisan.php',document.frm_themtaisan.cbo_tenloaitaisanthem);
	fillcombo3('get_list_donvitinh.php',document.frm_themtaisan.cbo_donvitinhthem);
	fillcombo2('get_list_nam.php',document.frm_themkehoachmuasam.cbo_nam);
	fillcombo('get_list_donvi.php',document.frm_themkehoachmuasam.cbo_chondonvi);
	fillcombo2('get_list_nam.php',document.frm_xoakehoachmuasam.cbo_namxoa);
	fillcombo('get_list_donvi.php',document.frm_xoakehoachmuasam.cbo_chondonvixoa);
	fillcombo2('get_list_nam.php',document.frm_suakehoachmuasam.cbo_namsua);
	fillcombo('get_list_donvi.php',document.frm_suakehoachmuasam.cbo_chondonvisua);*/
	taobang();
	//taopopup();
	//createTable();
	//createTable2();
	/*$('form[name="frm_themtaisan"] select[name="cbo_tenthuoctinh"]').change(function(){		
		 ('get_list_hoivien_chsv.php', this.value);
	});
	*/
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
<div style="Z-INDEX: 1; LEFT: 563px; WIDTH: 200px; POSITION: absolute; TOP: 53px; HEIGHT: 30px" align="center">
<font style="FONT-WEIGHT: 700; FONT-SIZE: 8pt; line-height:20px;" face="Tahoma" color="#FFFFFF">
	<a class="white" href="javascript:thoat();">Thoát</a>
    <br>
    Xin chào, <?=$_SESSION['hoten']?>
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
		 <table width="650" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Thêm kế hoạch mua sắm</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_themkehoachmuasam" id="frm_themkehoachmuasam">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
                <td height="22" class="level_1_1"></td>
              		<td class="level_1_1"></td>
              </tr>
			  <tr>
			    <td height="22" align="right" class="level_1_2">Năm:</td>
					<td width="70%" align="left" class="level_1_2"><label for="cbo_nam"></label>
					  <select name="cbo_nam" id="cbo_nam">
					    <option>2012</option>
					    </select></td>
               <tr>
                 <td height="22" align="right" class="level_1_1">Chọn đơn vị:</td>
                 <td align="left" class="level_1_1"><label for="cbo_chondonvi"></label>
                   <select name="cbo_chondonvi" id="cbo_chondonvi">
                     <option>Bộ môn công nghệ phần mềm</option>
                   </select></td>
               </tr>
           <!--bang thuoc tinh dat o day-->
             <tr>
					<td align="center" height="300" class="level_1_1" colspan="4" valign="top">
                     <div style="margin-top: 10px;" id="jqthem"></div>
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
              		<td colspan="2" height="22" align="center" class="level_1_1"><input name="btn_themtaisan" id="btn_themtaisan" type="button" class="button_1" value="Thêm"></td>
              </tr>
			  
			  <tr>
              		<td colspan="2" height="22" align="center" class="level_1_2">
					</td>
              </tr>
              </tbody>
           </table>
           </form>
          </td>
        </tr>		
        </tbody>
        </table>
		 <p>&nbsp;</p>
		 <table width="650" border="0" cellpadding="0" cellspacing="0">
		   <tbody>
		     <tr class="main_1">
		       <td width="161" align="left"><img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
		       <td width="419" align="center">Sửa kế hoạch mua sắm</td>
		       <td width="180" align="right"><img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
		       </tr>
		     <tr>
		       <td colspan="3" align="left"><form name="frm_suakehoachmuasam" id="frm_suakehoachmuasam">
		         <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">
		           <tbody>
		             <tr>
		               <td height="22" class="level_1_1"></td>
		               <td class="level_1_1"></td>
		               </tr>
		             <tr>
		               <td height="22" align="right" class="level_1_2">Năm:</td>
		               <td width="70%" align="left" class="level_1_2"><label for="cbo_namsua"></label>
		                 <select name="cbo_namsua" id="cbo_namsua">
		                   <option>2012</option>
		                   </select></td>
		               <tr>
		                 <td height="22" align="right" class="level_1_1">Chọn đơn vị:</td>
		                 <td align="left" class="level_1_1"><label for="cbo_chondonvisua"></label>
		                   <select name="cbo_chondonvisua" id="cbo_chondonvisua">
		                     <option>Bộ môn công nghệ phần mềm</option>
		                     </select></td>
		                 </tr>
		             <!--bang thuoc tinh dat o day-->
		             <tr>
		               <td align="center" height="300" class="level_1_1" colspan="4" valign="top"><div class="yui3-skin-sam">
		                 <div id="mytable2"></div>
		                 </div></td>
		               </tr>
		             <tr>
		               <td colspan="2" height="22" align="center" class="level_1_1"><input name="btn_suakehoachmuasam" id="btn_suakehoachmuasam" type="button" class="button_1" value="Sửa"></td>
		               </tr>
		             <tr>
		               <td colspan="2" height="22" align="center" class="level_1_2"></td>
		               </tr>
		             </tbody>
		           </table>
		         </form></td>
		       </tr>
		     </tbody>
		   </table>
<br>
		<br>
        <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Xóa kế hoạch mua sắm</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_xoakehoachmuasam" id="frm_xoakehoachmuasam">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_2"></td>
                    <td class="level_1_2"></td>
              </tr>
             <tr>
					<td height="22" align="right" class="level_1_1">Chọn năm: </td>
					<td width="50%" align="left" class="level_1_1"><span class="level_1_2">
					  <select name="cbo_namxoa" id="cbo_namxoa">
					    <option>2012</option>
					    </select>
					</span></td>
					
			</tr>              
             <tr>
					<td height="22" align="right" class="level_1_2"> Chọn đơn vị:</td>
					<td width="50%" align="left" class="level_1_2"><span class="level_1_1">
					  <select name="cbo_chondonvixoa" id="cbo_chondonvixoa">
					    <option>Bộ môn công nghệ phần mềm</option>
					    </select>
					</span></td>
					
			</tr>    
            <tr>
						<td colspan="2" height="22" align="center" class="level_1_1">
                        <input type="button" class="button_1" value="Xóa">
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

