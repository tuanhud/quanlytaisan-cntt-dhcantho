var numofSus = numofFai = 0;

//Them hoi vien duoc khen thuong
function capnhat_quyen_nguoidung(filephp,frm,macanbo,maquyen)
{
	http=GetXmlHttpObject();
	
	var params ="macanbo="+macanbo;
	params+="&maquyen="+maquyen;
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
function update_quyen_nguoidung(frm){

	try
	{
		var chks = dt.get('srcNode').all("tbody input.myCheckboxFmtr2");
		chks.each( function(item){
			var rec = dt.getRecord( item.ancestor() );
			if ( !item.get('checked') )
			{
				capnhat_quyen_nguoidung('xoaquyen_nguoidung.php', frm, rec.get('id'),'VPP')
			}
			else
			{
				capnhat_quyen_nguoidung('themquyen_nguoidung.php', frm, rec.get('id'),'VPP');
			}
		   	});
	}
	catch(ex){
		alert("Có lỗi xảy ra: " + ex.message);
	}
	
	try
	{
		var chks = dt.get('srcNode').all("tbody input.myCheckboxFmtr3");
		chks.each( function(item){
			var rec = dt.getRecord( item.ancestor() );
			if ( !item.get('checked') )
			{
				capnhat_quyen_nguoidung('xoaquyen_nguoidung.php', frm, rec.get('id'),'KK')
			}
			else
			{
				capnhat_quyen_nguoidung('themquyen_nguoidung.php', frm, rec.get('id'),'KK');
			}
		   	});
	}
	catch(ex){
		alert("Có lỗi xảy ra: " + ex.message);
	}
	
	
	try
	{
		var chks = dt.get('srcNode').all("tbody input.myCheckboxFmtr4");
		chks.each( function(item){
			var rec = dt.getRecord( item.ancestor() );
			if ( !item.get('checked') )
			{
				capnhat_quyen_nguoidung('xoaquyen_nguoidung.php', frm, rec.get('id'),'KHMS')
			}
			else
			{
				capnhat_quyen_nguoidung('themquyen_nguoidung.php', frm, rec.get('id'),'KHMS');
			}
		   	});
	}
	catch(ex){
		alert("Có lỗi xảy ra: " + ex.message);
	}
	
	try
	{
		var chks = dt.get('srcNode').all("tbody input.myCheckboxFmtr5");
		chks.each( function(item){
			var rec = dt.getRecord( item.ancestor() );
			if ( !item.get('checked') )
			{
				capnhat_quyen_nguoidung('xoaquyen_nguoidung.php', frm, rec.get('id'),'DUYETVPP')
			}
			else
			{
				capnhat_quyen_nguoidung('themquyen_nguoidung.php', frm, rec.get('id'),'DUYETVPP');
			}
		   	});
	}
	catch(ex){
		alert("Có lỗi xảy ra: " + ex.message);
	}
	
	
	try
	{
		var chks = dt.get('srcNode').all("tbody input.myCheckboxFmtr6");
		chks.each( function(item){
			var rec = dt.getRecord( item.ancestor() );
			if ( !item.get('checked') )
			{
				capnhat_quyen_nguoidung('xoaquyen_nguoidung.php', frm, rec.get('id'),'DUYETKK')
			}
			else
			{
				capnhat_quyen_nguoidung('themquyen_nguoidung.php', frm, rec.get('id'),'DUYETKK');
			}
		   	});
	}
	catch(ex){
		alert("Có lỗi xảy ra: " + ex.message);
	}
	
	try
	{
		var chks = dt.get('srcNode').all("tbody input.myCheckboxFmtr7");
		chks.each( function(item){
			var rec = dt.getRecord( item.ancestor() );
			if ( !item.get('checked') )
			{
				capnhat_quyen_nguoidung('xoaquyen_nguoidung.php', frm, rec.get('id'),'DUYETKHMS')
			}
			else
			{
				capnhat_quyen_nguoidung('themquyen_nguoidung.php', frm, rec.get('id'),'DUYETKHMS');
			}
		   	});
	}
	catch(ex){
		alert("Có lỗi xảy ra: " + ex.message);
	}
	alert("Thành công : " + numofSus);
	document.frm_capnhatquyen_nguoidung.cbo_tendonvi.value=-1;
	dt.reset();
	numofSus = numofFai = 0;
	
}

/*function isValid(){
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
*/