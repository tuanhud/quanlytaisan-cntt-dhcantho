<?php	
			header("content-type: text/xml");
			//include_once ("connectdatabase.php");			
			include_once("./database.php");			
			$db = new database();
			$sql = "SELECT chsv_id, chsv_ten FROM chsv where lchsv_id = '".$_POST['idlchsv']."'";
			$db->setQuery($sql);
			$result_chsv = $db->fetchAll();
			$xml="";
			$xml.="<INFO>";
			while($row_chsv = mysql_fetch_array($result_chsv)){
			$sql="SELECT count(hoivien_id) from hoivien, chsv, hocki
					where hoivien.chsv_id =  chsv.chsv_id
					and hoivien.hocki_id = hocki.hocki_id
					and hoivien.hoivien_trangthai = 1
					and hoivien.chsv_id = '".$row_chsv['chsv_id']."' ";
			if($_POST['idnamhoc']!= NULL && $_POST['idnamhoc']!=-1) $sql.=" and hocki.namhoc_id <= '".$_POST['idnamhoc']."'";
			else if($_POST['idhocki']!=NULL && $_POST['idhocki']!=-1) $sql.=" and hocki.hocki_id <= '".$_POST['idhocki']."'";
			else $sql.=" and hoivien.hocki_id <= (SELECT max(hocki_id) from hocki)";
			$db->setQuery($sql);
			$result_SLHV=$db->fetchAll();
			$row_SLHV=mysql_fetch_array($result_SLHV);
						$xml.="<RESULT>";
							$xml.="<ROW>";
								$xml.=$row_chsv[1];							
							$xml.="</ROW>";
							
							$xml.="<COLUMN>";							
								$xml.= $row_SLHV[0];							
							$xml.="</COLUMN>";
						$xml.="</RESULT>";
				}
			$xml.="</INFO>";
			echo $xml;
?>