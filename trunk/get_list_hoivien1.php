<?php	
			header("content-type: text/xml");

			include_once("./database.php");			
			$db = new database();
			$sql="select * from hoivien
			where chsv_id = '".$_POST['idchsv']."'
			and hoivien_trangthai = 1";
			$db->setQuery($sql);
			$result=$db->fetchAll();
					$xml="";
					$xml.="<INFO>";					
					while($row=mysql_fetch_array($result))
					{
						$xml.="<RESULT>";
							
							$xml.="<HOTEN>";
								$xml.=$row['HOIVIEN_HOTEN'];							
							$xml.="</HOTEN>";
							$xml.="<ID>";
								$xml.=$row['HOIVIEN_ID'];							
							$xml.="</ID>";
						$xml.="</RESULT>";
					}
					$xml.="</INFO>";
				echo $xml;
				exit;

?>