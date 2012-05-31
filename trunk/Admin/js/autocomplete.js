var hv_ten 	= new Array();
var _id, _ten, _ghichu;
var _stt 	= 0,
	numRow  = 0 ;

function createAutoComplete(){
YUI({ filter: 'raw' }).use('datatable','autocomplete', 'autocomplete-filters', 'autocomplete-highlighters', function (Y) {
	autoCom = new Y.one('#cbo_tenthietbi');	
	autoCom.plug(Y.Plugin.AutoComplete,{
    resultFilters    	: 'phraseMatch',
    resultHighlighter	: 'phraseMatch',
	enableCache			: false,
	maxResults			: 10,
    source           	: hv_ten
  	});	
	//autoCom.unplug(Y.Plugin.AutoComplete);
	//Xu ly su kien chon Item
    autoCom.ac.after('select', function (e)
	{ 
			getRecord('./get_list_thuoctinh.php',e.result.raw.substr(0,7));		
			dt.addRow({
	            id 			: _id,
    	        ten		: _ten,
				ghichu	: _ghichu,
      });
						
			var chks = dt.get('srcNode').all("tbody input.myCheckboxFmtr");
	        chks.each( function(item){
            numRow += 1;
        	});
			_stt = numRow;
			numRow = 0;
    });			
});
}
/*function get_list_taisan(phpfile){
	http=GetXmlHttpObject();
	//mo ket noi bang phuong thuc post
	http.open("POST", phpfile, false);
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//http.setRequestHeader("Content-length", params.length);
	//http.setRequestHeader("Connection", "close");
	//ham xu li du lieu tra ve cua ajax send thanh cong
	http.onreadystatechange = function() 
	{
	if(http.readyState == 4 && http.status == 200) 
	   {
					   var x=http.responseXML.getElementsByTagName('RESULT');
					   hv_ten.length=0;
					   for(var i=0;i<x.length;i++)
					   { 					        
						hv_ten[i]= x[i].getElementsByTagName('MA')[0].firstChild.nodeValue + "\t"+ x[i].getElementsByTagName('TEN')[0].firstChild.nodeValue;
					   }
	   }
	}
	http.send();
	}*/
/*function get_list_hoivien_chsv (phpfile, chsv_id){
	var params ="chsv_id="+chsv_id;
	http=GetXmlHttpObject();
	//mo ket noi bang phuong thuc post
	http.open("POST", phpfile, false);
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//http.setRequestHeader("Content-length", params.length);
	//http.setRequestHeader("Connection", "close");
	//ham xu li du lieu tra ve cua ajax send thanh cong
	http.onreadystatechange = function() 
	{
	if(http.readyState == 4 && http.status == 200) 
	   {
					   var x=http.responseXML.getElementsByTagName('RESULT');
					   hv_ten.length=0;
					   for(var i=0;i<x.length;i++)
					   { 					        
						hv_ten[i]= x[i].getElementsByTagName('ID')[0].firstChild.nodeValue + "\t"+ x[i].getElementsByTagName('HOTEN')[0].firstChild.nodeValue;
					   }
	   }
	}
	http.send(params);
}		*/	   

/*function get_list_hoivien_lchsv(phpfile, lchsv_id){
	var params ="lchsv_id="+lchsv_id;
	http=GetXmlHttpObject();
	//mo ket noi bang phuong thuc post
	http.open("POST", phpfile, false);
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//http.setRequestHeader("Content-length", params.length);
	//http.setRequestHeader("Connection", "close");
	//ham xu li du lieu tra ve cua ajax send thanh cong
	http.onreadystatechange = function() 
	{
	if(http.readyState == 4 && http.status == 200) 
	   {
					   var x=http.responseXML.getElementsByTagName('RESULT');
					   hv_ten.length=0;
					   for(var i=0;i<x.length;i++)
					   { 					        
						hv_ten[i]= x[i].getElementsByTagName('ID')[0].firstChild.nodeValue + "\t"+ x[i].getElementsByTagName('HOTEN')[0].firstChild.nodeValue;
					   }
	   }
	}
	http.send(params);
}			   
*/
/*function get_list_hoivien_clb (phpfile, clb_id){
	var params ="clb_id="+clb_id;
	http=GetXmlHttpObject();
	//mo ket noi bang phuong thuc post
	http.open("POST", phpfile, false);
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//http.setRequestHeader("Content-length", params.length);
	//http.setRequestHeader("Connection", "close");
	//ham xu li du lieu tra ve cua ajax send thanh cong
	http.onreadystatechange = function() 
	{
	if(http.readyState == 4 && http.status == 200) 
	   {
					   var x=http.responseXML.getElementsByTagName('RESULT');
					   hv_ten.length=0;
					   for(var i=0;i<x.length;i++)
					   { 					        
						hv_ten[i]= x[i].getElementsByTagName('ID')[0].firstChild.nodeValue + "\t"+ x[i].getElementsByTagName('HOTEN')[0].firstChild.nodeValue;
					   }
	   }
	}
	http.send(params);
}			*/   

function getRecord(phpfile,id)
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
				_id    		 = x[0].getElementsByTagName('MA')[0].childNodes[0].nodeValue;
				_ten 		 = x[0].getElementsByTagName('TEN')[0].childNodes[0].nodeValue;
				_ghichu 		 = x[0].getElementsByTagName('GHICHU')[0].childNodes[0].nodeValue;	   }
	}
	http.send(params);
}
