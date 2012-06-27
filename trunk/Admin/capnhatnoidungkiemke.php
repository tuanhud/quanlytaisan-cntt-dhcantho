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
<link rel="shortcut icon" href="http://www.cit.ctu.edu.vn/images/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>.:: Admin</title>
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
<script type="text/javascript" src="js/capnhatnoidungkiemke.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            initmenu();
			fillcombo('get_list_noidungkiemke.php',document.frm_suanoidungkiemke.cbo_tennoidungkiemkesua);
	fillcombo('get_list_noidungkiemke.php',document.frm_xoanoidungkiemke.cbo_tennoidungkiemkexoa);
	//su kien nhan button them
	$('form[name="frm_suanoidungkiemke"] select[name="cbo_tennoidungkiemkesua"]').change(function(){
		get_info_noidungkiemkesua('get_info_noidungkiemke.php',document.frm_suanoidungkiemke);
	});
	$('form[name="frm_xoanoidungkiemke"] select[name="cbo_tennoidungkiemkexoa"]').change(function(){
		get_info_noidungkiemkexoa('get_info_noidungkiemke.php',document.frm_xoanoidungkiemke);
	});
	
	//su kien nhan button sua
	/*$('form[name="frm_suaban"] input[type="button"]').click(function(){
		suaban('../suaban.php',document.frm_suaban);	
	});	
	//su kien click button xoa
	$('form[name="frm_xoaban"] input[type="button"]').click(function(){
		if (confirm('Bạn có chắc chắn muốn xóa không ?' )) {
			xoaban('../xoaban.php',document.frm_xoaban);	
		}		
	});*/
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
                                          
                                          
                                          <!--noi dung o day-->
                                          <tr>       
                                              <td align="center" width="44%" valign="middle">
                                              <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Thêm nội dung kiểm kê</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_themnoidungkiemke" id="frm_themnoidungkiemke">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
                <td height="22" class="level_1_1"></td>
                <td width="50%" class="level_1_1"></td>
              </tr>
              <tr>
                <td height="22" align="right" class="level_1_2">Tên nội dung kiểm kê: </td>
                <td width="50%" align="center" class="level_1_2"><label for="txttennd"></label>
                  <input type="text" name="txt_tennoidungkiemke" id="txt_tennoidungkiemke" style="width:100%"></td>
              </tr>
              <tr>
                <td height="22" align="right" class="level_1_1">Tên đơn vị tính:</td>
                <td width="50%" align="center" class="level_1_1"><label for="txttendvt"></label>
                  <input type="text" name="txt_tendonvitinhthem" id="txt_tendonvitinhthem" style="width:100%"></td>
              </tr>
              <tr>
                <td height="22" align="right" class="level_1_2">Ghi chú nội dung:</td>
                <td width="50%" align="center" class="level_1_2"><label for="txtghichund"></label>
                  <textarea name="txt_ghichu" id="txt_ghichu" style="width:100%"></textarea></td>
              </tr>
              <tr>
                <td height="22" align="right" class="level_1_2">Thêm nội dung từ file:</td>
                <td align="left" class="level_1_2"><label for="textfield"></label>
                  <input type="file" name="txt_browse" id="txt_browse"></td>
              </tr>
              <tr>
                <td colspan="2" height="22" align="center" class="level_1_1"><input name="btn_themnoidungkiemke" type="button" class="button_1" id="btn_themnoidungkiemke" value="Thêm">
                  <input name="btn_huynoidungkiemke" type="reset" class="button_1" id="btn_huynoidungkiemke" value="Hủy"></td>
              </tr>
              <tr>
                <td colspan="2" height="22" align="center" class="level_1_1">&nbsp;</td>
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
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Sửa nội dung kiểm kê</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_suanoidungkiemke" id="frm_suanoidungkiemke">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr class="level_1_1">
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
             <tr>
					<td height="22" align="right" class="level_1_2">Chọn tên nội dung kiểm kê:</td>
					<td width="50%" align="left" class="level_1_2">
                    	<select name="cbo_tennoidungkiemkesua" id="cbo_tennoidungkiemkesua" class="cbo" style="width:100%;">
                        </select></td>
               <tr>
                 <td height="22" align="right" class="level_1_2">Mã nội dung kiểm kê:</td>
                 <td align="left" class="level_1_2"><label for="txt_manoidungsua"></label>
                   <input name="txt_manoidungkiemkesua" type="text" disabled id="txt_manoidungkiemkesua" readonly="readonly"></td>
               <tr>
					<td height="22" align="right" class="level_1_1">Tên nội dung kiểm kê mới:</td>
					<td width="50%" align="left" class="level_1_2"><label for="txttenndmoi"></label>
					  <input type="text" name="txt_tennoidungkiemkemoi" id="txt_tennoidungkiemkemoi" style="width:100%"></td>
			</tr>
			 <tr>
					<td height="22" align="right" class="level_1_2">Tên đơn vị tính:</td>
					<td width="50%" align="left" class="level_1_2">
                    	<input name="txt_tendonvitinhsua" type="text" class="txtbox" id="txt_tendonvitinhsua" style="width:100%"></td>
			</tr> 
			<tr>
					<td height="22" align="right" class="level_1_1">Ghi chú nội dung:</td>
					<td width="50%" align="left" class="level_1_1"><textarea name="txt_ghichusua" class="txtbox" id="txt_ghichusua" style="width:100%" onKeyPress="return keypress(event)"></textarea></td>
			</tr> 
            <tr>
              <td colspan="2" height="22" align="center" class="level_1_2">
                <input name="btn_luunoidungkiemke" type="button" class="button_1" id="btn_luunoidungkiemke" value="Lưu">
                <input name="btn_huynoidungkiemke" type="reset" class="button_1" id="btn_huynoidungkiemke" value="Hủy"></td>
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
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Xóa nội dung kiểm kê</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_xoanoidungkiemke" id="frm_xoanoidungkiemke">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_2"></td>
                    <td class="level_1_2"></td>
              </tr>
             <tr>
					<td height="22" align="right" class="level_1_1">Chọn tên nội dung kiểm kê:</td>
					<td width="50%" align="left" class="level_1_1">
                    	<select name="cbo_tennoidungkiemkexoa" id="cbo_tennoidungkiemkexoa" class="cbo" style="width:100%;">
                        </select>                       
                    </td>
					
			</tr>              
             <tr>
					<td height="22" align="right" class="level_1_1">Mã nội dung kiểm kê:</td>
					<td width="50%" align="left" class="level_1_1"><label for="txtmand"></label>
					  <input name="txt_manoidungkiemkexoa" type="text" disabled id="txt_manoidungkiemkexoa" readonly="readonly" "></td>
					
			</tr>    
             <tr>
               <td height="22" align="right" class="level_1_2">Tên đơn vị tính:</td>
               <td height="22" align="center" class="level_1_2"><label for="txtxoatendvt"></label>
                 <input name="txt_tendonvitinhxoa" type="text" disabled id="txt_tendonvitinhxoa" style="width:100%" readonly="readonly"></td>
             </tr>
             <tr>
               <td height="22" align="right" class="level_1_1">Ghi chú nội dung kiểm kê:</td>
               <td height="22" align="center" class="level_1_1"><label for="txtxoaghichundkk"></label>
                 <textarea name="txt_ghichuxoa" disabled readonly="readonly" id="txt_ghichuxoa" style="width:100%"></textarea></td>
             </tr>
             <tr>
						<td colspan="2" height="22" align="center" class="level_1_2">
                        <input name="btn_xoanoidungkiemke" type="button" class="button_1" id="btn_xoanoidungkiemke" value="Xóa">
                        <input name="btn_Huynoidungkiemke" type="reset" class="button_1" id="btn_Huynoidungkiemke" value="Huy"></td>
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
