<?php
	//dinh dang file thanh file xml
	header( "content-type: text/xml" );
	
	//khoi dong sesion
    session_start();
	
	//kiem tra đã đăng nhập
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
//	{
			include_once('database.php');
			$db=new database();			
					//if(isset($_POST['id']))
					$db->setQuery('SELECT HOCKI_ID,HOCKI_TEN FROM hocki where NAMHOC_ID=\''.$_POST['id'].'\'');
					//else
					//$db->setQuery('SELECT ID_HK,TEN_HK FROM hoc_ki');
					$result=$db->fetchAll();
					$xml="";
					$xml.="<table>";
					$xml.="<row>";
							$xml.="<column>";
							$xml.=-1;							
							$xml.="</column>";
							$xml.="<column>";
							$xml.='-Chọn học kì-';							
							$xml.="</column>";
					$xml.="</row>";
					while($row=mysql_fetch_array($result,MYSQL_NUM))
					{
						$xml.="<row>";
						for($i = 0; $i < count($row); $i++) {
							$xml.="<column>";
							$xml.="<![CDATA[".$row[$i]."]]>";								
							$xml.="</column>";
						}
						$xml.="</row>";
					}
					$xml.="</table>";
					mysql_free_result($result);
					echo $xml;
//	}
?>