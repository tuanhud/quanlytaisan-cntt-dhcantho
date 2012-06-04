<?php	
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
			<a class="white" href="capnhatthongtincanhancbqlbm.php">Cập nhật thông tin cá nhân</a> | <a class="white" href="javascript:thoat();">Thoát</a>
    		<br>
    		Xin chào, <?=$_SESSION['hoten']?>
    		<br>(<?=$_SESSION['msclb']?>)    
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
      
      <table width="50%" height="280" border="0" align="center" cellpadding="0" cellspacing="0">
          <tbody><tr>
            <td class="tl_main">&nbsp;</td>
            <td class="tc_main">&nbsp;</td>
            <td class="tr_main">&nbsp;</td>
          </tr>
          <tr>
            <td class="cl_main">&nbsp;</td>
            <td style="font-family:Arial, Helvetica, sans-serif; font-size:12px">
            	<table width="100%" border="0" cellspacing="0" cellpadding="0">                
                <tbody ><tr>
                  <td colspan="2"><div align="center" class="textbold">THÔNG TIN CÁN BỘ </div></td>
                </tr>
        
                <tr>
                  <td colspan="2">&nbsp;</td>
                  </tr>
                <tr>
                  <td width="20%" class="bordersv"><div class="bg" align="right">Mã CB </div></td>
                  <td width="55%" class="bordersv"><div class="bold" align="left"><?=$_SESSION['msclb']?></div></td>
                </tr>
                <tr>
                <? 
				//Select thong tin nguoi dung				
				include('../database.php');				
				$user = new database();
				$sql = "Select * from nguoidung where MSCB = '".$_SESSION['msclb']."'";
				$msclb =$_SESSION['msclb'];
			    session_register("msclb") ;
				$user->setQuery($sql);
				$result = $user->fetchAll();
				$row = mysql_fetch_array($result);
				?>
                  <td class="bordersv"><div class="bg" align="right">Họ tên</div></td>
                  <td class="bordersv"><div class="bold" align="left"><?=$row['TenCB']?></div></td>
                </tr>
                 <tr>
                  <td class="bordersv"><div class="bg" align="right">Ngày sinh</div></td>
                  <td class="bordersv"><div class="bold" align="left"><?=$row['NgaySinh']?>/<?=$row['ThangSinh']?>/<?=$row['NamSinh']?></div></td>
                </tr>
                 <tr>
                  <td class="bordersv"><div class="bg" align="right">Giới tính</div></td>
                  <td class="bordersv"><div class="bold" align="left"><?=$row['Gioitinh']?></div></td>
                </tr>
                <tr>
                  <td class="bordersv"><div class="bg" align="right">Email</div></td>
                  <td class="bordersv"><div class="bold" align="left"><?=$row['Email']?></div></td>
                </tr>
                <tr>
                  <td class="bordersv"><div class="bg" align="right">Địa chỉ</div></td>
                 
                  <td class="bordersv"><div class="bold" align="left"><?=$row['Diachi']?></div></td>
                </tr>
                <tr>
                  <td class="bordersv"><div class="bg" align="right">Số ĐT</div></td>
                  <td class="bordersv"><div class="bold" align="left"><?=$row['SDT']?></div></td>
                </tr>
                <tr>
                  <td class="bordersv"><div class="bg" align="right">Bộ môn</div></td>                  
                  <?
				  //hien thi ten khoa
				  $sql = "Select * from nguoidung, donvi  where nguoidung.MSDV = donvi.MSDV  and nguoidung.MSCB = '".$_SESSION['msclb']."'";
				  $user->setQuery($sql);
                  $result = $user->fetchAll();
				  $row = mysql_fetch_array($result);
				  ?>
                  <td class="bordersv"><div class="bold" align="left"><?=$row['TenDV']?></div></td>
                </tr>                
                <tr>
                  <td class="bordersv"><div class="bg" align="right">Khoa</div></td>                  
                  <td class="bordersv"><div class="bold" align="left">Công Nghệ Thông tin &amp; TT </div></td>
                </tr>
                <tr>
                  <td class="bordersv">&nbsp;</td>
                  <td class="bordersv">&nbsp;</td>
                </tr>
            </tbody></table></td>
            <td class="cr_main">&nbsp;</td>
          </tr>
          <tr>
            <td class="bl_main">&nbsp;</td>
            <td class="bc_main">&nbsp;</td>
            <td class="br_main">&nbsp;</td>
          </tr>
        </tbody></table>
        
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
</tbody>

</table>
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
