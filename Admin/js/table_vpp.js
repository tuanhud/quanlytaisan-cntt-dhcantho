function taobangvpp()
{
	 		var data = {};
			var data2 = {};
			var theme = '';
			var loaivpp = '';
			var tenvpp ='';
			var nsx = '';
			var dvt ='';
			var dg = '';
			
			var params ="";   
			http=GetXmlHttpObject();
			var params ="";
			http.open("POST", 'get_list_temp5.php', false);
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
			$("#loaivpp").jqxDropDownList({ source: dataAdapter, selectedIndex: 0,displayMember: "Ten", valueMember: "Ma", width: '250', height: '25px', theme: theme});
			$('#loaivpp').bind('select', function (event) 
			{
				if (event.args) 
						{
							var item = event.args.item;
							if (item) 
							{
								loaivpp=item.value;
							 }
						}
			});
			
			$("#tenvpp").jqxDropDownList({ source: dataAdapter, selectedIndex: 1,displayMember: "Ten", valueMember: "Ma", width: '250', height: '25px', theme: theme });
			$('#tenvpp').bind('select', function (event) 
			{
                    var args = event.args;
                    var item = $('#tenvpp').jqxDropDownList('getItem', args.index);
                    if (item != null) 
					{
						tenvpp=item.value;
                    }
        });
		
		$("#nsx").jqxDropDownList({ source: dataAdapter, selectedIndex: 3,displayMember: "Ten", valueMember: "Ma", width: '250', height: '25px', theme: theme });
			$('#nsx').bind('select', function (event) 
			{
                    var args = event.args;
                    var item = $('#nsx').jqxDropDownList('getItem', args.index);
                    if (item != null) 
					{
						nsx=item.value;
                    }
        });
		
			$("#donvitinh").jqxDropDownList({ source: dataAdapter, selectedIndex: 3,displayMember: "Ten", valueMember: "Ma", width: '250', height: '25px', theme: theme });
			$('#donvitinh').bind('select', function (event) 
			{
                    var args = event.args;
                    var item = $('#donvitinh').jqxDropDownList('getItem', args.index);
                    if (item != null) 
					{
						dvt=item.value;
                    }
        });
		
			$("#dongia").jqxDropDownList({ source: dataAdapter, selectedIndex: 4,displayMember: "Ten", valueMember: "Ma", width: '250', height: '25px', theme: theme });
			$('#dongia').bind('select', function (event) 
			{
                    var args = event.args;
                    var item = $('#dongia').jqxDropDownList('getItem', args.index);
                    if (item != null) 
					{
						dg=item.value;
                    }
        });
		
			//lay gia tri cau cac combobox
			var item = $("#loaivpp").jqxDropDownList('getSelectedItem');
			loaivpp=item.value; 
			var item = $("#tenvpp").jqxDropDownList('getSelectedItem');
			tenvpp=item.value;
			var item = $("#donvitinh").jqxDropDownList('getSelectedItem');
			dvt=item.value;
			var item = $("#nsx").jqxDropDownList('getSelectedItem');
			nsx=item.value;
			var item = $("#dongia").jqxDropDownList('getSelectedItem');
			dg=item.value;
		
			var data = new Array();	
			$('#showWindowButton3').jqxButton({ theme: theme, width: '100px', height: '25px' });
			$("#save3").jqxButton({ theme: theme, width: '100px', height: '25px' });
		
			function loaddata()
			{
						var params ="";
						http.open("POST",'get_list_temp6.php', false);
						http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
						http.onreadystatechange = function() 
						{
							if(http.readyState == 4 && http.status == 200) 
							{											
								var x=http.responseXML.getElementsByTagName('row');
								for(var j=0;j<x.length;j++)
								{
									var row = {};
									var maloaivpp = x[j].getElementsByTagName('column')[parseInt(loaivpp)-1].firstChild.nodeValue;	
									//kiem tra xem co phai la so nguyen hay khong
									var reg = /^\d+$/;
									if(reg.test(maloaivpp))
									{
															http=GetXmlHttpObject();
															var params = "maloaivppsua="+maloaivpp;
															http.open("POST", 'get_info_loaivpp.php', false);
															http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
															http.onreadystatechange = function()
															{
																if(http.readyState == 4 && http.status == 200) 
																{
																	var result=http.responseXML.getElementsByTagName('column')[1].firstChild.nodeValue;
																	row["LoaiVPP"] = result;
	
																}
															}
															http.send(params);				
									}	
									
									row["TenVPP"] = x[j].getElementsByTagName('column')[parseInt(tenvpp)-1].firstChild.nodeValue;
									row["NSX"] = x[j].getElementsByTagName('column')[parseInt(nsx)-1].firstChild.nodeValue;
									row["DVT"] = x[j].getElementsByTagName('column')[parseInt(dvt)-1].firstChild.nodeValue;
									row["DG"] = x[j].getElementsByTagName('column')[parseInt(dg)-1].firstChild.nodeValue;
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
									width: 900,
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
										  { text: 'Loại văn phòng phẩm',columntype: 'dropdownlist',editable: true,datafield: 'LoaiVPP', width: 200, cellsalign: 'left' },
										  { text: 'Tên văn phòng phẩm',editable: true,datafield: 'TenVPP', width: 250, cellsalign: 'left' },
										   { text: 'Nhà sản xuất',editable: true,datafield: 'NSX', width: 150, cellsalign: 'left' },
										  { text: 'Đơn vị tính',editable: true,datafield: 'DVT', width: 150, cellsalign: 'left' },
										  { text: 'Đơn giá',editable: true,datafield: 'DG', width: 150 },  
									  ]
								});
							}
						}
						http.send(params);
			}
			
			$('#showWindowButton3').mousedown(function () 
			{
						loaddata();
			});
		  
        $("#save3").click(function () 
		{
					var rowscount = $("#jqxgrid").jqxGrid('getdatainformation').rowscount;
					for(var i=0;i < rowscount;i++) 
					{
						   var maloaivpp = $('#jqxgrid').jqxGrid('getcellvalue', i, "LoaiVPP");
						   var mavpp = $('#jqxgrid').jqxGrid('getcellvalue', i, "TenVPP");
						   var nhasx = $('#jqxgrid').jqxGrid('getcellvalue', i, "NSX");
						   var donvitinh = $('#jqxgrid').jqxGrid('getcellvalue', i, "DVT");
						   var dongia = $('#jqxgrid').jqxGrid('getcellvalue', i, "DG");	
							
							{
								http=GetXmlHttpObject();
								var params = "insert=true&LoaiVPP=" +maloaivpp + "&TenVPP=" + mavpp + "&NSX=" + nhasx+ "&DVT=" + donvitinh+ "&DG=" + dongia;													
								http.open("POST", 'data_importvpp.php', false);
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