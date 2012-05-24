<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	header( "content-type: text/xml" );
	//kiem tra đã đăng nhập
	//cần kiểm tra nhiều hơn các ràng buộc
	if(strlen($_POST['mk_moi']) < 5)
	{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
							$xml.="Thất bại. \nLỗi: Mật khẩu ít nhất 5 ký tự.";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
		
	}
	
	if($_POST['mk_moi'] != $_POST['xacnhan_mk_moi'])
	{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
							$xml.="Thất bại. \nLỗi: Xác nhận mật khẩu mới không đúng.";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
		
	}
	
	if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			include_once('../database.php');
			$db=new database();
			//$sql = "Select MATKHAU_SV from sv where MASV = '".$_SESSION['mssv']."'";
			$sql = "Select * from can_bo where MA_CB = '".$_SESSION['mscb']."' and MAT_KHAU_CAN_BO = '".md5($_POST['mk_hientai'])."'";
			$db->setQuery($sql);
			//$result = mysql_query($sql);
			//$row = mysql_fetch_array($result);
			//if($row['MATKHAU_SV'] != md5($_POST['mk_hientai']))
			if($db->numRecord()!=1)
			{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
							$xml.="Thất bại. \nLỗi: Mật khẩu hiện tại không đúng.";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
				}
			$sql = "update can_bo set MAT_KHAU_CAN_BO='".md5($_POST['mk_moi'])."' where MA_CB ='".$_SESSION['mscb']."'";
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