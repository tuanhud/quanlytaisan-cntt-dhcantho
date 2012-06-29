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
<script type="text/javascript" src="js/capnhatdacdiem.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            initmenu();
		fillcombo2('get_list_dacdiem.php',document.frm_xoadd.cbo_tenddxoa);
		fillcombo2('get_list_dacdiem.php',document.frm_suadd.cbo_tenddsua);
		fillcombo('get_list_vpp.php',document.frm_themddvpp.cbo_tenvppthem);
		fillcombo2('get_list_dacdiem.php',document.frm_themddvpp.cbo_dacdiemvppthem);
		fillcombo('get_list_vpp2.php',document.frm_suaddvpp.cbo_vppsua);
		fillcombo('get_list_vpp2.php',document.frm_xoaddvpp.cbo_vppxoa);
		$('form[name="frm_suaddvpp"] select[name="cbo_vppsua"]').change(function(){
		_fillcombo('get_list_dacdiem2.php',document.frm_suaddvpp.cbo_vppsua, document.frm_suaddvpp.cbo_ddvppsua);
	});
	$('form[name="frm_xoaddvpp"] select[name="cbo_vppxoa"]').change(function(){
		_fillcombo('get_list_dacdiem2.php',document.frm_xoaddvpp.cbo_vppxoa, document.frm_xoaddvpp.cbo_ddvppxoa);
	});
		$('form[name="frm_suadd"] select[name="cbo_tenddsua"]').change(function(){
		get_info_dacdiem('get_info_dacdiem.php',document.frm_suadd);
		});
		
		$('form[name="frm_suaddvpp"] select[name="cbo_ddvppsua"]').change(function(){
		get_info_chitiet('get_info_ddvpp.php',document.frm_suaddvpp);
		});
		$('form[name="frm_xoaddvpp"] select[name="cbo_ddvppxoa"]').change(function(){
		get_info_chitiet2('get_info_ddvpp.php',document.frm_xoaddvpp);
		});
		$('form[name="frm_xoadd"] select[name="cbo_tenddxoa"]').change(function(){
		get_info_dacdiem2('get_info_dacdiem.php',document.frm_xoadd);
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
          <td width="419" align="center">Thêm đặc điểm thuộc VPP</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_themddvpp" id="frm_themddvpp">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
               <tr>
					<td height="22" align="right" class="level_1_2">Chọn  văn phòng phẩm</td>
					<td width="50%" align="left" class="level_1_2">
                    	<select name="cbo_tenvppthem" id="cbo_tenvppthem" class="cbo" style="width:100%;">
                        </select>                       
                    </td>
			</tr> 
             <tr>
               <td height="30" align="right" class="level_1_1">Chọn  đặc điểm văn phòng phẩm</td>
               <td width="50%" align="left" class="level_1_1">
                 <select name="cbo_dacdiemvppthem" id="cbo_dacdiemvppthem" class="cbo" style="width:75%;">
                   </select>
                 <a href="#themdacdiem"><input type="button" class="button_1" value="Thêm"></a></td>
             </tr>  
             <tr>
               <td height="22" align="right" class="level_1_2">Chi tiết đặc điểm của văn phòng phẩm</td>
               <td width="50%" align="left" class="level_1_2"><textarea name="txt_ghichuddvppthem" id="txt_ghichuddvppthem" rows="3" class="txtbox" style="width:100%"></textarea></td>
             </tr>         
              <tr>
                <td colspan="2" height="22" align="center" class="level_1_1"><input type="button" name="btn_themddvpp" id="btn_themddvpp" class="button_1" value="Thêm"></td>
              </tr>
			   
              </tbody>
           </table>
           </form>
          </td>
        </tr>		
        </tbody>
        </table>
       <br>
         <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Sửa đặc điểm thuộc VPP</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_suaddvpp" id="frm_suaddvpp">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
             <tr>
             <td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
               <tr>
					<td height="22" align="right" class="level_1_2">Chọn văn phòng phẩm</td>
					<td width="50%" align="left" class="level_1_2">
                    	<select name="cbo_vppsua" id="cbo_vppsua" class="cbo" style="width:100%;">
                        </select>                       
                    </td>
			</tr> 
             <tr>
               <td height="22" align="right" class="level_1_1">Chọn đặc điểm văn phòng phẩm</td>
               <td width="50%" align="left" class="level_1_1">
                 <select name="cbo_ddvppsua" id="cbo_ddvppsua" class="cbo" style="width:100%;">
                   </select>                       
                 </td>
             </tr>  
             <tr>
               <td height="22" align="right" class="level_1_2">Chi tiết đặc điểm của văn phòng phẩm</td>
               <td width="50%" align="left" class="level_1_2"><textarea name="txt_ghichuddvppsua" id="txt_ghichuddvppsua" rows="3" class="txtbox" style="width:100%"></textarea></td>
             </tr>
            <tr>
              <td colspan="2" height="22" align="center" class="level_1_1">
                <input type="button" name="btn_suaddvpp" id="btn_suaddvpp" class="button_1" value="Lưu">
                </td>
            </tr>
				  						  
            </tbody>
        </table>
        	</form>
       </td>
      </tr>		
      </tbody>
      </table>
  <br>
        <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Xóa đặc điểm thuộc VPP</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_xoaddvpp" id="frm_xoaddvpp">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
             <tr>
             <td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
               <tr>
					<td height="22" align="right" class="level_1_2">Chọn  văn phòng phẩm</td>
					<td width="50%" align="left" class="level_1_2">
                    	<select name="cbo_vppxoa" id="cbo_vppxoa" class="cbo" style="width:100%;">
                        </select>                       
                    </td>
			</tr> 
             <tr>
               <td height="22" align="right" class="level_1_1">Chọn  đặc điểm văn phòng phẩm</td>
               <td width="50%" align="left" class="level_1_1">
                 <select name="cbo_ddvppxoa" id="cbo_ddvppxoa" class="cbo" style="width:100%;">
                   </select>                       
                 </td>
             </tr>  
             <tr>
               <td height="22" align="right" class="level_1_2">Chi tiết đặc điểm của văn phòng phẩm</td>
               <td width="50%" align="left" class="level_1_2"><textarea name="txt_chitietddvppxoa" id="txt_chitietddvppxoa" rows="3" class="txtbox" style="width:100%"></textarea></td>
             </tr>
            <tr>
              <td colspan="2" height="22" align="center" class="level_1_1">
                <input type="button" name="btn_xoaddvpp" id="btn_xoaddvpp" class="button_1" value="Xóa">
                </td>
            </tr>
				  						  
            </tbody>
        </table>
        	</form>
       </td>
      </tr>		
      </tbody>
      </table>
        <a name="themdacdiem"></a><br>
   <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
        <td width="121" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="260" align="center">Thêm đặc điểm</td>
          <td width="119" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_themdd" id="frm_themdd">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
             <tr>
             <td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
               <tr>
                 <td height="29" align="right" class="level_1_2">Đặc điểm của văn phòng phẩm</td>
                 <td width="50%" align="left" class="level_1_2">
                   <input name="txt_tenddthem" id="txt_tenddthem" type="text" class="txtbox" style="width:100%"></td>
               </tr>  
             <tr>
               <td height="22" align="right" class="level_1_1">Ghi chú đặc điểm</td>
               <td width="50%" align="left" class="level_1_1"><textarea name="txt_ghichuddthem" id="txt_ghichuddthem" rows="3" class="txtbox" style="width:100%"></textarea></td>
             </tr>
            <tr>
              <td colspan="2" height="22" align="center" class="level_1_2">
                <input type="button" name="btn_themdd" id="btn_themdd" class="button_1" value="Thêm">
                </td>
            </tr>
				  						  
            </tbody>
        </table>
        	</form>
       </td>
      </tr>		
      </tbody>
      </table>
        <br>
   <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Sửa đặc điểm </td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_suadd" id="frm_suadd">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
             <tr>
             <td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
               <tr>
                 <td height="29" align="right" class="level_1_2">Chọn đặc điểm của văn phòng phẩm</td>
                 <td width="50%" align="left" class="level_1_2">
                   <select name="cbo_tenddsua" id="cbo_tenddsua" class="cbo" style="width:100%;">
                        </select> </td>
               </tr>
               <tr>
                 <td height="29" align="right" class="level_1_1">Đặc điểm của văn phòng phẩm mới</td>
                 <td width="50%" align="left" class="level_1_1"><input name="txt_tenddsua" id="txt_tenddsua" type="text" class="txtbox" style="width:100%"></td>
               </tr>    
             <tr>
               <td height="22" align="right" class="level_1_2">Ghi chú đặc điểm mới</td>
               <td width="50%" align="left" class="level_1_2"><textarea name="txt_ghichuddsua" id="txt_ghichuddsua" rows="3" class="txtbox" style="width:100%"></textarea></td>
             </tr>
            <tr>
              <td colspan="2" height="22" align="center" class="level_1_1">
                <input type="button" name="btn_luudd" id="btn_luudd" class="button_1" value="Lưu">
                </td>
            </tr>
				  						  
            </tbody>
        </table>
        	</form>
       </td>
      </tr>		
      </tbody>
      </table>
  <br>
        <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Xóa đặc điểm </td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_xoadd" id="frm_xoadd">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
           <tr>
                 <td height="29" align="right" class="level_1_2">Đặc điểm của văn phòng phẩm cần xóa</td>
                 <td width="50%" align="left" class="level_1_2">
                   <select name="cbo_tenddxoa" id="cbo_tenddxoa" class="cbo" style="width:100%;">
                        </select></td>
               </tr>  
             <tr>
               <td height="22" align="right" class="level_1_1">Ghi chú đặc điểm của văn phòng phẩm </td>
               <td width="50%" align="left" class="level_1_1"><textarea name="txt_ghichuddxoa" id="txt_ghichuddxoa" rows="3" disabled class="txtbox" style="width:100%"></textarea></td>
             </tr>
               
             <tr>
						<td colspan="2" height="22" align="center" class="level_1_2">
                        <input type="button" name="btn_xoadd" id="btn_xoadd" class="button_1" value="Xóa">
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
