<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	header( "content-type: text/xml" );
	//kiem tra đã đăng nhập
	//cần kiểm tra nhiều hơn các ràng buộc
	/*if(strlen($_POST['mabomon'])!=8)
	{
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Thất bại. \nLỗi: Mã bộ môn phải đủ 8 ký tự";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
		
	}*/
	if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			include_once('database.php');
			$db=new database();
			$db->setQuery('SELECT * FROM quan_li_thoi_gian_dg WHERE curDate() between THOI_GIAN_BAT_DAU and THOI_GIAN_KET_THUC');
					if($db->numRecord()==1){
						$xml="";
						$xml.="<INFO>";
						$xml.="<RESULT>";
								$xml.="Đã hết thời gian chỉnh sữa nội dung của bảng đánh giá.";
						$xml.="</RESULT>";
						$xml.="</INFO>";
						echo $xml;
						exit;
						}
					$db->setQuery("insert noi_dung_danh_gia(ID_HK,`TEN_ND`) values((SELECT `ID_HK` FROM `hoc_ki` where `HIENTAI_HK`=1),'".$_POST['tennoidung']."')");
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