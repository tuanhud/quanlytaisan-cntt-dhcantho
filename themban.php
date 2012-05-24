<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	header( "content-type: text/xml" );
	//kiem tra đã đăng nhập	
	if(strlen($_POST['tenban'])==0)
	{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Bạn chưa nhập tên Liên Ban.";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
		
	}
	if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			include_once('database.php');
			$db=new database();	
			$isExist = 0;
			$sql = "select * from ban";
			$db->setQuery($sql);
			$result = $db->fetchAll();
			while($row = mysql_fetch_array($result))
			{
				if(strtolower($row['BAN_TEN'])==strtolower($_POST['tenban'])) $isExist = 1;
			}		
			if($isExist == 0){
					$sql="insert into ban";
					$sql.="(`BAN_TEN`)";
					$sql.=" values('".$_POST['tenban']."')";
					$db->setQuery($sql);
					if($db->executeQuery()!=1)
					{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Thất bại. \nLỗi: ".mysql_error();
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
					}
					else
					{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Thành công.";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
					}
			}
			else
			{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Thất bại. Ban này đã tồn tại.";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
				}
	}
?>