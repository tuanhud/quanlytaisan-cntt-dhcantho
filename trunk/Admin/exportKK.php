<?php
	//khoi dong session
	session_start();
	$maphieukiemke = $_POST['cbo_tenkk'];
	$maloaikiemke = $_POST['cbo_loaikk'];
	session_register("maphieukiemke");
	session_register("maloaikiemke");
	include_once('../database.php');
	$db=new database();		
	$now = getdate();
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
<img src="../images/printer.png" title="In" onClick="window.print();" />&nbsp;&nbsp;<a href="exportKK_W_CONGCU.php"><img src="../images/word.png" title="Xuất ra Word" /></a>&nbsp;&nbsp;<a href="exportKK_E_CONGCU.php"><img src="../images/excel.png" title="Xuất ra Excel"></a>&nbsp;&nbsp;<a href="exportKK_PDF_CONGCU.php"><img src="../images/pdf3.png" title="Xuất ra PDF"></a>

<body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0">
<table width="1200" align="center">
	<tr>
        <td width="39%" align="center"><strong>TRƯỜNG ĐẠI HỌC CẦN THƠ</strong></td>
        <td width="40%" align="center"><strong>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</strong></td>
        <td align="right">Biểu CC/2010</td>
	</tr>
	<tr>
        <td width="39%" align="center"><b>TỔ KIỂM KÊ ĐƠN VỊ: KHOA CNTT-TT</b></td>
        <td width="40%" align="center"><strong>Độc lập - Tự do - Hạnh phúc</strong></td>
        <td>&nbsp;</td>
        <td width="0%">
        </td>
	</tr>
	<tr>
        <td width="39%" align="center"><hr width="60%" color="#000000"></td>
        <td width="40%"><hr width="50%" color="#000000"></td>
	</tr>
		<?php 
        $db->setQuery('SELECT NgayKiemKe,NgayKetThucKiemKe FROM phieukiemke where MaPhieuKiemKe="'.$maphieukiemke.'"');
        $result4=$db->fetchAll();
        while($thuoctinh=mysql_fetch_array($result4,MYSQL_NUM))
        {
        echo'<tr>
        <td align="center" colspan="3"><h2><strong>DANH MỤC KIỂM KÊ THỰC TẾ TÀI SẢN CÔNG CỤ THỜI ĐIỂM 0 GiỜ NGÀY
          '.$thuoctinh[0].'</strong></h2></td>
        </tr>
        <tr>
        
            <td align="center" colspan="3"><b><em>(Phát sinh tăng, giảm trong năm '.$now["year"].', giai đoạn từ 0 giờ, ngày '.$thuoctinh[0].' đến 0 giờ, ngày '.$thuoctinh[1].')</em></b></td>		
        
        
        </tr>';
		}
        ?>
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
	$db->setQuery('SELECT DISTINCT d.MaThuocTinh, d.TenThuocTinh from taisanthuocdonvi a, taisan b, cothuoctinh c, thuoctinh d, donvi e, phieukiemke f where a.MaTaiSan=b.MaTaiSan and b.MaTaiSan=c.MaTaiSan and c.MaThuocTinh=d.MaThuocTinh and a.MSDV=e.MSDV and e.MSDV = f.MSDV   and f.MaPhieuKiemKe="'.$maphieukiemke.'" order by MaThuocTinh');
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
								  <td>'.$mataisan[2]*$mataisan[3].'</td>';
							
							
							//fill gia tri thuoc tinh
							$db->setQuery('SELECT b.MaThuocTinh, b.GiaTriThuocTinh, c.TenThuocTinh FROM taisan a, cothuoctinh b, thuoctinh c where a.MaTaiSan=b.MaTaiSan and b.MaThuocTinh=c.MaThuocTinh and a.MaTaiSan="'.$mataisan[0].'" order by MaThuocTinh');
							$result4=$db->fetchAll();
							while($thuoctinh=mysql_fetch_array($result4,MYSQL_NUM))
							{
								echo '<td>' .$thuoctinh[1]. '</td>';
							}
							$ghichu;
							// fill noi dung phieu mau
							$db->setQuery('SELECT d.MaND, d.TenND FROM cophieumau a, phieumau b, thuocphieumau c, noidung d where a.MaPhieu=b.MaPhieu and b.MaPhieu = c.MaPhieu and c.MaND = d.MaND and a.MaPhieuKiemKe="'.$maphieukiemke.'"');			
							$resultabc=$db->fetchAll();
							while($manoidung=mysql_fetch_array($resultabc,MYSQL_NUM))
							{
								$db->setQuery('SELECT ChiTietND, MaND  FROM conoidung where MaPhieuKiemKe="'.$maphieukiemke.'" and MaTaiSan="'.$mataisan[0].'" and MaND="'.$manoidung[0].'" ');			
								$resultasd=$db->fetchAll();
								
								while($chitietnd=mysql_fetch_array($resultasd,MYSQL_NUM))
								{
									if($chitietnd[1]=='GHICHU')
									{
											$ghichu = $chitietnd[0];
									}
									else 
									{
										if($chitietnd[0]=='true')
											echo '<td>x</td>';	
										else
											echo '<td> </td>';	
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
        <td align="center"><strong>Thủ trưởng đơn vị kiêm Trưởng Ban KK đơn vị</strong></td>
        <td align="center"><strong>Bộ môn / Tổ công tác</strong></td>
        <td width="21%" align="center"><strong>Người lập</strong></td>
    </tr>
    <tr>
        <td align="center"><em>(Ký và ghi rõ họ tên)</em></td>
        <td align="center"><em>(Ký và ghi rõ họ tên)</em></td>
        <td width="21%" align="center"><em>(Ký và ghi rõ họ tên)</em></td>
    </tr>
	<tr><td colspan="3">&nbsp;</td></tr>
	<tr><td colspan="3">&nbsp;</td></tr>
	<tr>
        <td align="center"></td>
        <td align="center"></td>
        <td width="21%" align="center">
        <?php 
        $db->setQuery('SELECT TenCB FROM lapkiemke a, nguoidung b where a.MSCB=b.MSCB and MaPhieuKiemKe="'.$maphieukiemke.'"');
        $str=$db->fetchAll();
        while($tencanbo=mysql_fetch_array($str,MYSQL_NUM))
        {
            echo $tencanbo[0];		
        }
        ?>
        </td>
	</tr>

	<tr><td colspan="3">&nbsp;</td></tr>
	<tr><td colspan="3">&nbsp;</td></tr>
</table>
</body>
</html>

