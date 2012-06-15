<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	header( "content-type: text/xml" );
	//kiem tra dã dang nh?p
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	//{
			include_once('../database.php');
			$db=new database();			
					$db->setQuery('SELECT noi_mand, noidung.MaND , TenND FROM noidung, noidungcon where noidungcon.mand=noidung.mand and noidung.mand ='.$_POST['manoidung'].'');
					$result=$db->fetchAll();
					$xml="";
					$xml.="<INFO>";	
					 $stt=1;		
					while($row=mysql_fetch_array($result))
					{
							$db1=new database();
							$db1->setQuery('SELECT  MaND, TenND FROM noidung where mand='.$row['noi_mand'].'');
							$kq=$db1->fetchAll();
							$row1=mysql_fetch_array($kq);																		
						$xml.="<RESULT>";
							$xml.="<STT>";
								$xml.= $stt++;							
							$xml.="</STT>";
							$xml.="<MANDC>";
								$xml.=$row1['MaND'];							
							$xml.="</MANDC>";
							$xml.="<TENNDC>";
								$xml.=$row1['TenND'];							
							$xml.="</TENNDC>";
							$xml.="<MANDL>";
								$xml.=$row['MaND'];							
							$xml.="</MANDL>";
							$xml.="<TENNDL>";
								$xml.=$row['TenND'];							
							$xml.="</TENNDL>";
							/*$xml.="<SUA>";
								$xml.="Sửa";
							$xml.="</SUA>";*/
							/*$xml.="<XOA >";
							$xml.="Xóa";
							$xml.="</XOA>";*/
						$xml.="</RESULT>";
					}					
					$xml.="</INFO>";
				echo $xml;
				exit;
	//}
?>