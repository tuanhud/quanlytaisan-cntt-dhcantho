<?php
session_start();
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kết quả Import</title>
<script type="text/javascript" src="js/yui/yui.js"></script>
<script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/fill.js"></script>
<script type="text/javascript" src="js/importnguoidung.js"></script>
<script type="text/javascript">
$(document).ready(function() { 
	createTable();
})
</script>
</head>

<body>
<?php	
	echo '<form id="importnguoidung" name="importnguoidung" action="importcanbo.php" method="post"">';
	$numofSus = 0;
	$numofFai = 0;
	$message = '';
	$filename=$_FILES['file_import']['tmp_name'];
	include_once "../database.php"; //Ket noi den Database		
	/*--------------------------------------------
	/* Doc va hien thi file Excel
	/*------------------------------------------*/	
	echo "<div style='font-size:18pt'><b>Kết quả Import</b></div>";
	echo "<br>File: ".$filename;
	require_once '../excel_reader2.php'; // Thu vien xu ly
	$data = new Spreadsheet_Excel_Reader($filename,true,"UTF-8"); // Đọc file excel, hỗ trợ Unicode UTF-8
	$rowsnum = $data->rowcount($sheet_index=$_POST['cbo_chonsheet']); // Số hàng của sheet
	$colsnum =  $data->colcount($sheet_index=$_POST['cbo_chonsheet']);  //Số cột của sheet
	
	echo "<br>Tổng số mẫu tin: " . $rowsnum;
	echo "<br>Số cột: "  .$colsnum."<br>" ;
	/*for ($j=1;$j<=$colsnum;$j++) //cot
	{	
		$strHtml2[] =$data->val(1,$j);//hang 1 cot j
	}
	for ($j=0;$j<=$colsnum;$j++) //cot
	{	
		echo $strHtml2[$j];
		echo '<br/>';
	}*/
	//$strHtml="";
	//$strHtml .="<input name='hang' id='hang' type='hidden' value='".$rowsnum."'>";
	//$strHtml .="<input name='cot' id='cot' type='hidden' value='".$colsnum."'>";
	/*
	$strHtml .= "<input type='submit' value='Lưu'>";
	$strHtml .= "<table border='1' cellspacing=1 cellpadding=0>";
	$strHtml .="<tr  align='center'>";
	for ($j=1;$j<=$colsnum;$j++)
	{
		$strHtml .="<td><input name='checktemp[]' value='".$j."' type='checkbox'> </td> ";
	}
	for ($i=1;$i<=$rowsnum;$i++)//hang
	{	
		
		$strHtml .= "<tr bgcolor='#CCCCCC' align='center' >";
		
		for ($j=1;$j<=$colsnum;$j++) //cot
		{	
				$strHtml .="<td>".$data->val($i,$j)."</td> ";//hang i cot j
		}
		$strHtml .="</tr>";
	}
	$strHtml .="</tr>";
	$strHtml .= "</table>";*/
	//echo $strHtml;
	echo '</form>';
		/*----------------------------------------------
		/* Lưu dữ liệu vào DB
		/*---------------------------------------------*/
	$sql2 ="DROP TABLE `quanlytaisan`.`temp2`"; 	
	$db = new database;
	$db->setQuery($sql2);
	$result2=$db->fetchAll();
	if($result2)echo 'xoa thanh cong';
	
	$sql ="CREATE TABLE `quanlytaisan`.`temp2` (";
	$sql .= "`".$data->val(1,1)."` varchar(100)";
	for ($j=2;$j<$colsnum;$j++) //cot
	{	
		$sql .= ", `".$data->val(1,$j)."` varchar(100)";
	}
	$sql .= ", `".$data->val(1,$colsnum)."` varchar(100))";
	$db = new database;
	$db->setQuery($sql);
	$result=$db->fetchAll();
	if($result)echo 'tao thanh cong<br/>';
	
	for ($i=2;$i<=$rowsnum;$i++)//hang
	{	
		$temp = $i-1;
		$sql3  = "insert into temp2 (";
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
	if($result3) echo '<br/> them du lieu thanh cong';
	//hien thi du lieu ra bang
	 echo '<tr>
					<td align="center" height="300" class="level_1_1" colspan="4" valign="top">
                    <div class="yui3-skin-sam">                    
                    <div id="mytable"></div>                    
                    </div>
                    </td>
			</tr>';
	
?>
</body>
</html>
