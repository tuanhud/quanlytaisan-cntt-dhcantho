<?php	
	//khoi dong session
	session_start();

	//kiem tra quyen truoc khi hien thi trang
	if($_SESSION['maquyen']!="ADMIN"&&$_SESSION['lockkk']!="LOCKKK")
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
<title>Khóa phiếu mẫu</title>
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
	<script type="text/javascript" src="js/khoaphieumau.js"></script>
	<script type="text/javascript" >
    $(document).ready(function() { 
      fillcombo2('get_list_phieumaulock.php',document.frm_khoaphieu.cbo_maphieumaulock); 
	  fillcombo2('get_list_phieumauunlock.php',document.frm_mokhoaphieu.cbo_maphieumauunlock); 
	   
	 $('form[name="frm_khoaphieu"] select[name="cbo_maphieumaulock"]').change(
		function(){get_info_phieumau('get_info_phieumaulock.php',document.frm_khoaphieu);
	});
	
	 $('form[name="frm_mokhoaphieu"] select[name="cbo_maphieumauunlock"]').change(
		function(){get_info_phieumauunlock('get_info_phieumaulock.php',document.frm_mokhoaphieu);
	});
	
	}); 
    </script>
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
          <td width="419" align="center">Khóa cập nhật phiếu mẫu </td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_khoaphieu" id="frm_khoaphieu">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
             <tr>
					<td height="22" align="right" class="level_1_2">Chọn mã phiếu mẫu</td>
					<td width="70%" align="left" class="level_1_2">
                    	<select name="cbo_maphieumaulock" id="cbo_maphieumaulock" class="cbo" style="width:90%;"> </select>
					</td>
			</tr>
			<tr>
					<td height="22" align="right" class="level_1_1">Tên phiếu mẫu</td>
					<td width="57%" align="left" class="level_1_1">
                    	<input name="txt_tenphieumaulock" id="txt_tenphieumaulock" type="text" class="txtbox" style="width:90%"></td>
			</tr>    
			 <tr>
					<td height="22" align="right" class="level_1_1">Ghi chú phiếu</td>
					<td width="57%" align="left" class="level_1_1">
                    	<input name="txt_ghichuphieulock" id="txt_ghichuphieulock" type="text" class="txtbox" style="width:90%"></td>
			</tr>
            <tr>
					<td height="30" align="right" class="level_1_1">Ngày lập</td>
					<td width="57%" align="left" class="level_1_1">
                    	<input name="txt_ngaylaplock" id="txt_ngaylaplock" type="text" class="txtbox" style="width:10%"> / <input name="txt_thanglaplock" id="txt_thanglaplock" type="text" class="txtbox" style="width:10%"> / <input name="txt_namlaplock" id="txt_namlaplock" type="text" class="txtbox" style="width:20%"></td>
			</tr>      
            <tr>
					<td height="22" align="right" class="level_1_1">Ngày cập nhật mới nhất</td>
					<td width="57%" align="left" class="level_1_1">
                    	<input name="txt_ngaycapnhatlock" id="txt_ngaycapnhatlock" type="text" class="txtbox" style="width:47%"></td>
			</tr>             
            <tr>
						<td colspan="2" height="22" align="center" class="level_1_1">
                        <input name="btn_khoa" id="btn_khoa" type="button" class="button_1" value="Khóa">
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
          <td width="419" align="center">Bỏ khóa cập nhật phiếu mẫu </td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_mokhoaphieu" id="frm_mokhoaphieu">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
             <tr>
					<td height="22" align="right" class="level_1_2">Chọn mã phiếu mẫu</td>
					<td width="70%" align="left" class="level_1_2">
                    	<select name="cbo_maphieumauunlock" id="cbo_maphieumauunlock" class="cbo" style="width:90%;"> </select>
					</td>
			</tr>
			<tr>
					<td height="22" align="right" class="level_1_1">Tên phiếu mẫu</td>
					<td width="57%" align="left" class="level_1_1">
                    	<input name="txt_tenphieumauunlock" id="txt_tenphieumauunlock" type="text" class="txtbox" style="width:90%"></td>
			</tr>    
			 <tr>
					<td height="22" align="right" class="level_1_1">Ghi chú phiếu</td>
					<td width="57%" align="left" class="level_1_1">
                    	<input name="txt_ghichuphieuunlock" id="txt_ghichuphieuunlock" type="text" class="txtbox" style="width:90%"></td>
			</tr>
            <tr>
					<td height="30" align="right" class="level_1_1">Ngày lập</td>
					<td width="57%" align="left" class="level_1_1">
                    	<input name="txt_ngaylapunlock" id="txt_ngaylapunlock" type="text" class="txtbox" style="width:10%"> / <input name="txt_thanglapunlock" id="txt_thanglapunlock" type="text" class="txtbox" style="width:10%"> / <input name="txt_namlapunlock" id="txt_namlapunlock" type="text" class="txtbox" style="width:20%"></td>
			</tr>      
            <tr>
					<td height="22" align="right" class="level_1_1">Ngày cập nhật mới nhất</td>
					<td width="57%" align="left" class="level_1_1">
                    	<input name="txt_ngaycapnhatunlock" id="txt_ngaycapnhatunlock" type="text" class="txtbox" style="width:47%"></td>
			</tr>             
            <tr>
						<td colspan="2" height="22" align="center" class="level_1_1">
                        <input name="btn_bokhoa" id="btn_bokhoa" type="button" class="button_1" value="Mở khóa">
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
                                            <td align="center"></td>
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
