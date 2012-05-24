<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	header( "content-type: text/xml" );
	//kiem tra đã đăng nhập	
	if(strlen($_POST['tenkhoa_moi'])==0)
	{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Bạn chưa nhập tên Khoa";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
		
	}
	if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			if($_POST['idkhoa']!=-1){
			include_once('database.php');
			$db=new database();	
			$isExist = 0;
			$sql = "Select * from khoa";
			$db->setQuery($sql);
			$result = $db->fetchAll();
			while($row = mysql_fetch_array($result))
			{
				if($row[1]==$_POST['tenkhoa_moi']) $isExist = 1;
			}		
			if($isExist == 0){
					$sql="update khoa ";
					$sql.="set `KHOA_TEN` = '".$_POST['tenkhoa_moi']."' ";
					$sql.="where `KHOA_ID` = '".$_POST['idkhoa']."'";
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
								$xml.="Thất bại. Khoa này đã tồn tại.";
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
								$xml.="Bạn chưa chọn Khoa.";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
				}
	}
?>