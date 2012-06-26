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
    <script type="text/javascript" src="js/date.js"></script>
    <script type="text/javascript" src="js/capnhatthanhly.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            initmenu();
			fillcombo('get_list_taisan.php',document.frm_themthanhly.cbo_tentaisanthanhlythem);
	//fillcombo('get_list_taisan.php',document.frm_suathanhly.cbo_tentaisanthanhlysua);
	fillcombo2('get_list_namthanhly.php',document.frm_xoathanhly.cbo_namthanhlyxoa);
	fillcombo2('get_list_namthanhly.php',document.frm_suathanhly.cbo_namthanhlysua);
			$('form[name="frm_themthanhly"] select[name="cbo_tentaisanthanhlythem"]').change(function(){
		get_info_ma_soluong_taisan('get_info_ma_soluong_taisan.php',document.frm_themthanhly);
	});
	$('form[name="frm_suathanhly"] select[name="cbo_namthanhlysua"]').change(function(){
		fillcombo2cbo('get_list_mathanhly.php',document.frm_suathanhly.cbo_namthanhlysua,document.frm_suathanhly.cbo_mathanhlysua);
	});
	$('form[name="frm_xoathanhly"] select[name="cbo_namthanhlyxoa"]').change(function(){
		fillcombo2cbo('get_list_mathanhly.php',document.frm_xoathanhly.cbo_namthanhlyxoa,document.frm_xoathanhly.cbo_mathanhlyxoa);
	});
	$('form[name="frm_suathanhly"] select[name="cbo_mathanhlysua"]').change(function(){
		get_info_thanhlysua('get_info_thanhlysua.php',document.frm_suathanhly);
	});
	$('form[name="frm_xoathanhly"] select[name="cbo_mathanhlyxoa"]').change(function(){
		get_info_thanhlyxoa('get_info_thanhlysua.php',document.frm_xoathanhly);
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
			
	// Load ngay thang nam  cho nguoi dung chon them
	
	$('form[name="frm_themthanhly"] select[name="cbo_tentaisanthanhlythem"]').change(function(){
		get_info_mataisan('get_info_mataisan.php',document.frm_themthanhly);
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
                      <td align="center" width="100%"><table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
          <tr class="main_1">
            <td width="161" align="left"><img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
            <td width="419" align="center">Thêm  thanh lý</td>
            <td width="180" align="right"><img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
          </tr>
          <tr>
            <td colspan="3" align="left"><form name="frm_themthanhly" id="frm_themthanhly">
              <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">
                <tbody>
                  <tr>
                    <td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_2">Chọn tài sản cần thanh lý:</td>
                    <td width="50%" align="left" class="level_1_2"><select name="cbo_tentaisanthanhlythem" class="cbo" id="cbo_tentaisanthanhlythem" style="width:100%;">
                    </select></td>
                  <tr>
                    <td height="22" align="right" class="level_1_2">Mã tài sản:</td>
                    <td width="50%" align="left" class="level_1_2"><input name="txt_mataisanthem" type="text" class="txtbox" id="txt_mataisanthem"  onKeyPress="return keypress(event)" value="" maxlength="31" readonly="readonly"></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Số lượng tài sản thanh lý:</td>
                    <td width="50%" align="left" class="level_1_1"><p>
                      <input name="txt_soluongtaisan" type="text" class="txtbox" id="txt_soluongtaisan" onKeyPress="return keypress(event)"  value="" maxlength="31" style="width:30%">
                    
                        SLTS hiện có:
                        <label for="txt_sltshienco"></label>
                        <input name="txt_sltshienco" type="text" id="txt_sltshienco" style="width:20%" readonly="readonly">
                      </p></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Diễn giải thanh lý:</td>
                    <td width="50%" align="left" class="level_1_1"><textarea name="txt_diengiai" class="txtbox" id="txt_diengiai" style="width:100%" onKeyPress="return keypress(event)"></textarea></td>
                  </tr>
                  <tr>
                    <td colspan="2" height="22" align="center" class="level_1_2"><input name="btn_themthanhly" type="button" class="button_1" id="btn_themthanhly" value="Thêm">
                      <input name="btn_huy" type="reset" class="button_1" id="btn_huy" value="Hủy"></td>
                  </tr>
                  <tr>
                    <td colspan="2" height="22" align="center" class="level_1_1">&nbsp;</td>
                  </tr>
                </tbody>
              </table>
            </form></td>
          </tr>
        </tbody>
      </table>
      <br />
      <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
          <tr class="main_1">
            <td width="161" align="left"><img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
            <td width="419" align="center">Sửa  thanh lý tài sản</td>
            <td width="180" align="right"><img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
          </tr>
          <tr>
            <td colspan="3" align="left"><form name="frm_suathanhly" id="frm_suathanhly">
              <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">
                <tbody>
                  <tr>
                    <td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Năm thanh lý: </td>
                    <td align="left" class="level_1_1"><label for="cbonamtl2"></label>
                      <label for="txt_nasua2"></label>
                      <label for="cbo_namsua"></label>
                      <select name="cbo_namthanhlysua" id="cbo_namthanhlysua" style="width:40%">
                      </select></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Mã thanh lý:</td>
                    <td align="left" class="level_1_1"><label for="txtmatl3"></label>
                      <label for="cbo_mathanhlysua"></label>
                      <select name="cbo_mathanhlysua" id="cbo_mathanhlysua" style="width:40%">
                      </select></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_2">Tên tài sản  thanh lý:</td>
                    <td width="50%" align="left" class="level_1_2"><label for="txt_tentaisanthanhlysua"></label>
                      <input name="txt_tentaisanthanhlysua" type="text" id="txt_tentaisanthanhlysua" style="width:100%" readonly="readonly"></td>
                  <tr>
                    <td height="22" align="right" class="level_1_2">Mã tài sản:</td>
                    <td width="50%" align="left" class="level_1_2"><input name="txt_mataisansua" type="text" class="txtbox" id="txt_mataisansua" onKeyPress="return keypress(event)" value="" maxlength="31" readonly="readonly" style="width:40%"></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Số lượng tài sản thanh lý:</td>
                    <td width="50%" align="left" class="level_1_1"><p>
                      <input name="txt_soluongtaisansua" type="text" class="txtbox" id="txt_soluongtaisansua" onKeyPress="return keypress(event)" value="" maxlength="31" style="width:30%">
                      SLTS hiện có: 
                      <label for="txt_sltshiencosua"></label>
                      <input name="txt_sltshiencosua" type="text" id="txt_sltshiencosua" style="width:20%" readonly="readonly">
                      </p></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Diễn giải thanh lý:</td>
                    <td width="50%" align="left" class="level_1_1"><label for="txt_diengiai"></label>
                      <textarea name="txt_diengiaisua" id="txt_diengiaisua" style="width:100%"></textarea></td>
                  </tr>
                  <tr>
                    <td colspan="2" height="22" align="center" class="level_1_2"><input name="btn_luuthanhly" type="button" class="button_1" id="btn_luuthanhly" value="Lưu">
                      <input name="btn_huy" type="reset" class="button_1" id="btn_huy" value="Hủy"></td>
                  </tr>
                  <tr>
                    <td colspan="2" height="22" align="center" class="level_1_1">&nbsp;</td>
                  </tr>
                </tbody>
              </table>
            </form></td>
          </tr>
        </tbody>
      </table>
      <br />
      <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
          <tr class="main_1">
            <td width="161" align="left"><img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
            <td width="419" align="center">Xóa thanh lý</td>
            <td width="180" align="right"><img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
          </tr>
          <tr>
            <td colspan="3" align="left"><form name="frm_xoathanhly" id="frm_xoathanhly">
              <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">
                <tbody>
                  <tr>
                    <td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Năm thanh lý: </td>
                    <td align="left" class="level_1_1"><label for="cbonamtl3"></label>
                      <label for="txt_namxoa2"></label>
                      <label for="cbo_namthanhlyxoa"></label>
                      <select name="cbo_namthanhlyxoa" id="cbo_namthanhlyxoa" style="width:40%">
                      </select></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Mã thanh lý:</td>
                    <td align="left" class="level_1_1"><label for="txtmatl4"></label>
                      <label for="cbo_mathanhlyxoa"></label>
                      <select name="cbo_mathanhlyxoa" id="cbo_mathanhlyxoa" style="width:40%">
                      </select></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_2">Tên tài sản cần xóa thanh lý:</td>
                    <td width="50%" align="left" class="level_1_2"><label for="txt_tentaisanthanhlyxoa"></label>
                      <input name="txt_tentaisanthanhlyxoa" type="text" id="txt_tentaisanthanhlyxoa" style="width:100%" readonly="readonly"></td>
                  <tr>
                    <td height="22" align="right" class="level_1_2">Mã tài sản:</td>
                    <td width="50%" align="left" class="level_1_2"><input name="txt_mataisanxoa" type="text" class="txtbox" id="txt_mataisanxoa" onKeyPress="return keypress(event)" value="" maxlength="31" readonly="readonly"></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Số lượng tài sản thanh lý:</td>
                    <td width="50%" align="left" class="level_1_1"><input name="txt_soluongtaisanxoa" type="text" class="txtbox" id="txt_soluongtaisanxoa" style="width:30%"  onKeyPress="return keypress(event)" value="" maxlength="31" readonly="readonly"></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" class="level_1_1">Diễn giải thanh lý:</td>
                    <td width="50%" align="left" class="level_1_1"><textarea name="txt_diengiaixoa" readonly="readonly" class="txtbox" id="txt_diengiaixoa" style="width:100%" onKeyPress="return keypress(event)"></textarea></td>
                  </tr>
                  <tr>
                    <td colspan="2" height="22" align="center" class="level_1_2"><input name="btn_xoathanhly" type="button" class="button_1" id="btn_xoathanhly" value="Xóa">
                      <input name="btn_huy" type="reset" class="button_1" id="btn_huy" value="Hủy"></td>
                  </tr>
                  <tr>
                    <td colspan="2" height="22" align="center" class="level_1_1">&nbsp;</td>
                  </tr>
                </tbody>
              </table>
            </form></td>
          </tr>
        </tbody>
  </table></td>
    
    
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
