<?php	
			header("content-type: text/xml");
			include_once("./database.php");			
			$db = new database();
			$sql="Select * from hoivien, chuyennganh, chsv, lchsv, hocki
			where hoivien.chuyennganh_id = chuyennganh.chuyennganh_id
			and hoivien.chsv_id = chsv.chsv_id
			and chsv.lchsv_id = lchsv.lchsv_id
			and hoivien.hoivien_trangthai = 1
			and hoivien.hocki_id = hocki.hocki_id ";
			if($_POST['idnamhoc']!=NULL) $sql.=" and hocki.namhoc_id<='".$_POST['idnamhoc']."' ";
			if($_POST['idhocki']!=NULL) $sql.=" and hocki.hocki_id<='".$_POST['idhocki']."' ";		
			if($_POST['idlchsv']!=NULL) $sql.=" and chsv.lchsv_id='".$_POST['idlchsv']."' ";
			if($_POST['idchsv']!=NULL) $sql.=" and chsv.chsv_id='".$_POST['idchsv']."' ";
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
							
							$xml.="<CHSV>";
								$xml.=$row['CHSV_TEN'];							
							$xml.="</CHSV>";																	
							
							$xml.="<LCHSV>";
								$xml.=$row['LCHSV_TEN'];							
							$xml.="</LCHSV>";	
							
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
?>