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
<script type="text/javascript" src="js/chart-sotienbm.js">
</script>
<script type="text/javascript">
   $(document).ready(function() 
	{
	fillcombo2('get_list_nam.php',document.frm_tksotien.cbo_tunam);
	fillcombo2('get_list_nam.php',document.frm_tksotien.cbo_dennam);
	fillcombo('get_list_donvi.php',document.frm_tksotien.cbo_donvi); 
	batsukienbtn_tk();
	});
   </script>
</head>
<body style="background:white;">
<form id="frm_tksotien" name="frm_tksotien">

<table align="center" width="1000">
    <tr>
    <td align="center" colspan="8"><strong><h2>Thống kê số tiền cấp cho các bộ môn theo năm</h2></strong></td>
    </tr>
     <tr>
    <td width="8" align="center">&nbsp;</td>
     <td width="281" align="center">&nbsp;</td>
     <td width="88" align="center">Từ năm:</td>
     <td width="109" align="center"><select name="cbo_tunam" id="cbo_tunam">
     </select></td>
     <td width="108" align="center">Đến năm:</td>
      <td width="128" align="center"><select id="cbo_dennam"></select></td>
       <td width="216" align="center">&nbsp;</td>
        <td width="10" align="center">&nbsp;</td>
    </tr>
    
    <tr>
   <td width="8" align="center">&nbsp;</td>
     <td width="281" align="center">&nbsp;</td>
     <td colspan="2" align="center">Chọn đơn vị:</td>
     <td colspan="2" align="center"><select name="cbo_donvi" id="cbo_donvi">
     </select></td>
      <td width="216" align="center">&nbsp;</td>
        <td width="10" align="center">&nbsp;</td>
    </tr>
    <tr>
    <td width="8" align="center">&nbsp;</td>
     <td width="281" align="center">&nbsp;</td>
     <td width="88" align="center">&nbsp;</td>
     <td colspan="2" align="center">&nbsp;</td>
     <td width="128" align="center">&nbsp;</td>
       <td width="216" align="center">&nbsp;</td>
        <td width="10" align="center">&nbsp;</td>
    </tr>
    
    <tr>
   <td width="8" align="center">&nbsp;</td>
     <td width="281" align="center">&nbsp;</td>
     <td width="88" align="center">&nbsp;</td>
     <td colspan="2" align="center"><input type="button" id="btn_thongketien" name="btn_thongketien" value="Thống Kê" /></td>
     <td width="128" align="center">&nbsp;</td>
       <td width="216" align="center">&nbsp;</td>
        <td width="10" align="center">&nbsp;</td>
    </tr>
    <tr>
    <td colspan="8" align="center">
    <div id='chartContainer' style="width:600px; height: 400px"/>
    </td>
    <tr><td colspan="8">
    <div id='eventText' style="width:600px; height: 30px"/>
    </td>
    </tr>
    </table>
    </form>
</body>
</html>