<?php
	//khoi dong session
	/*session_start();
	
	//kiem tra quyen truoc khi hien thi trang
	if(!session_is_registered("maquyen") || $_SESSION['maquyen']!="AD")
	{
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	echo "<script language=javascript>window.location = 'loginUI.php';</script>"; 
	exit;
	}*/
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cập nhật phiếu kiểm kê</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">

<script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/fill.js"></script>
<script type="text/javascript" src="js/date.js"></script>
<script type="text/javascript" src="js/capnhatphieukiemke.js"></script>
<script type="text/javascript" >
//Không cho nhập ký tự
function keypress(e){
var keypressed = null;
if (window.event)
	keypressed = window.event.keyCode; //IE
else 
	keypressed = e.which; //NON-IE, Standard

if (keypressed >= 48 && keypressed <= 57)
{ 
	//CharCode của 0 là 48 (Theo bảng mã ASCII)
	//CharCode của 9 là 57 (Theo bảng mã ASCII)
	if (keypressed == 8 || keypressed == 127)
	{
	//Phím Delete và Phím Back
	return;
	}
	return false;
}
}
$(document).ready(function() { 
	fillcombo('get_list_loaikiemke.php',document.frm_themphieukiemke.cbo_loaikiemkethem);
	fillcombo('get_list_loaikiemke.php',document.frm_suaphieukiemke.cbo_loaikiemkesua);
	// Load ngay thang nam  cho nguoi dung chon them
	init_date_input(document.frm_themphieukiemke.cbo_ngaythem1,document.frm_themphieukiemke.cbo_thangthem1,document.frm_themphieukiemke.cbo_namthem1);
	init_date_input(document.frm_themphieukiemke.cbo_ngaythem2,document.frm_themphieukiemke.cbo_thangthem2,document.frm_themphieukiemke.cbo_namthem2);	
	//load ngay thang nam cho nguoi dung chon sua
	init_date_input(document.frm_suaphieukiemke.cbo_ngaysua1,document.frm_suaphieukiemke.cbo_thangsua1,document.frm_suaphieukiemke.cbo_namsua1);
	init_date_input(document.frm_suaphieukiemke.cbo_ngaysua2,document.frm_suaphieukiemke.cbo_thangsua2,document.frm_suaphieukiemke.cbo_namsua2);
	//load ngay thang nam cho nguoi dung chon xoa
	init_date_input(document.frm_xoaphieukiemke.cbo_ngayxoa1,document.frm_xoaphieukiemke.cbo_thangxoa1,document.frm_xoaphieukiemke.cbo_namxoa1);
	init_date_input(document.frm_xoaphieukiemke.cbo_ngayxoa2,document.frm_xoaphieukiemke.cbo_thangxoa2,document.frm_xoaphieukiemke.cbo_namxoa2);
	//su kien nhan button them
	/*$('form[name="frm_themban"] input[type="button"]').click(function(){
		themban('../themban.php',document.frm_themban);	
	});
	
	//su kien nhan button sua
	$('form[name="frm_suaban"] input[type="button"]').click(function(){
		suaban('../suaban.php',document.frm_suaban);	
	});	
	//su kien click button xoa
	$('form[name="frm_xoaban"] input[type="button"]').click(function(){
		if (confirm('Bạn có chắc chắn muốn xóa không ?' )) {
			xoaban('../xoaban.php',document.frm_xoaban);	
		}		
	});*/
}); 
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
		if (confirm('Ban co chac chan muon thoat khong ?' )) {
			document.location = '../logout.php';
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
	(<?=$_SESSION['msad']?>)
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
             
             <td class="tittle_header"><img src="../images/ctulogo1.gif" alt=""></td>
             
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
    <td valign="middle" height="54%">
    
        <table width="752" align="center" border="0" cellpadding="0" cellspacing="0">
        <!--MENU-->
        <tr height="10">        
			<td align="center" colspan="3">
			<?php
			include_once('node-menunav-3ad.php');
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
		 <table width="513" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="105" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="275" align="center">Thêm phiếu kiểm kê</td>
          <td width="133" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_themphieukiemke" id="frm_themphieukiemke">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
			  <tr>
			    <td height="22" align="right" class="level_1_2">Chọn loại kiểm kê:</td>
			    <td align="left" class="level_1_2"><label for="loaikk"></label>
			      <select name="cbo_loaikiemkethem" id="cbo_loaikiemkethem" style="width:100%">
			        </select></td>
			    <tr>
                 <td height="22" align="right" class="level_1_2">Ngày kiểm kê:</td>
                 <td align="left" class="level_1_2"><select name="cbo_ngaythem1" id="cbo_ngaythem1" style="width:60">
                 </select>
                   <label for="thktkk4">/</label>
                   <select name="cbo_thangthem1" id="cbo_thangthem1" style="width:70">
                   </select>
                   /
                   <select name="cbo_namthem1" id="cbo_namthem1" style="width:70">
                   </select></td>
               </tr>
               <tr>
                 <td height="22" align="right" class="level_1_1">Ngày kết thúc kiểm kê:</td>
                 <td align="left" class="level_1_1"><select name="cbo_ngaythem2" id="cb_ngaythem2" style="width:60">
                 </select>
                   <label for="thktkk5">/</label>
                   <select name="cbo_thangthem2" id="cbo_thangthem2" style="width:70">
                    
                   </select>
                   /<label for="namktkk5"></label>
                   <select name="cbo_namthem2" id="cbo_namthem2" style="width:70">
                   </select></td>
               </tr>
               <tr>
					<td height="22" align="right" class="level_1_2">Diễn giải:</td>
					<td width="50%" align="left" class="level_1_2"><textarea name="txt_diengiai" rows="5" class="txtbox" id="txt_diengiai" style="width:100%" onKeyPress="return keypress(event)"></textarea></td>
			</tr>
               <tr>
                 <td height="22" align="right" class="level_1_2">Chọn  mẫu có sẵng hoặc lập phiếu mới:</td>
                 <td height="22" align="left" class="level_1_2"><select name="select4" id="select3" style="width:100%">
                 </select></td>
               </tr>
               <tr>
                 <td height="22" align="right" class="level_1_2">&nbsp;</td>
                 <td height="22" align="left" class="level_1_2">&nbsp;</td>
               </tr>
               <tr>
                 <td colspan="2" height="22" align="center" class="level_1_1"><input type="button" class="button_1" id="btn_themphieukiemke" value="Thêm">
                   <input type="button" class="button_1" id="btn_themphieukiemke2" value="Export phiếu"></td>
               </tr>
			  
			  <tr>
              		<td colspan="2" height="22" align="center" class="level_1_2">
					</td>
              </tr>  
              </tbody>
           </table>
           </form>
          </td>
        </tr>		
        </tbody>
        </table>

        <table width="515" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="105" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="275" align="center">Sửa phiếu kiểm kê</td>
          <td width="135" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_suaphieukiemke" id="frm_suaphieukiemke">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
                <td height="22" class="level_1_1"></td>
                <td class="level_1_1"></td>
              </tr>
              <tr>
              		<td height="22" class="level_1_2" align="right">Chọn phiếu kiểm kê: </td>
                    <td width="50%" class="level_1_2"><select name="cbo_phieukiemkesua" id="cbo_phieukiemkesua"  style="width:100%">
                    </select></td>
              </tr>   
              <tr>
                <td height="22" align="right" class="level_1_1">Chọn loại kiểm kê:</td>
                <td height="22" align="center" class="level_1_1"><label for="select2"></label>
                  <select name="cbo_loaikiemkesua" id="cbo_loaikiemkesua" style="width:100%">
                  </select></td>
              </tr>
              <tr>
                <td height="22" align="right" class="level_1_1">Ngày kiểm kê:</td>
                <td align="left" class="level_1_1"><select name="cbo_ngaysua1" id="cbo_ngaysua1" style="width:60">
                  </select>
                  <label for="thktkk6">/</label>
                  <select name="cbo_thangsua1" id="cbo_thangsua1" style="width:70">
                    </select>
                  <label for="namktkk6">/</label>
                  <select name="cbo_namsua1" id="cbo_namsua1" style="width:70">
                    </select></td>
              </tr>
              <tr>
                <td height="22" align="right" class="level_1_2">Ngày kết thúc kiểm kê:</td>
                <td align="left" class="level_1_2"><select name="cbo_ngaysua2" id="cbo_ngaysua2" style="width:60">
                </select>
                  /<label for="thktkk2"></label>
                  <select name="cbo_thangsua2" id="cbo_thangsua2" style="width:70">
                  </select>
                  /<label for="namktkk2"></label>
                  <select name="cbo_namsua2" id="cbo_namsua2" style="width:70">
                  </select></td>
              </tr>
              <tr>
                <td height="22" align="right" class="level_1_1">Diễn giải:</td>
                <td height="22" align="center" class="level_1_1"><textarea name="txt_tenthietbi2" rows="5" class="txtbox" style="width:100%" onKeyPress="return keypress(event)"></textarea></td>
              </tr>
              <tr>
                <td height="22" align="right" class="level_1_2">Chọn  mẫu có sẵng hoặc lập phiếu mới:</td>
                <td height="22" align="left" class="level_1_2"><select name="select3" id="cbochonmau" style="width:100%">
                </select></td>
              </tr>
              <tr>
                <td height="22" align="right" class="level_1_2">&nbsp;</td>
                <td height="22" align="left" class="level_1_2">&nbsp;</td>
              </tr>
              <tr>
              <td colspan="2" height="22" align="center" class="level_1_2">
                <input type="button" class="button_1" id="btn_suaphieukiemke" value="Lưu"> 
                <input type="button" class="button_1" id="btn_suaphieukiemke2" value="Export phiếu"></td>
            </tr>
            <tr>
              <td colspan="2" height="22" align="center" class="level_1_1">&nbsp;</td>
            </tr>
				  						  
              </tbody>
        </table>
        	</form>
       </td>
      </tr>		
      </tbody>
      </table>

        <table width="515" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="105" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="275" align="center">Xóa phiếu kiểm kê</td>
          <td width="135" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_xoaphieukiemke" id="frm_xoaphieukiemke">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
             <tr>
					<td height="22" align="right" class="level_1_2">Chọn phiếu kiểm kê: </td>
					<td width="50%" align="left" class="level_1_2">
                    	<select name="cbo_phieukiemkexoa" class="cbo" id="cbo_phieukiemkexoa" style="width:100%;">
                        </select>                       
                    </td>
					
			</tr>
             <tr >
               <td height="22" align="right" class="level_1_1">Tên phiếu kiểm kê: </td>
               <td align="left" class="level_1_1"><label for="txttenpkk"></label>
                 <input type="text" name="txttenpkk2" id="txttenpkk" style="width:100%"></td>
             <tr>
               <td height="22" align="right" class="level_1_2">Ngày kiểm kê:</td>
               <td align="left" class="level_1_2"><label for="ngktkk7"></label>
                 <select name="cbo_ngayxoa1" id="cbo_ngayxoa1" style="width:60">
                   
                 </select>
                 <label for="thktkk7">/</label>
                 <select name="cbo_thangxoa1" id="cbo_thangxoa1" style="width:70">
                
                 </select>
                 <label for="namktkk7">/</label>
                 <select name="cbo_namxoa1" id="cbo_namxoa1" style="width:70">
                 </select></td>
             </tr>
             <tr>
               <td height="22" align="right" class="level_1_1">Ngày kết thúc kiểm kê:</td>
               <td align="left" class="level_1_1"><label for="ngktkk8"></label>
                 <select name="cbo_ngayxoa2" id="cbo_ngayxoa2" style="width:60">
                 
                 </select>
                 <label for="thktkk8">/</label>
                 <select name="cbo_thangxoa2" id="cbo_thangxoa2" style="width:70">
                 
                 </select>
                 <label for="namktkk8">/</label>
                 <select name="cbo_namxoa2" id="cbo_namxoa2" style="width:70">
                  </select></td>
             </tr>
             <tr>
               <td height="22" align="right" class="level_1_2">Diễn giải:</td>
               <td align="left" class="level_1_2"><textarea name="txt_tenthietbi2" rows="5" class="txtbox" style="width:100%" onKeyPress="return keypress(event)"></textarea></td>
             </tr>
             <tr>
               <td colspan="2" height="22" align="center" class="level_1_1">
                 <input type="button" class="button_1" id="btn_xoaphieukiemke" value="Xóa">
                 </td>
             </tr>
            <tr>
              <td colspan="2" height="22" align="center" class="level_1_2">&nbsp;</td>
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
  <tbody>
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
        var menu = Y.one("#admin");
        menu.plug(Y.Plugin.NodeMenuNav);
        //  Show the menu now that it is ready
        menu.get("ownerDocument").get("documentElement").removeClass("yui3-loading");
    });
</script>
</html>

