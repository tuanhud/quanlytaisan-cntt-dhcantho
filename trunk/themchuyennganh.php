<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	header( "content-type: text/xml" );
	
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
	if($_POST['idkhoa']==-1)
	{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Bạn chưa chọn khoa.";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
	}
	
	//kiem tra đã đăng nhập
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
//	{
			include_once('database.php');
			$isExist = 0;
			$db=new database();
			$sql = "SELECT `CHUYENNGANH_ID`, `CHUYENNGANH_TEN` FROM chuyennganh WHERE `KHOA_ID` = '".$_POST['idkhoa']."'";
			$db->setQuery($sql);
			$result = $db->fetchAll();
			while($row = mysql_fetch_array($result)){
				if($row[1]==$_POST['tenchuyennganh']) $isExist = 1;
				}
			if($isExist==0)
			{
					$db->setQuery("INSERT into chuyennganh(KHOA_ID,CHUYENNGANH_TEN) values('".$_POST['idkhoa']."','".$_POST['tenchuyennganh']."')");
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
								$xml.="Chuyên ngành này đã tồn tại.";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
			}
	//}
?>