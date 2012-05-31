// JavaScript Document
/*function themnamhoc(filephp,frm)
{
	var tennamhoc=frm.txt_tennamhoc.value;
	http=GetXmlHttpObject();
	var params = "tennamhoc="+tennamhoc;
	//mo ket noi bang phuong thuc post
	http.open("POST", filephp, false);
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.setRequestHeader("Content-length", params.length);
	http.setRequestHeader("Connection", "close");
	//ham xu li du lieu tra ve cua ajax send thanh cong
	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) 
		{
			var result=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
			alert(result);
			if(result=='Thành công'){
			get_new_namhoc('../get_new_namhoc.php', document.frm_themnamhoc);
			fillcombo('../get_list_namhoc.php',document.frm_themhocki.cbo_tennamhoc);
			get_con_namhoc('../get_con_namhoc.php', document.frm_themhocki);
			get_new_hocki('../get_new_hocki.php', document.frm_themhocki);
			fillcombo('../get_list_namhoc.php',document.frm_chonhockihientai.cbo_tennamhoc);	
			get_cur_namhoc('../get_cur_namhoc.php',document.frm_chonhockihientai);
			}
		}
	}
	http.send(params);
}

function get_new_namhoc(filephp, frm){
	http=GetXmlHttpObject();
	var params = "";
	//mo ket noi bang phuong thuc post
	http.open("POST", filephp, false);
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.setRequestHeader("Content-length", params.length);
	http.setRequestHeader("Connection", "close");
	//ham xu li du lieu tra ve cua ajax send thanh cong
	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) 
		{
			var result=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
			frm.txt_tennamhoc.value = result;
		}
	}
	http.send(params);
	}

function themhocki(filephp, frm)
{
	var idnamhoc = frm.cbo_tennamhoc.value;
	var tenhocki = frm.txt_tenhocki.value;
	http=GetXmlHttpObject();
	var params = "idnamhoc="+idnamhoc;
	params +="&tenhocki="+tenhocki;
	//mo ket noi bang phuong thuc post
	http.open("POST", filephp, false);
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.setRequestHeader("Content-length", params.length);
	http.setRequestHeader("Connection", "close");
	//ham xu li du lieu tra ve cua ajax send thanh cong
	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) 
		{
			var result=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
			alert(result);
			if(result=='Thành công')
			{
			get_new_hocki('../get_new_hocki.php', document.frm_themhocki);
			get_con_namhoc('../get_con_namhoc.php', document.frm_themhocki);
			get_cur_namhoc('../get_cur_namhoc.php',document.frm_chonhockihientai);
			_fillcombo('../get_list_hocki.php',document.frm_chonhockihientai.cbo_tennamhoc, document.frm_chonhockihientai.cbo_tenhocki);
			get_cur_hocki('../get_cur_hocki.php',document.frm_chonhockihientai);
				}			
		}
	}
	http.send(params);
}

function chonhockihientai(filephp,frm)
{
	var idhocki = frm.cbo_tenhocki.value;
	http=GetXmlHttpObject();
	var params = "idhocki="+idhocki;
	//mo ket noi bang phuong thuc post
	http.open("POST", filephp, false);
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.setRequestHeader("Content-length", params.length);
	http.setRequestHeader("Connection", "close");
	//ham xu li du lieu tra ve cua ajax send thanh cong
	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) 
		{
			var result=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
			alert(result);
		}
	}
	http.send(params);
}

function get_con_namhoc(filephp,frm)
{
	http=GetXmlHttpObject();
	var params = "";
	//mo ket noi bang phuong thuc post
	http.open("POST", filephp, false);
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.setRequestHeader("Content-length", params.length);
	http.setRequestHeader("Connection", "close");
	//ham xu li du lieu tra ve cua ajax send thanh cong
	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) 
		{
			var result=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
			if(result=='Năm học tiếp theo chưa được tạo.'){
			alert(result);
			frm.cbo_tennamhoc.selectedIndex = 0;
			}
			else 
			frm.cbo_tennamhoc.selectedIndex = result;
		}
	}
	http.send(params);
}
function get_new_hocki(filephp,frm)
{
	http=GetXmlHttpObject();
	var params = "";
	//mo ket noi bang phuong thuc post
	http.open("POST", filephp, false);
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.setRequestHeader("Content-length", params.length);
	http.setRequestHeader("Connection", "close");
	//ham xu li du lieu tra ve cua ajax send thanh cong
	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) 
		{
			var result=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
			frm.txt_tenhocki.value = result;
		}
	}
	http.send(params);
}
function get_cur_namhoc(filephp,frm)
{
	http=GetXmlHttpObject();
	var params = "";
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
			var result=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
			frm.cbo_tennamhoc.selectedIndex = result;
		}
	}
	http.send(params);
}
function get_cur_hocki(filephp,frm)
{
	http=GetXmlHttpObject();
	var params = "";
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
			var result=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
			frm.cbo_tenhocki.selectedIndex = result;
		}
	}
	http.send(params);
}*/
function get_info_sotiencap(filephp,frm)
{
	document.frm_suasotiencap.txt_sotiencap.value='';

	if(frm.cbo_chonnamsua.value=='Chọn năm' && frm.cbo_chondonvisua=='-Chọn đơn vị-')
	{
		
		frm.txt_sotiencap.value='';
	}
	else
	{
	nam=frm.cbo_chonnamsua.value;
	donvi=frm.cbo_chondonvisua.value;
	sotiencap=frm.txt_sotiencap;
	
	http=GetXmlHttpObject();
	var params = "nam="+nam;
	params +="&donvi="+donvi;
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
		
				sotiencap.value=x[0].getElementsByTagName('column')[2].firstChild.nodeValue;
				
		}
	}
	http.send(params);
	}
}
function get_info_sotiencap2(filephp,frm)
{
	document.frm_xoasotiencap.txt_sotiencapxoa.value='';

	if(frm.cbo_chonnamxoa.value=='Chọn năm' && frm.cbo_chondonvixoa=='-Chọn đơn vị-')
	{
		
		frm.txt_sotiencapxoa.value='';
	}
	else
	{
	nam=frm.cbo_chonnamxoa.value;
	donvi=frm.cbo_chondonvixoa.value;
	sotiencap=frm.txt_sotiencapxoa;
	
	http=GetXmlHttpObject();
	var params = "nam="+nam;
	params +="&donvi="+donvi;
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
		
				sotiencap.value=x[0].getElementsByTagName('column')[2].firstChild.nodeValue;
				
		}
	}
	http.send(params);
	}
}
function FocusAndSelect(n)
{
	$(n).focus(),$(n).select()
}
function ClearInputValue(n){$(n).val("")}
function CheckEmptyInput(n)
{
	return $(n).val()==""?($(n).focus(),$(n).select(),!1):!0
}

var _admin;
		$(function()
		{
			_admin.themsotiencap()
			_admin.suasotiencap()
			_admin.xoasotiencap()
		}),
		
		_admin=
		{
				themsotiencap:function()
				{
					$("#btn_them").unbind("click").click(function()
					{
						if($("#cbo_chonnam option:selected").val()==-1) FocusAndSelect("#cbo_chonnam");
						else if($("#cbo_chondonvi option:selected").val()==-1) FocusAndSelect("#cbo_chondonvi");
						else if($("#txt_sotiencap").val()==-1) FocusAndSelect("#txt_sotiencap");
							else if($("#txt_sotiencap").val()=="") FocusAndSelect("#txt_sotiencap");
							
								
						else
						{	
							return $.ajax
							({
								url:"./themsotiencap.php",
								type:"POST",
								//dataType:"html",
								data:$("#frm_themsotiencap").serialize(),
								beforeSend:function(){},
								success:function(n)
								{
									if(n==0){
										alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại.")
										FocusAndSelect("#txt_sotiencap");
									}
									else if(n==1) 
									{
										alert("Thành công."),
										
										
										FocusAndSelect("#cbo_chonnam");
										
										
									}
									else if(n==2)
									{
										alert("Đơn vị này đã được cấp tiền trong năm này rồi!")
										FocusAndSelect("#cbo_chonnam");
									}
									
								},
								error:function(){},
								complete:function(){}
							}),!1
						}
						
					})
				},
		suasotiencap:function()
		  {
			  $("#btn_sua").unbind("click").click(function()
			  {
						if($("#cbo_chonnamsua option:selected").val()==-1) FocusAndSelect("#cbo_chonnamsua");
						else if($("#cbo_chondonvisua option:selected").val()==-1) FocusAndSelect("#cbo_chondonvisua");
						else
						{	
							return $.ajax
							({
								url:"./suasotiencap.php",
								type:"POST",
								//dataType:"html",
								data:$("#frm_suasotiencap").serialize(),
								beforeSend:function(){},
								success:function(n)
								{
									if(n==0)
										alert("Bạn chưa thay đổi thông tin nào.")
									else 
									{
										alert("Thành công !")
										
										
									}
								},
								error:function(){},
								complete:function(){}
							}),!1
						}
			   })
		  
		  },
				
			xoasotiencap:function()
			{
			 $("#btn_xoa").unbind("click").click(function()
			 {   
			 	if ($("#cbo_chonnamxoa").val()!='Chọn năm' && $("#cbo_chondonvixoa").val()!='-Chọn đơn vị-' )
				{	
					if(confirm('Ban có chắc chắn muốn xóa không ?' ))
					{	
						return $.ajax
						({
							url:"./xoasotiencap.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_xoasotiencap").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0)
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại.")
								else if(n==1)
								{
									alert("Thành công !")
									
								}
							},
							error:function(){},
							complete:function(){}
						}),!1
					  }
				}
				else
				{
					alert("Bạn chưa chọn năm hay chọn đơn vị!");	
				}
					
				})
			  
			}
				
		  /*suacanbo:function()
		  {
			  $("#btn_suacanbo").unbind("click").click(function()
			  {
						if($("#cbo_macanbosua").val()=='') FocusAndSelect("#cbo_macanbosua");
							else if($("#cbo_tendonvisua").val()==-1) FocusAndSelect("#cbo_tendonvisua");
								else if($("#txt_tencanbosua").val()=="") FocusAndSelect("#txt_tencanbosua");
									else if($("#cbo_gioitinhsua option:selected").val()==-1) FocusAndSelect("#cbo_gioitinhsua");
											else if($("#cbo_ngaysinhsua option:selected").val()==-1)FocusAndSelect("#cbo_ngaysinhsua");
												else if($("#cbo_thangsinhsua option:selected").val()==-1)FocusAndSelect("#cbo_thangsinhsua");
													else if($("#cbo_namsinhsua option:selected").val()==-1)FocusAndSelect("#cbo_namsinhsua");
														else if(check_date_ngaysinh($("#cbo_ngaysinhsua option:selected").val(),$("#cbo_thangsinhsua option:selected").val(),$("#cbo_namsinhsua option:selected").val())){alert("Ngày tháng năm sinh không hợp lệ.");FocusAndSelect("#cbo_ngaysinhsua");}
															else if($("#txt_emailsua").val()=="")FocusAndSelect("#txt_emailsua");
																else if(checkEmail($("#txt_emailsua").val())!=1) {alert("Địa chỉ email không hợp lệ"); FocusAndSelect("#txt_emailsua");}
																	else if($("#txt_diachisua").val()=="")FocusAndSelect("#txt_diachisua");
																		else if($("#txt_sodienthoaisua").val()=="")FocusAndSelect("#txt_sodienthoaisua");
																			else if($("#txt_matkhausua").val()=="")FocusAndSelect("#txt_matkhausua");
						else
						{	
							return $.ajax
							({
								url:"./suacanbo.php",
								type:"POST",
								//dataType:"html",
								data:$("#frm_suacanbo").serialize(),
								beforeSend:function(){},
								success:function(n)
								{
									if(n==0)
										alert("Bạn chưa thay đổi thông tin nào.")
									else 
									{
										alert("Thành công !"),
										fillcombo2('get_list_canbo.php',document.frm_suacanbo.cbo_macanbosua);
										fillcombo2('get_list_canbo.php',document.frm_xoacanbo.cbo_macanboxoa);
										document.frm_suacanbo.cbo_tendonvisua.value=-1,
										document.frm_suacanbo.txt_tencanbosua.value='',
										document.frm_suacanbo.cbo_gioitinhsua.value=-1,
										document.frm_suacanbo.cbo_ngaysinhsua.value=-1,
										document.frm_suacanbo.cbo_thangsinhsua.value=-1,
										document.frm_suacanbo.cbo_namsinhsua.value=-1,
										document.frm_suacanbo.txt_emailsua.value='',
										document.frm_suacanbo.txt_diachisua.value='',
										document.frm_suacanbo.txt_sodienthoaisua.value='',
										document.frm_suacanbo.txt_matkhausua.value=''
									}
								},
								error:function(){},
								complete:function(){}
							}),!1
						}
			   })
		  },
		  
		  xoacanbo:function()
			{
			 $("#btn_xoacanbo").unbind("click").click(function()
			 {   
			 	if ($("#cbo_macanboxoa").val()!='Chọn mã số cán bộ')
				{	
					if(confirm('Ban có chắc chắn muốn xóa không ?' ))
					{	
						return $.ajax
						({
							url:"./xoacanbo.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_xoacanbo").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0)
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại.")
								else if(n==1)
								{
									alert("Thành công !"),
									fillcombo2('get_list_canbo.php',document.frm_suacanbo.cbo_macanbosua);
									fillcombo2('get_list_canbo.php',document.frm_xoacanbo.cbo_macanboxoa);
									document.frm_xoacanbo.txt_tencanboxoa.value='',
									FocusAndSelect("#cbo_macanboxoa")
								}
							},
							error:function(){},
							complete:function(){}
						}),!1
					  }
				}
				else
				{
					alert("Bạn chưa chọn mã cán bộ.");	
				}
					
				})
			  
			}*/
		
				
		}