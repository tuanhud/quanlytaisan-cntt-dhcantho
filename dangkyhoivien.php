<?php
	//khoi dong session
	session_start();		
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Đăng ký hội viên</title>
<link rel="stylesheet" type="text/css" href="./css/style.css">
<link rel="stylesheet" type="text/css" href="./css/horizontal.css">
<link rel="stylesheet" type="text/css" href="./css/scrollview-base.css">
<link rel="stylesheet" type="text/css" href="./css/widget-base.css">
<link rel="stylesheet" type="text/css" href="./css/scrollview-scrollbars.css">

<script type="text/javascript" src="js/yui-min_3.5.js"></script> 
<script type="text/javascript" src="./js/intl-min.js"></script>

<script type="text/javascript" src="./js/jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="./js/date.js"></script>
<script type="text/javascript" src="./js/ajax.js"></script>
<script type="text/javascript" src="./js/fill.js"></script>
<script type="text/javascript" src="./js/namhochocki.js"></script>
<script type="text/javascript" src="./js/hoivien.js"></script>
<script type="text/javascript" >
$(document).ready(function() { 

	fillcombo('./get_list_khoa.php',document.frm_thongtinhoivien.cbo_tenkhoa);
	fillcombo('./get_list_dantoc.php',document.frm_thongtinhoivien.cbo_tendantoc);	
	fillcombo('./get_list_tongiao.php',document.frm_thongtinhoivien.cbo_tentongiao);	
	fillcombo('./get_list_lchsv.php',document.frm_dangkychsv_clb.cbo_tenlchsv);
	fillcombo('./get_list_clb.php',document.frm_dangkychsv_clb.cbo_tenclb);
	
	//Load Nam hoc - Hoc ki hien tai
	fillcombo('./get_list_namhoc.php',document.frm_dangkychsv_clb.cbo_tennamhoc);
	get_cur_namhoc('./get_cur_namhoc.php',document.frm_dangkychsv_clb);
	_fillcombo('./get_list_hocki.php',document.frm_dangkychsv_clb.cbo_tennamhoc, document.frm_dangkychsv_clb.cbo_tenhocki);
	get_cur_hocki('./get_cur_hocki.php',document.frm_dangkychsv_clb);
	
	init_date_input(document.frm_thongtinhoivien.cbo_ngay,document.frm_thongtinhoivien.cbo_thang,document.frm_thongtinhoivien.cbo_nam);	
		
	$('form[name="frm_thongtinhoivien"] select[name="cbo_tenkhoa"]').change(function(){
	_fillcombo('./get_list_chuyennganh.php',document.frm_thongtinhoivien.cbo_tenkhoa,document.frm_thongtinhoivien.cbo_tenchuyennganh);
	});

	$('form[name="frm_dangkychsv_clb"] select[name="cbo_tenlchsv"]').change(function(){
	_fillcombo('./get_list_chsv.php',document.frm_dangkychsv_clb.cbo_tenlchsv,document.frm_dangkychsv_clb.cbo_tenchsv);
	checklchsv(document.frm_dangkychsv_clb);
	});
	
	$('form[name="frm_dangkychsv_clb"] select[name="cbo_tenchsv"]').change(function(){
	checkchsv(document.frm_dangkychsv_clb);
	});
	
	$('form[name="frm_thongtinhoivien"] input[type="button"]').click(function(){
	themHoivien('./themhoivien.php',document.frm_dangkytaikhoan, document.frm_dangkychsv_clb, document.frm_thongtinhoivien);
	});
	//Kiem tra ma so
	$('form[name="frm_dangkytaikhoan"] input[name="txt_id"]').keyup(function(){
	checkID('./checkID.php',document.frm_dangkytaikhoan);
	});
	//Tự động tạo list khóa học
	$('form[name="frm_dangkytaikhoan"] input[name="txt_id"]').blur(function(){
	createKhoahoc(document.frm_dangkytaikhoan.txt_id, document.frm_thongtinhoivien.cbo_khoahoc);
	});
	
	//Kiem tra mat khau
	$('form[name="frm_dangkytaikhoan"] input[name="txt_matkhau"]').keyup(function(){
	checkMatkhau(document.frm_dangkytaikhoan);
	});
	//Kiem tra mat khau
	$('form[name="frm_dangkytaikhoan"] input[name="txt_xacnhanmatkhau"]').keyup(function(){
	checkXacnhanmatkhau(document.frm_dangkytaikhoan);
	});
	
	//Focus
	$('form[name="frm_thongtinhoivien"] input[name="txt_hoten"]').focus(function(){
	focus_(document.frm_thongtinhoivien.img_hoten);
	});
	$('form[name="frm_thongtinhoivien"] select[name="cbo_ngay"]').focus(function(){
	focus_(document.frm_thongtinhoivien.img_ngaysinh);
	});
	$('form[name="frm_thongtinhoivien"] select[name="cbo_thang"]').focus(function(){
	focus_(document.frm_thongtinhoivien.img_ngaysinh);
	});
	$('form[name="frm_thongtinhoivien"] select[name="cbo_nam"]').focus(function(){
	focus_(document.frm_thongtinhoivien.img_ngaysinh);
	});	
	$('form[name="frm_thongtinhoivien"] input[name="txt_dienthoai"]').focus(function(){
	focus_(document.frm_thongtinhoivien.img_dienthoai);
	});
	$('form[name="frm_thongtinhoivien"] input[name="txt_email"]').focus(function(){
	focus_(document.frm_thongtinhoivien.img_email);
	});
	$('form[name="frm_thongtinhoivien"] select[name="cbo_khoahoc"]').focus(function(){
	focus_(document.frm_thongtinhoivien.img_khoahoc);
	});	
	$('form[name="frm_thongtinhoivien"] select[name="cbo_tenchuyennganh"]').focus(function(){
	focus_(document.frm_thongtinhoivien.img_chuyennganh);
	});	
	$('form[name="frm_thongtinhoivien"] select[name="cbo_tendantoc"]').focus(function(){
	focus_(document.frm_thongtinhoivien.img_dantoc);
	});	
	$('form[name="frm_thongtinhoivien"] select[name="cbo_tentongiao"]').focus(function(){
	focus_(document.frm_thongtinhoivien.img_tongiao);
	});	
}); 
</script>

</head>
<body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0" class="yui3-skin-sam">  
<table width="778" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tbody> 
  <!--Bắt đầu của HEADER-->
  <tr> 
    <td height="26" valign="top"> 
	
	<div style="Z-INDEX: 1; LEFT: 611px; WIDTH: 177px; POSITION: absolute; TOP: 85px; HEIGHT: 30px" align="center">
	<font style="FONT-WEIGHT: 700; FONT-SIZE: 8pt; line-height:20px;" face="Tahoma" color="#FFFFFF">
		<a class="white" href="index.php">Trang chủ</a>
    </font>
</div>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tbody>
   <tr>
     <td>
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
       <tbody>
       <tr>
         <td class="tl_header">&nbsp;</td>
         <td class="tc_header">&nbsp;</td>
         <td class="tr_header">&nbsp;</td>
       </tr>
       <tr>
         <td class="cl_header">&nbsp;</td>
         <td class="cm_header">
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tbody>
           <tr>
             <td class="tittle_header">&nbsp;</td>
           </tr>
         </tbody>
         </table></td>
         <td class="cr_header">&nbsp;</td>
       </tr>       
     	</tbody>
      </table>
      </td>
   </tr>
   </tbody>
</table>
	</td>    
  </tr>
  <!--Kết thúc của HEADER-->
  <!--Bắt đàu của MAINPAGE-->
  <tr>
    <td valign="top">    	
      <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <!--MENU-->               
        <!--KET THUC MENU-->
        <br>
        <tr>
    <td height="100%" align="center" valign="top">    
    <div id="scrollview-container">
    	<div id="scrollview-content">
        <ul>
        <li>
    <table width="500" border="0" cellpadding="0" cellspacing="0">
       <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="./images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Bước 1 - Đăng ký tài khoản</td>
          <td width="180" align="right"> <img height="25" src="./images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_dangkytaikhoan">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1" colspan="2"></td                    
              ></tr>
              <tr>
					<td width="36%" height="22" align="right" class="level_1_2">Mã số</td>
					<td width="64%" align="left" class="level_1_2">
                    	<input name="txt_id" class="txtbox" style="width:80%" value="">&nbsp;<img name="img_id" src="images/messagebox_warning.png" style="vertical-align:middle; visibility:hidden">
                    </td>
			  </tr>                                                                  
              <tr>
					<td height="22" align="right" class="level_1_1">Mật khẩu</td>
					<td align="left" class="level_1_1">
                    	<input name="txt_matkhau" type="password" class="txtbox"  style="width:80%" value="">&nbsp;<img name="img_matkhau" src="images/messagebox_warning.png" style="vertical-align:middle; visibility:hidden">
                    </td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Nhập lại mật khẩu</td>
					<td align="left" class="level_1_2">
                    	<input name="txt_xacnhanmatkhau" type="password" class="txtbox"  style="width:80%" value="">&nbsp;<img name="img_xacnhanmatkhau" src="images/messagebox_warning.png" style="vertical-align:middle; visibility:hidden">
                    </td>
			  </tr>              
              <tr>
              		<td colspan="2" height="22" align="center" class="level_1_1">
                    	
                    </td>
              </tr>
              </tbody>
           </table>
           </form>
          </td>
        </tr>		
       </tbody>
      </table>
     
        <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="./images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Bước 2 - Đăng ký CHSV - CLB</td>
          <td width="180" align="right"> <img height="25" src="./images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_dangkychsv_clb">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" width="37%" class="level_1_1"></td>
                    <td width="63%" class="level_1_1"></td>
              </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Năm học hiện tại</td>
					<td align="left" class="level_1_2">
                    	<select name="cbo_tennamhoc" class="cbo" style="width:80%;" disabled>
                        </select>                       
                    </td>
			</tr>
            <tr>
					<td height="22" align="right" class="level_1_1">Học kì hiện tại</td>
					<td align="left" class="level_1_1">
                    	<select name="cbo_tenhocki" class="cbo" style="width:80%;" disabled>
                        </select>                       
                    </td>
			</tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Chọn Liên chi hội sinh viên</td>
					<td align="left" class="level_1_2"><select class="cbo" name="cbo_tenlchsv" style="width:80%"></select>&nbsp;<img name="img_lchsv" src="images/messagebox_warning.png" style="vertical-align:middle; visibility:hidden"></td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_1">Chọn Chi hội sinh viên</td>
					<td align="left" class="level_1_1"><select class="cbo" name="cbo_tenchsv" style="width:80%"></select>&nbsp;<img name="img_chsv" src="images/messagebox_warning.png" style="vertical-align:middle; visibility:hidden"></td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Chọn Câu lạc bộ</td>
					<td align="left" class="level_1_2"><select class="cbo" name="cbo_tenclb" style="width:80%"></select></td>
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
        </table>
      </li>
      
      <li>
		 <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="./images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Bước 3 - Thông tin hội viên</td>
          <td width="180" align="right"> <img height="25" src="./images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_thongtinhoivien">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1" width="40%"></td>
                    <td class="level_1_1"></td>
              </tr>
              
              <tr>
					<td height="22" align="right" class="level_1_2">Họ tên</td>
					<td align="left" class="level_1_2"><input name="txt_hoten" class="txtbox" style="width:80%" value="" onKeyPress="return keypress_char(event);">&nbsp;<img name="img_hoten" src="images/messagebox_warning.png" style="vertical-align:middle; visibility:hidden"></td>
			  </tr>
              <tr>
				<td height="22" align="right" class="level_1_1">Giới tính</td>
				<td align="left" class="level_1_1"> 
                <select name="cbo_gioitinh" class="cbo" style="width: 60px;">
                	<option value="0">Nam</option>
					<option value="1">Nữ</option>
				</select>
                </td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Ngày sinh</td>
                    <td height="22" class="level_1_2">
 				<select name="cbo_ngay" class="cbo" style="width20%;">
                	
				</select>	
                 <select name="cbo_thang" class="cbo" style="width:25%;">
                	
				</select>	
                <select name="cbo_nam" class="cbo" style="width:20%;">
                	
				</select>&nbsp;<img name="img_ngaysinh" src="images/messagebox_warning.png" style="vertical-align:middle; visibility:hidden">	
		            </td>
			  </tr>
              <tr>
				<td height="22" align="right" class="level_1_1">Đoàn/Đảng</td>
				<td align="left" class="level_1_1">
                <select name="cbo_doandang" class="cbo" style="width:40%;">
                	<option value="0">Đoàn viên</option>
                    <option value="1">Đảng viên</option>
				</select>
                </td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Địa chỉ thường trú</td>
					<td align="left" class="level_1_2"><input name="txt_diachithuongtru" class="txtbox" style="width:80%" value=""></td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_1">Địa chỉ liên hệ</td>
					<td align="left" class="level_1_1"><input name="txt_diachilienhe" class="txtbox" style="width:80%" value=""></td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Điện thoại</td>
					<td align="left" class="level_1_2"><input name="txt_dienthoai" class="txtbox" style="width:60%" value="" onKeyPress="return keypress_num(event)" maxlength="11">&nbsp;<img name="img_dienthoai" src="images/messagebox_warning.png" style="vertical-align:middle; visibility:hidden"></td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_1">Email</td>
					<td align="left" class="level_1_1"><input name="txt_email" maxlength="31" class="txtbox" style="width:80%" value="">&nbsp;<img name="img_email" src="images/messagebox_warning.png" style="vertical-align:middle; visibility:hidden"></td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Khóa học</td>
					<td align="left" class="level_1_2">
                 <select name="cbo_khoahoc" class="cbo" style="width:25%;">
                	
				</select>
                    </td>
			  </tr> 
              <tr>
					<td height="22" align="right" class="level_1_1">Chọn khoa</td>
					<td align="left" class="level_1_1"><select class="cbo" name="cbo_tenkhoa" style="width:80%"></select>&nbsp;<img name="img_khoa" src="images/messagebox_warning.png" style="vertical-align:middle; visibility:hidden"></td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Chọn chuyên ngành</td>
					<td align="left" class="level_1_2"><select class="cbo" name="cbo_tenchuyennganh" style="width:80%"></select>&nbsp;<img name="img_chuyennganh" src="images/messagebox_warning.png" style="vertical-align:middle; visibility:hidden"></td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_1">Chọn dân tộc</td>
					<td align="left" class="level_1_1"><select class="cbo" name="cbo_tendantoc" style="width:80%"></select>&nbsp;<img name="img_dantoc" src="images/messagebox_warning.png" style="vertical-align:middle; visibility:hidden"></td>
			  </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Chọn tôn giáo</td>
					<td align="left" class="level_1_2"><select class="cbo" name="cbo_tentongiao" style="width:80%"></select>&nbsp;<img name="img_tongiao" src="images/messagebox_warning.png" style="vertical-align:middle; visibility:hidden"></td>
			  </tr>                           
              <tr>
              		<td colspan="2" height="22" align="center" class="level_1_1"><input type="button" class="button_1" value="Đăng ký"></td>
              </tr>
              </tbody>
           </table>
           </form>
          </td>
        </tr>		
        </tbody>
        </table> 
       </li>
        </ul>
        </div>
    <div id="scrollview-pager">
        <button id="scrollview-prev" class="button_1">Quay lại</button>
        <button id="scrollview-next" class="button_1">Tiếp theo</button>
    </div>
   </div>

<script type="text/javascript" charset="utf-8">
YUI().use('scrollview', 'scrollview-paginator', function(Y){
    
	var scrollView = new Y.ScrollView({
        id: "scrollview",
        srcNode : '#scrollview-content',
        width : 500,
        flick: {
            minDistance:10,
            minVelocity:0.3,
            axis: "x"
        }
    });
    scrollView.plug(Y.Plugin.ScrollViewPaginator, {
        selector: 'li'
    });
    scrollView.render();
	$('#scrollview-content').css('-webkit-transform', 'translate(-40px, 0px)'); 
    Y.one('#scrollview-next').on('click', Y.bind(scrollView.pages.next, scrollView.pages));
    Y.one('#scrollview-prev').on('click', Y.bind(scrollView.pages.prev, scrollView.pages));
});
</script>
   
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

