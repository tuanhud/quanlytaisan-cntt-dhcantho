// JavaScript Document
function themnoidung(filephp,frm)
{
	var tennoidung = frm.tennoidung.value;
	http=GetXmlHttpObject();
	var params = "tennoidung="+tennoidung;
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

function suanoidung(filephp,manoidung,tennoidung)
{
	http=GetXmlHttpObject();
	var params= "manoidung="+manoidung;
	params+= "&tennoidung="+tennoidung;
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

function xoanoidung(filephp,frm)
{
	var chontennoidung = frm.chontennoidung.value;
	http=GetXmlHttpObject();
	var params = "chontennoidung="+chontennoidung;
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

function timnoidung(filephp,frm)
{
	http=GetXmlHttpObject();
	frm.chonmanoidung.value;
	var params="";
	//mo ket noi bang phuong thuc post
	http.open("POST", filephp+"?manoidung="+frm.chonmanoidung.value, false);
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.setRequestHeader("Content-length", params.length);
	http.setRequestHeader("Connection", "close");
	//ham xu li du lieu tra ve cua ajax send thanh cong
	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) 
		{
			
				var x=http.responseXML.getElementsByTagName('row');
				frm.tennoidung.value=x[0].getElementsByTagName('column')[1].firstChild.nodeValue;
		}
	}
	http.send(params);
}

function autoCreateID(filephp,frm)
{
	http=GetXmlHttpObject();
	var params="";
	//mo ket noi bang phuong thuc post
	http.open("POST", filephp+"?mahp="+frm.chontenhocphan.value, false);	
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.setRequestHeader("Content-length", params.length);
	http.setRequestHeader("Connection", "close");
	//ham xu li du lieu tra ve cua ajax send thanh cong
	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) 
		{									
			frm.malophocphan.value = http.responseText.substring(1);
		}
	}
	http.send(params);
}

