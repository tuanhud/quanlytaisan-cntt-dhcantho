<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	header( "content-type: text/xml" );
	//kiem tra đã đăng nhập
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	//{
			include_once('../database.php');
			$db=new database();	
			$thanhcong=0;
			$thatbai=0;	
			if (isset($_POST['insert']))
			{
				// INSERT COMMAND 
					$insert_query = "insert into `nguoidung` values('".$_POST['MSCB']."','".$_POST['tendv']."','".$_POST['TenCB']."','".$_POST['GioiTinh']."','".$_POST['NgaySinh']."','".$_POST['ThangSinh']."','".$_POST['NamSinh']."','".$_POST['Email']."','".$_POST['DiaChi']."','".$_POST['SDT']."','".$_POST['SDT']."')";
					$db->setQuery($insert_query);
					if($db->executeQuery()!=1)
					{
						$thatbai++;
					}
					else
					{
						$thanhcong++;
					}
					$xml="";
					$xml.="<INFO>";
					$xml.="<RESULT>";
					$xml.="Thành công".$thanhcong."\nThất bại: ".$thatbai;
					$xml.="</RESULT>";
					$xml.="</INFO>";
					echo $xml;
					exit;
				}
	//}
?>