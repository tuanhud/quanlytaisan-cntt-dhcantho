<?php
	//khoi dong session
	session_start();
	
	//kiem tra quyen truoc khi hien thi trang
	if(!session_is_registered("maquyen") || $_SESSION['maquyen']!="AD")
	{
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	echo "<script language=javascript>window.location = 'login.html';</script>"; 
	exit;
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quản lí thời gian</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<!--Thu vien MENU-->
	<link type="text/css" href="css/menu.css" rel="stylesheet" />
    <script type="text/javascript" src="js/jquery_menu.js"></script>
    <script type="text/javascript" src="js/menu.js"></script>
    <!--Kết thúc Thu vien MENU-->
<script type="text/javascript" src="../js/jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="../js/ajax.js"></script>
<script type="text/javascript" src="../js/date.js"></script>
<script type="text/javascript" >
$(document).ready(function() { 

	init_date_input(document.frm_thoigiansinhvien.Daybd,document.frm_thoigiansinhvien.Monthbd,document.frm_thoigiansinhvien.Yearbd);
	init_date_input(document.frm_thoigiansinhvien.Daykt,document.frm_thoigiansinhvien.Monthkt,document.frm_thoigiansinhvien.Yearkt);
	lay_thoigian('../get_thoigian.php',document.frm_thoigiansinhvien);
	
	$('form[name="frm_thoigiansinhvien"] input[type="button"]').click(function(){
		capnhat_thoigian("../capnhatthoigian.php",document.frm_thoigiansinhvien);
		lay_thoigian('../get_thoigian.php',document.frm_thoigiansinhvien);
	});
	
}); 
</script>


</head>
<body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0">
  
<table width="778" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tbody>
  
  <!--Bắt đầu của HEADER-->
  <tr> 
    <td height="26" valign="top"> 
      <script>
	
	function thoat() {
		if (confirm('Ban co chac chan muon thoat khong ?' )) {
			document.location = '../logout.php';
			return;
		}
	}
</script>	 

<!--Thẻ hiển thị thông tin khi đăng nhập-->
<div style="Z-INDEX: 1; LEFT: 575px; WIDTH: 200px; POSITION: absolute; TOP: 53px; HEIGHT: 30px" align="center">
<font style="FONT-WEIGHT: 700; FONT-SIZE: 8pt; line-height:20px;" face="Tahoma" color="#FFFFFF">
	<a class="white" href="main.php">Trang chủ</a>|<a class="white" href="javascript:thoat();">Thoát</a>
   <br>Xin chào, <?=$_SESSION['hoten']?>
    <br>
	(<?=$_SESSION['mscb']?>)
   </font>
    </div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tbody><tr>
     <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
       <tbody><tr>
         <td class="tl_header">&nbsp;</td>
         <td class="tc_header">&nbsp;</td>
         <td class="tr_header">&nbsp;</td>
       </tr>
       <tr>
         <td class="cl_header">&nbsp;</td>
         <td class="cm_header"><table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tbody><tr>
            
             <td class="tittle_header">&nbsp;</td>
            
           </tr>
         </tbody></table></td>
         <td class="cr_header">&nbsp;</td>
       </tr>
       
     </tbody></table></td>
   </tr>
 </tbody></table>
    </td>
    
  </tr>
  <!--Kết thúc của HEADER-->
  <!--Bắt đàu của MAINPAGE-->
  <tr>
    <td valign="top">
    	
        <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
        <tbody><tr>
    <td height="100%" align="center" valign="top">   
   
		 <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <!--MENU-->        
        <tr>
        <div id="menu">
    <ul class="menu">
        <li><a href="#" class="parent"><span>Quản lý Khoa-BM</span></a>
            <ul>
                <li><a href="capnhatkhoa.php"><span>Quản lý Khoa</span></a></li>
                <li><a href="capnhatchuyennganh.php"><span>Quản lý Bộ môn</span></a></li>
            </ul>
        </li>
        <li><a href="#" class="parent"><span>Quản lý người dùng</span></a>
            <ul>
                <li><a href="quanlicanbo.php"><span>Cán bộ</span></a></li>
                <li><a href="quanlisinhvien.php"><span>Sinh viên</span></a></li>                
            </ul>
        </li>
        <li><a href="#" class="parent"><span>Quản lý năm học - học kì</span></a>
            <ul>
                <li><a href="capnhatnamhoc.php"><span>Quản lý năm học</span></a></li>
                <li><a href="capnhatnamhochocki.php"><span>Quản lý học kì</span></a></li>
                <li><a href="quanlithoigian.php"><span>Quản lý thời gian</span></a></li>                
            </ul>
        </li>
        <li><a href="#" class="parent"><span>Quản lý học phần - lớp HP</span></a>
            <ul>
                <li><a href="capnhatlchsv.php"><span>Quản lý học phần</span></a></li>
                <li><a href="quanlilophocphan.php"><span>Quản lý lớp học phần</span></a></li>
                <li><a href="quanlisinhvienlophocphan.php"><span>Quản lý sinh viên - lớp học phần</span></a></li>                
            </ul>
        </li>
        <li><a href="quanlinoidungdanhgia.php"><span>Quản lý nội dung đánh giá</span></a>
    </ul>
</div>

<div id="copyright"><a href="http://apycom.com/"></a></div>
        </tr>
        <!--KET THUC MENU-->
        <br>

        
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Thời gian đăng của nhập sinh viên</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_thoigiansinhvien">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              
              <tr>
					<td width="50%" height="22" align="right" class="level_1_2">Ngày bắt đầu</td>
                    <td height="22" class="level_1_1">
                        <select name="Daybd" id="Day" class="cbo" style="width: 60px;">
													</select>
						<select name="Monthbd" id="Month" class="cbo" style="width: 60px;">
													</select>
						<select name="Yearbd" id="Year" class="cbo" style="width: 60px;">
						</select>
              </td>
			  <tr>
					<td  width="50%" height="22" align="right" class="level_1_1">Ngày kết thúc</td>
                    <td height="22" class="level_1_1">
                        <select name="Daykt" id="Day" class="cbo" style="width: 60px;">
													</select>
						<select name="Monthkt" id="Month" class="cbo" style="width: 60px;">
													</select>
						<select name="Yearkt" id="Year" class="cbo" style="width: 60px;">
						</select>
              </td>
              <tr>
              		<td colspan="2" height="22" align="center" class="level_1_2"><input type="button" class="button_1" value="Cập nhật"></td>
              </tr>
              </tbody>
           </table>
           </form>
          </td>
        </tr>		
        </table>
		</td>
</tr>
</tbody>
</table>

		
	</td>
  </tr>
  <!--Kết thúc của MAINPAGE-->
  <!--Bắt đàu của FOOTER-->
  <tr>
    <td valign="bottom">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody><tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="cl_footer">&nbsp;</td>
    <td class="cm_footer"><div align="right" class="copy"><!--Copyright © 2008 by <a href="http://www.cuscsoft.com" target="_blank" class="white"><strong>CUSC</strong></a>--></div></td>
    <td class="cr_footer">&nbsp;</td>
  </tr>
  <tr>
    <td class="bl_footer">&nbsp;</td>
    <td class="bc_footer">&nbsp;</td>
    <td class="br_footer">&nbsp;</td>
  </tr>
</tbody></table>
</td>
  </tr>
  <!--Kết thúc của FOOTER-->
</tbody></table>
</body>
</html>

