<?php
	//khoi dong session
	session_start();
	
	//kiem tra quyen truoc khi hien thi trang
	if(!session_is_registered("maquyen"))
	{
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	if($_SESSION['maquyen']!="BCHHSVT")
	echo "<script language=javascript>window.location = './HSVT/loginUI.php';</script>";
	exit;
	}
?>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Thêm danh sách hội viên tham gia hoạt động</title>
<link rel="stylesheet" type="text/css" href="./css/style.css">
<!--<link rel="stylesheet" type="text/css" href="./css/autocomplete-list.css">-->
<link rel="stylesheet" type="text/css" href="css/datatable-sort.css">
<link rel="stylesheet" type="text/css" href="css/panel.css">
<script type="text/javascript" src="js/yui-min_3.5.js"></script>

<script type="text/javascript" src="./js/jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="./js/date.js"></script>
<script type="text/javascript" src="./js/ajax.js"></script>
<script type="text/javascript" src="./js/namhochocki.js"></script>
<script type="text/javascript" src="./js/hoatdong.js"></script>
<script type="text/javascript" src="./js/fill.js"></script>
<script type="text/javascript" >
$(document).ready(function() { 
	fillcombo('./get_list_namhoc.php',document.frm_capnhathoatdong.cbo_tennamhoc);
	get_cur_namhoc('./get_cur_namhoc.php',document.frm_capnhathoatdong);
	_fillcombo('./get_list_hocki.php',document.frm_capnhathoatdong.cbo_tennamhoc, document.frm_capnhathoatdong.cbo_tenhocki);
	get_cur_hocki('./get_cur_hocki.php',document.frm_capnhathoatdong);	
	fillcombo('./get_list_hoatdong.php',document.frm_capnhathoatdong.cbo_tenhoatdong);
	init_date_input(document.frm_capnhathoatdong.cbo_ngaybd,document.frm_capnhathoatdong.cbo_thangbd,document.frm_capnhathoatdong.cbo_nambd);	
	init_date_input(document.frm_capnhathoatdong.cbo_ngaykt,document.frm_capnhathoatdong.cbo_thangkt,document.frm_capnhathoatdong.cbo_namkt);	
}); 

function isValid(){
	var hoatdong = document.frm_capnhathoatdong.cbo_tenhoatdong;
	var diadiem = document.frm_capnhathoatdong.txt_diadiem;
	var noidung = document.frm_capnhathoatdong.txta_noidung;
	var file = document.frm_capnhathoatdong.file_import;
	
	var ngaybd = document.frm_capnhathoatdong.cbo_ngaybd;
	var thangbd = document.frm_capnhathoatdong.cbo_thangbd;
	var nambd = document.frm_capnhathoatdong.cbo_nambd;
	
	var ngaykt = document.frm_capnhathoatdong.cbo_ngaykt;
	var thangkt = document.frm_capnhathoatdong.cbo_thangkt;
	var namkt = document.frm_capnhathoatdong.cbo_namkt;
	
	if(hoatdong.value==-1){
		alert('Bạn chưa chọn hoạt động.');
		hoatdong.focus();
		return false;
		}
	if(diadiem.value ==""){
		alert('Địa điểm không được rỗng.');
		diadiem.focus();
		return false;
		}
	if(noidung.value == 0){
		alert('Bạn chưa nhập nội dung');
		noidung.focus();
		return false;
		}
	if(!isValidDate_2(ngaybd.value,thangbd.value,nambd.value))
	{
		alert("Ngày bắt đầu không hợp lệ");
		ngaybd.focus();
		return false;
	}
	if(!isValidDate_2(ngaykt.value, thangkt.value, namkt.value))
	{
		alert("Ngày kết thúc không hợp lệ");
		ngaykt.focus();
		return false;
	}
	var be = new Date(nambd.value,thangbd.value-1,ngaybd.value, 0, 0, 0, 0);
	var en = new Date(namkt.value,thangkt.value-1,ngaykt.value, 0, 0, 0, 0);
	
	if(be>en)
	{
		alert("Ngày bắt đầu phải sau ngày kết thúc");
		return false;
	}
	
	if(file.value==""){
		alert('Bạn chưa chọn file.');
		file.focus();
		return false;
		}
	return true;
	}
</script>
</head>
<body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0" class="yui3-skin-sam">
  
<table width="778" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tbody>
  
  <!--Bắt đầu của HEADER-->
  <tr> 
    <td height="26" valign="top"> 
      <script>
	
	function thoat() {
		if (confirm('Bạn có chắc muốn thoát không ?' )) {
			document.location = './logout.php';
			return;
		}
	}
</script>	 

<!--Thẻ hiển thị thông tin khi đăng nhập-->
<div style="Z-INDEX: 1; LEFT: 575px; WIDTH: 200px; POSITION: absolute; TOP: 53px; HEIGHT: 30px" align="center">
<font style="FONT-WEIGHT: 700; FONT-SIZE: 8pt; line-height:20px;" face="Tahoma" color="#FFFFFF">
	<a class="white" href="javascript:thoat();">Thoát</a>
    <br>Xin chào, <?=$_SESSION['hoten']?>
    <br>
	(<?php
	if($_SESSION['mshsvt']) echo $_SESSION['mshsvt'];
	?>)
    </font>
    </div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tbody><tr>
     <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
       <tbody><tr>
         <td class="tl_header">&nbsp;</td>
         <td class="tc_header">&nbsp;</td>
         <td class="tr_header">&nbsp;</td>
       </tr>
       <tr>
         <td class="cl_header">&nbsp;</td>
         <td class="cm_header"><table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tbody><tr>
             
             <td class="tittle_header">&nbsp;</td>
             
           </tr>
         </tbody></table></td>
         <td class="cr_header">&nbsp;</td>
       </tr>
       
     </tbody></table></td>
   </tr>
 </tbody></table>
    </td>
    
  </tr>
  <!--Kết thúc của HEADER-->
  <!--Bắt đàu của MAINPAGE-->
  <tr>
    <td valign="top" height="54%">
        <table border="0" cellpadding="0" cellspacing="0" width="752" align="center">
        <tbody>
        <!--MENU-->        
        <tr height="10">        
	   	<td align="center" colspan="3">
        <?php
		include_once('node-menunav-3.php');
		?> 
        </td>    
        </tr>
        <tr>
        <td align="center" >&nbsp;</td>
        <td align="center" >&nbsp;</td>
        <td align="center" >&nbsp;</td>
        </tr>
        <!--KET THUC MENU-->
        <tr>
    <td height="100%" align="center" valign="middle">   		 

        <table width="95%" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="./images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="80%" align="center">Thêm danh sách hội viên tham gia hoạt động</td>
          <td width="180" align="right"> <img height="25" src="./images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_capnhathoatdong" id="frm_capnhathoatdong" action="import_DSHV_hoatdong.php" enctype="multipart/form-data" method="post" target="export" onSubmit="return isValid(); window.open('', 'export', 'width=1350,height=660,status=yes,resizable=yes,scrollbars=yes')">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_2"></td>
                    <td class="level_1_2"></td>
                    <td width="88" class="level_1_2"></td>
                    <td class="level_1_2"></td>
              </tr>
             <tr>
					<td height="22" width="95" align="right" class="level_1_1">Năm học</td>
					<td width="251" align="left" class="level_1_1">
                    	<select name="cbo_tennamhoc" class="cbo" style="width:87%;" disabled>                      
                        </select>                       
                    </td>
                    <td height="22" align="right" class="level_1_1">Học kì</td>
					<td width="259" align="left" class="level_1_1">
                    	<select name="cbo_tenhocki" class="cbo" style="width:90%;">                      
                        </select>                       
                    </td>
			</tr>                       
            
            <tr>
					<td height="22" align="right" class="level_1_1">Chọn Hoạt động</td>
					<td align="left" class="level_1_1">
                    	<select name="cbo_tenhoatdong" id="cbo_tenhoatdong" class="cbo" style="width:87%;">                      
                        </select> 
                        <input type="button" id= "openButton" name="btnThemhoatdong" value="+">
<div id="panelContent">
    <div class="yui3-widget-hd">
        Thêm hoạt động mới
    </div>
    <div class="yui3-widget-bd" align="center">
        <table width="300">        
        <tr>
        <td align="right" width="20%" style="font-size:10pt">Tên</font></td>
        <td><input type="text" id="txt_tenhoatdong" name="txt_tenhoatdong" style="width:100%"></td>
        </tr>
        </table>        
    </div>
</div>                      
                    </td>			
					<td height="22" align="right" class="level_1_1">Ngày BĐ</td>
                    <td height="22" class="level_1_1">
 				<select name="cbo_ngaybd" id="cbo_ngaybd" class="cbo" style="width:25%;">
                	
				</select>	
                 <select name="cbo_thangbd" id="cbo_thangbd" class="cbo" style="width:25%;">
                	
				</select>	
                <select name="cbo_nambd" id="cbo_nambd" class="cbo" style="width:30%;">
                	
				</select>
		            </td>
			</tr>  
            <tr>
					<td align="right" class="level_1_1" valign="middle">Địa điểm</td>
                    <td align="left" width="251" class="level_1_1" valign="middle">
					<input type="text" name="txt_diadiem" id="txt_diadiem" style="width:87%" >
                    </td>                    					                    
                    <td height="22" align="right" class="level_1_1">Ngày KT</td>
                    <td height="22" class="level_1_1">
 				<select name="cbo_ngaykt" id="cbo_ngaykt" class="cbo" style="width:25%;">
                	
				</select>	
                 <select name="cbo_thangkt" id="cbo_thangkt" class="cbo" style="width:25%;">
                	
				</select>	
                <select name="cbo_namkt" id="cbo_namkt" class="cbo" style="width:30%;">
                	
				</select>
		            </td>
			</tr> 
            <tr>
            <td height="22" align="right" class="level_1_1">Nội dung</td>
            <td align="left" class="level_1_1" colspan="3">
			<textarea name="txta_noidung" id="txta_noidung" cols="70" rows="10">
            </textarea>	
            </td>
            </tr>
            <tr>
            <td height="22" align="right" class="level_1_1">Nhập danh sách</td>
            <td align="left" class="level_1_1" colspan="3">
                    	<input type="hidden" name="MAX_FILE_SIZE" value="100000">
						<input type="file" name="file_import" id="file_import" size="40">                       
                    </td>
            </tr>                        
                   
            <tr>
						<td colspan="4" height="22" align="center" class="level_1_2">
                        <input type="submit" name="btnImport" id = "btnImport" class="button_1" value="Lưu">
                        </td>
			</tr>
				  						  
            </tbody>
        </table>
        	</form>
       </td>
      </tr>		
      </tbody>
      </table>
	</td>
</tr>
</table>		
	</td>
  </tr>
  <!--Kết thúc của MAINPAGE-->
  <!--Bắt đàu của FOOTER-->
  <tr>
    <td valign="bottom">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody><!--<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>-->
  <tr>
    <td class="cl_footer">&nbsp;</td>
    <td class="cm_footer"><div align="right" class="copy"><!--Copyright © 2008 by <a href="http://www.cuscsoft.com" target="_blank" class="white"><strong>CUSC</strong></a>--></div></td>
    <td class="cr_footer">&nbsp;</td>
  </tr>
  <tr>
    <td class="bl_footer">&nbsp;</td>
    <td class="bc_footer">&nbsp;</td>
    <td class="br_footer">&nbsp;</td>
  </tr>
</tbody></table>
</td>
  </tr>
  <!--Kết thúc của FOOTER-->
</tbody></table>
</body>
<script>
    //  Call the "use" method, passing in "node-menunav".  This will load the
    //  script and CSS for the MenuNav Node Plugin and all of the required
    //  dependencies.
YUI().use('node-menunav', function(Y) {
        //  Retrieve the Node instance representing the root menu
        //  (<div id="productsandservices">) and call the "plug" method
        //  passing in a reference to the MenuNav Node Plugin.
        var menu = Y.one("#menu");
        menu.plug(Y.Plugin.NodeMenuNav);
        //  Show the menu now that it is ready
        menu.get("ownerDocument").get("documentElement").removeClass("yui3-loading");
    });
</script>
<script type="text/javascript">

YUI().use('transition', 'panel', function (Y) {

    var openBtn = Y.one('#openButton'),
        panel, bb;

    function showPanel() {
        panel.show();
        bb.transition({
            duration: 0.5,
            top     : '220px'
        });
    }

    function hidePanel() {
        bb.transition({
            duration: 0.5,
            top     : '-300px'
        }, function () {
            panel.hide();
        });
    }
	
    panel = new Y.Panel({
        srcNode: '#panelContent',
        width  : 330,
        xy     : [500, -300],
        zIndex : 5,
        modal  : true,
        visible: false,
        render : true,
        buttons: [
            {
                value  : 'Lưu',
                section: 'footer',
                action : function (e) {
						themhoatdong('themhoatdong.php',frm_capnhathoatdong);												
                }
            },
			{
                value  : 'Đóng',
                section: 'footer',
                action : function (e) {
                    e.preventDefault();
                    hidePanel();
                }
            }			
        ]
    });

    bb = panel.get('boundingBox');

    openBtn.on('click', function (e) {
        showPanel();
    });

});

</script>
</html>