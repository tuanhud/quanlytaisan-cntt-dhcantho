<?php
	session_start();
	//if(session_is_registered("maquyen") && $_SESSION['maquyen']=="BCNCLB")
	//{
	//echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	//echo "<script language=javascript>window.location = 'main.php';
	
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
	include('../database.php');
	$db=new database();
    if (isset($_POST['txtDinhDanh']) && isset($_POST['txtMatKhau']))
	{   		
		//kiem tra xem co ton tai nguoi voi maso va matkhau duoc cung cap hay khong ?
			$sql="select * from nguoidung a, coquyen b
					where a.MSCB=b.MSCB
					and b.MaQuyen=2
					and a.MSCB =".$_POST['txtDinhDanh']."
					and Matkhau ='".$_POST['txtMatKhau']."'";
					
			$db->setQuery($sql);
		if ($db->numRecord()==1)
		{
		 
			//dua maso vao session
			$msclb =$_POST['txtDinhDanh'];
			session_register("msclb") ;
			$sql = "Select TenCB from nguoidung where MSCB = '".$msclb."'";			
			$db->setQuery($sql);
			$result = $db->fetchAll();
			$row = mysql_fetch_array($result);
			$hoten = $row['TenCB'];
			session_register("hoten");
			//dua quyen vao session
			$maquyen="2";
			session_register("maquyen");
			echo "<script language=javascript>window.location = 'main.php';</script>"; 
			exit;
			
			
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