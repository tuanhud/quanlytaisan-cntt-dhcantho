<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	header( "content-type: text/xml" );
	//kiem tra đã đăng nhập	
	if(strlen($_POST['chontenhocphan'])==0)
	{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Thất bại. \nLỗi: Bạn chưa chọn tên học phần !";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
		
	}
	if(strlen($_POST['chongiangvien'])==0)
	{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Thất bại. \nLỗi: Bạn chọn giảng viên !";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
		
	}
	if(strlen($_POST['chonnienkhoa'])==0)
	{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Thất bại. \nLỗi: Bạn chọn niên khóa !";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
		
	}
	if(strlen($_POST['chonhocki'])==0)
	{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Thất bại. \nLỗi: Bạn chọn học kỳ !";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
		
	}
	if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			include_once('database.php');
			$db=new database();			
					$sql = "Select * from lop_hoc_phan 
					WHERE MA_HP = '".$_POST['chontenhocphan']."'
					and ID_HK = '".$_POST['chonhocki']."'
					and ID_NH = '".$_POST['chonnienkhoa']."'
					and MA_CB = '".$_POST['chongiangvien']."'";
					$db->setQuery($sql);
					if($db->numRecord()>0)
					{
						$sql = "Select * from lop_hoc_phan
						where MA_HP = '".$_POST['chontenhocphan']."'
						and MA_CB = '".$_POST['chongiangvien']."'
						and ID_HK = (SELECT `ID_HK` FROM `hoc_ki` where `HIENTAI_HK`=1)";
						$db->setQuery($sql);
						$num = $db->numRecord();						
						$num += 1;
						$result = ($num<10) ? ($_POST['chontenhocphan']."0".$num) : ($_POST['chontenhocphan'].$num); 
					}
					else
					{
						$result = $_POST['chontenhocphan']."01"; 
						}
					$sql="insert into lop_hoc_phan";
					$sql.="(`MA_LOP_HP`,`MA_CB`, `MA_HP`, `ID_HK`,ID_NH)";
					$sql.=" values('".$result."','".$_POST['chongiangvien']."','".$_POST['chontenhocphan']."','".$_POST['chonhocki']."','".$_POST['chonnienkhoa']."')";
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
?>