<?php
session_start();
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kết quả Import</title>
<link rel="stylesheet" href="../jqwidgets/styles/jqx.base.css" type="text/css" />
    <link rel="stylesheet" href="../jqwidgets/styles/jqx.classic.css" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxmenu.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxcheckbox.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxgrid.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxdata.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxgrid.selection.js"></script>
	<script type="text/javascript" src="../jqwidgets/jqxnumberinput.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxgrid.edit.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxgrid.pager.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxwindow.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxpanel.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxcalendar.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxnumberinput.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxdatetimeinput.js"></script>
    <script type="text/javascript" src="../jqwidgets/globalization/jquery.global.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="js/gettheme.js"></script>
    <script type="text/javascript" src="js/ajax.js"></script>
    <script type="text/javascript" src="js/fill.js"></script>

<script type="text/javascript" src="js/table_danhsachnguoidung.js"></script>
<script type="text/javascript">
$(document).ready(function() 
{ 
	taobangdanhsachnguoidung();
})
</script>
</head>

<body>
    <table width="100%" bordercolor="#111111" cellspacing="0" cellpadding="0" align="left" border="0">             		
     <tbody>
     		  
              <tr>
              		<div id='jqxWidget'>
                            <div style="margin-top: 10px;" id="jqxgrid"></div>
                            <div style="margin-top: 30px;">
                                <div id="cellbegineditevent"></div>
                                <div style="margin-top: 10px;" id="cellendeditevent"></div>
                           </div>
                         
              </div> 
              </tr>
             
              <tr>
              		<td colspan="2" height="22" align="center">
                    <input type="button" name="save" id="save" class="button_1" value="Cập nhật">
                    <input type="button" name="delete" id="delete" class="button_1" value="Xóa">
                    </td>
              </tr>
              </tbody>
              </table>
</body>
</html>
