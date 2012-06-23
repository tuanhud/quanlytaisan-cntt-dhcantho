var rowscount ;
function taobangquyen ()
{
	 		var data = {};
			var data2 = {};
			var theme = 'Dark Blue';
			var madonvi= '';
			var tendonvi= '';
			var macanbo= '';
			var tencanbo= '';
			 
			http=GetXmlHttpObject();
			var params ="";
			http.open("POST", 'get_list_donvi.php', false);
			http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			http.onreadystatechange = function()
			{
				if(http.readyState == 4 && http.status == 200) 
				{
					var x=http.responseXML.getElementsByTagName('row');
					for(var i=0;i<x.length;i++)//lay duoc danh sach cac quyen ma can bo (macanbo) co
					{
						var row = {};
						row["Ma"] = x[i].getElementsByTagName('column')[0].firstChild.nodeValue;
						row["Ten"] = x[i].getElementsByTagName('column')[1].firstChild.nodeValue;
						data2[i] = row;
					}
				}
			}
			http.send(params);
			var source =
			{
				localdata: data2,
				datatype: "array"
			};
			var dataAdapter = new $.jqx.dataAdapter(source);
			$("#cbo_tendonvi").jqxComboBox({ source: dataAdapter, selectedIndex: 0,displayMember: "Ten", valueMember: "Ma", width: '250', height: '25px', theme: theme});
			/*
			$('#cbo_tendonvi').bind('select', function (event) 
			{
				
			});*/
			//lay gia tri cau cac combobox
			var item = $("#cbo_tendonvi").jqxComboBox('getSelectedItem');
					madonvi=item.value; 
					tendonvi =item.label;
			
			
			
			function loaddata(madonvi)
			{
				   	var params = "madonvi="+madonvi;
				    http.open("POST",'get_list_nguoidung.php', false);
					http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					http.onreadystatechange = function() 
					{
						if(http.readyState == 4 && http.status == 200) 
						{											
							var x=http.responseXML.getElementsByTagName('INFO');
							for(var i=0;i<x.length;i++)
							{
								var macanbo = x[i].getElementsByTagName('RESULT')[0].firstChild.nodeValue;	
								var tencanbo= x[i].getElementsByTagName('RESULT')[1].firstChild.nodeValue;
								var row = {};
								row["MSCB"]= macanbo;
								row["TenCB"]= tencanbo;
								alert(tencanbo);
								http=GetXmlHttpObject();
								var params = "macanbo="+macanbo;
								http.open("POST", 'get_list_quyen_canbo.php', false);
								http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
								http.onreadystatechange = function()
								{
										if(http.readyState == 4 && http.status == 200) 
										{
											var y=http.responseXML.getElementsByTagName('row');
											for(var j=0;j<y.length;j++)
											{
												var maquyen = y[j].getElementsByTagName('column')[0].firstChild.nodeValue;
												if(maquyen=='THEMVPP')
												{row["THEMVPP"]= 1;}
												else 
												{row["THEMVPP"]= 0;}
												
												if(maquyen=='SUAVPP')
												{row["SUAVPP"]= 1;}
												else 
												{row["SUAVPP"]= 0;}
												
												if(maquyen=='THEMKK')
												{row["THEMKK"]= 1;}
												else 
												{row["THEMKK"]= 0;}
												
												if(maquyen=='SUAKK')
												{row["SUAKK"]= 1;}
												else 
												{row["SUAKK"]= 0;}
												
												if(maquyen=='THEMKHMS')
												{row["THEMKHMS"]= 1;}
												else 
												{row["THEMKHMS"]= 0;}
												
												if(maquyen=='SUAKHMS')
												{row["SUAKHMS"]= 1;}
												else 
												{row["SUAKHMS"]= 0;}
												
												if(maquyen=='ADMIN')
												{row["ADMMIN"]= 1;}
												else 
												{row["ADMIN"]= 0;}
												
												if(maquyen=='CBQLBM')
												{row["CBQLBM"]= 1;}
												else 
												{row["CBQLBM"]= 0;}
												
												if(maquyen=='GV')
												{row["GV"]= 1;}
												else 
												{row["GV"]= 0;}
												
												if(maquyen=='DUYETKHMS')
												{row["DUYETKHMS"]= 1;}
												else 
												{row["DUYETKHMS"]= 0;}
												
												if(maquyen=='DUYETKK')
												{row["DUYETKK"]= 1;}
												else 
												{row["DUYETKK"]= 0;}
												
												if(maquyen=='DUYETVPP')
												{row["DUYETVPP"]= 1;}
												else
												{row["DUYETVPP"]= 0;}
												
												
											}
											data[i] = row;
										}						
								}
								http.send(params);	
							}
							
						}
					}
					http.send(params);
					
					var source =
					{
								localdata: data,
								datatype: "array"
					};
					var dataAdapter = new $.jqx.dataAdapter(source);
					$("#jqxgrid").jqxGrid(
					{
								width: 1250,
								selectionmode: 'singlerow',
								source: dataAdapter,
								theme: theme,
								editable: true,
								autoheight: true,
								pageable: true,
								virtualmode: true,
								rendergridrows: function()
								{
									  return dataAdapter.records;     
								},
								columns: [
									 
									  { text: 'Mã cán bộ', editable: false, datafield: 'MSCB', width: 70, cellsalign: 'left' },
									  { text: 'Tên cán bộ', editable: false, datafield: 'TenCB', width: 150, cellsalign: 'left' },
									  { text: 'GV', datafield: 'GV', columntype: 'checkbox', width: 70 },
									  { text: 'CBQLBM', datafield: 'CBQLBM', columntype: 'checkbox', width: 70 },
									  { text: 'ADMIN', datafield: 'ADMIN', columntype: 'checkbox', width: 70 },
									  { text: 'THEMKHMS', datafield: 'THEMKHMS', columntype: 'checkbox', width: 70 },
									  { text: 'SUAKHMS', datafield: 'SUAKHMS', columntype: 'checkbox', width: 70 },
									  { text: 'THEMVPP', datafield: 'THEMVPP', columntype: 'checkbox', width: 70 },
									  { text: 'SUAVPP', datafield: 'SUAVPP', columntype: 'checkbox', width: 70 },
									  { text: 'THEMKK', datafield: 'THEMKK', columntype: 'checkbox', width: 70 },
									  { text: 'SUAKK', datafield: 'SUAKK', columntype: 'checkbox', width: 70 },
									  { text: 'DUYET KHMS', datafield: 'DUYETKHMS', columntype: 'checkbox', width: 70 },
									  { text: 'DUYET VPP', datafield: 'DUYETVPP', columntype: 'checkbox', width: 70 },
									  { text: 'DUYET KK', datafield: 'DUYETKK', columntype: 'checkbox', width: 70 },
								  ]
					});
					
			}
		$('#cbo_tendonvi').bind('change', function (event) 
		{
			if (event.args) 
						{
							var item = event.args.item;
							if (item) 
							{
								tendonvi=item.label;
								madonvi =item.value;
							 }
						}
			loaddata(madonvi);
		});
       /* $('#showWindowButton').mousedown(function () 
		{
					
      	});*/
		
        $(document).ready(function () {
            var theme = $.data(document.body, 'theme', theme);
            if (theme == undefined) theme = '';
			$('#showWindowButton').jqxButton({ theme: theme, width: '150px', height: '25px' });
			$("#deleterowbutton").jqxButton({ theme: theme, width: '150px', height: '25px' });
            $("#jqxWidget").css('visibility', 'visible');
			
        });
				

}

	