
$("#jqxgrid").bind("bindingcomplete", function (event) {

 
			var i = 0,them=1;
	      	var rowscount = $("#jqxgrid").jqxGrid('getdatainformation').rowscount;
			for(i;i < rowscount;i++) 
			{
					var masocanbo = $('#jqxgrid').jqxGrid('getcellvalue', i, "MSCB");	
					alert(masocanbo);			
				   var params ="macanbo="+masocanbo;
				   //mo ket noi bang phuong thuc post
				   http.open("POST",'get_list_quyen_canbo.php', false);
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
							for(var j=0;j<x.length;j++)//lay duoc danh sach cac quyen ma can bo (macanbo) co
							{
								var maquyen = x[j].getElementsByTagName('MAQUYEN')[0].firstChild.nodeValue;
								if(maquyen=='ADMIN')
								{
									$("#jqxgrid").jqxGrid('setcellvalue',i, "ADMIN",1);
								}
								else if(maquyen=='CBQLBM')
								{
									$("#jqxgrid").jqxGrid('setcellvalue',i, "CBQLBM",1);
								}
								else if(maquyen=='GV')
								{
									$("#jqxgrid").jqxGrid('setcellvalue',i, "GV",1);
								}
								else if(maquyen=='THEMKHMS')
								{
									$("#jqxgrid").jqxGrid('setcellvalue',i, "THEMKHMS",1);
								}
								else if(maquyen=='SUAKHMS')
								{
									$("#jqxgrid").jqxGrid('setcellvalue',i, "SUAKHMS",1);
								}
								else if(maquyen=='THEMVPP')
								{
									$("#jqxgrid").jqxGrid('setcellvalue',i, "THEMVPP",1);
								}
								else if(maquyen=='SUAVPP')
								{
									$("#jqxgrid").jqxGrid('setcellvalue',i, "SUAVPP",1);
								}
								else if(maquyen=='THEMKK')
								{
									$("#jqxgrid").jqxGrid('setcellvalue',i, "THEMKK",1);
								}
								else if(maquyen=='SUAKK')
								{
									$("#jqxgrid").jqxGrid('setcellvalue',i, "SUAKK",1);
								}
								else if(maquyen=='DUYETVPP')
								{
									$("#jqxgrid").jqxGrid('setcellvalue',i, "DUYETVPP",1);
								}
								else if(maquyen=='DUYETKK')
								{
									$("#jqxgrid").jqxGrid('setcellvalue',i, "DUYETKK",1);
								}
								else if(maquyen=='DUYETKHMS')
								{
									$("#jqxgrid").jqxGrid('setcellvalue',i, "DUYETKHMS",1);
								}
							}
						}
					}
					
					http.send(params);
         }   
});	