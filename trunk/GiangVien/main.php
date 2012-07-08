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
                                          <tr>       
                                              <td align="center" width="44%" valign="middle">
                                             
                                              <!--noi dung o day-->
                                            	 <table width="56%" height="280" border="0" align="center" cellpadding="0" cellspacing="0">
          											<tbody>
        												  <tr>
                                                                <td class="tl_main">&nbsp;</td>
                                                                <td class="tc_main">&nbsp;</td>
                                                                <td class="tr_main">&nbsp;</td>
                                                          </tr>
          <tr>
                <td class="cl_main">&nbsp;</td>
                <td style="font-family:Arial, Helvetica, sans-serif; font-size:12px">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">                
                         <tbody >
                        <tr>
                            <td colspan="2"><div align="center" class="textbold">THÔNG TIN CÁN BỘ</div></td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                          <td width="26%" class="bordersv"><div class="bg" align="right">Mã CB </div></td>
                          <td width="74%" class="bordersv"><div class="bold" align="left"><?=$_SESSION['msclb']?></div></td>
                        </tr>
                        <tr>
                    <? 

                    //Select thong tin nguoi dung				
                    include('../database.php');				
                    $user = new database();
                    $sql = "Select * from nguoidung where MSCB = '".$_SESSION['msclb']."'";
                    $msclb =$_SESSION['msclb'];
                    session_register("msclb") ;
                    $user->setQuery($sql);
                    $result = $user->fetchAll();
                    $row = mysql_fetch_array($result);
                    ?>
                      <td class="bordersv"><div class="bg" align="right">Họ tên</div></td>
                      <td class="bordersv"><div class="bold" align="left"><?=$row['TenCB']?></div></td>
                    </tr>
                         <tr>
                      <td class="bordersv"><div class="bg" align="right">Ngày sinh</div></td>
                      <td class="bordersv"><div class="bold" align="left"><?=$row['NgaySinh']?>/<?=$row['ThangSinh']?>/<?=$row['NamSinh']?></div></td>
                    </tr>
                     <tr>
                      <td class="bordersv"><div class="bg" align="right">Giới tính</div></td>
                      <td class="bordersv"><div class="bold" align="left"><?=$row['Gioitinh']?></div></td>
                    </tr>
                    <tr>
                      <td class="bordersv"><div class="bg" align="right">Email</div></td>
                      <td class="bordersv"><div class="bold" align="left"><?=$row['Email']?></div></td>
                    </tr>
                    <tr>
                      <td class="bordersv"><div class="bg" align="right">Địa chỉ</div></td>
                     
                      <td class="bordersv"><div class="bold" align="left"><?=$row['Diachi']?></div></td>
                    </tr>
                        <tr>
                          <td class="bordersv"><div class="bg" align="right">Số ĐT</div></td>
                          <td class="bordersv"><div class="bold" align="left"><?=$row['SDT']?></div></td>
                        </tr>
                        <tr>
                          <td class="bordersv"><div class="bg" align="right">Đơn vị</div></td>                  
                          <?
                          //hien thi ten khoa
                          $sql = "Select * from nguoidung, donvi  where nguoidung.MSDV = donvi.MSDV  and nguoidung.MSCB = '".$_SESSION['msclb']."'";
                          $user->setQuery($sql);
                          $result = $user->fetchAll();
                          $row = mysql_fetch_array($result);
						  $madv =$_SESSION['MSDV'];
                           session_register("madv") ;
                          ?>
                          <td class="bordersv"><div class="bold" align="left"><?=$row['TenDV']?></div></td>
                        </tr>                
                        <tr>
                      <td class="bordersv"><div class="bg" align="right">Khoa</div></td>                  
                      <td class="bordersv"><div class="bold" align="left">Công nghệ thông tin &amp; TT </div></td>
                    </tr>
                    <tr>
                      <td class="bordersv">&nbsp;</td>
                      <td class="bordersv">&nbsp;</td>
                    </tr>
                    </tbody>
                    </table>
                </td>
                <td class="cr_main">&nbsp;</td>
          </tr>
          <tr>
                <td class="bl_main">&nbsp;</td>
                <td class="bc_main">&nbsp;</td>
                <td class="br_main">&nbsp;</td>
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
