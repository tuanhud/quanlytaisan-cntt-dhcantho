<?php	
	//khoi dong session
	session_start();

	//kiem tra quyen truoc khi hien thi trang
	if(!session_is_registered("maquyen") || $_SESSION['maquyen']!="GV")
	{
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	echo "<script language=javascript>window.location = 'index.php';</script>"; 
	exit;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../jqwidgets/styles/jqx.base.css" media="screen" />
    <link rel="stylesheet" href="../jqwidgets/styles/jqx.energyblue.css" type="text/css" />
    
    <link rel="stylesheet" href="../styles/site.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../styles/style.css" media="screen" />
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
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
    <script type="text/javascript" src="../jqwidgets/jqxgrid.edit.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxgrid.pager.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxgrid.columnsresize.js"></script>
    <script type="text/javascript" src="js/gettheme.js"></script>
    <script type="text/javascript" src="js/table-suakhmsam.js"></script>
	<script type="text/javascript" src="js/ajax.js"></script>
    <script type="text/javascript" src="js/fill.js"></script>
    <script type="text/javascript">
        $(document).ready(function () 
		{
            $("#parentTable").height(1600);	
            setTimeout(function()
            {
                $("#demoContent").css('visibility', 'visible');		
                $("#loader").css('display', 'none');
            }, 1000);
            var theme = getTheme();
            $("#jqxMenu").jqxMenu({height: '36px', theme: theme });
            $("#jqxMenu").css('visibility', 'visible'); 
			$("#jqxMenu").jqxMenu({ showTopLevelArrows: true });
			$('#showWindowButton').jqxButton({ theme: theme, width: '160px', height: '25px' });
			$("#deleterowbutton").jqxButton({ theme: theme, width: '160px', height: '25px' });
			$("#import").jqxButton({ theme: theme, width: '160px', height: '25px' });
			$("#delete").jqxButton({ theme: theme, width: '160px', height: '25px' });
			
			taocombo();
			
        });
		function thoat() 
			{
				if (confirm('Bạn có thật sự muốn thoát không?' )) 
				{
					document.location = '../logout.php';
					return;
				}
			}
   </script>
</head>
<body style='background: #fff url(../images/background.png) left top scroll repeat-x;'>
	<!--begin header-->
    
    <div style="Z-INDEX: 1; LEFT: 1031px; WIDTH: 200px; POSITION: absolute; TOP: 9px; HEIGHT: 30px" align="center"> <font style="FONT-WEIGHT: 700; FONT-SIZE: 8pt; line-height:20px;" face="Tahoma" color="#FFFFFF"><a href="capnhatthongtincanhangv.php">Cập nhật thông tin cá nhân</a>| <a class="white" href="javascript:thoat();">Thoát</a> <br />
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
                        	<table style="table-layout: fixed;border-collapse: collapse;" cellspacing="0" cellpadding="0">
                           		<tbody>                       
                              		 <tr>
                            <td width="970" valign="top" class="rc-all content" id="demos">
                            <table style="table-layout: fixed; border-collapse: collapse;" cellspacing="0" cellpadding="0">
                                <tbody>
    							 <tr>
                                        <td height="100%"  class="demoContent" valign="middle">
                                        <table width="900" border="0" cellpadding="0" cellspacing="0" align="center">      
                                          
                                          <tr>       
                                              <td align="center" width="44%" valign="middle">
                                             
                                              <!--noi dung o day-->
                                            	 <table width="970" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Sửa yêu cầu thiết bị</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_suakehoachmuasam" id="frm_suakehoachmuasam" action="exportKHMS.php" method="post" target="export" onSubmit="window.open('', 'export', 'width=1350,height=660,status=yes,resizable=yes,scrollbars=yes')">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
           <!--bang thuoc tinh dat o day-->
           	  <tr>
              		<td height="22" class="level_1_1"></td>
                    <td height="22" width="200" class="level_1_1" colspan="3"></td>
                   
              </tr>
			  <tr>
              		
					<td height="22" align="right" class="level_1_1">Chọn mã yêu cầu thiết bị </td>
					<td  align="left" class="level_1_1" colspan="3">
                    	 <div id="mayeucauthietbi"></div>
                    </td>
			</tr> 
             <tr>
					<td align="center" height="300" class="level_1_1" colspan="4" valign="top">
                     <div style="margin-top: 10px;" id="jqthem"></div>
                     		<div id="tienmuasam" style="display:none">
                            <span> <strong>Tổng thành tiền:</strong></span> <span id="tongtien"></span>
                            </span> <span><strong>VNĐ</strong></span>
                            </div>
                            <div style="margin-top: 30px;">
                                <div id="cellbegineditevent"></div>
                                <div style="margin-top: 10px;" id="cellendeditevent"></div>
                 
                           <div style="margin-left:140px; float: left;">
                                <div id="buttondk" style="margin-top: 5px;">
                                	<input type="hidden" name="makhms" id="makhms">
                                    <input type="button" class="button_1" value="Thêm thiết bị yêu cầu" id="showWindowButton" />
                                    <input id="deleterowbutton" class="button_1" style="margin-left:10" type="button" value="Xóa thiết bị yêu cầu" />
                                    <input id="import" class="button_1" style="margin-left:10" type="submit" value="Import Excel/ Word/ PDF" />
                                     <input id="delete" class="button_1" style="margin-left:10" type="button" value="Xóa yêu cầu" />
                                </div> 
                               
                         
                         <div style="width:600px; border: 0px solid #ccc; margin-top: 10px;"
                            id="mainDemoContainer">
                            </div>
                            <div id="eventWindow" style="display:none">
                                <div>
                                    <img width="14" height="14" src="" alt="" />
                                    Bảng chi tiết các tài sản thiết bị
                                </div>
                               <div>
                                                        <div style="margin: 10px">
                                                            Tìm tài sản
                                                            <div id='cbotaisan'>
                                                            </div>
                                                            Chọn tài sản
                                                            <div id='tabletaisan'>
                                                            </div>
                           
                                                        </div>
                                                        <div>
                                                            <div style="float: right; margin-top: 10px;"> 
                                                                <input type="button" id="save" value="Thêm" />
                                                                <input type="button" id="cancel" value="Thoát" />
                                                            </div>
                                                        </div>
                                         		</div>
                                </div>
                            </div>
                        </div>
                         
                        
                    </td>
			</tr>             
              </tbody>
           </table>
           </form>
          </td>
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
