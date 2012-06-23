function taobangthuoctinh ()
{
	 		var data = {};
			var data2 = {};
			var data3 = {};
			var theme = '';
			var tendonvi= '';
			var mathuoctinh= '';
			var mataisan= '';
			var tentaisan='';
			
			http=GetXmlHttpObject();
			var params ="";
			http.open("POST", 'get_list_thuoctinhcuataisan.php', false);
			http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			http.onreadystatechange = function()
			{
				if(http.readyState == 4 && http.status == 200) 
				{
					var x=http.responseXML.getElementsByTagName('INFO');
					for(var i=0;i<x.length;i++)//lay duoc danh sach cac quyen ma can bo (macanbo) co
					{
						var row = {};
						row["MaTaiSan"] = x[i].getElementsByTagName('RESULT')[0].firstChild.nodeValue;
						row["TenTaiSan"] = x[i].getElementsByTagName('RESULT')[1].firstChild.nodeValue;
						row["MaThuocTinh"] = x[i].getElementsByTagName('RESULT')[2].firstChild.nodeValue;
						row["TenThuocTinh"] = x[i].getElementsByTagName('RESULT')[3].firstChild.nodeValue;
						row["GiaTriThuocTinh"] = x[i].getElementsByTagName('RESULT')[4].firstChild.nodeValue;
						data[i] = row;
					}
				}
			}
			http.send(params);
            var source =
            {
                localdata: data,
				datatype: "array",			
                updaterow: function (rowid, rowdata) 
				{
					http=GetXmlHttpObject();
					var params ="GiaTriThuocTinh=" + rowdata.GiaTriThuocTinh + "&MaTaiSan=" + rowdata.MaTaiSan + "&MaThuocTinh=" + rowdata.MaThuocTinh;
					http.open("POST", 'suathuoctinhcuataisan.php', false);
					http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					http.onreadystatechange = function()
					{
						if(http.readyState == 4 && http.status == 200) {}
					}
					http.send(params);
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
            $('#eventWindow').jqxWindow({ maxHeight: 500, maxWidth:400, minHeight: 30, minWidth: 250, height: 370, width: 400,
                theme: theme, resizable: false, isModal: true, modalOpacity: 0.3,
                cancelButton: $('#cancel')
            });   
        }
		
        $('#showWindowButton').mousedown(function () 
		{
				createElements(theme);
                $('#eventWindow').jqxWindow('show');
				
                // bang thuoc tinh
				http=GetXmlHttpObject();
				var params ="";
				http.open("POST", 'get_list_thuoctinh.php', false);
				http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				http.onreadystatechange = function()
				{
					if(http.readyState == 4 && http.status == 200) 
					{
						var x=http.responseXML.getElementsByTagName('row');
						for(var i=0;i<x.length;i++)//lay duoc danh sach cac quyen ma can bo (macanbo) co
						{
							var row3 = {};
							row3["MaThuocTinh"] = x[i].getElementsByTagName('column')[0].firstChild.nodeValue;
							row3["TenThuocTinh"] = x[i].getElementsByTagName('column')[1].firstChild.nodeValue;
							data3[i] = row3;
						}
					}
				}
				http.send(params);
				
				var source3 =
				{
					localdata: data3,
					datatype: "array",
				};
				var dataAdapter3 = new $.jqx.dataAdapter(source3);
					$("#tablethuoctinh").jqxGrid(
					{
						width: 300,
						selectionmode: 'singlerow',
						source: dataAdapter3,
						theme: theme,
						editable: true,
						autoheight: true,
						columns: [
							  { text: 'Mã thuộc tính', editable: false, datafield: 'MaThuocTinh', width: 100, cellsalign: 'left' },
							  { text: 'Tên thuộc tính', editable: false, datafield: 'TenThuocTinh', width: 200, cellsalign: 'left' },
						  ]
					});
					
				// combo tai san
				http=GetXmlHttpObject();
				var params ="";
				http.open("POST", 'get_list_taisan.php', false);
				http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				http.onreadystatechange = function()
				{
					if(http.readyState == 4 && http.status == 200) 
					{
						var x=http.responseXML.getElementsByTagName('row');
						for(var i=0;i<x.length;i++)//lay duoc danh sach cac quyen ma can bo (macanbo) co
						{
							var row2 = {};
							row2["MaTaiSan"] = x[i].getElementsByTagName('column')[0].firstChild.nodeValue;
							row2["TenTaiSan"] = x[i].getElementsByTagName('column')[1].firstChild.nodeValue;
							data2[i] = row2;
						}
					}
				}
				http.send(params);
				var source2 =
				{
					localdata: data2,
					datatype: "array",
				};
				var dataAdapter2 = new $.jqx.dataAdapter(source2);
					// Create a jqxComboBox
					$("#cbotaisan").jqxComboBox(
					{ 
						autocomplete: true,
						source: dataAdapter2, 
						displayMember: "TenTaiSan", 
						valueMember: "MaTaiSan", 
						width: 300, height: 25, 
						theme: theme 
					});
            });
			
   	    //bat su kien chon don vi de lay ten don vi
		$("#cbotaisan").bind('select', function (event) 
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
        $('#tablethuoctinh').bind('rowselect', function (event) 
		{
			var args = event.args;
			var row = args.rowindex;
			var mathuoctinh = $('#tablethuoctinh').jqxGrid('getcellvalue', row, "MaThuocTinh");
			var tenthuoctinh = $('#tablethuoctinh').jqxGrid('getcellvalue', row, "TenThuocTinh");
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
		
        $(document).ready(function () 
		{
            var theme = $.data(document.body, 'theme', theme);
			$('#showWindowButton').jqxButton({ theme: theme, width: '150px', height: '25px' });
			$("#deleterowbutton").jqxButton({ theme: theme, width: '150px', height: '25px' });
            if (theme == undefined) theme = '';
            $("#jqxWidget").css('visibility', 'visible');
        });
				

}