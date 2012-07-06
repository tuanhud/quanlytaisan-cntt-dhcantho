<?php
require('../Export_data_2pdf/html_table.php');

$htmlTable='
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
  <td colspan="3" align="center">(Năm 2012)</td>
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

					include_once("../database.php");
					$db=new database();			
					$db->setQuery("CREATE VIEW taisanmuasam AS SELECT a.MaTaiSan, a.TenTaiSan, a.TenDonViTinh, b.SoLuong, b.DonGiaMuaSam, b.ThuyetMinhSuDung FROM taisan a, thuockhms b where a.MaTaiSan=b.MaTaiSan and b.MaKHMS="'.$_SESSION['makhms'].'"");			
					$result=$db->fetchAll();
					
					$db->setQuery("CREATE VIEW dongia AS SELECT a.GiaTriThuocTinh, a.MaTaiSan  from cothuoctinh a, thuoctinh b where a.MaThuocTinh=b.MaThuocTinh and b.MaThuocTinh=7");
					$result=$db->fetchAll();
					
					$db->setQuery("CREATE VIEW tinhnang AS SELECT a.GiaTriThuocTinh, a.MaTaiSan  from cothuoctinh a, thuoctinh b where a.MaThuocTinh=b.MaThuocTinh and b.MaThuocTinh=8");
					$result=$db->fetchAll();
					
					$db->setQuery("CREATE VIEW taisanthuockehoachmuasam AS SELECT taisanmuasam.MaTaiSan, taisanmuasam.TenTaiSan, taisanmuasam.TenDonViTinh, taisanmuasam.SoLuong, dongia.GiaTriThuocTinh, taisanmuasam.ThuyetMinhSuDung from taisanmuasam LEFT JOIN dongia
ON taisanmuasam.MaTaiSan=dongia.MaTaiSan");
					$result=$db->fetchAll();
					
					$db->setQuery("SELECT taisanthuockehoachmuasam.MaTaiSan, taisanthuockehoachmuasam.TenTaiSan, tinhnang.GiaTriThuocTinh, taisanthuockehoachmuasam.TenDonViTinh, taisanthuockehoachmuasam.SoLuong, taisanthuockehoachmuasam.GiaTriThuocTinh, taisanthuockehoachmuasam.ThuyetMinhSuDung from taisanthuockehoachmuasam LEFT JOIN tinhnang
ON taisanthuockehoachmuasam.MaTaiSan=tinhnang.MaTaiSan");
					$result2=$db->fetchAll();
					while($row=mysql_fetch_array($result2,MYSQL_NUM))
					{
						$stt+=1;
						
						"<tr align="center">
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
					$db->setQuery("DROP VIEW taisanmuasam");
					$result=$db->fetchAll();
					$db->setQuery("DROP VIEW dongia");
					$result=$db->fetchAll();
					$db->setQuery("DROP VIEW tinhnang");
					$result=$db->fetchAll();
					$db->setQuery("DROP VIEW taisanthuockehoachmuasam");
					$result=$db->fetchAll();
					
					

</table>
</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td >&nbsp;</td>

<td colspan="2" align="right">Cần thơ, ngày <?=$now["mday"]-1?> tháng <?=$now["mon"]?> năm <?=$now["year"]?></td>
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
';

$pdf=new PDF_HTML_Table();
$pdf->AddPage();
// Add a Unicode font (uses UTF-8)
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('DejaVu','',13);
$pdf->WriteHTML($htmlTable);
$pdf->Output();
?>
