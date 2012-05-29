

var _mathuoctinh, _tenthuoctinh, _ghichu;
var _stt 	= 0;
var source 	= new Array();
getRecord('get_info_thuoctinh.php');
	
function getRecord(phpfile)
{
	http=GetXmlHttpObject();
	var params ="";
	//mo ket noi bang phuong thuc post
	http.open("POST", phpfile, false);
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//http.setRequestHeader("Content-length", params.length);
	//http.setRequestHeader("Connection", "close");
	//ham xu li du lieu tra ve cua ajax send thanh cong
	http.onreadystatechange = function() {
	if(http.readyState == 4 && http.status == 200) 
	   {
		var x = http.responseXML.getElementsByTagName('RESULT');		
				_mathuoctinh    		 = x[0].getElementsByTagName('MA')[0].childNodes[0].nodeValue;
				_tenthuoctinh 		 = x[0].getElementsByTagName('TEN')[0].childNodes[0].nodeValue;
				_ghichu = x[0].getElementsByTagName('GHICHU')[0].childNodes[0].nodeValue;
				
				var x=http.responseXML.getElementsByTagName('RESULT');
					   for(var i=0;i<x.length;i++)
					   { 					        
						hv_ten[i]= x[i].getElementsByTagName('ID')[0].firstChild.nodeValue + "\t"+ x[i].getElementsByTagName('HOTEN')[0].firstChild.nodeValue;
					   }
				
	   }
	}
	http.send(params);
}
