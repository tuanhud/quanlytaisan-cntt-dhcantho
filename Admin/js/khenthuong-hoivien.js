var numofSus = numofFai = 0;

//Them hoi vien duoc khen thuong
function themHoivienKhenthuong(filephp,frm, hoivien_id)
{
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
	params+="&hoivien_id="+hoivien_id;
	
	//mo ket noi bang phuong thuc post
	http.open("POST", filephp, false);
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

//Them danh sach hoi vien duoc khen thuong
function themListHoivienKhenthuong(phpfile, frm){

	try{
		var chks = dt.get('srcNode').all("tbody input.myCheckboxFmtr");
		chks.each( function(item){
			var rec = dt.getRecord( item.ancestor().ancestor() );
			themHoivienKhenthuong(phpfile, frm,rec.get('id'));
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
	catch(ex){
		alert("Có lỗi xảy ra: " + ex.message);
	}
}

function isValid(){
	khenthuong = document.frm_capnhatkhenthuong.cbo_tenkhenthuong;
	ngay = document.frm_capnhatkhenthuong.cbo_ngay;
	thang = document.frm_capnhatkhenthuong.cbo_thang;
	nam = document.frm_capnhatkhenthuong.cbo_nam;
	quyetdinh = document.frm_capnhatkhenthuong.txt_quyetdinh;
	file = document.frm_capnhatkhenthuong.file_import;	
	if(khenthuong.value==-1){
		alert('Bạn chưa chọn hình thức khen thưởng.');
		khenthuong.focus();
		return false;
		}
	
	if(!isValidDate_2(ngay.value,thang.value,nam.value)){
		alert('Ngày khen thưởng không hợp lệ.');
		ngay.focus();
		return false;
		}
	if(quyetdinh.value==""){
		alert('Số quyết định không được rỗng.');
		quyetdinh.focus();
		return false;
		}
	if(file.value==""){
		alert('Bạn chưa chọn file.');
		file.focus();
		return false;
		}
	return true;
}
