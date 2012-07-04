<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	header( "content-type: text/xml" );
	//kiem tra đã đăng nhập
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	//{
			include_once('../database.php');
			$db=new database();	
			// INSERT COMMAND 
			$chitiet='';
			if($_POST['chitietnoidung']!='true')
			{
				$chitiet='false';
			}
			else
			{
				$chitiet='true';
			}
				$sql= "insert into `conoidung` values('".$_POST['maphieukiemke']."','".$_POST['manoidung']."','".$_POST['mataisan']."','".$chitiet."')";
				$db->setQuery($sql);
				if($db->executeQuery()!=1)
				{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
						$xml.="Thất bại";
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