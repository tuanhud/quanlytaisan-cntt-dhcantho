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
<!--<script type="text/javascript" src="js/capnhatnccvpp.js"></script>-->
    <script type="text/javascript" src="js/capnhatnhacungcap.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
			
            initmenu();
			document.frm_themnccvpp.cbo_tenvppthem.focus();
	fillcombo('get_list_vpp.php',document.frm_themnccvpp.cbo_tenvppthem);
	fillcombo('get_list_nhacungcap.php',document.frm_themnccvpp.cbo_tennccthem);
	fillcombo('get_list_nccvpp.php',document.frm_xoanccvpp.cbo_tenvppxoa);
	$('form[name="frm_themnccvpp"] select[name="cbo_tennccthem"]').change(function(){
		get_info_nhacungcap3('get_info_nhacungcap.php',document.frm_themnccvpp);
	});
	$('form[name="frm_xoanccvpp"] select[name="cbo_tenvppxoa"]').change(function(){
		_fillcombo('get_list_nccvpp2.php',document.frm_xoanccvpp.cbo_tenvppxoa, document.frm_xoanccvpp.cbo_tennccxoa);
	});
	$('form[name="frm_xoanccvpp"] select[name="cbo_tennccxoa"]').change(function(){
		get_info_nhacungcap4('get_info_nhacungcap.php',document.frm_xoanccvpp);
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
          <td width="419" align="center">Thêm nhà cung cấp cho văn phòng phẩm</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_themnccvpp" id="frm_themnccvpp">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
                    <td height="22" align="right" class="level_1_2">Chọn  văn phòng phẩm</td>
					<td width="50%" align="left" class="level_1_2">
                    	<select name="cbo_tenvppthem" id="cbo_tenvppthem" class="cbo" style="width:100%;">
                        </select>                       
                    </td>
 
                    
            <tr>
              <td height="22" align="right" class="level_1_1">Chọn nhà cung cấp văn phòng phẩm</td>
              <td width="50%" align="left" class="level_1_1">
                <select name="cbo_tennccthem" id="cbo_tennccthem" class="cbo" style="width:100%;">
                  </select>
                </td>
            </tr> 
            <tr>
              <td height="22" align="right" class="level_1_2">Địa chỉ nhà cung cấp văn phòng phẩm</td>
              <td width="50%" align="left" class="level_1_2">
                <input name="txt_diachinccthem" id="txt_diachinccthem" type="text" disabled class="txtbox" style="width:100%"></td>
            </tr> 
            <tr>
					<td height="22" align="right" class="level_1_1">SĐT nhà cung cấp văn phòng phẩm</td>
					<td width="50%" align="left" class="level_1_1">
                    	<input name="txt_sdtnccthem" id="txt_sdtnccthem" type="text" disabled class="txtbox" style="width:100%"></td>
			</tr>               
              <tr>
                <td colspan="2" height="22" align="center" class="level_1_2"><input type="button" name="btn_themnccvpp" id="btn_themnccvpp" class="button_1" value="Thêm"></td>
              </tr>
			  

           </table>
           </form>
          </td>
        </tr>		
        </tbody>
        </table>
        <br>
        <br/>
        <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Xóa nhà cung cấp cho văn phòng phẩm</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_xoanccvpp" id="frm_xoanccvpp">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
                    <td height="22" align="right" class="level_1_2">Chọn  văn phòng phẩm</td>
					<td width="50%" align="left" class="level_1_2">
                    	<select name="cbo_tenvppxoa" id="cbo_tenvppxoa" class="cbo" style="width:100%;">
                        </select>                       
                    </td>
 
                    
            <tr>
              <td height="22" align="right" class="level_1_1">Chọn nhà cung cấp văn phòng phẩm</td>
              <td width="50%" align="left" class="level_1_1">
                <select name="cbo_tennccxoa" id="cbo_tennccxoa" class="cbo" style="width:100%;">
                  </select>
                </td>
            </tr> 
            <tr>
              <td height="22" align="right" class="level_1_2">Địa chỉ nhà cung cấp văn phòng phẩm</td>
              <td width="50%" align="left" class="level_1_2">
                <input name="txt_diachinccxoa" id="txt_diachinccxoa" type="text" disabled class="txtbox" style="width:100%"></td>
            </tr> 
            <tr>
					<td height="22" align="right" class="level_1_1">SĐT nhà cung cấp văn phòng phẩm</td>
					<td width="50%" align="left" class="level_1_1">
                    	<input name="txt_sdtnccxoa" id="txt_sdtnccxoa" type="text" disabled class="txtbox" style="width:100%"></td>
			</tr>               
              <tr>
                <td colspan="2" height="22" align="center" class="level_1_2"><input type="button" name="btn_xoanccvpp" id="btn_xoanccvpp" class="button_1" value="Xóa"></td>
              </tr>
			  

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