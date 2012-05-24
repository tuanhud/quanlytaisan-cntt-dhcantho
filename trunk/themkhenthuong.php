<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	header( "content-type: text/xml" );
	
	if(strlen($_POST['tenkhenthuong'])==0)
	{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Bạn chưa nhập Tên hình thức khen thưởng.";
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
	if (session_is_registered('maquyen') && ($_SESSION['maquyen']=="AD" || $_SESSION['maquyen']=="BCHHSVT"))
	{
			$isExist = 0;
			include_once('database.php');
			$db=new database();
			$sql = "Select * from khenthuong";			
			$db->setQuery($sql);
			$result = $db->fetchAll();
			while($row = mysql_fetch_array($result))
			{
			if(strtolower($row[1])==strtolower($_POST['tenkhenthuong']))	$isExist = 1;
			}
			if($isExist==0)
			{
					$db->setQuery('insert into khenthuong(KHENTHUONG_TEN, KHENTHUONG_GHICHU) values(\''.$_POST['tenkhenthuong'].'\',\''.$_POST['ghichu'].'\')');
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
								$xml.="Hình thức khen thưởng này đã tồn tại.";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
				}
	}
?>