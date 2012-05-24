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
					$db->setQuery("SELECT `LCHSV_TEN` FROM lchsv where LCHSV_ID ='".$_POST['idlchsv']."'");					
					$result=$db->fetchAll();					
					$row=mysql_fetch_array($result,MYSQL_NUM);					
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.= $row[0];
						$xml.="</RESULT>";
						$xml.="</INFO>";
					mysql_free_result($result);
					echo $xml;
	}
?>