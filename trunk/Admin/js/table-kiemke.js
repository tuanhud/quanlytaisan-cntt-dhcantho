//Kiểm tra ngày tháng năm*********************************************************************************************************************
/*function check_date_ngaysinh(day,month,year)
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
}*/
//Tao bang hien thi noi dung phieu mau************************************************************************************************************
function taobangkiemke(maphieu,madonvi,frm)
{
	 		var data = {};
			var data2 = {};
			var data3 = {};
			var theme = '';
			/*var madonvi= '';
			var tendonvi= '';
			var mataisan= '';
			var mataisan2= '';
			var tongtien= 0;*/
			
			{
				http=GetXmlHttpObject();
				var params = "madonvi=" +madonvi;		
				http.open("POST",'get_list_taisankiemke.php', false);
				http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				http.onreadystatechange = function()
				{
					if(http.readyState == 4 && http.status == 200) 
					{
						var x=http.responseXML.getElementsByTagName('row');
						for(var i=0;i<x.length;i++)
						{	
							var row = {};
							var tt = i+1;
							row["TT"] = tt;
							row["MaTaiSan"] = x[i].getElementsByTagName('column')[0].firstChild.nodeValue;
							row["TenTaiSan"] = x[i].getElementsByTagName('column')[1].firstChild.nodeValue;
							row["SoLuong"] = x[i].getElementsByTagName('column')[2].firstChild.nodeValue;
							row["DonGia"] = x[i].getElementsByTagName('column')[3].firstChild.nodeValue;
							row["ThanhTien"] = x[i].getElementsByTagName('column')[2].firstChild.nodeValue*x[i].getElementsByTagName('column')[3].firstChild.nodeValue;
							
							var id = x[i].getElementsByTagName('column')[0].firstChild.nodeValue;
							http=GetXmlHttpObject();
							var params = "MaTaiSan="+id;				
							http.open("POST", 'get_list_giatrithuoctinh.php', false);
							http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
							http.onreadystatechange = function()
							{
								if(http.readyState == 4 && http.status == 200)
								{
									var x=http.responseXML.getElementsByTagName('row');
									for(var k=0;k<x.length;k++)
									{
										row[x[k].getElementsByTagName('column')[0].firstChild.nodeValue] = x[k].getElementsByTagName('column')[1].firstChild.nodeValue;
									}
								} 
							}
							http.send(params);
							
							data[i] = row;
						}
					}
				}
				http.send(params);
			}
            var source =
            {
                localdata: data,
				datatype: "array",
            };
			
			var row2 = {};
			var len;
			
			//lay cac cot thuoc tinh
			{
				http=GetXmlHttpObject();
				var params = "madonvi=" +madonvi;		
				http.open("POST",'get_list_thuoctinhkiemke.php', false);
				http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				http.onreadystatechange = function()
				{
					if(http.readyState == 4 && http.status == 200) 
					{
						var x=http.responseXML.getElementsByTagName('row');
						len = x.length+5;
						row2[0]={ text: 'TT', editable: false, datafield: 'TT',pinned: true, width: 40};
						row2[1]= { text: 'Mã TS', editable: false, datafield: 'MaTaiSan', width: 50};
						row2[2]= { text: 'Tên tài sản', editable: false, datafield: 'TenTaiSan',pinned: true, width: 300};
					    row2[3]= { text: 'Số Lượng',editable: false ,datafield: 'SoLuong', width: 70 };
						row2[4]={ text: 'Đơn giá',editable:false, datafield: 'DonGia', width: 80 };
						row2[5]= { text: 'Thành tiền',editable: false, datafield: 'ThanhTien', width: 80 };
						for(var j=0;j<x.length;j++)//lay duoc danh sach cac quyen ma can bo (macanbo) co
						{	
							row2[j+6]= { text: x[j].getElementsByTagName('column')[1].firstChild.nodeValue, editable: false, datafield: x[j].getElementsByTagName('column')[0].firstChild.nodeValue, width: 100};
						}
					}
				}
				http.send(params);
			}
			
			//lay cac noi dung
			{
				http=GetXmlHttpObject();
				var params = "maphieu=" +maphieu;		
				http.open("POST",'get_list_noidungphieumau.php', false);
				http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				http.onreadystatechange = function()
				{
					if(http.readyState == 4 && http.status == 200) 
					{
						var x=http.responseXML.getElementsByTagName('row');
						for(var k=0;k<x.length;k++)//lay duoc danh sach cac quyen ma can bo (macanbo) co
						{	
							row2[len+k]= { text: x[k].getElementsByTagName('column')[1].firstChild.nodeValue, editable: true, datafield: x[k].getElementsByTagName('column')[0].firstChild.nodeValue, columntype: 'checkbox', pinned: true, width: 100};
						}
					}
				}
				http.send(params);
			}
			
 		    var dataadapter = new $.jqx.dataAdapter(source);
           // initialize jqxGrid
            $("#tablephieumau").jqxGrid(
            {
                width: 960,
				selectionmode: 'singlecell',
                source: dataadapter,
               	theme: 'summer',
				editable: true,
				autoheight: true,
				pageable: true,
				virtualmode: true,
				columnsresize: true,
				enabletooltips: true,
				enablehover: true,
				enableanimations: true,
				columnsmenu: true,
				sorttogglestates: 2,
				rendergridrows: function()
				{
					  return dataadapter.records;     
				},
				columns:row2,
                
            });
			$('#tablephieumau').jqxGrid('hidecolumn', 'MaTaiSan');
			$('#tablephieumau').jqxGrid('removegroup', 'TenTaiSan');
			
			$("#tablephieumau").bind('cellendedit', function (event) 
			{
				   var column = args.datafield;
				   var row = args.rowindex;
				   var value = args.value;
				   var oldvalue = args.oldvalue;
				   
			});
			/*$('#tablephieumau').bind('rowselect', function (event) 
			{
				var args = event.args;
				var row = args.rowindex;
				mataisan = $('#tablephieumau').jqxGrid('getcellvalue', row, "MaTaiSan");
			});	*/
			$("#btn_themphieukiemke").bind('click', function () 
			{
				//insert phieu kiem ke + cophieumau
				var now = new Date(); 
				var loaikk = frm.cbo_loaikiemkethem.value;
				var ngay = ($('#ngaybdkk').jqxDateTimeInput('getDate')).getDate();
				var thang =($('#ngaybdkk').jqxDateTimeInput('getDate')).getMonth()+1;
				var nam =($('#ngaybdkk').jqxDateTimeInput('getDate')).getFullYear();
				var ngaybd = ngay+'/'+thang+'/'+nam;
				var ngay2 = ($('#ngayktkk').jqxDateTimeInput('getDate')).getDate();
				var thang2 =($('#ngayktkk').jqxDateTimeInput('getDate')).getMonth()+1;
				var nam2 =($('#ngayktkk').jqxDateTimeInput('getDate')).getFullYear();
				var ngaykt = ngay2+'/'+thang2+'/'+nam2;
				var diengiai = frm.txt_diengiai.value;
				var maphieu = frm.chonphieu.value;
				var nam = now.getFullYear();
				
				http=GetXmlHttpObject();
				var params = "Nam=" +nam+"&MaLoaiKK=" +loaikk+"&DienGiaiKiemKe=" +diengiai+"&NgayKiemKe=" +ngaybd+"&NgayKetThucKiemKe=" +ngaykt+"&MaPhieu=" +maphieu;
				alert(params);
				http.open("POST",'themphieukiemke.php', false);
				http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				http.onreadystatechange = function()
				{
					if(http.readyState == 4 && http.status == 200) 
					{
						//var result=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
						//alert(result);
					}
				}
				http.send(params);
				
				
				
				var rowscount = $("#tablephieumau").jqxGrid('getdatainformation').rowscount;
				for(var i=0;i < rowscount;i++) 
				{
						//lay tung ma noi dung
						http=GetXmlHttpObject();
						var params = "maphieu=" +maphieu;
						http.open("POST",'get_list_noidungphieumau.php', false);
						http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
						http.onreadystatechange = function()
						{
							if(http.readyState == 4 && http.status == 200) 
							{
								var x=http.responseXML.getElementsByTagName('row');
								for(var j=0;j<x.length;j++)
								{	
									var mats = $('#tablephieumau').jqxGrid('getcellvalue', i, "MaTaiSan");
									if($('#tablephieumau').jqxGrid('getcellvalue', i, x[j].getElementsByTagName('column')[0].firstChild.nodeValue))
									{
										 
									}
								}
							}
						}
						http.send(params);
				}
		});
			
			/**/
	/*
		
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
				
				
                var selectedrowindex = $("#tablephieumau").jqxGrid('getselectedrowindex');
                var rowscount = $("#tablephieumau").jqxGrid('getdatainformation').rowscount;
                if (selectedrowindex >= 0 && selectedrowindex < rowscount) 
				{
                    var id = $("#tablephieumau").jqxGrid('getrowid', selectedrowindex);
                    $("#tablephieumau").jqxGrid('deleterow', id);
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
			
			
			var rowscount2 = $("#tablephieumau").jqxGrid('getdatainformation').rowscount;
			for(var j=0;j < rowscount2;j++) 
			{
					var mataisan2 = $('#tablephieumau').jqxGrid('getcellvalue', j, "MaTaiSan");
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
							$('#tablephieumau').jqxGrid('addrow',null, row12);
								
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
		$("#tablephieumau").bind('cellendedit', function (event) 
		{
		   var column = args.datafield;
		   var row = args.rowindex;
		   var value = args.value;
		   var oldvalue = args.oldvalue;
		   var tongtien2 = 0;
		   var sl = $('#tablephieumau').jqxGrid('getcellvalue', row, "SoLuong");
		   var dg = $('#tablephieumau').jqxGrid('getcellvalue', row, "DonGia");
		   var tm = $('#tablephieumau').jqxGrid('getcellvalue', row, "ThuyetMinh");
		   var ma = $('#tablephieumau').jqxGrid('getcellvalue', row, "MaTaiSan");
		   
		   if(column=='SoLuong' )
		   {
			   $("#tablephieumau").jqxGrid('setcellvalue', row, "ThanhTien",value*dg);
			   var rowscount = $("#tablephieumau").jqxGrid('getdatainformation').rowscount;
			   for(var i=0;i < rowscount;i++) 
				{
					var thanhtien = $('#tablephieumau').jqxGrid('getcellvalue', i, "ThanhTien");
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
		var rowscount = $("#tablephieumau").jqxGrid('getdatainformation').rowscount;
		for(var i=0;i < rowscount;i++) 
		{
					var thanhtien = $('#tablephieumau').jqxGrid('getcellvalue', i, "ThanhTien");
					tongtien = tongtien + thanhtien;
		}
		$('#tongtien').html(tongtien);
		
		*/
		
        $(document).ready(function () {
            var theme = $.data(document.body, 'theme', theme);
            if (theme == undefined) theme = '';
           // addEventListeners();
			//$("#cbotaisan").jqxComboBox('clearSelection');
            $("#jqxWidget").css('visibility', 'visible');
        });
	
}