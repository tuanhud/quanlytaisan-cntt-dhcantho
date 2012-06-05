<?php	
			header("content-type: text/xml");
			include_once("../database.php");			
			$db = new database();
			$sql="Select * from thuoctinh";
			$db->setQuery($sql);			
			$result=$db->fetchAll();
					$xml="";
					$xml.="<INFO>";					
					while($row=mysql_fetch_array($result))
					{												
						$xml.="<RESULT>";
							
							$xml.="<MA>";
								$xml.=$row['MaThuocTinh'];							
							$xml.="</MA>";
							
							$xml.="<TEN>";
								$xml.=$row['TenThuocTinh'];							
							$xml.="</TEN>";
														
							$xml.="<GIATRI>";
								$xml.=$row['GhiChu'];							
							$xml.="</GIATRI>";
							
						$xml.="</RESULT>";
					}
					$xml.="</INFO>";
				echo $xml;
				exit;
?>