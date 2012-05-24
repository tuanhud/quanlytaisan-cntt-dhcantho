// JavaScript Document
function themhoatdong(filephp,frm)
{
	http=GetXmlHttpObject();
	var hoatdong_ten =frm.txt_tenhoatdong.value;
	var params = "hoatdong_ten="+hoatdong_ten;
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
				fillcombo('get_list_hoatdong.php',frm.cbo_tenhoatdong);
				}
			else 
				frm.txt_tenhoatdong.focus();
		}
	}
	http.send(params);
}