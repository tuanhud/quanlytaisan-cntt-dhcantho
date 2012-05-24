<?php
	//khoi dong session
	session_start();
	
	//kiem tra quyen truoc khi hien thi trang
	/*if(!session_is_registered("maquyen"))
	{
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	if($_SESSION['maquyen']!="AD")
	echo "<script language=javascript>window.location = './Admin/loginUI.php';</script>"; 
	if($_SESSION['maquyen']!="BCHHSVT")
	echo "<script language=javascript>window.location = './HSVT/loginUI.php';</script>";
	exit;
	}*/
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Report</title>
<link rel="stylesheet" type="text/css" href="./css/prettify-min.css">
<link rel="stylesheet" type="text/css" href="./css/widget-base.css">
<link rel="stylesheet" type="text/css" href="./css/widget-stack.css">
<style>
#mychart {
    margin:10px 10px 10px 10px;
    width:90%;
    max-width: 800px;
    height:400px;
}
</style>

<script type="text/javascript" src="js/yui-min_3.5.js"></script>
<script type="text/javascript" src="./js/prettify-min.js"></script>

<script type="text/javascript" src="./js/jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="./js/ajax.js"></script>
<script type="text/javascript" src="./js/thongke.js"></script>
<script type="text/javascript" src="./js/fill.js"></script>
<?php
include_once('database.php');
$db = new database;
if($_POST['cbo_tennamhoc']!=-1){
$namhoc_id = $_POST['cbo_tennamhoc'];
session_register('namhoc_id');

$sql = "select namhoc_ten from namhoc where namhoc_id = '".$_SESSION['namhoc_id']."'";
$db->setQuery($sql);
$result = $db->fetchAll();
$row = mysql_fetch_array($result);
$namhoc_ten = $row['namhoc_ten'];
session_register('namhoc_ten');
}
//Dang ky SESSION hocki
if(isset($_POST['cbo_tenhocki']) && $_POST['cbo_tenhocki']!=-1){
$hocki_id = $_POST['cbo_tenhocki'];
session_register('hocki_id');

$sql = "select hocki_ten from hocki where hocki_id = '".$_SESSION['hocki_id']."'";
$db->setQuery($sql);
$result = $db->fetchAll();
$row = mysql_fetch_array($result);
$hocki_ten = $row['hocki_ten'];
session_register('hocki_ten');
}
?>
<script type="text/javascript" >
$(document).ready(function() { 
		SLHV_NHHK('./thongkeSLHV_NHHK.php',<?=$_SESSION['namhoc_id']?>, <?=$_SESSION['hocki_id']?>);
}); 
</script>

</head>
<img align="right" src="./images/printer.png" alt="In" onClick="window.print();" />&nbsp;&nbsp;<a href="baocao_SLHV_NHHK_W.php"><img src="./images/word.png" align="right" alt="Xuất ra word" /></a>
<body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0"  class="yui3-skin-sam">
<table width="800px" align="center">
<tr>
<td width="50%" align="center">HỘI SINH VIÊN VIỆT NAM TP CẦN THƠ</td><td align="center">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</td>
</tr>
<tr>
<td width="50%" align="center"><b>BCH TRƯỜNG ĐẠI HỌC CẦN THƠ</b></td><td align="center">Độc lập - Tự do - Hạnh phúc</td>
</tr>
<tr>
<td width="50%" align="center"><hr width="60%"></td><td><hr width="50%" color="#000000"></td>
</tr>  
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
<td width="50" align="center" colspan="2"><b><i><font size="5">Bảng thống kê</font></i></b></td>
</tr>
<tr><td colspan="2" align="center"><i>(Số lượng hội viên theo từng LCHSV trong
<?php
if(isset($_SESSION['hocki_ten'])){
echo "học kỳ ".$_SESSION['hocki_ten'].",";
}
if(isset($_SESSION['namhoc_ten'])){
echo " năm học ".$_SESSION['namhoc_ten'];
}
?>)</i></td></tr>
<tr>
  <td width="50%" align="center" colspan="2"><b>--------------------------------------------------------------</b></td>
</tr>
<tr>
<td colspan="2">
            <table width="100%" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
                 <tr>					
					<td align="center">
                    <div id="mychart" style="width:98%"></div>
                    </td>
			</tr>               
              <tr>           					  
            </tbody>
        </table>
</td>
</tr>
<tr>
<td>&nbsp;</td><td align="center"><i>Cần Thơ, ngày<?php echo date(" d ") ?>tháng<?php echo date(" m ") ?>năm<?php echo date(" Y ") ?></i></td>
</tr>
</table>
</body>
</html>

