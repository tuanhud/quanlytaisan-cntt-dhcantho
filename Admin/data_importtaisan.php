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
				$query = "SELECT MaLoai FROM loaitaisan_thietbi where TenLoai = '".$_POST['LoaiTaiSan']."' ";
				$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
				while ($row = mysql_fetch_array($result, MYSQL_NUM)) 
				{
							$MaLoai = $row[0];
				}
				
				$sql = "Select max(MaTaiSan) from taisan";
				$db->setQuery($sql);
				$result = $db->fetchAll();
				$row = mysql_fetch_array($result,MYSQL_NUM);
				$mataisan = $row[0]+1;
				
					$insert_query = "insert into `taisan` values('".$mataisan."','".$_POST['DonViTinh']."','".$MaLoai."','".$_POST['TaiSan']."','".$_POST['TinhTrang']."')";
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