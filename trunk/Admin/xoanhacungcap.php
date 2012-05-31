<?php
	//khoi dong sesion
    session_start();
	//kiem tra đã đăng nhập
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			include_once('../database.php');
			$db=new database();			
			if($_POST['cbo_manccxoa']!="-Chọn mã nhà cung cấp-"){		
					$db->setQuery("delete from `nhacungcap` where mancc='".$_POST['cbo_manccxoa']."'");
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