<?php
	//khoi dong sesion
    session_start();
	//kiem tra đã đăng nhập
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			include_once('../database.php');
			$db=new database();		
			$mathanhly= $_POST['cbo_mathanhlyxoa'];	
			if($mathanhly!='"-Chọn mã-"'){		
					$db->setQuery("delete from thanhlytaisan where mathanhly='".$mathanhly."'");
					$db->executeQuery();
					$db->setQuery("delete from taisanduocthanhly where mathanhly='".$mathanhly."'");
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