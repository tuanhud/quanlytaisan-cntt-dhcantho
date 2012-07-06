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
					$db->setQuery('SELECT a.maphieudutoan FROM phieudutoanvpp a, thuocquyvpp b where a.maphieudutoan=b.maphieudutoan and a.msdv="'.$_POST['id'].'" and a.nam="'.$_POST['id2'].'" and b.quy="'.$_POST['id3'].'"');
					$result=$db->fetchAll();
					$xml="";
					$xml.="<table>";
					$xml.="<row>";
							$xml.="<column>";
							$xml.="-Chọn mã phiếu dự trù VPP-";							
							$xml.="</column>";
							$xml.="<column>";
							$xml.='-Chọn mã phiếu dự trù VPP-';							
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