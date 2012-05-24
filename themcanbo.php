<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	header( "content-type: text/xml" );
	//kiem tra đã đăng nhập
	//cần kiểm tra nhiều hơn các ràng buộc
	if(strlen($_POST['tencb'])<=5)
	{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Thất bại. \nLỗi: Tên cán bộ không hợp lệ";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
		
	}
	if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			include_once('database.php');
			$db=new database();
					$db->setQuery("insert into can_bo(`MA_CB`,`MA_BM`,`TEN_CB`,`DIACHI_CB`,`EMAIL_CB`,`SDT_CB`,`MAT_KHAU_CAN_BO`) values('".$_POST['macb']."','".$_POST['mabm']."','".$_POST['tencb']."','".$_POST['diachicb']."','".$_POST['emailcb']."','".$_POST['sodienthoaicb']."','".md5($_POST['matkhaucb'])."')");
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
						$db->setQuery("insert into canbo_quyen(MA_QUYEN,MA_CB) value('".$_POST['maquyen']."','".$_POST['macb']."')");
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
	}
?>