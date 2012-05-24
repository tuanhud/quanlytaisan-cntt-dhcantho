<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	header( "content-type: text/xml" );
	//kiem tra đã đăng nhập	
	if($_POST['idchuyennganh']==-1)
	{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Bạn chưa chọn chuyên ngành.";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
		
	}
	if(strlen($_POST['tenchuyennganh'])==0)
	{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Bạn chưa nhập tên chuyên ngành.";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
		
	}
	/*if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{*/
						
			include_once('database.php');
			$db=new database();	
			$isExist = 0;
			$sql = "Select * from chuyennganh where CHUYENNGANH_ID = '".$_POST['idchuyennganh']."'";
			$db->setQuery($sql);
			$result = $db->fetchAll();
			while($row = mysql_fetch_array($result))
			{
				if($row['CHUYENNGANH_TEN']==$_POST['tenchuyennganh']) $isExist = 1;
			}		
			if($isExist == 0){
					$sql="update chuyennganh ";
					$sql.="set `CHUYENNGANH_TEN` = '".$_POST['tenchuyennganh']."' ";
					$sql.="where `CHUYENNGANH_ID` = '".$_POST['idchuyennganh']."'";
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
								$xml.="Thành công";
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
								$xml.="Thất bại. Chuyên ngành này đã tồn tại.";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
				}			
			
	//}
?>