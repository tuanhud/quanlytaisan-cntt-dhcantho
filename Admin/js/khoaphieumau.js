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

var _admin;
		$(function()
		{
			_admin.lock(),
			_admin.unlock()
		}),
		_admin=
			{
			lock:function()
			{
				$("#btn_khoa").unbind("click").click(function()
				{
					if($("#cbo_maphieumaulock").val()=='-Chọn mã phiếu mẫu-')
					{FocusAndSelect("#cbo_maphieumaulock")}
					//else if(CheckEmptyInput($("#txt_tenthuoctinhsua"))&&CheckEmptyInput($("#txt_ghichusua")))
					else{	
						return $.ajax
						({
							url:"./lockphieumau.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_khoaphieu").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0)
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại."),
									FocusAndSelect("#cbo_maphieumaulock")
								else if(n==1) 
								{
									alert("Khóa phiếu mẫu thành công!"),
									fillcombo2('get_list_phieumaulock.php',document.frm_khoaphieu.cbo_maphieumaulock), 
	  								fillcombo2('get_list_phieumauunlock.php',document.frm_mokhoaphieu.cbo_maphieumauunlock),
									ClearInputValue("#txt_tenphieumaulock"),
									ClearInputValue("#txt_ghichuphieulock"),
									ClearInputValue("#txt_ngaylaplock"),
									ClearInputValue("#txt_thanglaplock"),
									ClearInputValue("#txt_namlaplock"),
									ClearInputValue("#txt_ngaycapnhatlock")
								}
							},
							error:function(){},
							complete:function(){}
						}),!1
					}
					
				})
			},				
			unlock:function()
			{
				$("#btn_bokhoa").unbind("click").click(function()
				{
					if($("#cbo_maphieumauunlock").val()=='-Chọn mã phiếu mẫu-')
					{FocusAndSelect("#cbo_maphieumauunlock")}
					//else if(CheckEmptyInput($("#txt_tenthuoctinhsua"))&&CheckEmptyInput($("#txt_ghichusua")))
					else{	
						return $.ajax
						({
							url:"./unlockphieumau.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_mokhoaphieu").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0)
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại."),
									FocusAndSelect("#cbo_maphieumauunlock")
								else if(n==1) 
								{
									alert("Mở khóa phiếu mẫu thành công!"),
									fillcombo2('get_list_phieumaulock.php',document.frm_khoaphieu.cbo_maphieumaulock), 
	  								fillcombo2('get_list_phieumauunlock.php',document.frm_mokhoaphieu.cbo_maphieumauunlock),
									ClearInputValue("#txt_tenphieumauunlock"),
									ClearInputValue("#txt_ghichuphieuunlock"),
									ClearInputValue("#txt_ngaylapunlock"),
									ClearInputValue("#txt_thanglapunlock"),
									ClearInputValue("#txt_namlapunlock"),
									ClearInputValue("#txt_ngaycapnhatunlock")
								}
							},
							error:function(){},
							complete:function(){}
						}),!1
					}
					
				})
			},
}

function get_info_phieumau(filephp, frm)
{
	if(frm.cbo_maphieumaulock.value=='-Chọn mã phiếu mẫu-')
	{
		frm.txt_tenphieumaulock.value='';
		frm.txt_ghichuphieulock.value='';
		frm.txt_ngaylaplock.value='';
		frm.txt_thanglaplock.value='';
		frm.txt_namlaplock.value='';
		frm.txt_ngaycapnhatlock.value='';
	}
	else
	{
	ma=frm.cbo_maphieumaulock.value;
	ten=frm.txt_tenphieumaulock;
	ghichu=frm.txt_ghichuphieulock;
	ngay=frm.txt_ngaylaplock;
	thang=frm.txt_thanglaplock;
	nam=frm.txt_namlaplock;
	ngaycapnhat=frm.txt_ngaycapnhatlock;
	
	http=GetXmlHttpObject();
	var params = "maphieu="+ma;
	//mo ket noi bang phuong thuc post
	http.open("POST", filephp, false);
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//http.setRequestHeader("Content-length", params.length);
	//http.setRequestHeader("Connection", "close");
	//ham xu li du lieu tra ve cua ajax send thanh con
	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) 
		{				
				var x=http.responseXML.getElementsByTagName('row');								
				ten.value=x[0].getElementsByTagName('column')[0].firstChild.nodeValue;
				ghichu.value=x[0].getElementsByTagName('column')[1].firstChild.nodeValue;
				ngay.value=x[0].getElementsByTagName('column')[2].firstChild.nodeValue;
				thang.value=x[0].getElementsByTagName('column')[3].firstChild.nodeValue;
				nam.value=x[0].getElementsByTagName('column')[4].firstChild.nodeValue;
				ngaycapnhat.value=x[0].getElementsByTagName('column')[5].firstChild.nodeValue;
		}
	}
	http.send(params);
	}
}

function get_info_phieumauunlock(filephp, frm)
{
	if(frm.cbo_maphieumauunlock.value=='-Chọn mã phiếu mẫu-')
	{
		frm.txt_tenphieumauunlock.value='';
		frm.txt_ghichuphieuunlock.value='';
		frm.txt_ngaylapunlock.value='';
		frm.txt_thanglapunlock.value='';
		frm.txt_namlapunlock.value='';
		frm.txt_ngaycapnhatunlock.value='';
	}
	else
	{
	ma=frm.cbo_maphieumauunlock.value;
	ten=frm.txt_tenphieumauunlock;
	ghichu=frm.txt_ghichuphieuunlock;
	ngay=frm.txt_ngaylapunlock;
	thang=frm.txt_thanglapunlock;
	nam=frm.txt_namlapunlock;
	ngaycapnhat=frm.txt_ngaycapnhatunlock;
	
	http=GetXmlHttpObject();
	var params = "maphieu="+ma;
	//mo ket noi bang phuong thuc post
	http.open("POST", filephp, false);
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//http.setRequestHeader("Content-length", params.length);
	//http.setRequestHeader("Connection", "close");
	//ham xu li du lieu tra ve cua ajax send thanh con
	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) 
		{				
				var x=http.responseXML.getElementsByTagName('row');								
				ten.value=x[0].getElementsByTagName('column')[0].firstChild.nodeValue;
				ghichu.value=x[0].getElementsByTagName('column')[1].firstChild.nodeValue;
				ngay.value=x[0].getElementsByTagName('column')[2].firstChild.nodeValue;
				thang.value=x[0].getElementsByTagName('column')[3].firstChild.nodeValue;
				nam.value=x[0].getElementsByTagName('column')[4].firstChild.nodeValue;
				ngaycapnhat.value=x[0].getElementsByTagName('column')[5].firstChild.nodeValue;
		}
	}
	http.send(params);
	}
}