<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kết quả Import</title>
<script type="text/javascript" src="js/importnguoidung.js"></script>
</head>

<body>
<?php	
	echo '<form id="importnguoidung" name="importnguoidung"">';
	$numofSus = 0;
	$numofFai = 0;
	$message = '';
	$filename=$_FILES['file_import']['tmp_name'];
	//$filename="D:\Learning\Luan van\CSDL\DSHV8.xls";
	//if($_POST['cbo_tenlchsv']!=-1 && $_POST['cbo_tenchsv']!=-1 && $filename!=NULL){	
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
	$strHtml="";
	$strHtml .= "<table border='1' cellspacing=1 cellpadding=0>";
	$strHtml .="<tr>";
	for ($j=1;$j<=$colsnum;$j++) // cot
		{
				$strHtml .="<td align='center' >";
				$strHtml.="";
				$strHtml .="</td>";
		}	
	$strHtml .="</tr>";
	for ($i=1;$i<=$rowsnum;$i++)//hang
	{	$strHtml .= "<td align='center'>";
		$strHtml .= "<p id='thongbao'></p>";
	 	$strHtml .= "</td>";
		$strHtml .= "<tr bgcolor='#CCCCCC' align='center' >";
		for ($j=1;$j<=$colsnum;$j++) //cot
		{	
				$strHtml .="<td> <input type='text' value=".$data->val($i,$j)."></td> ";//hang i cot j
		}
		$strHtml .="</tr>";
	}
	
	$strHtml .= "</table>";
	$strHtml .= "<input name='btnluu' id='btnluu' type='button' value='Lưu' align='middle'>";
		/*----------------------------------------------
		/* Hiển thị dữ liệu ra bảngt-----------------*/
	/*	$j=$i-1;
		$strHtml .= "<tr>";		
		$strHtml .= 	"<td align='center'>" .$j ."</td>";//STT		
		$strHtml .= 	"<td align='center'>".$data->val($i,3)."</td>";//MSSV
		if(strlen($data->val($i,3))==0) $message=' Mã số rỗng.';
		else if(strlen($data->val($i,3))!=7) $message=' Chiều dài mã số phải bằng 7.';		
		else $message = ' Mã số này đã tồn tại.'.mysql_error();
		$strHtml .= 	"<td align='center'>HV</td>";//Quyen		
		$strHtml .= 	"<td>".$data->val($i,2) ."</td>";//Ho ten		
		$strHtml .= 	"<td align='center'>".date( 'y-m-d', strtotime($data->val($i,8)))."</td>";//Ngay sinh		
		$strHtml .= 	"<td>".$data->val($i,10)."</td>";// DC thuong tru		
		$strHtml .= 	"<td>".$data->val($i,11)."</td>";// DC Lien he		
		$strHtml .=		"<td>".$data->val($i,12)."</td> ";// Dien thoai				
		$strHtml .= 	"<td>".$data->val($i,4) ."</td>";// Email		
		$strHtml .=		"<td  align='center'>".$data->val($i,6)."</td> ";//Khoa hoc*/
		/*----------------------------------------------
		/* Lưu dữ liệu vào DB
		/*---------------------------------------------*/
		/*$sql = "insert into hoivien values(";
		$sql .= "'".$data->val($i,3)."'";
		$sql .= ",'HV'";
		$sql .= ",'".$_POST['cbo_tenchsv']."'";
		//$sql .= ",'".$data->val($i,18)."'";		
		$sql .= ",'".$data->val($i,14)."'";
		$sql .= ",'".$data->val($i,5)."'";
		$sql .= ",'".$data->val($i,15)."'";
		$sql .= ",'".$_POST['cbo_tenhocki']."'";
		//$sql .= ",'".$data->val($i,17)."'";
		$sql .= ",'".$data->val($i,2)."'";
		$sql .= ",'".$data->val($i,7)."'";
		$sql .= ",'".date( 'y-m-d', strtotime($data->val($i,8)))."'";
		$sql .= ",'".$data->val($i,9)."'";
		$sql .= ",'".$data->val($i,10)."'";
		$sql .= ",'".$data->val($i,11)."'";
		$sql .= ",'".$data->val($i,12)."'";
		$sql .= ",'".$data->val($i,4)."'";
		$sql .= ",'".md5($data->val($i,3))."'";	
		$sql .= ",'".$data->val($i,6)."'";		
		$sql .= ",'0');";
		//$sql .= ",'".$data->val($i,19)."');";
		$db = new database;
		
		$db->setQuery($sql);		
		$result=$db->fetchAll();
		if($result)
		{
			if($data->val($i,16)!=NULL && $data->val($i,16)!="")
			{
			$sql="INSERT INTO hv_clb values('".$data->val($i,16)."','".$data->val($i,3)."',curdate())";
			$db->setQuery($sql);
			$result=$db->fetchAll();
			if($result){
				if($data->val($i,13)!=NULL && $data->val($i,3)!="")
				{
				$sql="INSERT INTO hv_nk values('".$data->val($i,13)."','".$data->val($i,3)."')";
				$db->setQuery($sql);
				$result=$db->fetchAll();
				if($result){
					$strHtml .= "<td>Thành công </td></tr>";
					$numofSus+=1;
				}
				else{
					$strHtml .= " <td bgcolor='#FF0000'>Không thành công. ".$message."</td></tr>";
					$numofFai+=1;
					}
				}
				else
				{
					$strHtml .= " <td>Thành công.</td></tr>";
					$numofSus+=1;
					}
			}
			else{
				$strHtml .= " <td bgcolor='#FF0000'>Không thành công. ".$message."</td></tr>";
				$numofFai+=1;
				}
			}
			else
			{
				$strHtml .= " <td>Thành công.</td></tr>";
				$numofSus+=1;
				}
		}
		else {
			$strHtml .= " <td bgcolor='#FF0000'>Không thành công. ".$message."</td></tr>";
			$numofFai+=1;
		}
	}*/
	
	echo $strHtml;
	echo '</form>';
	//}	
?>
</body>
</html>
