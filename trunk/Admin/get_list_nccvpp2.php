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
					$db->setQuery('SELECT distinct a.mancc,a.tenncc FROM nhacungcap a,duoccc b where a.mancc=b.mancc and mavpp="'.$_POST['id'].'"');
					$result=$db->fetchAll();
					$xml="";
					$xml.="<table>";
					$xml.="<row>";
							$xml.="<column>";
							$xml.=-1;							
							$xml.="</column>";
							$xml.="<column>";
							$xml.='-Chọn nhà cung cấp-';							
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
	//}
?>