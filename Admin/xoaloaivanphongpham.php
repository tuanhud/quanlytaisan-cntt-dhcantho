<?php
	//khoi dong sesion
    session_start();
	//kiem tra đã đăng nhập
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			include_once('../database.php');
			$db=new database();			
			if($_POST['cbo_tenloaivppxoa']!="-Chọn loại văn phòng phẩm-"){		
					$db->setQuery("delete from `loaivanphongpham` where maloaivpp='".$_POST['cbo_tenloaivppxoa']."'");
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
			}
			else
			{
						echo 2;
						exit;
			}
	}
?>