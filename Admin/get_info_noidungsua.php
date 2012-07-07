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
			$ma=$_POST['maphieu'];
			$query="SELECT  a.MaND, a.TenND, a.GhiChuND FROM noidung a, thuocphieumau b WHERE a.mand=b.mand AND b.maphieu='".$ma."'";			
					$db->setQuery($query);
					$result=$db->fetchAll();
					$xml="";
					$xml.="<table>";
					while($row=mysql_fetch_array($result,MYSQL_NUM))
					{ 
						$xml.="<INFO>";
						/*$db->setQuery('SELECT TenND FROM noidung where mand='.$row[0].'');
							$kq=$db->fetchAll();
							$row2=mysql_fetch_array($kq);
							$xml.="<RESULT>";
							$xml.="<![CDATA[".$row2[0]."]]>";
							$xml.="</RESULT>";*/
						for($i = 0; $i < count($row); $i++) 
						{							
							$xml.="<RESULT>";
							$xml.="<![CDATA[".$row[$i]."]]>";
							$xml.="</RESULT>";
						}
						$xml.="</INFO>";
					}
					$xml.="</table>";
					mysql_free_result($result);
					echo $xml;
	//}
?>