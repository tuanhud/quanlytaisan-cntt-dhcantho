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
			        $sql="Select a.MaTaiSan,TenTaiSan,TenDonViTinh,Soluong,DonGiaMuaSam from thuockhms a, taisan b where a.MaTaiSan= b.MaTaiSan";
					$db->setQuery($sql);
					$result=$db->fetchAll();
					while($row=mysql_fetch_array($result))
					{	
					$data[]=array(														
						'mats'=>$row['MaTaiSan'],
						'ten'=>$row['TenTaiSan'],
						'dvt'=>$row['TenDonViTinh'],
						'soluong'=>$row['Soluong'],
						'dongia'=>$row['DonGiaMuaSam'],
						'tong'=>$row['Soluong']*$row['DonGiaMuaSam'],
						);
					}					
				echo json_encode($data);
				exit;
	//}
?>