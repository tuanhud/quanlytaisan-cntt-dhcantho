<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	header( "content-type: text/xml" );
	//kiem tra đã đăng nhập
	//cần kiểm tra nhiều hơn các ràng buộc
	if(strlen($_POST['mssv'])!=7)
	{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Thất bại. \nLỗi: Mã số sinh viên không hợp lệ";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
		
	}
	
	if(strlen($_POST['hoten'])<5)
	{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Thất bại. \nLỗi: Tên sinh viên không hợp lệ";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
		
	}
	if(strlen($_POST['matkhau'])<5)
	{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Thất bại. \nLỗi: Mật khẩu quá ngắn";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
		
	}
	if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			include_once('database.php');
			$db=new database();
					$sql="insert into sinh_vien";
					$sql.="(`MA_SV` ,`MA_BM` ,`HOTEN_SV`,`NGAYSINH_SV`, `THANGSINH_SV`, `NAMSINH_SV`, `GIOITINH_SV`,`EMAIL_SV`,`MATKHAU_SV`)";
					$sql.=" values('".$_POST['mssv']."','".$_POST['chonbomon']."','".$_POST['hoten']."'";
					$sql.=",'".$_POST['ngaysinh']."','".$_POST['thangsinh']."'";
					$sql.=",'".$_POST['namsinh']."','".$_POST['gioitinh']."'";
					$sql.=",'".$_POST['email']."'";
					$sql.=",'".md5($_POST['matkhau'])."')";
					$db->setQuery($sql);
					if($db->executeQuery()!=1)
					{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Thất bại. \nLỗi: ".mysql_error();
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
					}
					else
					{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Thành công";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
					}
	}
?>