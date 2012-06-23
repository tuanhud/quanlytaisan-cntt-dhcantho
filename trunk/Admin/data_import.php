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
				 $ngay=substr($_POST['NgaySinh'],0,2);
				 $thang=substr($_POST['NgaySinh'],3,5);
				 $nam=substr($_POST['NgaySinh'],6);
				 
				 $query = "SELECT MSDV FROM donvi where TenDV = '".$_POST['TenDV']."' ";
				 $result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
				 while ($row = mysql_fetch_array($result, MYSQL_NUM)) 
				{
							$madonvi = $row[0];
				}
					$insert_query = "insert into `nguoidung` values('".$_POST['MSCB']."','".$madonvi."','".$_POST['TenCB']."','".$_POST['GioiTinh']."','".$ngay."','".$thang."','".$nam."','".$_POST['Email']."','".$_POST['DiaChi']."','".$_POST['SDT']."','".$_POST['SDT']."')";
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