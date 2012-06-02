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
					$db->setQuery('SELECT * FROM `coquyen` where MSCB="'.$_POST['macanbo'].'"');
					$result=$db->fetchAll();
					$xml="";
					$xml.="<INFO>";					
					while($row=mysql_fetch_array($result))
					{												
						$xml.="<RESULT>";
							
							$xml.="<MAQUYEN>";
								$xml.=$row['MaQuyen'];							
							$xml.="</MAQUYEN>";
							$xml.="<MSCB>";
								$xml.=$row['MSCB'];							
							$xml.="</MSCB>";
						$xml.="</RESULT>";
					}
					$xml.="</INFO>";
				echo $xml;
				exit;
	//}
?>