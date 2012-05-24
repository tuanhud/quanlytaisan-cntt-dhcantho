<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	header( "content-type: text/xml" );
	if($_POST['chucvu_id']==-1){				
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Bạn chưa chọn Chức vụ.";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
				}
	if(strlen($_POST['chucvu_ten'])==0)
	{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Bạn chưa nhập tên Chức vụ.";
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
			$sql = "Select * from chucvu where BAN_ID = '".$_POST['ban_id']."'";
			$db->setQuery($sql);
			$result = $db->fetchAll();
			while($row = mysql_fetch_array($result))
			{
				if(strtolower($row['CHUCVU_TEN'])==strtolower($_POST['chucvu_ten'])) $isExist = 1;
			}		
			if($isExist == 0){
					$sql="update chucvu ";
					$sql.="set `CHUCVU_TEN` = '".$_POST['chucvu_ten']."' ";
					$sql.="where `CHUCVU_ID` = '".$_POST['chucvu_id']."'";
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
								$xml.="Chức vụ này đã tồn tại.";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
			}

	}
?>