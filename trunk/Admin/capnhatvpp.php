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
    <script type="text/javascript" src="js/capnhatvanphongpham.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            initmenu();
			document.frm_themvpp.cbo_tenloaivppthem.focus();
	fillcombo('get_list_loaivpp.php',document.frm_themvpp.cbo_tenloaivppthem);
	fillcombo3('get_list_donvitinh.php',document.frm_themvpp.cbo_dvtthem);
	fillcombo('get_list_nhasanxuat.php',document.frm_themvpp.cbo_tennsxthem);
	
	fillcombo('get_list_vpp.php',document.frm_suavpp.cbo_tenvppsua);
	fillcombo('get_list_loaivpp.php',document.frm_suavpp.cbo_tenloaivppsua);
	fillcombo3('get_list_donvitinh.php',document.frm_suavpp.cbo_dvtsua);
	fillcombo('get_list_nhasanxuat.php',document.frm_suavpp.cbo_tennsxsua);
	
	fillcombo('get_list_vpp.php',document.frm_xoavpp.cbo_tenvppxoa);
	fillcombo('get_list_loaivpp.php',document.frm_xoavpp.cbo_tenloaivppxoa);
	fillcombo3('get_list_donvitinh.php',document.frm_xoavpp.cbo_dvtxoa);
	fillcombo('get_list_nhasanxuat.php',document.frm_xoavpp.cbo_tennsxxoa);
	
	$('form[name="frm_suavpp"] select[name="cbo_tenvppsua"]').change(function(){
		get_info_vpp('get_info_vpp.php',document.frm_suavpp);
	});
	
	$('form[name="frm_xoavpp"] select[name="cbo_tenvppxoa"]').change(function(){
		get_info_vpp2('get_info_vpp.php',document.frm_xoavpp);
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
          <td width="419" align="center">Thêm  văn phòng phẩm</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_themvpp" id="frm_themvpp">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Chọn loại văn phòng phẩm</td>
					<td width="50%" align="left" class="level_1_2">
                    	<select name="cbo_tenloaivppthem" id="cbo_tenloaivppthem" class="cbo" style="width:100%;">
                        </select>                       
                    </td>
			</tr>    
             <tr>
               <td height="22" align="right" class="level_1_1">Chọn đơn vị tính của văn phòng phẩm</td>
               <td width="50%" align="left" class="level_1_1">
                 <select name="cbo_dvtthem" id="cbo_dvtthem" class="cbo" style="width:100%;">
                   </select>                       
                 </td>
             </tr>
             <tr>
					<td height="22" align="right" class="level_1_2">Chọn nhà sản xuất văn phòng phẩm</td>
					<td width="50%" align="left" class="level_1_2">
                    	<select name="cbo_tennsxthem" id="cbo_tennsxthem" class="cbo" style="width:100%;">
                        </select>                       
                    </td>
			</tr>    
               <tr>
                 <td height="22" align="right" class="level_1_1">Tên  văn phòng phẩm</td>
                 <td width="50%" align="left" class="level_1_1">
                   <input name="txt_tenvppthem" id="txt_tenvppthem" type="text" class="txtbox" style="width:100%"></td>
               </tr>
                <tr>
                 <td height="22" align="right" class="level_1_2">Đơn giá văn phòng phẩm</td>
                 <td width="50%" align="left" class="level_1_2">
                   <input name="txt_dongiavppthem" id="txt_dongiavppthem" type="text" class="txtbox" style="width:100%"></td>
               </tr>                
              <tr>
                <td colspan="2" height="22" align="center" class="level_1_1"><input type="button" name="btn_themvpp" id="btn_themvpp" class="button_1" value="Thêm"></td>
              </tr>
            </tbody>
           </table>
           </form>
          </td>
        </tr>	
        <tr>
          <td colspan="3" align="left">
            	<form name="frm_importvpp" id="frm_importvpp" action="importvppUI.php" enctype="multipart/form-data" method="post" target="export" onSubmit="return isValid();window.open('', 'export', 'width=1350,height=660,status=yes,resizable=yes,scrollbars=yes')">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
			  <tr>
					<td height="22" align="right" class="level_1_2">Chọn file Excel</td>
					<td width="70%" align="left" class="level_1_2"><input name="file_import" id="file_import" type="file" style="width:100%"><input type="hidden" name="MAX_FILE_SIZE" value="100000"></td>
			  </tr>
               <tr>
					<td height="22" align="right" class="level_1_1">Chọn Sheet cần lưu</td>
					<td width="70%" align="left" class="level_1_1">
                    <select name="cbo_chonsheet" id="cbo_chonsheet" style="width:60">
                      <option value="0">1</option>
                      <option value="1">2</option>
                      <option value="2">3</option>
                   </select>
                    </td>
			  </tr>
              <tr>
              		<td colspan="2" height="33" align="center" class="level_1_1"><input type="submit" name="frm_importvpp" class="button_1" value="Xem trước"></td>
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
          <td width="419" align="center">Sửa  văn phòng phẩm</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_suavpp" id="frm_suavpp">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
                <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Chọn văn phòng phẩm cần sửa</td>
					<td width="50%" align="left" class="level_1_2">
                    	<select name="cbo_tenvppsua" id="cbo_tenvppsua" class="cbo" style="width:100%;">
                        </select>                       
                    </td>
			</tr>
              <tr>
					<td height="22" align="right" class="level_1_1">Chọn loại văn phòng phẩm cần sửa</td>
					<td width="50%" align="left" class="level_1_1">
                    	<select name="cbo_tenloaivppsua" id="cbo_tenloaivppsua" class="cbo" style="width:100%;">
                        </select>                       
                    </td>
			</tr>    
             <tr>
               <td height="22" align="right" class="level_1_2">Chọn ĐVT của văn phòng phẩm cần sửa</td>
               <td width="50%" align="left" class="level_1_2">
                 <select name="cbo_dvtsua" id="cbo_dvtsua" class="cbo" style="width:100%;">
                   </select>                       
                 </td>
             </tr>
             <tr>
					<td height="22" align="right" class="level_1_1">Chọn  NSX văn phòng phẩm cần sửa</td>
					<td width="50%" align="left" class="level_1_1">
                    	<select name="cbo_tennsxsua" id="cbo_tennsxsua" class="cbo" style="width:100%;">
                        </select>                       
                    </td>
			</tr>    
               <tr>
                 <td height="22" align="right" class="level_1_2">Tên  văn phòng phẩm cần sửa</td>
                 <td width="50%" align="left" class="level_1_2">
                   <input name="txt_tenvppsua" id="txt_tenvppsua" type="text" class="txtbox" style="width:100%"></td>
               </tr> 
               <tr>
                 <td height="22" align="right" class="level_1_1">Đơn giá văn phòng phẩm sửa</td>
                 <td width="50%" align="left" class="level_1_1">
                   <input name="txt_dongiavppsua" id="txt_dongiavppsua" type="text" class="txtbox" style="width:100%"></td>
               </tr>          
            <tr>
              <td colspan="2" height="22" align="center" class="level_1_2">
                <input type="button" name="btn_suavpp" id="btn_suavpp" class="button_1" value="Lưu">
                </td>
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
          <td width="419" align="center">Xóa  văn phòng phẩm</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_xoavpp" id="frm_xoavpp">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
          <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Chọn văn phòng phẩm cần xóa</td>
					<td width="50%" align="left" class="level_1_2">
                    	<select name="cbo_tenvppxoa" id="cbo_tenvppxoa" class="cbo" style="width:100%;">
                        </select>                       
                    </td>
			</tr>
            <tr>
              <td height="29" align="right" class="level_1_1">Tên loại văn phòng phẩm cần xóa</td>
              <td width="50%" align="left" class="level_1_1"><select name="cbo_tenloaivppxoa" id="cbo_tenloaivppxoa" disabled class="cbo" style="width:100%;">
                        </select></td>
            </tr>    
             <tr>
					<td height="30" align="right" class="level_1_2"> ĐVT của văn phòng phẩm cần xóa</td>
					<td width="50%" align="left" class="level_1_2"><select name="cbo_dvtxoa" class="cbo" id="cbo_dvtxoa" disabled style="width:100%;">
                        </select></td>
			</tr>
            <tr>
              <td height="22" align="right" class="level_1_1">Tên NSX văn phòng phẩm cần xóa</td>
              <td width="50%" align="left" class="level_1_1"><select name="cbo_tennsxxoa" id="cbo_tennsxxoa" disabled class="cbo" style="width:100%;">
                        </select></td>
            </tr>         
             <tr>
               <td colspan="2" height="22" align="center" class="level_1_1">
                 <input type="button" name="btn_xoavpp" id="btn_xoavpp" class="button_1" value="Xóa">
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
