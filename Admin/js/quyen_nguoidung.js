var numofSus = numofFai = 0;

function capnhat_quyen_nguoidung(filephp,frm,macanbo,maquyen)
{
	http=GetXmlHttpObject();
	
	var params ="macanbo="+macanbo;
	params+="&maquyen="+maquyen;
	http.open("POST", filephp, false);
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
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


function update_quyen_nguoidung(frm){

   try
	{
		var chks = dt.get('srcNode').all("tbody input.ADMIN");
		chks.each( function(item){
			var rec = dt.getRecord( item.ancestor() );
			if ( !item.get('checked') )
			{
				capnhat_quyen_nguoidung('xoaquyen_nguoidung.php', frm, rec.get('id'),'ADMIN')
			}
			else
			{
				capnhat_quyen_nguoidung('themquyen_nguoidung.php', frm, rec.get('id'),'ADMIN');
			}
		   	});
	}
	catch(ex){
		alert("Có lỗi xảy ra: " + ex.message);
	}
	try
	{
		var chks = dt.get('srcNode').all("tbody input.CBQLBM");
		chks.each( function(item){
			var rec = dt.getRecord( item.ancestor() );
			if ( !item.get('checked') )
			{
				capnhat_quyen_nguoidung('xoaquyen_nguoidung.php', frm, rec.get('id'),'CBQLBM')
			}
			else
			{
				capnhat_quyen_nguoidung('themquyen_nguoidung.php', frm, rec.get('id'),'CBQLBM');
			}
		   	});
	}
	catch(ex){
		alert("Có lỗi xảy ra: " + ex.message);
	}
	try
	{
		var chks = dt.get('srcNode').all("tbody input.GV");
		chks.each( function(item){
			var rec = dt.getRecord( item.ancestor() );
			if ( !item.get('checked') )
			{
				capnhat_quyen_nguoidung('xoaquyen_nguoidung.php', frm, rec.get('id'),'GV')
			}
			else
			{
				capnhat_quyen_nguoidung('themquyen_nguoidung.php', frm, rec.get('id'),'GV');
			}
		   	});
	}
	catch(ex){
		alert("Có lỗi xảy ra: " + ex.message);
	}
	try
	{
		var chks = dt.get('srcNode').all("tbody input.DUYETVPP");
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
		var chks = dt.get('srcNode').all("tbody input.DUYETKHMS");
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
	
	try
	{
		var chks = dt.get('srcNode').all("tbody input.QLKK");
		chks.each( function(item){
			var rec = dt.getRecord( item.ancestor() );
			if ( !item.get('checked') )
			{
				capnhat_quyen_nguoidung('xoaquyen_nguoidung.php', frm, rec.get('id'),'QLKK')
			}
			else
			{
				capnhat_quyen_nguoidung('themquyen_nguoidung.php', frm, rec.get('id'),'QLKK');
			}
		   	});
	}
	catch(ex){
		alert("Có lỗi xảy ra: " + ex.message);
	}
	try
	{
		var chks = dt.get('srcNode').all("tbody input.LOCKKK");
		chks.each( function(item){
			var rec = dt.getRecord( item.ancestor() );
			if ( !item.get('checked') )
			{
				capnhat_quyen_nguoidung('xoaquyen_nguoidung.php', frm, rec.get('id'),'LOCKKK')
			}
			else
			{
				capnhat_quyen_nguoidung('themquyen_nguoidung.php', frm, rec.get('id'),'LOCKKK');
			}
		   	});
	}
	catch(ex){
		alert("Có lỗi xảy ra: " + ex.message);
	}
	
	try
	{
		var chks = dt.get('srcNode').all("tbody input.QLVPP");
		chks.each( function(item){
			var rec = dt.getRecord( item.ancestor() );
			if ( !item.get('checked') )
			{
				capnhat_quyen_nguoidung('xoaquyen_nguoidung.php', frm, rec.get('id'),'QLVPP')
			}
			else
			{
				capnhat_quyen_nguoidung('themquyen_nguoidung.php', frm, rec.get('id'),'QLVPP');
			}
		   	});
	}
	catch(ex){
		alert("Có lỗi xảy ra: " + ex.message);
	}
	try
	{
		var chks = dt.get('srcNode').all("tbody input.QLKHMS");
		chks.each( function(item){
			var rec = dt.getRecord( item.ancestor() );
			if ( !item.get('checked') )
			{
				capnhat_quyen_nguoidung('xoaquyen_nguoidung.php', frm, rec.get('id'),'QLKHMS')
			}
			else
			{
				capnhat_quyen_nguoidung('themquyen_nguoidung.php', frm, rec.get('id'),'QLKHMS');
			}
		   	});
	}
	catch(ex){
		alert("Có lỗi xảy ra: " + ex.message);
	}
	
	try
	{
		var chks = dt.get('srcNode').all("tbody input.PDTVPP");
		chks.each( function(item){
			var rec = dt.getRecord( item.ancestor() );
			if ( !item.get('checked') )
			{
				capnhat_quyen_nguoidung('xoaquyen_nguoidung.php', frm, rec.get('id'),'PDTVPP')
			}
			else
			{
				capnhat_quyen_nguoidung('themquyen_nguoidung.php', frm, rec.get('id'),'PDTVPP');
			}
		   	});
	}
	catch(ex){
		alert("Có lỗi xảy ra: " + ex.message);
	}
	
	
	try
	{
		var chks = dt.get('srcNode').all("tbody input.DUYETKHMSBM");
		chks.each( function(item){
			var rec = dt.getRecord( item.ancestor() );
			if ( !item.get('checked') )
			{
				capnhat_quyen_nguoidung('xoaquyen_nguoidung.php', frm, rec.get('id'),'DUYETKHMSBM')
			}
			else
			{
				capnhat_quyen_nguoidung('themquyen_nguoidung.php', frm, rec.get('id'),'DUYETKHMSBM');
			}
		   	});
	}
	catch(ex){
		alert("Có lỗi xảy ra: " + ex.message);
	}
	
	alert("Cập nhật thành công : " + numofSus+ " quyền.");
	document.frm_capnhatquyen_nguoidung.cbo_tendonvi.value=-1;
	dt.reset();
	numofSus = numofFai = 0;
	
}
