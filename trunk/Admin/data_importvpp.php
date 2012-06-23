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
				$query = "SELECT MaLoaiVPP FROM loaivanphongpham where TenLoaiVPP = '".$_POST['LoaiVPP']."' ";
				$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
				while ($row = mysql_fetch_array($result, MYSQL_NUM)) 
				{
							$MaLoaiVPP = $row[0];
				}
				
				$sql = "Select max(MaVPP) from vanphongpham";
				$db->setQuery($sql);
				$result = $db->fetchAll();
				$row = mysql_fetch_array($result,MYSQL_NUM);
				$MaVPP = $row[0]+1;
				
					$insert_query = "insert into `vanphongpham` values('".$MaVPP."','".$MaLoaiVPP."','".$_POST['DVT']."','".$_POST['NSX']."','".$_POST['DG']."', '".$_POST['TenVPP']."')";
					$db->setQuery($insert_query);
					if($db->executeQuery()!=1)
					{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
						$xml.="Thất bại";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
					}
					else
					{
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
	//}
?>