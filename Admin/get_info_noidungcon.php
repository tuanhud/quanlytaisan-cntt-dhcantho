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
			//$ma=$_POST['manoidung'];
			$query="SELECT noi_mand, noidung.MaND , TenND FROM noidung, noidungcon where noidungcon.mand=noidung.mand and noidung.mand ='ND10'";			
					$db->setQuery($query);
					$result=$db->fetchAll();
					$xml="";
					$xml.="<table>";
					while($row=mysql_fetch_array($result,MYSQL_NUM))
					{
						$xml.="<INFO>";
						$db->setQuery('SELECT TenND FROM noidung where mand='.$row[0].'');
						$kq=$db->fetchAll();
						while($row2=mysql_fetch_array($kq,MYSQL_NUM))
						{
								$xml.="<RESULT>";
								$xml.="<![CDATA[".$row2[0]."]]>";
								$xml.="</RESULT>";
						}
						for($i = 0; $i < count($row); $i++) 
						{							
							$xml.="<RESULT2>";
							$xml.="<![CDATA[".$row[$i]."]]>";
							$xml.="</RESULT2>";
						}
						$xml.="</INFO>";
					}
					$xml.="</table>";
					mysql_free_result($result);
					echo $xml;
	//}
?>