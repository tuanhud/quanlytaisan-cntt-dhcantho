<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	header( "content-type: text/xml" );
	
	if($_POST['idkhenthuong'] == -1)
	{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Bạn chưa chọn hình thức khen thưởng.";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
				}
	if(strlen($_POST['tenkhenthuong'])==0)
	{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Bạn chưa nhập tên hình thức khen thưởng.";
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
								$xml.="Ghi chú có chiều dài tối đa 500 ký tự.";
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
			$sql = "Select * from khenthuong where khenthuong_id <> '".$_POST['idkhenthuong']."'";
			$db->setQuery($sql);
			$result = $db->fetchAll();
			while($row = mysql_fetch_array($result))
			{
				if($row[1]==$_POST['tenkhenthuong']) $isExist = 1;
			}		
			if($isExist == 0){
					$sql="update khenthuong 
					set `KHENTHUONG_TEN` = '".$_POST['tenkhenthuong']."', `KHENTHUONG_GHICHU` = '".$_POST['ghichu']."' 
					where `KHENTHUONG_ID` = '".$_POST['idkhenthuong']."'";
					
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
								$xml.="Thất bại. Hình thức khen thưởng này đã tồn tại.";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
				}							
	}
?>