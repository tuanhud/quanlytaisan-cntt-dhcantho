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
var _admin;
		$(function()
		{
			_admin.themcanbo()
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
									alert("Thành công !")
									//fillcombo('get_list_donvi.php',document.frm_suadonvi.cbo_tendonvisua);
									//fillcombo('get_list_donvi.php',document.frm_xoadonvi.cbo_tendonvixoa);
									//ClearInputValue("#txt_tendonvithem"),
									//FocusAndSelect("#txt_tendonvithem")
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
}

function xoacanbo(filephp,frm)
{
	var ban_id = frm.cbo_tenban.value;
	http=GetXmlHttpObject();
	var params = "ban_id="+ban_id;
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
			if(result=='Thành công.'){
			fillcombo('../get_list_ban.php',document.frm_suaban.cbo_tenban);
			fillcombo('../get_list_ban.php',document.frm_xoaban.cbo_tenban);			
			}
			else frm.cbo_tenban.focus();
		}
	}
	http.send(params);
}

function suacanbo(filephp,frm)
{
	var ban_id = frm.cbo_tenban.value;
	var ban_ten = frm.txt_tenban.value;
	http=GetXmlHttpObject();
	var params="ban_id="+ban_id;
	params+="&ban_ten="+ban_ten;
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
			if(result=='Thành công.')
			{
			frm.reset();
			fillcombo('../get_list_ban.php',document.frm_suaban.cbo_tenban);		
			fillcombo('../get_list_ban.php',document.frm_xoaban.cbo_tenban);	
			}
			else if(result=='Bạn chưa chọn Ban.') frm.cbo_tenban.focus();
			else frm.txt_tenban.focus();
		}
	}
	http.send(params);
}