<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	header( "content-type: text/xml" );
	//kiem tra đã đăng nhập
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			include_once('../database.php');
			$db=new database();			
					$db->setQuery(('SELECT taisan.tentaisan, taisan.mataisan, taisanduocthanhly.slthanhly, taisanthuocdonvi.soluongcuadonvi, thanhlytaisan.diengiaithanhly FROM taisan, taisanthuocdonvi, thanhlytaisan, taisanduocthanhly WHERE taisan.mataisan=taisanduocthanhly.mataisan AND taisanthuocdonvi.mataisan=taisanduocthanhly.mataisan AND taisanduocthanhly.mathanhly=thanhlytaisan.mathanhly AND thanhlytaisan.mathanhly =\''.$_POST['mathanhly'].'\''));
					$result=$db->fetchAll();
					$xml="";
					$xml.="<table>";
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
					
	}
?>