function init_date_input(cbNgay,cbThang,cbNam)
{
	var d = new Date();
	cbNgay.options.length=0;
	 var oOption = document.createElement("OPTION");
	   oOption.text="Ngày";
	   oOption.value="-1";
	   cbNgay.add(oOption)
		for(var i=1;i<=31;i++)
				{	
					 	var oOption = document.createElement("OPTION");
					   oOption.text=i;
					   oOption.value=i;
					   cbNgay.add(oOption)
				}
	var oOption = document.createElement("OPTION");
	   oOption.text="Tháng";
	   oOption.value="-1";
	   cbThang.add(oOption)
		for(var i=1;i<=12;i++)
				{	
					 	var oOption = document.createElement("OPTION");
					   oOption.text=i;
					   oOption.value=i;
					   cbThang.add(oOption)
				}
	
	
	
	cbNam.options.length=0;
	 var oOption = document.createElement("OPTION");
	   oOption.text="Năm";
	   oOption.value="-1";
	   cbNam.add(oOption)
				for(var i=d.getFullYear();i>d.getFullYear()-100;i--)
				{	
					 	var oOption = document.createElement("OPTION");
					   oOption.text=i;
					   oOption.value=i;
					   cbNam.add(oOption)

 				}
}

/*
function isValidDate(d,m,y) {
   	var dt = new Date(y,m-1,d, 0, 0, 0, 0);
   	if (d != dt.getDate()) { return false; }
   	if (m-1 != dt.getMonth()) { return false; }
   	return true;
}

function isValidDate_2(d,m,y) {
	var D = new Date();
	if(y>D.getFullYear()+1|| y < (D.getFullYear()-1)) { return false; }
   var dt = new Date(y,m-1,d, 0, 0, 0, 0);
   if (d != dt.getDate()) { return false; }
   if (m-1 != dt.getMonth()) { return false; }
   return true;
}

function lay_thoigian(filephp,frm)
{
	http=GetXmlHttpObject();
	var params="";
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
				
				frm.Daybd.value=parseInt(x[0].getElementsByTagName('column')[0].firstChild.nodeValue.substring(8,10));
				frm.Monthbd.value=parseInt(x[0].getElementsByTagName('column')[0].firstChild.nodeValue.substring(5,7));
				frm.Yearbd.value=parseInt(x[0].getElementsByTagName('column')[0].firstChild.nodeValue.substring(0,4));
				
				frm.Daykt.value=parseInt(x[0].getElementsByTagName('column')[1].firstChild.nodeValue.substring(8,10));
				frm.Monthkt.value=parseInt(x[0].getElementsByTagName('column')[1].firstChild.nodeValue.substring(5,7));
				frm.Yearkt.value=parseInt(x[0].getElementsByTagName('column')[1].firstChild.nodeValue.substring(0,4));
				
		}
	}
	http.send(params);
}


function capnhat_thoigian(filephp,frm)
{
	if(!isValidDate_2(frm.Daybd.value,frm.Monthbd.value,frm.Yearbd.value))
	{
		alert("Ngày bắt đầu không hợp lệ");
		return;
	}
	if(!isValidDate_2(frm.Daykt.value,frm.Monthkt.value,frm.Yearkt.value))
	{
		alert("Ngày kết thúc không hợp lệ");
		return;
	}
	var be = new Date(frm.Yearbd.value,frm.Monthbd.value-1,frm.Daybd.value, 0, 0, 0, 0);
	var en = new Date(frm.Yearkt.value,frm.Monthkt.value-1,frm.Daykt.value, 0, 0, 0, 0);
	
	if(be>en)
	{
		alert("Ngày bắt đầu sau ngày kết thúc");
		return;
	}
	var bd=frm.Yearbd.value+"/"+frm.Monthbd.value+"/"+frm.Daybd.value;
	var kt=frm.Yearkt.value+"/"+frm.Monthkt.value+"/"+frm.Daykt.value;
	http=GetXmlHttpObject();
	var params="bd="+bd;
	params+="&kt="+kt;
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

*/