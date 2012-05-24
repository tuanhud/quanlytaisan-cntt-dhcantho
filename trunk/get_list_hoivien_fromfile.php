<?php	
	header("content-type: text/xml");

	$filename=$_FILES['file_import']['name'];
	/*--------------------------------------------
	/* Đọc và hiển thị file Excel
	/* Post by khoinguonit.com
	/*------------------------------------------*/	
	//$filename="C:\Users\Namlun12\Desktop\Danh sach khen thuong.xls";
//	echo "Filename: ".$filename;
	require_once 'excel_reader2.php'; // Thư viện xử lý
	$data = new Spreadsheet_Excel_Reader($filename,true,"UTF-8"); // Đọc file excel, hỗ trợ Unicode UTF-8
	$rowsnum = $data->rowcount($sheet_index=0); // Số hàng của sheet
	
	$xml="";
	$xml.="<INFO>";	
	for ($i=2;$i<=$rowsnum;$i++) // Duyệt từng hàng, bắt đầu lấy dữ liệu từ hàng 2
	{
		/*----------------------------------------------
		/* Hiển thị dữ liệu ra bảng
		/*---------------------------------------------*/
		$xml.="<RESULT>";
			$xml.="<ID>";
				$xml.=$data->val($i,3);							
			$xml.="</ID>";			
		$xml.="</RESULT>";		
	}
	$xml.="</INFO>";
	echo $xml;
	exit;
?>