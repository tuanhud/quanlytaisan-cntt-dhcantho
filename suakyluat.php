<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	header( "content-type: text/xml" );
	
	if($_POST['idkyluat'] == -1)
	{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Bạn chưa chọn hình thức kỷ luật.";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
				}
	if(strlen($_POST['tenkyluat'])==0)
	{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Bạn chưa nhập tên hình thức kỷ luật.";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
		
	}
	if(strlen($_POST['ghichu'])>1000)
	{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Ghi chú có chiều dài tối đa 1000 ký tự.";
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
			$sql = "Select * from kyluat where kyluat_id <> '".$_POST['idkyluat']."'";
			$db->setQuery($sql);
			$result = $db->fetchAll();
			while($row = mysql_fetch_array($result))
			{
				if($row[1]==$_POST['tenkyluat']) $isExist = 1;
			}		
			if($isExist == 0){
					$sql="update kyluat 
					set `KYLUAT_TEN` = '".$_POST['tenkyluat']."', `KYLUAT_GHICHU` = '".$_POST['ghichu']."' 
					where `KYLUAT_ID` = '".$_POST['idkyluat']."'";
					
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
								$xml.="Thất bại. Hình thức kỷ luật này đã tồn tại.";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
				}							
	}
?>