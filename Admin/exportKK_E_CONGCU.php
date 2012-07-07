<?php
session_start();

$filename = "Export".date('dmY-his').".xls";
header("Content-Type: application/xml; charset=UTF-8");

header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=$filename");
echo '<?xml version="1.0"?>
<?mso-application progid="Excel.Sheet"?>';

					include_once('../database.php');
					$db=new database();
					$now = getdate();

?>
<Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet"
 xmlns:o="urn:schemas-microsoft-com:office:office"
 xmlns:x="urn:schemas-microsoft-com:office:excel"
 xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet"
 xmlns:html="http://www.w3.org/TR/REC-html40">
 <DocumentProperties xmlns="urn:schemas-microsoft-com:office:office">
  <Author>Duong Minh Hoang</Author>
  <LastAuthor>LamTay</LastAuthor>
  <LastPrinted>2011-02-18T14:26:08Z</LastPrinted>
  <Created>2007-01-09T09:11:54Z</Created>
  <LastSaved>2012-07-07T08:22:11Z</LastSaved>
  <Version>14.00</Version>
 </DocumentProperties>
 <OfficeDocumentSettings xmlns="urn:schemas-microsoft-com:office:office">
  <AllowPNG/>
 </OfficeDocumentSettings>
 <ExcelWorkbook xmlns="urn:schemas-microsoft-com:office:excel">
  <WindowHeight>6225</WindowHeight>
  <WindowWidth>11625</WindowWidth>
  <WindowTopX>120</WindowTopX>
  <WindowTopY>165</WindowTopY>
  <TabRatio>644</TabRatio>
  <ProtectStructure>False</ProtectStructure>
  <ProtectWindows>False</ProtectWindows>
 </ExcelWorkbook>
 <Styles>
  <Style ss:ID="Default" ss:Name="Normal">
   <Alignment ss:Vertical="Bottom"/>
   <Borders/>
   <Font ss:FontName="Times New Roman" ss:Size="12"/>
   <Interior/>
   <NumberFormat/>
   <Protection/>
  </Style>
  <Style ss:ID="s43" ss:Name="Comma">
   <NumberFormat ss:Format="_(* #,##0.00_);_(* \(#,##0.00\);_(* &quot;-&quot;??_);_(@_)"/>
  </Style>
  <Style ss:ID="m82346696">
   <Alignment ss:Horizontal="Center" ss:Vertical="Center" ss:WrapText="1"/>
   <Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
   </Borders>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12" ss:Bold="1"/>
  </Style>
  <Style ss:ID="s64" ss:Parent="s43">
   <Font ss:FontName="Times New Roman" ss:Size="12"/>
   <NumberFormat ss:Format="_(* #,##0_);_(* \(#,##0\);_(* &quot;-&quot;??_);_(@_)"/>
  </Style>
  <Style ss:ID="s65">
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12" ss:Bold="1"
    ss:Italic="1" ss:Underline="Single"/>
  </Style>
  <Style ss:ID="s69">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom" ss:WrapText="1"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12" ss:Bold="1"/>
  </Style>
  <Style ss:ID="s84">
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#FF0000"/>
  </Style>
  <Style ss:ID="s85">
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#0070C0"/>
  </Style>
  <Style ss:ID="s88">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
   </Borders>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"/>
   <Interior ss:Color="#FFFFFF" ss:Pattern="Solid"/>
  </Style>
  <Style ss:ID="s89">
   <Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
   </Borders>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"/>
   <Interior ss:Color="#FFFFFF" ss:Pattern="Solid"/>
  </Style>
  <Style ss:ID="s90">
   <Alignment ss:Horizontal="Center" ss:Vertical="Center"/>
   <Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
   </Borders>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"/>
   <Interior ss:Color="#FFFFFF" ss:Pattern="Solid"/>
  </Style>
  <Style ss:ID="s91">
   <Alignment ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#00B050"/>
  </Style>
  <Style ss:ID="s92">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12" ss:Bold="1"
    ss:Italic="1"/>
  </Style>
  <Style ss:ID="s93">
   <Alignment ss:Horizontal="Center" ss:Vertical="Center"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"/>
   <Interior ss:Color="#FFFFFF" ss:Pattern="Solid"/>
  </Style>
  <Style ss:ID="s108">
   <Alignment ss:Horizontal="Center" ss:Vertical="Center" ss:WrapText="1"/>
   <Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
   </Borders>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12" ss:Bold="1"/>
  </Style>
  <Style ss:ID="s111">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom" ss:WrapText="1"/>
   <Borders>
    <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
   </Borders>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12" ss:Italic="1"/>
  </Style>
  <Style ss:ID="s112">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom" ss:WrapText="1"/>
   <Borders>
    <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
   </Borders>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12" ss:Bold="1"/>
  </Style>
  <Style ss:ID="s113">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:CharSet="163" x:Family="Roman"
    ss:Size="12" ss:Italic="1"/>
  </Style>
  <Style ss:ID="s114">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="13" ss:Bold="1"/>
  </Style>
  <Style ss:ID="s115">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12" ss:Bold="1"/>
  </Style>
  <Style ss:ID="s116">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="18" ss:Bold="1"/>
  </Style>
  <Style ss:ID="s117">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="14" ss:Bold="1"
    ss:Italic="1"/>
  </Style>
 </Styles>
 <Worksheet ss:Name="CongCu">
  <Table ss:ExpandedColumnCount="14" ss:ExpandedRowCount="23" x:FullColumns="1"
   x:FullRows="1" ss:DefaultColumnWidth="54" ss:DefaultRowHeight="15.75">
   <Column ss:AutoFitWidth="0" ss:Width="26.25"/>
   <Column ss:AutoFitWidth="0" ss:Width="156"/>
   <Column ss:AutoFitWidth="0" ss:Width="60.75"/>
   <Column ss:AutoFitWidth="0" ss:Width="33.75"/>
   <Column ss:Index="6" ss:AutoFitWidth="0" ss:Width="48.75"/>
   <Column ss:Index="8" ss:AutoFitWidth="0" ss:Width="33" ss:Span="1"/>
   <Column ss:Index="10" ss:AutoFitWidth="0" ss:Width="32.25"/>
   <Column ss:AutoFitWidth="0" ss:Width="36"/>
   <Column ss:AutoFitWidth="0" ss:Width="42.75"/>
   <Column ss:AutoFitWidth="0" ss:Width="40.5"/>
   <Column ss:AutoFitWidth="0" ss:Width="155.25"/>
   <Row ss:Height="16.5">
    <Cell ss:MergeAcross="2" ss:StyleID="s114"><Data ss:Type="String">TRƯỜNG ĐẠI HỌC CẦN THƠ</Data></Cell>
    <Cell ss:Index="5" ss:StyleID="s64"/>
    <Cell ss:Index="13" ss:StyleID="s65"><Data ss:Type="String">Biểu CC/2010</Data></Cell>
   </Row>
   <Row ss:Height="16.5">
    <Cell ss:MergeAcross="2" ss:StyleID="s114"><Data ss:Type="String">TỔ KIỂM KÊ ĐƠN VỊ:Khoa CNTT-TT</Data></Cell>
    <Cell ss:Index="5" ss:StyleID="s64"/>
   </Row>
   <Row>
    <Cell ss:MergeAcross="2" ss:StyleID="s115"><Data ss:Type="String">BM.HTTT</Data></Cell>
    <Cell ss:Index="5" ss:StyleID="s64"/>
   </Row>
   <Row>
    <Cell ss:Index="5" ss:StyleID="s64"/>
   </Row>
   	<?php 
        $db->setQuery('SELECT NgayKiemKe,NgayKetThucKiemKe FROM phieukiemke where MaPhieuKiemKe="'.$_SESSION['maphieukiemke'].'"');
        $result4=$db->fetchAll();
        while($thuoctinh=mysql_fetch_array($result4,MYSQL_NUM))
        {
        echo' 
		<Row ss:Height="22.5">
    		<Cell ss:MergeAcross="13" ss:StyleID="s116"><Data ss:Type="String">DANH MỤC KIỂM KÊ THỰC TẾ TÀI SẢN CÔNG CỤ THỜI ĐIỂM 0 GiỜ NGÀY '.$thuoctinh[0].'</Data>
			</Cell>
  		</Row>
		  <Row ss:Height="19.5">
    <Cell ss:MergeAcross="13" ss:StyleID="s117"><Data ss:Type="String">(Phát sinh tăng, giảm trong năm '.$now["year"].', giai đoạn từ 0 giờ, ngày '.$thuoctinh[0].' đến 0 giờ, ngày '.$thuoctinh[1].')</Data></Cell>
   </Row>
		';
		}
        ?>
  
 
   <Row>
    <Cell ss:Index="13" ss:StyleID="s65"><Data ss:Type="String">Đơn vị tính: 1.000 đồng</Data></Cell>
   </Row>
   <Row ss:AutoFitHeight="0">
    <Cell ss:MergeDown="1" ss:StyleID="s108"><Data ss:Type="String">TT</Data></Cell>
    <Cell ss:MergeDown="1" ss:StyleID="s108"><Data ss:Type="String">Tên tài sản công cụ</Data></Cell>
    <Cell ss:MergeDown="1" ss:StyleID="s108"><Data ss:Type="String">Số lượng</Data></Cell>
    <Cell ss:MergeDown="1" ss:StyleID="s108"><Data ss:Type="String">Đơn giá</Data></Cell>
    <Cell ss:MergeDown="1" ss:StyleID="s108"><Data ss:Type="String">Thành tiền</Data></Cell>
   <?php		
	$db->setQuery('SELECT DISTINCT d.MaThuocTinh, d.TenThuocTinh from taisanthuocdonvi a, taisan b, cothuoctinh c, thuoctinh d, donvi e, phieukiemke f where a.MaTaiSan=b.MaTaiSan and b.MaTaiSan=c.MaTaiSan and c.MaThuocTinh=d.MaThuocTinh and a.MSDV=e.MSDV and e.MSDV = f.MSDV   and f.MaPhieuKiemKe="'.$_SESSION['maphieukiemke'].'" order by MaThuocTinh');
	$result=$db->fetchAll();
	while($row=mysql_fetch_array($result,MYSQL_NUM))
	{
		echo'
		<Cell ss:MergeDown="1" ss:StyleID="s108"><Data ss:Type="String">'.$row[1].'</Data></Cell>
		';			
	}
	
	$db->setQuery('SELECT d.MaND, d.TenND FROM cophieumau a, phieumau b, thuocphieumau c, noidung d where a.MaPhieu=b.MaPhieu and b.MaPhieu = c.MaPhieu and c.MaND = d.MaND and a.MaPhieuKiemKe="'.$_SESSION['maphieukiemke'].'"');			
	$result2=$db->fetchAll();
	while($row2=mysql_fetch_array($result2,MYSQL_NUM))
	{
		if($row2[0]!='GHICHU')
		{
			echo'
			<Cell ss:MergeDown="1" ss:StyleID="s108"><Data ss:Type="String">'.$row2[1].'</Data></Cell>
			';
		}
	}
  ?>
    <Cell ss:MergeDown="1" ss:StyleID="m82346696"><Data ss:Type="String">Ghi chú</Data></Cell>
   </Row>
    <Row ss:AutoFitHeight="0" ss:Height="62.25"/>
   	<?php
				
	$db->setQuery('SELECT b.MaTaiSan, b.TenTaiSan, a.SoLuongCuaDonVi, a.DonGiaTS FROM `taisanthuocdonvi` a, taisan b,  phieukiemke c, donvi d where c.MSDV=d.MSDV and d.MSDV=a.MSDV and a.MaTaiSan=b.MaTaiSan and c.MaPhieuKiemKe="'.$_SESSION['maphieukiemke'].'"');
	$result3=$db->fetchAll();
					while($mataisan=mysql_fetch_array($result3,MYSQL_NUM))
					{
						echo"<Row>";	
						$stt+=1;
						   echo' <Cell ss:StyleID="s88"><Data ss:Type="Number">'.$stt.'</Data></Cell>
								<Cell ss:StyleID="s89"><Data ss:Type="String">'.$mataisan[1].'</Data></Cell>
								<Cell ss:StyleID="s90"><Data ss:Type="Number">'.$mataisan[2].'</Data></Cell>
								<Cell ss:StyleID="s90"><Data ss:Type="Number">'.$mataisan[3].'</Data></Cell>
								<Cell ss:StyleID="s90"><Data ss:Type="Number">'.$mataisan[2]*$mataisan[3].'</Data></Cell>';
							
							
							//fill gia tri thuoc tinh
							$db->setQuery('SELECT b.MaThuocTinh, b.GiaTriThuocTinh, c.TenThuocTinh FROM taisan a, cothuoctinh b, thuoctinh c where a.MaTaiSan=b.MaTaiSan and b.MaThuocTinh=c.MaThuocTinh and a.MaTaiSan="'.$mataisan[0].'" order by MaThuocTinh');
							$result4=$db->fetchAll();
							while($thuoctinh=mysql_fetch_array($result4,MYSQL_NUM))
							{
								echo ' <Cell ss:StyleID="s90"><Data ss:Type="String">'.$thuoctinh[1].'</Data></Cell>';
							}
							$ghichu;
							// fill noi dung phieu mau
							$db->setQuery('SELECT d.MaND, d.TenND FROM cophieumau a, phieumau b, thuocphieumau c, noidung d where a.MaPhieu=b.MaPhieu and b.MaPhieu = c.MaPhieu and c.MaND = d.MaND and a.MaPhieuKiemKe="'.$_SESSION['maphieukiemke'].'"');			
							$resultabc=$db->fetchAll();
							while($manoidung=mysql_fetch_array($resultabc,MYSQL_NUM))
							{
								$db->setQuery('SELECT ChiTietND, MaND  FROM conoidung where MaPhieuKiemKe="'.$_SESSION['maphieukiemke'].'" and MaTaiSan="'.$mataisan[0].'" and MaND="'.$manoidung[0].'" ');			
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
											echo '<Cell ss:StyleID="s90"><Data ss:Type="String">x</Data></Cell>';	
										else
											echo '<Cell ss:StyleID="s90"><Data ss:Type="String"> </Data></Cell>';	
									}
								}
							}
							echo '<Cell ss:StyleID="s90"><Data ss:Type="String">'.$ghichu.'</Data></Cell>';
							echo "</Row>";	
					}	
						
		?>
   <Row>
    <Cell ss:Index="2" ss:StyleID="s69"><Data ss:Type="String">Người lập biểu</Data></Cell>
    <Cell ss:Index="4" ss:MergeAcross="4" ss:StyleID="s112"><Data ss:Type="String">Bộ môn / Tổ công tác</Data></Cell>
    <Cell ss:Index="11" ss:MergeAcross="3" ss:StyleID="s111"><ss:Data
      ss:Type="String" xmlns="http://www.w3.org/TR/REC-html40"><I>Cần Thơ, ngày <?=$now["mday"]?> tháng <?=$now["mon"]?> năm <?=$now["year"]?></I></ss:Data></Cell>
   </Row>
   
   <Row ss:Index="18" ss:AutoFitHeight="0" ss:Height="14.25"/>
   <Row>
    <Cell ss:Index="2" ss:StyleID="s92"><Data ss:Type="String"> <?php 
        $db->setQuery('SELECT TenCB FROM lapkiemke a, nguoidung b where a.MSCB=b.MSCB and MaPhieuKiemKe="'.$_SESSION['maphieukiemke'].'"');
        $str=$db->fetchAll();
        while($tencanbo=mysql_fetch_array($str,MYSQL_NUM))
        {
            echo $tencanbo[0];		
        }
        ?></Data></Cell>
    <Cell ss:Index="4" ss:MergeAcross="4" ss:StyleID="s113"/>
   </Row>
   <Row ss:Index="22" ss:AutoFitHeight="0"/>
   <Row ss:AutoFitHeight="0" ss:Height="18"/>
  </Table>
  <WorksheetOptions xmlns="urn:schemas-microsoft-com:office:excel">
   <PageSetup>
    <Layout x:Orientation="Landscape" x:CenterHorizontal="1"/>
    <Header x:Margin="0.17"/>
    <Footer x:Margin="0.17"/>
    <PageMargins x:Bottom="0.17" x:Left="0.17" x:Right="0.19" x:Top="0.62"/>
   </PageSetup>
   <Print>
    <ValidPrinterInfo/>
    <PaperSizeIndex>9</PaperSizeIndex>
    <HorizontalResolution>600</HorizontalResolution>
    <VerticalResolution>600</VerticalResolution>
   </Print>
   <Selected/>
   <FreezePanes/>
   <FrozenNoSplit/>
   <SplitHorizontal>9</SplitHorizontal>
   <TopRowBottomPane>9</TopRowBottomPane>
   <ActivePane>2</ActivePane>
   <Panes>
    <Pane>
     <Number>3</Number>
    </Pane>
    <Pane>
     <Number>2</Number>
     <ActiveCol>2</ActiveCol>
    </Pane>
   </Panes>
   <ProtectObjects>False</ProtectObjects>
   <ProtectScenarios>False</ProtectScenarios>
  </WorksheetOptions>
 </Worksheet>
</Workbook>
