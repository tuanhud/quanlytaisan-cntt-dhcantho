<?php
	//khoi dong session
	/*session_start();
	
	//kiem tra quyen truoc khi hien thi trang
	if(!session_is_registered("maquyen") || $_SESSION['maquyen']!="AD")
	{
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	echo "<script language=javascript>window.location = 'loginUI.php';</script>"; 
	exit;
	}*/
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cập nhật thiết bị</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">

<script type="text/javascript" src="../js/jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="../js/ajax.js"></script>
<script type="text/javascript" src="../js/fill.js"></script>
<script type="text/javascript" src="../js/ban.js"></script>
<script type="text/javascript" >
//Không cho nhập ký tự
function keypress(e){
var keypressed = null;
if (window.event)
	keypressed = window.event.keyCode; //IE
else 
	keypressed = e.which; //NON-IE, Standard

if (keypressed >= 48 && keypressed <= 57)
{ 
	//CharCode của 0 là 48 (Theo bảng mã ASCII)
	//CharCode của 9 là 57 (Theo bảng mã ASCII)
	if (keypressed == 8 || keypressed == 127)
	{
	//Phím Delete và Phím Back
	return;
	}
	return false;
}
}
$(document).ready(function() { 
	fillcombo('../get_list_ban.php',document.frm_xoaban.cbo_tenban);
	fillcombo('../get_list_ban.php',document.frm_suaban.cbo_tenban);
	//su kien nhan button them
	$('form[name="frm_themban"] input[type="button"]').click(function(){
		themban('../themban.php',document.frm_themban);	
	});
	
	//su kien nhan button sua
	$('form[name="frm_suaban"] input[type="button"]').click(function(){
		suaban('../suaban.php',document.frm_suaban);	
	});	
	//su kien click button xoa
	$('form[name="frm_xoaban"] input[type="button"]').click(function(){
		if (confirm('Bạn có chắc chắn muốn xóa không ?' )) {
			xoaban('../xoaban.php',document.frm_xoaban);	
		}		
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
	<a class="white" href="javascript:thoat();">Thoát</a>
    <br>Xin chào, <?=$_SESSION['hoten']?>
    <br>
	(<?=$_SESSION['msad']?>)
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
             
             <td class="tittle_header"><img src="../images/ctulogo1.gif" alt=""></td>
             
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
    <td valign="middle" height="54%">
    
        <table width="752" align="center" border="0" cellpadding="0" cellspacing="0">
        <!--MENU-->
        <tr height="10">        
			<td align="center" colspan="3">
			<?php
			include_once('node-menunav-3.php');
			?> 
			</td>    
        </tr>
        
		<tr>
        <td align="center" >&nbsp;</td>
        <td align="center" >&nbsp;</td>
        <td align="center" >&nbsp;</td>
        </tr>                    
        <!--KET THUC MENU-->
        <tr>
    <td height="100%" align="center" valign="middle">   
		 <table width="513" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="105" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="275" align="center">Thêm phiếu kiểm kê</td>
          <td width="133" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_themban">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
			  <tr>
			    <td height="22" align="right" class="level_1_2">Chọn loại kiểm kê:</td>
			    <td align="left" class="level_1_2"><label for="loaikk"></label>
			      <select name="loaikk" id="loaikk" style="width:100%">
			        </select></td>
			    <tr>
					<td height="22" align="right" class="level_1_2">Tên phiếu kiểm kê: </td>
					<td width="50%" align="left" class="level_1_2"><label for="txttenpkk"></label>
					  <input type="text" name="txttenpkk" id="txttenpkk" style="width:100%"></td>
               <tr>
                 <td height="22" align="right" class="level_1_1">Ngày kiểm kê:</td>
                 <td align="left" class="level_1_1"><label for="ngktkk4">Ngày</label>
                   <select name="ng" id="ng5" style="width:40">
                     <option value="1" selected>1</option>
                     <option value="2">2</option>
                     <option value="3">3</option>
                     <option value="4">4</option>
                     <option value="5">5</option>
                     <option value="6">6</option>
                     <option value="7">7</option>
                     <option value="8">8</option>
                     <option value="9">9</option>
                     <option value="10">10</option>
                     <option value="11">11</option>
                     <option value="12">12</option>
                     <option value="13">13</option>
                     <option value="14">14</option>
                     <option value="15">15</option>
                     <option value="16">16</option>
                     <option value="17">17</option>
                     <option value="18">18</option>
                     <option value="19">19</option>
                     <option value="20">20</option>
                     <option value="21">21</option>
                     <option value="22">22</option>
                     <option value="23">23</option>
                     <option value="24">24</option>
                     <option value="25">25</option>
                     <option value="26">26</option>
                     <option value="27">27</option>
                     <option value="28">28</option>
                     <option value="29">29</option>
                     <option value="30">30</option>
                     <option value="31">31</option>
                   </select>
                   <label for="thktkk4">Tháng</label>
                   <select name="th" id="th5" style="width:40">
                     <option value="1" selected>1</option>
                     <option value="2">2</option>
                     <option value="3">3</option>
                     <option value="4">4</option>
                     <option value="5">5</option>
                     <option value="6">6</option>
                     <option value="7">7</option>
                     <option value="8">8</option>
                     <option value="9">9</option>
                     <option value="10">10</option>
                     <option value="11">11</option>
                     <option value="12">12</option>
                   </select>
                   <label for="namktkk4">Năm</label>
                   <select name="nam" id="nam5" style="width:55">
                     <option value="2000" selected>2000</option>
                     <option value="2001">2001</option>
                     <option value="2002">2002</option>
                     <option value="2003">2003</option>
                     <option value="2004">2004</option>
                     <option value="2005">2005</option>
                     <option value="2006">2006</option>
                     <option value="2007">2007</option>
                     <option value="2008">2008</option>
                     <option value="2009">2009</option>
                     <option value="2010">2010</option>
                     <option value="2011">2011</option>
                     <option value="2012">2012</option>
                   </select></td>
               </tr>
               <tr>
                 <td height="22" align="right" class="level_1_1">Ngày kết thúc kiểm kê:</td>
                 <td align="left" class="level_1_1"><label for="ngktkk5">Ngày</label>
                   <select name="ng2" id="ng2" style="width:40">
                     <option value="1" selected>1</option>
                     <option value="2">2</option>
                     <option value="3">3</option>
                     <option value="4">4</option>
                     <option value="5">5</option>
                     <option value="6">6</option>
                     <option value="7">7</option>
                     <option value="8">8</option>
                     <option value="9">9</option>
                     <option value="10">10</option>
                     <option value="11">11</option>
                     <option value="12">12</option>
                     <option value="13">13</option>
                     <option value="14">14</option>
                     <option value="15">15</option>
                     <option value="16">16</option>
                     <option value="17">17</option>
                     <option value="18">18</option>
                     <option value="19">19</option>
                     <option value="20">20</option>
                     <option value="21">21</option>
                     <option value="22">22</option>
                     <option value="23">23</option>
                     <option value="24">24</option>
                     <option value="25">25</option>
                     <option value="26">26</option>
                     <option value="27">27</option>
                     <option value="28">28</option>
                     <option value="29">29</option>
                     <option value="30">30</option>
                     <option value="31">31</option>
                   </select>
                   <label for="thktkk5">Tháng</label>
                   <select name="th2" id="th2" style="width:40">
                     <option value="1" selected>1</option>
                     <option value="2">2</option>
                     <option value="3">3</option>
                     <option value="4">4</option>
                     <option value="5">5</option>
                     <option value="6">6</option>
                     <option value="7">7</option>
                     <option value="8">8</option>
                     <option value="9">9</option>
                     <option value="10">10</option>
                     <option value="11">11</option>
                     <option value="12">12</option>
                   </select>
                   <label for="namktkk5">Năm</label>
                   <select name="nam2" id="nam2" style="width:55">
                     <option value="2000" selected>2000</option>
                     <option value="2001">2001</option>
                     <option value="2002">2002</option>
                     <option value="2003">2003</option>
                     <option value="2004">2004</option>
                     <option value="2005">2005</option>
                     <option value="2006">2006</option>
                     <option value="2007">2007</option>
                     <option value="2008">2008</option>
                     <option value="2009">2009</option>
                     <option value="2010">2010</option>
                     <option value="2011">2011</option>
                     <option value="2012">2012</option>
                   </select></td>
               </tr>
               <tr>
					<td height="22" align="right" class="level_1_2">Diễn giải:</td>
					<td width="50%" align="left" class="level_1_2"><textarea name="txt_tenthietbi" rows="5" class="txtbox" style="width:100%" onKeyPress="return keypress(event)"></textarea></td>
			</tr>         
              <tr>
                <td colspan="2" height="22" align="center" class="level_1_2"><input type="button" class="button_1" value="Thêm"></td>
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

        <table width="515" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="105" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="275" align="center">Sửa phiếu kiểm kê</td>
          <td width="135" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_suaban">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
                <td height="22" class="level_1_2"></td>
                <td class="level_1_2"></td>
              </tr>
              <tr>
              		<td height="22" class="level_1_2" align="right">Chọn phiếu kiểm kê: </td>
                    <td width="50%" class="level_1_2"><select name="select" id="select" style="width:100%">
                    </select></td>
              </tr>   
              <tr>
                <td height="22" align="right" class="level_1_2">Chọn loại kiểm kê:</td>
                <td height="22" align="center" class="level_1_2"><label for="select2"></label>
                  <select name="select2" id="select2" style="width:100%">
                  </select></td>
              </tr>
              <tr>
                <td height="22" align="right" class="level_1_2">Tên phiếu kiểm kê mới:</td>
                <td height="22" align="center" class="level_1_2"><label for="txtpkkm"></label>
                  <input type="text" name="txtpkkm" id="txtpkkm" style="width:100%"></td>
              </tr>
              <tr>
                <td height="22" align="right" class="level_1_1">Ngày kiểm kê:</td>
                <td align="left" class="level_1_1"><label for="ngktkk6">Ngày</label>
                  <select name="ng5" id="ng6" style="width:40">
                    <option value="1" selected>1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                  </select>
                  <label for="thktkk6">Tháng</label>
                  <select name="th5" id="th6" style="width:40">
                    <option value="1" selected>1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                  </select>
                  <label for="namktkk6">Năm</label>
                  <select name="nam5" id="nam6" style="width:55">
                    <option value="2000" selected>2000</option>
                    <option value="2001">2001</option>
                    <option value="2002">2002</option>
                    <option value="2003">2003</option>
                    <option value="2004">2004</option>
                    <option value="2005">2005</option>
                    <option value="2006">2006</option>
                    <option value="2007">2007</option>
                    <option value="2008">2008</option>
                    <option value="2009">2009</option>
                    <option value="2010">2010</option>
                    <option value="2011">2011</option>
                    <option value="2012">2012</option>
                  </select></td>
              </tr>
              <tr>
                <td height="22" align="right" class="level_1_1">Ngày kết thúc kiểm kê:</td>
                <td align="left" class="level_1_1"><label for="ngktkk2">Ngày</label>
                  <select name="ng3" id="ng3" style="width:40">
                    <option value="1" selected>1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                  </select>
                  <label for="thktkk2">Tháng</label>
                  <select name="th3" id="th3" style="width:40">
                    <option value="1" selected>1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                  </select>
                  <label for="namktkk2">Năm</label>
                  <select name="nam3" id="nam3" style="width:55">
                    <option value="2000" selected>2000</option>
                    <option value="2001">2001</option>
                    <option value="2002">2002</option>
                    <option value="2003">2003</option>
                    <option value="2004">2004</option>
                    <option value="2005">2005</option>
                    <option value="2006">2006</option>
                    <option value="2007">2007</option>
                    <option value="2008">2008</option>
                    <option value="2009">2009</option>
                    <option value="2010">2010</option>
                    <option value="2011">2011</option>
                    <option value="2012">2012</option>
                  </select></td>
              </tr>
              <tr>
                <td height="22" align="right" class="level_1_2">Diễn giải:</td>
                <td height="22" align="center" class="level_1_2"><textarea name="txt_tenthietbi2" rows="5" class="txtbox" style="width:100%" onKeyPress="return keypress(event)"></textarea></td>
              </tr>
              <tr>
              <td colspan="2" height="22" align="center" class="level_1_2">
                <input type="button" class="button_1" value="Lưu">
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

        <table width="515" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="105" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="275" align="center">Xóa phiếu kiểm kê</td>
          <td width="135" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_xoaban">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_2"></td>
                    <td class="level_1_2"></td>
              </tr>
             <tr>
					<td height="22" align="right" class="level_1_1">Chọn phiếu kiểm kê: </td>
					<td width="50%" align="left" class="level_1_1">
                    	<select name="cbo_tenloaithietbi" class="cbo" style="width:100%;">
                        </select>                       
                    </td>
					
			</tr>
             <tr >
               <td height="22" align="right" class="level_1_2">Tên phiếu kiểm kê: </td>
               <td align="left" class="level_1_2"><label for="txttenpkk"></label>
                 <input type="text" name="txttenpkk2" id="txttenpkk" style="width:100%"></td>
             <tr>
               <td height="22" align="right" class="level_1_1">Ngày kiểm kê:</td>
               <td align="left" class="level_1_1"><label for="ngktkk7">Ngày</label>
                 <select name="ng6" id="ng" style="width:40">
                   <option value="1" selected>1</option>
                   <option value="2">2</option>
                   <option value="3">3</option>
                   <option value="4">4</option>
                   <option value="5">5</option>
                   <option value="6">6</option>
                   <option value="7">7</option>
                   <option value="8">8</option>
                   <option value="9">9</option>
                   <option value="10">10</option>
                   <option value="11">11</option>
                   <option value="12">12</option>
                   <option value="13">13</option>
                   <option value="14">14</option>
                   <option value="15">15</option>
                   <option value="16">16</option>
                   <option value="17">17</option>
                   <option value="18">18</option>
                   <option value="19">19</option>
                   <option value="20">20</option>
                   <option value="21">21</option>
                   <option value="22">22</option>
                   <option value="23">23</option>
                   <option value="24">24</option>
                   <option value="25">25</option>
                   <option value="26">26</option>
                   <option value="27">27</option>
                   <option value="28">28</option>
                   <option value="29">29</option>
                   <option value="30">30</option>
                   <option value="31">31</option>
                 </select>
                 <label for="thktkk7">Tháng</label>
                 <select name="th6" id="th" style="width:40">
                   <option value="1" selected>1</option>
                   <option value="2">2</option>
                   <option value="3">3</option>
                   <option value="4">4</option>
                   <option value="5">5</option>
                   <option value="6">6</option>
                   <option value="7">7</option>
                   <option value="8">8</option>
                   <option value="9">9</option>
                   <option value="10">10</option>
                   <option value="11">11</option>
                   <option value="12">12</option>
                 </select>
                 <label for="namktkk7">Năm</label>
                 <select name="nam6" id="nam" style="width:55">
                   <option value="2000" selected>2000</option>
                   <option value="2001">2001</option>
                   <option value="2002">2002</option>
                   <option value="2003">2003</option>
                   <option value="2004">2004</option>
                   <option value="2005">2005</option>
                   <option value="2006">2006</option>
                   <option value="2007">2007</option>
                   <option value="2008">2008</option>
                   <option value="2009">2009</option>
                   <option value="2010">2010</option>
                   <option value="2011">2011</option>
                   <option value="2012">2012</option>
                 </select></td>
             </tr>
             <tr>
               <td height="22" align="right" class="level_1_1">Ngày kết thúc kiểm kê:</td>
               <td align="left" class="level_1_1"><label for="ngktkk8">Ngày</label>
                 <select name="ng4" id="ng4" style="width:40">
                   <option value="1" selected>1</option>
                   <option value="2">2</option>
                   <option value="3">3</option>
                   <option value="4">4</option>
                   <option value="5">5</option>
                   <option value="6">6</option>
                   <option value="7">7</option>
                   <option value="8">8</option>
                   <option value="9">9</option>
                   <option value="10">10</option>
                   <option value="11">11</option>
                   <option value="12">12</option>
                   <option value="13">13</option>
                   <option value="14">14</option>
                   <option value="15">15</option>
                   <option value="16">16</option>
                   <option value="17">17</option>
                   <option value="18">18</option>
                   <option value="19">19</option>
                   <option value="20">20</option>
                   <option value="21">21</option>
                   <option value="22">22</option>
                   <option value="23">23</option>
                   <option value="24">24</option>
                   <option value="25">25</option>
                   <option value="26">26</option>
                   <option value="27">27</option>
                   <option value="28">28</option>
                   <option value="29">29</option>
                   <option value="30">30</option>
                   <option value="31">31</option>
                 </select>
                 <label for="thktkk8">Tháng</label>
                 <select name="th4" id="th4" style="width:40">
                   <option value="1" selected>1</option>
                   <option value="2">2</option>
                   <option value="3">3</option>
                   <option value="4">4</option>
                   <option value="5">5</option>
                   <option value="6">6</option>
                   <option value="7">7</option>
                   <option value="8">8</option>
                   <option value="9">9</option>
                   <option value="10">10</option>
                   <option value="11">11</option>
                   <option value="12">12</option>
                 </select>
                 <label for="namktkk8">Năm</label>
                 <select name="nam4" id="nam4" style="width:55">
                   <option value="2000" selected>2000</option>
                   <option value="2001">2001</option>
                   <option value="2002">2002</option>
                   <option value="2003">2003</option>
                   <option value="2004">2004</option>
                   <option value="2005">2005</option>
                   <option value="2006">2006</option>
                   <option value="2007">2007</option>
                   <option value="2008">2008</option>
                   <option value="2009">2009</option>
                   <option value="2010">2010</option>
                   <option value="2011">2011</option>
                   <option value="2012">2012</option>
                 </select></td>
             </tr>
             <tr>
               <td height="22" align="right" class="level_1_2">Diễn giải:</td>
               <td align="left" class="level_1_2"><textarea name="txt_tenthietbi2" rows="5" class="txtbox" style="width:100%" onKeyPress="return keypress(event)"></textarea></td>
             </tr>
             <tr>
               <td colspan="2" height="22" align="center" class="level_1_2">
                 <input type="button" class="button_1" value="Xóa">
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

		
	</td>
  </tr>
  <!--Kết thúc của MAINPAGE-->
  <!--Bắt đàu của FOOTER-->
  <tr>
    <td valign="bottom">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
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
<script>
    //  Call the "use" method, passing in "node-menunav".  This will load the
    //  script and CSS for the MenuNav Node Plugin and all of the required
    //  dependencies.
    YUI().use('node-menunav', function(Y) {
        //  Retrieve the Node instance representing the root menu
        //  (<div id="productsandservices">) and call the "plug" method
        //  passing in a reference to the MenuNav Node Plugin.
        var menu = Y.one("#admin");
        menu.plug(Y.Plugin.NodeMenuNav);
        //  Show the menu now that it is ready
        menu.get("ownerDocument").get("documentElement").removeClass("yui3-loading");
    });
</script>
</html>

