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
 <title>Cập nhật người dùng</title>
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
	<script type="text/javascript" src="js/capnhatnguoidung.js"></script>
	<script type="text/javascript" src="js/date.js"></script>
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
        
			//Không cho nhập ký tự
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
				return false;
			}
			}
			//khong cho nhap so
			function keypress2(e)
			{
				var keypressed2 = null;
				if (window.event)
					keypressed2 = window.event.keyCode; //IE
				else 
					keypressed2 = e.which; //NON-IE, Standard
				
				if (keypressed2 > 48 && keypressed2 < 57)
				{ 
					//CharCode của 0 là 48 (Theo bảng mã ASCII)
					//CharCode của 9 là 57 (Theo bảng mã ASCII)
					if (keypressed2 == 8 || keypressed2 == 127)
					{
					//Phím Delete và Phím Back
					return;
					}
					return false;
				}
			}
			
			document.frm_themcanbo.cbo_tendonvithem.focus();
			//load combo don vi
			fillcombo('get_list_donvi.php',document.frm_themcanbo.cbo_tendonvithem);
			fillcombo('get_list_donvi.php',document.frm_xoacanbo.cbo_tendonvixoa);
			fillcombo('get_list_donvi.php',document.frm_suacanbo.cbo_tendonvisua);
			
			fillcombo2('get_list_canbo.php',document.frm_suacanbo.cbo_macanbosua);
			fillcombo2('get_list_canbo.php',document.frm_xoacanbo.cbo_macanboxoa);
			
			//load combo ngay, thang, nam cho nguoi dung chon
			init_date_input(document.frm_themcanbo.cbo_ngaysinh,document.frm_themcanbo.cbo_thangsinh,document.frm_themcanbo.cbo_namsinh);	
			init_date_input(document.frm_suacanbo.cbo_ngaysinhsua,document.frm_suacanbo.cbo_thangsinhsua,document.frm_suacanbo.cbo_namsinhsua);
			
			//su kien change combo ma can bo
			$('form[name="frm_suacanbo"] select[name="cbo_macanbosua"]').change(function(){
				get_info_canbo('get_info_canbo.php',document.frm_suacanbo);
			});
			//su kien change combo ma can bo trong form xoa can bo
			$('form[name="frm_xoacanbo"] select[name="cbo_macanboxoa"]').change(function(){
				get_info_canbo2('get_info_canbo.php',document.frm_xoacanbo);
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
                            <td width="794" valign="top" class="rc-all content" id="demos">
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
    		<td height="100%" align="center" valign="top">   
		 	<table width="500" border="0" cellpadding="0" cellspacing="0">
       		<tbody>
					<tr class="main_1">
					  <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
					  <td width="419" align="center">Thêm cán bộ</td>
					  <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
					</tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_themcanbo" id="frm_themcanbo">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
             
              <tr>
					<td height="22" align="right" class="level_1_2">Chọn đơn vị </td>
					<td width="70%" align="left" class="level_1_2">
                    <select class="cbo" name="cbo_tendonvithem" id="cbo_tendonvithem" style="width:80%"></select>
                    <input type="button" class="button_1" value="Thêm" >
                    </td>
              </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Mã số cán bộ</td>
					<td width="50%" align="left" class="level_1_2"><input name="txt_masocanbo" id="txt_masocanbo" class="txtbox" style="width:100%" value="" maxlength="6" onKeyPress="return keypress(event)"></td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_1">Tên cán bộ</td>
					<td width="50%" align="left" class="level_1_1"><input name="txt_tencanbo" id="txt_tencanbo" class="txtbox" style="width:100%" value="" onKeyPress="return keypress2(event)"></td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Giới tính</td>
					<td width="50%" align="left" class="level_1_2">
					 <select name="cbo_gioitinh" id="cbo_gioitinh">
                     	<option value="-1">Giới tính</option>
                     	<option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                     </select>					
					</td>
			  </tr>
			  <tr>
					<td height="22" align="right" class="level_1_1">Ngày sinh</td>
					<td width="50%" align="left" class="level_1_1">
                   		<select name="cbo_ngaysinh" id="cbo_ngaysinh" style="width:60">
                      
                   </select>
                   		/
						<select title="- Chọn Tháng -" name="cbo_thangsinh" id="cbo_thangsinh" class="" aria-required="true" tabindex="1" style="width:70">
                   
                              </select>
						/
						<select title="- Chọn Tháng -" name="cbo_namsinh" id="cbo_namsinh" class="" aria-required="true" tabindex="1" style="width:70">
                        		
                              </select>
					</td>
			  </tr>
               <tr>
					<td height="22" align="right" class="level_1_2">Email</td>
					<td width="50%" align="left" class="level_1_2">
					<input name="txt_email" id="txt_email" class="txtbox" type="text" style="width:100%">					</td>
			  </tr>
			   <tr>
					<td height="22" align="right" class="level_1_1">Địa chỉ</td>
					<td width="50%" align="left" class="level_1_1">
					<input name="txt_diachi" id="txt_diachi" class="txtbox" type="text" style="width:100%" value="">					</td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Số điện thoại</td>
					<td width="50%" align="left" class="level_1_2">
					<input name="txt_sodienthoai" id="txt_sodienthoai" class="txtbox"  type="text" style="width:100%" value="" maxlength="12" onKeyPress="return keypress(event)">					
					</td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_1">Mật khẩu</td>
					<td width="50%" align="left" class="level_1_1">
					<input name="txt_matkhau" id="matkhau" class="txtbox" type="password" style="width:100%" value="">					</td>
			  </tr>
			  <tr>
              		<td colspan="2" height="22" align="center" class="level_1_2"><input type="button" name="btn_themcanbo" id="btn_themcanbo" class="button_1" value="Thêm"></td>
              </tr>
              
              </tbody>
           </table>
           </form>
          </td>
        </tr>
        <tr>
          <td colspan="3" align="left">
            	<form name="frm_importcanbo" id="frm_importcanbo" action="importcanboUI.php" enctype="multipart/form-data" method="post" target="export" onSubmit="return isValid();window.open('', 'export', 'width=1350,height=660,status=yes,resizable=yes,scrollbars=yes')">
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
              		<td colspan="2" height="22" align="center" class="level_1_1"><input type="submit" name="btn_importcanbo" class="button_1" value="Xem trước"></td>
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
          <td width="419" align="center">Sửa thông tin cán bộ</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_suacanbo" id="frm_suacanbo">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
              <tr>
              		<td height="22" align="right" class="level_1_1">Chọn mã số cán bộ</td>
                    <td width="70%" align="left" class="level_1_1"><select class="cbo" name="cbo_macanbosua" id="cbo_macanbosua" style="width:100%">
                    </select></td>
              </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Chọn đơn vị</td>
					<td width="50%" align="left" class="level_1_2"><select class="cbo" id="cbo_tendonvisua" name="cbo_tendonvisua" style="width:85%"></select><input type="button" class="button_1" value="Thêm" ></td>
			  </tr>
            
              <tr>
					<td height="22" align="right" class="level_1_1">Tên cán bộ</td>
					<td width="50%" align="left" class="level_1_1"><input name="txt_tencanbosua" id="txt_tencanbosua" class="txtbox" style="width:85%" value=""><input type="button" class="button_1" value="Tìm" ></td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Giới tính</td>
					<td width="50%" align="left" class="level_1_2">
					<select name="cbo_gioitinhsua" id="cbo_gioitinhsua">
                     	<option value="-1">Giới tính</option>
                     	<option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                     </select>				
                    </td>
			  </tr>
			  <tr>
					<td height="22" align="right" class="level_1_1">Ngày sinh</td>
					<td width="50%" align="left" class="level_1_1">
                   		<select name="cbo_ngaysinhsua" id="cbo_ngaysinhsua" style="width:60">
                      
                   </select>
                   		/
						<select title="- Chọn Tháng -" name="cbo_thangsinhsua" id="cbo_thangsinhsua" class="" aria-required="true" tabindex="1">
                   
                              </select>
						/
						<select title="- Chọn Tháng -" name="cbo_namsinhsua" id="cbo_namsinhsua" class="" aria-required="true" tabindex="1">
                        		
                              </select>
					</td>
			  </tr>
               <tr>
					<td height="22" align="right" class="level_1_2">Email</td>
					<td width="50%" align="left" class="level_1_2">
					<input name="txt_emailsua" id="txt_emailsua" class="txtbox" type="text" style="width:100%">
					</td>
			  </tr>
			   <tr>
					<td height="22" align="right" class="level_1_1">Địa chỉ</td>
					<td width="50%" align="left" class="level_1_1">
					<input name="txt_diachisua" id="txt_diachisua" class="txtbox" type="text" style="width:100%" value="">					</td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Số điện thoại</td>
					<td width="50%" align="left" class="level_1_2">
					<input name="txt_sodienthoaisua" id="txt_sodienthoaisua" class="txtbox"  type="text" style="width:100%" value="" maxlength="12" onKeyPress="return keypress(event)">					</td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_1">Mật khẩu</td>
					<td width="50%" align="left" class="level_1_1">
					<input name="txt_matkhausua" id="matkhausua" class="txtbox" type="password" style="width:100%" value="">					</td>
			  </tr>
              <tr>
              		<td colspan="2" height="22" align="center" class="level_1_2"><input id="btn_suacanbo" name="btn_suacanbo" type="button" class="button_1" value="Lưu" ></td>
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
          <td width="419" align="center">Xóa cán bộ</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_xoacanbo" id="frm_xoacanbo">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_2"></td>
              </tr>
              
              <tr>
					<td height="22" align="right" class="level_1_2">Chọn mã số cán bộ</td>
					<td width="70%" align="left" class="level_1_2"><select class="cbo" name="cbo_macanboxoa" id="cbo_macanboxoa" style="width:100%"></select></td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_1">Tên cán bộ</td>
					<td width="50%" align="left" class="level_1_1"><input name="txt_tencanboxoa" id="txt_tencanboxoa" class="txtbox" style="width:85%" value=""><input type="button" class="button_1" value="Tìm" ></td>
			  </tr>
              <tr>
              		<td colspan="2" height="22" align="center" class="level_1_2"><input id="btn_xoacanbo" name="btn_xoacanbo" type="button" class="button_1" value="Xóa"></td>
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
