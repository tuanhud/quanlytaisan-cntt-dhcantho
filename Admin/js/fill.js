//hien thi ten, value la ma
function fillcombo(filephp,combo)
{	
	http=GetXmlHttpObject();
	//var params = "";
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
				var x=http.responseXML.getElementsByTagName('row');
				combo.options.length=0;
				for(var i=0;i<x.length;i++)
				{	
					 var oOption = document.createElement("OPTION");
					   oOption.text=x[i].getElementsByTagName('column')[1].firstChild.nodeValue;
					   oOption.value=x[i].getElementsByTagName('column')[0].firstChild.nodeValue;
					   combo.add(oOption);
				}
		}
	}
	http.send();
}

//hien thi ma, value la ma 
function fillcombo2(filephp,combo)
{	
	http=GetXmlHttpObject();
	//var params = "";
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
				var x=http.responseXML.getElementsByTagName('row');
				combo.options.length=0;
				for(var i=0;i<x.length;i++)
				{	
					 var oOption = document.createElement("OPTION");
					   oOption.text=x[i].getElementsByTagName('column')[0].firstChild.nodeValue;
					   oOption.value=x[i].getElementsByTagName('column')[0].firstChild.nodeValue;
					   combo.add(oOption);
				}
		}
	}
	http.send();
}

function _fillcombo(filephp, par_combo, chil_combo)
{	
	var id = par_combo.value;
	http=GetXmlHttpObject();
	var params = "id="+id;
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
				var x=http.responseXML.getElementsByTagName('row');
				chil_combo.options.length=0;
				for(var i=0;i<x.length;i++)
				{	
					 var oOption = document.createElement("OPTION");
					   oOption.text=x[i].getElementsByTagName('column')[1].firstChild.nodeValue;
					   oOption.value=x[i].getElementsByTagName('column')[0].firstChild.nodeValue;
					   chil_combo.add(oOption);
				}
		}
	}
	http.send(params);
}

function onlyNumbers(evt)
{

	var e = evt
	if(window.event){ // IE
		var charCode = e.keyCode;
	} else if (e.which) { // Safari 4, Firefox 3.0.4
		var charCode = e.which
	}
	if (charCode > 31 && (charCode < 48 || charCode > 57))
	return false;
	return true;

}
