<?php	
	//khoi dong session
	session_start();

	//kiem tra quyen truoc khi hien thi trang
	/*if(!session_is_registered("maquyen") || $_SESSION['maquyen']!="AD")
	{
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	echo "<script language=javascript>window.location = 'loginUI.php';</script>"; 
	hello exit;
	}*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cập nhật đơn vị</title>
    <link rel="stylesheet" href="../jqwidgets/styles/jqx.base.css" media="screen" />
    <link rel="stylesheet" href="../jqwidgets/styles/jqx.classic.css" media="screen" />
    <link rel="stylesheet" href="../styles/site.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../styles/style.css" media="screen" />
    <script type="text/javascript" src="../scripts/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="../scripts/demofunctions.js"></script>
    <script type="text/javascript" src="../jqwidgets/globalization/jquery.global.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxtabs.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxcheckbox.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxwindow.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxpanel.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxdocking.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxnavigationbar.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxcombobox.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxnumberinput.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxmaskedinput.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxslider.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxdropdownbutton.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxcolorpicker.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxprogressbar.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxtree.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxcheckbox.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxsplitter.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxradiobutton.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxexpander.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxgrid.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxmenu.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxgrid.selection.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxgrid.sort.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxpanel.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxcalendar.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxdatetimeinput.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxdata.js"></script>
    <script type="text/javascript" src="../scripts/initwidgets.js"></script>
    <script type="text/javascript" src="../scripts/gettheme.js"></script>
    <script type="text/javascript" src="js/ajax.js"></script>
	<script type="text/javascript" src="js/fill.js"></script>
    <script type="text/javascript" src="js/date.js"></script>
    <script type="text/javascript" src="js/capnhatphieukiemke.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            initmenu();
            $("#parentTable").height(1600);	
            setTimeout(function()
            {
                $("#demoContent").css('visibility', 'visible');		
                initwidgets();
                $("#loader").css('display', 'none');
            }, 1000);
            var theme = getTheme();
            $("#jqxMenu").jqxMenu({height: '36px', theme: theme });
            $("#jqxMenu").css('visibility', 'visible'); 
			//$("#jqxMenu").jqxMenu({ showTopLevelArrows: true });
			
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
<body style='background: #fff url(../images/background.png) left top scroll repeat-x;'>
	<!--begin header-->
   			 <?php include_once('../header.php');?> 
    <!--end header-->
    <!--begin content-->
    <div class="rc-all" style='margin-right: auto; margin-left: auto; border: 1px solid #d2d2d2; width: 1000px; height: 100%; margin-top: 40px; margin-bottom: 20px; background: #fff;'>
       <table class="rc-all" id="demostable" style="margin: 0 auto; table-layout: fixed; width: 100%; min-height: 100%; height: auto; height: 100%; border-collapse: collapse; background: #EEEEEE;">
            <tbody>
            		<tr valign="top">
             		<!--menu o day-->
                    	<?php include_once('menu.php');?> 
            		</tr>
                    <tr>
               		 	<td>
                        	<table style="table-layout: fixed; border-collapse: collapse;" cellspacing="0" cellpadding="0">
                           		<tbody>                       
                              		 <tr>
                            <td width="794" valign="top" class="rc-all content" id="demos">
                            <table style="table-layout: fixed; border-collapse: collapse;" cellspacing="0" cellpadding="0">
                                <tbody>
                                 
    							 <tr>
                                        <td height="100%"  class="demoContent" valign="middle">
                                              <table width="752" border="0" cellpadding="0" cellspacing="0" align="center" style="margin-top:50px">      
                                         
                                          
                                          <!--noi dung o day-->
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
                                          
                                          
                                          <tr>
                                            <td align="center">&nbsp;</td>
                                          </tr>    
                                        </table>
                                        </td>
  								</tr>
                                </tbody>
                             </table>
                            </td>
                            <!--âfgajf-->
                               </tr>       
                            	</tbody>
                         	</table>
                     	</td>
                    </tr>
              </tbody>
        </table>
                
    </div>
    <!--end content-->
    <!--begin footer-->
   		 <?php include_once('../footer.php');?> 
    <!--end footer-->
</body>
</html>
