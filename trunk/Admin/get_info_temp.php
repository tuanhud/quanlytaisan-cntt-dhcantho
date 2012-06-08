<?php	
			header("content-type: text/xml, encoding=UTF-8");
			include_once("../database.php");			
			$db = new database();
			$sql="Select * from temp2";
			$db->setQuery($sql);			
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
?>