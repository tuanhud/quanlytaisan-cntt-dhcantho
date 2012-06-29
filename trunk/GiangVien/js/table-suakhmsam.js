//Kiểm tra ngày tháng năm*********************************************************************************************************************
function check_date_ngaysinh(day,month,year)
{
		var ngay = parseInt(day, 10) ;
        var thang = parseInt(month, 10) ;
        var nam = parseInt(year, 10);
		if(ngay<1&&ngay>31) return true;
        switch (thang){
            case 2:
                if ((nam%4 == 0)&&(nam%400 !=0))
				{
					if(thang==2&&ngay>29)
                    	return true;
				}
                else
				{
					if(thang==2&&ngay>28)
					{
                    	return true;
					}
				}
                break;
            case 1:
            case 3:
            case 5:
            case 7:
            case 8:
            case 10:
            case 12:
                if(ngay>31)
				return true;
                break;
            default:
                if(ngay>30)
					return true;
        }
}
//Tao bang hien thi noi dung phieu mau************************************************************************************************************
function taobang(makhms)
{
	if(makhms!='-Chọn mã yêu cầu thiết bị-')
	{
	 		var data = {};
			var data2 = {};
			var data3 = {};
			var theme = '';
			var madonvi= '';
			var tendonvi= '';
			var mataisan= '';
			var mataisan2= '';
			var tongtien= 0;
			
			http=GetXmlHttpObject();
			var params = "makhms=" +makhms;		
			http.open("POST", 'get_list_taisanthuocKHMS.php', false);
			http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			http.onreadystatechange = function()
			{
				if(http.readyState == 4 && http.status == 200) 
				{
					var x=http.responseXML.getElementsByTagName('row');
					for(var i=0;i<x.length;i++)//lay duoc danh sach cac quyen ma can bo (macanbo) co
					{
						
						var row = {};
						row["MaTaiSan"] = x[i].getElementsByTagName('column')[0].firstChild.nodeValue;
						row["TenTaiSan"] = x[i].getElementsByTagName('column')[1].firstChild.nodeValue;
						row["TinhNangKT"] = x[i].getElementsByTagName('column')[2].firstChild.nodeValue;
						row["TenDVT"] = x[i].getElementsByTagName('column')[3].firstChild.nodeValue;
						row["SoLuong"] = x[i].getElementsByTagName('column')[4].firstChild.nodeValue;
						row["DonGia"] = x[i].getElementsByTagName('column')[5].firstChild.nodeValue;
						row["ThanhTien"] = x[i].getElementsByTagName('column')[4].firstChild.nodeValue*x[i].getElementsByTagName('column')[5].firstChild.nodeValue;
						row["ThuyetMinh"] = x[i].getElementsByTagName('column')[6].firstChild.nodeValue;
						data[i] = row;
					}
				}
			}
			http.send(params);
            var source =
            {
                localdata: data,
				datatype: "array",
            };
			
 		    var dataadapter = new $.jqx.dataAdapter(source);
           // initialize jqxGrid
            $("#jqthem").jqxGrid(
            {
                width: 960,
				selectionmode: 'singlerow',
                source: dataadapter,
                theme: 'energyblue',
				editable: true,
				autoheight: true,
				pageable: true,
				virtualmode: true,
				columnsresize: true,
				rendergridrows: function()
				{
					  return dataadapter.records;     
				},
                columns: [
					  { text: 'Mã', editable: false, datafield: 'MaTaiSan', width: 20, cellsalign: 'left' },
					  { text: 'Tên tài sản', editable: false, datafield: 'TenTaiSan', width: 200, cellsalign: 'left' },
                      { text: 'Tính năng kỹ thuật', editable: false, datafield: 'TinhNangKT', width: 300, cellsalign: 'left' },
                      { text: 'ĐVT',editable: false, datafield: 'TenDVT', width: 40 },
					  { text: 'Số Lượng',columntype: 'numberinput',editable: true ,datafield: 'SoLuong', width: 60,
					  		validation: function (cell, value) 
							{
							  if(value > 0)
							  return true;
							  else return { result: false, message: "Số lượng phải lớn hơn không."};
							},
							 initeditor: function (row, cellvalue, editor) 
							 {
								  editor.jqxNumberInput({ decimalDigits: 0, digits: 3 });
							 }
					   },
					  { text: 'Đơn giá',columntype: 'numberinput',editable:false, datafield: 'DonGia', width: 80 },
					  { text: 'Thành tiền',columntype: 'numberinput',editable: false, datafield: 'ThanhTien', width: 80 },
					   { text: 'Thuyết minh yêu cầu sử dụng',editable: true, datafield: 'ThuyetMinh', width: 600 },
                  ]
            });
         //  // initialize jqxGrid
//           /* $("#jqthem").jqxGrid(
//            {
//                width: 640,
//				selectionmode: 'singlecell',
//				altrows: true,
//                source: dataadapter,
//                theme: theme,
//				editable: true,
//				autoheight: true,
//				pageable: true,
//				virtualmode: true,
//				rendergridrows: function()
//				{
//					  return dataadapter.records;     
//				},
//                columns: [
//					  { text: 'Mã tài sản', editable: false, datafield: 'mats', width: 130, cellsalign: 'left' },
//					  { text: 'Tên tài sản', editable: false, datafield: 'ten', width: 150, cellsalign: 'left' },
//                      { text: 'ĐVT', editable: false, datafield: 'dvt', width: 50, cellsalign: 'left' },
//                      
//					  { text: 'Số Lượng', datafield: 'soluong',cellsalign: 'right',columntype: 'numberinput',value:0, width: 70, 
//						  
//						initeditor: function (row, cellvalue, editor) {
//                          editor.jqxNumberInput({ decimalDigits: 0});
//                      	}
//					  },
//					  { text: 'Đơn giá (VNĐ)',editable: false,cellsformat: 'f', datafield: 'dongia', width: 100 },
//					  { text: 'Thành tiền (VNĐ)',editable: false,cellsformat: 'f', datafield: 'tong', width: 140 },
//                  
//                  ]
//            });
//			
//			//chon 1 dong
//			 $("#jqthem").jqxGrid('selectionmode', 'singlerow');*/
//// delete row.********************************************************************************************************************************
//          $("#deleterowbutton").bind('click', function () 
//			{
//				var selectedrowindex = $("#jqthem").jqxGrid('getselectedrowindex');
//                var rowscount = $("#jqthem").jqxGrid('getdatainformation').rowscount;
//                if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
//                    var id = $("#jqthem").jqxGrid('getrowid', selectedrowindex);
//                    $("#jqthem").jqxGrid('deleterow', id);
//					$('#jqthem').jqxGrid('refreshdata');
//					//tinh gia tri tong thanh tien
//					var rowscount3 = $("#jqthem").jqxGrid('getdatainformation').rowscount;
//					var tongtien=0;
//					for(var k=0; k < rowscount3;k++) 
//						{ 
//						var tien = $('#jqthem').jqxGrid('getcellvalue', k, "tong");
//						tongtien=tongtien+tien;						   
//						}
//					$("#tongtien").html(tongtien);
//					}
//				
//				else{
//					alert("Bạn chưa chọn chi tiết VPP!");
//					}	
//					
//            });
//			$("#jqthem").bind('cellvaluechanged', function (event) {
//			//gan gia tri cho cot thanh tien
//					var rowscount2 = $("#jqthem").jqxGrid('getdatainformation').rowscount;
//					for(var j=0; j < rowscount2;j++) 
//						{ 
//							var tien=0
//						   var sl = $('#jqthem').jqxGrid('getcellvalue', j, "soluong");
//						   var dg = $('#jqthem').jqxGrid('getcellvalue', j, "dongia");
//						   tien=sl*dg;
//						   $("#jqthem").jqxGrid('setcellvalue', j, "tong", tien);
//						   
//						}
//					//tinh gia tri tong thanh tien
//					var rowscount3 = $("#jqthem").jqxGrid('getdatainformation').rowscount;
//					var tongtien=0;
//					for(var k=0; k < rowscount3;k++) 
//						{ 
//						var tien = $('#jqthem').jqxGrid('getcellvalue', k, "tong");
//						tongtien=tongtien+tien;						   
//						}
//					$("#tongtien").html(tongtien);
//					});
//	function capitaliseFirstLetter(string) 
//		{
//            return string.charAt(0).toUpperCase() + string.slice(1);
//        }
//		
////tao popup hiện thị data trong bang noidung de chọn *******************************************************************************************
//		function createElements(theme)
//		{
//            $('#cancel').jqxButton({ theme: theme, height: '25px', width: '65px' });
//            $('#eventWindow').jqxWindow({ maxHeight: 600, maxWidth:600, minHeight: 550, minWidth: 600, height: 400, width: 500,
//                theme: theme, resizable: false, isModal: true, modalOpacity: 0.3,
//                okButton: $('#save'), cancelButton: $('#cancel')
//            });
//        }
//        function addEventListeners() 
//		{
//            $('#showWindowButton').mousedown(function () 
//			{
//				createElements(theme);
//                $('#eventWindow').jqxWindow('show');
//// lấy dữ liệu tử bang noidung đưa lên bảng trong popup  ***************************************************************************************
//				var source2 =
//					{
//						datatype: "json",
//						datafields: 
//						[
//					{ name: 'mats' },
//                    { name: 'ten' },
//                    { name: 'dvt' },
//                   
//					
//                    { name: 'dongia' },
//					
//						],
//						id: 'mats',
//						url: 'get_info_kehoachmuasam.php',             
//					};
//					var dataAdapter3 = new $.jqx.dataAdapter(source2);
//					$("#jqxWidget3").jqxGrid(
//					{
//						width: 550,
//						selectionmode: 'singlerow',
//						source: dataAdapter3,
//						theme: theme,
//						editable: true,
//						autoheight: true, 
//						columns: [
//				  { text: 'Mã tài sản',editable: false, datafield: 'mats', width: 100 },
//                  { text: 'Tên tài sản',editable: false, datafield: 'ten', width: 200 },
//                  { text: 'Đơn vị tính',editable: false, datafield: 'dvt', width: 100},
//                  
//                  { text: 'Đơn giá',editable: false, datafield: 'dongia', minwidth: 200 }
//						  ]
//					});
//            });
//        } 
//// Select 1 dong tren popup roi đổ qua bảng lớn*************************************************************************************************
// 		/*$('#jqxWidget3').bind('rowclick', function (event) 
//		{
//			var args = event.args;
//			var row = args.rowindex;
//			var data = $('#jqxWidget3').jqxGrid('getrowdata',row);
//			manoidung = $('#jqxWidget3').jqxGrid('getcellvalue', row, "mats");
//			var i = 0,them=1;
//	      	var rowscount = $("#jqthem").jqxGrid('getdatainformation').rowscount;
//			for(i;i < rowscount;i++) 
//			{
//				   var manoidung2 = $('#jqthem').jqxGrid('getcellvalue', i, "mats");
//				   if(manoidung2==manoidung)
//				   {
//						them=0;
//				   }
//            }*/
//// add vao bang co lớn (Không phải popup)*******************************************************************************************************
//			/*if(them==1)
//			{
//				$('#jqthem').jqxGrid('addrow',null, data);
//			}
//			else{alert('Đã tồn tại tên nội dung này!!!.');}
//		});*/
//		//tong tien
//			$('#jqxWidget3').bind('rowclick', function (event) 
//			{
//				
//  				var args = event.args;
//				var row = args.rowindex;
//				var data = $('#jqxWidget3').jqxGrid('getrowdata',row);
//				//kiem tra trung du lieu
//				var i = 0,them=1;
//	      		var rowscount = $("#jqthem").jqxGrid('getdatainformation').rowscount;
//				var ma1 = $('#jqxWidget3').jqxGrid('getcellvalue', row, "mats");
//				for(i;i < rowscount;i++) 
//				{
//					   
//					   var ma2 = $('#jqthem').jqxGrid('getcellvalue', i, "mats");
//					   if(ma2==ma1)
//					   {
//							them=0;
//							break;
//					   }
//           		 }
//				if(them==1)
//				{
//					//var data = $('#jqthem').jqxGrid('getrowdata', row);
//						
//					//add vào trong bang o form
//					$("#jqthem").jqxGrid('addrow',null, data);
//					$('#jqxWidget3').jqxGrid('hiderow',row);
//					
//					}					
//				else{
//					alert("Tài sản này đã tồn tại!");
//					}
//			});
//// Chỉnh sửa size cua 2 button thêm và xóa******************************************************************************************************
//	$(document).ready(function () {
//            var theme = $.data(document.body, 'theme', theme);
//            if (theme == undefined) theme = '';
//            addEventListeners();
//			$('#showWindowButton').jqxButton({ theme: theme, width: '150px', height: '25px' });
//			$("#deleterowbutton").jqxButton({ theme: theme, width: '150px', height: '25px' });
//            $("#jqxWidget").css('visibility', 'visible');
//        });
//// su kiện khi click vao nút thêm phiếu mẫu *****************************************************************************************************
//		$("#btn_luu").unbind("click").click(function()
//		{
//			var rowcount4 = $("#jqthem").jqxGrid('getdatainformation').rowscount;
//			 if(rowcount4==0){
//				alert("Bạn chưa chọn tài sản!");
//			}
//			else{			        // synchronize with the server - send update command
//				var data1="";
//				$.ajax
//					({
//						dataType: 'json',
//						url: 'themyeucauthietbi.php',
//						data: data1,
//						success: function (data, status, xhr)
//						{}
//				});	
//					
//				for(var m=0;m<rowcount4;m++){
//					var mats = $('#jqthem').jqxGrid('getcellvalue', m,'mats');
//					var soluong = $('#jqthem').jqxGrid('getcellvalue', m,'soluong');
//					var dongia = $('#jqthem').jqxGrid('getcellvalue', m,'dongia');
//						var data = "insert=true&mats=" + mats + "&soluong=" + soluong+ "&dongia=" + dongia;
//					$.ajax
//					({
//						dataType: 'json',
//						url: 'themyeucauthietbi1.php',
//						data: data,
//						success: function (data, status, xhr)
//						{
//						}
//					});		
//                }
//				alert("Yêu cầu thiết bị thành công!");
//				window.location.reload(true);		
//			}
//		});
//		/*$(document).ready(function () {
//            var theme = $.data(document.body, 'theme', theme);
//            if (theme == undefined) theme = '';
//			 addEventListeners();
//			$('#showWindowButton').jqxButton({ theme: theme, width: '150px', height: '25px' });
//			$("#deleterowbutton").jqxButton({ theme: theme, width: '150px', height: '25px' });
//            $("#jqxWidget").css('visibility', 'visible');
//			
//        });*/
			
		$('#jqthem').bind('rowselect', function (event) 
		{
			var args = event.args;
			var row = args.rowindex;
			mataisan = $('#jqthem').jqxGrid('getcellvalue', row, "MaTaiSan");
		});	
        // delete row.
        $("#deleterowbutton").bind('click', function () 
		{
				//xoa du lieu co mataisan va mathuoctinh bang cothuoctinh
				var data = "delete=true&MaTaiSan=" +mataisan+"&MaKHMS=" +makhms;
				alert(data); 					
				$.ajax
				({
					dataType: 'json',
					url: 'data_taisanthuocKHMS.php',
					data: data,
					success: function (data, status, xhr) {}		
				})	
				
				
                var selectedrowindex = $("#jqthem").jqxGrid('getselectedrowindex');
                var rowscount = $("#jqthem").jqxGrid('getdatainformation').rowscount;
                if (selectedrowindex >= 0 && selectedrowindex < rowscount) 
				{
                    var id = $("#jqthem").jqxGrid('getrowid', selectedrowindex);
                    $("#jqthem").jqxGrid('deleterow', id);
                }
           });
		
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
			
			
			var rowscount2 = $("#jqthem").jqxGrid('getdatainformation').rowscount;
			for(var j=0;j < rowscount2;j++) 
			{
					var mataisan2 = $('#jqthem').jqxGrid('getcellvalue', j, "MaTaiSan");
					if(mataisan==mataisan2)
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
            		var rowscount = $("#tabletaisan").jqxGrid('getdatainformation').rowscount;
					var dongia;
					for(var i=0;i < rowscount;i++) 
					{
						   	var mats = $('#tabletaisan').jqxGrid('getcellvalue', i, "MaTaiSan");
						   	var tents = $('#tabletaisan').jqxGrid('getcellvalue', i, "TenTaiSan");
						    var row12 = {};
							row12["MaTaiSan"] = mats;
							row12["TenTaiSan"] = tents;
							{
								http=GetXmlHttpObject();
								var params = "MaTaiSan=" +mats;				
								http.open("POST", 'get_list_taisan_cothuoctinh.php', false);
								http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
								http.onreadystatechange = function()
								{
									if(http.readyState == 4 && http.status == 200) 
									{
										row12["SoLuong"]=1;
										dongia = http.responseXML.getElementsByTagName('column')[0].firstChild.nodeValue;
										row12["DonGia"]=http.responseXML.getElementsByTagName('column')[0].firstChild.nodeValue;
										row12["ThanhTien"]=http.responseXML.getElementsByTagName('column')[0].firstChild.nodeValue;
										row12["TinhNangKT"]=http.responseXML.getElementsByTagName('column')[1].firstChild.nodeValue;
										row12["TenDVT"]=http.responseXML.getElementsByTagName('column')[2].firstChild.nodeValue;
										row12["ThuyetMinh"]='Thuyết minh';
									}
								}
								http.send(params);						
							}
							$('#jqthem').jqxGrid('addrow',null, row12);
								
							// luu vao csdl
							{
								http=GetXmlHttpObject();
								var params = "insert=true&MaTaiSan=" + mats+"&SoLuong=" + 1+"&DonGia=" + dongia+"&MaKHMS=" + makhms;				
								http.open("POST", 'data_taisanthuocKHMS2.php', false);
								http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
								http.onreadystatechange = function()
								{
									if(http.readyState == 4 && http.status == 200){} 
								}
								http.send(params);						
							}

					}
					$("#cbotaisan").jqxComboBox('clearSelection'); 
					$('#tabletaisan').jqxGrid('clear');
					
         });
		  
 
		//update 
		$("#jqthem").bind('cellendedit', function (event) 
		{
		   var column = args.datafield;
		   var row = args.rowindex;
		   var value = args.value;
		   var oldvalue = args.oldvalue;
		   var tongtien2 = 0;
		   var sl = $('#jqthem').jqxGrid('getcellvalue', row, "SoLuong");
		   var dg = $('#jqthem').jqxGrid('getcellvalue', row, "DonGia");
		   var tm = $('#jqthem').jqxGrid('getcellvalue', row, "ThuyetMinh");
		   var ma = $('#jqthem').jqxGrid('getcellvalue', row, "MaTaiSan");
		   
		   if(column=='SoLuong' )
		   {
			   $("#jqthem").jqxGrid('setcellvalue', row, "ThanhTien",value*dg);
			   var rowscount = $("#jqthem").jqxGrid('getdatainformation').rowscount;
			   for(var i=0;i < rowscount;i++) 
				{
					var thanhtien = $('#jqthem').jqxGrid('getcellvalue', i, "ThanhTien");
					tongtien2 = tongtien2 + thanhtien;
				}
				$('#tongtien').html(tongtien2);
		   
				var data = "update=true&SoLuong=" + value;
				data = data + "&MaTaiSan=" + ma;
				data = data + "&DonGia=" + dg;
				data = data + "&MaKHMS=" + makhms;			
				$.ajax
				({
					//dataType: 'json',
					url: 'data_taisanthuocKHMS.php',
					data: data,
					success: function (data, status, xhr) {}
				});
				tongtien2 = 0;
			}
			else if(column=='ThuyetMinh')
			{
				http=GetXmlHttpObject();
				var params = "SoLuong=" + sl + "&ThuyetMinh=" + value+ "&MaTaiSan=" + ma+ "&DonGia=" + dg+ "&MaKHMS=" + makhms;		
				http.open("POST", 'data_taisanthuocKHMS3.php', false);
				http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				http.onreadystatechange = function()
				{
					if(http.readyState == 4 && http.status == 200){} 
				}
				http.send(params);						
			}
		   //lay gia tri cua so luong * don gia
		});
		
		
		//tinh tổng tiền
		var rowscount = $("#jqthem").jqxGrid('getdatainformation').rowscount;
		for(var i=0;i < rowscount;i++) 
		{
					var thanhtien = $('#jqthem').jqxGrid('getcellvalue', i, "ThanhTien");
					tongtien = tongtien + thanhtien;
		}
		$('#tongtien').html(tongtien);
		
		
		
        $(document).ready(function () {
            var theme = $.data(document.body, 'theme', theme);
            if (theme == undefined) theme = '';
            addEventListeners();
			$("#cbotaisan").jqxComboBox('clearSelection');
            $("#jqxWidget").css('visibility', 'visible');
        });
	}
}