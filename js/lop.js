// JavaScript Document
function themlophocphan(filephp,frm)
{
	//var malophocphan = frm.malophocphan.value;
	var chongiangvien = frm.chongiangvien.value;
	var chontenhocphan = frm.chontenhocphan.value;
	var chonnienkhoa = frm.chonnienkhoa.value;
	var chonhocki = frm.chonhocki.value;
	http=GetXmlHttpObject();
	//var params = "malophocphan="+malophocphan;
	var params = "chongiangvien="+chongiangvien;
	params+= "&chontenhocphan="+chontenhocphan;
	params+= "&chonnienkhoa="+chonnienkhoa;
	params+= "&chonhocki="+chonhocki;
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

function xoalophocphan(filephp,malop)
{
	http=GetXmlHttpObject();
	var params= "malop="+malop;
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


function timlophocphan(filephp,frm)
{
	http=GetXmlHttpObject();
	var params="";
	//mo ket noi bang phuong thuc post
	http.open("POST", filephp+"?malophocphanxoa="+frm.malophocphanxoa.value, false);
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.setRequestHeader("Content-length", params.length);
	http.setRequestHeader("Connection", "close");
	//ham xu li du lieu tra ve cua ajax send thanh cong
	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) 
		{
			
				var x=http.responseXML.getElementsByTagName('row');
				if(x.length==0)
					{
						alert('Không lớp học phần này');
						frm.malophocphanxoa.focus();
						return;
					}
				frm.tenhocphanxoa.value=x[0].getElementsByTagName('column')[0].firstChild.nodeValue;
				frm.tengiangvienxoa.value=x[0].getElementsByTagName('column')[1].firstChild.nodeValue;
				frm.tennienkhoaxoa.value=x[0].getElementsByTagName('column')[2].firstChild.nodeValue;
				frm.tenhockixoa.value=x[0].getElementsByTagName('column')[3].firstChild.nodeValue;
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

