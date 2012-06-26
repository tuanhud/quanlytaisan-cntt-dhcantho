<?php
	//khoi dong sesion
    session_start();
	//kiem tra đã đăng nhập
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			$isExist = 0;
			include_once('../database.php');
			$db=new database();
/*			$sql = "Select * from loaikiemke";
			$db->setQuery($sql);
			$result = $db->fetchAll();
			while($row = mysql_fetch_array($result))
			{
			$tenloaikiemke=strtolower($row[1]);
			if($tenloaikiemke==strtolower($_POST['txt_tenloaikiemke']))
					$isExist = 1;
			}
			if($isExist==0)
			{*/
					$sltsthanhly=$_POST['txt_soluongtaisan'];
					$sltshienco=$_POST['txt_sltshienco'];
					$sltsconlai=$sltshienco - $sltsthanhly;
					$sql = "Select max(mathanhly) from taisanduocthanhly";
					$db->setQuery($sql);
					$result = $db->fetchAll();
					$row = mysql_fetch_array($result,MYSQL_NUM);
					$ma = $row[0]+1;
					
					$sql = "insert into taisanduocthanhly values('".$ma."', '".$_POST['txt_mataisanthem']."','".$_POST['txt_soluongtaisan']."')";
					$db->setQuery($sql);
					$db->executeQuery();
					$current = getdate(); 
					$current_date = $current['year']; 
					$sql2="insert into thanhlytaisan values('".$ma."','".$current_date."','".$_POST['txt_diengiai']."')";
					$db->setQuery($sql2);
					$db->executeQuery();
					$sql3="update taisanthuocdonvi set soluongcuadonvi='".$sltsconlai."' where mataisan='".$_POST['txt_mataisanthem']."'";
					$db->setQuery($sql3);
					if($db->executeQuery()!=1)
					{
						echo 0;
						exit;
					}
					else
					{
						echo 1;
						exit;
					}
			/*}
			else
			{
						echo 2;
						exit;
				}*/
	}
?>