// JavaScript Document
function themdonvi(filephp,frm)
{
	http=GetXmlHttpObject();
	var tendonvi =frm.txt_tendonvithem.value;
	var params = "tendonvi="+tendonvi;

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
				fillcombo('get_list_donvi.php',document.frm_suadonvi.cbo_tendonvisua);
				fillcombo('get_list_donvi.php',document.frm_xoadonvi.cbo_tendonvixoa);
				}
			else frm.txt_tendonvithem.focus();
		}
	}
	http.send(params);
}


function get_info_donvi(filephp, frm)
{
	if(frm.cbo_tendonvisua.value==-1)
	{
		frm.txt_tendonvisua.value='';
	}
	else
	{
		var madonvisua = frm.cbo_tendonvisua.value;
		http=GetXmlHttpObject();
		var params = "madonvisua="+madonvisua;
		//mo ket noi bang phuong thuc post
		http.open("POST", filephp, false);
		//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
		http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		//http.setRequestHeader("Content-length", params.length);
		http.setRequestHeader("Connection", "close");
		//ham xu li du lieu tra ve cua ajax send thanh cong
		http.onreadystatechange = function()
		{
			if(http.readyState == 4 && http.status == 200) 
			{
				var result=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
				frm.txt_tendonvisua.value = result;
			}
		}
		http.send(params);
		
		}
	}
	
	
function suadonvi(filephp, frm){
	var madonvisua = frm.cbo_tendonvisua.value;
	var tendonvisua = frm.txt_tendonvisua.value;
	http=GetXmlHttpObject();
	var params = "madonvisua="+madonvisua;
	params += "&tendonvisua="+tendonvisua;
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
				fillcombo('get_list_donvi.php',document.frm_suadonvi.cbo_tendonvisua);
				fillcombo('get_list_donvi.php',document.frm_xoadonvi.cbo_tendonvixoa);
				}
			else frm.txt_tenkhoa_moi.focus();
		}
	}
	http.send(params);
	}
	
	
function xoadonvi(filephp,frm)
{
	var madonvixoa = document.frm_xoadonvi.cbo_tendonvixoa.value;
	http=GetXmlHttpObject();
	var params = "madonvixoa="+madonvixoa;
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
			if(result=='Thành công')
			{
				frm.reset();
				fillcombo('get_list_donvi.php',document.frm_suadonvi.cbo_tendonvisua);
				fillcombo('get_list_donvi.php',document.frm_xoadonvi.cbo_tendonvixoa);
			}
			else frm.cbo_tenkhoa.focus();
		}
	}
	http.send(params);
}