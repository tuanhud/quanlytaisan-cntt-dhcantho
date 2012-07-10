<?php	
	//khoi dong session
	session_start();

	//kiem tra quyen truoc khi hien thi trang
	if($_SESSION['maquyen']!="ADMIN")
	{
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	echo "<script language=javascript>window.location = '../index.php';</script>"; 
	exit;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../jqwidgets/styles/jqx.base.css" media="screen" />
    <link rel="stylesheet" href="../jqwidgets/styles/jqx.classic.css" media="screen" />
    <link rel="stylesheet" href="../styles/site.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../styles/style.css" media="screen" />
    <script type="text/javascript" src="../scripts/jquery-1.7.2.min.js"></script>
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
    <script type="text/javascript" src="../scripts/initwidgets.js"></script>
    <script type="text/javascript" src="../scripts/gettheme.js"></script>
    
    <script type="text/javascript" src="js/ajax.js"></script>
    <script type="text/javascript" src="js/fill.js"></script>
    <script type="text/javascript" src="js/capnhatsotiencap.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            initmenu();
            $("#parentTable").height(1600);	
            setTimeout(function()
            {
                $("#demoContent").css('visibility', 'visible');		
                initwidgets();
                $("#loader").css('display', 'none');
            }, 1000);
            var theme = getTheme();
            $("#jqxMenu").jqxMenu({height: '36px', theme: theme });
            $("#jqxMenu").css('visibility', 'visible'); 
			//$("#jqxMenu").jqxMenu({ showTopLevelArrows: true });
			fillcombo2('get_list_nam.php',document.frm_themsotiencap.cbo_chonnam);
	fillcombo('get_list_donvi.php',document.frm_themsotiencap.cbo_chondonvi);
	fillcombo2('get_list_nam.php',document.frm_suasotiencap.cbo_chonnamsua);
	fillcombo('get_list_donvi.php',document.frm_suasotiencap.cbo_chondonvisua);
	fillcombo2('get_list_nam.php',document.frm_xoasotiencap.cbo_chonnamxoa);
	fillcombo('get_list_donvi.php',document.frm_xoasotiencap.cbo_chondonvixoa);
	
    $('form[name="frm_suasotiencap"] select[name="cbo_chonnamsua"]').change(function(){
		$('form[name="frm_suasotiencap"] select[name="cbo_chondonvisua"]').change(function(){
			
			get_info_sotiencap('get_info_sotiencap.php',document.frm_suasotiencap);
		});
	});
	
	//su kien change combo ma can bo trong form xoa can bo
	$('form[name="frm_xoasotiencap"] select[name="cbo_chonnamxoa"]').change(function(){
		$('form[name="frm_xoasotiencap"] select[name="cbo_chondonvixoa"]').change(function(){
			
			get_info_sotiencap2('get_info_sotiencap.php',document.frm_xoasotiencap);
		});
	});
            });
			function thoat() {
		if (confirm('Ban có thật sự muốn thoát không?' )) {
			document.location = '../logout.php';
			return;
		}
			}
        </script>
</head>
<body style='background: #fff url(../images/background.png) left top scroll repeat-x;'>
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
                           				<td>
                           				 <table style="table-layout: fixed; border-collapse: collapse;" cellspacing="0" cellpadding="0">
                                <tbody>
                                
    							 <tr>
                                        <td height="100%"  class="demoContent" valign="middle">
                                              <table width="752" border="0" cellpadding="0" cellspacing="0" align="center">      
                                          <tr height="10">
                                            <td align="center">&nbsp;</td>       
                                          </tr> 
                                          
                                          <!--noi dung o day-->
                                          <tr>       
                                              <td align="center" width="44%" valign="middle">
                                             
                                             
                                            	 <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Thêm tiền cấp</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_themsotiencap" id="frm_themsotiencap">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_2"></td>
                    <td class="level_1_2"></td>
              </tr>
               <tr>
                 <td height="22" align="right" class="level_1_1">Chọn năm:</td>
                 <td align="left" class="level_1_1"><label for="cbo_chonnam"></label>
                   <select name="cbo_chonnam" id="cbo_chonnam">
                   </select></td>
               </tr>
               <tr>
                 <td height="22" align="right" class="level_1_1">Chọn đơn vị:</td>
                 <td align="left" class="level_1_1"><label for="cbo_chondonvi"></label>
                   <select name="cbo_chondonvi" id="cbo_chondonvi">
                     <option>Bộ môn công nghệ phần mềm</option>
                   </select></td>
               </tr>
               <tr>
					<td height="22" align="right" class="level_1_1">Số tiền cấp:</td>
					<td width="50%" align="left" class="level_1_1"><label for="txt_sotiencap"></label>
					  <input type="text" name="txt_sotiencap" id="txt_sotiencap"></td>
			</tr>              
              <tr>
              		<td colspan="2" height="22" align="center" class="level_1_2"><input name="btn_them" type="button" class="button_1" id="btn_them" value="Thêm"></td>
              </tr>
              </tbody>
           </table>
           </form>
          </td>
        </tr>		
        </tbody>
        </table>
        <br />
		 <table width="500" border="0" cellpadding="0" cellspacing="0">
		   <tbody>
		     <tr class="main_1">
		       <td width="161" align="left"><img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
		       <td width="419" align="center">Sửa tiền cấp</td>
		       <td width="180" align="right"><img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
		       </tr>
		     <tr>
		       <td colspan="3" align="left"><form name="frm_suasotiencap" id="frm_suasotiencap">
		         <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">
		           <tbody>
		             <tr>
		               <td height="22" class="level_1_2"></td>
		               <td class="level_1_2"></td>
		               </tr>
		             <tr>
		               <td height="22" align="right" class="level_1_1">Chọn năm:</td>
		               <td align="left" class="level_1_1"><label for="select2"></label>
		                 <select name="cbo_chonnamsua" id="select2">
		                   </select></td>
		               </tr>
		             <tr>
		               <td height="22" align="right" class="level_1_1">Chọn đơn vị:</td>
		               <td align="left" class="level_1_1"><label for="cbo_chonnamsua"></label>
		                 <select name="cbo_chondonvisua" id="cbo_chondonvisua">
		                   <option>Bộ môn công nghệ phần mềm</option>
		                   </select></td>
		               </tr>
		             <tr>
		               <td height="22" align="right" class="level_1_1">Số tiền cấp:</td>
		               <td width="50%" align="left" class="level_1_1"><label for="textfield"></label>
		                 <input type="text" name="txt_sotiencap" id="textfield">
		                </td>
		               </tr>
		             <tr>
		               <td colspan="2" height="22" align="center" class="level_1_2"><input name="btn_sua" type="button" class="button_1" id="btn_sua" value="Sửa"></td>
		               </tr>
		             </tbody>
		           </table>
		         </form></td>
		       </tr>
		     </tbody>
		   </table>
           <br />
		 <table width="500" border="0" cellpadding="0" cellspacing="0">
		   <tbody>
		     <tr class="main_1">
		       <td width="161" align="left"><img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
		       <td width="419" align="center">Xóa tiền cấp</td>
		       <td width="180" align="right"><img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
		       </tr>
		     <tr>
		       <td colspan="3" align="left"><form name="frm_xoasotiencap" id="frm_xoasotiencap">
		         <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">
		           <tbody>
		             <tr>
		               <td height="22" class="level_1_2"></td>
		               <td class="level_1_2"></td>
		               </tr>
		             <tr>
		               <td height="22" align="right" class="level_1_1">Chọn năm:</td>
		               <td align="left" class="level_1_1"><label for="cbo_chonnamxoa"></label>
		                 <select name="cbo_chonnamxoa" id="cbo_chonnamxoa">
		                   </select></td>
		               </tr>
		             <tr>
		               <td height="22" align="right" class="level_1_1">Chọn đơn vị:</td>
		               <td align="left" class="level_1_1"><label for="select5"></label>
		                 <select name="cbo_chondonvixoa" id="select5">
		                   <option>Bộ môn công nghệ phần mềm</option>
		                   </select></td>
		               </tr>
		             <tr>
		               <td height="22" align="right" class="level_1_1">Số tiền cấp:</td>
		               <td width="50%" align="left" class="level_1_1"><label for="textfield"></label>
		                 <input name="txt_sotiencapxoa" type="text" id="textfield" readonly="readonly"></td>
		               </tr>
		             <tr>
		               <td colspan="2" height="22" align="center" class="level_1_2"><input name="btn_xoa" type="button" class="button_1" id="btn_xoa" value="Xóa"></td>
		               </tr>
		             </tbody>
		           </table>
		         </form></td>
		       </tr>
		     </tbody>
		   </table></td>
</tr>
</table>
                                                 
                                                 <!--het noi dung-->
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
