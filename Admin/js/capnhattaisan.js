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

//kiem tra dia chi email co hop le hay khong
function checkEmail(n)
{
	return n.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/)!=-1?!0:!1
	
}

function get_info_taisan(filephp,frm)
{
	if(frm.cbo_tentaisansua.value==-1)
	{
		frm.cbo_tendonvitinhsua.value='';
		frm.txt_tinhtrangsua.value=-1;
	}
	else
	{
	mataisan=frm.cbo_tentaisansua.value;
	donvitinh=frm.cbo_tendonvitinhsua;
	tinhtrang=frm.txt_tinhtrangsua;
	
	http=GetXmlHttpObject();
	var params = "mataisan="+mataisan;
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
				donvitinh.value=x[0].getElementsByTagName('column')[0].firstChild.nodeValue;
				tinhtrang.value=x[0].getElementsByTagName('column')[1].firstChild.nodeValue;
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
			_admin.themtaisan(),
			_admin.suacanbo(),
			_admin.xoacanbo()
		}),
		
		_admin=
		{
				themtaisan:function()
				{
					$("#btn_themtaisan").unbind("click").click(function()
					{
						if($("#cbo_tenloaitaisanthem").val()==-1) FocusAndSelect("#cbo_tenloaitaisanthem");
							else if($("#txt_tentaisanthem").val()=="") FocusAndSelect("#txt_tentaisanthem");
								else if($("#cbo_donvitinhthem option:selected").val()==-1) FocusAndSelect("#cbo_donvitinhthem");
									else if($("#txt_tinhtrangthem").val()==-1) FocusAndSelect("#txt_tinhtrangthem");
												
						else
						{	
							return $.ajax
							({
								url:"./themtaisan.php",
								type:"POST",
								//dataType:"html",
								data:$("#frm_themtaisan").serialize(),
								beforeSend:function(){},
								success:function(n)
								{
									if(n==0)
										alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại.")
									else if(n==1) 
									{
										alert("Thành công."),
										//fillcombo2('get_list_canbo.php',document.frm_suacanbo.cbo_macanbosua);
										//fillcombo2('get_list_canbo.php',document.frm_xoacanbo.cbo_macanboxoa);
										document.frm_themtaisan.cbo_tenloaitaisanthem.value=-1,
										document.frm_themtaisan.txt_tentaisanthem.value='',
										document.frm_themtaisan.cbo_donvitinhthem.value=-1,
										document.frm_themtaisan.txt_tinhtrangthem.value=''
									}
									else if(n==2)
									{
										alert("Đơn vị này đã tồn tại.")
									}
									
								},
								error:function(){},
								complete:function(){}
							}),!1
						}
						
					})
				},
		  suacanbo:function()
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
			  
			}
		
				
		}
	