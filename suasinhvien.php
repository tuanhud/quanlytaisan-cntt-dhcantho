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
	
	if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			include_once('database.php');
			$db=new database();
					$sql="update sinh_vien ";
					$sql.=" set `HOTEN_SV`= '".$_POST['hoten']."'";
					$sql.=",`EMAIL_SV`='".$_POST['email']."',`NGAYSINH_SV`='".$_POST['ngaysinh']."'";
					$sql.=",`THANGSINH_SV`='".$_POST['thangsinh']."',`NAMSINH_SV`='".$_POST['namsinh']."'";
					$sql.=",`GIOITINH_SV`='".$_POST['gioitinh']."'";
					$sql.=",`MATKHAU_SV`='".md5($_POST['matkhau'])."'";
					$sql.=" where MA_SV='".$_POST['mssv']."'";

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