<?php
session_start();
$filename = "report".date('dmY-his').".xls";
header("Content-Type: application/xml; charset=UTF-8");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=$filename");
echo '<?xml version="1.0"?>
<?mso-application progid="Excel.Sheet"?>';
?>
<?php
include_once('database.php');
?>
<Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet"
 xmlns:o="urn:schemas-microsoft-com:office:office"
 xmlns:x="urn:schemas-microsoft-com:office:excel"
 xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet"
 xmlns:html="http://www.w3.org/TR/REC-html40">
 <DocumentProperties xmlns="urn:schemas-microsoft-com:office:office">
  <Author>Namlun12</Author>
  <LastAuthor>Namlun12</LastAuthor>
  <LastPrinted>2012-03-06T07:50:24Z</LastPrinted>
  <Created>2012-03-06T07:09:11Z</Created>
  <LastSaved>2012-03-07T21:47:41Z</LastSaved>
  <Version>14.00</Version>
 </DocumentProperties>
 <OfficeDocumentSettings xmlns="urn:schemas-microsoft-com:office:office">
  <AllowPNG/>
 </OfficeDocumentSettings>
 <ExcelWorkbook xmlns="urn:schemas-microsoft-com:office:excel">
  <WindowHeight>7950</WindowHeight>
  <WindowWidth>20115</WindowWidth>
  <WindowTopX>240</WindowTopX>
  <WindowTopY>90</WindowTopY>
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
  <Style ss:ID="s63">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom" ss:WrapText="1"/>
  </Style>
  <Style ss:ID="s64">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="13"
    ss:Color="#000000"/>
  </Style>
  <Style ss:ID="s67">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="13"
    ss:Color="#000000" ss:Bold="1"/>
  </Style>
  <Style ss:ID="s69">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#000000"/>
  </Style>
  <Style ss:ID="s72">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
  </Style>
  <Style ss:ID="s73">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
  </Style>
  <Style ss:ID="s75">
   <Alignment ss:Horizontal="Center" ss:Vertical="Center"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#000000" ss:Italic="1"/>
  </Style>
  <Style ss:ID="s77">
   <Alignment ss:Horizontal="Right" ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#000000" ss:Italic="1"/>
  </Style>
  <Style ss:ID="s79">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="15"
    ss:Color="#000000" ss:Bold="1" ss:Italic="1"/>
  </Style>
  <Style ss:ID="s81">
   <Alignment ss:Horizontal="Left" ss:Vertical="Center" ss:WrapText="1"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="13"
    ss:Color="#000000"/>
  </Style>
  <Style ss:ID="s82">
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
  <Style ss:ID="s83">
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
  <Style ss:ID="s84">
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
  <Style ss:ID="s86">
   <Alignment ss:Horizontal="Left" ss:Vertical="Bottom"/>
   <Borders>
    <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"
     ss:Color="#000000"/>
   </Borders>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="13"
    ss:Color="#000000" ss:Italic="1"/>
  </Style>
  <Style ss:ID="s87">
   <Alignment ss:Horizontal="Center" ss:Vertical="Center"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="13"
    ss:Color="#000000" ss:Bold="1"/>
  </Style>
  <Style ss:ID="s88">
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#000000"/>
  </Style>
  <Style ss:ID="s89">
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#000000" ss:Italic="1"/>
  </Style>
 </Styles>
 <Worksheet ss:Name="Sheet1">
  <Table ss:ExpandedColumnCount="5" x:FullColumns="1"
   x:FullRows="1" ss:DefaultRowHeight="15">
   <Column ss:AutoFitWidth="0" ss:Width="82.5"/>
   <Column ss:AutoFitWidth="0" ss:Width="196.5"/>
   <Column ss:AutoFitWidth="0" ss:Width="78.75"/>
   <Column ss:AutoFitWidth="0" ss:Width="195"/>
   <Column ss:AutoFitWidth="0" ss:Width="111.75"/>
   <Row ss:AutoFitHeight="0">
    <Cell ss:MergeDown="4" ss:StyleID="s63"/>
    <Cell ss:MergeAcross="1" ss:StyleID="s64"><Data ss:Type="String">HỘI SINH VIÊN VIỆT NAM TP CẦN THƠ</Data></Cell>
    <Cell ss:MergeAcross="1" ss:StyleID="s64"><Data ss:Type="String">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</Data></Cell>
   </Row>
   <Row ss:AutoFitHeight="0">
    <Cell ss:Index="2" ss:MergeAcross="1" ss:StyleID="s67"><Data ss:Type="String">BCH TRƯỜNG ĐẠI HỌC CẦN THƠ</Data></Cell>
    <Cell ss:MergeAcross="1" ss:StyleID="s69"><Data ss:Type="String">Độc lập – Tự do – Hạnh phúc</Data></Cell>
   </Row>
   <Row ss:AutoFitHeight="0">
    <Cell ss:Index="2" ss:MergeAcross="1" ss:StyleID="s72"><Data ss:Type="String"
      x:Ticked="1">&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;-</Data></Cell>
    <Cell ss:MergeAcross="1" ss:StyleID="s73"><Data ss:Type="String">&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;-</Data></Cell>
   </Row>
   <Row ss:AutoFitHeight="0">
    <Cell ss:Index="2" ss:MergeAcross="1" ss:StyleID="s69"><Data ss:Type="String">SỐ: …….</Data></Cell>
    <Cell ss:MergeAcross="1" ss:StyleID="s73"/>
   </Row>
   <Row ss:AutoFitHeight="0" ss:Height="22.5">
    <Cell ss:Index="2" ss:MergeAcross="1" ss:StyleID="s75"><Data ss:Type="String">(V/v giới thiệu hội viên tham gia hoạt động…
    <?php
if(isset($_SESSION['hocki_ten'])){
echo " học kì ".$_SESSION['hocki_ten'].",";
}
if(isset($_SESSION['namhoc_ten'])){
echo "năm học ".$_SESSION['namhoc_ten'];
	}
?>  
    )</Data></Cell>
    <Cell ss:MergeAcross="1" ss:StyleID="s77"><Data ss:Type="String">...., ngày<?php echo date(" d ") ?>tháng<?php echo date(" m ") ?>năm<?php echo date(" Y ") ?></Data></Cell>
   </Row>
   <Row ss:AutoFitHeight="0" ss:Height="21">
    <Cell ss:MergeAcross="4" ss:StyleID="s79"><Data ss:Type="String">Kính gửi: Ban chấp hành Đoàn các Khoa, Viện, Bộ môn</Data></Cell>
   </Row>
   <Row ss:AutoFitHeight="0">
    <Cell ss:MergeAcross="4" ss:StyleID="s73"/>
   </Row>
   <Row ss:AutoFitHeight="0" ss:Height="40.5">
    <Cell ss:MergeAcross="4" ss:StyleID="s81"><Data ss:Type="String">             Nhằm hỗ trợ Đoàn các đơn vị trong công tác ghi nhận, đánh giá hoạt động rèn luyện của sinh viên, Ban thư ký Hội&#10; sinh viên trường xin giới thiệu đến các đồng chí danh sách hội viên...
            <?php
if(isset($_SESSION['hocki_ten'])){
echo " học kì ".$_SESSION['hocki_ten'].",";
}
if(isset($_SESSION['namhoc_ten'])){
echo "năm học ".$_SESSION['namhoc_ten'];
	}
?>
 </Data></Cell>
   </Row>
   <Row ss:AutoFitHeight="0">
    <Cell ss:MergeAcross="4" ss:StyleID="s73"><Data ss:Type="String">&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;-</Data></Cell>
   </Row>
   <Row ss:AutoFitHeight="0">
    <Cell ss:MergeAcross="4" ss:StyleID="s67"><Data ss:Type="String">ĐƠN VỊ: 
        <?php
if(isset($_SESSION['lchsv_ten'])){
	if(isset($_SESSION['chsv_ten'])){
		echo "CHI HỘI SINH VIÊN ".$_SESSION['chsv_ten'];
	}
	else echo "LIÊN CHI HỘI SINH VIÊN ".$_SESSION['lchsv_ten'];
	} 
else echo "HỘI SINH VIÊN TRƯỜNG";
?>
    </Data></Cell>
   </Row>
   <Row ss:AutoFitHeight="0">
    <Cell ss:MergeAcross="4" ss:StyleID="s67"/>
   </Row>
   <Row ss:AutoFitHeight="0">
    <Cell ss:StyleID="s82"><Data ss:Type="String">STT</Data></Cell>
    <Cell ss:StyleID="s82"><Data ss:Type="String">HỌ TÊN</Data></Cell>
    <Cell ss:StyleID="s82"><Data ss:Type="String">MÃ SỐ</Data></Cell>
    <Cell ss:StyleID="s82"><Data ss:Type="String">LỚP</Data></Cell>
    <Cell ss:StyleID="s82"><Data ss:Type="String">GHI CHÚ</Data></Cell>
   </Row>
   <?php
$db = new database;
$sql = "
SELECT hoivien_hoten, hoivien_id, chuyennganh_ten, hoivien_khoahoc
FROM hoivien, namhoc, hocki, lchsv, chsv, chuyennganh
WHERE hoivien.hocki_id = hocki.hocki_id
and hocki.namhoc_id = namhoc.namhoc_id
and hoivien.chsv_id  = chsv.chsv_id
and chsv.lchsv_id = lchsv.lchsv_id
and hoivien.chuyennganh_id = chuyennganh.chuyennganh_id
and hoivien.hoivien_trangthai = 1 ";
if(isset($_SESSION['namhoc_id'])) $sql.=" and hocki.namhoc_id <= '".$_SESSION['namhoc_id']."' ";
if(isset($_SESSION['hocki_id'])) $sql.=" and hoivien.hocki_id <= '".$_SESSION['hocki_id']."' ";
if(isset($_SESSION['lchsv_id'])) $sql.=" and chsv.lchsv_id = '".$_SESSION['lchsv_id']."' ";
if(isset($_SESSION['chsv_id'])) $sql.=" and hoivien.chsv_id = '".$_SESSION['chsv_id']."' ";
$db->setQuery($sql);
$result = $db->fetchAll();
$stt = 0;
while($row = mysql_fetch_array($result))
{
$stt+=1;
echo '
   <Row ss:AutoFitHeight="0">
    <Cell ss:StyleID="s83"><Data ss:Type="Number">'.$stt.'</Data></Cell>
    <Cell ss:StyleID="s84"><Data ss:Type="String">'.$row[0].'</Data></Cell>
    <Cell ss:StyleID="s83"><Data ss:Type="String">'.$row[1].'</Data></Cell>
    <Cell ss:StyleID="s84"><Data ss:Type="String">'.$row[2].' - K'.$row[3].'</Data></Cell>
    <Cell ss:StyleID="s84"/>
   </Row>';
}
?>
   <Row ss:AutoFitHeight="0">
    <Cell ss:MergeAcross="4" ss:StyleID="s86"><Data ss:Type="String">Danh sách có <?=$stt?> hội viên</Data></Cell>
   </Row>
   <Row ss:AutoFitHeight="0">
    <Cell ss:Index="3" ss:StyleID="s87"/>
    <Cell ss:MergeAcross="1" ss:StyleID="s67"><Data ss:Type="String">TM. BAN THƯ KÝ HỘI SINH VIÊN</Data></Cell>
   </Row>
   <Row ss:AutoFitHeight="0">
    <Cell ss:Index="3" ss:StyleID="s87"/>
    <Cell ss:MergeAcross="1" ss:StyleID="s67"><Data ss:Type="String">TRƯỜNG ĐẠI HỌC CẦN THƠ</Data></Cell>
   </Row>
   <Row ss:AutoFitHeight="0">
    <Cell ss:Index="3" ss:StyleID="s87"/>
    <Cell ss:MergeAcross="1" ss:StyleID="s67"><Data ss:Type="String">PHÓ CHỦ TỊCH</Data></Cell>
   </Row>
   <Row ss:AutoFitHeight="0">
    <Cell ss:Index="3" ss:StyleID="s64"/>
    <Cell ss:MergeAcross="1" ss:StyleID="s64"><Data ss:Type="String">...................</Data></Cell>
   </Row>
   <Row ss:AutoFitHeight="0">
    <Cell ss:StyleID="s88"><Data ss:Type="String">Nơi nhận: </Data></Cell>
   </Row>
   <Row ss:AutoFitHeight="0">
    <Cell ss:StyleID="s89"><Data ss:Type="String">• Như kính gửi</Data></Cell>
   </Row>
   <Row ss:AutoFitHeight="0">
    <Cell ss:StyleID="s89"><Data ss:Type="String">• Lưu VP</Data></Cell>
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
   <SplitHorizontal>12</SplitHorizontal>
   <TopRowBottomPane>12</TopRowBottomPane>
   <ActivePane>2</ActivePane>
   <Panes>
    <Pane>
     <Number>3</Number>
    </Pane>
    <Pane>
     <Number>2</Number>
     <ActiveRow>10</ActiveRow>
     <ActiveCol>5</ActiveCol>
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
