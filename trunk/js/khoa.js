// JavaScript Document
function themKhoa(filephp,frm)
{
	http=GetXmlHttpObject();
	var tenkhoa =frm.txt_tenkhoa.value;
	var params = "tenkhoa="+tenkhoa;

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
				fillcombo('../get_list_khoa.php',document.frm_suakhoa.cbo_tenkhoa);
				fillcombo('../get_list_khoa.php',document.frm_xoakhoa.cbo_tenkhoa);
				}
			else frm.txt_tenkhoa.focus();
		}
	}
	http.send(params);
}
function get_info_khoa(filephp, frm){
	var idkhoa = frm.cbo_tenkhoa.value;
	http=GetXmlHttpObject();
	var params = "idkhoa="+idkhoa;
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
			frm.txt_tenkhoa_moi.value = result;
		}
	}
	http.send(params);
	}
function suaKhoa(filephp, frm){
	var idkhoa = frm.cbo_tenkhoa.value;
	var tenkhoa_moi = frm.txt_tenkhoa_moi.value;
	http=GetXmlHttpObject();
	var params = "idkhoa="+idkhoa;
	params += "&tenkhoa_moi="+tenkhoa_moi;
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
			if(result=='Bạn chưa chọn Khoa.')
			{
				frm.cbo_tenkhoa.focus();
				}
			else if(result=='Thành công.'){
				frm.reset();
				fillcombo('../get_list_khoa.php',document.frm_xoakhoa.cbo_tenkhoa);
				fillcombo('../get_list_khoa.php',document.frm_suakhoa.cbo_tenkhoa);
				}
			else frm.txt_tenkhoa_moi.focus();
		}
	}
	http.send(params);
	}
function xoaKhoa(filephp,frm)
{
	var idkhoa = document.frm_xoakhoa.cbo_tenkhoa.value;
	http=GetXmlHttpObject();
	var params = "idkhoa="+idkhoa;
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
			if(result=='Thành công'){
				fillcombo('../get_list_khoa.php',document.frm_xoakhoa.cbo_tenkhoa);
				fillcombo('../get_list_khoa.php',document.frm_suakhoa.cbo_tenkhoa);
				}
				else frm.cbo_tenkhoa.focus();
		}
	}
	http.send(params);
}