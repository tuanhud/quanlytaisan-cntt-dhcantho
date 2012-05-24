<?php	
			header("content-type: text/xml");
			//include_once ("connectdatabase.php");			
			include_once("./database.php");			
			$db = new database();
			$sql = "SELECT * FROM namhoc";
			$db->setQuery($sql);
			$result_namhoc = $db->fetchAll();
			$xml="";
			$xml.="<INFO>";
			while($row_namhoc = mysql_fetch_array($result_namhoc)){
			$sql="SELECT count(hoivien_id) from hoivien, chsv, hocki
					where hoivien.chsv_id =  chsv.chsv_id
					and hoivien.hocki_id = hocki.hocki_id
					and hoivien.hoivien_trangthai = 1
					and hocki.namhoc_id <= '".$row_namhoc[0]."' ";
			if(isset($_POST['idchsv']) && $_POST['idchsv']!=-1) $sql.=" and hoivien.chsv_id = '".$_POST['idchsv']."'";
			else $sql.=" and chsv.lchsv_id = '".$_POST['idlchsv']."'";
			$db->setQuery($sql);
			$result_SLHV=$db->fetchAll();
			$row_SLHV=mysql_fetch_array($result_SLHV);
						$xml.="<RESULT>";
							$xml.="<ROW>";
								$xml.=$row_namhoc[1];							
							$xml.="</ROW>";
							
							$xml.="<COLUMN>";							
								$xml.= $row_SLHV[0];							
							$xml.="</COLUMN>";
						$xml.="</RESULT>";
				}
			$xml.="</INFO>";
			echo $xml;
?>