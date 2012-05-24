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
	if( $_POST['cbo_tenkyluat']!=-1 
		&& $_POST['txt_quyetdinh']!=""
		&& $filename!=NULL){	
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
	$strHtml .="<th>".$data->val(1,3)."</th>";
	$strHtml .="<th>Họ và tên</th> ";	
	$strHtml .="<th>Chuyên ngành</th> ";
	$strHtml .="<th>Khóa học</th> ";
	$strHtml .="<th>Kết quả</th></tr>";
	$db = new database;
	for ($i=2;$i<=$rowsnum;$i++) //Duyệt từng hàng, bắt đầu lấy dữ liệu từ hàng 2
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
		else $message = mysql_error();
		$sql = "select hoivien_hoten, chuyennganh_id, hoivien_khoahoc from hoivien where hoivien_id = '".$data->val($i,3)."'";
		$db->setQuery($sql);		
		$result=$db->fetchAll();
		$row = mysql_fetch_array($result);		
		$strHtml .= 	"<td>".$row['hoivien_hoten']."</td>";//Ho ten
		$strHtml .= 	"<td>".$row['chuyennganh_id']."</td>";//Chuyennganh
		$strHtml .= 	"<td>".$row['hoivien_khoahoc']."</td>";//Khoahoc				
		/*----------------------------------------------
		/* Lưu dữ liệu vào DB
		/*---------------------------------------------*/
		$sql = "INSERT INTO `qlhsv1`.`hoivien_kyluat` (`CAPHOI_ID`, `HOCKI_ID`, `KYLUAT_ID`, `HOIVIEN_ID`,`KYLUAT_THOIGIAN`, `KYLUAT_QUYETDINH`, `KYLUAT_DONVI`) VALUES(1, '".$_POST['cbo_tenhocki']."', '".$_POST['cbo_tenkyluat']."', '".$data->val($i,3)."','".date( 'y-m-d', strtotime($_POST['cbo_thang']."/".$_POST['cbo_ngay']."/".$_POST['cbo_nam']))."','".$_POST['txt_quyetdinh']."', 0)";
		
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
	else
	echo '<font color="#FF0000">Dữ liệu không được rỗng.</font>';
?>
</body>
</html>
