<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	header( "content-type: text/xml" );
	//kiem tra đã đăng nhập	
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			include_once('../database.php');
			$db=new database();	
			$sql="update cothuoctinh ";
			$sql.="set `GiaTriThuocTinh` = '".$_POST['GiaTriThuocTinh']."'";
			$sql.="where `MaTaiSan` = '".$_POST['MaTaiSan']."' and MaThuocTinh = '".$_POST['MaThuocTinh']."'";
			$db->setQuery($sql);
			if($db->executeQuery()!=1)
			{
						$xml.="<row>";
							$xml.="<column>";
							$xml.="Thành công.";								
							$xml.="</column>";
						$xml.="</row>";
			}
			else
			{
						$xml.="<row>";
							$xml.="<column>";
							$xml.="Thất bại.";								
							$xml.="</column>";
						$xml.="</row>";
			}
	}
?>