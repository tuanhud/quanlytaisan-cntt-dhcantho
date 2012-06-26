<?php
session_start();
	include('database.php');
	$db=new database();
    if (isset($_POST['txtDinhDanh']) && isset($_POST['txtMatKhau']))
	{   		
		//kiem tra xem co ton tai nguoi voi maso va matkhau duoc cung cap hay khong ?
			$sql="select * from nguoidung
					where MSCB ='".$_POST['txtDinhDanh']."'
					and Matkhau ='".$_POST['txtMatKhau']."'";
					
			$db->setQuery($sql);
		if ($db->numRecord()==1)
		{
		 $msclb =$_POST['txtDinhDanh'];
		 $sql = "Select MaQuyen from coquyen where MSCB = '".$msclb."'";
			$db->setQuery($sql);
			$result = $db->fetchAll();
			if(mysql_num_rows($result)){
			while($row = mysql_fetch_array($result)){
				if($row['MaQuyen']=="ADMIN"){
					//dua maso vao session
			        $msclb =$_POST['txtDinhDanh'];
			        session_register("msclb") ;
			        $sql = "Select TenCB from nguoidung where MSCB = '".$msclb."'";			
			        $db->setQuery($sql);
			        $result = $db->fetchAll();
			        $row = mysql_fetch_array($result);
			        $hoten = $row['TenCB'];
			        session_register("hoten");
			        //dua quyen vao session
			        $maquyen='ADMIN';
			        session_register("maquyen");
			
			         $sql = "Select MaQuyen from coquyen where MSCB = '".$msclb."'";
			         $db->setQuery($sql);
			
			         $result = $db->fetchAll();
			
			         if(mysql_num_rows($result)){
			             while($row = mysql_fetch_array($result)){
				             if($row['MaQuyen']=="THEMKK"){
					            $tkk="THEMKK";
					            session_register("tkk");
				              }
				             if($row['MaQuyen']=="THEMKHMS"){
					         $tkhms="THEMKHMS";
					         session_register("tkhms");
				             }
				             if($row['MaQuyen']=="SUAKHMS"){
					         $skhms="SUAKHMS";
					         session_register("skhms");
				             }
				             if($row['MaQuyen']=="SUAKK"){
					         $skk="SUAKK";
					         session_register("skk");
				             }
				             if($row['MaQuyen']=="THEMVPP"){
					         $tvpp="THEMVPP";
					         session_register("tvpp");
				             }
				             if($row['MaQuyen']=="SUAVPP"){
					         $svpp="SUAVPP";
					         session_register("svpp");
				             }
				             if($row['MaQuyen']=="DUYETKK"){
					         $dkk="DUYETKK";
					         session_register("dkk");
				             }
				             if($row['MaQuyen']=="DUYETKHMS"){
					         $dkhms="DUYETKHMS";
					         session_register("dkhms");
				             }
				             if($row['MaQuyen']=="DUYETVPP"){
					         $dvpp="DUYETVPP";
					         session_register("dvpp");
				             }
				
			             }
			          }
					echo "<script language=javascript>window.location = 'Admin/main.php';</script>"; 
			        exit;
				}
			    if($row['MaQuyen']=="CBQLBM"){
					
					//dua maso vao session
			           $msclb =$_POST['txtDinhDanh'];
			           session_register("msclb") ;
			           $sql = "Select TenCB from nguoidung where MSCB = '".$msclb."'";			
			           $db->setQuery($sql);
			           $result = $db->fetchAll();
			           $row = mysql_fetch_array($result);
			           $hoten = $row['TenCB'];
			           session_register("hoten");
			        //dua quyen vao session
			           $maquyen="CBQLBM";
			           session_register("maquyen");
			           echo "<script language=javascript>window.location = 'CanBoQLBM/main.php';</script>"; 
			           exit;
				}
				if($row['MaQuyen']=="GV"){
					
					//dua maso vao session
			           $msclb =$_POST['txtDinhDanh'];
			           session_register("msclb") ;
			           $sql = "Select TenCB from nguoidung where MSCB = '".$msclb."'";			
			           $db->setQuery($sql);
			           $result = $db->fetchAll();
			           $row = mysql_fetch_array($result);
			           $hoten = $row['TenCB'];
			           session_register("hoten");
			        //dua quyen vao session
			           $maquyen="GV";
			           session_register("maquyen");
			           echo "<script language=javascript>window.location = 'GiangVien/index.php';</script>"; 
			           exit;
				}
				
			
			
			}
			}
		}
	else
		{
			echo "<script language=javascript> alert('Tên đăng nhập và mật khẩu không chính xác!.');</script>";  
		}  
	}
	else
	{
			//echo "<script language=javascript>alert('Bạn phải nhập đầy đủ tên đăng nhập và mật khẩu!.'); </script>";
	}
	
?>