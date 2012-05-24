<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	header( "content-type: text/xml" );
	//kiem tra đã đăng nhập
	
	if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			include_once('database.php');
			$db=new database();			
					$sql="insert into namhoc";
					$sql.="(`NAMHOC_TEN`)";
					$sql.=" values('".$_POST['tennamhoc']."')";
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