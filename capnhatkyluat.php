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
<title>Cập nhật kỷ luật</title>
<link rel="stylesheet" type="text/css" href="./css/style.css">
<!--<link rel="stylesheet" type="text/css" href="./css/autocomplete-list.css">-->
<link rel="stylesheet" type="text/css" href="css/datatable-sort.css">
<link rel="stylesheet" type="text/css" href="css/panel.css">
<script type="text/javascript" src="js/yui-min_3.5.js"></script>

<script type="text/javascript" src="./js/jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="./js/date.js"></script>
<script type="text/javascript" src="./js/ajax.js"></script>
<script type="text/javascript" src="./js/namhochocki.js"></script>
<script type="text/javascript" src="./js/capnhatkyluat.js"></script>
<script type="text/javascript" src="./js/kyluat.js"></script>
<script type="text/javascript" src="./js/fill.js"></script>
<script type="text/javascript" >
$(document).ready(function() { 
	fillcombo('./get_list_namhoc.php',document.frm_capnhatkyluat.cbo_tennamhoc);
	get_cur_namhoc('./get_cur_namhoc.php',document.frm_capnhatkyluat);
	_fillcombo('./get_list_hocki.php',document.frm_capnhatkyluat.cbo_tennamhoc, document.frm_capnhatkyluat.cbo_tenhocki);
	get_cur_hocki('./get_cur_hocki.php',document.frm_capnhatkyluat);
	fillcombo('./get_list_lchsv.php',document.frm_capnhatkyluat.cbo_tenlchsv);	
	fillcombo('./get_list_kyluat.php',document.frm_capnhatkyluat.cbo_tenkyluat);
	init_date_input(document.frm_capnhatkyluat.cbo_ngay,document.frm_capnhatkyluat.cbo_thang,document.frm_capnhatkyluat.cbo_nam);	


	//su kien chon LCHSV
	$('form[name="frm_capnhatkyluat"] select[name="cbo_tenlchsv"]').change(function(){		
		_fillcombo('./get_list_chsv.php',document.frm_capnhatkyluat.cbo_tenlchsv, document.frm_capnhatkyluat.cbo_tenchsv);
	});
	//su kien chon CHSV
	$('form[name="frm_capnhatkyluat"] select[name="cbo_tenchsv"]').change(function(){		
		autoComplete('./get_list_hoivien1.php',document.frm_capnhatkyluat);
	});		
});

function isValid(){
	kyluat = document.frm_capnhatkyluat.cbo_tenkyluat;
	ngay = document.frm_capnhatkyluat.cbo_ngay;
	thang = document.frm_capnhatkyluat.cbo_thang;
	nam = document.frm_capnhatkyluat.cbo_nam;
	quyetdinh = document.frm_capnhatkyluat.txt_quyetdinh;
	file = document.frm_capnhatkyluat.file_import;	
	if(kyluat.value==-1){
		alert('Bạn chưa chọn hình thức kỷ luật.');
		kyluat.focus();
		return false;
		}
	
	if(!isValidDate_2(ngay.value,thang.value,nam.value)){
		alert('Ngày kỷ luật không hợp lệ.');
		ngay.focus();
		return false;
		}
	if(quyetdinh.value==""){
		alert('Số quyết định không được rỗng.');
		quyetdinh.focus();
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
          <td width="80%" align="center">Cập nhật kỷ luật</td>
          <td width="180" align="right"> <img height="25" src="./images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_capnhatkyluat" action="import_DSHV_kyluat.php" enctype="multipart/form-data" method="post" target="export" onSubmit="return isValid();window.open('', 'export', 'width=1350,height=660,status=yes,resizable=yes,scrollbars=yes')">
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
					 <td height="22" width="95" align="right" class="level_1_1">Chọn LCHSV</td>
					<td width="251" align="left" class="level_1_1">
                    	<select name="cbo_tenlchsv" class="cbo" style="width:87%;">                      
                        </select>                       
                    </td>
					<td height="22" align="right" class="level_1_1">Chọn CHSV</td>
					<td width="259" align="left" class="level_1_1">
                    	<select name="cbo_tenchsv" class="cbo" style="width:90%;">                      
                        </select>                       
                    </td>
			</tr>
            
            <tr>
					<td height="22" align="right" class="level_1_1">Chọn Hình thức</td>
					<td align="left" class="level_1_1">
                    	<select name="cbo_tenkyluat" class="cbo" style="width:87%;">                      
                        </select> 
                        <input type="button" id= "openButton" name="btnThemHTKL" value="+">
<div id="panelContent">
    <div class="yui3-widget-hd">
        Thêm Hình thức kỷ luật mới
    </div>
    <div class="yui3-widget-bd" align="center">
        <table width="300">        
        <tr>
        <td align="right" width="20%" style="font-size:10pt">Tên</font></td>
        <td><input type="text" id="txt_tenHTKL" name="txt_tenkyluat" style="width:100%"></td>
        </tr>
        <tr>
        <td align="right" style="font-size:10pt">Ghi chú</td>
        <td><textarea cols="15" rows="3" name="txta_ghichu" id="txt_ghichu" style="width:100%"></textarea></td>
        </tr>
        </table>        
    </div>
</div>                      
                    </td>			
					<td align="right" class="level_1_1" valign="middle">
					Tên hội viên
                    </td>
                    <td align="left" width="259" class="level_1_1" valign="middle">
                    <div id="demo" class="yui3-skin-sam">
					<input type="text" id="txt_tenhoivien" style="width:90%">
                    </div>
                    </td>
			</tr>  
            <tr>
					<td align="center" class="level_1_1" valign="middle">
					Quyết định
                    </td>
                    <td align="left" width="251" class="level_1_1" valign="middle">
					<input type="text" name="txt_quyetdinh" style="width:50%" onKeyPress="return keypress(event)" maxlength="3">
                    </td>                    					                    
                    <td height="22" align="right" class="level_1_1">Ngày KL</td>
                    <td height="22" class="level_1_1">
 				<select name="cbo_ngay" class="cbo" style="width:25%;">
                	
				</select>	
                 <select name="cbo_thang" class="cbo" style="width:25%;">
                	
				</select>	
                <select name="cbo_nam" class="cbo" style="width:30%;">
                	
				</select>
		            </td>
			</tr> 
            <tr>
            <td height="22" align="right" class="level_1_1">Nhập danh sách</td>
            <td align="left" class="level_1_1" colspan="3">
                    	<input type="hidden" name="MAX_FILE_SIZE" value="100000">
						<input type="file" name="file_import" size="40">
                        <input type="submit" name="btnImport" id="btnImport" class="button_1" value="Import">
                    </td>
            </tr>
                 <tr>
					<td align="center" height="300" class="level_1_1" colspan="4" valign="top">
                    <div class="yui3-skin-sam">                    
                    <div id="mytable"></div>
                    <button type="button" id="btnXoa" title="Xóa các mẫu tin đã chọn" style="border:none; background-color:transparent; float:left; visibility:hidden">
                    <img src="images/drop.png" title="Xóa các mẫu tin đã chọn" height="16">
                    </button>
                    </div>
                    </td>
			</tr>               
                   
            <tr>
						<td colspan="4" height="22" align="center" class="level_1_2">
                        <input type="button" name="btnSave" id = "btnSave" class="button_1" value="Lưu">
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
						themKyluat('themkyluat.php',frm_capnhatkyluat);						
						fillcombo('./get_list_kyluat.php',document.frm_capnhatkyluat.cbo_tenkyluat);							                    
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