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
    <script type="text/javascript" src="js/duyetphieudutruvpp.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            initmenu();
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
                        	<table style="table-layout: fixed; border-collapse: collapse;" cellspacing="0" cellpadding="0">
                           		<tbody>                       
                              		 <tr>
                           
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
