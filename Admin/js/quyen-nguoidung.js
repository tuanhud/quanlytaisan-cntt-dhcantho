var _id, _ten,
_stt	 = 0,
numRow 	 = 0,
numofSus = 0,
numofFai = 0;


// -------------------------
//  Insret 1 Record into table
// -------------------------      
/*function addRow_(filephp,frm)
{
	//var madonvi = frm.cbo_tendonvi;
	//get thong tin can bo khi chon bo mon
	http=GetXmlHttpObject();
	var params ="";
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
				var x=http.responseXML.getElementsByTagName('RESULT');
				for(var i=0;i<x.length;i++)
				{	
				dt.addRow({ 
							ma:x[i].getElementsByTagName('MA')[0].firstChild.nodeValue, 
							ten:x[i].getElementsByTagName('TEN')[0].firstChild.nodeValue, 
							vpp:'',
							kk:'',
							khms:'',
							duyet:''
							});
				}
				var chks = dt.get('srcNode').all("tbody input.myCheckboxFmtr");
				chks.each( function(item){
				numRow += 1;
				});
				_stt = numRow;
				numRow = 0;
		}
	}
	http.send(params);
	


						
			
}*/

//Them LCHSV duoc khen thuong
function themChsvKhenthuong(phpfile,frm,chsv_id){
	
	var khenthuong_id 	= frm.cbo_tenkhenthuong.value;
	var quyetdinh 		= frm.txt_quyetdinh.value;
	var ngay 			= frm.cbo_ngay.value;
	var thang 			= frm.cbo_thang.value;
	var nam 			= frm.cbo_nam.value;
	var hocki_id 		= frm.cbo_tenhocki.value;	
	
	http=GetXmlHttpObject();
	
	var params = "hocki_id="+hocki_id;
	params+="&khenthuong_id="+khenthuong_id;
	params+="&quyetdinh="+quyetdinh;
	params+="&ngay="+ngay;	
	params+="&thang="+thang;
	params+="&nam="+nam;
	params+="&chsv_id="+chsv_id;
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
			var result=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
			if(result=='Thành công.') numofSus +=1;
			else 
			{
				numofFai += 1;
			}
		}
	}
	http.send(params);
}

function themListChsvKhenthuong(phpfile, frm){
	var khenthuong_id = frm.cbo_tenkhenthuong;
	var quyetdinh = frm.txt_quyetdinh;
	var ngay = frm.cbo_ngay;
	var thang = frm.cbo_thang;
	var nam = frm.cbo_nam;			

	if(khenthuong_id.value==-1) {
		alert("Bạn chưa chọn hình thức khen thưởng");
		frm.cbo_tenkhenthuong.focus();
		return;
		}
	if(quyetdinh.value=="") {
		alert("Bạn chưa nhập Số quyết định");
		frm.txt_quyetdinh.focus();
		return;
		}	
	if(!isValidDate(ngay.value, thang.value, nam.value)){
		alert("Ngày khen thưởng không hợp lệ");
		return;
		}
	try{
		var chks = dt.get('srcNode').all("tbody input.myCheckboxFmtr");
		
		chks.each( function(item){
			var rec = dt.getRecord( item.ancestor().ancestor() );
			themChsvKhenthuong(phpfile,frm,rec.get('id') );
		   	});
		alert("Thành công : " + numofSus + "\nThất bại: " + numofFai);
		khenthuong_id.value = -1;
		quyetdinh.value="";
		ngay.value=0;
		thang.value=0;
		nam.value=0;
		document.getElementById('mytable').innerHTML = "";
		createTable();
		numofSus = numofFai = 0;
	}
	catch(ex)
	{
		alert("Có lỗi xảy ra: " + ex.message);
		}
}
