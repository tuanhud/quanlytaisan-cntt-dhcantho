// JavaScript Document
function themban(filephp,frm)
{	
	http=GetXmlHttpObject();
	var params = "tenban="+frm.txt_tenban.value;
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
			else
			frm.txt_tenban.focus();
		}
	}
	http.send(params);
}

function xoaban(filephp,frm)
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

function suaban(filephp,frm)
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