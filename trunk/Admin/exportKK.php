<?php
	//khoi dong session
	session_start();
	$maphieukiemke = $_POST['cbo_tenkk'];
	include_once('../database.php');
	$db=new database();		
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
<img src="../images/printer.png" title="In" onClick="window.print();" />&nbsp;&nbsp;<a href="exportKK_W.php"><img src="../images/word.png" title="Xuất ra Word" /></a>&nbsp;&nbsp;<a href="exportKK_E.php"><img src="../images/excel.png" title="Xuất ra Excel"></a>&nbsp;&nbsp;<a href="exportKK_PDF.php"><img src="../images/pdf3.png" title="Xuất ra PDF"></a>

<body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0">
<table width="1200" align="center">
<tr>
<td width="39%" align="center">TRƯỜNG ĐẠI HỌC CẦN THƠ</td>
<td width="49%" align="center"><strong>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</strong></td>
<td>Biểu CC/2010</td>
</tr>
<tr>
<td width="39%" align="center"><b>TỔ KIỂM KÊ ĐƠN VỊ:Khoa CNTT-TT</b></td>
<td width="49%" align="center"><strong>Độc lập - Tự do - Hạnh phúc</strong></td>
<td>&nbsp;</td>
<td width="0%">
</td>
</tr>
<tr>
<td width="39%" align="center"><hr width="60%" color="#000000"></td>
<td width="49%"><hr width="50%" color="#000000"></td>
</tr>
<tr>
<td align="center" colspan="3"><h2><strong>DANH MỤC KIỂM KÊ THỰC TẾ TÀI SẢN CÔNG CỤ THỜI ĐIỂM 0 GiỜ NGÀY 01.01.2011</strong></h2></td>
</tr>
<tr>
<td align="center" colspan="3"><b>(Phát sinh tăng, giảm trong năm 2010, giai đoạn từ 0 giờ, ngày 01.01.2010 đến 0 giờ, ngày 01.01.2011) <?php 
	$now = getdate();
	echo $now["year"];
?>)</b></td>
</tr>
<tr>
<td colspan="3" align="center">
<table width="100%" border="1" cellspacing="0">
<tr align="center">
  <td width="4%"><div align="center"><strong>TT</strong></div></td>
  <td width="17%"><div align="center"><strong>Tên thiết bị</strong></div></td>
  <td width="auto"><div align="center"><strong>Số lượng</strong></div></td>
  <td width="auto"><div align="center"><strong>Đơn giá</strong></div></td>
  <td width="auto"><div align="center"><strong>Thành tiền</strong></div></td>
  <?php		
	$db->setQuery('SELECT DISTINCT d.MaThuocTinh, d.TenThuocTinh from taisanthuocdonvi a, taisan b, cothuoctinh c, thuoctinh d, donvi e, phieukiemke f where a.MaTaiSan=b.MaTaiSan and b.MaTaiSan=c.MaTaiSan and c.MaThuocTinh=d.MaThuocTinh and a.MSDV=e.MSDV and e.MSDV and f.MSDV   and f.MaPhieuKiemKe="'.$maphieukiemke.'"');
	$result=$db->fetchAll();
	while($row=mysql_fetch_array($result,MYSQL_NUM))
	{
		echo' 
		<td width="auto">
			<div align="center"><strong>'.$row[1].'</strong></div>
		</td>
		';		
	}
	
	$db->setQuery('SELECT d.MaND, d.TenND FROM cophieumau a, phieumau b, thuocphieumau c, noidung d where a.MaPhieu=b.MaPhieu and b.MaPhieu = c.MaPhieu and c.MaND = d.MaND and a.MaPhieuKiemKe="'.$maphieukiemke.'"');			
	$result2=$db->fetchAll();
	while($row2=mysql_fetch_array($result2,MYSQL_NUM))
	{
		if($row2[0]!='GHICHU')
		{
		echo' 
			<td>
					<div align="center"><strong>'.$row2[1].'</strong></div>		
			</td>';
		}
	}
  ?>
   <td width="200"><div align="center"><strong>Ghi chú</strong></div></td>
</tr>
<tr>
<?php
				
	$db->setQuery('SELECT b.MaTaiSan, b.TenTaiSan, a.SoLuongCuaDonVi, a.DonGiaTS FROM `taisanthuocdonvi` a, taisan b,  phieukiemke c, donvi d where c.MSDV=d.MSDV and d.MSDV=a.MSDV and a.MaTaiSan=b.MaTaiSan and c.MaPhieuKiemKe="'.$maphieukiemke.'"');
	$result3=$db->fetchAll();
					while($mataisan=mysql_fetch_array($result3,MYSQL_NUM))
					{
						echo"<tr align='center'>";	
						$stt+=1;
						   echo'  <td>'.$stt.'</td>
								  <td>'.$mataisan[1].'</td>
								  <td>'.$mataisan[2].'</td>
								  <td>'.$mataisan[3].'</td>
								  <td>'.$mataisan[2]*$mataisan[3].'</td>
							';
							
							//fill gia tri thuoc tinh
							$db->setQuery('SELECT b.MaThuocTinh, b.GiaTriThuocTinh FROM taisan a, cothuoctinh b where a.MaTaiSan=b.MaTaiSan and a.MaTaiSan="'.$mataisan[0].'"');
							$result4=$db->fetchAll();
							while($thuoctinh=mysql_fetch_array($result4,MYSQL_NUM))
							{
								echo '<td>' .$thuoctinh[1]. '</td>';
							}
							
							// fill noi dung phieu mau
							$db->setQuery('SELECT d.MaND, d.TenND FROM cophieumau a, phieumau b, thuocphieumau c, noidung d where a.MaPhieu=b.MaPhieu and b.MaPhieu = c.MaPhieu and c.MaND = d.MaND and a.MaPhieuKiemKe="'.$maphieukiemke.'"');			
							$resultabc=$db->fetchAll();
							while($manoidung=mysql_fetch_array($resultabc,MYSQL_NUM))
							{
								$db->setQuery('SELECT ChiTietND, MaND  FROM conoidung where MaPhieuKiemKe="'.$maphieukiemke.'" and MaTaiSan="'.$mataisan[0].'" and MaND="'.$manoidung[0].'" ');			
								$resultasd=$db->fetchAll();
								$ghichu;
								while($chitietnd=mysql_fetch_array($resultasd,MYSQL_NUM))
								{
									if($chitietnd[1]=='GHICHU')
									{
											$ghichu = $chitietnd[0];
									}
									else
									{
										echo '<td>' .$chitietnd[0]. '</td>';	
									}
								}
								
							}
							echo '<td>' .$ghichu. '</td>';
							echo "</tr>";	
					}	
						
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
    <td width="12%" align="left">Người lập</td>
</tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="3">&nbsp;</td></tr>
</table>
</body>
</html>

