var numofSus = numofFai = 0;

//Them hoi vien duoc khen thuong
function capnhat_taisan_donvi(filephp,frm,macanbo,maquyen)
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
function update_taisan_donvi(frm){

	try
	{
		var chks = dt.get('srcNode').all("tbody input.textboxtemp");
		chks.each( function(item)
		{
			var rec = dt.getRecord( item.ancestor() );
			alert(rec.get('soluong'));
				//capnhat_quyen_nguoidung('themquyen_nguoidung.php', frm, rec.get('id'),'THEMVPP');
		});
	}
	catch(ex){
		alert("Có lỗi xảy ra: " + ex.message);
	}
	/*try
	{
		var chks = dt.get('srcNode').all("tbody input.myCheckboxFmtr3");
		chks.each( function(item){
			var rec = dt.getRecord( item.ancestor() );
			if ( !item.get('checked') )
			{
				capnhat_quyen_nguoidung('xoaquyen_nguoidung.php', frm, rec.get('id'),'SUAVPP')
			}
			else
			{
				capnhat_quyen_nguoidung('themquyen_nguoidung.php', frm, rec.get('id'),'SUAVPP');
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
				capnhat_quyen_nguoidung('xoaquyen_nguoidung.php', frm, rec.get('id'),'THEMKK')
			}
			else
			{
				capnhat_quyen_nguoidung('themquyen_nguoidung.php', frm, rec.get('id'),'THEMKK');
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
				capnhat_quyen_nguoidung('xoaquyen_nguoidung.php', frm, rec.get('id'),'SUAKK')
			}
			else
			{
				capnhat_quyen_nguoidung('themquyen_nguoidung.php', frm, rec.get('id'),'SUAKK');
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
				capnhat_quyen_nguoidung('xoaquyen_nguoidung.php', frm, rec.get('id'),'THEMKHMS')
			}
			else
			{
				capnhat_quyen_nguoidung('themquyen_nguoidung.php', frm, rec.get('id'),'THEMKHMS');
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
				capnhat_quyen_nguoidung('xoaquyen_nguoidung.php', frm, rec.get('id'),'SUAKHMS')
			}
			else
			{
				capnhat_quyen_nguoidung('themquyen_nguoidung.php', frm, rec.get('id'),'SUAKHMS');
			}
		   	});
	}
	catch(ex){
		alert("Có lỗi xảy ra: " + ex.message);
	}
	
	try
	{
		var chks = dt.get('srcNode').all("tbody input.myCheckboxFmtr8");
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
		var chks = dt.get('srcNode').all("tbody input.myCheckboxFmtr9");
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
		var chks = dt.get('srcNode').all("tbody input.myCheckboxFmtr10");
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
	}*/
	//alert("Cập nhật thành công : " + numofSus+ " quyền.");
//	document.frm_capnhatquyen_nguoidung.cbo_tendonvi.value=-1;
//	dt.reset();
//	numofSus = numofFai = 0;
	
}
