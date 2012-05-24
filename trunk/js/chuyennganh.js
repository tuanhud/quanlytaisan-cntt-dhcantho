// JavaScript Document
function themchuyennganh(filephp,frm)
{
	http=GetXmlHttpObject();
	var params = "idkhoa="+frm.cbo_tenkhoa.value;
	params += "&tenchuyennganh="+frm.txt_tenchuyennganh.value;	
	
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
			if(result=='Thành công'){											
			_fillcombo('../get_list_chuyennganh.php',document.frm_xoachuyennganh.cbo_tenkhoa, document.frm_xoachuyennganh.cbo_tenchuyennganh);
			_fillcombo('../get_list_chuyennganh.php',document.frm_suachuyennganh.cbo_tenkhoa, document.frm_suachuyennganh.cbo_tenchuyennganh);
				}
			else if(result=='Bạn chưa chọn khoa.') frm.cbo_tenkhoa.focus();	
			else frm.txt_tenchuyennganh.focus();
		}
	}
	http.send(params);
}

function xoachuyennganh(filephp,frm)
{
	var idkhoa = frm.cbo_tenkhoa.value;
	var idchuyennganh = frm.cbo_tenchuyennganh.value;
	http=GetXmlHttpObject();
	var params= "idkhoa="+idkhoa;
	params+="&idchuyennganh="+idchuyennganh;
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
			if(result=='Thành công'){
			_fillcombo('../get_list_chuyennganh.php',document.frm_xoachuyennganh.cbo_tenkhoa, document.frm_xoachuyennganh.cbo_tenchuyennganh);
			_fillcombo('../get_list_chuyennganh.php',document.frm_suachuyennganh.cbo_tenkhoa, document.frm_suachuyennganh.cbo_tenchuyennganh);
				}			
			else if(result=='Bạn chưa chọn khoa'){
				frm.cbo_tenkhoa.focus();
				}
			else{
				frm.cbo_tenchuyennganh.focus();
				}
		}
	}
	http.send(params);
}

function suachuyennganh(filephp,frm)
{	
	var idchuyennganh = frm.cbo_tenchuyennganh.value;
	var tenchuyennganh = frm.txt_tenchuyennganh.value;
	http=GetXmlHttpObject();
	var params= "idchuyennganh="+idchuyennganh;
	params+="&tenchuyennganh="+tenchuyennganh;
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
			if(result=='Thành công'){
			_fillcombo('../get_list_chuyennganh.php',document.frm_suachuyennganh.cbo_tenkhoa, document.frm_suachuyennganh.cbo_tenchuyennganh);
			_fillcombo('../get_list_chuyennganh.php',document.frm_xoachuyennganh.cbo_tenkhoa, document.frm_xoachuyennganh.cbo_tenchuyennganh);
				}
				else if(result=='Bạn chưa chọn chuyên ngành.') frm.cbo_tenchuyennganh.focus();
				else frm.txt_tenchuyennganh.focus();			
		}
	}
	http.send(params);
}

function get_info_chuyennganh(filephp, frm){
	var idchuyennganh = frm.cbo_tenchuyennganh.value;
	http=GetXmlHttpObject();
	var params= "idchuyennganh="+idchuyennganh;
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
			frm.txt_tenchuyennganh.value = result;
		}
	}
	http.send(params);
	}