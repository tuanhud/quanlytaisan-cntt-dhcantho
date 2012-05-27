// JavaScript Document
function themcanbo(filephp,frm)
{	
	var madonvi = frm.cbo_tendonvithem.value;
	var macanbo = frm.txt_masocanbo.value;
	var tencanbo = frm.txt_tencanbo.value;
	var gioitinh = frm.ra_gioitinh.value;
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