<?php	
	//khoi dong session
	session_start();

	//kiem tra quyen truoc khi hien thi trang
	if($_SESSION['maquyen']!="ADMIN")
	{
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	echo "<script language=javascript>window.location = '../index.php';</script>"; 
	exit;
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
    <title id='Description'>jqxChart Events Example</title>
<link rel="stylesheet" href="../jqwidgets/styles/jqx.base.css" type="text/css" />
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="../jqwidgets/jqxcore.js"></script>
<script type="text/javascript" src="../jqwidgets/jqxdata.js"></script>
<script type="text/javascript" src="../jqwidgets/jqxchart.js"></script>
<script type="text/javascript" src="js/fill.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/chart-nguoidung.js">
</script>
<script type="text/javascript">
   $(document).ready(function() 
	{
	taochartnguoidung();
	});
   </script>
</head>
<body style="background:white;">
<table align="center" width="1000">
    <tr>
      <td width="948" align="center">
        <div id='Chartnguoidung' style="width:600px; height: 400px"/>
      </td>
    </tr>
    </table>
</body>
</html>