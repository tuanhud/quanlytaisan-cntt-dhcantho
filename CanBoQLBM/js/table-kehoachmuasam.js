function taobangtaisan (combo)
{
	 		var data = {};
			var data2 = {};
			var data3 = {};
			var theme = '';
			var d=0;
			var d1;
			var madonvi= '';
			var tendonvi= '';
			var mataisan= '';
			var tongtien = 0;
			var id=combo.value;
			http=GetXmlHttpObject();
			var params ="id="+id;
			
			http.open("POST",'get_list_khms.php', false);
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
						row["TenDonViTinh"] = x[i].getElementsByTagName('RESULT')[2].firstChild.nodeValue;
						row["SoLuong"] = x[i].getElementsByTagName('RESULT')[3].firstChild.nodeValue;
						
						row["DonGiaMuaSam"] = x[i].getElementsByTagName('RESULT')[4].firstChild.nodeValue;
						row["ThanhTien"] = x[i].getElementsByTagName('RESULT')[3].firstChild.nodeValue*x[i].getElementsByTagName('RESULT')[4].firstChild.nodeValue;
						tongtien=tongtien+row["ThanhTien"];
						row["ThuyetMinhSuDung"] = x[i].getElementsByTagName('RESULT')[5].firstChild.nodeValue;
						if(x[i].getElementsByTagName('RESULT')[6].firstChild.nodeValue==1){
						row["DuyetBM"] = "Đã duyệt";
						}
						else {
							row["DuyetBM"] = "Chưa duyệt";
						}
						if(x[i].getElementsByTagName('RESULT')[7].firstChild.nodeValue==1){
						row["DuyetKhoa"] = "Đã duyệt";
						}
						else {
							row["DuyetKhoa"] = "Chưa duyệt";
						}
						
						 d = x[i].getElementsByTagName('RESULT')[6].firstChild.nodeValue;
						 d1 = x[i].getElementsByTagName('RESULT')[7].firstChild.nodeValue;
						 tiencap = x[i].getElementsByTagName('RESULT')[8].firstChild.nodeValue;
						data[i] = row;
					}
				}
			}
			http.send(params);
			if(tiencap<tongtien){
			  alert("Số tiền chi phải nhỏ hơn hoặc bằng số tiền cấp!");
			  document.getElementById("btn_boduyet").style.display='none';
			 document.getElementById("btn_duyet").style.display='none';	
			
			}
			else 
			{
				if(d==1&& d1==0){
			 document.getElementById("btn_duyet").style.display='none';	
			 document.getElementById("btn_boduyet").style.display='inline';	
			 //document.getElementById("btn_boduyet").disabled = 'false';	
			}
			else if(d==1&& d1==1)
			{
			//document.getElementById("btn_duyet").disabled = 'true';	
			 document.getElementById("btn_boduyet").style.display='none';
			 document.getElementById("btn_duyet").style.display='none';	
			}
			else if(d==0&& d1==0)
			{
				document.getElementById("btn_boduyet").style.display='none';	
			 document.getElementById("btn_duyet").style.display='inline';	
				
			}
			}
			
            var source =
            {
                localdata: data,
				datatype: "array",
							/*
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
					})
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
			
 		    
           // initialize jqxGrid
		   */
		  
}
 var dataadapter = new $.jqx.dataAdapter(source);
            $("#jqthem").jqxGrid(
            {
                width: 960,
				selectionmode: 'singlecell',
                source: dataadapter,
                theme: theme,
				editable: true,
				autoheight: true,
				pageable: true,
				
				
                columns: [
					  { text: 'Mã tài sản', editable: false, datafield: 'MaTaiSan', width: 80, cellsalign: 'left' },
					  { text: 'Tên tài sản', editable: false, datafield: 'TenTaiSan', width: 150, cellsalign: 'left' },
                      { text: 'Đơn vị tính', editable: false, datafield: 'TenDonViTinh', width: 80, cellsalign: 'left' },
                      { text: 'Số Lượng',editable: false, datafield: 'SoLuong', width: 80 },
					  { text: 'Đơn giá (VNĐ)',editable: true ,datafield: 'DonGiaMuaSam', width: 100 },
					  
					  { text: 'Thành tiền',editable: false, datafield: 'ThanhTien', width: 90 },
					  { text: 'Thuyết minh sử dụng',editable: false, datafield: 'ThuyetMinhSuDung', width: 200 },
					  { text: 'Bộ môn duyệt',editable: false, datafield: 'DuyetBM', width: 100 },
					  { text: 'Khoa duyệt',editable: false, datafield: 'DuyetKhoa', width: 90 },
                  ]
            });
			$("#tongtienduyet").html(tongtien);
			$("#tiencap").html(tiencap);
			/*
		$('#jqxgrid').bind('rowselect', function (event) 
		{
			var args = event.args;
			var row = args.rowindex;
			mataisan = $('#jqxgrid').jqxGrid('getcellvalue', row, "MaTaiSan");
			madonvi = $('#jqxgrid').jqxGrid('getcellvalue', row, "MSDV");
		});	
        // delete row.
        $("#deleterowbutton").bind('click', function () 
		{
				//xoa du lieu co mataisan va mathuoctinh bang cothuoctinh
				var data = "delete=true&MaTaiSan=" +mataisan +"&MSDV=" + madonvi; 					
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
            $('#eventWindow').jqxWindow({ maxHeight: 500, maxWidth:500, minHeight: 30, minWidth: 250, height: 400, width: 500,
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
								var row2 = {};
								row2["MSDV"] = x[i].getElementsByTagName('column')[0].firstChild.nodeValue;
								row2["TenDV"] = x[i].getElementsByTagName('column')[1].firstChild.nodeValue;
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
						$("#cbodonvi").jqxComboBox(
						{ 
							incrementalSearch: true,				
							selectedIndex: 0, 
							source: dataAdapter2, 
							displayMember: "TenDV", 
							valueMember: "MSDV", 
							width: 340, 
							height: 25, 
							theme: theme 
						});
					
					
				 	// tìm tài sản
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
								var row3 = {};
								row3["MaTaiSan"] = x[i].getElementsByTagName('column')[0].firstChild.nodeValue;
								row3["TenTaiSan"] = x[i].getElementsByTagName('column')[1].firstChild.nodeValue;
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
					$("#cbotaisan").jqxComboBox(
					{ 			 
						source: dataAdapter3, 
						autocomplete: true,
						autoDropDownHeight: true,
						displayMember: "TenTaiSan", 
						valueMember: "MaTaiSan", 
						width: 340, 
						height: 25, 
						theme: theme 
					});
					
					
					var dataAdapter4;
					$("#tabletaisan").jqxGrid(
					{
						width: 340,
						selectionmode: 'singlerow',
						theme: theme,
						editable: true,
						height: 200,
						columns: [
							  { text: 'Mã tài sản', editable: false, datafield: 'MaTaiSan', width: 100, cellsalign: 'left' },
							  { text: 'Tên tài sản', editable: false, datafield: 'TenTaiSan', width: 240, cellsalign: 'left' },
						  ]
					});
            });
        }
        //bat su kien chon don vi de lay ten don vi
		$("#cbodonvi").bind('select', function (event) 
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
		
		 
		//khi chon 1 row tren combo taisan, tu dong se addrow vao bang taisan
        $('#cbotaisan').bind('change', function (event) 
		{
			var args = event.args;
            var item = $('#cbotaisan').jqxComboBox('getItem', args.index);
			mataisan = item.value;
			tentaisan =item.label;
			var row = {};
            row["MaTaiSan"] = mataisan;
            row["TenTaiSan"] = tentaisan;
			row["Delete"] = '';
			
			var item = $("#cbodonvi").jqxComboBox('getSelectedItem');
						madonvi=item.value; 
						tendonvi =item.label;
   
			var them=1;
			var rowscount = $("#tabletaisan").jqxGrid('getdatainformation').rowscount;
			for(var i=0;i < rowscount;i++) 
			{
					var mataisan2 = $('#tabletaisan').jqxGrid('getcellvalue', i, "MaTaiSan");
					if(mataisan==mataisan2)
					{
						them=0;
					}	
			}
			
			
			var rowscount2 = $("#jqxgrid").jqxGrid('getdatainformation').rowscount;
			for(var j=0;j < rowscount2;j++) 
			{
					var mataisan2 = $('#jqxgrid').jqxGrid('getcellvalue', j, "MaTaiSan");
					var madonvi2 = $('#jqxgrid').jqxGrid('getcellvalue', j, "MSDV");
					if((madonvi==madonvi2)&&(mataisan==mataisan2))
					{
						them=0;
					}	
			}
			// add vao bang taisan
			if(them==1)
			{
				$('#tabletaisan').jqxGrid('addrow',null, row);
				
			}
			
		});
		
		 $("#save").bind('click', function () 
		 {
			 		var item = $("#cbodonvi").jqxComboBox('getSelectedItem');
						madonvi=item.value; 
						tendonvi =item.label;
						
            		var rowscount = $("#tabletaisan").jqxGrid('getdatainformation').rowscount;
					for(var i=0;i < rowscount;i++) 
					{
						   	var mats = $('#tabletaisan').jqxGrid('getcellvalue', i, "MaTaiSan");
						   	var tents = $('#tabletaisan').jqxGrid('getcellvalue', i, "TenTaiSan");
						    var row12 = {};
							row12["MSDV"] = madonvi;
							row12["TenDV"] = tendonvi;
							row12["MaTaiSan"] = mats;
							row12["TenTaiSan"] = tents;
							$('#jqxgrid').jqxGrid('addrow',null, row12);
							
							// luu vao csdl
							{
								http=GetXmlHttpObject();
								var params = "insert=true&MaDonvi=" +madonvi + "&MaTaiSan=" + mats;				
								http.open("POST", 'data_taisanthuocdonvi2.php', false);
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
					$("#cbotaisan").jqxComboBox('clearSelection'); 
					$('#tabletaisan').jqxGrid('clear');
					
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
			$("#cbotaisan").jqxComboBox('clearSelection');
            $("#jqxWidget").css('visibility', 'visible');
        });*/
				

}