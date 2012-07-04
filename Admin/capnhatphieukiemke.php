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
<title>Cập nhật phiếu kiểm kê</title>
    <link rel="stylesheet" href="../jqwidgets/styles/jqx.base.css" media="screen" />
    <link rel="stylesheet" href="../jqwidgets/styles/jqx.classic.css" media="screen" />
    <link rel="stylesheet" href="../styles/site.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../styles/style.css" media="screen" />
    <link rel="stylesheet" href="../jqwidgets/styles/jqx.summer.css" type="text/css"/>
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
    <script type="text/javascript" src="../jqwidgets/jqxgrid.selection.js"></script>
     <script type="text/javascript" src="../jqwidgets/jqxgrid.edit.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxgrid.pager.js"></script>
    <script type="text/javascript" src="js/ajax.js"></script>
	<script type="text/javascript" src="js/fill.js"></script>
    <script type="text/javascript" src="js/date.js"></script>
    <script type="text/javascript" src="js/capnhatphieukiemke.js"></script>
    <script type="text/javascript" src="js/table-themkiemke.js"></script>
	<script type="text/javascript" src="js/table-suakiemke.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#parentTable").height(1600);	
            setTimeout(function()
            {
                $("#demoContent").css('visibility', 'visible');		
                $("#loader").css('display', 'none');
            }, 1000);
            var theme = getTheme();
            $("#jqxMenu").jqxMenu({height: '36px', theme: theme });
			$('#jqxTabs').jqxTabs({ width: 970,enabledHover: true, height:'auto', position: 'top', theme: '' });
            $("#jqxMenu").css('visibility', 'visible'); 
			$("#ngaybdkk").jqxDateTimeInput({ width: '250px', height: '25px',formatString: 'dd/MM/yyyy', theme: 'summer' });
			$("#ngayktkk").jqxDateTimeInput({ width: '250px', height: '25px',formatString: 'dd/MM/yyyy', theme: 'summer' });
			
			var ngay = ($('#ngaybdkk').jqxDateTimeInput('getDate')).getDate();
			var thang =($('#ngaybdkk').jqxDateTimeInput('getDate')).getMonth();
			var nam =($('#ngaybdkk').jqxDateTimeInput('getDate')).getFullYear();
			
			$('#ngayktkk').jqxDateTimeInput({ minDate: new $.jqx._jqxDateTimeInput.getDateTime(new Date(nam, thang, ngay-1)) });
			
			
			$("#ngaybdkksua").jqxDateTimeInput({ width: '250px', height: '25px',formatString: 'dd/MM/yyyy', theme: 'summer' });
			$("#ngayktkksua").jqxDateTimeInput({ width: '250px', height: '25px',formatString: 'dd/MM/yyyy', theme: 'summer' });
			
			var ngay = ($('#ngaybdkksua').jqxDateTimeInput('getDate')).getDate();
			var thang =($('#ngaybdkksua').jqxDateTimeInput('getDate')).getMonth();
			var nam =($('#ngaybdkksua').jqxDateTimeInput('getDate')).getFullYear();
			
			$('#ngayktkksua').jqxDateTimeInput({ minDate: new $.jqx._jqxDateTimeInput.getDateTime(new Date(nam, thang, ngay-1)) });
			taocombothem(document.frm_themphieukiemke);
			taocombosua(document.frm_suaphieukiemke);
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
                            <td width="794" valign="top" class="rc-all content" id="demos">
                            <table style="table-layout: fixed; border-collapse: collapse;" cellspacing="0" cellpadding="0">
                                <tbody>
                                 
    							 <tr>
                                        <td height="100%"  class="demoContent" valign="middle">
                                              <table width="752" border="0" cellpadding="0" cellspacing="0" align="center">      
                                         
                                          
                                          <!--noi dung o day-->	
                                          <tr>
    <td height="100%" align="center" valign="middle"> 
     <div id='jqxTabs'>
            <ul>
                <li style="margin-left: 30px;">Thêm phiếu kiểm kê</li>
                <li>Sửa, xóa phiếu kiểm kê</li>
            </ul> 
         <div> 
		 <table width="950" border="0" cellpadding="0" cellspacing="0" align="center">
        <tbody>
       
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_themphieukiemke" id="frm_themphieukiemke">
            <table width="100%" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td width="30%" height="22" class="level_1_1" colspan="2"></td>
              </tr>
			  <tr>
			    <td height="22" align="right" class="level_1_2">Chọn loại kiểm kê</td>
			    <td align="left" class="level_1_2">
                <div id="loaikiemke"></div>
                </td>
                </tr>
			    <tr>
                 <td height="22" align="right" class="level_1_1">Ngày kiểm kê</td>
                 <td align="left" class="level_1_1">
                 <div id="ngaybdkk"></div>
                 </td>
               </tr>
               <tr>
                 <td height="22" align="right" class="level_1_2">Ngày kết thúc kiểm kê</td>
                 <td align="left" class="level_1_2">
                 <div id="ngayktkk"></div>
                 </td>
               </tr>
               <tr>
					<td height="22" align="right" class="level_1_1">Diễn giải</td>
					<td width="70%" align="left" class="level_1_1"><textarea name="txt_diengiai" rows="5" class="txtbox" id="txt_diengiai" style="width:90%"></textarea></td>
				</tr>
                 <tr>
                 <td height="22" align="right" class="level_1_2">Chọn phiếu mẫu</td>
                 <td height="22" align="left" class="level_1_2">
                 <div id="chonphieu"></div>
                 </td>
               </tr>
           		 <tr>
			    <td height="22" align="right" class="level_1_1">Chọn đơn vị</td>
			    <td align="left" class="level_1_1">
               	<div name="donvi" id="donvi" style="width:200" ></div>
			      </td>
                </tr>
               <tr>
                 <td height="22" align="right" class="level_1_2">&nbsp;</td>
                 <td height="22" align="left" class="level_1_2">&nbsp;</td>
               </tr>
                <tr>
                 <td height="22" align="right" class="level_1_1">Ngày lập</td>
                 <td height="22" align="left" class="level_1_1">
                 <input type="text" name="ngaylap" id="ngaylap" style="width:90%;" disabled="disabled" />
                 </td>
               </tr>
                <tr>
                 <td height="22" align="right" class="level_1_2">Cập nhật mới nhất</td>
                 <td height="22" align="left" class="level_1_2">
                 <input type="text" name="capnhat" id="capnhat" style="width:90%;" disabled="disabled" />
                 </td>
               </tr>
                <tr>
                 <td height="22" align="right" class="level_1_1">Ghi chú</td>
                 <td height="22" align="left" class="level_1_1">
                  <textarea name="ghichu" rows="5" class="txtbox" id="ghichu" style="width:90%" disabled="disabled"></textarea>
                 </td>
               </tr>
               <tr>
					<td align="center" height="300" class="level_1_1" colspan="4" valign="top">
                     <div style="margin-top: 10px;" id="tablephieumau"></div>
                            <div style="margin-top: 30px;">
                                <div id="cellbegineditevent"></div>
                                <div style="margin-top: 10px;" id="cellendeditevent"></div>
                   </div>
                         
                        
                    </td>
			</tr> 
               <tr>
                 <td colspan="2" height="22" align="center" class="level_1_1"><input type="button" class="button_1" id="btn_themphieukiemke" value="Thêm">
                 </td>
               </tr>
              </tbody>
           </table>
           </form>
          </td>
        </tr>		
        </tbody>
        </table>
         </div>
		 <div> 
		 <table width="950" height="100%" border="0" cellpadding="0" cellspacing="0" align="center">
        <tbody>
       
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_suaphieukiemke" id="frm_suaphieukiemke">
            <table width="100%" height="100%" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td width="30%" height="22" class="level_1_1" colspan="2"></td>
              </tr>
               <tr>
			    <td height="22" align="right" class="level_1_1">Chọn phiếu kiểm kê</td>
			    <td align="left" class="level_1_1">
               	<div name="phieukiemkesua" id="phieukiemkesua" style="width:200" ></div>
			      </td>
                </tr>
			  <tr>
			    <td height="22" align="right" class="level_1_2">Chọn loại kiểm kê</td>
			    <td align="left" class="level_1_2">
                <div id="loaikiemkesua"></div>
                </td>
                </tr>
			    <tr>
                 <td height="22" align="right" class="level_1_2">Ngày kiểm kê</td>
                 <td align="left" class="level_1_1">
                 <div id="ngaybdkksua"></div>
                 </td>
               </tr>
               <tr>
                 <td height="22" align="right" class="level_1_1">Ngày kết thúc kiểm kê</td>
                 <td align="left" class="level_1_1">
                 <div id="ngayktkksua"></div>
                 </td>
               </tr>
               <tr>
					<td height="22" align="right" class="level_1_2">Diễn giải</td>
					<td width="70%" align="left" class="level_1_2"><textarea name="txt_diengiaisua" rows="5" class="txtbox" id="txt_diengiaisua" style="width:90%"></textarea></td>
				</tr>
           		
              
               <tr>
					<td align="center" height="300" class="level_1_1" colspan="4" valign="top">
                     <div style="margin-top: 10px;" id="tablephieumausua"></div>
                            <div style="margin-top: 30px;">
                                <div id="cellbegineditevent"></div>
                                <div style="margin-top: 10px;" id="cellendeditevent"></div>
                   </div>
                         
                        
                    </td>
			</tr> 
               <tr>
                 <td colspan="2" height="22" align="center" class="level_1_2"><input type="button" class="button_1" id="btn_suaphieukiemke" value="Cập nhật">
                 <input type="button" class="button_1" id="btn_xoaphieukiemke" value="Xóa">
                   
                 </td>
               </tr>
              </tbody>
           </table>
           </form>
          </td>
        </tr>		
        </tbody>
        </table>
         </div>
    </div>
	</td>
</tr>
                                      <!--ket thuc noi dung-->    
                                          
                                          
                                        </table>
                                        </td>
  								</tr>
                                </tbody>
                             </table>
                            </td>
                            <!--âfgajf-->
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
