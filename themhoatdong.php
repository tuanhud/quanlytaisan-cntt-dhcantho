<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	header( "content-type: text/xml" );
	
	if(strlen($_POST['hoatdong_ten'])==0)
	{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Bạn chưa nhập Tên hoạt động.";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
		
	}
	//kiem tra đã đăng nhập
	if (session_is_registered('maquyen') && ($_SESSION['maquyen']=="AD" || $_SESSION['maquyen']=="BCHHSVT"))
	{
			$isExist = 0;
			include_once('database.php');
			$db=new database();
			$sql = "Select * from hoatdong";			
			$db->setQuery($sql);
			$result = $db->fetchAll();
			while($row = mysql_fetch_array($result))
			{
			if(strtolower($row[1])==strtolower($_POST['hoatdong_ten']))	$isExist = 1;
			}
			if($isExist==0)
			{
					$db->setQuery('insert into hoatdong(HOATDONG_TEN) values(\''.$_POST['hoatdong_ten'].'\')');
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
								$xml.="Hoạt động này đã tồn tại.";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
				}
	}
?>