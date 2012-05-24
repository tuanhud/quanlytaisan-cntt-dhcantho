<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	header( "content-type: text/xml" );
	//kiem tra đã đăng nhập
	//cần kiểm tra nhiều hơn các ràng buộc
	/*if(strlen($_POST['tencanbo'])<=5)
	{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Thất bại. \nLỗi: Tên cán bộ không hợp lệ";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
		
	}*/
	if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			include_once('database.php');
			$db=new database();
					$db->setQuery("update can_bo, canbo_quyen 
								set DIACHI_CB='".$_POST['diachi']."',
								EMAIL_CB='".$_POST['email']."',
								SDT_CB='".$_POST['sodienthoai']."',
								MAT_KHAU_CAN_BO='".md5($_POST['matkhau'])."',
								canbo_quyen.MA_QUYEN = '".$_POST['maquyen']."'
								where can_bo.MA_CB='".$_POST['macb']."'
								and canbo_quyen.MA_CB = can_bo.MA_CB");
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
						/*$db->setQuery("update canbo_quyen set MA_QUYEN = '".$_POST['maquyen']."' where MA_CB='".$_POST['macb']."'");
						if($db->executeQuery()!=1){
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
						{*/
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Thành công";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
						//
					}
	}
?>