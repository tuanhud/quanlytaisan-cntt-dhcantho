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
    <script type="text/javascript" src="capnhatcanhan.js"></script>
    <script type="text/javascript" src="js/date.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            initmenu();
			init_date_input(document.frm_suattcanhan.cbo_ngaysinh,document.frm_suattcanhan.cbo_thangsinh,document.frm_suattcanhan.cbo_namsinh);	
	
    get_info_thongtin('get_info_thongtin.php',document.frm_suattcanhan);	
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

			//chuc nang thoat
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
   			 <?php include_once('../header.php');?> 
    <!--end header-->
    <!--begin content-->
    <div style="Z-INDEX: 1; LEFT: 1031px; WIDTH: 200px; POSITION: absolute; TOP: 9px; HEIGHT: 30px" align="center">     <font style="FONT-WEIGHT: 700; FONT-SIZE: 8pt; line-height:20px;" face="Tahoma" color="#FFFFFF"><a href="capnhatthongtincanhanad.php">Cập nhật thông tin cá nhân</a>| <a class="white" href="javascript:thoat();">Thoát</a> <br />
         Xin chào,
         <?=$_SESSION['hoten']?>
         <br />
         (<font style="FONT-WEIGHT: 700; FONT-SIZE: 8pt; line-height:20px;" face="Tahoma" color="#FFFFFF">
  <?=$_SESSION['msclb']?>
   <?
			$msclb =$_SESSION['msclb'];
			session_register("msclb") ;
			?>
</font>) </font></div>
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
            <td width="161" align="left"><img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
            <td width="419" align="center">Sửa thông tin cá nhân</td>
            <td width="180" align="right"><img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
          </tr>
          <tr>
            <td colspan="3" align="left"><form name="frm_suattcanhan" id="frm_suattcanhan">
              <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">
                <tbody>
                  <tr>
                    <td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_2">Đơn vị </td>
                    <td width="70%" align="left" class="level_1_2"><input name="txt_donvi" class="txtbox" id="txt_donvi" style="width:100%" onKeyPress="return keypress(event)" maxlength="6" readonly></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_2">Mã số cán bộ</td>
                    <td width="70%" align="left" class="level_1_2"><input name="txt_masocanbo" class="txtbox" id="txt_masocanbo" style="width:100%" onKeyPress="return keypress(event)" maxlength="6" readonly></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Tên cán bộ</td>
                    <td width="70%" align="left" class="level_1_1"><input name="txt_tencanbo" id="txt_tencanbo" class="txtbox" style="width:100%" onKeyPress="return keypress2(event)"></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_2">Giới tính</td>
                    <td width="70%" align="left" class="level_1_2">
                    <select name="cbo_gioitinh" id="cbo_gioitinh" >
                      <?php
					  $gt=$_SESSION['gioitinh'];
					if($gt =='Nam'){
						echo "<option value='Nam' selected>Nam</option>";
						echo "<option value='Nữ' >Nữ</option>";
					}
					else
					{
						echo "<option value='Nam'>Nam</option>";
                      echo "<option value='Nữ' selected>Nữ</option>";
					}
					  ?>
                      
                      
                    </select></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Ngày sinh</td>
                    <td width="70%" align="left" class="level_1_1"><select name="cbo_ngaysinh" id="cbo_ngaysinh" style="width:60">
                    </select>
                      /
                      <select title="- Chọn Tháng -" name="cbo_thangsinh" id="cbo_thangsinh" class="" aria-required="true" tabindex="1" style="width:70">
                      </select>
                      /
                      <select title="- Chọn Tháng -" name="cbo_namsinh" id="cbo_namsinh" class="" aria-required="true" tabindex="1" style="width:70">
                      </select></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_2">Email</td>
                    <td width="70%" align="left" class="level_1_2"><input name="txt_email" type="text" class="txtbox" id="txt_email" style="width:100%"></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Địa chỉ</td>
                    <td width="70%" align="left" class="level_1_1"><input name="txt_diachi" id="txt_diachi" class="txtbox" type="text" style="width:100%"></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_2">Số điện thoại</td>
                    <td width="70%" align="left" class="level_1_2"><input name="txt_sodienthoai" id="txt_sodienthoai" class="txtbox"  type="text" style="width:100%" maxlength="12" onKeyPress="return keypress(event)"></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Mật khẩu</td>
                    <td width="70%" align="left" class="level_1_1"><input name="txt_matkhau" id="matkhau" class="txtbox" type="password" style="width:100%" value=""></td>
                  </tr>
                  <tr>
                    <td colspan="2" height="22" align="center" class="level_1_2"><input type="button" name="btn_capnhat" id="btn_capnhat" class="button_1" value="Cập nhật"></td>
                  </tr>
                </tbody>
              </table>
            </form></td>
          </tr>
        </tbody>
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
                       	</table></td>
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
