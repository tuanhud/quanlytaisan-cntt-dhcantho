-<?php	
	//khoi dong session
	session_start();	
	//kiem tra quyen truoc khi hien thi trang
	//if(!session_is_registered("maquyen") || $_SESSION['maquyen']!="BCHCHSV")
	//{
	////echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cán bộ quản lý bộ môn</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script>	
	function thoat() {
		if (confirm('Ban co chac chan muon thoat khong ?' )) {
			document.location = '../logout.php';
			return;
		}
	}
</script>
</head>
<body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0" ondragstart="return false" onselectstart="return false" class="yui3-skin-sam">  
<table width="778" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tbody>  
  <!--Bắt đầu của HEADER-->
  <tr> 
    <td height="26" valign="middle">       	 
	<!--Thẻ hiển thị thông tin khi đăng nhập-->
	<div style="Z-INDEX: 1; LEFT: 557px; WIDTH: 200px; POSITION: absolute; TOP: 55px; HEIGHT: 30px" align="center">
		<font style="FONT-WEIGHT: 700; FONT-SIZE: 8pt; line-height:20px;" face="Tahoma" color="#FFFFFF">
			<a class="white" href="doimatkhauUI.php">Cập nhật thông tin cá nhân</a> | <a class="white" href="javascript:thoat();">Thoát</a>
    		<br>
    		Xin chào, <?=$_SESSION['hoten']?>
    		<br>(<?=$_SESSION['mschsv']?>)    
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
         <td class="cm_header">
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
         <tbody>
           <tr>            
             <td class="tittle_header"><img src="../images/ctulogo1.gif"></td>             
           </tr>
         </tbody>
         </table>
         </td>
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
	<td height="50%" valign="middle">
    	<table align="center" border="0" cellpadding="0" cellspacing="0" width="752">      
	    <tbody>
        <tr height="10">        
	   	<td align="center" colspan="3">
        <?php
		include_once('node-menunav-3.php');
		?> 
        </td>
	    <!--<td align="center" >&nbsp;</td>
	    <td align="center">&nbsp;</td>-->
	    </tr>
        <tr>
        <td align="center" >&nbsp;</td>
        <td align="center" >&nbsp;</td>
        <td align="center" >&nbsp;</td>
        </tr>                        
      <tr>
      <!--BẮT ĐẦU LEFT MAIN INFO-->
      <td align="center" width="100%">
      
      <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Lập phiếu dự trù văn phòng phẩm</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td colspan="3" align="left">
          	<form name="frm_themban">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<td height="22" colspan="2" class="level_1_1"></td>
                    </tr>
            <tr>
              <td width="50%" height="30" align="right" class="level_1_1">Năm áp dụng</td>
              <td width="50%" align="left" class="level_1_1"><select name="cbo_tenloaithietbi" class="cbo" style="width:100%;">
              </select></td>
            </tr>    
             <tr>
					<td height="22" align="right" class="level_1_2">Quý áp dụng</td>
					<td width="50%" align="left" class="level_1_2"><select name="cbo_tenloaithietbi" class="cbo" style="width:100%;">
					  </select></td>
			</tr>
             <tr>
					<td height="22" align="right" class="level_1_1">Phiếu dự toán của đơn vị</td>
					<td width="50%" align="left" class="level_1_1"><select name="cbo_tenloaithietbi" class="cbo" style="width:100%;">
					  </select></td>
			</tr>   
                <tr>
					<td height="22" colspan="2" align="left" class="level_1_2"><em><strong>Chi tiết văn phòng phẩm:</strong> (Check vào ô và điền số lượng, đơn giá tương ứng)</em></td>
					</tr>
             <tr>
					<td height="22" colspan="2" align="right" class="level_1_1">&nbsp;</td>
					</tr>          
              <tr>
                <td colspan="2" height="22" align="center" class="level_1_2"><input type="button" class="button_1" value="Lập"></td>
              </tr>
			  
	
              </tbody>
           </table>
           </form>
          </td>
        </tr>		
        </tbody>
        </table>
<br/>
        <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Sửa phiếu dự trù văn phòng phẩm</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td height="165" colspan="3" align="left">
          	<form name="frm_suaban">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
              <tr>
              		<tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Chọn mã phiếu dự toán</td>
					<td width="50%" align="left" class="level_1_2">
                    	<select name="cbo_tenloaithietbi" class="cbo" style="width:100%;">
                        </select>                       
                    </td>
			</tr>
            <tr>
					<td width="50%" height="30" align="right" class="level_1_1">Năm áp dụng</td>
              <td width="50%" align="left" class="level_1_1"><select name="cbo_tenloaithietbi" class="cbo" style="width:100%;">
              </select></td>
            </tr>    
             <tr>
					<td height="22" align="right" class="level_1_2">Quý áp dụng</td>
					<td width="50%" align="left" class="level_1_2"><select name="cbo_tenloaithietbi" class="cbo" style="width:100%;">
					  </select></td>
			</tr>
             <tr>
					<td height="22" align="right" class="level_1_1">Phiếu dự toán của đơn vị</td>
					<td width="50%" align="left" class="level_1_1"><select name="cbo_tenloaithietbi" class="cbo" style="width:100%;">
					  </select></td>
			</tr>   
                <tr>
					<td height="22" colspan="2" align="left" class="level_1_2"><em><strong>Chi tiết văn phòng phẩm:</strong> (Check vào ô và điền số lượng, đơn giá tương ứng)</em></td>
					</tr>
             <tr>
					<td height="22" colspan="2" align="right" class="level_1_1">&nbsp;</td>
			</tr>         
            <tr>
              <td colspan="2" height="22" align="center" class="level_1_1">
                <input type="button" class="button_1" value="Lưu">
                </td>
            </tr>
				  						  
            </tbody>
        </table>
        	</form>
       </td>
      </tr>		
      </tbody>
      </table>

   <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr class="main_1">
          <td width="161" align="left"> <img height="25" src="../images/giaodienchung/tbl_left.gif" width="10" border="0"></td>
          <td width="419" align="center">Xóa phiếu dự trù văn phòng phẩm</td>
          <td width="180" align="right"> <img height="25" src="../images/giaodienchung/tbl_right.gif" width="10" border="0"></td>
        </tr>
        <tr>
          <td height="165" colspan="3" align="left">
          	<form name="frm_suaban">
            <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">             		
              <tbody>
                <tr>
              		<td height="22" class="level_1_1"></td>
                    <td class="level_1_1"></td>
              </tr>
              <tr>
					<td height="22" align="right" class="level_1_2">Chọn mã phiếu dự toán</td>
					<td width="50%" align="left" class="level_1_2">
                    	<select name="cbo_tenloaithietbi" class="cbo" style="width:100%;">
                        </select>                       
                    </td>
			</tr>
            <tr>
					<td width="50%" height="30" align="right" class="level_1_1">Năm áp dụng</td>
              <td width="50%" align="left" class="level_1_1"><input name="txt_tendonvithem" type="text" disabled class="txtbox" id="txt_tendonvithem" style="width:100%" onKeyPress="return keypress(event)" value="" maxlength="31"></td>
            </tr>    
             <tr>
					<td height="22" align="right" class="level_1_2">Quý áp dụng</td>
					<td width="50%" align="left" class="level_1_2"><input name="txt_tendonvithem" type="text" disabled class="txtbox" id="txt_tendonvithem" style="width:100%" onKeyPress="return keypress(event)" value="" maxlength="31"></td>
			</tr>
             <tr>
					<td height="22" align="right" class="level_1_1">Phiếu dự toán của đơn vị</td>
					<td width="50%" align="left" class="level_1_1"><input name="txt_tendonvithem" type="text" disabled class="txtbox" id="txt_tendonvithem" style="width:100%" onKeyPress="return keypress(event)" value="" maxlength="31"></td>
			</tr>         
            <tr>
              <td colspan="2" height="22" align="center" class="level_1_1">
                <input type="button" class="button_1" value="Xóa">
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
      <!--KẾT THÚC LEFT MAIN INFO-->            
      </tr>   
    </tbody></table></td>
  </tr>
  <!--Kết thúc của MAINPAGE-->
  <!--Bắt đàu của FOOTER-->
  <tr>
    <td valign="bottom">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody><tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
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
        var menu = Y.one("#chsv");
        menu.plug(Y.Plugin.NodeMenuNav);
        //  Show the menu now that it is ready
        menu.get("ownerDocument").get("documentElement").removeClass("yui3-loading");
    });
</script>
</html>
