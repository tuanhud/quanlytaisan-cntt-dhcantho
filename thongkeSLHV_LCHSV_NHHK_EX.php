<?php	
			header("content-type: text/xml");
			include_once("./database.php");
			$idlchsv = $idlchsv." OR chsv.lchsv_id = '".$_POST['idlchsv']."' ";			
			$db = new database();			
			$sql="SELECT count(hoivien_id) as soluong, lchsv_ten as tenlchsv from hoivien, lchsv, chsv, hocki
					where hoivien.chsv_id =  chsv.chsv_id
					and hoivien.hocki_id = hocki.hocki_id
					and chsv.lchsv_id  = lchsv.lchsv_id
					and hoivien.hoivien_trangthai = 1
					and ( ".$idlchsv." )";
			if(isset($_POST['idhocki']) && $_POST['idhocki']!=-1) $sql.=" and hoivien.hocki_id <= '".$_POST['idhocki']."'";
			else $sql.=" and hocki.namhoc_id <= '".$_POST['idnamhoc']."'";
			$db->setQuery($sql);
			$result=$db->fetchAll();
			$row=mysql_fetch_array($result);
			$xml="";
			$xml.="<INFO>";
						$xml.="<RESULT>";
							$xml.="<ROW>";
								$xml.= $row['tenlchsv'];							
							$xml.="</ROW>";
							
							$xml.="<COLUMN>";							
								$xml.= $row['soluong'];							
							$xml.="</COLUMN>";
						$xml.="</RESULT>";
			$xml.="</INFO>";
			echo $xml;
?>