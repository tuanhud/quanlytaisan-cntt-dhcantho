// JavaScript Document
function FocusAndSelect(n)
{
	$(n).focus(),$(n).select()
}
function ClearInputValue(n){$(n).val("")}
function CheckEmptyInput(n)
{
	return $(n).val()==""?($(n).focus(),$(n).select(),!1):!0
}

function get_info_vpp(filephp,frm)
{
	if(frm.cbo_tenvppsua.value==-1)
	{
		frm.cbo_tenloaivppsua.value=-1;
		frm.cbo_dvtsua.value="-Chọn đơn vị tính-";
		frm.cbo_tennsxsua.value=-1;
		frm.txt_tenvppsua.value='';
	}
	else
	{
	mavpp=frm.cbo_tenvppsua.value;
	tenloaivpp=frm.cbo_tenloaivppsua;
	donvitinh=frm.cbo_dvtsua;
	tennsxvpp=frm.cbo_tennsxsua;
	tenvpp=frm.txt_tenvppsua;
	
	http=GetXmlHttpObject();
	var params = "mavpp="+mavpp;
	//mo ket noi bang phuong thuc post
	http.open("POST", filephp, false);
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//http.setRequestHeader("Content-length", params.length);
	//http.setRequestHeader("Connection", "close");
	//ham xu li du lieu tra ve cua ajax send thanh cong
	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) 
		{				
				var x=http.responseXML.getElementsByTagName('row');
				tenloaivpp.value=x[0].getElementsByTagName('column')[1].firstChild.nodeValue;					
				donvitinh.value=x[0].getElementsByTagName('column')[2].firstChild.nodeValue;
				tennsxvpp.value=x[0].getElementsByTagName('column')[3].firstChild.nodeValue;
				tenvpp.value=x[0].getElementsByTagName('column')[4].firstChild.nodeValue;
		}
	}
	http.send(params);
	}
}
function get_info_vpp2(filephp,frm)
{
	if(frm.cbo_tenvppxoa.value==-1)
	{
		frm.cbo_tenloaivppxoa.value=-1;
		frm.cbo_dvtxoa.value="-Chọn đơn vị tính-";
		frm.cbo_tennsxxoa.value=-1;
	}
	else
	{
	mavpp=frm.cbo_tenvppxoa.value;
	loaivpp=frm.cbo_tenloaivppxoa;
	dvt=frm.cbo_dvtxoa;
	nsxvpp=frm.cbo_tennsxxoa;
	http=GetXmlHttpObject();
	var params = "mavpp="+mavpp;
	//mo ket noi bang phuong thuc post
	http.open("POST", filephp, false);
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//http.setRequestHeader("Content-length", params.length);
	//http.setRequestHeader("Connection", "close");
	//ham xu li du lieu tra ve cua ajax send thanh cong
	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) 
		{				
				var x=http.responseXML.getElementsByTagName('row');
				loaivpp.value=x[0].getElementsByTagName('column')[1].firstChild.nodeValue;					
				dvt.value=x[0].getElementsByTagName('column')[2].firstChild.nodeValue;
				nsxvpp.value=x[0].getElementsByTagName('column')[3].firstChild.nodeValue;
		}
	}
	http.send(params);
	}
}
/*function get_info_canbo2(filephp,frm)
{
	if(frm.cbo_macanboxoa.value=='Chọn mã số cán bộ')
	{
		frm.txt_tencanboxoa.value='';
	}
	else
	{
	macanbo=frm.cbo_macanboxoa.value;
	tencanbo=frm.txt_tencanboxoa;
	
	http=GetXmlHttpObject();
	var params = "macanbo="+macanbo;
	//mo ket noi bang phuong thuc post
	http.open("POST", filephp, false);
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//http.setRequestHeader("Content-length", params.length);
	//http.setRequestHeader("Connection", "close");
	//ham xu li du lieu tra ve cua ajax send thanh cong
	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) 
		{				
				var x=http.responseXML.getElementsByTagName('row');								
				tencanbo.value=x[0].getElementsByTagName('column')[1].firstChild.nodeValue;
		}
	}
	http.send(params);
	}
}
*/

var _admin;
		$(function()
		{
			_admin.themvpp(),
			_admin.suavpp(),
			_admin.xoavpp()
		}),
		_admin=
		{
				themvpp:function()
				{
					$("#btn_themvpp").unbind("click").click(function()
					{
						if($("#cbo_tenloaivppthem").val()==-1) FocusAndSelect("#cbo_tenloaivppthem");
							else if($("#cbo_dvtthem").val()==-1) FocusAndSelect("#cbo_dvtthem");
								else if($("#cbo_tennsxthem option:selected").val()==-1) FocusAndSelect("#cbo_tennsxthem");
									else if($("#txt_tenvppthem").val()=='') FocusAndSelect("#txt_tenvppthem");
												
						else
						{	
							return $.ajax
							({
								url:"./themvpp.php",
								type:"POST",
								//dataType:"html",
								data:$("#frm_themvpp").serialize(),
								beforeSend:function(){},
								success:function(n)
								{
									if(n==0)
										alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại.")
									else if(n==1) 
									{
										alert("Thành công !"),
										fillcombo('get_list_loaivpp.php',document.frm_themvpp.cbo_tenloaivppthem);
	fillcombo3('get_list_donvitinh.php',document.frm_themvpp.cbo_dvtthem);
	fillcombo('get_list_nhasanxuat.php',document.frm_themvpp.cbo_tennsxthem);
	
	fillcombo('get_list_vpp.php',document.frm_suavpp.cbo_tenvppsua);
	fillcombo('get_list_loaivpp.php',document.frm_suavpp.cbo_tenloaivppsua);
	fillcombo3('get_list_donvitinh.php',document.frm_suavpp.cbo_dvtsua);
	fillcombo('get_list_nhasanxuat.php',document.frm_suavpp.cbo_tennsxsua);
	
	fillcombo('get_list_vpp.php',document.frm_xoavpp.cbo_tenvppxoa);
	fillcombo('get_list_loaivpp.php',document.frm_xoavpp.cbo_tenloaivppxoa);
	fillcombo3('get_list_donvitinh.php',document.frm_xoavpp.cbo_dvtxoa);
	fillcombo('get_list_nhasanxuat.php',document.frm_xoavpp.cbo_tennsxxoa);
	
	$('form[name="frm_suavpp"] select[name="cbo_tenvppsua"]').change(function(){
		get_info_vpp('get_info_vpp.php',document.frm_suavpp);
	});
	
	$('form[name="frm_xoavpp"] select[name="cbo_tenvppxoa"]').change(function(){
		get_info_vpp2('get_info_vpp.php',document.frm_xoavpp);
	});
	document.frm_themvpp.cbo_tenloaivppthem.value=-1,
										document.frm_themvpp.cbo_dvtthem.value="-Chọn đơn vị tính-",
										document.frm_themvpp.cbo_tennsxthem.value=-1,
										document.frm_themvpp.txt_tenvppthem.value='',
										
										document.frm_suavpp.cbo_tenloaivppsua.value=-1,
										document.frm_suavpp.cbo_dvtsua.value="-Chọn đơn vị tính-",
										document.frm_suavpp.cbo_tennsxsua.value=-1,
										document.frm_suavpp.txt_tenvppsua.value='',
										
										document.frm_xoataisan.cbo_tenloaitaisanxoa.value=-1
									}									
								},
								error:function(){},
								complete:function(){}
							}),!1
						}
						
					})
				},
		  suavpp:function()
		  {
			  $("#btn_suavpp").unbind("click").click(function()
			  {
				  if($("#cbo_tenvppsua").val()==-1) FocusAndSelect("#cbo_tenvppsua");				  
						else if($("#cbo_tenloaivppsua").val()==-1) FocusAndSelect("#cbo_tenloaivppsua");
							else if($("#cbo_dvtsua").val()==-1) FocusAndSelect("#cbo_dvtsua");
								else if($("#cbo_tennsxsua option:selected").val()==-1) FocusAndSelect("#cbo_tennsxsua");
									else if($("#txt_tenvppsua").val()=='') FocusAndSelect("#txt_tenvppsua");
									
						else
						{	
							return $.ajax
							({
								url:"./suavpp.php",
								type:"POST",
								//dataType:"html",
								data:$("#frm_suavpp").serialize(),
								beforeSend:function(){},
								success:function(n)
								{
									if(n==0)
										alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại.")
									else if(n==1)
									{
										alert("Thành công !")
																				fillcombo('get_list_loaivpp.php',document.frm_themvpp.cbo_tenloaivppthem);
	fillcombo3('get_list_donvitinh.php',document.frm_themvpp.cbo_dvtthem);
	fillcombo('get_list_nhasanxuat.php',document.frm_themvpp.cbo_tennsxthem);
	
	fillcombo('get_list_vpp.php',document.frm_suavpp.cbo_tenvppsua);
	fillcombo('get_list_loaivpp.php',document.frm_suavpp.cbo_tenloaivppsua);
	fillcombo3('get_list_donvitinh.php',document.frm_suavpp.cbo_dvtsua);
	fillcombo('get_list_nhasanxuat.php',document.frm_suavpp.cbo_tennsxsua);
	
	fillcombo('get_list_vpp.php',document.frm_xoavpp.cbo_tenvppxoa);
	fillcombo('get_list_loaivpp.php',document.frm_xoavpp.cbo_tenloaivppxoa);
	fillcombo3('get_list_donvitinh.php',document.frm_xoavpp.cbo_dvtxoa);
	fillcombo('get_list_nhasanxuat.php',document.frm_xoavpp.cbo_tennsxxoa);
	
	$('form[name="frm_suavpp"] select[name="cbo_tenvppsua"]').change(function(){
		get_info_vpp('get_info_vpp.php',document.frm_suavpp);
	});
	
	$('form[name="frm_xoavpp"] select[name="cbo_tenvppxoa"]').change(function(){
		get_info_vpp2('get_info_vpp.php',document.frm_xoavpp);
	});
	document.frm_themvpp.cbo_tenloaivppthem.value=-1,
										document.frm_themvpp.cbo_dvtthem.value="-Chọn đơn vị tính-",
										document.frm_themvpp.cbo_tennsxthem.value=-1,
										document.frm_themvpp.txt_tenvppthem.value='',
										
										document.frm_suavpp.cbo_tenloaivppsua.value=-1,
										document.frm_suavpp.cbo_dvtsua.value="-Chọn đơn vị tính-",
										document.frm_suavpp.cbo_tennsxsua.value=-1,
										document.frm_suavpp.txt_tenvppsua.value='',
										
										document.frm_xoataisan.cbo_tenloaitaisanxoa.value=-1
									}
									else if(n==2)
									{
										alert("Bạn chưa thay đổi gì cả.");	
									}
								},
								error:function(){},
								complete:function(){}
							}),!1
						}
			   })
		  },
		  
		  xoavpp:function()
			{
			 $("#btn_xoavpp").unbind("click").click(function()
			 {   
			 	if($("#cbo_tenvppxoa option:selected").val()==-1){ alert("Bạn chưa chọn văn phòng phẩm."); FocusAndSelect("#cbo_tenvppxoa");}
				else	if(confirm('Bạn có chắc chắn muốn xóa không ?' ))
					{	
						return $.ajax
						({
							url:"./xoavpp.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_xoavpp").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0)
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại."),
									document.frm_xoavpp.cbo_tenvppxoa.focus()
								else if(n==1)
								{
									alert("Thành công."),
									document.frm_xoavpp.cbo_tenvppxoa.value=-1,
																			fillcombo('get_list_loaivpp.php',document.frm_themvpp.cbo_tenloaivppthem);
	fillcombo3('get_list_donvitinh.php',document.frm_themvpp.cbo_dvtthem);
	fillcombo('get_list_nhasanxuat.php',document.frm_themvpp.cbo_tennsxthem);
	
	fillcombo('get_list_vpp.php',document.frm_suavpp.cbo_tenvppsua);
	fillcombo('get_list_loaivpp.php',document.frm_suavpp.cbo_tenloaivppsua);
	fillcombo3('get_list_donvitinh.php',document.frm_suavpp.cbo_dvtsua);
	fillcombo('get_list_nhasanxuat.php',document.frm_suavpp.cbo_tennsxsua);
	
	fillcombo('get_list_vpp.php',document.frm_xoavpp.cbo_tenvppxoa);
	fillcombo('get_list_loaivpp.php',document.frm_xoavpp.cbo_tenloaivppxoa);
	fillcombo3('get_list_donvitinh.php',document.frm_xoavpp.cbo_dvtxoa);
	fillcombo('get_list_nhasanxuat.php',document.frm_xoavpp.cbo_tennsxxoa);
	
	$('form[name="frm_suavpp"] select[name="cbo_tenvppsua"]').change(function(){
		get_info_vpp('get_info_vpp.php',document.frm_suavpp);
	});
	
	$('form[name="frm_xoavpp"] select[name="cbo_tenvppxoa"]').change(function(){
		get_info_vpp2('get_info_vpp.php',document.frm_xoavpp);
	});
	document.frm_themvpp.cbo_tenloaivppthem.value=-1,
										document.frm_themvpp.cbo_dvtthem.value="-Chọn đơn vị tính-",
										document.frm_themvpp.cbo_tennsxthem.value=-1,
										document.frm_themvpp.txt_tenvppthem.value='',
										
										document.frm_suavpp.cbo_tenloaivppsua.value=-1,
										document.frm_suavpp.cbo_dvtsua.value="-Chọn đơn vị tính-",
										document.frm_suavpp.cbo_tennsxsua.value=-1,
										document.frm_suavpp.txt_tenvppsua.value='',
										
										document.frm_xoavpp.cbo_tenloaivppxoa.value=-1
									FocusAndSelect("#cbo_tenvppxoa")
								}
							},
							error:function(){},
							complete:function(){}
						}),!1
					  }
					})
			  
				}
		
				
		}
	