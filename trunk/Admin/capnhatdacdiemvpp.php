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
<title>Cập nhật đặc điểm của văn phòng phẩm</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">

<script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/fill.js"></script>
<script type="text/javascript" src="js/capnhatdacdiem.js"></script>
<script type="text/javascript" >
$(document).ready(function() { 
		fillcombo2('get_list_dacdiem.php',document.frm_xoadd.cbo_tenddxoa);
		fillcombo2('get_list_dacdiem.php',document.frm_suadd.cbo_tenddsua);
		fillcombo('get_list_vpp.php',document.frm_themddvpp.cbo_tenvppthem);
		fillcombo2('get_list_dacdiem.php',document.frm_themddvpp.cbo_dacdiemvppthem);
		fillcombo('get_list_vpp2.php',document.frm_suaddvpp.cbo_vppsua);
		fillcombo('get_list_vpp2.php',document.frm_xoaddvpp.cbo_vppxoa);
		$('form[name="frm_suaddvpp"] select[name="cbo_vppsua"]').change(function(){
		_fillcombo('get_list_dacdiem2.php',document.frm_suaddvpp.cbo_vppsua, document.frm_suaddvpp.cbo_ddvppsua);
	});
	$('form[name="frm_xoaddvpp"] select[name="cbo_vppxoa"]').change(function(){
		_fillcombo('get_list_dacdiem2.php',document.frm_xoaddvpp.cbo_vppxoa, document.frm_xoaddvpp.cbo_ddvppxoa);
	});
		$('form[name="frm_suadd"] select[name="cbo_tenddsua"]').change(function(){
		get_info_dacdiem('get_info_dacdiem.php',document.frm_suadd);
		});
		
		$('form[name="frm_suaddvpp"] select[name="cbo_ddvppsua"]').change(function(){
		get_info_chitiet('get_info_ddvpp.php',document.frm_suaddvpp);
		});
		$('form[name="frm_xoaddvpp"] select[name="cbo_ddvppxoa"]').change(function(){
		get_info_chitiet2('get_info_ddvpp.php',document.frm_xoaddvpp);
		});
		$('form[name="frm_xoadd"] select[name="cbo_tenddxoa"]').change(function(){
		get_info_dacdiem2('get_info_dacdiem.php',document.frm_xoadd);
		});
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
             
             <td class="tittle_header"><img src="../images/ctulogo1.gif"></td>
             
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
		 <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Thêm đặc điểm thuộc VPP</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_themddvpp" id="frm_themddvpp">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
               <tr>
					<td height="22" align="right" class="level_1_2">Chọn  văn phòng phẩm</td>
					<td width="50%" align="left" class="level_1_2">
                    	<select name="cbo_tenvppthem" id="cbo_tenvppthem" class="cbo" style="width:100%;">
                        </select>                       
                    </td>
			</tr> 
             <tr>
               <td height="30" align="right" class="level_1_1">Chọn  đặc điểm văn phòng phẩm</td>
               <td width="50%" align="left" class="level_1_1">
                 <select name="cbo_dacdiemvppthem" id="cbo_dacdiemvppthem" class="cbo" style="width:75%;">
                   </select>
                 <a href="#themdacdiem"><input type="button" class="button_1" value="Thêm"></a></td>
             </tr>  
             <tr>
               <td height="22" align="right" class="level_1_2">Chi tiết đặc điểm của văn phòng phẩm</td>
               <td width="50%" align="left" class="level_1_2"><textarea name="txt_ghichuddvppthem" id="txt_ghichuddvppthem" rows="3" class="txtbox" style="width:100%"></textarea></td>
             </tr>         
              <tr>
                <td colspan="2" height="22" align="center" class="level_1_1"><input type="button" name="btn_themddvpp" id="btn_themddvpp" class="button_1" value="Thêm"></td>
              </tr>
			   
              </tbody>
           </table>
           </form>
          </td>
        </tr>		
        </tbody>
        </table>
       <br>
         <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Sửa đặc điểm thuộc VPP</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_suaddvpp" id="frm_suaddvpp">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
             <tr>
             <td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
               <tr>
					<td height="22" align="right" class="level_1_2">Chọn văn phòng phẩm</td>
					<td width="50%" align="left" class="level_1_2">
                    	<select name="cbo_vppsua" id="cbo_vppsua" class="cbo" style="width:100%;">
                        </select>                       
                    </td>
			</tr> 
             <tr>
               <td height="22" align="right" class="level_1_1">Chọn đặc điểm văn phòng phẩm</td>
               <td width="50%" align="left" class="level_1_1">
                 <select name="cbo_ddvppsua" id="cbo_ddvppsua" class="cbo" style="width:100%;">
                   </select>                       
                 </td>
             </tr>  
             <tr>
               <td height="22" align="right" class="level_1_2">Chi tiết đặc điểm của văn phòng phẩm</td>
               <td width="50%" align="left" class="level_1_2"><textarea name="txt_ghichuddvppsua" id="txt_ghichuddvppsua" rows="3" class="txtbox" style="width:100%"></textarea></td>
             </tr>
            <tr>
              <td colspan="2" height="22" align="center" class="level_1_1">
                <input type="button" name="btn_suaddvpp" id="btn_suaddvpp" class="button_1" value="Lưu">
                </td>
            </tr>
				  						  
            </tbody>
        </table>
        	</form>
       </td>
      </tr>		
      </tbody>
      </table>
  <br>
        <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Xóa đặc điểm thuộc VPP</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_xoaddvpp" id="frm_xoaddvpp">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
             <tr>
             <td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
               <tr>
					<td height="22" align="right" class="level_1_2">Chọn  văn phòng phẩm</td>
					<td width="50%" align="left" class="level_1_2">
                    	<select name="cbo_vppxoa" id="cbo_vppxoa" class="cbo" style="width:100%;">
                        </select>                       
                    </td>
			</tr> 
             <tr>
               <td height="22" align="right" class="level_1_1">Chọn  đặc điểm văn phòng phẩm</td>
               <td width="50%" align="left" class="level_1_1">
                 <select name="cbo_ddvppxoa" id="cbo_ddvppxoa" class="cbo" style="width:100%;">
                   </select>                       
                 </td>
             </tr>  
             <tr>
               <td height="22" align="right" class="level_1_2">Chi tiết đặc điểm của văn phòng phẩm</td>
               <td width="50%" align="left" class="level_1_2"><textarea name="txt_chitietddvppxoa" id="txt_chitietddvppxoa" rows="3" class="txtbox" style="width:100%"></textarea></td>
             </tr>
            <tr>
              <td colspan="2" height="22" align="center" class="level_1_1">
                <input type="button" name="btn_xoaddvpp" id="btn_xoaddvpp" class="button_1" value="Xóa">
                </td>
            </tr>
				  						  
            </tbody>
        </table>
        	</form>
       </td>
      </tr>		
      </tbody>
      </table>
        <a name="themdacdiem"></a><br>
   <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
        <td width="121" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="260" align="center">Thêm đặc điểm</td>
          <td width="119" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_themdd" id="frm_themdd">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
             <tr>
             <td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
               <tr>
                 <td height="29" align="right" class="level_1_2">Đặc điểm của văn phòng phẩm</td>
                 <td width="50%" align="left" class="level_1_2">
                   <input name="txt_tenddthem" id="txt_tenddthem" type="text" class="txtbox" style="width:100%"></td>
               </tr>  
             <tr>
               <td height="22" align="right" class="level_1_1">Ghi chú đặc điểm</td>
               <td width="50%" align="left" class="level_1_1"><textarea name="txt_ghichuddthem" id="txt_ghichuddthem" rows="3" class="txtbox" style="width:100%"></textarea></td>
             </tr>
            <tr>
              <td colspan="2" height="22" align="center" class="level_1_2">
                <input type="button" name="btn_themdd" id="btn_themdd" class="button_1" value="Thêm">
                </td>
            </tr>
				  						  
            </tbody>
        </table>
        	</form>
       </td>
      </tr>		
      </tbody>
      </table>
        <br>
   <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Sửa đặc điểm </td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_suadd" id="frm_suadd">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
             <tr>
             <td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
               <tr>
                 <td height="29" align="right" class="level_1_2">Chọn đặc điểm của văn phòng phẩm</td>
                 <td width="50%" align="left" class="level_1_2">
                   <select name="cbo_tenddsua" id="cbo_tenddsua" class="cbo" style="width:100%;">
                        </select> </td>
               </tr>
               <tr>
                 <td height="29" align="right" class="level_1_1">Đặc điểm của văn phòng phẩm mới</td>
                 <td width="50%" align="left" class="level_1_1"><input name="txt_tenddsua" id="txt_tenddsua" type="text" class="txtbox" style="width:100%"></td>
               </tr>    
             <tr>
               <td height="22" align="right" class="level_1_2">Ghi chú đặc điểm mới</td>
               <td width="50%" align="left" class="level_1_2"><textarea name="txt_ghichuddsua" id="txt_ghichuddsua" rows="3" class="txtbox" style="width:100%"></textarea></td>
             </tr>
            <tr>
              <td colspan="2" height="22" align="center" class="level_1_1">
                <input type="button" name="btn_luudd" id="btn_luudd" class="button_1" value="Lưu">
                </td>
            </tr>
				  						  
            </tbody>
        </table>
        	</form>
       </td>
      </tr>		
      </tbody>
      </table>
  <br>
        <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Xóa đặc điểm </td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_xoadd" id="frm_xoadd">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
           <tr>
                 <td height="29" align="right" class="level_1_2">Đặc điểm của văn phòng phẩm cần xóa</td>
                 <td width="50%" align="left" class="level_1_2">
                   <select name="cbo_tenddxoa" id="cbo_tenddxoa" class="cbo" style="width:100%;">
                        </select></td>
               </tr>  
             <tr>
               <td height="22" align="right" class="level_1_1">Ghi chú đặc điểm của văn phòng phẩm </td>
               <td width="50%" align="left" class="level_1_1"><textarea name="txt_ghichuddxoa" id="txt_ghichuddxoa" rows="3" disabled class="txtbox" style="width:100%"></textarea></td>
             </tr>
               
             <tr>
						<td colspan="2" height="22" align="center" class="level_1_2">
                        <input type="button" name="btn_xoadd" id="btn_xoadd" class="button_1" value="Xóa">
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

