<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	header( "content-type: text/xml" );
	
	if($_POST['idkhoa'] == -1)
	{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Bạn chưa chọn khoa";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
	}
	if($_POST['idchuyennganh'] == -1)
	{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Bạn chưa chọn Chuyên ngành";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
	}	
	
	//kiem tra đã đăng nhập
	/*if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{*/
			include_once('database.php');
			$db=new database();
					$db->setQuery("DELETE FROM chuyennganh where CHUYENNGANH_ID='".$_POST['idchuyennganh']."'");
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
	//}
?>