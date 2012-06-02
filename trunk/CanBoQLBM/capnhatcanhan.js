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
function get_info_thongtin(filephp,frm)
{
	
	macanbo=frm.txt_masocanbo;
	tendonvi=frm.txt_donvi;
	tencanbo=frm.txt_tencanbo;
	gioitinh=frm.cbo_gioitinh;
	ngaysinh=frm.cbo_ngaysinh;
	thangsinh=frm.cbo_thangsinh;
	namsinh=frm.cbo_namsinh;
	email=frm.txt_email;
	diachi=frm.txt_diachi;
	sodienthoai=frm.txt_sodienthoai;
	matkhau=frm.txt_matkhau;
	
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
				macanbo.value=x[0].getElementsByTagName('column')[0].firstChild.nodeValue;							
				tendonvi.value=x[0].getElementsByTagName('column')[1].firstChild.nodeValue;
				tencanbo.value=x[0].getElementsByTagName('column')[2].firstChild.nodeValue;
				gioitinh.value=x[0].getElementsByTagName('column')[3].firstChild.nodeValue;
				ngaysinh.value=x[0].getElementsByTagName('column')[4].firstChild.nodeValue;
				thangsinh.value=x[0].getElementsByTagName('column')[5].firstChild.nodeValue;
				namsinh.value=x[0].getElementsByTagName('column')[6].firstChild.nodeValue;
				email.value=x[0].getElementsByTagName('column')[7].firstChild.nodeValue;
				diachi.value=x[0].getElementsByTagName('column')[8].firstChild.nodeValue;
				sodienthoai.value=x[0].getElementsByTagName('column')[9].firstChild.nodeValue;
				matkhau.value=x[0].getElementsByTagName('column')[10].firstChild.nodeValue;
		}
	}
	http.send(params);
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
			
			_admin.suacanbo()
			
		}),
		
		_admin=
		{
				
		  suacanbo:function()
		  {
			  $("#btn_capnhat").unbind("click").click(function()
			  {
						
								 if($("#txt_tencanbo").val()=="") FocusAndSelect("#txt_tencanbo");
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
								url:"./suathongtincanhan.php",
								type:"POST",
								//dataType:"html",
								data:$("#frm_suattcanhan").serialize(),
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
		  }
		}
	