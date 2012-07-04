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
<<<<<<< .mine
    <script type="text/javascript" src="../jqwidgets/jqxgrid.edit.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxgrid.pager.js"></script>
=======
         <script type="text/javascript" src="../jqwidgets/jqxgrid.edit.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxgrid.pager.js"></script>
>>>>>>> .r177
    	<script type="text/javascript" src="js/ajax.js"></script>
	<script type="text/javascript" src="js/fill.js"></script>
	<script type="text/javascript" src="js/capnhatphieumau.js"></script>
	<script type="text/javascript" src="js/table-noidung.js"></script>
	<script type="text/javascript" src="js/table-noidungsua.js"></script>
	<script type="text/javascript" src="js/date.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            initmenu();
			taobang();
	taobangsua();
	fillcombo('get_list_phieumau.php',document.frm_suaphieumau.cbo_tenphieumausua);
	fillcombo('get_list_phieumau.php',document.frm_xoaphieumau.cbo_tenphieumauxoa);
	init_date_input(document.frm_themphieumau.cbo_ngay,document.frm_themphieumau.cbo_thang,document.frm_themphieumau.cbo_nam);
	init_date_input(document.frm_suaphieumau.cbo_ngaysua,document.frm_suaphieumau.cbo_thangsua,document.frm_suaphieumau.cbo_namsua);
	init_date_input(document.frm_xoaphieumau.cbo_ngayxoa,document.frm_xoaphieumau.cbo_thangxoa,document.frm_xoaphieumau.cbo_namxoa);
	/*$('form[name="frm_themphieumau"] input[name="btn_themphieumau"]').click(function(){		
		themnoidung(document.frm_themphieumau);
	});*/
	$('form[name="frm_suaphieumau"] select[name="cbo_tenphieumausua"]').change(function(){
		get_info_phieumausua('get_info_phieumau.php',document.frm_suaphieumau);
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
                                             
                                              <table width="529" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="105" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="275" align="center">Thêm phiếu mẫu</td>
          <td width="149" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_themphieumau" id="frm_themphieumau">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1"></td>
                    <td width="50%" class="level_1_1"></td>
              </tr>
              <tr>
                <td height="22" align="right" class="level_1_2">Tên phiếu: </td>
                <td height="22" align="center" class="level_1_2"><label for="txttennd"></label>
                  <input type="text" name="txt_tenphieumau" id="txt_tenphieumau" style="width:100%"></td>
              </tr>
              <tr>
                <td height="22" align="right" class="level_1_1">Ngày lập phiếu:</td>
                <td height="22" align="left" class="level_1_1"><label for="txttendvt"></label>
                  <select name="cbo_ngay" id="cbo_ngay">
                    </select>
                  /
                  <label for="ng"></label>
                  <select name="cbo_thang" id="cbo_thang">
                    </select>
                  /
                  <label for="th">
                    <select name="cbo_nam" id="cbo_nam">
                      </select>
                    </label></td>
              </tr>
              <tr>
                <td height="22" align="right" class="level_1_2">Ghi chú: </td>
                <td height="22" align="center" class="level_1_2"><label for="txteraghichund"></label>
                  <label for="txtghind"></label>
                  <textarea name="txt_ghichu" rows="5" id="txt_ghichu" style="width:100%"></textarea></td>
              </tr>
              <tr>
					<td align="center" height="400"  class="level_1_1" colspan="2" valign="top">
<<<<<<< .mine
                       <div style="visibility: visible;" id='jqxWidget'>
=======
                       
>>>>>>> .r177
                            <div id="jqthem"></div>
                          
                            <div style="margin-top: 30px;">
                                <div id="cellbegineditevent"></div>
                               <div style="margin-top: 10px;" id="cellendeditevent"></div>
                           </div>
                           <div style="margin-left: 30px; float: left;">
                                <div style="margin-top: 5px;">
                                    <input type="button" value="Thêm thuộc tính" id="showWindowButton" width="70" />
                                </div> 
                                <div style="margin-top: 5px;">
                                    <input id="deleterowbutton" type="button" value="Xóa thuộc tính" width="70" />
                                </div>
                               
                                
                         </div>
                         <div style="width:400px; border: 0px solid #ccc; margin-top: 10px;"
                            id="mainDemoContainer">
                            </div>
                            <div id="eventWindow" style="display:none">
                                <div>
                                    <img width="14" height="14" src="../jqwidgets/resources/drag.png" alt="" />
                                    Thêm nội dung cho phiếu mẫu:
                                </div>
                                <div>
                                  <div style="margin: 10px">
                                    Chọn nội dung:
                                    <div id='jqxWidgeft3'>
        							</div>
                                   <!-- Chọn thuộc tính
                                    <div id='jqxWidget2'>
        							</div>-->
                                </div>
                                <div>
                                    <div style="float: right; margin-top: 10px; margin-right:38px">
                                       
                                        <input type="button" id="cancel" value="Thoát" />
                                   	 </div>
                                	</div>
                      			</div>
                       		 </div>
                            </div>
                        </td>

              </tr>
              
              <tr>
                <td colspan="2" height="22" align="center" class="level_1_1"><input name="btn_themphieumau" type="button" class="button_1" id="btn_themphieumau" value="Thêm"></td>
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
        <table width="529" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="105" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="275" align="center">Sửa phiếu mẫu</td>
          <td width="149" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_suaphieumau" id="frm_suaphieumau">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_2"></td>
                    <td width="50%" class="level_1_2"></td>
              </tr>
              <tr>
                <td height="22" align="right" class="level_1_2">Chọn phiếu mẫu cần sửa:</td>
                <td align="left" class="level_1_2"><select name="cbo_tenphieumausua" class="cbo" id="cbo_tenphieumausua" style="width:100%;">
                </select></td>
                <tr>
                  <td height="22" align="right" class="level_1_2">Tên phiếu mẫu mới</td>
                  <td align="left" class="level_1_2"><label for="txttenphieumaumoi"></label>
                    <input type="text" name="txt_tenphieumaumoi" id="txt_tenphieumaumoi" style="width:100%"></td>
                <tr>
                  <td height="22" align="right" class="level_1_2">Ngày lập phiếu: </td>
                  <td align="left" class="level_1_2"><label for="ng2"></label>
                    <select name="cbo_ngaysua" id="cbo_ngaysua">
                    </select>
                    /
  <label for="th2"></label>
  <select name="cbo_thangsua" id="cbo_thangsua">
  </select>
  /
  <label for="nam"></label>
  <select name="cbo_namsua" id="cbo_namsua">
</select></td>
                  <tr>
                <td height="22" align="right" class="level_1_2">Ghi chú:: </td>
                <td align="left" class="level_1_2"><label for="ng2"></label>
                  <label for="txtghichu"></label>
                  <textarea name="txt_ghichusua" rows="5" id="txt_ghichusua" style="width:100%"></textarea></td>
              <tr>
             <td align="center" height="400"  class="level_1_1" colspan="2" valign="top">
                       <div style="visibility:visible;" id='jqxWidget3'>
                            <div id="jqsua"></div>
                          
                            <div style="margin-top: 30px;">
                                <div id="cellbegineditevent"></div>
                               <div style="margin-top: 10px;" id="cellendeditevent"></div>
                           </div>

                           <div style="margin-left: 30px; float: left;">
                                <div style="margin-top: 5px;">
                                    <input type="button" value="Thêm thuộc tính" id="showWindowButton2" width="70" />
                                </div> 
                                <div style="margin-top: 5px;">
                                    <input id="deleterowbutton2" type="button" value="Xóa thuộc tính" width="70" />
                                </div>
                               
                                
                         </div>
                         <div style="width:400px; border: 0px solid #ccc; margin-top: 10px;"
                            id="mainDemoContainer2">
                            </div>
                            <div id="eventWindow2" style="display:none">
                                <div>
                                    <img width="14" height="14" src="../jqwidgets/resources/drag.png" alt="" />
                                    Thêm nội dung cho phiếu mẫu:
                                </div>
                                <div>
                                  <div style="margin: 10px">
                                    Chọn nội dung:
                                    <div id='jqxWidget2'>
        							</div>
                                   <!-- Chọn thuộc tính
                                    <div id='jqxWidget2'>
        							</div>-->
                                </div>
                                <div>
                                    <div style="float: right; margin-top: 10px; margin-right:38px">
                                       
                                        <input type="button" id="cancel2" value="Thoát" />
                                   	 </div>
                                	</div>
                      			</div>
                       		 </div>
                            </div>
                        </td>
             </tr>
             <tr>
              <td colspan="2" height="22" align="center" class="level_1_2">
                <input name="btn_luuphieumau" type="button" class="button_1" id="btn_luuphieumau" value="Lưu">
                </td>
            </tr>
             <tr>
               <td colspan="2" height="22" align="center" class="level_1_2">&nbsp;</td>
             </tr>
				  						  
              </tbody>
        </table>
        	</form>
       </td>
      </tr>		
      </tbody>
      </table>
<br />
        <table width="591" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="105" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="275" align="center">Xóa phiếu mẫu</td>
          <td width="211" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_xoaphieumau" id="frm_xoaphieumau">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_2"></td>
                    <td width="50%" class="level_1_2"></td>
              </tr>
              <tr>
                <td height="22" align="right" class="level_1_1">Chọn phiếu mẫu: </td>
                <td align="left" class="level_1_1"><select name="cbo_tenphieumauxoa" class="cbo" id="cbo_tenphieumauxoa" style="width:100%;">
                </select></td>
              </tr>
              <tr>
                <td height="22" align="right" class="level_1_2">Mã phiếu: </td>
                <td align="left" class="level_1_2"><label for="txt_maphieu"></label>
                  <input name="txt_maphieumauxoa" type="text" disabled id="txt_maphieumauxoa" readonly="readonly"></td>
              <tr>
                <td height="22" align="right" class="level_1_2">Ngày lập phiếu: </td>
                <td align="left" class="level_1_2"><label for="ng3"></label>
                  <select name="cbo_ngayxoa" id="cbo_ngayxoa">
                  </select>
                  /
                  <label for="th3"></label>
                  <select name="cbo_thangxoa" id="cbo_thangxoa">
                  </select>
                  /
                  <label for="nam"></label>
                  <select name="cbo_namxoa" id="cbo_namxoa">
                  </select></td>
              <tr>
                <td height="22" align="right" class="level_1_2">Ghi chú:: </td>
                <td align="left" class="level_1_2"><label for="ng4"></label>
                  <label for="txtghichu"></label>
                  <textarea name="txt_ghichu" rows="5" disabled readonly="readonly" id="txt_ghichu" style="width:100%"></textarea></td>
                  
            <tr>
              <td colspan="2" height="22" align="center" class="level_1_2">
                <input name="btn_xoaphieumau" type="button" class="button_1" id="btn_xoaphieumau" value="Xóa">
                </td>
            </tr>
            <tr>
              <td colspan="2" height="22" align="center" class="level_1_2">&nbsp;</td>
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
