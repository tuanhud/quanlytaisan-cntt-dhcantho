function taobangthuoctinh ()
{
	 		var data = {};
			var theme = '';
			var tendonvi= '';
			var mathuoctinh= '';
			var mataisan= '';
			var tentaisan='';
            var source =
           	 {
                 datatype: "json",
                 datafields: 
				 [
				 	 { name: 'MaTaiSan'},
					 { name: 'TenTaiSan'},
					 { name: 'MaThuocTinh'},
					 { name: 'TenThuocTinh'},
					 { name: 'GiaTriThuocTinh'}
                ],
                url: 'data_thuoctinhcuataisan.php',    
				root: 'Rows',
				beforeprocessing: function(data)
				{		
					source.totalrecords = data[0].TotalRows;
				},				
                updaterow: function (rowid, rowdata) 
				{
			        // synchronize with the server - send update command
                    var data = "update=true&GiaTriThuocTinh=" + rowdata.GiaTriThuocTinh + "&MaTaiSan=" + rowdata.MaTaiSan;
					data = data + "&MaThuocTinh=" + rowdata.MaThuocTinh;
					
					$.ajax
					({
						dataType: 'json',
						url: 'data_thuoctinhcuataisan.php',
						data: data,
						success: function (data, status, xhr) {}
					});		
                },
				
            };
 		    var dataadapter = new $.jqx.dataAdapter(source);
           	// initialize jqxGrid
            $("#jqxgrid").jqxGrid(
           	 {
                width: 660,
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
					  { text: 'Mã tài sản', editable: false, datafield: 'MaTaiSan', width: 100, cellsalign: 'left' },
					  { text: 'Tên tài sản', editable: false, datafield: 'TenTaiSan', width: 150, cellsalign: 'left' },
                      { text: 'Mã thuộc tính', editable: false, datafield: 'MaThuocTinh', width: 100, cellsalign: 'left' },
                      { text: 'Tên thuộc tính',editable: false, datafield: 'TenThuocTinh', width: 180 },
					  { text: 'Giá trị thuộc tính', datafield: 'GiaTriThuocTinh', width: 130 }
                  ]
            });
	
		function capitaliseFirstLetter(string) 
		{
            return string.charAt(0).toUpperCase() + string.slice(1);
        }
		function createElements(theme)
		{
            $('#cancel').jqxButton({ theme: theme, height: '25px', width: '65px' });
            $('#eventWindow').jqxWindow({ maxHeight: 500, maxWidth:400, minHeight: 30, minWidth: 250, height: 250, width: 360,
                theme: theme, resizable: false, isModal: true, modalOpacity: 0.3,
                cancelButton: $('#cancel')
            });
            $('#showWindowButton').jqxButton({ theme: theme, width: '150px', height: '25px' });
			$("#deleterowbutton").jqxButton({ theme: theme, width: '150px', height: '25px' });
        }
        
        $('#showWindowButton').mousedown(function () 
		{
				createElements(theme);
                $('#eventWindow').jqxWindow('show');
				
                // bang thuoc tinh
				var source2 =
					{
						datatype: "json",
						datafields: [
							{ name: 'MaThuocTinh' },
							{ name: 'TenThuocTinh' }
						],
						id: 'MaThuocTinh',
						url: 'data_thuoctinh.php',             
					};
					var dataAdapter2 = new $.jqx.dataAdapter(source2);
					$("#jqxWidget2").jqxGrid(
					{
						width: 300,
						selectionmode: 'singlerow',
						source: dataAdapter2,
						theme: theme,
						editable: true,
						autoheight: true,
						columns: [
							  { text: 'Mã thuộc tính', editable: false, datafield: 'MaThuocTinh', width: 100, cellsalign: 'left' },
							  { text: 'Tên thuộc tính', editable: false, datafield: 'TenThuocTinh', width: 200, cellsalign: 'left' },
						  ]
					});
					
				// combo tai san
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
					$("#jqxWidget3").jqxComboBox(
					{ 
						autocomplete: true,
						source: dataAdapter3, 
						displayMember: "TenTaiSan", 
						valueMember: "MaTaiSan", 
						width: 300, height: 25, 
						theme: theme 
					});	
            });
			
   	    //bat su kien chon don vi de lay ten don vi
		$("#jqxWidget3").bind('select', function (event) 
		{
                    if (event.args) 
					{
                        var item = event.args.item;
                        if (item) 
						{
                           mataisan = item.value;
                           tentaisan = item.label;
                         }
                    }
        });
		
		//bat su kien select de lay ma thuoc tinh va ma tai san trong table cothuoctinh
		$('#jqxgrid').bind('rowselect', function (event) 
		{
			var args = event.args;
			var row = args.rowindex;
			mathuoctinh = $('#jqxgrid').jqxGrid('getcellvalue', row, "MaThuocTinh");
			mataisan = $('#jqxgrid').jqxGrid('getcellvalue', row, "MaTaiSan");
		});
		
		//bat su kien nhan nut xoa
		$('#deleterowbutton').mousedown(function () 
		{
			//xoa du lieu co mataisan va mathuoctinh bang cothuoctinh
			var data = "delete=true&MaTaiSan=" +mataisan +"&MaThuocTinh=" + mathuoctinh; 					
			$.ajax
			({
				dataType: 'json',
				url: 'data_thuoctinhcuataisan.php',
				data: data,
				success: function (data, status, xhr) {}		
			})	
			
			//xoa du lieu trong bang cothuoctinh
			 var selectedrowindex = $("#jqxgrid").jqxGrid('getselectedrowindex');
             var rowscount = $("#jqxgrid").jqxGrid('getdatainformation').rowscount;
             if (selectedrowindex >= 0 && selectedrowindex < rowscount) 
			 {
                   var id = $("#jqxgrid").jqxGrid('getrowid', selectedrowindex);
                   $("#jqxgrid").jqxGrid('deleterow', id);
              }
         });
		
		//khi chon 1 row tren bang thuoc tinh, tu dong se addrow vao bang co thuoc tinh
        $('#jqxWidget2').bind('rowselect', function (event) 
		{
			var args = event.args;
			var row = args.rowindex;
			var mathuoctinh = $('#jqxWidget2').jqxGrid('getcellvalue', row, "MaThuocTinh");
			var tenthuoctinh = $('#jqxWidget2').jqxGrid('getcellvalue', row, "TenThuocTinh");
            var row = {};
            row["MaTaiSan"] = mataisan;
            row["TenTaiSan"] = tentaisan;
            row["MaThuocTinh"] = mathuoctinh;
            row["TenThuocTinh"] = tenthuoctinh;
			row["GiaTriThuocTinh"] = 1;
			
			var i = 0,them=1;
	      	var rowscount = $("#jqxgrid").jqxGrid('getdatainformation').rowscount;
			for(i;i < rowscount;i++) 
			{
				   var mathuoctinh2 = $('#jqxgrid').jqxGrid('getcellvalue', i, "MaThuocTinh");
				   var mataisan2 = $('#jqxgrid').jqxGrid('getcellvalue', i, "MaTaiSan");
				   if((mathuoctinh2==mathuoctinh)&&(mataisan2==mataisan))
				   {
						them=0;
				   }
            }
			
			//luu vao bang cothuoctinh
			var data = "insert=true&MaTaiSan=" +mataisan + "&TenTaiSan=" + tentaisan + "&MaThuocTinh=" + mathuoctinh+ "&TenThuocTinh=" + tenthuoctinh+ "&GiaTriThuocTinh=" +1; 					
			$.ajax
			({
				dataType: 'json',
				url: 'data_thuoctinhcuataisan.php',
				data: data,
				success: function (data, status, xhr) {}		
			})
			// add vao bang co thuoc tinh
			if(them==1)
			{
				$('#jqxgrid').jqxGrid('addrow',null, row);
				//xoa du lieu trong bang thuoctinh
            	//$("#jqxWidget2").jqxGrid('deleterow', mathuoctinh);
			}
			else{alert('Đã tồn tại mã tài sản và mã thuộc tính này.');}
		});
		
        $(document).ready(function () {
            var theme = $.data(document.body, 'theme', theme);
            if (theme == undefined) theme = '';
            $("#jqxWidget").css('visibility', 'visible');
        });
				

}