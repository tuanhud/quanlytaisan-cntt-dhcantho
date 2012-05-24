// JavaScript Document
function themnamhoc(filephp,frm)
{
	var tennamhoc=frm.txt_tennamhoc.value;
	http=GetXmlHttpObject();
	var params = "tennamhoc="+tennamhoc;
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

function xoanamhoc(filephp,frm)
{
	var idnamhoc = frm.cbo_tennamhoc.value;
	http=GetXmlHttpObject();
	var params = "idnamhoc="+idnamhoc;
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
			fillcombo('../get_list_namhoc.php',document.frm_xoanamhoc.cbo_tennamhoc);
			get_new_namhoc('../get_new_namhoc.php',document.frm_themnamhoc);
				}
		}
	}
	http.send(params);
}

function get_new_namhoc(filephp, frm){
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
			var result=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
			frm.txt_tennamhoc.value = result;
		}
	}
	http.send(params);
	}