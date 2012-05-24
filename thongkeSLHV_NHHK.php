<?php	
			header("content-type: text/xml");
			//include_once ("connectdatabase.php");			
			include_once("./database.php");			
			$db = new database();
			$sql = "SELECT * FROM lchsv";
			$db->setQuery($sql);
			$result_lchsv = $db->fetchAll();
			$xml="";
			$xml.="<INFO>";
			while($row_lchsv = mysql_fetch_array($result_lchsv)){
			$sql="SELECT count(hoivien_id) from hoivien, chsv, hocki
					where hoivien.chsv_id =  chsv.chsv_id
					and hoivien.hocki_id = hocki.hocki_id
					and hoivien.hoivien_trangthai = 1
					and chsv.lchsv_id = '".$row_lchsv[0]."' ";
			if(isset($_POST['idhocki']) && $_POST['idhocki']!=-1) $sql.=" and hocki.hocki_id <= '".$_POST['idhocki']."'";
			else $sql.=" and hocki.namhoc_id <= '".$_POST['idnamhoc']."'";
			$db->setQuery($sql);
			$result_SLHV=$db->fetchAll();
			$row_SLHV=mysql_fetch_array($result_SLHV);
						$xml.="<RESULT>";
							$xml.="<ROW>";
								$xml.=$row_lchsv[1];							
							$xml.="</ROW>";
							
							$xml.="<COLUMN>";							
								$xml.= $row_SLHV[0];							
							$xml.="</COLUMN>";
						$xml.="</RESULT>";
				}
			$xml.="</INFO>";
			echo $xml;
?>