<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<!--xet action lap phieu du tru van phong pham-->		  
	<?php
	include("../database.php");
	$maphieudutoan=0;
	if(($_POST['cbo_namthem']=="-Chọn năm-") || ($_POST['cbo_quythem']=="-Chọn quý-") || ($_POST['cbo_donvithem']==-1))
	{
		echo "<script type=\"text/javascript\">
		alert('Chưa chọn đủ thông tin')
		</script>";
		echo "<meta http-equiv=\"REFRESH\" content=\"0;URL=capnhatphieudutru.php\">";
		}
	else {
		//tim ma phieu du toan lon nhat
		$db=new database();
		$sql = "Select max(Maphieudutoan) from phieudutoanvpp";
		$db->setQuery($sql);
		$result = $db->fetchAll();
		$row = mysql_fetch_array($result,MYSQL_NUM);
		$maphieudutoan = $row[0]+1;
		$soluong=$_POST['soluong'];
		//them vao bang có van phong pham
	for($i=0;$i<$soluong;$i++){
		$gan=$_POST['checkbox[$i]'];
		if($gan!=0 && $_POST['sl'.$i]!='' && $_POST['dg'.$i]!='')
		$sqlvpp="insert into covpp values('".$maphieudutoan."','".$gan."','".$_POST['sl'.$i]."','".$_POST['dg'.$i]."')";
		$db1=new database();
		$db1->setQuery($sqlvpp);
		}
	}
	//them vao ban phieu du toan van phong pham
	$db2=new database();
	$db3=new database();
		$sqldutoan="insert into phieudutoanvpp values('".$maphieudutoan."','".$_POST['cbo_namthem']."','".$_POST['cbo_donvithem']."','0')";
		$db2->setQuery($sqldutoan);
		//them vao ban thuocquyvpp
		$sqlquyvpp="insert into thuocquyvpp values('".$maphieudutoan."','".$_POST['cbo_quythem']."')";
		$db3->setQuery($sqlquyvpp);
	?>
</body>
</html>