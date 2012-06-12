<?php
session_start();
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kết quả Import</title>
<script type="text/javascript" src="js/yui.js"></script>
<script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/fill.js"></script>
<script type="text/javascript" src="js/importcanbo.js"></script>
<script type="text/javascript" src="js/table_quyen_nguoidung.js"></script>
<script type="text/javascript" src="js/check_quyen_nguoidung.js"></script>
<script type="text/javascript" src="js/quyen_nguoidung.js"></script>
<script type="text/javascript">
$(document).ready(function() { 
	fillcombo('get_list_temp2.php',document.importcanbo.tendonvithem);
	fillcombo('get_list_temp2.php',document.importcanbo.masocanbo);
	fillcombo('get_list_temp2.php',document.importcanbo.tencanbo);
	fillcombo('get_list_temp2.php',document.importcanbo.gioitinh);
	fillcombo('get_list_temp2.php',document.importcanbo.ngaysinh);
	fillcombo('get_list_temp2.php',document.importcanbo.email);
	fillcombo('get_list_temp2.php',document.importcanbo.diachi);
	fillcombo('get_list_temp2.php',document.importcanbo.sodienthoai);
	fillcombo('get_list_temp2.php',document.importcanbo.matkhau);
})
</script>
</head>

<body>
	<?php	
	echo '<form id="importcanbo" name="importcanbo" method="post"">';
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
	/*for ($j=1;$j<=$colsnum;$j++) //cot
	{	
		$strHtml2[] =$data->val(1,$j);//hang 1 cot j
	}
	for ($j=0;$j<=$colsnum;$j++) //cot
	{	
		echo $strHtml2[$j];
		echo '<br/>';
	}*/
	?>
    <table width="100%" bordercolor="#111111" cellspacing="0" cellpadding="0" align="left" border="0">             		
     <tbody>
     		  <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
              <tr>
					<td height="22" align="left" class="level_1_2" width="90">Chọn đơn vị </td>
					<td width="300" align="left" class="level_1_2">
                  	<select class="cbo" name="tendonvithem" id="tendonvithem" style="width:200" ></select>
                 </td>
              </tr>
              <tr>
					<td height="22" align="left" class="level_1_2">Mã số cán bộ</td>
					<td align="left" class="level_1_2">
                    	<select class="cbo" name="masocanbo" id="masocanbo" style="width:200"></select>
                    </td>
			  </tr>
              <tr>
					<td height="22" align="left"  class="level_1_1">Tên cán bộ</td>
					<td  class="level_1_1">
                    <select class="cbo" name="tencanbo" id="tencanbo" style="width:200"></select>
                    </td>
			  </tr>
              <tr>
					<td height="22" align="left"  class="level_1_2">Giới tính</td>
					<td class="level_1_2">
					 <select class="cbo" name="gioitinh" id="gioitinh" style="width:200"></select>					
					</td>
			  </tr>
			  <tr>
					<td height="22" align="left"  class="level_1_1">Ngày sinh</td>
					<td class="level_1_1">
                   	<select class="cbo" name="ngaysinh" id="ngaysinh" style="width:200"></select>
					</td>
			  </tr>
               <tr>
					<td height="22" align="left"  class="level_1_2">Email</td>
					<td class="level_1_2">
					<select class="cbo" name="email" id="email" style="width:200"></select>					
                    </td>
			  </tr>
			   <tr>
					<td height="22" align="left"  class="level_1_1">Địa chỉ</td>
					<td class="level_1_1">
					<select class="cbo" name="diachi" id="diachi" style="width:200"></select>					
                    </td>
			  </tr>
              <tr>
					<td height="22" align="left"  class="level_1_2">Số điện thoại</td>
					<td class="level_1_2">
					<select class="cbo" name="sodienthoai" id="sodienthoai" style="width:200"></select>					
					</td>
			  </tr>
              <tr>
					<td height="22" align="left"  class="level_1_1">Mật khẩu</td>
					<td class="level_1_1">
					<select class="cbo" name="matkhau" id="matkhau" style="width:200"></select>					
                    </td>
			  </tr>
              <tr>
              		<td height="22" align="right" class="level_1_1"></td>
              		<td colspan="2" height="22" class="level_1_2">
                    <input type="button" name="btn_capnhat" id="btn_capnhat" class="button_1" value="Lưu">
                    </td>
              </tr>
              </tbody>
              </table>
    
	<?php
	$strHtml="";
	$strHtml .= "<table border='1' cellspacing=1 cellpadding=0>";
	$strHtml .="<tr  align='center'>";
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
	$strHtml .= "</table>";
	echo $strHtml;
	echo '</form>';
	?>
    <?php
		/*----------------------------------------------
		/* Lưu dữ liệu vào DB
		/*---------------------------------------------*/
	$sql2 ="DROP TABLE `quanlytaisan`.`temp2`"; 	
	$db = new database;
	$db->setQuery($sql2);
	$result2=$db->fetchAll();
	if($result2)echo 'xoa temp2 thanh cong<br/>';
	
	$sql ="CREATE TABLE `quanlytaisan`.`temp2` (`ma` varchar(100), `tentruong` varchar(100))";
	$db = new database;
	$db->setQuery($sql);
	$result=$db->fetchAll();
	if($result)echo 'tao temp2 thanh cong<br/>';
	for ($j=1;$j<=$colsnum;$j++) //cot
	{
		$sql3  = "insert into temp2 (`ma`,`tentruong`)";
		$sql3 .= " values (";
		$sql3 .= "'".$j."'";
		$sql3 .= ",'".$data->val(1,$j)."')";
		$db->setQuery($sql3);
		$result3=$db->fetchAll();
	}	
	if($result3) echo 'them du lieu temp2 thanh cong';	
		
		
	$sql2 ="DROP TABLE `quanlytaisan`.`temp`"; 	
	$db = new database;
	$db->setQuery($sql2);
	$result2=$db->fetchAll();
	if($result2)echo 'xoa thanh cong<br/>';
	
	$sql ="CREATE TABLE `quanlytaisan`.`temp` (";
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
		$sql3  = "insert into temp (";
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
	if($result3) echo 'them du lieu thanh cong';
	
?>
</body>
</html>
