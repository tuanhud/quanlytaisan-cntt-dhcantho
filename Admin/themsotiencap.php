<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	//header( "content-type: text/xml" );
	//kiem tra đã đăng nhập
	
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	//{
		//echo $_POST['tennam'];
			include_once('../database.php');
			$db=new database();		
					$sql  = "select * from sotiencap";
					$db->setQuery($sql);
					 $result = $db->fetchAll();
			while($row = mysql_fetch_array($result))
			{
				if($row[0]==$_POST['cbo_chonnam'] && $row[1]==$_POST['cbo_chondonvi'])
				{
					echo 2;
					exit;
				}
			}
			        $sql="insert into sotiencap values('".$_POST['cbo_chonnam']."','".$_POST['cbo_chondonvi']."','".$_POST['txt_sotiencap']."')";
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