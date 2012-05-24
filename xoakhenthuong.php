<?php
	//dinh dang file thanh file xml
	header( "content-type: text/xml");
	//khoi dong sesion
    session_start();	
	if($_POST['idkhenthuong']==-1)
	{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Bạn chưa chọn Hình thức khen thưởng.";
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
					$db->setQuery('delete from khenthuong where KHENTHUONG_ID='.$_POST['idkhenthuong']);
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
?>