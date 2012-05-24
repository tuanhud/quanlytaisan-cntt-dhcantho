<?php	
			header("content-type: text/xml");
			include_once("./database.php");			
			$db = new database();
			$sql="Select * from hoivien, chuyennganh 
			where hoivien.chuyennganh_id = chuyennganh.chuyennganh_id
			and hoivien_id = '".$_POST['hoivien_id']."'";
			$db->setQuery($sql);			
			$result=$db->fetchAll();
					$xml="";
					$xml.="<INFO>";					
					while($row=mysql_fetch_array($result))
					{												
						$xml.="<RESULT>";
							
							$xml.="<ID>";
								$xml.=$row['HOIVIEN_ID'];							
							$xml.="</ID>";
							
							$xml.="<HOTEN>";
								$xml.=$row['HOIVIEN_HOTEN'];							
							$xml.="</HOTEN>";
														
							$xml.="<CHUYENNGANH>";
								$xml.=$row['CHUYENNGANH_TEN'];							
							$xml.="</CHUYENNGANH>";
							
							$xml.="<KHOAHOC>";
								$xml.=$row['HOIVIEN_KHOAHOC'];							
							$xml.="</KHOAHOC>";
						$xml.="</RESULT>";
					}
					$xml.="</INFO>";
				echo $xml;
				exit;
?>