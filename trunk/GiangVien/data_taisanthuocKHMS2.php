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
			if (isset($_POST['insert']))
			{
				// INSERT COMMAND 
				$db->setQuery('select MaKHMS from kehoachmuasam where MSCB = "'.$_SESSION['msclb'].'"');
				$result=$db->fetchAll();
				while($row=mysql_fetch_array($result,MYSQL_NUM))
				{
					$ma = $row[0]; 		
				}
				if($ma=='')
				{
					$query = "insert into `kehoachmuasam`(MaKHMS, MSCB) values('".$_SESSION['msclb']."','".$_SESSION['msclb']."')";
					$db->setQuery($query);
					$db->executeQuery();
					
					$insert_query = "insert into `thuockhms`(MaTaiSan, MaKHMS, SoLuong, ThuyetMinhSuDung, DonGiaMuaSam) values('".$_POST['MaTaiSan']."','".$_SESSION['msclb']."', '".$_POST['SoLuong']."', 'Thuyết minh', '".$_POST['DonGia']."')";
					$db->setQuery($insert_query);
					if($db->executeQuery()!=1)
					{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
						$xml.="Thất bại.";
						$xml.="</RESULT>";
						$xml.="</INFO>";
					}
					else
					{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
						$xml.="Thành công";
						$xml.="</RESULT>";
						$xml.="</INFO>";
					}
					
					echo $xml;
					exit;
				}
				else 
				{
					$insert_query = "insert into `thuockhms`(MaTaiSan, MaKHMS, SoLuong, ThuyetMinhSuDung, DonGiaMuaSam) values('".$_POST['MaTaiSan']."','".$ma."', '".$_POST['SoLuong']."', 'Thuyết minh', '".$_POST['DonGia']."')";
					$db->setQuery($insert_query);
					if($db->executeQuery()!=1)
					{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
						$xml.="Thất bại.";
						$xml.="</RESULT>";
						$xml.="</INFO>";
					}
					else
					{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
						$xml.="Thành công";
						$xml.="</RESULT>";
						$xml.="</INFO>";
					}
					
					echo $xml;
					exit;
				}
		}
	//}
?>