<?php
	//khoi dong sesion
    session_start();
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="HSVT")
	{			
			include_once('../database.php');
			$db=new database();
			$db->setQuery('SELECT * FROM `temp`');
			$result=$db->fetchAll();
			while($row=mysql_fetch_array($result,MYSQL_NUM))
			{
				for($i = 0; $i < count($row); $i++) 
				{
					$sql="INSERT INTO `nguoidung`(";
					if($_POST['tendonvithem']!=-1)	$sql.="`MSDV`";
					if($_POST['masocanbo']!=-1)	$sql.=",`MSCB`";
					if($_POST['tencanbo']!=-1)	$sql.=",`TenCB`";
					if($_POST['gioitinh']!=-1)	$sql.=",`Gioitinh`";
					if($_POST['ngaysinh']!=-1)	
					{
						$sql.=",`NgaySinh`";
						$sql.=",`ThangSinh`";
						$sql.=",`NamSinh`";
					}
					if($_POST['email']!=-1)	$sql.=",`Email`";
					if($_POST['diachi']!=-1)	$sql.=",`Diachi`";
					if($_POST['sodienthoai']!=-1)	$sql.=",`SDT`";
					if($_POST['matkhau']!=-1)	$sql.=",`Matkhau`";
					$sql.= ") VALUES(";
					
							if($_POST['tendonvithem']!=-1)	$sql.="'".$row[$_POST['tendonvithem']-1]."'";
							if($_POST['masocanbo']!=-1)		$sql.=",'".$row[$_POST['masocanbo']-1]."'";
							if($_POST['tencanbo']!=-1)		$sql.=",'".$row[$_POST['tencanbo']-1]."'";
							if($_POST['gioitinh']!=-1)		$sql.=",'".$row[$_POST['gioitinh']-1]."'";
							if($_POST['ngaysinh']!=-1)		
							{
								$sql.=",'". substr($row[$_POST['ngaysinh']-1],0,2)."'";
								$sql.=",'". substr($row[$_POST['ngaysinh']-1],3,5)."'";
								$sql.=",'". substr($row[$_POST['ngaysinh']-1],6)."'";
							}
							if($_POST['email']!=-1)			$sql.=",'".$row[$_POST['email']-1]."'";
							if($_POST['diachi']!=-1)		$sql.=",'".$row[$_POST['diachi']-1]."'";
							if($_POST['sodienthoai']!=-1)	$sql.=",'".$row[$_POST['sodienthoai']-1]."'";
							if($_POST['matkhau']!=-1)		$sql.=",'".$row[$_POST['matkhau']-1]."'";
										
					
					$sql.= ")";
					$db->setQuery($sql);
					$db->executeQuery();
				}
			
			}
	}
?>  