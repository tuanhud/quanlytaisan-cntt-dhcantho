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
			_admin.themquy()
			//_admin.suanam(),
			_admin.xoaquy()
		}),
		
		_admin=
		{
				themquy:function()
				{
					$("#btn_themquy").unbind("click").click(function()
					{
						if($("#txt_tenquy").val()==-1) FocusAndSelect("#txt_tenquy");
							else if($("#txt_tenquy").val()=="") FocusAndSelect("#txt_tenquy");
								
						else
						{	
							return $.ajax
							({
								url:"./themquy.php",
								type:"POST",
								//dataType:"html",
								data:$("#frm_themquy").serialize(),
								beforeSend:function(){},
								success:function(n)
								{
									if(n==0){
										alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại.")
										FocusAndSelect("#txt_tenquy");
									}
									else if(n==1) 
									{
										alert("Thành công."),
										
										document.frm_themquy.txt_tenquy.value=-1,
										document.frm_themquy.txt_tenquy.value=''
										FocusAndSelect("#txt_tenquy");
										fillcombo2('get_list_quy.php',document.frm_xoaquy.comboquy);
									}
									else if(n==2)
									{
										alert("Quý này đã tồn tại.")
										FocusAndSelect("#txt_tenquy");
									}
									
								},
								error:function(){},
								complete:function(){}
							}),!1
						}
						
					})
				},
			xoaquy:function()
			{
			 $("#btn_xoaquy").unbind("click").click(function()
			 {   
			 	if ($("#comboquy").val()!='Chọn quý')
				{	
					if(confirm('Ban có chắc chắn muốn xóa không ?' ))
					{	
						return $.ajax
						({
							url:"./xoaquy.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_xoaquy").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0)
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại.")
								else if(n==1)
								{
									alert("Thành công !"),
									fillcombo2('get_list_quy.php',document.frm_xoaquy.comboquy);
									
									//document.frm_xoanam.txt_tencanboxoa.value='',
									FocusAndSelect("#comboquy")
								}
							},
							error:function(){},
							complete:function(){}
						}),!1
					  }
				}
				else
				{
					alert("Bạn chưa chọn quý.");	
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