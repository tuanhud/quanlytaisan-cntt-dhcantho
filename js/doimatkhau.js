// JavaScript Document
function doiMatkhau(filephp,mk_hientai,mk_moi,xacnhan_mk_moi)
{
	http=GetXmlHttpObject();
	var params = "mk_hientai="+mk_hientai.value;
	params+= "&mk_moi="+mk_moi.value;
	params+= "&xacnhan_mk_moi="+xacnhan_mk_moi.value;	
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
				mk_hientai.value="";
				mk_moi.value="";
				xacnhan_mk_moi.value="";
			}
		}
	}
	http.send(params);
}
