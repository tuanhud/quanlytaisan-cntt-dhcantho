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
			        $sql="Select * from taisan";
					$db->setQuery($sql);
					$result=$db->fetchAll();
					$xml="";
					$xml.="<INFO>";					
					while($row=mysql_fetch_array($result))
					{												
						$xml.="<RESULT>";
							
							$xml.="<TEN>";
								$xml.=$row['TenTaiSan'];							
							$xml.="</TEN>";
							$xml.="<DVT>";
								$xml.=$row['TenDonViTinh'];							
							$xml.="</DVT>";
							
						$xml.="</RESULT>";
					}
					$xml.="</INFO>";
				echo $xml;
				exit;
	//}
?>