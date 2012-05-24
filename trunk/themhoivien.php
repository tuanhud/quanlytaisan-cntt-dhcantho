<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	header( "content-type: text/xml" );
	include_once('database.php');
	if($_POST['id']=="" || strlen($_POST['id'])!=7){
		$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Mã số không hợp lệ.";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
		}
	if($_POST['matkhau']=="" || strlen($_POST['matkhau'])<6)
	{
		$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Mật khẩu không hợp lệ.";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
		}
	if($_POST['xacnhanmatkhau']=="" || $_POST['xacnhanmatkhau']!=$_POST['matkhau'])
	{
		$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Xác nhận mật khẩu không hợp lệ.";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
		}
	if($_POST['lchsv']==-1)
	{
		$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Bạn chưa chọn Liên chi hội sinh viên.";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
		}
	if($_POST['chsv']==-1)
	{
		$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Bạn chưa chọn Chi hội sinh viên.";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
		}
	if($_POST['flag']==1){
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Thất bại. Dữ liệu không hợp lệ.";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
		}
	//kiem tra đã đăng nhập		
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	//{
			include_once('database.php');
			$db=new database();	
					$sql="INSERT INTO `hoivien` 
					(`HOIVIEN_ID`, `QUYEN_ID`, `CHSV_ID`, `DANTOC_ID`, `CHUYENNGANH_ID`, `TONGIAO_ID`, `HOCKI_ID`, `HOIVIEN_HOTEN`, `HOIVIEN_GIOITINH`, `HOIVIEN_NGAYSINH`, `HOIVIEN_DOANDANG`, `HOIVIEN_DIACHITHUONGTRU`, `HOIVIEN_DIACHILIENHE`, `HOIVIEN_DIENTHOAI`, `HOIVIEN_EMAIL`, `HOIVIEN_MATKHAU`, `HOIVIEN_KHOAHOC`, `HOIVIEN_TRANGTHAI`) 
					VALUES 
					('".$_POST['id']."', 'HV', '".$_POST['chsv']."', '".$_POST['dantoc']."', '".$_POST['chuyennganh']."', '".$_POST['tongiao']."', '".$_POST['hocki']."', '".$_POST['hoten']."', '".$_POST['gioitinh']."', '".date( 'y-m-d', strtotime($_POST['ngaysinh']."/".$_POST['thangsinh']."/".$_POST['namsinh']))."', '".$_POST['doandang']."', '".$_POST['diachithuongtru']."', '".$_POST['diachilienhe']."', '".$_POST['dienthoai']."', '".$_POST['email']."', '".md5($_POST['matkhau'])."', '".$_POST['khoahoc']."', '1');";
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
	//}
?>