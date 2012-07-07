<?php
session_start();

$filename = "Export_VPP.xls";
header("Content-Type: application/xml; charset=UTF-8");

header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=$filename");
echo '<?xml version="1.0"?>
<?mso-application progid="Excel.Sheet"?>';
					include_once('../database.php');
					$db=new database();
 $sql='select tendv from donvi where msdv="'.$_SESSION['msdv'].'"';
 
 $db->setQuery($sql);
 $result=$db->fetchAll();
 while($row=mysql_fetch_array($result,MYSQL_NUM))
 $tendonvi=$row[0];
mysql_free_result($result);
?>
<Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet"
 xmlns:o="urn:schemas-microsoft-com:office:office"
 xmlns:x="urn:schemas-microsoft-com:office:excel"
 xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet"
 xmlns:html="http://www.w3.org/TR/REC-html40">
 <DocumentProperties xmlns="urn:schemas-microsoft-com:office:office">
  <Author>Computer</Author>
  <LastAuthor>Computer</LastAuthor>
  <Created>2012-07-06T07:03:05Z</Created>
  <LastSaved>2012-07-06T07:04:34Z</LastSaved>
  <Version>14.00</Version>
 </DocumentProperties>
 <OfficeDocumentSettings xmlns="urn:schemas-microsoft-com:office:office">
  <AllowPNG/>
 </OfficeDocumentSettings>
 <ExcelWorkbook xmlns="urn:schemas-microsoft-com:office:excel">
  <WindowHeight>9270</WindowHeight>
  <WindowWidth>18195</WindowWidth>
  <WindowTopX>480</WindowTopX>
  <WindowTopY>75</WindowTopY>
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
  <Style ss:ID="s45" ss:Name="Comma 2">
   <NumberFormat ss:Format="_(* #,##0.00_);_(* \(#,##0.00\);_(* &quot;-&quot;??_);_(@_)"/>
  </Style>
  <Style ss:ID="s57" ss:Name="Normal 2">
   <Alignment ss:Vertical="Bottom"/>
   <Borders/>
   <Font ss:FontName="Arial"/>
   <Interior/>
   <NumberFormat/>
   <Protection/>
  </Style>
  <Style ss:ID="s58" ss:Name="Normal_Sheet1">
   <Alignment ss:Vertical="Bottom"/>
   <Borders/>
   <Font ss:FontName="Times New Roman" ss:Size="12"/>
   <Interior/>
   <NumberFormat/>
   <Protection/>
  </Style>
  <Style ss:ID="m45474260" ss:Parent="s57">
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
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="11" ss:Bold="1"/>
  </Style>
  <Style ss:ID="s74" ss:Parent="s57">
   <Font ss:FontName="Arial" ss:Size="12"/>
  </Style>
  <Style ss:ID="s75" ss:Parent="s57">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#000080"/>
  </Style>
  <Style ss:ID="s76" ss:Parent="s57">
   <Alignment ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#000080"/>
  </Style>
  <Style ss:ID="s77" ss:Parent="s57">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#000080" ss:Bold="1"/>
  </Style>
  <Style ss:ID="s78" ss:Parent="s57">
   <Alignment ss:Horizontal="Right" ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#000080" ss:Bold="1"/>
  </Style>
  <Style ss:ID="s79" ss:Parent="s57">
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"/>
  </Style>
  <Style ss:ID="s80" ss:Parent="s57">
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
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Bold="1"/>
  </Style>
  <Style ss:ID="s81" ss:Parent="s57">
   <Alignment ss:Horizontal="Right" ss:Vertical="Bottom"/>
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
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="11"/>
  </Style>
  <Style ss:ID="s82" ss:Parent="s58">
   <Alignment ss:Vertical="Center" ss:WrapText="1"/>
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
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="11"/>
   <Interior/>
  </Style>
  <Style ss:ID="s83" ss:Parent="s58">
   <Alignment ss:Horizontal="Center" ss:Vertical="Center" ss:WrapText="1"/>
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
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="11"/>
   <Interior/>
  </Style>
  <Style ss:ID="s84" ss:Parent="s57">
   <Alignment ss:Vertical="Center"/>
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
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="11"/>
   <Interior/>
   <NumberFormat ss:Format="#,##0;[Red]#,##0"/>
  </Style>
  <Style ss:ID="s85" ss:Parent="s45">
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
   <Font ss:FontName="Times New Roman" x:Family="Roman"/>
   <NumberFormat ss:Format="_-* #,##0\ _€_-;\-* #,##0\ _€_-;_-* &quot;-&quot;??\ _€_-;_-@_-"/>
  </Style>
  <Style ss:ID="s86" ss:Parent="s57">
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
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="11"/>
  </Style>
  <Style ss:ID="s87" ss:Parent="s57">
   <Alignment ss:Horizontal="Right" ss:Vertical="Bottom"/>
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
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="11" ss:Bold="1"/>
   <NumberFormat ss:Format="_-* #,##0\ _€_-;\-* #,##0\ _€_-;_-* &quot;-&quot;??\ _€_-;_-@_-"/>
  </Style>
  <Style ss:ID="s88" ss:Parent="s57">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Borders>
    <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"
     ss:Color="#000000"/>
   </Borders>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"/>
  </Style>
  <Style ss:ID="s89" ss:Parent="s57">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="11"
    ss:Color="#000080"/>
  </Style>
  <Style ss:ID="s90" ss:Parent="s57">
   <Alignment ss:Horizontal="Left" ss:Vertical="Bottom"/>
   <Borders/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="11"
    ss:Color="#000080" ss:Bold="1"/>
   <Interior/>
  </Style>
  <Style ss:ID="s91" ss:Parent="s57">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Borders/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="11"
    ss:Color="#000080" ss:Bold="1"/>
   <Interior/>
  </Style>
  <Style ss:ID="s92" ss:Parent="s57">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"/>
  </Style>
  <Style ss:ID="s93" ss:Parent="s57">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12" ss:Bold="1"/>
  </Style>
  <Style ss:ID="s94" ss:Parent="s57">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12" ss:Bold="1"
    ss:Underline="Single"/>
  </Style>
  <Style ss:ID="s95" ss:Parent="s57">
   <Alignment ss:Horizontal="Left" ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#000080" ss:Bold="1"/>
  </Style>
  <Style ss:ID="s98" ss:Parent="s57">
   <Alignment ss:Horizontal="Right" ss:Vertical="Bottom"/>
   <Font ss:FontName="Times New Roman" x:Family="Roman" ss:Size="12"
    ss:Color="#000080" ss:Italic="1"/>
  </Style>
 </Styles>
 <Worksheet ss:Name="Sheet1">
  <Table ss:ExpandedColumnCount="6" x:FullColumns="1"
   x:FullRows="1" ss:DefaultRowHeight="15">
   <Column ss:AutoFitWidth="0" ss:Width="40.5"/>
   <Column ss:AutoFitWidth="0" ss:Width="179.25"/>
   <Column ss:Index="6" ss:AutoFitWidth="0" ss:Width="157.5"/>
   <Row ss:Height="15.75">
    <Cell ss:MergeAcross="1" ss:StyleID="s92"><Data ss:Type="String">TRƯỜNG ĐẠI HỌC CẦN THƠ</Data></Cell>
    <Cell ss:MergeAcross="3" ss:StyleID="s92"><Data ss:Type="String">CỘNG HOÀ XÃ HỘI CHỦ NGHĨA VIỆT NAM</Data></Cell>
   </Row>
   <Row ss:Height="15.75">
    <Cell ss:MergeAcross="1" ss:StyleID="s93"><Data ss:Type="String">KHOA CNTT &amp; TT</Data></Cell>
    <Cell ss:MergeAcross="3" ss:StyleID="s94"><Data ss:Type="String">Độc lập - Tự do - Hạnh phúc</Data></Cell>
   </Row>
   <Row ss:Height="15.75">
    <?php echo '<Cell ss:MergeAcross="1" ss:StyleID="s92"><Data ss:Type="String">Bộ môn: '.$tendonvi.'</Data></Cell>';
    ?>
    <Cell ss:StyleID="s79"/>
    <Cell ss:StyleID="s79"/>
    <Cell ss:StyleID="s79"/>
    <Cell ss:StyleID="s79"/>
   </Row>
   <Row ss:Height="15.75">
    <?php echo'<Cell ss:MergeAcross="1" ss:StyleID="s93"><Data ss:Type="String">Dự trù văn phòng phẩm quý '.$_POST['cbo_quyduyet'].'-'.$_POST['cbo_namduyet'].'</Data></Cell>';
	?>
    <Cell ss:StyleID="s57"/>
    <Cell ss:StyleID="s79"/>
    <Cell ss:StyleID="s79"/>
    <Cell ss:StyleID="s79"/>
   </Row>
   <Row ss:Height="15.75">
    <Cell ss:StyleID="s79"/>
    <Cell ss:StyleID="s79"/>
    <Cell ss:StyleID="s57"/>
    <Cell ss:StyleID="s79"/>
    <Cell ss:StyleID="s79"/>
    <Cell ss:StyleID="s79"/>
   </Row>
   <Row ss:Height="15.75">
    <Cell ss:StyleID="s79"/>
    <Cell ss:StyleID="s78"><Data ss:Type="String">Kính gởi</Data></Cell>
    <Cell ss:MergeAcross="2" ss:StyleID="s95"><Data ss:Type="String">PHÒNG TÀI VỤ</Data></Cell>
    <Cell ss:StyleID="s77"/>
   </Row>
   <Row ss:Height="15.75">
    <Cell ss:StyleID="s79"/>
    <Cell ss:StyleID="s75"/>
    <Cell ss:MergeAcross="3" ss:StyleID="s95"><Data ss:Type="String">KHOA CÔNG NGHỆ THÔNG TIN - TT</Data></Cell>
   </Row>
   <Row ss:Height="15.75">
    <Cell ss:StyleID="s79"/>
    <Cell ss:StyleID="s75"/>
    <Cell ss:MergeAcross="3" ss:StyleID="s95"><Data ss:Type="String">TRƯỜNG ĐẠI HỌC CẦN THƠ</Data></Cell>
   </Row>
   <Row ss:Index="10">
    <Cell ss:StyleID="s80"><Data ss:Type="String">STT</Data></Cell>
    <Cell ss:StyleID="s80"><Data ss:Type="String">Tên hàng hóa</Data></Cell>
    <Cell ss:StyleID="s80"><Data ss:Type="String">ĐVT</Data></Cell>
    <Cell ss:StyleID="s80"><Data ss:Type="String">Số lượng</Data></Cell>
    <Cell ss:StyleID="s80"><Data ss:Type="String">Đơn giá</Data></Cell>
    <Cell ss:StyleID="s80"><Data ss:Type="String">TTiền</Data></Cell>
   </Row>
	<?php
	$query = "select b.tenvpp,b.tendonvitinh,a.sl_vpp,a.dongia from covpp a, vanphongpham b where a.mavpp=b.mavpp and a.maphieudutoan='".$_POST['cbo_maphieuduyet']."'"; 
	$db->setQuery($query);
	$result2=$db->fetchAll();
	$stt=0;
	$thanhtien=0;
	while($row2=mysql_fetch_array($result2,MYSQL_NUM))
	{
	$stt++;
	$tien=$row2[2]*$row2[3];
	$thanhtien=$thanhtien+$tien;
  	echo '<Row ss:AutoFitHeight="0">
    <Cell ss:StyleID="s81"><Data ss:Type="Number">'.$stt.'</Data></Cell>
    <Cell ss:StyleID="s82"><Data ss:Type="String">'.$row2[0].'</Data></Cell>
    <Cell ss:StyleID="s83"><Data ss:Type="String">'.$row2[1].'</Data></Cell>
    <Cell ss:StyleID="s83"><Data ss:Type="Number">'.$row2[2].'</Data></Cell>
    <Cell ss:StyleID="s84"><Data ss:Type="Number">'.$row2[3].'</Data></Cell>
    <Cell ss:StyleID="s85"><Data ss:Type="Number">'.$row2[2]*$row2[3].'</Data></Cell>
   </Row>';
	}
   mysql_free_result($result2);
   
  echo '
  <Row>
    <Cell ss:MergeAcross="1" ss:StyleID="m45474260"><Data ss:Type="String">Tổng cộng:</Data></Cell>
    <Cell ss:StyleID="s86"/>
    <Cell ss:StyleID="s86"/>
    <Cell ss:StyleID="s86"/>
  	<Cell ss:StyleID="s87"><Data ss:Type="Number">'.$thanhtien.'</Data></Cell>
   </Row>
   ';
   ?>
   <Row ss:Height="15.75">
    <Cell ss:StyleID="s79"/>
    <Cell ss:StyleID="s79"/>
    <Cell ss:StyleID="s79"/>
    <Cell ss:StyleID="s79"/>
    <Cell ss:StyleID="s88"/>
    <Cell ss:StyleID="s88"/>
   </Row>
   <Row ss:Height="15.75">
    <Cell ss:StyleID="s75"/>
    <Cell ss:StyleID="s76"/>
    <Cell ss:StyleID="s74"/>
    <?php 
		$now = getdate();
		?>
    <Cell ss:MergeAcross="2" ss:StyleID="s98"><Data ss:Type="String">Cần Thơ, ngày...tháng...năm 20..</Data></Cell>
   </Row>
   <Row>
    <Cell ss:StyleID="s89"/>
    <Cell ss:StyleID="s90"><Data ss:Type="String">Trưởng Khoa                                        </Data></Cell>
    <Cell ss:MergeAcross="1" ss:StyleID="s91"><Data ss:Type="String">Duyệt của Bộ môn</Data></Cell>
    <Cell ss:MergeAcross="1" ss:StyleID="s91"><Data ss:Type="String">Người lập bảng </Data></Cell>
   </Row>
  </Table>
  <WorksheetOptions xmlns="urn:schemas-microsoft-com:office:excel">
   <PageSetup>
    <Header x:Margin="0.3"/>
    <Footer x:Margin="0.3"/>
    <PageMargins x:Bottom="0.75" x:Left="0.7" x:Right="0.7" x:Top="0.75"/>
   </PageSetup>
   <Selected/>
   <Panes>
    <Pane>
     <Number>3</Number>
     <ActiveRow>15</ActiveRow>
     <ActiveCol>1</ActiveCol>
    </Pane>
   </Panes>
   <ProtectObjects>False</ProtectObjects>
   <ProtectScenarios>False</ProtectScenarios>
  </WorksheetOptions>
 </Worksheet>
 <Worksheet ss:Name="Sheet2">
  <Table ss:ExpandedColumnCount="1" ss:ExpandedRowCount="1" x:FullColumns="1"
   x:FullRows="1" ss:DefaultRowHeight="15">
  </Table>
  <WorksheetOptions xmlns="urn:schemas-microsoft-com:office:excel">
   <PageSetup>
    <Header x:Margin="0.3"/>
    <Footer x:Margin="0.3"/>
    <PageMargins x:Bottom="0.75" x:Left="0.7" x:Right="0.7" x:Top="0.75"/>
   </PageSetup>
   <ProtectObjects>False</ProtectObjects>
   <ProtectScenarios>False</ProtectScenarios>
  </WorksheetOptions>
 </Worksheet>
 <Worksheet ss:Name="Sheet3">
  <Table ss:ExpandedColumnCount="1" ss:ExpandedRowCount="1" x:FullColumns="1"
   x:FullRows="1" ss:DefaultRowHeight="15">
  </Table>
  <WorksheetOptions xmlns="urn:schemas-microsoft-com:office:excel">
   <PageSetup>
    <Header x:Margin="0.3"/>
    <Footer x:Margin="0.3"/>
    <PageMargins x:Bottom="0.75" x:Left="0.7" x:Right="0.7" x:Top="0.75"/>
   </PageSetup>
   <ProtectObjects>False</ProtectObjects>
   <ProtectScenarios>False</ProtectScenarios>
  </WorksheetOptions>
 </Worksheet>
</Workbook>

