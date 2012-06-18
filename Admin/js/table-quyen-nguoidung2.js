function taobangquyen ()
{
	 		var data = {};
			var theme = 'Dark Blue';
			var madonvi= '';
			var tendonvi= '';
			var mataisan= '';
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
					 { name: 'DonGiaTS'},
					 { name: 'ThanhTien'}
                ],
				
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
						success: function (data, status, xhr) {}
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
                width: 740,
				selectionmode: 'singlerow',
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
					   { text: 'Available', datafield: 'available', columntype: 'checkbox', width: 70 },

					  { text: 'Mã cán bộ', editable: false, datafield: 'MSDV', width: 70, cellsalign: 'left' },
					  { text: 'Tên cán bộ', editable: false, datafield: 'TenDV', width: 150, cellsalign: 'left' },
                      { text: 'Mã thiết bị', editable: false, datafield: 'MaTaiSan', width: 80, cellsalign: 'left' },
                      { text: 'Tên thiết bị',editable: false, datafield: 'TenTaiSan', width: 180 },
					  { text: 'Số Lượng', datafield: 'SoLuongCuaDonVi', width: 80 },
					  { text: 'Đơn giá (VNĐ)', datafield: 'DonGiaTS', width: 100 },
					  { text: 'Thành tiền',editable: false, datafield: 'ThanhTien', width: 100 },
                  ]
            });
			
			
		//bat su kien select de lay ma don vi va ma tai san trong table taisanthuocdonvi
		$('#jqxgrid').bind('rowselect', function (event) 
		{
			var args = event.args;
			var row = args.rowindex;
			madonvi = $('#jqxgrid').jqxGrid('getcellvalue', row, "MSDV");
			mataisan = $('#jqxgrid').jqxGrid('getcellvalue', row, "MaTaiSan");
		});
			
        // delete row.
        $("#deleterowbutton").bind('click', function () 
		{
				//xoa du lieu co mataisan va mathuoctinh bang cothuoctinh
				var data = "delete=true&MaTaiSan=" +mataisan +"&MSDV=" + madonvi; 
				alert(data);					
				$.ajax
				({
					dataType: 'json',
					url: 'data_taisanthuocdonvi.php',
					data: data,
					success: function (data, status, xhr) {}		
				})	
				
				
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
		
		//tao popup
		function createElements(theme)
		{
            $('#save').jqxButton({ theme: theme, height: '25px', width: '65px' });
            $('#cancel').jqxButton({ theme: theme, height: '25px', width: '65px' });
            $('#eventWindow').jqxWindow({ maxHeight: 400, maxWidth:400, minHeight: 30, minWidth: 250, height: 400, width: 400,
                theme: theme, resizable: false, isModal: true, modalOpacity: 0.3,
                okButton: $('#save'), cancelButton: $('#cancel')
            });
           
        }
		
		//su kien nhan nut them
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
				 // bang taisan
				var source3 =
					{
						datatype: "json",
						datafields: 
						[
							{ name: 'MaTaiSan' },
							{ name: 'TenTaiSan' }
						],
						id: 'MaTaiSan',
						url: 'data_taisan.php',             
					};
					var dataAdapter3 = new $.jqx.dataAdapter(source3);
					$("#jqxWidget3").jqxGrid(
					{
						width: 300,
						selectionmode: 'singlerow',
						source: dataAdapter3,
						theme: theme,
						editable: true,
						autoheight: true,
						columns: [
							  { text: 'Mã tài sản', editable: false, datafield: 'MaTaiSan', width: 100, cellsalign: 'left' },
							  { text: 'Tên tài sản', editable: false, datafield: 'TenTaiSan', width: 200, cellsalign: 'left' },
						  ]
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
							madonvi = item.value;
                        }
                    }
          });
		 
		 
		//khi chon 1 row tren bang thuoc tinh, tu dong se addrow vao bang co thuoc tinh
        $('#jqxWidget3').bind('rowselect', function (event) 
		{
			var args = event.args;
			var row = args.rowindex;
			mataisan = $('#jqxWidget3').jqxGrid('getcellvalue', row, "MaTaiSan");
			tentaisan = $('#jqxWidget3').jqxGrid('getcellvalue', row, "TenTaiSan");
            var row = {};
            row["MaTaiSan"] = mataisan;
            row["TenTaiSan"] = tentaisan;
            row["MSDV"] = madonvi;
            row["TenDV"] = tendonvi;
			row["SoLuongCuaDonVi"] = 1;
			row["DonGiaTS"] = 1;
			row["ThanhTien"] = row["SoLuongCuaDonVi"]*row["DonGiaTS"];
			
			var i = 0,them=1;
	      	var rowscount = $("#jqxgrid").jqxGrid('getdatainformation').rowscount;
			for(i;i < rowscount;i++) 
			{
				   var madonvi2 = $('#jqxgrid').jqxGrid('getcellvalue', i, "MSDV");
				   var mataisan2 = $('#jqxgrid').jqxGrid('getcellvalue', i, "MaTaiSan");
				   if((madonvi2==madonvi)&&(mataisan2==mataisan))
				   {
						them=0;
				   }
            }

			// add vao bang co taisan
			if(them==1)
			{
				$('#jqxgrid').jqxGrid('addrow',null, row);
				//xoa du lieu trong bang taisan
            	//$("#jqxWidget2").jqxGrid('deleterow', mathuoctinh);
				
				//luu vao bang cotaisan
				var data = "insert=true&MaTaiSan=" +mataisan + "&MSDV=" + madonvi; 	
				alert(data);				
				$.ajax
				({
					dataType: 'json',
					url: 'data_taisanthuocdonvi.php',
					data: data,
					success: function (data, status, xhr) {}		
				})
			}
			else{alert('Đã tồn tại mã tài sản và mã đơn vị này.');}
		});
		  
		  
		//auto tinh tong tien
		$("#jqxgrid").bind('cellendedit', function (event) 
		{
		   var column = args.datafield;
		   var row = args.rowindex;
		   var value = args.value;
		   var oldvalue = args.oldvalue;
		   var sl = $('#jqxgrid').jqxGrid('getcellvalue', row, "SoLuongCuaDonVi");
		   var dg = $('#jqxgrid').jqxGrid('getcellvalue', row, "DonGiaTS");
		   if(column=='SoLuongCuaDonVi')
		  		$("#jqxgrid").jqxGrid('setcellvalue', row, "ThanhTien",value*dg);
		   else
		   		$("#jqxgrid").jqxGrid('setcellvalue', row, "ThanhTien",value*sl);
		   
		   //lay gia tri cua so luong * don gia
		});
        $(document).ready(function () {
            var theme = $.data(document.body, 'theme', theme);
            if (theme == undefined) theme = '';
			$('#showWindowButton').jqxButton({ theme: theme, width: '150px', height: '25px' });
			$("#deleterowbutton").jqxButton({ theme: theme, width: '150px', height: '25px' });
            addEventListeners();
            $("#jqxWidget").css('visibility', 'visible');
        });
				

}