<?php
	//khoi dong session
	session_start();
	if(isset($_SESSION['namhoc_id']))    unset($_SESSION['namhoc_id']);
	if(isset($_SESSION['namhoc_ten']))    unset($_SESSION['namhoc_ten']);
	if(isset($_SESSION['hocki_id']))    unset($_SESSION['hocki_id']);
	if(isset($_SESSION['hocki_ten']))    unset($_SESSION['hocki_ten']);
	if(isset($_SESSION['clb_id']))    unset($_SESSION['clb_id']);
	if(isset($_SESSION['clb_ten']))    unset($_SESSION['clb_ten']);
	
	//kiem tra quyen truoc khi hien thi trang
	/*if(!session_is_registered("maquyen"))
	{
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	if($_SESSION['maquyen']!="AD")
	echo "<script language=javascript>window.location = './Admin/loginUI.php';</script>"; 
	if($_SESSION['maquyen']!="BCHHSVT")
	echo "<script language=javascript>window.location = './HSVT/loginUI.php';</script>";
	exit;
	}*/
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Report</title>
</head>
<img src="./images/printer.png" title="In" onClick="window.print();" />&nbsp;&nbsp;<a href="baocaoDSHV_CLB_NHHK_W.php"><img src="./images/word.png" title="Xuất ra Word" /></a>&nbsp;&nbsp;<a href="baocaoDSHV_CLB_NHHK_E.php"><img src="images/excel.png" title="Xuất ra Excel"></a>&nbsp;&nbsp;<a href="baocaoDSHV_LCHSV_CHSV_NHHK_P.php"><img src="images/pdf.png" title="Xuất ra PDF"></a>

<body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0">
<?php
//Dang ky SESSION namhoc
include_once('database.php');
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
}

//Dang ky SESSION hocki
if(isset($_POST['cbo_tenhocki']) && $_POST['cbo_tenhocki']!=-1){
$hocki_id = $_POST['cbo_tenhocki'];
session_register('hocki_id');

$sql = "select hocki_ten from hocki where hocki_id = '".$_SESSION['hocki_id']."'";
$db->setQuery($sql);
$result = $db->fetchAll();
$row = mysql_fetch_array($result);
$hocki_ten = $row['hocki_ten'];
session_register('hocki_ten');
}

//Dang ky SESSION CLB
if($_POST['cbo_tenclb']!=-1){
$clb_id = $_POST['cbo_tenclb'];	
session_register('clb_id');

$sql = "select ucase(clb_ten) from clb where clb_id = '".$_SESSION['clb_id']."'";
$db->setQuery($sql);
$result = $db->fetchAll();
$row = mysql_fetch_array($result);
$clb_ten = $row[0];
session_register('clb_ten');
	}
	
?>
<table width="800px" align="center">
<tr>
<td rowspan="5"><img src="images/logo.png" width="151" height="150"></td>
<td colspan="2"></td>
</tr>
<tr>
<td width="39%" align="center">HỘI SINH VIÊN VIỆT NAM TP CẦN THƠ</td><td width="44%" align="center">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</td>
</tr>
<tr>
<td width="39%" align="center"><b>BCH TRƯỜNG ĐẠI HỌC CẦN THƠ</b></td><td width="44%" align="center">Độc lập - Tự do - Hạnh phúc</td>
</tr>
<tr>
<td width="39%" align="center"><hr width="60%"></td><td width="44%"><hr width="50%" color="#000000"></td>
</tr>
<tr>
<td width="39%" align="center">SỐ: ........</td>
<td>&nbsp;</td>
</tr>
<tr>
<td></td>
<td height="21" align="center">(V/v giới thiệu sinh viên tham gia hoạt động....
<?php
if(isset($_SESSION['hocki_ten'])){
echo "học kỳ ".$_SESSION['hocki_ten'].",";
}
if(isset($_SESSION['namhoc_ten'])){
echo " năm học ".$_SESSION['namhoc_ten'];
}
?>)</td><td align="right"><i>...., ngày<?php echo date(" d ") ?>tháng<?php echo date(" m ") ?>năm<?php echo date(" Y ") ?></i></td>
</tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr>
<td align="center" colspan="3"><b><i><font size="5">Kính gửi: Ban chấp hành Đoàn các Khoa, Viện, Bộ môn</font></i></b></td>
</tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr>
<td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nhằm hỗ trợ Đoàn các đơn vị trong công tác ghi nhận, đánh giá hoạt động rèn luyện của sinh viên, Ban thư ký Hội sinh viên trường xin giới thiệu đến các đồng chí danh sách hội viên...
<?php
if(isset($_SESSION['hocki_ten'])){
echo " học kì ".$_SESSION['hocki_ten'].",";
}
if(isset($_SESSION['namhoc_ten'])){
echo "năm học ".$_SESSION['namhoc_ten'];
	}
?>
</td>
</tr>
<tr>
<td align="center" colspan="3"><b>--------------------------------------------------------------</b></td>
</tr>
<tr>
<td align="center" colspan="3"><b>
<?php
if(isset($_SESSION['clb_ten'])){
	echo "ĐƠN VỊ: CÂU LẠC BỘ ".$_SESSION['clb_ten'];
	} 
else echo "DANH SÁCH HỘI VIÊN TẤT CẢ CÂU LẠC BỘ";
?>
</b></td>
</tr>
<tr>
<td colspan="3" align="center">
<table width="100%" border="1" cellspacing="0">
<?php
$db = new database;
$sql = "
SELECT hoivien_hoten, hoivien.hoivien_id, clb_ten , chuyennganh_ten, hoivien_khoahoc
FROM hoivien, namhoc, hocki, lchsv, chsv, chuyennganh, clb,  hv_clb
WHERE hoivien.hocki_id = hocki.hocki_id
and hocki.namhoc_id = namhoc.namhoc_id
and hoivien.chsv_id  = chsv.chsv_id
and chsv.lchsv_id = lchsv.lchsv_id
and hoivien.hoivien_id = hv_clb.hoivien_id
and hv_clb.clb_id = clb.clb_id
and hoivien.chuyennganh_id = chuyennganh.chuyennganh_id
and hoivien.hoivien_trangthai = 1 ";
if(isset($_SESSION['namhoc_id'])) $sql.=" and hocki.namhoc_id <= '".$_SESSION['namhoc_id']."' ";
if(isset($_SESSION['hocki_id'])) $sql.=" and hoivien.hocki_id <= '".$_SESSION['hocki_id']."' ";
if(isset($_SESSION['clb_id'])) $sql.=" and hv_clb.clb_id = '".$_SESSION['clb_id']."' ";
$db->setQuery($sql);
$result = $db->fetchAll();
$stt = 0;
if(isset($_SESSION['clb_id'])){
echo '<tr align="center"><td>STT</td><td>HỌ TÊN</td><td>MSSV</td><td>LỚP</td><td>GHI CHÚ</td></tr>'; 
while($row = mysql_fetch_array($result))
{
$stt+=1;
echo "<tr>
<td align='center'>".$stt."</td>
<td>".$row[0]."</td>
<td align='center'>".$row[1]."</td>
<td>".$row[3]." - K".$row[4]."</td>
<td>&nbsp;</td></tr>";
}
}
else
{
echo '<tr align="center"><td>STT</td><td>HỌ TÊN</td><td>MSSV</td><td>CÂU LẠC BỘ</td><td>LỚP</td><td>GHI CHÚ</td></tr>';
while($row = mysql_fetch_array($result))
{
$stt+=1;
echo "<tr>
<td align='center'>".$stt."</td>
<td>".$row[0]."</td>
<td align='center'>".$row[1]."</td>
<td>".$row[2]."</td>
<td>".$row[3]." - K".$row[4]."</td>
<td>&nbsp;</td></tr>";
}
}
?>
</table>
</td>
</tr>
<tr>
<td colspan="3">Danh sách có <?=$stt?> hội viên</td>
</tr>
<tr>
<td colspan="2">&nbsp;</td><td align="center"><B>TM. BAN THƯ KÝ HỘI SINH VIÊN<br>
TRƯỜNG ĐẠI HỌC CẦN THƠ<br>
PHÓ CHỦ TỊCH</B></td>
</tr>

<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="2">&nbsp;</td><td align="center">......</td></tr>
<tr><td>Nơi nhận
<ul>
<li><i>Như Kính gửi</i></li>
<li><i>Lưu VP</i></li>
</ul></td><td colspan="2">&nbsp;</td></tr>
</table>
</body>
</html>