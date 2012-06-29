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
<title>Cập nhật tài sản - thiết bị</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">

<script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="js/yui.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/fill.js"></script>
<script type="text/javascript" src="js/capnhattaisan.js"></script>
<script type="text/javascript" src="js/table-khms.js"></script>

<script type="text/javascript" >
$(document).ready(function() { 
	/*document.frm_themtaisan.cbo_tenloaitaisanthem.focus();
	fillcombo('get_list_loaitaisan.php',document.frm_themtaisan.cbo_tenloaitaisanthem);
	fillcombo3('get_list_donvitinh.php',document.frm_themtaisan.cbo_donvitinhthem);*/
	fillcombo2('get_list_nam.php',document.frm_themkehoachmuasam.cbo_nam);
	fillcombo('get_list_donvi.php',document.frm_themkehoachmuasam.cbo_chondonvi);
	fillcombo2('get_list_nam.php',document.frm_xoakehoachmuasam.cbo_namxoa);
	fillcombo('get_list_donvi.php',document.frm_xoakehoachmuasam.cbo_chondonvixoa);
	fillcombo2('get_list_nam.php',document.frm_suakehoachmuasam.cbo_namsua);
	fillcombo('get_list_donvi.php',document.frm_suakehoachmuasam.cbo_chondonvisua);
	//createTable();
	createTable2();
	/*$('form[name="frm_themtaisan"] select[name="cbo_tenthuoctinh"]').change(function(){		
		 ('get_list_hoivien_chsv.php', this.value);
	});
	*/
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
<div style="Z-INDEX: 1; LEFT: 563px; WIDTH: 200px; POSITION: absolute; TOP: 53px; HEIGHT: 30px" align="center">
<font style="FONT-WEIGHT: 700; FONT-SIZE: 8pt; line-height:20px;" face="Tahoma" color="#FFFFFF">
	<a class="white" href="javascript:thoat();">Thoát</a>
    <br>
    Xin chào, <?=$_SESSION['hoten']?>
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
    <td valign="middle" height="54%">
    
        <table width="752" align="center" border="0" cellpadding="0" cellspacing="0">
        <!--MENU-->
        <tr height="10">        
			<td align="center" colspan="3">
			<?php
			include_once('node-menunav-3ad.php');
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
		 <table width="650" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Thêm kế hoạch mua sắm</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_themkehoachmuasam" id="frm_themkehoachmuasam">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
                <td height="22" class="level_1_1"></td>
              		<td class="level_1_1"></td>
              </tr>
			  <tr>
			    <td height="22" align="right" class="level_1_2">Năm:</td>
					<td width="70%" align="left" class="level_1_2"><label for="cbo_nam"></label>
					  <select name="cbo_nam" id="cbo_nam">
					    <option>2012</option>
					    </select></td>
               <tr>
                 <td height="22" align="right" class="level_1_1">Chọn đơn vị:</td>
                 <td align="left" class="level_1_1"><label for="cbo_chondonvi"></label>
                   <select name="cbo_chondonvi" id="cbo_chondonvi">
                     <option>Bộ môn công nghệ phần mềm</option>
                   </select></td>
               </tr>
           <!--bang thuoc tinh dat o day-->
             <tr>
					<td align="center" height="300" class="level_1_1" colspan="4" valign="top">
                    <table class="border_1" bordercolor="#111111" width="645" border="0">
                      <tr class="level_1_2">
                        <th width="31"><input type="checkbox"></th>
                        <th width="190">Tên tài sản</th>
                        <th width="84">Đơn vị tính</th>
                        <th width="119">Số lượng</th>
                        <th width="66">Đơn giá</th>
                        <th width="129">Thành tiền</th>
                        <th width="129">Thuyết minh sử dụng</th>
                      </tr>
                      <?php
include("../database.php");
$db=new database();
/*$sql="select a.mavpp,a.tenvpp,a.tendonvitinh, b.tennsx from vanphongpham a, nhasanxuat b where a.mansx=b.mansx";
$db->setQuery($sql);
$list=$db->fetchAll();*/
$sql="Select a.MaTaiSan,TenTaiSan,TenDonViTinh,GiaTriThuocTinh from taisan a, cothuoctinh b where a.MaTaiSan= b.MaTaiSan ";
					$db->setQuery($sql);
					$list=$db->fetchAll();
$count=0;
$btn_lap;
while($row=mysql_fetch_array($list))
	{
		$count=$count+1;
	if($count%2!=0)
	echo "<tr class='level_1_1'>";
	else
	echo "<tr class='level_1_2'>";
	echo "<td align=\"center\"><input type='checkbox' name='checkbox[]' id='checkbox[]' value='$row[MaTaiSan]'</td>";
	echo "<td>$row[TenTaiSan]</td>";
	echo "<td align=\"center\">$row[TenDonViTinh]</td>";
	echo "<td><input type='text' style='width:100%' name='sl$row[MaTaiSan]' id='sl$row[MaTaiSan]' onKeyPress='return keypress(event)'></td>";
	echo "<td align=\"center\">$row[GiaTriThuocTinh]</td>";
	echo "<td><input type='text' name='tt$row[mavpp]' id='tt$row[mavpp]'></td>";
	echo "<td><input type='text' name='tmsd$row[mavpp]' id='tmsd$row[mavpp]' onKeyPress='return keypress(event)'></td>";
	echo "</tr>";
	}
?>
                    </table>
                    <p>&nbsp;</p></td>
			</tr>             
              <tr>
              		<td colspan="2" height="22" align="center" class="level_1_1"><input name="btn_themtaisan" id="btn_themtaisan" type="button" class="button_1" value="Thêm"></td>
              </tr>
			  
			  <tr>
              		<td colspan="2" height="22" align="center" class="level_1_2">
					</td>
              </tr>
              </tbody>
           </table>
           </form>
          </td>
        </tr>		
        </tbody>
        </table>
		 <p>&nbsp;</p>
		 <table width="650" border="0" cellpadding="0" cellspacing="0">
		   <tbody>
		     <tr class="main_1">
		       <td width="161" align="left"><img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
		       <td width="419" align="center">Sửa kế hoạch mua sắm</td>
		       <td width="180" align="right"><img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
		       </tr>
		     <tr>
		       <td colspan="3" align="left"><form name="frm_suakehoachmuasam" id="frm_suakehoachmuasam">
		         <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">
		           <tbody>
		             <tr>
		               <td height="22" class="level_1_1"></td>
		               <td class="level_1_1"></td>
		               </tr>
		             <tr>
		               <td height="22" align="right" class="level_1_2">Năm:</td>
		               <td width="70%" align="left" class="level_1_2"><label for="cbo_namsua"></label>
		                 <select name="cbo_namsua" id="cbo_namsua">
		                   <option>2012</option>
		                   </select></td>
		               <tr>
		                 <td height="22" align="right" class="level_1_1">Chọn đơn vị:</td>
		                 <td align="left" class="level_1_1"><label for="cbo_chondonvisua"></label>
		                   <select name="cbo_chondonvisua" id="cbo_chondonvisua">
		                     <option>Bộ môn công nghệ phần mềm</option>
		                     </select></td>
		                 </tr>
		             <!--bang thuoc tinh dat o day-->
		             <tr>
		               <td align="center" height="300" class="level_1_1" colspan="4" valign="top"><div class="yui3-skin-sam">
		                 <div id="mytable2"></div>
		                 </div></td>
		               </tr>
		             <tr>
		               <td colspan="2" height="22" align="center" class="level_1_1"><input name="btn_suakehoachmuasam" id="btn_suakehoachmuasam" type="button" class="button_1" value="Sửa"></td>
		               </tr>
		             <tr>
		               <td colspan="2" height="22" align="center" class="level_1_2"></td>
		               </tr>
		             </tbody>
		           </table>
		         </form></td>
		       </tr>
		     </tbody>
		   </table>
<br>
		<br>
        <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Xóa kế hoạch mua sắm</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_xoakehoachmuasam" id="frm_xoakehoachmuasam">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_2"></td>
                    <td class="level_1_2"></td>
              </tr>
             <tr>
					<td height="22" align="right" class="level_1_1">Chọn năm: </td>
					<td width="50%" align="left" class="level_1_1"><span class="level_1_2">
					  <select name="cbo_namxoa" id="cbo_namxoa">
					    <option>2012</option>
					    </select>
					</span></td>
					
			</tr>              
             <tr>
					<td height="22" align="right" class="level_1_2"> Chọn đơn vị:</td>
					<td width="50%" align="left" class="level_1_2"><span class="level_1_1">
					  <select name="cbo_chondonvixoa" id="cbo_chondonvixoa">
					    <option>Bộ môn công nghệ phần mềm</option>
					    </select>
					</span></td>
					
			</tr>    
            <tr>
						<td colspan="2" height="22" align="center" class="level_1_1">
                        <input type="button" class="button_1" value="Xóa">
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

