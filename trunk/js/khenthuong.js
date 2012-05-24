// JavaScript Document
function themKhenthuong(filephp,frm)
{
	http=GetXmlHttpObject();
	var tenkhenthuong =frm.txt_tenkhenthuong.value;
	var ghichu = frm.txta_ghichu.value;
	var params = "tenkhenthuong="+tenkhenthuong;
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
				fillcombo('../get_list_khenthuong.php',document.frm_suakhenthuong.cbo_tenkhenthuong);
				fillcombo('../get_list_khenthuong.php',document.frm_xoakhenthuong.cbo_tenkhenthuong);
				}
			else if(result=='Ghi chú có chiều dài tối đa 500 ký tự.')			
				frm.txta_ghichu.focus();
			else
				frm.txt_tenkhenthuong.focus();
		}
	}
	http.send(params);
}
function get_info_khenthuong(filephp,frm)
{
	var idkhenthuong = frm.cbo_tenkhenthuong.value;
	http=GetXmlHttpObject();
	var params = "idkhenthuong="+idkhenthuong;
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
				frm.txt_tenkhenthuong.value=x[0].getElementsByTagName('column')[0].firstChild.nodeValue;
				frm.txta_ghichu.value=x[0].getElementsByTagName('column')[1].firstChild.nodeValue;				
		}
	}
	http.send(params);
}

function suaKhenthuong(filephp, frm){
	var idkhenthuong = frm.cbo_tenkhenthuong.value;
	var tenkhenthuong = frm.txt_tenkhenthuong.value;
	var ghichu = frm.txta_ghichu.value;
	http=GetXmlHttpObject();
	var params = "idkhenthuong="+idkhenthuong;
	params += "&tenkhenthuong="+tenkhenthuong;
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
				fillcombo('../get_list_khenthuong.php',document.frm_suakhenthuong.cbo_tenkhenthuong);
				fillcombo('../get_list_khenthuong.php',document.frm_xoakhenthuong.cbo_tenkhenthuong);					
				}
			else if(result=='Ghi chú có chiều dài tối đa 1000 ký tự.')			
				frm.txta_ghichu.focus();
			else if(result=='Bạn chưa chọn hình thức khen thưởng.')
				frm.cbo_tenkhenthuong.focus();
			else
				frm.txt_tenkhenthuong.focus();			
		}
	}
	http.send(params);
	}
function xoaKhenthuong(filephp,frm)
{
	var idkhenthuong = frm.cbo_tenkhenthuong.value;
	http=GetXmlHttpObject();
	var params = "idkhenthuong="+idkhenthuong;
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
				fillcombo('../get_list_khenthuong.php',document.frm_suakhenthuong.cbo_tenkhenthuong);
				fillcombo('../get_list_khenthuong.php',document.frm_xoakhenthuong.cbo_tenkhenthuong);
				}
			else frm.cbo_tenkhenthuong.focus(); 
		}
	}
	http.send(params);
}