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
//include_once('Thuc Tap Thuc te/bieu mau/database.php');
?>
<Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet"
 xmlns:o="urn:schemas-microsoft-com:office:office"
 xmlns:x="urn:schemas-microsoft-com:office:excel"
 xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet"
 xmlns:html="http://www.w3.org/TR/REC-html40">
 <DocumentProperties xmlns="urn:schemas-microsoft-com:office:office">
  <Author>LamTay</Author>
  <LastAuthor>LamTay</LastAuthor>
  <LastPrinted>2011-04-14T15:02:08Z</LastPrinted>
  <Created>2006-02-21T09:12:32Z</Created>
  <LastSaved>2012-06-25T16:10:24Z</LastSaved>
  <Company>ctu</Company>
  <Version>14.00</Version>
 </DocumentProperties>
 <OfficeDocumentSettings xmlns="urn:schemas-microsoft-com:office:office">
  <AllowPNG/>
 </OfficeDocumentSettings>
 <ExcelWorkbook xmlns="urn:schemas-microsoft-com:office:excel">
  <WindowHeight>9360</WindowHeight>
  <WindowWidth>15480</WindowWidth>
  <WindowTopX>-90</WindowTopX>
  <WindowTopY>-375</WindowTopY>
  <ActiveSheet>1</ActiveSheet>
  <ProtectStructure>False</ProtectStructure>
  <ProtectWindows>False</ProtectWindows>
 </ExcelWorkbook>
 <Styles>
  <Style ss:ID="Default" ss:Name="Normal">
   <Alignment ss:Vertical="Bottom"/>
   <Borders/>
   <Font ss:FontName="Arial"/>
   <Interior/>
   <NumberFormat/>
   <Protection/>
  </Style>
  <Style ss:ID="s43" ss:Name="Comma">
   <NumberFormat ss:Format="_(* #,##0.00_);_(* \(#,##0.00\);_(* &quot;-&quot;??_);_(@_)"/>
  </Style>
  <Style ss:ID="s58" ss:Name="Normal_Sheet1">
   <Alignment ss:Vertical="Bottom"/>
   <Borders/>
   <Font ss:FontName="Times New Roman" ss:Size="12"/>
   <Interior/>
   <NumberFormat/>
   <Protection/>
  </Style>
  <Style ss:ID="s65">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#000080"/>
  </Style>
  <Style ss:ID="s66">
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#000080"/>
  </Style>
  <Style ss:ID="s67">
   <Font ss:FontName="Arial" ss:Size="12"/>
  </Style>
  <Style ss:ID="s68">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#000080" ss:Underline="Single"/>
  </Style>
  <Style ss:ID="s69">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#000080" ss:Bold="1"/>
  </Style>
  <Style ss:ID="s70">
   <Alignment ss:Horizontal="Right" ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#000080" ss:Bold="1"/>
  </Style>
  <Style ss:ID="s71">
   <Alignment ss:Horizontal="Left" ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#000080" ss:Bold="1"/>
  </Style>
  <Style ss:ID="s72">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Top" ss:LineStyle="Continuous"/>
   </Borders>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#000080"/>
  </Style>
  <Style ss:ID="s73">
   <Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Top" ss:LineStyle="Continuous"/>
   </Borders>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#000080"/>
  </Style>
  <Style ss:ID="s74" ss:Parent="s43">
   <Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Top" ss:LineStyle="Continuous"/>
   </Borders>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#000080"/>
   <NumberFormat ss:Format="_(* #,##0_);_(* \(#,##0\);_(* &quot;-&quot;??_);_(@_)"/>
  </Style>
  <Style ss:ID="s75">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
   </Borders>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#000080"/>
  </Style>
  <Style ss:ID="s76">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
   </Borders>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#000080" ss:Bold="1"/>
  </Style>
  <Style ss:ID="s77">
   <Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
   </Borders>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#000080"/>
  </Style>
  <Style ss:ID="s78" ss:Parent="s43">
   <Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
   </Borders>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#000080" ss:Bold="1"/>
   <NumberFormat ss:Format="_(* #,##0_);_(* \(#,##0\);_(* &quot;-&quot;??_);_(@_)"/>
  </Style>
  <Style ss:ID="s79">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Borders>
    <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
   </Borders>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#000080"/>
  </Style>
  <Style ss:ID="s80">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Borders/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#000080" ss:Bold="1" ss:Italic="1"/>
  </Style>
  <Style ss:ID="s81">
   <Alignment ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#000080"/>
  </Style>
  <Style ss:ID="s82">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Borders/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#000080" ss:Italic="1"/>
  </Style>
  <Style ss:ID="s83">
   <Alignment ss:Horizontal="Left" ss:Vertical="Bottom"/>
   <Borders/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#000080" ss:Bold="1"/>
   <Interior/>
  </Style>
  <Style ss:ID="s84">
   <Alignment ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#000080" ss:Bold="1"/>
  </Style>
  <Style ss:ID="s85">
   <Alignment ss:Horizontal="Left" ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#000080"/>
  </Style>
  <Style ss:ID="s86">
   <Alignment ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#000080" ss:Italic="1"/>
  </Style>
  <Style ss:ID="s87">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
   </Borders>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#000080" ss:Bold="1"/>
   <Interior/>
  </Style>
  <Style ss:ID="s88">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
   </Borders>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#000080" ss:Bold="1"/>
   <Interior/>
  </Style>
  <Style ss:ID="s89">
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"/>
  </Style>
  <Style ss:ID="s90">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
   </Borders>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Bold="1"/>
  </Style>
  <Style ss:ID="s91">
   <Alignment ss:Horizontal="Right" ss:Vertical="Bottom"/>
   <Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
   </Borders>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="11"/>
  </Style>
  <Style ss:ID="s92" ss:Parent="s58">
   <Alignment ss:Vertical="Center" ss:WrapText="1"/>
   <Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
   </Borders>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="11"/>
   <Interior/>
  </Style>
  <Style ss:ID="s93" ss:Parent="s58">
   <Alignment ss:Horizontal="Center" ss:Vertical="Center" ss:WrapText="1"/>
   <Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
   </Borders>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="11"/>
   <Interior/>
  </Style>
  <Style ss:ID="s94">
   <Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
   </Borders>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="11"/>
  </Style>
  <Style ss:ID="s95">
   <Alignment ss:Vertical="Center"/>
   <Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
   </Borders>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="11"/>
   <Interior/>
   <NumberFormat ss:Format="#,##0;[Red]#,##0"/>
  </Style>
  <Style ss:ID="s96" ss:Parent="s43">
   <Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
   </Borders>
   <Font ss:FontName="Times New Roman" x:Family="Roman"/>
   <NumberFormat ss:Format="_-* #,##0\ _€_-;\-* #,##0\ _€_-;_-* &quot;-&quot;??\ _€_-;_-@_-"/>
  </Style>
  <Style ss:ID="s97">
   <Alignment ss:Horizontal="Right" ss:Vertical="Bottom"/>
   <Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
   </Borders>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="11" ss:Bold="1"/>
   <NumberFormat ss:Format="_-* #,##0\ _€_-;\-* #,##0\ _€_-;_-* &quot;-&quot;??\ _€_-;_-@_-"/>
  </Style>
  <Style ss:ID="s98">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="11"
    ss:Color="#000080"/>
  </Style>
  <Style ss:ID="s99">
   <Alignment ss:Horizontal="Left" ss:Vertical="Bottom"/>
   <Borders/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="11"
    ss:Color="#000080" ss:Bold="1"/>
   <Interior/>
  </Style>
  <Style ss:ID="s100">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="11"
    ss:Color="#000080" ss:Bold="1"/>
  </Style>
  <Style ss:ID="s101">
   <Alignment ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="11"
    ss:Color="#000080" ss:Bold="1"/>
  </Style>
  <Style ss:ID="s102">
   <Font ss:FontName="Times New Roman" x:Family="Roman"/>
  </Style>
  <Style ss:ID="s104">
   <Alignment ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12" ss:Bold="1"/>
  </Style>
  <Style ss:ID="s105">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Borders>
    <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
   </Borders>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"/>
  </Style>
  <Style ss:ID="s106">
   <Alignment ss:Vertical="Center"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="13"/>
   <Interior/>
  </Style>
  <Style ss:ID="s119">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Borders/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#000080" ss:Bold="1"/>
   <Interior/>
  </Style>
  <Style ss:ID="s121">
   <Alignment ss:Horizontal="Right" ss:Vertical="Bottom"/>
   <Borders>
    <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
   </Borders>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#000080" ss:Bold="1" ss:Italic="1"/>
  </Style>
  <Style ss:ID="s122">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:CharSet="163" x:Family="Roman"
    ss:Size="12" ss:Color="#000080" ss:Italic="1"/>
  </Style>
  <Style ss:ID="s126">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
    <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
   </Borders>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="11" ss:Bold="1"/>
  </Style>
  <Style ss:ID="s127">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Font ss:FontName="Arial" x:CharSet="163" x:Family="Swiss" ss:Italic="1"/>
  </Style>
  <Style ss:ID="s128">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#000080" ss:Italic="1"/>
  </Style>
  <Style ss:ID="s129">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Borders/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="11"
    ss:Color="#000080" ss:Bold="1"/>
   <Interior/>
  </Style>
  <Style ss:ID="s130">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"/>
  </Style>
  <Style ss:ID="s131">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12" ss:Bold="1"
    ss:Underline="Single"/>
  </Style>
  <Style ss:ID="s132">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12" ss:Bold="1"/>
  </Style>
 </Styles>
 <Worksheet ss:Name="GIAY">
  <Table ss:ExpandedColumnCount="15" ss:ExpandedRowCount="24" x:FullColumns="1"
   x:FullRows="1" ss:StyleID="s67" ss:DefaultRowHeight="15">
   <Column ss:StyleID="s67" ss:AutoFitWidth="0" ss:Width="26.25"/>
   <Column ss:StyleID="s67" ss:AutoFitWidth="0" ss:Width="178.5"/>
   <Column ss:Index="4" ss:StyleID="s67" ss:AutoFitWidth="0" ss:Width="37.5"/>
   <Column ss:StyleID="s67" ss:AutoFitWidth="0" ss:Width="73.5"/>
   <Column ss:StyleID="s67" ss:AutoFitWidth="0" ss:Width="75"/>
   <Column ss:StyleID="s67" ss:AutoFitWidth="0" ss:Width="33"/>
   <Column ss:StyleID="s67" ss:AutoFitWidth="0" ss:Width="21.75"/>
   <Column ss:StyleID="s67" ss:Hidden="1" ss:AutoFitWidth="0" ss:Width="21.75"/>
   <Column ss:StyleID="s67" ss:AutoFitWidth="0" ss:Width="21.75"/>
   <Column ss:StyleID="s67" ss:AutoFitWidth="0" ss:Width="21" ss:Span="1"/>
   <Column ss:Index="13" ss:StyleID="s67" ss:AutoFitWidth="0" ss:Width="20.25"/>
   <Column ss:StyleID="s67" ss:AutoFitWidth="0" ss:Width="24"/>
   <Column ss:StyleID="s67" ss:AutoFitWidth="0" ss:Width="18.75"/>
   <Row ss:Height="15.75">
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s66"/>
    <Cell ss:StyleID="s66"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s66"/>
    <Cell ss:StyleID="s66"/>
    <Cell ss:StyleID="s66"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
   </Row>
   <Row ss:Height="15.75">
    <Cell ss:MergeAcross="1" ss:StyleID="s65"><Data ss:Type="String">TRƯỜNG ĐẠI HỌC CẦN THƠ</Data></Cell>
    <Cell ss:MergeAcross="3" ss:StyleID="s65"><Data ss:Type="String">CỘNG HOÀ XÃ HỘI CHỦ NGHĨA VIỆT NAM</Data></Cell>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
   </Row>
   <Row ss:Height="15.75">
    <Cell ss:MergeAcross="1" ss:StyleID="s65"><Data ss:Type="String">KHOA CNTT &amp; TT</Data></Cell>
    <Cell ss:MergeAcross="3" ss:StyleID="s68"><Data ss:Type="String">Độc lập - Tự do - Hạnh phúc</Data></Cell>
    <Cell ss:StyleID="s68"/>
    <Cell ss:StyleID="s68"/>
    <Cell ss:StyleID="s68"/>
    <Cell ss:StyleID="s68"/>
    <Cell ss:StyleID="s68"/>
    <Cell ss:StyleID="s68"/>
    <Cell ss:StyleID="s68"/>
   </Row>
   <Row ss:AutoFitHeight="0" ss:Height="16.5">
    <Cell ss:MergeAcross="1" ss:StyleID="s65"><Data ss:Type="String">Bộ môn: Hệ thống thông tin</Data></Cell>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
   </Row>
   <Row ss:AutoFitHeight="0" ss:Height="15.75">
    <Cell ss:MergeAcross="1" ss:StyleID="s65"><Data ss:Type="String" x:Ticked="1">(V/v: Dự trù giấy Quý III)</Data></Cell>
    <Cell ss:StyleID="s81"/>
    <Cell ss:StyleID="s69"/>
    <Cell ss:StyleID="s69"/>
    <Cell ss:StyleID="s69"/>
    <Cell ss:StyleID="s66"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
   </Row>
   <Row ss:AutoFitHeight="0" ss:Height="15.75">
    <Cell ss:StyleID="s85"/>
    <Cell ss:StyleID="s85"/>
    <Cell ss:StyleID="s85"/>
    <Cell ss:StyleID="s69"/>
    <Cell ss:StyleID="s69"/>
    <Cell ss:StyleID="s69"/>
    <Cell ss:StyleID="s66"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
   </Row>
   <Row ss:Height="15.75">
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s70"><Data ss:Type="String">Kính gởi</Data></Cell>
    <Cell ss:MergeAcross="2" ss:StyleID="s71"><Data ss:Type="String">PHÒNG TÀI VỤ</Data></Cell>
    <Cell ss:StyleID="s69"/>
    <Cell ss:StyleID="s66"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
   </Row>
   <Row ss:Height="15.75">
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:MergeAcross="3" ss:StyleID="s71"><Data ss:Type="String">PHÒNG QUẢN TRỊ - THIẾT BỊ</Data></Cell>
    <Cell ss:StyleID="s66"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
   </Row>
   <Row ss:Height="15.75">
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:MergeAcross="3" ss:StyleID="s71"><Data ss:Type="String">TRƯỜNG ĐẠI HỌC CẦN THƠ</Data></Cell>
    <Cell ss:StyleID="s66"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
   </Row>
   <Row ss:AutoFitHeight="0" ss:Height="6"/>
   <Row ss:Height="15.75">
    <Cell ss:StyleID="s87"><Data ss:Type="String">TT</Data></Cell>
    <Cell ss:StyleID="s88"><Data ss:Type="String">CHỦNG LOẠI</Data></Cell>
    <Cell ss:StyleID="s88"><Data ss:Type="String">ĐVT</Data></Cell>
    <Cell ss:StyleID="s88"><Data ss:Type="String">SL</Data></Cell>
    <Cell ss:StyleID="s88"><Data ss:Type="String">Đ.GIÁ</Data></Cell>
    <Cell ss:StyleID="s88"><Data ss:Type="String">T TIỀN</Data></Cell>
    <Cell ss:StyleID="s69"/>
   </Row>
   <Row ss:Height="15.75">
    <Cell ss:StyleID="s72"><Data ss:Type="Number">1</Data></Cell>
    <Cell ss:StyleID="s73"><Data ss:Type="String">Giấy A4 (70gr/m2)  - Super Me</Data></Cell>
    <Cell ss:StyleID="s72"><Data ss:Type="String">ram</Data></Cell>
    <Cell ss:StyleID="s72"><Data ss:Type="Number">5</Data></Cell>
    <Cell ss:StyleID="s74"><Data ss:Type="Number">63000</Data></Cell>
    <Cell ss:StyleID="s74" ss:Formula="=RC[-2]*RC[-1]"><Data ss:Type="Number">315000</Data></Cell>
    <Cell ss:StyleID="s66"/>
   </Row>
   <Row ss:Height="15.75">
    <Cell ss:StyleID="s75"/>
    <Cell ss:StyleID="s76"><Data ss:Type="String">Tổng cộng</Data></Cell>
    <Cell ss:StyleID="s77"/>
    <Cell ss:StyleID="s75"/>
    <Cell ss:StyleID="s77"/>
    <Cell ss:StyleID="s78" ss:Formula="=SUM(R[-1]C:R[-1]C)"><Data ss:Type="Number">315000</Data></Cell>
    <Cell ss:StyleID="s66"/>
    <Cell ss:StyleID="s66"/>
    <Cell ss:StyleID="s66"/>
    <Cell ss:StyleID="s66"/>
   </Row>
   <Row ss:Height="15.75">
    <Cell ss:StyleID="s79"/>
    <Cell ss:MergeAcross="4" ss:StyleID="s121"/>
    <Cell ss:StyleID="s80"/>
    <Cell ss:StyleID="s80"/>
    <Cell ss:StyleID="s80"/>
    <Cell ss:StyleID="s80"/>
   </Row>
   <Row ss:AutoFitHeight="0" ss:Height="13.5">
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s81"/>
    <Cell ss:Index="4" ss:StyleID="s86"><Data ss:Type="String">Cần Thơ, ngày 06 tháng 08 năm 2011</Data></Cell>
    <Cell ss:Index="6" ss:StyleID="s86"/>
    <Cell ss:StyleID="s86"/>
    <Cell ss:StyleID="s86"/>
    <Cell ss:StyleID="s69"/>
    <Cell ss:StyleID="s82"/>
   </Row>
   <Row ss:Height="15.75">
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s83"><Data ss:Type="String">Trưởng Khoa                                        </Data></Cell>
    <Cell ss:MergeAcross="2" ss:StyleID="s119"><Data ss:Type="String">Duyệt của Bộ môn</Data></Cell>
    <Cell ss:MergeAcross="1" ss:StyleID="s69"><Data ss:Type="String">Người lập bảng </Data></Cell>
    <Cell ss:StyleID="s84"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
   </Row>
   <Row ss:Height="15.75">
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s69"/>
    <Cell ss:StyleID="s69"/>
    <Cell ss:StyleID="s84"/>
    <Cell ss:StyleID="s81"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
   </Row>
   <Row ss:Height="15.75">
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s69"/>
    <Cell ss:StyleID="s69"/>
    <Cell ss:StyleID="s84"/>
    <Cell ss:StyleID="s81"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
   </Row>
   <Row ss:Height="15.75">
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s69"/>
    <Cell ss:StyleID="s69"/>
    <Cell ss:Index="8" ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
   </Row>
   <Row ss:Height="15.75">
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:MergeAcross="2" ss:StyleID="s69"/>
    <Cell ss:MergeAcross="1" ss:StyleID="s122"><Data ss:Type="String">Nguyễn Thanh Hải</Data></Cell>
    <Cell ss:StyleID="s104"/>
   </Row>
   <Row ss:Height="15.75">
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s71"/>
    <Cell ss:Index="4" ss:StyleID="s69"/>
    <Cell ss:MergeAcross="4" ss:StyleID="s69"/>
    <Cell ss:StyleID="s69"/>
   </Row>
   <Row ss:Height="15.75">
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s81"/>
    <Cell ss:StyleID="s81"/>
    <Cell ss:StyleID="s66"/>
    <Cell ss:StyleID="s81"/>
    <Cell ss:StyleID="s81"/>
    <Cell ss:StyleID="s81"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
   </Row>
   <Row ss:Height="15.75">
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s81"/>
    <Cell ss:StyleID="s81"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s81"/>
    <Cell ss:StyleID="s81"/>
    <Cell ss:StyleID="s81"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s65"/>
   </Row>
   <Row ss:Height="15.75">
    <Cell ss:MergeAcross="5" ss:StyleID="s119"><Data ss:Type="String">Phòng Quản trị - Thiết bị</Data></Cell>
   </Row>
  </Table>
  <WorksheetOptions xmlns="urn:schemas-microsoft-com:office:excel">
   <PageSetup>
    <Layout x:CenterHorizontal="1"/>
    <Header x:Margin="0.51181102362204722"/>
    <Footer x:Margin="0.51181102362204722"/>
    <PageMargins x:Bottom="0.98425196850393704" x:Left="0.31496062992125984"
     x:Right="0.31496062992125984" x:Top="0.98425196850393704"/>
   </PageSetup>
   <Print>
    <ValidPrinterInfo/>
    <PaperSizeIndex>9</PaperSizeIndex>
    <HorizontalResolution>600</HorizontalResolution>
    <VerticalResolution>600</VerticalResolution>
   </Print>
   <Panes>
    <Pane>
     <Number>3</Number>
     <ActiveRow>12</ActiveRow>
     <ActiveCol>3</ActiveCol>
    </Pane>
   </Panes>
   <ProtectObjects>False</ProtectObjects>
   <ProtectScenarios>False</ProtectScenarios>
  </WorksheetOptions>
 </Worksheet>
 <Worksheet ss:Name="KHAC">
  <Table ss:ExpandedColumnCount="6" ss:ExpandedRowCount="26" x:FullColumns="1"
   x:FullRows="1">
   <Column ss:AutoFitWidth="0" ss:Width="26.25"/>
   <Column ss:AutoFitWidth="0" ss:Width="216.75"/>
   <Column ss:AutoFitWidth="0" ss:Width="54.75"/>
   <Column ss:AutoFitWidth="0" ss:Width="61.5"/>
   <Column ss:AutoFitWidth="0" ss:Width="60.75"/>
   <Column ss:AutoFitWidth="0" ss:Width="87.75"/>
   <Row ss:Height="15.75">
    <Cell ss:MergeAcross="1" ss:StyleID="s130"><Data ss:Type="String">TRƯỜNG ĐẠI HỌC CẦN THƠ</Data></Cell>
    <Cell ss:MergeAcross="3" ss:StyleID="s130"><Data ss:Type="String">CỘNG HOÀ XÃ HỘI CHỦ NGHĨA VIỆT NAM</Data></Cell>
   </Row>
   <Row ss:Height="15.75">
    <Cell ss:MergeAcross="1" ss:StyleID="s132"><Data ss:Type="String">KHOA CNTT &amp; TT</Data></Cell>
    <Cell ss:MergeAcross="3" ss:StyleID="s131"><Data ss:Type="String">Độc lập - Tự do - Hạnh phúc</Data></Cell>
   </Row>
   <Row ss:Height="15.75">
    <Cell ss:MergeAcross="1" ss:StyleID="s130"><Data ss:Type="String">Bộ môn: Hệ thống thông tin</Data></Cell>
    <Cell ss:StyleID="s89"/>
    <Cell ss:StyleID="s89"/>
    <Cell ss:StyleID="s89"/>
    <Cell ss:StyleID="s89"/>
   </Row>
   <Row ss:Height="15.75">
    <Cell ss:MergeAcross="1" ss:StyleID="s132"><Data ss:Type="String">Dự trù văn phòng phẩm quý III-2011</Data></Cell>
    <Cell ss:Index="4" ss:StyleID="s89"/>
    <Cell ss:StyleID="s89"/>
    <Cell ss:StyleID="s89"/>
   </Row>
   <Row ss:Height="15.75">
    <Cell ss:StyleID="s89"/>
    <Cell ss:StyleID="s89"/>
    <Cell ss:Index="4" ss:StyleID="s89"/>
    <Cell ss:StyleID="s89"/>
    <Cell ss:StyleID="s89"/>
   </Row>
   <Row ss:Height="15.75">
    <Cell ss:StyleID="s89"/>
    <Cell ss:StyleID="s70"><Data ss:Type="String">Kính gởi</Data></Cell>
    <Cell ss:MergeAcross="2" ss:StyleID="s71"><Data ss:Type="String">PHÒNG TÀI VỤ</Data></Cell>
    <Cell ss:StyleID="s69"/>
   </Row>
   <Row ss:Height="15.75">
    <Cell ss:StyleID="s89"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:MergeAcross="3" ss:StyleID="s71"><Data ss:Type="String">KHOA CÔNG NGHỆ THÔNG TIN - TT</Data></Cell>
   </Row>
   <Row ss:Height="15.75">
    <Cell ss:StyleID="s89"/>
    <Cell ss:StyleID="s65"/>
    <Cell ss:MergeAcross="3" ss:StyleID="s71"><Data ss:Type="String">TRƯỜNG ĐẠI HỌC CẦN THƠ</Data></Cell>
   </Row>
   <Row ss:Index="10">
    <Cell ss:StyleID="s90"><Data ss:Type="String">STT</Data></Cell>
    <Cell ss:StyleID="s90"><Data ss:Type="String">Tên hàng hóa</Data></Cell>
    <Cell ss:StyleID="s90"><Data ss:Type="String">ĐVT</Data></Cell>
    <Cell ss:StyleID="s90"><Data ss:Type="String">Số lượng</Data></Cell>
    <Cell ss:StyleID="s90"><Data ss:Type="String">Đơn giá</Data></Cell>
    <Cell ss:StyleID="s90"><Data ss:Type="String">TTiền</Data></Cell>
   </Row>
   <Row ss:AutoFitHeight="0" ss:Height="13.5">
    <Cell ss:StyleID="s91"><Data ss:Type="Number">1</Data></Cell>
    <Cell ss:StyleID="s92"><Data ss:Type="String">Băng keo 2 mặt 5P xốp</Data></Cell>
    <Cell ss:StyleID="s93"><Data ss:Type="String">Cuộn</Data></Cell>
    <Cell ss:StyleID="s93"><Data ss:Type="Number">1</Data></Cell>
    <Cell ss:StyleID="s95"><Data ss:Type="Number">20000</Data></Cell>
    <Cell ss:StyleID="s96" ss:Formula="=+RC[-1]*RC[-2]"><Data ss:Type="Number">20000</Data></Cell>
   </Row>
   <Row ss:AutoFitHeight="0" ss:Height="13.5">
    <Cell ss:StyleID="s91"><Data ss:Type="Number">4</Data></Cell>
    <Cell ss:StyleID="s92"><Data ss:Type="String">Giấy note (3x3)</Data></Cell>
    <Cell ss:StyleID="s93"><Data ss:Type="String">Xấp</Data></Cell>
    <Cell ss:StyleID="s93"><Data ss:Type="Number">20</Data></Cell>
    <Cell ss:StyleID="s95"><Data ss:Type="Number">4500</Data></Cell>
    <Cell ss:StyleID="s96" ss:Formula="=+RC[-1]*RC[-2]"><Data ss:Type="Number">90000</Data></Cell>
   </Row>
   <Row ss:Height="15">
    <Cell ss:MergeAcross="1" ss:StyleID="s126"><Data ss:Type="String">Tổng cộng:</Data></Cell>
    <Cell ss:StyleID="s94"/>
    <Cell ss:StyleID="s94"/>
    <Cell ss:StyleID="s94"/>
    <Cell ss:StyleID="s97" ss:Formula="=SUM(R[-2]C:R[-1]C)"><Data ss:Type="Number">110000</Data></Cell>
   </Row>
   <Row ss:AutoFitHeight="0" ss:Height="13.5">
    <Cell ss:StyleID="s89"/>
    <Cell ss:StyleID="s89"/>
    <Cell ss:StyleID="s89"/>
    <Cell ss:StyleID="s89"/>
    <Cell ss:StyleID="s105"/>
    <Cell ss:StyleID="s105"/>
   </Row>
   <Row ss:AutoFitHeight="0" ss:Height="13.5">
    <Cell ss:StyleID="s65"/>
    <Cell ss:StyleID="s81"/>
    <Cell ss:StyleID="s67"/>
    <Cell ss:MergeAcross="2" ss:StyleID="s128"><Data ss:Type="String">Cần Thơ, ngày 06 tháng 08 năm 2011</Data></Cell>
   </Row>
   <Row ss:AutoFitHeight="0" ss:Height="13.5">
    <Cell ss:StyleID="s98"/>
    <Cell ss:StyleID="s99"><Data ss:Type="String">Trưởng Khoa                                        </Data></Cell>
    <Cell ss:MergeAcross="1" ss:StyleID="s129"><Data ss:Type="String">Duyệt của Bộ môn</Data></Cell>
    <Cell ss:MergeAcross="1" ss:StyleID="s129"><Data ss:Type="String">Người lập bảng </Data></Cell>
   </Row>
   <Row ss:AutoFitHeight="0" ss:Height="13.5">
    <Cell ss:StyleID="s98"/>
    <Cell ss:StyleID="s98"/>
    <Cell ss:StyleID="s98"/>
    <Cell ss:StyleID="s100"/>
    <Cell ss:StyleID="s100"/>
    <Cell ss:StyleID="s101"/>
   </Row>
   <Row ss:AutoFitHeight="0" ss:Height="13.5" ss:StyleID="s106">
    <Cell ss:StyleID="Default"/>
    <Cell ss:StyleID="Default"/>
    <Cell ss:StyleID="Default"/>
    <Cell ss:StyleID="Default"/>
    <Cell ss:StyleID="Default"/>
    <Cell ss:StyleID="Default"/>
   </Row>
   <Row ss:AutoFitHeight="0" ss:Height="13.5" ss:StyleID="s106">
    <Cell ss:StyleID="Default"/>
    <Cell ss:StyleID="Default"/>
    <Cell ss:StyleID="Default"/>
    <Cell ss:StyleID="Default"/>
    <Cell ss:StyleID="Default"/>
    <Cell ss:StyleID="Default"/>
   </Row>
   <Row ss:AutoFitHeight="0" ss:Height="13.5" ss:StyleID="s106">
    <Cell ss:StyleID="Default"/>
    <Cell ss:StyleID="Default"/>
    <Cell ss:StyleID="Default"/>
    <Cell ss:StyleID="Default"/>
    <Cell ss:MergeAcross="1" ss:StyleID="s127"><Data ss:Type="String">Nguyễn Thanh Hải</Data></Cell>
   </Row>
   <Row ss:AutoFitHeight="0" ss:Height="13.5" ss:StyleID="s106">
    <Cell ss:StyleID="Default"/>
    <Cell ss:StyleID="Default"/>
    <Cell ss:StyleID="Default"/>
    <Cell ss:StyleID="Default"/>
    <Cell ss:StyleID="Default"/>
    <Cell ss:StyleID="Default"/>
   </Row>
   <Row ss:AutoFitHeight="0" ss:Height="13.5" ss:StyleID="s106">
    <Cell ss:StyleID="Default"/>
    <Cell ss:StyleID="Default"/>
    <Cell ss:StyleID="Default"/>
    <Cell ss:StyleID="Default"/>
    <Cell ss:StyleID="Default"/>
    <Cell ss:StyleID="Default"/>
   </Row>
   <Row ss:AutoFitHeight="0" ss:Height="13.5" ss:StyleID="s106">
    <Cell ss:StyleID="Default"/>
    <Cell ss:StyleID="Default"/>
    <Cell ss:StyleID="Default"/>
    <Cell ss:StyleID="Default"/>
    <Cell ss:StyleID="Default"/>
    <Cell ss:StyleID="Default"/>
   </Row>
   <Row ss:Index="26" ss:StyleID="s102">
    <Cell ss:StyleID="Default"/>
    <Cell ss:StyleID="Default"/>
    <Cell ss:StyleID="Default"/>
    <Cell ss:StyleID="Default"/>
    <Cell ss:StyleID="Default"/>
    <Cell ss:StyleID="Default"/>
   </Row>
  </Table>
  <WorksheetOptions xmlns="urn:schemas-microsoft-com:office:excel">
   <PageSetup>
    <Layout x:CenterHorizontal="1"/>
    <Header x:Margin="0.23622047244094491"/>
    <Footer x:Margin="0.51181102362204722"/>
    <PageMargins x:Bottom="0.98425196850393704" x:Left="0.31496062992125984"
     x:Right="0.27559055118110237" x:Top="0.35433070866141736"/>
   </PageSetup>
   <Print>
    <ValidPrinterInfo/>
    <HorizontalResolution>600</HorizontalResolution>
    <VerticalResolution>600</VerticalResolution>
   </Print>
   <Selected/>
   <Panes>
    <Pane>
     <Number>3</Number>
     <ActiveRow>12</ActiveRow>
     <ActiveCol>4</ActiveCol>
    </Pane>
   </Panes>
   <ProtectObjects>False</ProtectObjects>
   <ProtectScenarios>False</ProtectScenarios>
  </WorksheetOptions>
  <Sorting xmlns="urn:schemas-microsoft-com:office:excel">
   <Sort>Tên hàng hóa</Sort>
  </Sorting>
 </Worksheet>
</Workbook>
