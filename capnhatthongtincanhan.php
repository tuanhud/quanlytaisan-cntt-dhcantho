<?php
    session_start();
	header( "content-type: text/xml" );
	include_once('database.php');
	if (session_is_registered('maquyen') && ($_SESSION['maquyen']=="HV" || $_SESSION['maquyen']=="AD" || $_SESSION['maquyen']=="HSVT" || $_SESSION['maquyen']=="LCHSV" || $_SESSION['maquyen']=="CHSV" || $_SESSION['maquyen']=="CLB"))
	{
					$db=new database();
					$sql="UPDATE hoivien SET
						HOIVIEN_HOTEN = '".$_POST['hoten']."', 
						HOIVIEN_NGAYSINH = '".date( 'y-m-d', strtotime($_POST['ngaysinh']."/".$_POST['thangsinh']."/".$_POST['namsinh']))."', 
						HOIVIEN_DOANDANG = '".$_POST['doandang']."', 
						HOIVIEN_DIACHITHUONGTRU = '".$_POST['diachithuongtru']."', 
						HOIVIEN_DIACHILIENHE = '".$_POST['diachilienhe']."', 
						HOIVIEN_DIENTHOAI = '".$_POST['dienthoai']."', 
						HOIVIEN_EMAIL = '".$_POST['email']."', 
						DANTOC_ID = '".$_POST['dantoc']."', 
						TONGIAO_ID =  '".$_POST['tongiao']."' ";
						
					if(isset($_SESSION['mshv'])) $sql.=	" WHERE HOIVIEN_ID = '".$_SESSION['mshv']."'";
					if(isset($_SESSION['msad'])) $sql.=	" WHERE HOIVIEN_ID = '".$_SESSION['msad']."'";
					if(isset($_SESSION['mshsvt'])) $sql.= " WHERE HOIVIEN_ID = '".$_SESSION['mshsvt']."'";
					if(isset($_SESSION['mslchsv'])) $sql.= " WHERE HOIVIEN_ID = '".$_SESSION['mslchsv']."'";
					if(isset($_SESSION['mschsv'])) $sql.= " WHERE HOIVIEN_ID = '".$_SESSION['mschsv']."'";
					if(isset($_SESSION['msclb'])) $sql.= " WHERE HOIVIEN_ID = '".$_SESSION['msclb']."'";
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