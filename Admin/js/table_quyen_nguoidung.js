function taobangtaisan ()
{
	 		var data = {};
			var theme = '';
			var tendonvi= '';
			var tentaisan='';
            var source =
            {
                 datatype: "json",
                 datafields: 
				 [
				 	 { name: 'MSDV'},
					 { name: 'TenDV'},
					 { name: 'MaTaiSan'},
					 { name: 'TenTaiSan'},
					 { name: 'SoLuongCuaDonVi'},
					 { name: 'DonGiaTS'}
                ],
				id:'MaTaiSan',
                url: 'data_taisanthuocdonvi.php',    
				root: 'Rows',
				beforeprocessing: function(data)
				{		
					source.totalrecords = data[0].TotalRows;
				},				
                updaterow: function (rowid, rowdata) 
				{
			        // synchronize with the server - send update command
                    var data = "update=true&SoLuongCuaDonVi=" + rowdata.SoLuongCuaDonVi + "&DonGiaTS=" + rowdata.DonGiaTS;
					data = data + "&MaTaiSan=" + rowdata.MaTaiSan;
					data = data + "&MSDV=" + rowdata.MSDV;
					
					$.ajax
					({
						dataType: 'json',
						url: 'data_taisanthuocdonvi.php',
						data: data,
						success: function (data, status, xhr) 
						{
							alert('Thành công.');
						}
					});		
                },
				addrow: function (rowid, rowdata) 
				{
                    // synchronize with the server - send insert command
                   /*var data2 = "insert=true&MSDV=" + rowdata.MSDV + "&MaTaiSan=" + rowdata.MaTaiSan + "&SoLuongCuaDonVi=" + rowdata.SoLuongCuaDonVi;
					data2 = data2 + "&DonGiaTS=" + rowdata.DonGiaTS;
					
					$.ajax
					({
						dataType: 'json',
						url: 'data_taisanthuocdonvi.php',
						data: data2,
						success: function (data2, status, xhr) 
						{
							// update command is executed.
						}
					})*/
                },
                deleterow: function (rowid) 
				{
                    // synchronize with the server - send delete command
					 // synchronize with the server - send update command
                    var data = "delete=true&TenDonViTinh=" + rowdata.TenDonViTinh + "&MaLoai=" + rowdata.MaLoai + "&TenTaiSan=" + rowdata.TenTaiSan;
					data = data + "&TinhTrang=" + rowdata.TinhTrang;
					data = data + "&MaTaiSan=" + rowdata.MaTaiSan;
					
					$.ajax
					({
						dataType: 'json',
						url: 'data_taisan.php',
						data: data,
						success: function (data, status, xhr) 
						{
							// update command is executed.
						}
					});	
                },
				
            };
			
 		    var dataadapter = new $.jqx.dataAdapter(source);
           // initialize jqxGrid
            $("#jqxgrid").jqxGrid(
            {
                width: 660,
				selectionmode: 'singlecell',
                source: dataadapter,
                theme: theme,
				editable: true,
				autoheight: true,
				pageable: true,
				virtualmode: true,
				rendergridrows: function()
				{
					  return dataadapter.records;     
				},
                columns: [
					  { text: 'Mã đơn vị', editable: false, datafield: 'MSDV', width: 70, cellsalign: 'left' },
					  { text: 'Tên đơn vị', editable: false, datafield: 'TenDV', width: 150, cellsalign: 'left' },
                      { text: 'Mã thiết bị', editable: false, datafield: 'MaTaiSan', width: 80, cellsalign: 'left' },
                      { text: 'Tên thiết bị',columntype: 'dropdownlist', datafield: 'TenTaiSan', width: 180 },
					  { text: 'Số Lượng', datafield: 'SoLuongCuaDonVi', width: 80 },
					  { text: 'Đơn giá (VNĐ)', datafield: 'DonGiaTS', width: 100 },
                  ]
            });


            
          
			
            // delete row.
            $("#deleterowbutton").bind('click', function () 
			{
                var selectedrowindex = $("#jqxgrid").jqxGrid('getselectedrowindex');
                var rowscount = $("#jqxgrid").jqxGrid('getdatainformation').rowscount;
                if (selectedrowindex >= 0 && selectedrowindex < rowscount) 
				{
                    var id = $("#jqxgrid").jqxGrid('getrowid', selectedrowindex);
                    $("#jqxgrid").jqxGrid('deleterow', id);
                }
            });

           
			
			
			
		function capitaliseFirstLetter(string) 
		{
            return string.charAt(0).toUpperCase() + string.slice(1);
        }
		function createElements(theme)
		{
            $('#save').jqxButton({ theme: theme, height: '25px', width: '65px' });
            $('#cancel').jqxButton({ theme: theme, height: '25px', width: '65px' });
            $('#eventWindow').jqxWindow({ maxHeight: 400, maxWidth:300, minHeight: 30, minWidth: 250, height: 280, width: 300,
                theme: theme, resizable: false, isModal: true, modalOpacity: 0.3,
                okButton: $('#save'), cancelButton: $('#cancel')
            });
            
            $("#numericInput").jqxNumberInput({ width: '200px', height: '25px',decimalDigits:0 ,theme: theme });
            $("#currencyInput").jqxNumberInput({ width: '200px', height: '25px',decimalDigits:0, symbol: '$', theme: theme });
            $('#showWindowButton').jqxButton({ theme: theme, width: '150px', height: '25px' });
			$("#deleterowbutton").jqxButton({ theme: theme, width: '150px', height: '25px' });
        }
        function addEventListeners() 
		{
            $('#showWindowButton').mousedown(function () 
			{
				createElements(theme);
                $('#eventWindow').jqxWindow('show');
				
                // fill don vi
				var source2 =
					{
						datatype: "json",
						datafields: [
							{ name: 'MSDV' },
							{ name: 'TenDV' }
						],
						id: 'MSDV',
						url: 'data_donvi.php',             
					};
					var dataAdapter2 = new $.jqx.dataAdapter(source2);
					// Create a jqxComboBox
					$("#jqxWidget2").jqxDropDownList(
					{ 
						incrementalSearch: true,				
						selectedIndex: 0, 
						source: dataAdapter2, 
						displayMember: "TenDV", 
						valueMember: "MSDV", 
						width: 200, 
						height: 25, 
						theme: theme 
					});
				//fill tai san
				var source3 =
					{
						datatype: "json",
						datafields: [
							{ name: 'MaTaiSan' },
							{ name: 'TenTaiSan' }
						],
						id: 'MaTaiSan',
						url: 'data_taisan.php',             
					};
					var dataAdapter3 = new $.jqx.dataAdapter(source3);
					// Create a jqxComboBox
					$("#jqxWidget3").jqxDropDownList(
					{ 
						incrementalSearch: true,
						selectedIndex: 0, 
						source: dataAdapter3, 
						displayMember: "TenTaiSan", 
						valueMember: "MaTaiSan", 
						width: 200, 
						height: 25, 
						theme: theme 
					});
            });
        }
        //bat su kien chon don vi de lay ten don vi
		$("#jqxWidget2").bind('select', function (event) 
		{
                    if (event.args) {
                        var item = event.args.item;
                        if (item) 
						{
                            tendonvi = item.label;
                        }
                    }
          });
		   //bat su kien chon ten tai san de lay ten taisan
		$("#jqxWidget3").bind('select', function (event) 
		{
                    if (event.args) {
                        var item = event.args.item;
                        if (item) 
						{
                            tentaisan = item.label;
                        }
                    }
          });
		  
         $("#save").click(function () 
		{
             
					var msdv = $("#jqxWidget2").jqxDropDownList('getSelectedItem').value;
					var mataisan = $("#jqxWidget3").jqxDropDownList('getSelectedItem').value;
					var soluong = $("#numericInput").jqxNumberInput('val');
					var dongia = $("#currencyInput").jqxNumberInput('val');
                    var row = 
					{ MSDV:msdv, MaTaiSan:mataisan, SoLuongCuaDonVi:soluong,DonGiaTS: dongia,TenDV:tendonvi, TenTaiSan:tentaisan  };
					$("#jqxgrid").jqxGrid('addrow', mataisan, row);
					var data = "insert=true&MSDV=" +msdv + "&MaTaiSan=" + mataisan + "&SoLuongCuaDonVi=" + soluong+ "&DonGiaTS=" + dongia; 
					$.ajax
					({
						dataType: 'json',
						url: 'themtaisanthuocdonvi.php',
						data: data,
						success: function (data, status, xhr) 
						{
							alert('Thành công.');
						}
					})
        });
        $(document).ready(function () {
            var theme = $.data(document.body, 'theme', theme);
            if (theme == undefined) theme = '';
            addEventListeners();
            $("#jqxWidget").css('visibility', 'visible');
        });
				

}