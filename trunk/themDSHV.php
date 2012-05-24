<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kết quả Import</title>
</head>

<body>
<?php	
	$numofSus = 0;
	$numofFai = 0;
	$message = '';
	$filename=$_FILES['file_import']['tmp_name'];	
	if($_POST['cbo_tenlchsv']!=-1 && $_POST['cbo_tenchsv']!=-1 && $filename!=NULL){	
	include_once "database.php"; //Ket noi den Database		
	/*--------------------------------------------
	/* Doc va hien thi file Excel
	/*------------------------------------------*/	
	//$filename="C:\Program Files\VertrigoServ\www\Excel2MySql\DSHV.xls";	
	echo "<div style='font-size:18pt'><b>Kết quả Import</b></div>";
	echo "<br>File: ".$filename;
	require_once 'excel_reader2.php'; // Thu vien xu ly
	$data = new Spreadsheet_Excel_Reader($filename,true,"UTF-8"); // Đọc file excel, hỗ trợ Unicode UTF-8
	$rowsnum = $data->rowcount($sheet_index=0); // Số hàng của sheet
	$colsnum =  $data->colcount($sheet_index=0);  //Số cột của sheet
	echo "<br>Tổng số mẫu tin: " . $rowsnum;
	echo "<br>Số cột: "  .$colsnum."<br>" ;
	
	$strHtml="";
	$strHtml .= "<table border=1 cellspacing=1 cellpadding=0>";
	$strHtml .= "<tr bgcolor='#999999' align='center'><th>STT</th>";
	$strHtml .="<th>".$data->val(1,3)."</th> ";
	$strHtml .="<th>Quyền</th> ";
	$strHtml .="<th>".$data->val(1,2)."</th> ";
	$strHtml .="<th>".$data->val(1,8)."</th> ";
	$strHtml .="<th>".$data->val(1,10)."</th> ";
	$strHtml .="<th>".$data->val(1,11)."</th> ";
	$strHtml .="<th>".$data->val(1,12)."</th> ";
	$strHtml .="<th>".$data->val(1,4)."</th> ";
	$strHtml .="<th>".$data->val(1,6)."</th> ";
	$strHtml .="<th>Kết quả</th></tr>";
	
	for ($i=2;$i<=$rowsnum;$i++) // Duyệt từng hàng, bắt đầu lấy dữ liệu từ hàng 2
	{
		/*----------------------------------------------
		/* Hiển thị dữ liệu ra bảng
		/*---------------------------------------------*/
		$j=$i-1;
		$strHtml .= "<tr>";		
		$strHtml .= 	"<td align='center'>" .$j ."</td>";//STT		
		$strHtml .= 	"<td align='center'>".$data->val($i,3)."</td>";//MSSV
		if(strlen($data->val($i,3))==0) $message=' Mã số rỗng.';
		else if(strlen($data->val($i,3))!=7) $message=' Chiều dài mã số phải bằng 7.';		
		else $message = ' Mã số này đã tồn tại.';
		$strHtml .= 	"<td align='center'>HV</td>";//Quyen		
		$strHtml .= 	"<td>".$data->val($i,2) ."</td>";//Ho ten		
		$strHtml .= 	"<td align='center'>".date( 'y-m-d', strtotime($data->val($i,8)))."</td>";//Ngay sinh		
		$strHtml .= 	"<td>".$data->val($i,10)."</td>";// DC thuong tru		
		$strHtml .= 	"<td>".$data->val($i,11)."</td>";// DC Lien he		
		$strHtml .=		"<td>".$data->val($i,12)."</td> ";// Dien thoai				
		$strHtml .= 	"<td>".$data->val($i,4) ."</td>";// Email		
		$strHtml .=		"<td  align='center'>".$data->val($i,6)."</td> ";//Khoa hoc
		/*----------------------------------------------
		/* Lưu dữ liệu vào DB
		/*---------------------------------------------*/
		$sql = "insert into hoivien values(";
		$sql .= "'".$data->val($i,3)."'";
		$sql .= ",'HV'";
		$sql .= ",'".$_POST['cbo_tenchsv']."'";		
		$sql .= ",'".$data->val($i,14)."'";
		$sql .= ",'".$data->val($i,5)."'";
		$sql .= ",'".$data->val($i,15)."'";
		$sql .= ",'".$_POST['cbo_tenhocki']."'";
		$sql .= ",'".$data->val($i,2)."'";
		$sql .= ",'".$data->val($i,7)."'";
		$sql .= ",'".$data->val($i,8)."'";
		$sql .= ",'".$data->val($i,9)."'";
		$sql .= ",'".$data->val($i,10)."'";
		$sql .= ",'".$data->val($i,11)."'";
		$sql .= ",'".$data->val($i,12)."'";
		$sql .= ",'".$data->val($i,4)."'";
		$sql .= ",'".md5($data->val($i,3))."'";	
		$sql .= ",'".$data->val($i,6)."'";		
		$sql .= ",'1');";
		$db = new database;
		$db->setQuery($sql);
		
		$result=$db->fetchAll();
		if($result)
		{
			$strHtml .= "<td>Thành công </td></tr>";
			$numofSus+=1;
		}
		else {
			$strHtml .= " <td bgcolor='#FF0000'>Không thành công. ".$message."</td></tr>";
			$numofFai+=1;
		}
	}
	$strHtml .= "</table>";
	echo $strHtml;
	echo "<br>Thành công: " . $numofSus;
	echo "<br>Thất bại: "  .$numofFai."<br>" ;
	}	
?>
</body>
</html>
