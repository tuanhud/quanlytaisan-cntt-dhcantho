// JavaScript Document
function themKyluat(filephp,frm)
{
	http=GetXmlHttpObject();
	var tenkyluat =frm.txt_tenkyluat.value;
	var ghichu = frm.txta_ghichu.value;
	var params = "tenkyluat="+tenkyluat;
	params+="&ghichu="+ghichu;
	//mo ket noi bang phuong thuc post
	http.open("POST", filephp, false);
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.setRequestHeader("Content-length", params.length);
	http.setRequestHeader("Connection", "close");
	//ham xu li du lieu tra ve cua ajax send thanh cong
	http.onreadystatechange = function() 
	{
		if(http.readyState == 4 && http.status == 200) 
		{
			var result=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
			alert(result);
			if(result=='Thành công.'){
				frm.reset();
		fillcombo('../get_list_kyluat.php',document.frm_suakyluat.cbo_tenkyluat);
		fillcombo('../get_list_kyluat.php',document.frm_xoakyluat.cbo_tenkyluat);
				}
			else if(result=='Ghi chú có chiều dài tối đa 1000 ký tự.')			
				frm.txta_ghichu.focus();
			else
				frm.txt_tenkyluat.focus();
		}
	}
	http.send(params);
}
function get_info_kyluat(filephp,frm)
{
	var idkyluat = frm.cbo_tenkyluat.value;
	http=GetXmlHttpObject();
	var params = "idkyluat="+idkyluat;
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
				frm.txt_tenkyluat.value=x[0].getElementsByTagName('column')[0].firstChild.nodeValue;
				frm.txta_ghichu.value=x[0].getElementsByTagName('column')[1].firstChild.nodeValue;				
		}
	}
	http.send(params);
}

function suaKyluat(filephp, frm){
	var idkyluat = frm.cbo_tenkyluat.value;
	var tenkyluat = frm.txt_tenkyluat.value;
	var ghichu = frm.txta_ghichu.value;
	http=GetXmlHttpObject();
	var params = "idkyluat="+idkyluat;
	params += "&tenkyluat="+tenkyluat;
	params += "&ghichu="+ghichu;
	//mo ket noi bang phuong thuc post
	http.open("POST", filephp, false);
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.setRequestHeader("Content-length", params.length);
	http.setRequestHeader("Connection", "close");
	//ham xu li du lieu tra ve cua ajax send thanh cong
	http.onreadystatechange = function()
	{
		if(http.readyState == 4 && http.status == 200) 
		{
			var result=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
			alert(result);
			if(result=='Thành công.'){
				frm.reset();
				fillcombo('../get_list_kyluat.php',document.frm_suakyluat.cbo_tenkyluat);
				fillcombo('../get_list_kyluat.php',document.frm_xoakyluat.cbo_tenkyluat);						
				}
			else if(result=='Ghi chú có chiều dài tối đa 1000 ký tự.')			
				frm.txta_ghichu.focus();
			else if(result=='Bạn chưa chọn hình thức kỷ luật.')
				frm.cbo_tenkyluat.focus();
			else
				frm.txt_tenkyluat.focus();			
		}
	}
	http.send(params);
	}
function xoaKyluat(filephp,frm)
{
	var idkyluat = frm.cbo_tenkyluat.value;
	http=GetXmlHttpObject();
	var params = "idkyluat="+idkyluat;
	//mo ket noi bang phuong thuc post
	http.open("POST", filephp, false);
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.setRequestHeader("Content-length", params.length);
	http.setRequestHeader("Connection", "close");
	//ham xu li du lieu tra ve cua ajax send thanh cong
	http.onreadystatechange = function()
	{
		if(http.readyState == 4 && http.status == 200) 
		{
			var result=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
			alert(result);
			if(result=="Thành công"){
				fillcombo('../get_list_kyluat.php',document.frm_suakyluat.cbo_tenkyluat);
				fillcombo('../get_list_kyluat.php',document.frm_xoakyluat.cbo_tenkyluat);	
				}
			else frm.cbo_tenkyluat.focus();
		}
	}
	http.send(params);
}