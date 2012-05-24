<?php
// load library
require 'php-excel.class.php';
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Report</title>
</head>
<body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0">
<?php
include_once('database.php');
?>
<table width="610px" height="842px" align="center">
<tr>
<td width="48%" align="center">HỘI SINH VIÊN VIỆT NAM TP CẦN THƠ</td><td width="52%" align="center">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</td>
</tr>
<tr>
<td width="48%" align="center"><b>BCH TRƯỜNG ĐẠI HỌC CẦN THƠ</b></td><td align="center">Độc lập - Tự do - Hạnh phúc</td>
</tr>
<tr>
<td width="48%" align="center"><hr width="60%"></td><td><hr width="50%" color="#000000"></td>
</tr>
<tr>
<td width="48%" align="center">SỐ: ........</td><td>&nbsp;</td>
</tr>
<tr>
<td width="48%" align="center">(V/v giới thiệu sinh viên tham gia hoạt động....học kỳ <?=$_SESSION['hocki']?>, năm học <?=$_SESSION['namhoc']?> )</td><td align="right"><i>...., ngày<?php echo date(" d ") ?>tháng<?php echo date(" m ") ?>năm<?php echo date(" Y ") ?></i></td>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
<td align="center" colspan="2"><b><i><font size="5">Kính gửi: Ban chấp hành Đoàn các Khoa, Viện, Bộ môn</font></i></b></td>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
<td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nhằm hỗ trợ Đoàn các đơn vị trong công tác ghi nhận, đánh giá hoạt động rèn luyện của sinh viên, Ban thư ký Hội sinh viên trường xin giới thiệu đến các đồng chí danh sách hội viên...trong học kì <?=$_SESSION['hocki']?>, năm học <?=$_SESSION['namhoc']?></td>
</tr>
<tr>
<td align="center" colspan="2"><b>--------------------------------------------------------------</b></td>
</tr>
<tr>
<td align="center" colspan="2"><b>ĐƠN VỊ:  
<?php
$db = new database();
if(isset($_SESSION['lchsv']) && $_SESSION['chsv']==-1){
	$sql = "select ucase(lchsv_ten) as lchsv_ten from lchsv where lchsv_id = '".$_SESSION['lchsv']."'";
	$db->setQuery($sql);
	$result = $db->fetchAll();
	$row = mysql_fetch_array($result);
	echo "LIÊN CHI HỘI SINH VIÊN ".$row['lchsv_ten'];
	} 
else if(isset($_SESSION['chsv']) && $_SESSION['chsv']!=-1){
	$sql = "select ucase(chsv_ten) as chsv_ten from chsv where chsv_id = '".$_SESSION['chsv']."'";
	$db->setQuery($sql);
	$result = $db->fetchAll();
	$row = mysql_fetch_array($result);
	echo "CHI HỘI SINH VIÊN ".$row['chsv_ten'];
	}
else echo "HỘI SINH VIÊN TRƯỜNG";
?>
</b></td>
</tr>
<tr>
<td colspan="2" align="center">
<table width="100%" border="1" cellspacing="0">
<?php
$db = new database();
$sql = "
SELECT hoivien_hoten, hoivien_id, chsv_ten, chuyennganh_ten, hoivien_khoahoc
FROM hoivien, namhoc, hocki, lchsv, chsv, chuyennganh
WHERE hoivien.hocki_id = hocki.hocki_id
and hocki.namhoc_id = namhoc.namhoc_id
and hoivien.chsv_id  = chsv.chsv_id
and chsv.lchsv_id = lchsv.lchsv_id
and hoivien.chuyennganh_id = chuyennganh.chuyennganh_id
and hoivien.hoivien_trangthai = 1
and hoivien.chsv_id = '".$_SESSION['chsv']."'";
$db->setQuery($sql);
$result = $db->fetchAll();
$stt = 0;
// create a simple 2-dimensional array
$data = array(
        1 => array ('STT', 'HỌ TÊN', 'MSSV', 'LỚP', 'GHI CHÚ' ),
        array('Đàm Thuận Hoài', 'Nam'),
        array('Đàm Thuận Hoài', 'Tân')
        );
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
?>
</table>
</td>
</tr>
<tr>
<td colspan="2">Danh sách có <?=$stt?> hội viên</td>
</tr>
<tr>
<td>&nbsp;</td><td align="center"><B>TM. BAN THƯ KÝ HỘI SINH VIÊN<br>
TRƯỜNG ĐẠI HỌC CẦN THƠ<br>
PHÓ CHỦ TỊCH</B></td>
</tr>

<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td><td align="center">......</td></tr>
<tr><td>Nơi nhận
<ul>
<li><i>Như Kính gửi</i></li>
<li><i>Lưu VP</i></li>
</ul></td><td>&nbsp;</td></tr>
</table>
<?php
// generate file (constructor parameters are optional)
$xls = new Excel_XML('UTF-8', false, 'Workflow Management');
$xls->addArray($data);
$xls->generateXML('Output_Report_WFM');
?>
</body>
</html>

