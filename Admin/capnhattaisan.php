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
<title>Cập nhật đơn vị</title>
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
    <script type="text/javascript" src="js/capnhattaisan.js"></script>
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
			
			document.frm_themtaisan.cbo_tenloaitaisanthem.focus();
			fillcombo('get_list_loaitaisan.php',document.frm_themtaisan.cbo_tenloaitaisanthem);
			fillcombo('get_list_loaitaisan.php',document.frm_suataisan.cbo_tenloaitaisansua);
			fillcombo('get_list_loaitaisan.php',document.frm_xoataisan.cbo_tenloaitaisanxoa);
			fillcombo3('get_list_donvitinh.php',document.frm_themtaisan.cbo_donvitinhthem);
			$('form[name="frm_suataisan"] select[name="cbo_tenloaitaisansua"]').change(function(){
				_fillcombo('get_list_taisan2.php',document.frm_suataisan.cbo_tenloaitaisansua, document.frm_suataisan.cbo_tentaisansua);
				if(document.frm_suataisan.cbo_tenloaitaisansua.value==-1)
				{
					document.frm_suataisan.txt_tentaisansua.value='';
					document.frm_suataisan.cbo_donvitinhsua.value=-1;
					document.frm_suataisan.txt_tinhtrangsua.value='';
				}
			});
			
			$('form[name="frm_suataisan"] select[name="cbo_tentaisansua"]').change(function(){
				fillcombo3('get_list_donvitinh.php',document.frm_suataisan.cbo_donvitinhsua);
				get_info_taisan('get_info_taisan.php',document.frm_suataisan);
				document.frm_suataisan.txt_tentaisansua.focus();
			});	
			$('form[name="frm_xoataisan"] select[name="cbo_tenloaitaisanxoa"]').change(function(){
				_fillcombo('get_list_taisan2.php',document.frm_xoataisan.cbo_tenloaitaisanxoa, document.frm_xoataisan.cbo_tentaisanxoa);
			});	
            });
        </script>
</head>
<body style='background: #fff url(../images/background.png) left top scroll repeat-x;'>
	<!--begin header-->
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
                        	<table style="table-layout: fixed;border-collapse: collapse;" cellspacing="0" cellpadding="0">
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
		 <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Thêm tài sản - thiết bị </td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_themtaisan" id="frm_themtaisan">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
			  <tr>
					<td height="22" align="right" class="level_1_2">Chọn loại thiết bị</td>
					<td width="70%" align="left" class="level_1_2">
                    	<select name="cbo_tenloaitaisanthem" id="cbo_tenloaitaisanthem" class="cbo" style="width:80%;"></select>
                        <input name="btn_themloaitaisan" id="btn_themloaitaisan" type="button" class="button_1" value="Thêm">
                        </td>
               <tr>
					<td height="22" align="right" class="level_1_1">Tên thiết bị</td>
					<td width="50%" align="left" class="level_1_1">
                    	<input name="txt_tentaisanthem" id="txt_tentaisanthem" type="text" class="txtbox" style="width:100%"></td>
			</tr>
			 <tr>
					<td height="22" align="right" class="level_1_2">Chọn đơn vị tính</td>
					<td width="50%" align="left" class="level_1_2"><select name="cbo_donvitinhthem" id="cbo_donvitinhthem" class="cbo" style="width:80%;">
                        </select>
                        <input name="btn_themdonvitinh" id="btn_themdonvitinh" type="button" class="button_1" value="Thêm">
                        </td>
			</tr> 
			<tr>
					<td height="22" align="right" class="level_1_1">Tình trạng</td>
					<td width="50%" align="left" class="level_1_1">
                    	<input name="txt_tinhtrangthem" id="txt_tinhtrangthem" type="text" class="txtbox" style="width:100%"></td>
			</tr>
           <!--   <tr>
					<td height="22" align="right" class="level_1_1">Thêm bằng file Excel</td>
					<td width="50%" align="left" class="level_1_1">
                    	<input name="file_ecxel" type="file" style="width:80%">
                        <input name="btn_submit" id="btn_submit" type="button" class="button_1" value="Import">
                        </td>
				</tr>    -->     
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
		<br>
        <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Sửa tài sản - thiết bị </td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_suataisan" id="frm_suataisan">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
             <tr>
					<td height="22" align="right" class="level_1_2">Chọn loại thiết bị</td>
					<td width="70%" align="left" class="level_1_2">
                    	<select name="cbo_tenloaitaisansua"
                        id="cbo_tenloaitaisansua" class="cbo" style="width:100%;">
                        </select></td>
               <tr>
					<td height="22" align="right" class="level_1_1">Tên thiết bị</td>
					<td width="57%" align="left" class="level_1_1">
                    	<select name="cbo_tentaisansua" id="cbo_tentaisansua" class="cbo" style="width:100%;">
                        </select></td>
			</tr>
            <tr>
					<td height="22" align="right" class="level_1_1">Tên mới</td>
					<td width="57%" align="left" class="level_1_1">
                    	<input name="txt_tentaisansua" id="txt_tentaisansua" type="text" class="txtbox" style="width:100%"></td>
			</tr>
			 <tr>
					<td height="22" align="right" class="level_1_2">Chọn đơn vị tính</td>
					<td width="57%" align="left" class="level_1_2"><select name="cbo_donvitinhsua" id="cbo_donvitinhsua" class="cbo" style="width:100%;">
                        </select></td>
			</tr> 
			 
		
			<tr>
					<td height="22" align="right" class="level_1_1">Tình trạng</td>
					<td width="57%" align="left" class="level_1_1">
                    	<input name="txt_tinhtrangsua" id="txt_tinhtrangsua" type="text" class="txtbox" style="width:100%"></td>
			</tr>           
            <tr>
						<td colspan="2" height="22" align="center" class="level_1_1">
                        <input name="btn_suataisan" id="btn_suataisan" type="button" class="button_1" value="Lưu">
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
        <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Xóa tài sản - thiết bị</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_xoataisan" id="frm_xoataisan">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_2"></td>
                    <td class="level_1_2"></td>
              </tr>
             <tr>
					<td height="22" align="right" class="level_1_1">Chọn tên loại thiết bị </td>
					<td width="70%" align="left" class="level_1_1">
                    	<select name="cbo_tenloaitaisanxoa" id="cbo_tenloaitaisanxoa" class="cbo" style="width:100%;">
                        </select>                       
                    </td>
					
			</tr>              
             <tr>
					<td height="22" align="right" class="level_1_2">Chọn tên thiết bị </td>
					<td width="50%" align="left" class="level_1_2">
                    	<select name="cbo_tentaisanxoa" id="cbo_tentaisanxoa" class="cbo" style="width:100%;">
                        </select>                       
                    </td>
					
			</tr>    
            <tr>
						<td colspan="2" height="22" align="center" class="level_1_1">
                        <input name="btn_xoataisan" id="btn_xoataisan" type="button" class="button_1" value="Xóa">
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
