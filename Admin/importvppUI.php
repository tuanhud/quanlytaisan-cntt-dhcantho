<?php
session_start();
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kết quả Import</title>
<link rel="stylesheet" href="../jqwidgets/styles/jqx.base.css" type="text/css" />
    <link rel="stylesheet" href="../jqwidgets/styles/jqx.classic.css" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxmenu.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxcheckbox.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxgrid.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxdata.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxgrid.selection.js"></script>
	<script type="text/javascript" src="../jqwidgets/jqxnumberinput.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxgrid.edit.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxgrid.pager.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxwindow.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxpanel.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxcalendar.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxnumberinput.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxdatetimeinput.js"></script>
    <script type="text/javascript" src="../jqwidgets/globalization/jquery.global.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="js/gettheme.js"></script>
    <script type="text/javascript" src="js/ajax.js"></script>
    <script type="text/javascript" src="js/fill.js"></script>

<script type="text/javascript" src="js/table_vpp.js"></script>
<script type="text/javascript">
$(document).ready(function() 
{ 
	taobangvpp();
})
</script>
</head>

<body>
	<?php	
	echo '<form id="importvpp" name="importvpp">';
	$numofSus = 0;
	$numofFai = 0;
	$message = '';
	$filename=$_FILES['file_import']['tmp_name'];
	include_once "../database.php"; //Ket noi den Database		
	/*--------------------------------------------
	/* Doc va hien thi file Excel
	/*------------------------------------------*/	
	echo "<br>File: ".$filename;
	require_once '../excel_reader2.php'; // Thu vien xu ly
	$data = new Spreadsheet_Excel_Reader($filename,true,"UTF-8"); // Đọc file excel, hỗ trợ Unicode UTF-8
	$rowsnum = $data->rowcount($sheet_index=$_POST['cbo_chonsheet']); // Số hàng của sheet
	$colsnum =  $data->colcount($sheet_index=$_POST['cbo_chonsheet']);  //Số cột của sheet
	
	echo "<br>Tổng số mẫu tin: " . $rowsnum;
	echo "<br>Số cột: "  .$colsnum."<br>" ;
	?>
    <table width="40%" bordercolor="#111111" cellspacing="0" cellpadding="0" align="left" border="0">             		
     <tbody>
     		  <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
              <tr>
					<td height="22" align="left" class="level_1_2" width="90">Loại văn phòng phẩm</td>
					<td width="300" align="left" class="level_1_2">
                  	<div  align="left" name="loaivpp" id="loaivpp" style="width:200" ></div>
                 </td>
              </tr>
              <tr>
					<td height="22" align="left" class="level_1_2">Tên văn phòng phẩm</td>
					<td align="left" class="level_1_2">
                    	<div align="left"  name="tenvpp" id="tenvpp" style="width:200"></div>
                    </td>
			  </tr>
              <tr>
					<td height="22" align="left"  class="level_1_2">Nhà sản xuất</td>
					<td align="left" class="level_1_2">
					 <div align="left" name="nsx" id="nsx" style="width:200"></div>					
					</td>
			  </tr>
              <tr>
					<td height="22" align="left"  class="level_1_1">Đơn vị tính </td>
					<td align="left"  class="level_1_1">
                    <div align="left"  name="donvitinh" id="donvitinh" style="width:200"></div>
                    </td>
			  </tr>
              <tr>
					<td height="22" align="left"  class="level_1_2">Đơn giá</td>
					<td align="left" class="level_1_2">
					 <div align="left"  name="dongia" id="dongia" style="width:200"></div>					
					</td>
			  </tr>
              <tr>
      
              		<td colspan="2" height="22" align="center" class="level_1_2" style="margin-top:20px;">
                     <input type="button" value="Xem lại dữ liệu" id="showWindowButton3" />
                    <input type="button" name="save3" id="save3" value="Lưu">
                    </td>
              </tr>
              </tbody>
              </table>
              <div style="visibility: hidden;" id='jqxWidget'>
                            <div style="margin-top: 80px;" id="jqxgrid"></div>
                            <div style="margin-top: 30px;">
                                <div id="cellbegineditevent"></div>
                                <div style="margin-top: 10px;" id="cellendeditevent"></div>
                           </div>
                         
              </div>   
    <?php
		/*----------------------------------------------
		/* Lưu dữ liệu vào DB
		/*---------------------------------------------*/
	$sql2 ="DROP TABLE `quanlytaisan`.`temp5`"; 	
	$db = new database;
	$db->setQuery($sql2);
	$result2=$db->fetchAll();
	
	$sql ="CREATE TABLE `quanlytaisan`.`temp5` (`ma` varchar(100), `tentruong` varchar(100))";
	$db = new database;
	$db->setQuery($sql);
	$result=$db->fetchAll();
	for ($j=1;$j<=$colsnum;$j++) //cot
	{
		$sql3  = "insert into temp5 (`ma`,`tentruong`)";
		$sql3 .= " values (";
		$sql3 .= "'".$j."'";
		$sql3 .= ",'".$data->val(1,$j)."')";
		$db->setQuery($sql3);
		$result3=$db->fetchAll();
	}	
		
		
	$sql2 ="DROP TABLE `quanlytaisan`.`temp6`"; 	
	$db = new database;
	$db->setQuery($sql2);
	$result2=$db->fetchAll();
	
	$sql ="CREATE TABLE `quanlytaisan`.`temp6` (";
	$sql .= "`".$data->val(1,1)."` varchar(100)";
	for ($j=2;$j<$colsnum;$j++) //cot
	{	
		$sql .= ", `".$data->val(1,$j)."` varchar(100)";
	}
	$sql .= ", `".$data->val(1,$colsnum)."` varchar(100))";
	$db = new database;
	$db->setQuery($sql);
	$result=$db->fetchAll();
	
	for ($i=2;$i<=$rowsnum;$i++)//hang
	{	
		$temp = $i-1;
		$sql3  = "insert into temp6 (";
		$sql3 .= "`".$data->val(1,1)."`";
		for ($j=2;$j<$colsnum;$j++) //cot
		{	
			$sql3 .= ", `".$data->val(1,$j)."`";
		}
		$sql3 .= ", `".$data->val(1,$colsnum)."`)";
		$sql3 .= " values (";
		$sql3 .= "'".$data->val($i,1)."'";
		for ($j=2;$j<$colsnum;$j++) //cot
		{	
				$sql3 .= ",'".$data->val($i,$j)."'";
		}
		$sql3 .= ",'".$data->val($i,$colsnum)."'";
		$sql3 .= ")";
		$db = new database;
		$db->setQuery($sql3);
		$result3=$db->fetchAll();
		
	}
	
?>
</body>
</html>
