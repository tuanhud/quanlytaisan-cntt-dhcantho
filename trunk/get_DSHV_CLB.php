<?php	
			header("content-type: text/xml");
			include_once("./database.php");			
			$db = new database();
			$sql="Select * from hoivien, chuyennganh, hv_clb, lchsv, chsv
			where hoivien.chuyennganh_id = chuyennganh.chuyennganh_id
			and hoivien.hoivien_id  = hv_clb.hoivien_id
			and hoivien.chsv_id = chsv.chsv_id
			and chsv.lchsv_id = lchsv.lchsv_id
			and hoivien.hoivien_trangthai = 1
			and hv_clb.clb_id = '".$_POST['idclb']."'";
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
							
							$xml.="<CHSV>";
								$xml.=$row['CHSV_TEN'];							
							$xml.="</CHSV>";
							
							$xml.="<LCHSV>";
								$xml.=$row['LCHSV_TEN'];							
							$xml.="</LCHSV>";
							
						$xml.="</RESULT>";
					}
					$xml.="</INFO>";
				echo $xml;
?>