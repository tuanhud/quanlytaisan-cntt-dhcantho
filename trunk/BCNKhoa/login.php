<?php
	session_start();
	if(session_is_registered("maquyen") && $_SESSION['maquyen']=="BCHLCHSV")
	{
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	echo "<script language=javascript>window.location = 'main.php';</script>"; 
	exit;
	}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
	include('../database.php');
	$db=new database();
    if (isset($_POST['txtDinhDanh']) && isset($_POST['txtMatKhau']))
	{   		
		//kiem tra xem co ton tai nguoi voi maso va matkhau duoc cung cap hay khong ?
			$sql="select * from hoivien
					where HOIVIEN_ID ='".$_POST['txtDinhDanh']."'
					and HOIVIEN_MATKHAU ='".md5($_POST['txtMatKhau'])."'
					and HOIVIEN_TRANGTHAI = 1";
			$db->setQuery($sql);
		if ($db->numRecord()==1)
		{
		 //Kiem tra xem nguoi dung co quyen Admin hay khong ?    
				$sql="Select * from hoivien 
				where HOIVIEN_ID = '".$_POST['txtDinhDanh']."' 
				and Quyen_ID = 'BCHLCHSV'";
				$db->setQuery($sql);
			if($db->numRecord()==1)
			{
			//dua maso vao session
			$mslchsv = $_POST['txtDinhDanh'];
			session_register("mslchsv") ;
			$sql = "Select HOIVIEN_HOTEN from hoivien where HOIVIEN_ID = '".$mslchsv."'";			
			$db->setQuery($sql);
			$result = $db->fetchAll();
			$row = mysql_fetch_array($result);
			$hoten = $row['HOIVIEN_HOTEN'];
			session_register("hoten");
			//dua quyen vao session
			$maquyen="BCHLCHSV";
			session_register("maquyen");
			echo "<script language=javascript>window.location = 'main.php';</script>"; 
			exit;
			}
			else
			{
				echo "<script language=javascript> alert('Bạn không có quyền của Ban chấp hành Liên chi hội sinh viên.');window.location = 'loginUI.php';</script>";
				}
		}
		else
		{
			echo "<script language=javascript> alert('Tên đăng nhập hoặc mật khẩu chưa chính xác.');window.location = 'loginUI.php';</script>";  
		}  
    } 
	else
	{
			echo "<script language=javascript>window.location = 'loginUI.php'; </script>";
	}
?>