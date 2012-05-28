<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	header( "content-type: text/xml" );
	//kiem tra đã đăng nhập
	
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	//{
		echo $_POST['tennam'];
			include_once('../database.php');
			$db=new database();			
					$sql="insert into nam values('".$_POST['tennam']."')";
					//$sql.="(`Nam`)";
					 
					$db->setQuery($sql);
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
	//}
?>