<?php	
	//khoi dong session
	session_start();	
	//kiem tra quyen truoc khi hien thi trang
	//if(!session_is_registered("maquyen") || $_SESSION['maquyen']!="BCHCHSV")
	//{
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lập phiếu dự trù VPP</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script>	
	function thoat() {
		if (confirm('Ban co chac chan muon thoat khong ?' )) {
			document.location = '../logout.php';
			return;
		}
	}
</script>
<script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/fill.js"></script>
<script type="text/javascript" src="js/capnhatphieudutruvpp.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$btn=0; 
	fillcombo2('get_list_nam.php',document.frm_lapphieudutru.cbo_namthem);
	fillcombo2('get_list_quy.php',document.frm_lapphieudutru.cbo_quythem);
	//sau nay bo don vi, vi su dung session khi can bo dang nhap
	fillcombo('get_list_donvi.php',document.frm_lapphieudutru.cbo_donvithem);
	
	fillcombo('get_list_donvi.php',document.frm_huyphieudutruvpp.cbo_donvihuy);
	fillcombo2('get_list_nam.php',document.frm_huyphieudutruvpp.cbo_namhuy);
	fillcombo2('get_list_quy.php',document.frm_huyphieudutruvpp.cbo_quyhuy);
	$('form[name="frm_huyphieudutruvpp"] select[name="cbo_namhuy"]').change(function(){
		fillcombo3bien('get_list_maphieudutruvpp.php',document.frm_huyphieudutruvpp.cbo_donvihuy,document.frm_huyphieudutruvpp.cbo_namhuy,document.frm_huyphieudutruvpp.cbo_quyhuy, document.frm_huyphieudutruvpp.cbo_maphieuhuy);
	});
	$('form[name="frm_huyphieudutruvpp"] select[name="cbo_quyhuy"]').change(function(){
		fillcombo3bien('get_list_maphieudutruvpp.php',document.frm_huyphieudutruvpp.cbo_donvihuy,document.frm_huyphieudutruvpp.cbo_namhuy,document.frm_huyphieudutruvpp.cbo_quyhuy, document.frm_huyphieudutruvpp.cbo_maphieuhuy);
	});
	$('form[name="frm_huyphieudutruvpp"] select[name="cbo_donvihuy"]').change(function(){
		fillcombo3bien('get_list_maphieudutruvpp.php',document.frm_huyphieudutruvpp.cbo_donvihuy,document.frm_huyphieudutruvpp.cbo_namhuy,document.frm_huyphieudutruvpp.cbo_quyhuy, document.frm_huyphieudutruvpp.cbo_maphieuhuy);
	});
});
</script>
</head>
<body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0" class="yui3-skin-sam">  
<table width="778" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tbody>  
  <!--Bắt đầu của HEADER-->
  <tr> 
    <td height="26" valign="middle">       	 
	<!--Thẻ hiển thị thông tin khi đăng nhập-->
	<div style="Z-INDEX: 1; LEFT: 557px; WIDTH: 200px; POSITION: absolute; TOP: 55px; HEIGHT: 30px" align="center">
		<font style="FONT-WEIGHT: 700; FONT-SIZE: 8pt; line-height:20px;" face="Tahoma" color="#FFFFFF">
			<a class="white" href="doimatkhauUI.php">Cập nhật thông tin cá nhân</a> | <a class="white" href="javascript:thoat();">Thoát</a>
    		<br>
    		Xin chào, <?=$_SESSION['hoten']?>
    		<br>(<?=$_SESSION['mschsv']?>)    
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
         <td class="cm_header">
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
         <tbody>
           <tr>            
             <td class="tittle_header"><img src="../images/ctulogo1.gif"></td>             
           </tr>
         </tbody>
         </table>
         </td>
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
	<td height="50%" valign="middle">
    	<table align="center" border="0" cellpadding="0" cellspacing="0" width="752">      
	    <tbody>
        <tr height="10">        
	   	<td align="center" colspan="3">
        <?php
		include_once('node-menunav-3.php');
		?> 
        </td>
	    <!--<td align="center" >&nbsp;</td>
	    <td align="center">&nbsp;</td>-->
	    </tr>
        <tr>
        <td align="center" >&nbsp;</td>
        <td align="center" >&nbsp;</td>
        <td align="center" >&nbsp;</td>
        </tr>                        
      <tr>
      <!--BẮT ĐẦU LEFT MAIN INFO-->
      <td align="center" width="100%">
      
      <table width="700" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Lập phiếu dự trù văn phòng phẩm</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
           <form method='post' name='frm_lapphieudutru' id='frm_lapphieudutru'> 
		   <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" colspan="2" class="level_1_1"></td>
                    </tr>
            <tr>
              <td width="50%" height="30" align="right" class="level_1_1">Năm áp dụng</td>
              <td width="50%" align="left" class="level_1_1"><select name="cbo_namthem" id="cbo_namthem" class="cbo" style="width:100%;">
              </select></td>
            </tr>    
             <tr>
					<td height="22" align="right" class="level_1_2">Quý áp dụng</td>
					<td width="50%" align="left" class="level_1_2"><select name="cbo_quythem" id="cbo_quythem" class="cbo" style="width:100%;">
					  </select></td>
			</tr>
             <tr>
					<td height="22" align="right" class="level_1_1">Phiếu dự toán của đơn vị</td>
					<td width="50%" align="left" class="level_1_1"><select name="cbo_donvithem" id="cbo_donvithem" class="cbo" style="width:100%;">
					  </select></td>
			</tr>   
                <tr>
					<td height="22" colspan="2" align="left" class="level_1_2"><em><strong>Chi tiết văn phòng phẩm:</strong> (Check vào ô và điền số lượng, đơn giá tương ứng)</em></td>
					</tr>
             <tr>
					<td height="22" colspan="2" align="center" class="level_1_1"><table class="border_1" bordercolor="#111111" width="645" border="0">
					  <tr class="level_1_2">
					    <th width="31"><input type="checkbox"></th>
					    <th width="190">Tên VPP</th>
					    <th width="84">ĐVT</th>
					    <th width="119">NSX</th>
					    <th width="66">SL</th>
					    <th width="129">Đơn Giá</th>
					    </tr>
<?php
include("../database.php");
$db=new database();
$sql="select a.mavpp,a.tenvpp,a.tendonvitinh, b.tennsx from vanphongpham a, nhasanxuat b where a.mansx=b.mansx";
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
	echo "<td align=\"center\"><input type='checkbox' name='checkbox[]' id='checkbox[]' value='$row[mavpp]'</td>";
	echo "<td>$row[tenvpp]</td>";
	echo "<td align=\"center\">$row[tendonvitinh]</td>";
	echo "<td>$row[tennsx]</td>";
	echo "<td><input type='text' style='width:100%' name='sl$row[mavpp]' id='sl$row[mavpp]'></td>";
	echo "<td><input type='text' name='dg$row[mavpp]' id='dg$row[mavpp]'></td>";
	echo "</tr>";
	}
?>
					  
					  </table></td>
					</tr>          
              <tr>
                <td colspan="2" height="22" align="center" class="level_1_2"><input type="submit" name="btn_lap" id="btn_lap" class="button_1" value="Lập" ></td>
              </tr>
              </form>
              </tbody>
           </table>
           <?php
		   
	if(isset($_POST['btn_lap'])){
			   //tim ma phieu du toan lon nhat
		$db=new database();
		$sql = "Select max(Maphieudutoan) from phieudutoanvpp";
		$db->setQuery($sql);
		$result = $db->fetchAll();
		$row = mysql_fetch_array($result,MYSQL_NUM);
		$maphieudutoan = $row[0]+1;
 		if(($_POST['cbo_namthem']=="-Chọn năm-") || ($_POST['cbo_quythem']=="-Chọn quý-") || ($_POST['cbo_donvithem']==-1))
	{
		echo "<script type=\"text/javascript\">
		alert('Chưa chọn đủ thông tin')
		</script>";
		}
	else {
		//them vao bang có van phong pham
		if(empty($_POST['checkbox'])){
		echo "<script type=\"text/javascript\">
		alert('Chưa chọn các văn phòng phẩm')
		</script>";
	
		}
		else{
		$check=$_POST['checkbox'];
	for($i=0;$i<count($check);$i++){
		$gan =$check[$i];
		if($gan!=0){
		if(($_POST['sl'.$gan]=='') || ($_POST['dg'.$gan]=='')){
			echo "<script type=\"text/javascript\">
		alert('Chưa chọn đủ thông tin')
		</script>";
		break;
		}
		else{
		$sqlvpp="insert into covpp values('".$maphieudutoan."','".$gan."','".$_POST['sl'.$gan]."','".$_POST['dg'.$gan]."')";
		$db1=new database();
		$db1->setQuery($sqlvpp);
		$db1->executeQuery();
		//them vao ban phieu du toan van phong pham
		$db2=new database();
	$db3=new database();
		$sqldutoan="insert into phieudutoanvpp values('".$maphieudutoan."','".$_POST['cbo_namthem']."','".$_POST['cbo_donvithem']."','0')";
		$db2->setQuery($sqldutoan);
		$db2->executeQuery();
		//them vao ban thuocquyvpp
		$sqlquyvpp="insert into thuocquyvpp values('".$maphieudutoan."','".$_POST['cbo_quythem']."')";
		$db3->setQuery($sqlquyvpp);
		$db3->executeQuery();
		}
		}
		else{
			echo "<script type=\"text/javascript\">
		alert('Chưa chọn đủ thông tin')
		</script>";
			}
		}//KET THUC VONG LAP FOR
		}
	}
		   }
	?>   
          </td>
        </tr>		
        </tbody>
        </table>
<br/>
        <table width="700" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Sửa phiếu dự trù văn phòng phẩm</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td height="165" colspan="3" align="left">
          	<form name="frm_suaphieudutru" id="frm_suaphieudutru">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Chọn mã phiếu dự toán</td>
					<td width="50%" align="left" class="level_1_2">
                    	<select name="cbo_maphieusua" id="cbo_maphieusua" class="cbo" style="width:100%;">
                        </select>                       
                    </td>
			</tr>
            <tr>
					<td width="50%" height="30" align="right" class="level_1_1">Năm áp dụng</td>
              <td width="50%" align="left" class="level_1_1"><select name="cbo_namsua" id="cbo_namsua" class="cbo" style="width:100%;">
              </select></td>
            </tr>    
             <tr>
					<td height="22" align="right" class="level_1_2">Quý áp dụng</td>
					<td width="50%" align="left" class="level_1_2"><select name="cbo_quysua" id="cbo_quysua" class="cbo" style="width:100%;">
					  </select></td>
			</tr>
             <tr>
					<td height="22" align="right" class="level_1_1">Phiếu dự toán của đơn vị</td>
					<td width="50%" align="left" class="level_1_1"><select name="cbo_donvisua" id="cbo_donvisua" class="cbo" style="width:100%;">
					  </select></td>
			</tr>   
                <tr>
					<td height="22" colspan="2" align="left" class="level_1_2"><em><strong>Chi tiết văn phòng phẩm:</strong> (Check vào ô và điền số lượng, đơn giá tương ứng)</em></td>
					</tr>
             <tr>
					<td height="22" colspan="2" align="right" class="level_1_1">&nbsp;</td>
			</tr>         
            <tr>
              <td colspan="2" height="22" align="center" class="level_1_2">
                <input type="button" name="btn_luu" id="btn_luu" class="button_1" value="Lưu">
                </td>
            </tr>
				  						  
            </tbody>
        </table>
        	</form>
       </td>
      </tr>		
      </tbody>
      </table>
<br/>
   <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Xóa phiếu dự trù văn phòng phẩm</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td height="165" colspan="3" align="left">
          	<form name="frm_huyphieudutruvpp" id="frm_huyphieudutruvpp">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
                <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
            <tr>
              <td width="50%" height="30" align="right" class="level_1_2">Năm áp dụng</td>
              <td width="50%" align="left" class="level_1_2"><select name="cbo_namhuy" id="cbo_namhuy" class="cbo" style="width:100%;">
                </select></td>
            </tr>    
             <tr>
					<td height="22" align="right" class="level_1_1">Quý áp dụng</td>
					<td width="50%" align="left" class="level_1_1"><select name="cbo_quyhuy" id="cbo_quyhuy" class="cbo" style="width:100%;">
                </select></td>
			</tr>
             <tr>
					<td height="22" align="right" class="level_1_2">Phiếu dự trù của đơn vị</td>
					<td width="50%" align="left" class="level_1_2"><select name="cbo_donvihuy" id="cbo_donvihuy" class="cbo" style="width:100%;">
                </select></td>
			</tr>
             <tr>
					<td height="22" align="right" class="level_1_1">Mã phiếu dự trù</td>
					<td width="50%" align="left" class="level_1_1"><select name="cbo_maphieuhuy" id="cbo_maphieuhuy" class="cbo" style="width:100%;">
                </select></td>
			</tr>          
            <tr>
              <td colspan="2" height="22" align="center" class="level_1_2">
                <input type="button" name="btn_xoa" id="btn_xoa" class="button_1" value="Xóa">
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
      <!--KẾT THÚC LEFT MAIN INFO-->            
      </tr>   
    </tbody></table></td>
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
<script>
    //  Call the "use" method, passing in "node-menunav".  This will load the
    //  script and CSS for the MenuNav Node Plugin and all of the required
    //  dependencies.
    YUI().use('node-menunav', function(Y) {
        //  Retrieve the Node instance representing the root menu
        //  (<div id="productsandservices">) and call the "plug" method
        //  passing in a reference to the MenuNav Node Plugin.
        var menu = Y.one("#chsv");
        menu.plug(Y.Plugin.NodeMenuNav);
        //  Show the menu now that it is ready
        menu.get("ownerDocument").get("documentElement").removeClass("yui3-loading");
    });
</script>
</html>
