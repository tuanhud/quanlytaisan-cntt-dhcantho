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

?>
<Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet"
 xmlns:o="urn:schemas-microsoft-com:office:office"
 xmlns:x="urn:schemas-microsoft-com:office:excel"
 xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet"
 xmlns:html="http://www.w3.org/TR/REC-html40">
 <DocumentProperties xmlns="urn:schemas-microsoft-com:office:office">
  <Author>lamTay</Author>
  <LastAuthor>LamTay</LastAuthor>
  <LastPrinted>2012-03-06T07:50:24Z</LastPrinted>
  <Created>2012-03-06T07:09:11Z</Created>
  <LastSaved>2012-07-06T01:21:56Z</LastSaved>
  <Version>14.00</Version>
 </DocumentProperties>
 <OfficeDocumentSettings xmlns="urn:schemas-microsoft-com:office:office">
  <AllowPNG/>
 </OfficeDocumentSettings>
 <ExcelWorkbook xmlns="urn:schemas-microsoft-com:office:excel">
  <WindowHeight>7890</WindowHeight>
  <WindowWidth>20115</WindowWidth>
  <WindowTopX>240</WindowTopX>
  <WindowTopY>150</WindowTopY>
  <ProtectStructure>False</ProtectStructure>
  <ProtectWindows>False</ProtectWindows>
 </ExcelWorkbook>
 <Styles>
  <Style ss:ID="Default" ss:Name="Normal">
   <Alignment ss:Vertical="Bottom"/>
   <Borders/>
   <Font ss:FontName="Calibri" x:Family="Swiss" ss:Size="11" ss:Color="#000000"/>
   <Interior/>
   <NumberFormat/>
   <Protection/>
  </Style>
  <Style ss:ID="s62">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="13"
    ss:Color="#000000" ss:Bold="1"/>
  </Style>
  <Style ss:ID="s63">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"
     ss:Color="#000000"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"
     ss:Color="#000000"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"
     ss:Color="#000000"/>
    <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"
     ss:Color="#000000"/>
   </Borders>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="13"
    ss:Color="#000000" ss:Bold="1"/>
  </Style>
  <Style ss:ID="s64">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"
     ss:Color="#000000"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"
     ss:Color="#000000"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"
     ss:Color="#000000"/>
    <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"
     ss:Color="#000000"/>
   </Borders>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="13"
    ss:Color="#000000"/>
  </Style>
  <Style ss:ID="s72">
   <Alignment ss:Horizontal="Center" ss:Vertical="Center"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="14"
    ss:Color="#000000" ss:Bold="1"/>
  </Style>
  <Style ss:ID="s73">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="15"
    ss:Color="#000000" ss:Bold="1"/>
  </Style>
  <Style ss:ID="s75">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Font ss:FontName="Calibri" x:Family="Swiss" ss:Size="11" ss:Color="#000000"
    ss:Bold="1"/>
  </Style>
  <Style ss:ID="s76">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Font ss:FontName="Calibri" x:Family="Swiss" ss:Size="11" ss:Color="#000000"
    ss:Bold="1"/>
  </Style>
  <Style ss:ID="s77">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="13"
    ss:Color="#000000" ss:Italic="1"/>
  </Style>
 </Styles>
 <Worksheet ss:Name="Sheet1">
  <Table ss:ExpandedColumnCount="8" x:FullColumns="1"
   x:FullRows="1" ss:DefaultRowHeight="15">
   <Column ss:AutoFitWidth="0" ss:Width="39"/>
   <Column ss:AutoFitWidth="0" ss:Width="70.5"/>
   <Column ss:AutoFitWidth="0" ss:Width="103.5"/>
   <Column ss:AutoFitWidth="0" ss:Width="50.25"/>
   <Column ss:AutoFitWidth="0" ss:Width="57"/>
   <Column ss:AutoFitWidth="0" ss:Width="70.5"/>
   <Column ss:AutoFitWidth="0" ss:Width="66.75"/>
   <Column ss:AutoFitWidth="0" ss:Width="169.5"/>
   <Row ss:AutoFitHeight="0">
    <Cell ss:MergeAcross="2" ss:StyleID="s62"><Data ss:Type="String">TRƯỜNG ĐẠI HỌC CẦN THƠ</Data></Cell>
    <Cell ss:MergeAcross="4" ss:StyleID="s62"><Data ss:Type="String">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</Data></Cell>
   </Row>
   <Row ss:AutoFitHeight="0">
    <Cell ss:MergeAcross="2" ss:StyleID="s62"><Data ss:Type="String">KHOA CÔNG NGHỆ TT&amp;TT</Data></Cell>
    <Cell ss:MergeAcross="4" ss:StyleID="s62"><Data ss:Type="String">Độc lập – Tự do – Hạnh phúc</Data></Cell>
   </Row>
   <Row ss:AutoFitHeight="0">
    <Cell ss:MergeAcross="2" ss:StyleID="s76"><Data ss:Type="String" x:Ticked="1">&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;-</Data></Cell>
    <Cell ss:MergeAcross="4" ss:StyleID="s62"><Data ss:Type="String">&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;-</Data></Cell>
   </Row>
   <Row ss:AutoFitHeight="0" ss:Height="29.25">
    <Cell ss:MergeAcross="7" ss:StyleID="s72"><Data ss:Type="String">KẾ HOẠCH MUA SẮM MÁY MÓC THIẾT BỊ LẺ BỔ SUNG</Data></Cell>
   </Row>
   <Row ss:AutoFitHeight="0" ss:Height="18.75">
    <Cell ss:MergeAcross="7" ss:StyleID="s73"><Data ss:Type="String">Năm 2012</Data></Cell>
   </Row>
   <Row ss:AutoFitHeight="0" ss:Height="18">
    <Cell ss:MergeAcross="7" ss:StyleID="s75"><Data ss:Type="String">&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;-</Data></Cell>
   </Row>
   <Row ss:AutoFitHeight="0" ss:Height="14.25">
    <Cell ss:MergeAcross="7" ss:StyleID="s62"><Data ss:Type="String">ĐƠN VỊ:</Data></Cell>
   </Row>
   <Row ss:AutoFitHeight="0" ss:Height="17.25">
    <Cell ss:StyleID="s62"/>
    <Cell ss:StyleID="s62"/>
    <Cell ss:StyleID="s62"/>
    <Cell ss:StyleID="s62"/>
    <Cell ss:StyleID="s62"/>
   </Row>
   <Row ss:AutoFitHeight="0">
    <Cell ss:StyleID="s63"><Data ss:Type="String">TT</Data></Cell>
    <Cell ss:StyleID="s63"><Data ss:Type="String">Tên thiết bị</Data></Cell>
    <Cell ss:StyleID="s63"><Data ss:Type="String">Tính năng kỹ thuật</Data></Cell>
    <Cell ss:StyleID="s63"><Data ss:Type="String">ĐVT</Data></Cell>
    <Cell ss:StyleID="s63"><Data ss:Type="String">Số lượng</Data></Cell>
    <Cell ss:StyleID="s63"><Data ss:Type="String">Ước đơn giá</Data></Cell>
    <Cell ss:StyleID="s63"><Data ss:Type="String">Thành tiền </Data></Cell>
    <Cell ss:StyleID="s63"><Data ss:Type="String">Thuyết minh nhu cầu sử dụng</Data></Cell>
   </Row>
    <?php
	$db=new database();			
					$db->setQuery('CREATE VIEW taisanmuasam AS SELECT a.MaTaiSan, a.TenTaiSan, a.TenDonViTinh, b.SoLuong, b.DonGiaMuaSam, b.ThuyetMinhSuDung, c.MaLoai, c.TenLoai FROM taisan a, thuockhms b, loaitaisan_thietbi c where a.MaLoai=c.MaLoai and a.MaTaiSan=b.MaTaiSan and b.MaKHMS="'.$_SESSION['makhms'].'"');			
					$result=$db->fetchAll();
					
				    $db->setQuery('CREATE VIEW dongia AS SELECT a.GiaTriThuocTinh, a.MaTaiSan  from cothuoctinh a, thuoctinh b where a.MaThuocTinh=b.MaThuocTinh and b.MaThuocTinh=7');
					$result=$db->fetchAll();
					
					$db->setQuery('CREATE VIEW tinhnang AS SELECT a.GiaTriThuocTinh, a.MaTaiSan  from cothuoctinh a, thuoctinh b where a.MaThuocTinh=b.MaThuocTinh and b.MaThuocTinh=8');
					$result=$db->fetchAll();
					
					$db->setQuery('CREATE VIEW taisanthuockehoachmuasam AS SELECT taisanmuasam.MaTaiSan, taisanmuasam.TenTaiSan, taisanmuasam.TenDonViTinh, taisanmuasam.SoLuong, dongia.GiaTriThuocTinh, taisanmuasam.ThuyetMinhSuDung, taisanmuasam.MaLoai, taisanmuasam.TenLoai from taisanmuasam LEFT JOIN dongia
ON taisanmuasam.MaTaiSan=dongia.MaTaiSan');
					$result=$db->fetchAll();
					
					$db->setQuery('SELECT taisanthuockehoachmuasam.MaTaiSan, taisanthuockehoachmuasam.TenTaiSan, tinhnang.GiaTriThuocTinh as TinhNangKT, taisanthuockehoachmuasam.TenDonViTinh, taisanthuockehoachmuasam.SoLuong, taisanthuockehoachmuasam.GiaTriThuocTinh as DonGia, taisanthuockehoachmuasam.ThuyetMinhSuDung, taisanthuockehoachmuasam.MaLoai, taisanthuockehoachmuasam.TenLoai from taisanthuockehoachmuasam LEFT JOIN tinhnang
ON taisanthuockehoachmuasam.MaTaiSan=tinhnang.MaTaiSan');
					$result=$db->fetchAll();
	
					$stt = 0;
					while($row = mysql_fetch_array($result))
					{
					$stt+=1;
					echo '
						<Row ss:AutoFitHeight="0">
						<Cell ss:StyleID="s64"><Data ss:Type="Number">'.$stt.'</Data></Cell>
						<Cell ss:StyleID="s64"><Data ss:Type="String">'.$row[1].'</Data></Cell>
						<Cell ss:StyleID="s64"><Data ss:Type="String">'.$row[2].'</Data></Cell>
						<Cell ss:StyleID="s64"><Data ss:Type="String">'.$row[3].'</Data></Cell>
						<Cell ss:StyleID="s64"><Data ss:Type="Number">'.$row[4].'</Data></Cell>
						<Cell ss:StyleID="s64"><Data ss:Type="Number">'.$row[5].'</Data></Cell>
						<Cell ss:StyleID="s64"><Data ss:Type="Number">'.$row[4]*$row[5].'</Data></Cell>
						<Cell ss:StyleID="s64"><Data ss:Type="String">'.$row[6].'</Data></Cell>
					   </Row>';
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
  
   <Row ss:AutoFitHeight="0">
    <Cell ss:Index="7" ss:MergeAcross="1" ss:StyleID="s77"><Data ss:Type="String">Cần thơ, ngày 15 tháng 01 năm 2011</Data></Cell>
   </Row>
   <Row ss:AutoFitHeight="0">
    <Cell ss:MergeAcross="2" ss:StyleID="s62"><Data ss:Type="String">Trưởng Khoa </Data></Cell>
    <Cell ss:MergeAcross="2" ss:StyleID="s62"><Data ss:Type="String">Trưởng Bộ môn</Data></Cell>
    <Cell ss:MergeAcross="1" ss:StyleID="s62"><Data ss:Type="String">Người lập</Data></Cell>
   </Row>
  </Table>
  <WorksheetOptions xmlns="urn:schemas-microsoft-com:office:excel">
   <PageSetup>
    <Header x:Margin="0.3"/>
    <Footer x:Margin="0.3"/>
    <PageMargins x:Bottom="0.75" x:Left="0.7" x:Right="0.7" x:Top="0.75"/>
   </PageSetup>
   <Unsynced/>
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
     <ActiveRow>3</ActiveRow>
     <RangeSelection>R4C1:R4C8</RangeSelection>
    </Pane>
   </Panes>
   <ProtectObjects>False</ProtectObjects>
   <ProtectScenarios>False</ProtectScenarios>
  </WorksheetOptions>
 </Worksheet>
 <Worksheet ss:Name="Sheet2">
  <Table ss:ExpandedColumnCount="1" ss:ExpandedRowCount="1" x:FullColumns="1"
   x:FullRows="1" ss:DefaultRowHeight="15">
   <Row ss:AutoFitHeight="0"/>
  </Table>
  <WorksheetOptions xmlns="urn:schemas-microsoft-com:office:excel">
   <PageSetup>
    <Header x:Margin="0.3"/>
    <Footer x:Margin="0.3"/>
    <PageMargins x:Bottom="0.75" x:Left="0.7" x:Right="0.7" x:Top="0.75"/>
   </PageSetup>
   <Unsynced/>
   <ProtectObjects>False</ProtectObjects>
   <ProtectScenarios>False</ProtectScenarios>
  </WorksheetOptions>
 </Worksheet>
 <Worksheet ss:Name="Sheet3">
  <Table ss:ExpandedColumnCount="1" ss:ExpandedRowCount="1" x:FullColumns="1"
   x:FullRows="1" ss:DefaultRowHeight="15">
   <Row ss:AutoFitHeight="0"/>
  </Table>
  <WorksheetOptions xmlns="urn:schemas-microsoft-com:office:excel">
   <PageSetup>
    <Header x:Margin="0.3"/>
    <Footer x:Margin="0.3"/>
    <PageMargins x:Bottom="0.75" x:Left="0.7" x:Right="0.7" x:Top="0.75"/>
   </PageSetup>
   <Unsynced/>
   <ProtectObjects>False</ProtectObjects>
   <ProtectScenarios>False</ProtectScenarios>
  </WorksheetOptions>
 </Worksheet>
</Workbook>