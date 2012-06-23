function taobang()
{
	 		var data = {};
			var data2 = {};
			var theme = '';
			var loaitaisan = '';
			var taisan ='';
			var donvitinh ='';
			var tinhtrang = '';
			
			var params ="";   
			http=GetXmlHttpObject();
			var params ="";
			http.open("POST", 'get_list_temp3.php', false);
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
                // Create a jqxDropDownList
			$("#loaitaisan").jqxDropDownList({ source: dataAdapter, selectedIndex: 0,displayMember: "Ten", valueMember: "Ma", width: '250', height: '25px', theme: theme});
			$('#loaitaisan').bind('select', function (event) 
			{
				if (event.args) 
						{
							var item = event.args.item;
							if (item) 
							{
								loaitaisan=item.value;
							 }
						}
			});
			
			$("#taisan").jqxDropDownList({ source: dataAdapter, selectedIndex: 1,displayMember: "Ten", valueMember: "Ma", width: '250', height: '25px', theme: theme });
			$('#taisan').bind('select', function (event) 
			{
                    var args = event.args;
                    var item = $('#taisan').jqxDropDownList('getItem', args.index);
                    if (item != null) 
					{
						taisan=item.value;
                    }
        });
			$("#donvitinh").jqxDropDownList({ source: dataAdapter, selectedIndex: 3,displayMember: "Ten", valueMember: "Ma", width: '250', height: '25px', theme: theme });
			$('#donvitinh').bind('select', function (event) 
			{
                    var args = event.args;
                    var item = $('#donvitinh').jqxDropDownList('getItem', args.index);
                    if (item != null) 
					{
						donvitinh=item.value;
                    }
        });
		
			$("#tinhtrang").jqxDropDownList({ source: dataAdapter, selectedIndex: 4,displayMember: "Ten", valueMember: "Ma", width: '250', height: '25px', theme: theme });
			$('#tinhtrang').bind('select', function (event) 
			{
                    var args = event.args;
                    var item = $('#tinhtrang').jqxDropDownList('getItem', args.index);
                    if (item != null) 
					{
						tinhtrang=item.value;
                    }
        });
		
			//lay gia tri cau cac combobox
			var item = $("#loaitaisan").jqxDropDownList('getSelectedItem');
			loaitaisan=item.value; 
			var item = $("#taisan").jqxDropDownList('getSelectedItem');
			taisan=item.value;
			var item = $("#donvitinh").jqxDropDownList('getSelectedItem');
			donvitinh=item.value;
			var item = $("#tinhtrang").jqxDropDownList('getSelectedItem');
			tinhtrang=item.value;
		
			var data = new Array();	
			$('#showWindowButton2').jqxButton({ theme: theme, width: '150px', height: '25px' });
			$("#save2").jqxButton({ theme: theme, width: '150px', height: '25px' });
		
			function loaddata()
			{
						var params ="";
						http.open("POST",'get_list_temp4.php', false);
						http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
						http.onreadystatechange = function() 
						{
							if(http.readyState == 4 && http.status == 200) 
							{											
								var x=http.responseXML.getElementsByTagName('row');
								for(var j=0;j<x.length;j++)
								{
									var row = {};
									var maloaits = x[j].getElementsByTagName('column')[parseInt(loaitaisan)-1].firstChild.nodeValue;	
									//kiem tra xem co phai la so nguyen hay khong
									var reg = /^\d+$/;
									if(reg.test(maloaits))
									{
															http=GetXmlHttpObject();
															var params = "maloai="+maloaits;
															http.open("POST", 'get_info_loaitaisan2.php', false);
															http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
															http.onreadystatechange = function()
															{
																if(http.readyState == 4 && http.status == 200) 
																{
																	var result=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
																	row["LoaiTaiSan"] = result;
	
																}
															}
															http.send(params);				
									}	
									
									row["TaiSan"] = x[j].getElementsByTagName('column')[parseInt(taisan)-1].firstChild.nodeValue;
									row["DonViTinh"] = x[j].getElementsByTagName('column')[parseInt(donvitinh)-1].firstChild.nodeValue;
									row["TinhTrang"] = x[j].getElementsByTagName('column')[parseInt(tinhtrang)-1].firstChild.nodeValue;
									data[j] = row;
								}
								var source =
								{
									localdata: data,
									datatype: "array"
								};
								var dataAdapter = new $.jqx.dataAdapter(source);
							   // initialize jqxGrid
								$("#jqxgrid").jqxGrid(
								{
									width: 800,
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
										  { text: 'Loại tài sản',columntype: 'dropdownlist',editable: true,datafield: 'LoaiTaiSan', width: 250, cellsalign: 'left' },
										  { text: 'Tên tài sản',editable: true,datafield: 'TaiSan', width: 250, cellsalign: 'left' },
										  { text: 'Đơn vị tính',editable: true,datafield: 'DonViTinh', width: 150, cellsalign: 'left' },
										  { text: 'Tình trạng',editable: true,datafield: 'TinhTrang', width: 150 },  
									  ]
								});
							}
						}
						http.send(params);
			}
			
			$('#showWindowButton2').mousedown(function () 
			{
						loaddata();
			});
		  
        $("#save2").click(function () 
		{
					var rowscount = $("#jqxgrid").jqxGrid('getdatainformation').rowscount;
					for(var i=0;i < rowscount;i++) 
					{
						   var lts = $('#jqxgrid').jqxGrid('getcellvalue', i, "LoaiTaiSan");
						   var ts = $('#jqxgrid').jqxGrid('getcellvalue', i, "TaiSan");
						   var dvt = $('#jqxgrid').jqxGrid('getcellvalue', i, "DonViTinh");
						   var tt = $('#jqxgrid').jqxGrid('getcellvalue', i, "TinhTrang");	
							
							{
								http=GetXmlHttpObject();
								var params = "insert=true&LoaiTaiSan=" +lts + "&TaiSan=" + ts + "&DonViTinh=" + dvt+ "&TinhTrang=" + tt;													
								http.open("POST", 'data_importtaisan.php', false);
								http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
								http.onreadystatechange = function()
								{
									if(http.readyState == 4 && http.status == 200) 
									{
										result=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
									}
								}
								http.send(params);						
							}	
					}
					alert(result);
					
					
			
        });
        $(document).ready(function () {
            var theme = $.data(document.body, 'theme', theme);
            if (theme == undefined) theme = '';
            $("#jqxWidget").css('visibility', 'visible');
        });
				

}