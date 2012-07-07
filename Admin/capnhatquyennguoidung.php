<?php	
	//khoi dong session
	session_start();

	//kiem tra quyen truoc khi hien thi trang
	/*if(!session_is_registered("maquyen") || $_SESSION['maquyen']!="AD")
	{
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	echo "<script language=javascript>window.location = 'loginUI.php';</script>"; 
	hello exit;
	}*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cập nhật quyền - người dùng</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" href="../jqwidgets/styles/jqx.base.css" media="screen" />
    <link rel="stylesheet" href="../jqwidgets/styles/jqx.classic.css" media="screen" />
    <link rel="stylesheet" href="../styles/site.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../styles/style.css" media="screen" />
  	<script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
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
    <script type="text/javascript" src="../scripts/gettheme.js"></script>
	<script type="text/javascript" src="js/ajax.js"></script>
    <script type="text/javascript" src="js/fill.js"></script>
    <script src="../js/yui-min_3.5.js"></script> 
	<script src="../js/intl-min.js"></script>
    <script type="text/javascript" src="js/capnhatdonvi.js"></script>
    <script type="text/javascript" src="js/table_quyen_nguoidung.js"></script>
    <script type="text/javascript" src="js/check_quyen_nguoidung.js"></script>
    <script type="text/javascript" src="js/quyen_nguoidung.js"></script>
    
<script type="text/javascript" >
$(document).ready(function() 
{ 
	createTable_nguoidung();
	fillcombo('get_list_donvi2.php',document.frm_capnhatquyen_nguoidung.cbo_tendonvi);
	//Create table after loading page
	$('form[name="frm_capnhatquyen_nguoidung"] select[name="cbo_tendonvi"]').change(function()
	{		
			
			getRecord2('get_list_canbo_donvi.php',document.frm_capnhatquyen_nguoidung.cbo_tendonvi.value);
			
			
			checkbox_duyetvpp();
			checkbox_duyetkhms();
			checkbox_qlkk();
			checkbox_lockkk();
			checkbox_qlvpp();
			checkbox_qlkhms();
			checkbox_pdtvpp();
			checkbox_duyetkhmsbm();
			checkbox_admin();
			checkbox_cbqlbm();
			checkbox_gv();
			
		});
	$('form[name="frm_capnhatquyen_nguoidung"] input[name="btn_capnhat"]').click(function(){		
		update_quyen_nguoidung(document.frm_capnhatquyen_nguoidung);
	});
	
	$('form[name="frm_capnhatquyen_nguoidung"] input[name="btn_capnhat2"]').click(function(){		
		update_quyen_nguoidung2(document.frm_capnhatquyen_nguoidung);
	});
	
    $("#parentTable").height(1600);	
    setTimeout(function()
    {
       $("#demoContent").css('visibility', 'visible');		
       $("#loader").css('display', 'none');
     }, 1000);
    var theme = getTheme();
    $("#jqxMenu").jqxMenu({height: '36px', theme: theme });
    $("#jqxMenu").css('visibility', 'visible'); 
			//$("#jqxMenu").jqxMenu({ showTopLevelArrows: true });
})
function thoat() {
		if (confirm('Ban có thật sự muốn thoát không?' )) {
			document.location = '../logout.php';
			return;
		}
	}
 </script>
</head>
<body style='background: #fff url(../images/background.png) left top scroll repeat-x;' >
	<!--begin header-->
   			 <div style="Z-INDEX: 1; LEFT: 1031px; WIDTH: 200px; POSITION: absolute; TOP: 9px; HEIGHT: 30px" align="center"> <font style="FONT-WEIGHT: 700; FONT-SIZE: 8pt; line-height:20px;" face="Tahoma" color="#FFFFFF"><a href="capnhatthongtincanhanad.php">Cập nhật thông tin cá nhân</a>| <a class="white" href="javascript:thoat();">Thoát</a> <br />
   			   Xin chào,
   			   <?=$_SESSION['hoten']?>
   			   <br />
   			   (<font style="FONT-WEIGHT: 700; FONT-SIZE: 8pt; line-height:20px;" face="Tahoma" color="#FFFFFF">
  <?=$_SESSION['msclb']?>
</font>) </font></div>
   			 <?php include_once('../header.php');?> 
    <!--end header-->
    <!--begin content-->
    <div class="rc-all" style='margin-right: auto; margin-left: auto; border: 1px solid #d2d2d2; width: 1000px; height: 100%; margin-top: 40px; margin-bottom: 20px; background: #fff;'>
       <table class="rc-all" id="demostable" style="margin: 0 auto; table-layout: fixed; width: 100%; min-height: 100%; height: auto; height: 100%; border-collapse: collapse; background: #EEEEEE;">
            <tbody>
            		<tr valign="top">
             		<!--menu o day-->
                    	<?php include_once('menu.php');?> 
            		</tr>
                    <tr>
               		 	<td>
                        	<table style="table-layout: fixed; border-collapse: collapse;" cellspacing="0" cellpadding="0">
                           		<tbody>                       
                              		 <tr>
                            <td width="794" valign="top" class="rc-all content" id="demos">
                            <table style="table-layout: fixed; border-collapse: collapse;" cellspacing="0" cellpadding="0">
                                <tbody>
                                 <tr>
                                    <td valign="top">   
                                    </td>
                                 </tr>
    							 <tr>
                                        <td height="100%"  class="demoContent" valign="middle">
                                              <table width="752" border="0" cellpadding="0" cellspacing="0" align="center">      
                                          <tr height="10">
                                            <td align="center">&nbsp;</td>       
                                          </tr> 
                                          
                                          <!--noi dung o day-->
                                          <tr>
    <td height="100%" align="center" valign="middle">   
		 <table width="960" border="0" cellpadding="0" cellspacing="0">
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
                        </select>
                        <input type="button" name="btn_themdonvi" id="btn_themdonvi" class="button_1" value="Thêm">
                        </td>
			</tr>
              <!--bang thuoc tinh dat o day-->
               
                    <tr>
                        <td align="center" height="auto"  class="level_1_1" colspan="4" valign="top">
                        <div class="yui3-skin-sam">                    
                        <div id="mytable"></div>                    
                        </div>
                        </td>
                </tr>
                      <p align="center"></p>
              <tr>
              		<td colspan="2" height="22" align="center" class="level_1_2">
                    <input type="button" name="btn_capnhat2" id="btn_capnhat2" class="button_1" value="Cập nhật">
                    <input type="button" name="btn_capnhat" id="btn_capnhat" class="button_1" value="Lưu"></td>
              </tr>
           </table>
           </form>
          </td>
        </tr>		
        </tbody>
        </table>


        
	</td>
</tr>
                                          
                                          
                                          <tr>
                                            <td align="center">&nbsp;</td>
                                          </tr>    
                                        </table>
                                        </td>
  								</tr>
                                </tbody>
                             </table>
                            </td>
                               </tr>       
                            	</tbody>
                         	</table>
                     	</td>
                    </tr>
              </tbody>
        </table>
                
    </div>
    <!--end content-->
    <!--begin footer-->
   		 <?php include_once('../footer.php');?> 
    <!--end footer-->
</body>
</html>
