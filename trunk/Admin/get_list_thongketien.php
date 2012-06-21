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
			$ma = $_POST['donvi'];
			$tunam = $_POST['tunam'];
			$dennam = $_POST['dennam'];
		$query = "select a.nam,a.MSDV,a.sotien,b.tendv from sotiencap a,donvi b where a.MSDV=b.MSDV and a.MSDV = '".$ma."' and a.nam >= '".$tunam."' and a.nam <= '".$dennam."'"; 			
					$db->setQuery($query);
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
	//}
?>