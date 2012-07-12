<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	$data = array();
	//kiem tra đã đăng nhập
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	//{
			include_once('../database.php');
			$db=new database();
			$query="SELECT  MSDV , TenDV FROM donvi";			
					$db->setQuery($query);
					$result=$db->fetchAll();
					$i =0;
					while($row12=mysql_fetch_array($result,MYSQL_NUM))
					{    
						
					  $row = array();
					 
					  $row["MaDV"] = $row12[0];
				 	  $row["TenDV"] = $row12[1];
					  $data[$i] = $row;
					  $i++;
					}
					 
					echo json_encode($data);
	//}
?>