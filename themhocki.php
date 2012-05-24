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
					$db->setQuery('BEGIN');
					$db->executeQuery();
					$db->setQuery('update hocki set HOCKI_HIENTAI=0');
					$db->executeQuery();
					$db->setQuery('insert into hocki(NAMHOC_ID,HOCKI_TEN,HOCKI_HIENTAI) values(\''.$_POST['idnamhoc'].'\',\''.$_POST['tenhocki'].'\',1)');
					if($db->executeQuery()!=1)
					{
						$db->setQuery('ROLLBACK');
						$db->executeQuery();
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
						$db->setQuery('COMMIT');
						$db->executeQuery();	
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