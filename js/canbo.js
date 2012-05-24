// JavaScript Document
function themcanbo(filephp,frm)
{
	var macb = frm.macanbo.value;
	var mabm = frm.chonbomon.value;
	var maquyen = frm.chonquyen.value;
	var tencb = frm.tencanbo.value;
	var diachicb = frm.diachi.value;
	var emailcb = frm.email.value;
	var sodienthoaicb = frm.sodienthoai.value;
	var matkhaucb = frm.matkhau.value;
	http=GetXmlHttpObject();
	var params = "macb="+macb;
	params+= "&mabm="+mabm;
	params+= "&maquyen="+maquyen;
	params+= "&tencb="+tencb;
	params+= "&diachicb="+diachicb;
	params+= "&emailcb="+emailcb;
	params+= "&sodienthoaicb="+sodienthoaicb;
	params+= "&matkhaucb="+matkhaucb;
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
			if(result=="Thành công"){
				frm.reset();
				}
		}
	}
	http.send(params);
}


function suacanbo(filephp,macb,diachi,email,sodienthoai,matkhau,maquyen)
{
	http=GetXmlHttpObject();
	var params= "macb="+macb.value;
	params+= "&diachi="+diachi.value;
	params+= "&email="+email.value;
	params+= "&sodienthoai="+sodienthoai.value;
	params+= "&matkhau="+matkhau.value;
	params+= "&maquyen="+maquyen.value;
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
			if(result=="Thành công")
			{				
				diachi.value="";
				email.value="";
				sodienthoai.value="";
				matkhau.value="";
				maquyen.value=-1;
				}
		}
	}
	http.send(params);
}

function xoacanbo(filephp,macb)
{
	http=GetXmlHttpObject();
	var params= "macb="+macb;
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

function get_info_canbo(filephp,diachi,email,sodt,quyen)
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
				var x=http.responseXML.getElementsByTagName('row');								
				diachi.value=x[0].getElementsByTagName('column')[0].firstChild.nodeValue;
				email.value=x[0].getElementsByTagName('column')[1].firstChild.nodeValue;
				sodt.value=x[0].getElementsByTagName('column')[2].firstChild.nodeValue;
				quyen.value=x[0].getElementsByTagName('column')[3].firstChild.nodeValue;
				//matkhau.value=x[0].getElementsByTagName('column')[3].firstChild.nodeValue;
		}
	}
	http.send(params);
}

