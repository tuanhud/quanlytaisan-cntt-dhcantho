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
<title>Quản lí sinh viên</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<!--Thu vien MENU-->
	<link type="text/css" href="css/menu.css" rel="stylesheet" />
    <script type="text/javascript" src="js/jquery_menu.js"></script>
    <script type="text/javascript" src="js/menu.js"></script>
    <!--Kết thúc Thu vien MENU-->
<script type="text/javascript" src="../js/jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="../js/ajax.js"></script>
<script type="text/javascript" src="../js/fill.js"></script>
<script type="text/javascript" src="../js/date.js"></script>
<script type="text/javascript" src="../js/hoivien.js"></script>
<script type="text/javascript" src="../js/isExist.js"></script>
<script type="text/javascript" >
$(document).ready(function() { 

	document.frm_themsinhvien.reset();
	fillcombo('../get_list_khoa.php',document.frm_themsinhvien.chonkhoa);
	fillcombo('../get_list_bomon.php?idkhoa='+document.frm_themsinhvien.chonkhoa.value,document.frm_themsinhvien.chonbomon);
	
	$('form[name="frm_themsinhvien"] select[name="chonkhoa"]').change(function(){
	fillcombo('../get_list_bomon.php?idkhoa='+document.frm_themsinhvien.chonkhoa.value,document.frm_themsinhvien.chonbomon);
	});

	//su kien go ma so sinh vien
	$('input[name="mssv"]').keypress(function(evt1){
		return onlyNumbers(evt1);
	});
	//su kien go ma so sinh vien
	$('input[name="dtsv"]').keypress(function(evt1){
		return onlyNumbers(evt1);
	});
	
	init_date_input(document.frm_themsinhvien.Day,document.frm_themsinhvien.Month,document.frm_themsinhvien.Year);
	init_date_input(document.frm_suasinhvien.Day,document.frm_suasinhvien.Month,document.frm_suasinhvien.Year);
	init_date_input(document.frm_xoasinhvien.Day,document.frm_xoasinhvien.Month,document.frm_xoasinhvien.Year);
	
	$('form[name="frm_themsinhvien"] input[type="button"]').click(function(){		
		themsinhvien('../themsinhvien.php',document.frm_themsinhvien);
	});
	$('form[name="frm_suasinhvien"] input[name="tim"]').click(function(){
		timsinhvien('../get_info_sinhvien.php',document.frm_suasinhvien);
	});
	
	$('form[name="frm_suasinhvien"] input[name="sua"]').click(function(){
		suasinhvien('../suasinhvien.php',document.frm_suasinhvien);
	});
	$('form[name="frm_xoasinhvien"] input[name="tim"]').click(function(){
		timsinhvien('../get_info_sinhvien.php',document.frm_xoasinhvien);
	});
	$('form[name="frm_xoasinhvien"] input[name="xoa"]').click(function(){
		if (confirm('Bạn có chắc chắn xóa không ?' )) {
			xoasinhvien('../xoasinhvien.php',document.frm_xoasinhvien);
		}
		
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
        <tr>
    <td height="100%" align="center" valign="top">   
		 <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Thêm thông tin sinh viên</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_themsinhvien">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Chọn khoa</td>
					<td width="50%" align="left" class="level_1_2"><select class="cbo" name="chonkhoa" style="width:100%"></select></td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_1">Chọn bộ môn</td>
					<td width="50%" align="left" class="level_1_1"><select class="cbo" name="chonbomon" style="width:100%"></select></td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Mã số sinh viên</td>
					<td width="50%" align="left" class="level_1_2"><input name="mssv" maxlength="7" type="text" class="txtbox" style="width:100%" value="" onBlur="isExist('isExistMSSV.php',this.value,this)"></td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_1">Họ tên</td>
					<td width="50%" align="left" class="level_1_1"><input name="hoten"  type="text" maxlength="50" class="txtbox" style="width:100%" value="" onBlur='isExist("isExistMSSV.php",this.value,this)'></td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Ngày sinh</td>
                    <td height="22" class="level_1_2">
                        <select name="Day" id="Day" class="cbo" style="width: 60px;">
													</select>
						<select name="Month" id="Month" class="cbo" style="width: 60px;">
													</select>
						<select name="Year" id="Year" class="cbo" style="width: 60px;">
						</select>
              </td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_1">Giới tính</td>
<td width="50%" align="left" class="level_1_2"> <select name="gioitinh" id="gioitinh" class="cbo" style="width: 60px;"><option>Nam
</option>
<option>
Nữ
</option>
													</select>
                                                    </td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Email</td>
					<td width="50%" align="left" class="level_1_2"><input name="email" maxlength="100" class="txtbox" style="width:100%" value=""></td>
			  </tr>
               <!--<tr>
					<td height="22" align="right" class="level_1_2">Lớp</td>
					<td width="50%" align="left" class="level_1_2"><input name="lop" maxlength="100" class="txtbox" style="width:100%" value=""></td>
			  </tr>-->
              <tr>
					<td height="22" align="right" class="level_1_2">Mật khẩu</td>
					<td width="50%" align="left" class="level_1_2"><input name="matkhau" type="password" maxlength="15" class="txtbox"  style="width:100%" value=""></td>
			  </tr>
              <tr>
              		<td colspan="2" height="22" align="center" class="level_1_1"><input type="button" class="button_1" value="Thêm"></td>
              </tr>
              </tbody>
           </table>
           </form>
          </td>
        </tr>		
        </tbody>
        </table>
		<br>
		<br>
        <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Sửa thông tin sinh viên</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_suasinhvien">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_2"></td>
                    <td class="level_1_2"></td>
              </tr>
              <tr>
					<td height="22" align="right" class="level_1_1">Nhâp mã số sinh viên</td>
					<td width="50%" align="left" class="level_1_1">
                    	<input name="mssv" maxlength="7" type="text" class="txtbox" style="width:100%" value="">
                        <input name="tim" type="button" class="button_1" style="width:100%" value="Tìm">
                        </td>
			</tr>
            <tr>
					<td height="22" align="right" class="level_1_2">Họ tên</td>
					<td width="50%" align="left" class="level_1_2"><input name="hoten"  type="text" maxlength="50" class="txtbox" style="width:100%" value=""></td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_1">Ngày sinh</td>
                    <td height="22" class="level_1_2">
                        <select name="Day" id="Day" class="cbo" style="width: 60px;">
													</select>
						<select name="Month" id="Month" class="cbo" style="width: 60px;">
													</select>
						<select name="Year" id="Year" class="cbo" style="width: 60px;">
						</select>
              </td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_1">Giới tính</td>
<td width="50%" align="left" class="level_1_2"> <select name="gioitinh" id="gioitinh" class="cbo" style="width: 60px;"><option>Nam
</option>
<option>
Nữ
</option>
													</select>
                                                    </td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_1">Email</td>
					<td width="50%" align="left" class="level_1_1"><input name="email" maxlength="100" class="txtbox" style="width:100%" value=""></td>
			  </tr>
              <!--<tr>
					<td height="22" align="right" class="level_1_2">Lớp</td>
					<td width="50%" align="left" class="level_1_2"><input name="lop" maxlength="11" class="txtbox" style="width:100%" value=""></td>
			  </tr>-->
              <tr>
					<td height="22" align="right" class="level_1_1">Mật khẩu</td>
					<td width="50%" align="left" class="level_1_1"><input name="matkhau" type="password" maxlength="15" class="txtbox"  style="width:100%" value=""></td>
			  </tr>
            <tr>
						<td colspan="2" height="22" align="center" class="level_1_2">
                        <input type="button" class="button_1" name="sua" value="Sửa">
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
		<br>
        <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Xóa thông tin sinh viên</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_xoasinhvien">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_2"></td>
                    <td class="level_1_2"></td>
              </tr>
              <tr>
					<td height="22" align="right" class="level_1_1">Nhâp mã số sinh viên</td>
					<td width="50%" align="left" class="level_1_1">
                    	<input name="mssv" maxlength="7" type="text" class="txtbox" style="width:100%" value="">
                        <input name="tim" type="button" class="button_1" style="width:100%" value="Tìm">
                        </td>
			</tr>
            <tr>
					<td height="22" align="right" class="level_1_2">Họ tên</td>
					<td width="50%" align="left" class="level_1_2"><input name="hoten" disabled="disabled" type="text" maxlength="50" class="txtbox" style="width:100%" value=""></td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_1">Ngày sinh</td>
                    <td height="22" class="level_1_1">
                        <select name="Day" id="Day" class="cbo" disabled="disabled" style="width: 60px;">
													</select>
						<select name="Month" id="Month" class="cbo" disabled="disabled" style="width: 60px;">
													</select>
						<select name="Year" id="Year" class="cbo" disabled="disabled" style="width: 60px;">
						</select>
              </td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_1">Giới tính</td>
<td width="50%" align="left" class="level_1_2"> <select name="gioitinh" id="gioitinh" disabled="disabled" class="cbo" style="width: 60px;"><option>Nam
</option>
<option>
Nữ
</option>
													</select>
                                                    </td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_1">Email</td>
					<td width="50%" align="left" class="level_1_1"><input name="email" disabled="disabled" maxlength="100" class="txtbox" style="width:100%" value=""></td>
			  </tr>
              <!--<tr>
					<td height="22" align="right" class="level_1_2">Lớp</td>
					<td width="50%" align="left" class="level_1_2"><input name="lop" maxlength="11" disabled="disabled" class="txtbox" style="width:100%" value=""></td>
			  </tr>
               <tr>
					<td height="22" align="right" class="level_1_1">Mật khẩu</td>
					<td width="50%" align="left" class="level_1_1"><input name="matkhau" disabled="disabled" type="password" maxlength="15" class="txtbox"  style="width:100%" value=""></td>
			  </tr>-->
            <tr>
						<td colspan="2" height="22" align="center" class="level_1_2">
                        <input type="button" class="button_1" name="xoa" value="Xóa">
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

