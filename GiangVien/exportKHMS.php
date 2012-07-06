<?php
	//khoi dong session
	session_start();
	$makhms = $_POST['makhms'];
	session_register("makhms");
	//kiem tra quyen truoc khi hien thi trang
	/*if(!session_is_registered("maquyen") || 
	(
	$_SESSION['maquyen']!="HSVT" 
	&& $_SESSION['maquyen']!="LCHSV" 
	&& $_SESSION['maquyen']!="CHSV"
	))
	{
	echo "<script language=javascript>window.location = 'index.php';</script>";
	exit;
	}*/
	
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Report</title>
<style type="text/css">
.nam {
	font-size: 24px;
}
</style>
</head>
<img src="../images/printer.png" title="In" onClick="window.print();" />&nbsp;&nbsp;<a href="exportKHMS_W.php"><img src="../images/word.png" title="Xuất ra Word" /></a>&nbsp;&nbsp;<a href="exportKHMS_E.php"><img src="../images/excel.png" title="Xuất ra Excel"></a>&nbsp;&nbsp;<a href="exportKHMS_PDF.php"><img src="../images/pdf3.png" title="Xuất ra PDF"></a>

<body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0">
<?php
//Dang ky SESSION namhoc
/*include_once('../database.php');
$db = new database;
if($_POST['cbo_tennamhoc']!=-1){
$namhoc_id = $_POST['cbo_tennamhoc'];
session_register('namhoc_id');

$sql = "select namhoc_ten from namhoc where namhoc_id = '".$_SESSION['namhoc_id']."'";
$db->setQuery($sql);
$result = $db->fetchAll();
$row = mysql_fetch_array($result);
$namhoc_ten = $row['namhoc_ten'];
session_register('namhoc_ten');
}*/

////Dang ky SESSION hocki
//if(isset($_POST['cbo_tenhocki']) && $_POST['cbo_tenhocki']!=-1){
//$hocki_id = $_POST['cbo_tenhocki'];
//session_register('hocki_id');
//
//$sql = "select hocki_ten from hocki where hocki_id = '".$_SESSION['hocki_id']."'";
//$db->setQuery($sql);
//$result = $db->fetchAll();
//$row = mysql_fetch_array($result);
//$hocki_ten = $row['hocki_ten'];
//session_register('hocki_ten');
//}
//
////Dang ky SESSION LCHSV
//if($_POST['cbo_tenlchsv']!=-1){
//$lchsv_id = $_POST['cbo_tenlchsv'];	
//session_register('lchsv_id');
//
//$sql = "select ucase(lchsv_ten) from lchsv where lchsv_id = '".$_SESSION['lchsv_id']."'";
//$db->setQuery($sql);
//$result = $db->fetchAll();
//$row = mysql_fetch_array($result);
//$lchsv_ten = $row[0];
//session_register('lchsv_ten');
//	}
	
////Dang ky SESSION CHSV
//if(isset($_POST['cbo_tenchsv']) && $_POST['cbo_tenchsv']!=-1){
//$chsv_id = $_POST['cbo_tenchsv'];	
//session_register('chsv_id');
//
//$sql = "select ucase(chsv_ten) from chsv where chsv_id = '".$_SESSION['chsv_id']."'";
//$db->setQuery($sql);
//$result = $db->fetchAll();
//$row = mysql_fetch_array($result);
//$chsv_ten = $row[0];
//session_register('chsv_ten');
	//}
?>
<table width="858" align="center">
<tr>
<td width="39%" align="center">TRƯỜNG ĐẠI HỌC CẦN THƠ</td>
<td width="51%" align="center"><strong>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</strong></td>
</tr>
<tr>
<td width="39%" align="center"><b>KHOA CÔNG NGHỆ TT &amp; TT</b></td>
<td width="51%" align="center"><strong>Độc lập - Tự do - Hạnh phúc</strong></td>
<td>
</td>
</tr>
<tr>
<td width="39%" align="center"><hr width="60%" color="#000000"></td>
<td width="51%"><hr width="50%" color="#000000"></td>
</tr>
<tr>
<td align="center" colspan="3"><h2><strong>KẾ HOẠCH MUA SẮM MÁY MÓC THIẾT BỊ LẺ BỔ SUNG</strong></h2></td>
</tr>
<tr>
  <td colspan="3" align="center">(Năm <?php 
	$now = getdate();
	echo $now["year"];
?>)</td>
</tr>
<tr>
<td align="center" colspan="3"><b>--------------------------------------------------------------</b></td>
</tr>
<tr>
<td align="center" colspan="3"><b>Kính gửi: Phòng Quản trị - Thiết bị</b></td>
</tr>
<tr>
<td colspan="3" align="center">
<table width="100%" border="1" cellspacing="0">
<tr align="center">
  <td width="4%"><div align="center"><strong>TT</strong></div></td>
  <td width="17%"><div align="center"><strong>Tên thiết bị</strong></div></td>
  <td width="17%"><div align="center"><strong>Tính năng kỹ thuật</strong></div></td>
  <td width="7%"><div align="center"><strong>ĐVT</strong></div></td>
  <td width="9%"><div align="center"><strong>Số lượng</strong></div></td>
   <td width="11%"><div align="center"><strong>Ước đơn giá</strong></div></td>
  <td width="11%"><div align="center"><strong>Thành tiền</strong></div></td>
  <td width="24%"><div align="center"><strong>Thuyết minh yêu cầu sử dụng</strong></div></td>
</tr>
<?php
					include_once('../database.php');
					$db=new database();			
					$db->setQuery('CREATE VIEW taisanmuasam AS SELECT a.MaTaiSan, a.TenTaiSan, a.TenDonViTinh, b.SoLuong, b.DonGiaMuaSam, b.ThuyetMinhSuDung FROM taisan a, thuockhms b where a.MaTaiSan=b.MaTaiSan and b.MaKHMS="'.$makhms.'"');			
					$result=$db->fetchAll();
					
					$db->setQuery('CREATE VIEW dongia AS SELECT a.GiaTriThuocTinh, a.MaTaiSan  from cothuoctinh a, thuoctinh b where a.MaThuocTinh=b.MaThuocTinh and b.MaThuocTinh=7');
					$result=$db->fetchAll();
					
					$db->setQuery('CREATE VIEW tinhnang AS SELECT a.GiaTriThuocTinh, a.MaTaiSan  from cothuoctinh a, thuoctinh b where a.MaThuocTinh=b.MaThuocTinh and b.MaThuocTinh=8');
					$result=$db->fetchAll();
					
					$db->setQuery('CREATE VIEW taisanthuockehoachmuasam AS SELECT taisanmuasam.MaTaiSan, taisanmuasam.TenTaiSan, taisanmuasam.TenDonViTinh, taisanmuasam.SoLuong, dongia.GiaTriThuocTinh, taisanmuasam.ThuyetMinhSuDung from taisanmuasam LEFT JOIN dongia
ON taisanmuasam.MaTaiSan=dongia.MaTaiSan');
					$result=$db->fetchAll();
					
					$db->setQuery('SELECT taisanthuockehoachmuasam.MaTaiSan, taisanthuockehoachmuasam.TenTaiSan, tinhnang.GiaTriThuocTinh, taisanthuockehoachmuasam.TenDonViTinh, taisanthuockehoachmuasam.SoLuong, taisanthuockehoachmuasam.GiaTriThuocTinh, taisanthuockehoachmuasam.ThuyetMinhSuDung from taisanthuockehoachmuasam LEFT JOIN tinhnang
ON taisanthuockehoachmuasam.MaTaiSan=tinhnang.MaTaiSan');
					$result2=$db->fetchAll();
					while($row=mysql_fetch_array($result2,MYSQL_NUM))
					{
						$stt+=1;
						echo"<tr align='center'>
								  <td>".$stt."</td>
								  <td>".$row[1]."</td>
								  <td>".$row[2]."</td>
								  <td>".$row[3]."</td>
								  <td>".$row[4]."</td>
								  <td>".$row[5]."</td>
								  <td>".$row[4]*$row[5]."</td>
								  <td>".$row[6]."</td>
							</tr>";
					}
					$db->setQuery('DROP VIEW taisanmuasam');
					$result=$db->fetchAll();
					$db->setQuery('DROP VIEW dongia');
					$result=$db->fetchAll();
					$db->setQuery('DROP VIEW tinhnang');
					$result=$db->fetchAll();
					$db->setQuery('DROP VIEW taisanthuockehoachmuasam');
					$result=$db->fetchAll();
					
					
?>
</table>
</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td >&nbsp;</td>

<td colspan="2" align="right">Cần thơ, ngày <?=$now["mday"]?> tháng <?=$now["mon"]?> năm <?=$now["year"]?></td>
</tr>

<tr>
	<td align="center">Trưởng Khoa</td>
    <td align="center">Trưởng Bộ Môn </td>
    <td width="10%" align="left">Người lập</td>
</tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="3">&nbsp;</td></tr>
</table>
</body>
</html>

