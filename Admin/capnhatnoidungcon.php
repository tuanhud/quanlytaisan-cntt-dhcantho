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
    <script type="text/javascript" src="js/capnhatnoidungcon.js"></script>
    <script type="text/javascript" src="js/table-noidungcon.js"></script>
    <script type="text/javascript" src="js/yui/yui-min.js"></script>
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
			fillcombo('get_list_noidunglon.php',document.frm_themnoidungcon.cbo_tennoidunglon);
	fillcombo('get_list_noidunglon.php',document.frm_suanoidungcon.cbo_tennoidunglon);
	fillcombo('get_list_noidunglon.php',document.frm_themnoidungcon.cbo_tennoidungcon);
	//fillcombo('get_list_noidungcon.php',document.frm_suanoidungcon.cbo_tennoidungcon);
	$('form[name="frm_themnoidungcon"] select[name="cbo_tennoidunglon"]').change(function(){
		get_info_manoidunglonthem('get_info_manoidunglon.php',document.frm_themnoidungcon);
	});
	$('form[name="frm_suanoidungcon"] select[name="cbo_tennoidunglon"]').change(function(){
		get_info_noidungconsua('get_info_noidungcon.php',document.frm_suanoidungcon.cbo_tennoidunglon.value);
	});
	createTable();
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
                                              <td align="center" width="98%"><table width="707" border="0" cellpadding="0" cellspacing="0">
        <tbody>
          <tr class="main_1">
            <td width="212" align="left"><img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
            <td width="366" align="center">Thêm nội dung con</td>
            <td width="129" align="right"><img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
          </tr>
          <tr>
            <td colspan="3" align="left"><form name="frm_themnoidungcon" id="frm_themnoidungcon">
              <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">
                <tbody>
                  <tr>
                    <td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_2">Chọn tên nội dung lớn:</td>
                    <td width="50%" align="left" class="level_1_2"><select name="cbo_tennoidunglon" class="cbo" id="cbo_tennoidunglon" style="width:100%;">
                    </select></td>
                  
                  <tr>
                    <td height="22" align="right" class="level_1_1">Mã nội dung lớn:</td>
                    <td height="22" align="left" class="level_1_1"><label for="txtmndl"></label>
                      <input name="txt_manoidunglon" type="text" disabled id="txt_manoidunglon" readonly="readonly"></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Tên nội dung con:</td>
                    <td height="22" align="center" class="level_1_1"><label for="txttendc"></label>
                      <label for="cbo_tennoidungcon"></label>
                      <select name="cbo_tennoidungcon" id="cbo_tennoidungcon" style="width:100%">
                      </select></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Thêm nội dung con từ file:</td>
                    <td height="22" align="left" class="level_1_1"><label for="textfield"></label>
                      <input type="file" name="txt_browse" id="txt_browse"></td>
                  </tr>
                  <tr>
                    <td colspan="2" height="22" align="center" class="level_1_2"><input type="button" class="button_1" id="btn_themnoidungcon" value="Thêm">
                      <input name="Reset" type="reset" class="button_1" id="btn_huy" value="Hủy"></td>
                  </tr>
                  <tr>
                    <td colspan="2" height="22" align="center" class="level_1_1">     </td>
                  </tr>
                </tbody>
              </table>
              
            </form>
            </td>
          </tr>
        </tbody>
      </table>
      <br />
      <table width="710" border="0" cellpadding="0" cellspacing="0">
        <tbody>
          <tr class="main_1">
            <td width="211" align="left"><img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
            <td width="368" align="center">Sửa nội dung con</td>
            <td width="131" align="right"><img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
          </tr>
          <tr>
            <td colspan="3" align="left"><form name="frm_suanoidungcon" id="frm_suanoidungcon">
              <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">
                <tr>
                  <td height="22" align="right" class="level_1_1">&nbsp;</td>
                  <td width="50%" height="22" align="center" class="level_1_1">&nbsp;</td>
                </tr>
                <tr>
                  <td height="22" align="right" class="level_1_1">Chọn tên nội dung:</td>
                  <td height="22" align="center" class="level_1_1"><label for="txttendc3"></label>
                    <label for="cbo_tennoidungconsua"></label>
                    <select name="cbo_tennoidunglon" id="cbo_tennoidunglon" style="width:100%">
                    </select></td>
                </tr>
                <tr>
                <td align="center" height="200" class="level_1_1" colspan="4" valign="top">
                  <!--  <div class="yui3-skin-sam">                    
                    <div id="mytable"></div>                    
                    </div>-->
                    </td>
                  </tr>
                <tbody>
                  <tr>
                    <td colspan="2" height="22" align="center" class="level_1_2"><input name="btn_luunoidungcon" type="button" class="button_1" id="btn_luunoidungcon" value="Lưu">
                      <input name="Reset" type="reset" class="button_1" id="btn_huy" value="Hủy"></td>
                  </tr>
                  <tr>
                    <td colspan="2" height="22" align="center" class="level_1_1"></td>
                    </tr>
                </tbody>
              </table>
              
            </form>
            </td>
          </tr>
        </tbody>
      </table></td>
                                                 
                                                 <!--het noi dung-->
                                                 
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
