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
			if(result=='Thành công'){
			get_new_namhoc('../get_new_namhoc.php', document.frm_themnamhoc);
			fillcombo('../get_list_namhoc.php',document.frm_themhocki.cbo_tennamhoc);
			get_con_namhoc('../get_con_namhoc.php', document.frm_themhocki);
			get_new_hocki('../get_new_hocki.php', document.frm_themhocki);
			fillcombo('../get_list_namhoc.php',document.frm_chonhockihientai.cbo_tennamhoc);	
			get_cur_namhoc('../get_cur_namhoc.php',document.frm_chonhockihientai);
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

function themhocki(filephp, frm)
{
	var idnamhoc = frm.cbo_tennamhoc.value;
	var tenhocki = frm.txt_tenhocki.value;
	http=GetXmlHttpObject();
	var params = "idnamhoc="+idnamhoc;
	params +="&tenhocki="+tenhocki;
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
			if(result=='Thành công')
			{
			get_new_hocki('../get_new_hocki.php', document.frm_themhocki);
			get_con_namhoc('../get_con_namhoc.php', document.frm_themhocki);
			get_cur_namhoc('../get_cur_namhoc.php',document.frm_chonhockihientai);
			_fillcombo('../get_list_hocki.php',document.frm_chonhockihientai.cbo_tennamhoc, document.frm_chonhockihientai.cbo_tenhocki);
			get_cur_hocki('../get_cur_hocki.php',document.frm_chonhockihientai);
				}			
		}
	}
	http.send(params);
}

function chonhockihientai(filephp,frm)
{
	var idhocki = frm.cbo_tenhocki.value;
	http=GetXmlHttpObject();
	var params = "idhocki="+idhocki;
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

function get_con_namhoc(filephp,frm)
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
			var result=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
			if(result=='Năm học tiếp theo chưa được tạo.'){
			alert(result);
			frm.cbo_tennamhoc.selectedIndex = 0;
			}
			else 
			frm.cbo_tennamhoc.selectedIndex = result;
		}
	}
	http.send(params);
}
function get_new_hocki(filephp,frm)
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
			var result=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
			frm.txt_tenhocki.value = result;
		}
	}
	http.send(params);
}
function get_cur_namhoc(filephp,frm)
{
	http=GetXmlHttpObject();
	var params = "";
	//mo ket noi bang phuong thuc post
	http.open("POST", filephp, false);
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//http.setRequestHeader("Content-length", params.length);
	//http.setRequestHeader("Connection", "close");
	//ham xu li du lieu tra ve cua ajax send thanh cong
	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) 
		{
			var result=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
			frm.cbo_tennamhoc.selectedIndex = result;
		}
	}
	http.send(params);
}
function get_cur_hocki(filephp,frm)
{
	http=GetXmlHttpObject();
	var params = "";
	//mo ket noi bang phuong thuc post
	http.open("POST", filephp, false);
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//http.setRequestHeader("Content-length", params.length);
	//http.setRequestHeader("Connection", "close");
	//ham xu li du lieu tra ve cua ajax send thanh cong
	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) 
		{
			var result=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
			frm.cbo_tenhocki.selectedIndex = result;
		}
	}
	http.send(params);
}