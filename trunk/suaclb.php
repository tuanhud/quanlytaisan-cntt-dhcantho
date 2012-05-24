<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	header( "content-type: text/xml" );
	
	if($_POST['idclb'] == -1){
		
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Bạn chưa chọn Câu lạc bộ.";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
	}
	
	if(strlen($_POST['tenclb'])==0)
	{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Bạn chưa nhập tên Câu lạc bộ.";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
		
	}
	//kiem tra đã đăng nhập	
	if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			
			include_once('database.php');
			$db=new database();	
			$isExist = 0;
			$sql = "Select * from clb";
			$db->setQuery($sql);
			$result = $db->fetchAll();
			while($row = mysql_fetch_array($result))
			{
				if($row[1]==$_POST['tenclb']) $isExist = 1;
			}		
			if($isExist == 0){
					$sql="update clb ";
					$sql.="set `CLB_TEN` = '".$_POST['tenclb']."' ";
					$sql.="where `CLB_ID` = '".$_POST['idclb']."'";
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
								$xml.="Thất bại. Câu lạc bộ này đã tồn tại.";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
			}			
	}
?>