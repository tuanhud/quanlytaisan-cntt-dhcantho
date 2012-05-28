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

/*function check_add_canbo()
{

	if($("#cbo_tendonvithem").val()==-1) FocusAndSelect("#cbo_tendonvithem");
		else if($("#txt_masocanbo").val()=="") FocusAndSelect("#txt_masocanbo");
			else if($("#txt_tencanbo").val()=="") FocusAndSelect("#txt_tencanbo");
				else if($("#cbo_gioitinh option:selected").val()==-1) FocusAndSelect("#cbo_gioitinh");
						else if($("#cbo_ngaysinh option:selected").val()==-1)FocusAndSelect("#cbo_ngaysinh");
							else if($("#cbo_thangsinh option:selected").val()==-1)FocusAndSelect("#cbo_thangsinh");
								else if($("#txt_namsinh").val()=="")FocusAndSelect("#txt_namsinh");
									else if($("#txt_email").val()=="")FocusAndSelect("#txt_email");
										else if(checkEmail($("#txt_email").val())!=1) {alert("Địa chỉ email không hợp lệ"); FocusAndSelect("#txt_email");}
											else if($("#txt_diachi").val()=="")FocusAndSelect("#txt_diachi");
												else if($("#txt_sodienthoai").val()=="")FocusAndSelect("#txt_sodienthoai");
													else if($("#txt_matkhau").val()=="")FocusAndSelect("#txt_matkhau");
			
	
}*/

//kiem tra ngay sinh co hop le hay khong
function check_date_ngaysinh(day,month,year)
{
		var ngay = parseInt(day, 10) ;
        var thang = parseInt(month, 10) ;
        var nam = parseInt(year, 10);
		if(ngay<1&&ngay>31) return true;
        switch (thang){
            case 2:
                if ((nam%4 == 0)&&(nam%400 !=0))
				{
					if(thang==2&&ngay>29)
                    	return true;
				}
                else
				{
					if(thang==2&&ngay>28)
					{
                    	return true;
					}
				}
                break;
            case 1:
            case 3:
            case 5:
            case 7:
            case 8:
            case 10:
            case 12:
                if(ngay>31)
				return true;
                break;
            default:
                if(ngay>30)
					return true;
        }
}

//lay thong tin can bo load len form sua khi chon combo ma so can bo
function get_info_canbo(filephp,frm)
{
	if(frm.cbo_macanbosua.value=='Chọn mã số cán bộ')
	{
		frm.cbo_tendonvisua.value=-1;
		frm.txt_tencanbosua.value='';
		frm.cbo_gioitinhsua.value=-1;
		frm.cbo_ngaysinhsua.value=-1;
		frm.cbo_thangsinhsua.value=-1;
		frm.cbo_namsinhsua.value=-1;
		frm.txt_emailsua.value='';
		frm.txt_diachisua.value='';
		frm.txt_sodienthoaisua.value='';
		frm.txt_matkhausua.value='';
	}
	else
	{
	macanbo=frm.cbo_macanbosua.value;
	madonvi=frm.cbo_tendonvisua;
	tencanbo=frm.txt_tencanbosua;
	gioitinh=frm.cbo_gioitinhsua;
	ngaysinh=frm.cbo_ngaysinhsua;
	thangsinh=frm.cbo_thangsinhsua;
	namsinh=frm.cbo_namsinhsua;
	email=frm.txt_emailsua;
	diachi=frm.txt_diachisua;
	sodienthoai=frm.txt_sodienthoaisua;
	matkhau=frm.txt_matkhausua;
	
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
				madonvi.value=x[0].getElementsByTagName('column')[0].firstChild.nodeValue;
				tencanbo.value=x[0].getElementsByTagName('column')[1].firstChild.nodeValue;
				gioitinh.value=x[0].getElementsByTagName('column')[2].firstChild.nodeValue;
				ngaysinh.value=x[0].getElementsByTagName('column')[3].firstChild.nodeValue;
				thangsinh.value=x[0].getElementsByTagName('column')[4].firstChild.nodeValue;
				namsinh.value=x[0].getElementsByTagName('column')[5].firstChild.nodeValue;
				email.value=x[0].getElementsByTagName('column')[6].firstChild.nodeValue;
				diachi.value=x[0].getElementsByTagName('column')[7].firstChild.nodeValue;
				sodienthoai.value=x[0].getElementsByTagName('column')[8].firstChild.nodeValue;
				matkhau.value=x[0].getElementsByTagName('column')[9].firstChild.nodeValue;
		}
	}
	http.send(params);
	}
}
function get_info_canbo2(filephp,frm)
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


var _admin;
		$(function()
		{
			_admin.themcanbo(),
			_admin.suacanbo(),
			_admin.xoacanbo()
		}),
		
		_admin=
		{
				themcanbo:function()
				{
					$("#btn_themcanbo").unbind("click").click(function()
					{
						if($("#cbo_tendonvithem").val()==-1) FocusAndSelect("#cbo_tendonvithem");
							else if($("#txt_masocanbo").val()=="") FocusAndSelect("#txt_masocanbo");
								else if($("#txt_tencanbo").val()=="") FocusAndSelect("#txt_tencanbo");
									else if($("#cbo_gioitinh option:selected").val()==-1) FocusAndSelect("#cbo_gioitinh");
											else if($("#cbo_ngaysinh option:selected").val()==-1)FocusAndSelect("#cbo_ngaysinh");
												else if($("#cbo_thangsinh option:selected").val()==-1)FocusAndSelect("#cbo_thangsinh");
													else if($("#cbo_namsinh option:selected").val()==-1)FocusAndSelect("#cbo_namsinh");
														else if(check_date_ngaysinh($("#cbo_ngaysinh option:selected").val(),$("#cbo_thangsinh option:selected").val(),$("#cbo_namsinh option:selected").val())){alert("Ngày tháng năm sinh không hợp lệ.");FocusAndSelect("#cbo_ngaysinh");}
															else if($("#txt_email").val()=="")FocusAndSelect("#txt_email");
																else if(checkEmail($("#txt_email").val())!=1) {alert("Địa chỉ email không hợp lệ"); FocusAndSelect("#txt_email");}
																	else if($("#txt_diachi").val()=="")FocusAndSelect("#txt_diachi");
																		else if($("#txt_sodienthoai").val()=="")FocusAndSelect("#txt_sodienthoai");
																			else if($("#txt_matkhau").val()=="")FocusAndSelect("#txt_matkhau");
						else
						{	
							return $.ajax
							({
								url:"./themcanbo.php",
								type:"POST",
								//dataType:"html",
								data:$("#frm_themcanbo").serialize(),
								beforeSend:function(){},
								success:function(n)
								{
									if(n==0)
										alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại.")
									else if(n==1) 
									{
										alert("Thành công."),
										fillcombo2('get_list_canbo.php',document.frm_suacanbo.cbo_macanbosua);
										fillcombo2('get_list_canbo.php',document.frm_xoacanbo.cbo_macanboxoa);
										document.frm_themcanbo.cbo_tendonvithem.value=-1,
										document.frm_themcanbo.txt_masocanbo.value='',
										document.frm_themcanbo.txt_tencanbo.value='',
										document.frm_themcanbo.cbo_gioitinh.value=-1,
										document.frm_themcanbo.cbo_ngaysinh.value=-1,
										document.frm_themcanbo.cbo_thangsinh.value=-1,
										document.frm_themcanbo.cbo_namsinh.value=-1,
										document.frm_themcanbo.txt_email.value='',
										document.frm_themcanbo.txt_diachi.value='',
										document.frm_themcanbo.txt_sodienthoai.value='',
										document.frm_themcanbo.txt_matkhau.value=''
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
	