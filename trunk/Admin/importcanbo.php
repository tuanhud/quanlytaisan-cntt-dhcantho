<?php
	//khoi dong sesion
    session_start();
	//kiem tra đã đăng nhập
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			$isExist = 0;
			include_once('../database.php');
			$db=new database();
			$data = $_POST['data']; // Đọc file excel, hỗ trợ Unicode UTF-8
			$rowsnum = $_POST['col']; // Số hàng của sheet
			$colsnum =  $_POST['row'];  //Số cột của sheet
			
			 $chon = $_POST['checkcot'];
			 if(empty($chon))
			  {
				echo("Bạn chưa chọn trường nào.");
			  }
			  else
			  {
				$N = count($chon);
				for($i=0; $i < $N; $i++)
				{
					for ($j=1;$j<=$colsnum;$j++) // cot
					{
						
					}	
				 	if($chon==)
				}
			  }

			
			
			$sql = "insert into nguoidung values('".$_POST['txt_masocanbo']."', '".$_POST['cbo_tendonvithem']."', '".$_POST['txt_tencanbo']."', '".$_POST['cbo_gioitinh']."', '".$_POST['cbo_ngaysinh']."', '".$_POST['cbo_thangsinh']."', '".$_POST['cbo_namsinh']."','".$_POST['txt_email']."', '".$_POST['txt_diachi']."', '".$_POST['txt_sodienthoai']."', '".$_POST['txt_matkhau']."')";
					$db->setQuery($sql);
					if($db->executeQuery()!=1)
					{
						echo 0;
						exit;
					}
					else
					{
						echo 1;
						exit;
					}
	}
?>