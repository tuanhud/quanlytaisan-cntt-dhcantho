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
function check_add_canbo()
{

	if($("#cbo_tendonvithem").val()==-1) FocusAndSelect("#cbo_tendonvithem");
		else if($("#txt_masocanbo").val()=="") $("#txt_masocanbo").focus();	
			else if($("#tennxb option:selected").val()==-1) alert("Bạn chưa chọn nhà xuất bản !")	
				else if($("#giaban").val()=="") $("#giaban").focus()
						else if($("#ngonngu option:selected").val()=="0")alert("Bạn chưa chọn ngôn ngữ !")
								else if($("#sotrang").val()=="")$("#sotrang").focus()
									else if($("#urlan").val=="")$("#urlanh").focus()
			
	
}
function check_date()
{
	
}
function checkEmail(n)
{
	return n.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/)!=-1?!0:!1
	
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
					check_add_canbo();
					/*if(CheckEmptyInput($("#txt_tendonvithem")))
					{	
						return $.ajax
						({
							url:"./themdonvi.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_themdonvi").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0)
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại.")
								else if(n==1) 
								{
									alert("Thành công !"),
									fillcombo('get_list_donvi.php',document.frm_suadonvi.cbo_tendonvisua);
									fillcombo('get_list_donvi.php',document.frm_xoadonvi.cbo_tendonvixoa);
									ClearInputValue("#txt_tendonvithem"),
									FocusAndSelect("#txt_tendonvithem")
								}
								else
								{
									alert("Đơn vị này đã tồn tại.")
								}
								
							},
							error:function(){},
							complete:function(){}
						}),!1
					}*/
					
				})
			},
}
function themcanbo(filephp,frm)
{	

	
	var madonvi = frm.cbo_tendonvithem.value;
	var macanbo = frm.txt_masocanbo.value;
	var tencanbo = frm.txt_tencanbo.value;
	var gioitinh = frm.sl_gioitinh.value;
	var ngaysinh = frm.txt_ngaysinh.value;
	var email = frm.txt_email.value;
	var diachi = frm.txt_diachi.value;
	var dienthoai = frm.txt_sodienthoai.value;
	var matkhau = frm.txt_matkhau.value;
	http=GetXmlHttpObject();
	var params="madonvi="+madonvi;
	params+="&macanbo="+macanbo;
	params+="&tencanbo="+tencanbo;
	params+="&gioitinh="+gioitinh;
	params+="&ngaysinh="+ngaysinh;
	params+="&email="+email;
	params+="&diachi="+diachi;
	params+="&dienthoai="+dienthoai;
	params+="&matkhau="+matkhau;
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
			}
			else
			frm.txt_masocanbo.focus();
		}
	}
	http.send(params);
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