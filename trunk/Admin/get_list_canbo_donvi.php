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
					$db->setQuery('SELECT * FROM `nguoidung` where MSDV="'.$_POST['madonvi'].'"');
					$result=$db->fetchAll();
					$xml="";
					$xml.="<INFO>";					
					while($row=mysql_fetch_array($result))
					{												
						$xml.="<RESULT>";
							
							$xml.="<MA>";
								$xml.=$row['MSCB'];							
							$xml.="</MA>";
							$xml.="<TEN>";
								$xml.=$row['TenCB'];							
							$xml.="</TEN>";
						$xml.="</RESULT>";
					}
					$xml.="</INFO>";
				echo $xml;
				exit;
	//}
?>