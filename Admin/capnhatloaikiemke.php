
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
<script type="text/javascript" src="js/capnhatloaikiemke.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            initmenu();
			document.frm_themloaikiemke.txt_tenloaikiemke.focus();
	fillcombo('get_list_loaikiemke.php',document.frm_sualoaikiemke.cbo_tenloaikiemkesua);
	fillcombo('get_list_loaikiemke.php',document.frm_xoaloaikiemke.cbo_tenloaikiemkexoa);
	
	$('form[name="frm_sualoaikiemke"] select[name="cbo_tenloaikiemkesua"]').change(function(){
		get_info_loaikiemkesua('get_info_loaikiemke.php',document.frm_sualoaikiemke);
	});
	
	$('form[name="frm_xoaloaikiemke"] select[name="cbo_tenloaikiemkexoa"]').change(function(){
		get_info_loaikiemkexoa('get_info_loaikiemke.php',document.frm_xoaloaikiemke);
	});
	//su kien nhan button them
	/*$('form[name="frm_themloaikiemke"] input[type="button"]').click(function(){
		themban('../themloaikiemke.php',document.frm_themloaikiemke);	
	});
	
	//su kien nhan button sua
	$('form[name="frm_suaban"] input[type="button"]').click(function(){
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
                           
                           				 <table style="table-layout: fixed; border-collapse: collapse;" cellspacing="0" cellpadding="0">
                                <tbody>
                                
    							 <tr>
                                        <td height="100%"  class="demoContent" valign="middle">
                                              <table width="752" border="0" cellpadding="0" cellspacing="0" align="center">      
                                          
                                          
                                          <!--noi dung o day-->
                                          <tr>       
                                              <td align="center" width="44%" valign="middle">
                                             
                                             <table width="521" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="105" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="275" align="center">Thêm loại kiểm kê</td>
          <td width="141" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_themloaikiemke" id="frm_themloaikiemke">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
               <tr>
					<td height="22" align="right" class="level_1_2">Tên loại kiểm kê:</td>
					<td width="50%" align="left" class="level_1_2">
                    	<input name="txt_tenloaikiemke" type="text" class="txtbox" id="txt_tenloaikiemke" style="width:100%" onKeyPress="return keypress(event)" value="" maxlength="31"></td>
			</tr>                
              <tr>
                <td colspan="2" height="22" align="center" class="level_1_1"><input name="btn_themloaikiemke" type="button" class="button_1" id="btn_themloaikiemke" value="Thêm"></td>
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
<br />
        <table width="519" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="105" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="275" align="center">Sửa loại kiểm kê</td>
          <td width="139" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_sualoaikiemke" id="frm_sualoaikiemke">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
             <tr>
					<td height="22" align="right" class="level_1_2">Chọn tên loại kiểm kê: </td>
					<td width="50%" align="left" class="level_1_2">
                    	<select name="cbo_tenloaikiemkesua" class="cbo" id="cbo_tenloaikiemkesua" style="width:100%;">
                        </select>                       
                    </td>
			</tr>
             <tr>
               <td height="22" align="right" class="level_1_1">Mã loại kiểm kê: </td>
               <td align="left" class="level_1_1"><label for="txt_maloaikiemke"></label>
                 <input name="txt_maloaikiemke" type="text" disabled id="txt_maloaikiemke" readonly="readonly"></td>
             </tr>
             <tr>
					<td height="22" align="right" class="level_1_1">Tên kiểm kê mới: </td>
					<td width="50%" align="left" class="level_1_1">
                    	<input name="txt_tenloaikiemkemoi" type="text" class="txtbox" id="txt_tenloaikiemkemoi" style="width:100%" onKeyPress="return keypress(event)" value="" maxlength="31">
					</td>
			</tr> 
            <tr>
              <td colspan="2" height="22" align="center" class="level_1_2">
                <input name="btn_luuloaikiemke" type="button" class="button_1" id="btn_luuloaikiemke" value="Lưu">
                </td>
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
        <table width="518" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="105" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="275" align="center">Xóa loại kiểm kê</td>
          <td width="138" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_xoaloaikiemke" id="frm_xoaloaikiemke">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
             <tr>
					<td height="22" align="right" class="level_1_2">Chọn loại kiểm kê:</td>
					<td width="50%" align="left" class="level_1_2">
                    	<select name="cbo_tenloaikiemkexoa" class="cbo" id="cbo_tenloaikiemkexoa" style="width:100%;">
                        </select>                       
                    </td>
			</tr>              
              <tr>
              <tr>
                <td height="22" align="right" class="level_1_1">Mã loại kiểm kê:</td>
                <td height="22" align="left" class="level_1_1"><label for="txtmakk"></label>
                  <input name="txtmakk" type="text" disabled id="txt_maloaikiemkexoa" readonly="readonly"></td>
              </tr>
              <tr>
						<td colspan="2" height="22" align="center" class="level_1_2">
                        <input name="btn_xoaloaikiemke" type="button" class="button_1" id="btn_xoaloaikiemke" value="Xóa">
                        </td>
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
