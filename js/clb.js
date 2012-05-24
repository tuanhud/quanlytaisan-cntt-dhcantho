// JavaScript Document
function themclb(filephp,frm)
{
	var tenclb=frm.txt_tenclb.value;
	
	http=GetXmlHttpObject();
	var params = "tenclb="+tenclb;
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
				fillcombo('../get_list_clb.php',document.frm_xoaclb.cbo_tenclb);
				fillcombo('../get_list_clb.php',document.frm_suaclb.cbo_tenclb);
			}
			else frm.txt_tenclb.focus();
			
		}
	}
	http.send(params);
}


function xoaclb(filephp,frm)
{
	var idclb = frm.cbo_tenclb.value;
	http=GetXmlHttpObject();
	var params = "idclb="+idclb;
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
				fillcombo('../get_list_clb.php',document.frm_xoaclb.cbo_tenclb);
				fillcombo('../get_list_clb.php',document.frm_suaclb.cbo_tenclb);
				}
		}
	}
	http.send(params);
}

function suaclb(filephp,frm)
{
	var idclb = frm.cbo_tenclb.value;
	var tenclb = frm.txt_tenclb.value;
	http=GetXmlHttpObject();
	var params="idclb="+idclb;
	params+="&tenclb="+tenclb;
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
				fillcombo('../get_list_clb.php',document.frm_xoaclb.cbo_tenclb);
				fillcombo('../get_list_clb.php',document.frm_suaclb.cbo_tenclb);			
			}
			else if(result=='Bạn chưa chọn Câu lạc bộ.'){
				frm.cbo_tenclb.focus();
				}
			else frm.txt_tenclb.focus();
		}
	}
	http.send(params);
}
function get_info_clb(filephp, frm){
	var idclb = frm.cbo_tenclb.value;	
	http=GetXmlHttpObject();
	var params="idclb="+idclb;
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
			frm.txt_tenclb.value = result;			
		}
	}
	http.send(params);
	}