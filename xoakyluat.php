<?php
	//dinh dang file thanh file xml
	header( "content-type: text/xml");
	//khoi dong sesion
    session_start();	
	if($_POST['idkyluat']==-1)
	{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Bạn chưa chọn Hình thức kỷ luật.";
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
					$db->setQuery('delete from kyluat where kyluat_id='.$_POST['idkyluat']);
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