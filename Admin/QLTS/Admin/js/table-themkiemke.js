function FocusAndSelect(n)
{
		$(n).focus(),$(n).select()
}
function taobangkiemkethem(frm,donvi,loaikiemke,phieumau)
{
	 		var data = {};
			var data3 = {};
			var theme = '';
			var maphieukiemke;
			{
				
				http=GetXmlHttpObject();
				var params = "madonvi=" +donvi;		
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
							data[i] = row;
							http.send(params);
							
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
				var params = "madonvi=" +donvi;		
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
						for(var j=0;j<x.length;j++)
						{	
							row2[j+6]= { text: x[j].getElementsByTagName('column')[1].firstChild.nodeValue, editable: false, datafield: x[j].getElementsByTagName('column')[0].firstChild.nodeValue, width: 100};
						}
					}
				}
				http.send(params);
			}
			
			//lay cac cot noi dung
			{
				http=GetXmlHttpObject();
				var params = "maphieu=" +phieumau;		
				http.open("POST",'get_list_noidungphieumau.php', false);
				http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				http.onreadystatechange = function()
				{
					if(http.readyState == 4 && http.status == 200) 
					{
						var x=http.responseXML.getElementsByTagName('row');
						for(var k=0;k<x.length;k++)
						{	
							row2[len+k]= { text: x[k].getElementsByTagName('column')[1].firstChild.nodeValue, editable: true, datafield: x[k].getElementsByTagName('column')[0].firstChild.nodeValue, columntype: 'checkbox', width: 100};
						}
						row2[len+x.length]= { text:'Ghi Chú', editable: true, datafield:'GhiChu', width:300};
					}
				}
				http.send(params);
			}
			
 		    var dataadapter = new $.jqx.dataAdapter(source);
           // initialize jqxGrid
            $("#tablephieumau").jqxGrid(
            {
                width: 940,
				selectionmode: 'singlecell',
                source: dataadapter,
               	theme: 'summer',
				editable: true,
				pageable: true,
				//virtualmode: true,
				columnsresize: true,
				enabletooltips: true,
				enablehover: true,
				//enableanimations: true,
				//columnsmenu: true,
				//sorttogglestates: 2,
				rendergridrows: function()
				{
					  return dataadapter.records;     
				},
				columns:row2,
                
            });
			$('#tablephieumau').jqxGrid('hidecolumn', 'MaTaiSan');
			
			$("#tablephieumau").bind('cellendedit', function (event) 
			{
				   var column = args.datafield;
				   var row = args.rowindex;
				   var value = args.value;
				   var oldvalue = args.oldvalue;
				   
			});
			$('#tablephieumau').bind('rowselect', function (event) 
			{
				var args = event.args;
				var row = args.rowindex;
				mataisan = $('#tablephieumau').jqxGrid('getcellvalue', row, "MaTaiSan");
			});
			
			
}






function taocombothem(frm)
{	
			var dt = {};
			var dt2 = {};
			var dt3 = {};
  			
			//cbo don vi
			var params ="";   
			http=GetXmlHttpObject();
			var params ="";
			http.open("POST", 'get_list_donvi2.php', false);
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
						dt[i] = row;
					}
				}
			}
			http.send(params);
			var source =
			{
				localdata: dt,
				datatype: "array"
			};
         	var da = new $.jqx.dataAdapter(source);
			$("#donvi").jqxDropDownList({ source: da, selectedIndex: 0,displayMember: "Ten", valueMember: "Ma", width: '90%', height: '25px', theme: 'energyblue'});
			
			//cbo phieu mau
			var params ="";   
			http=GetXmlHttpObject();
			var params ="";
			http.open("POST", 'get_list_phieumau.php', false);
			http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			http.onreadystatechange = function()
			{
				if(http.readyState == 4 && http.status == 200) 
				{
					var x=http.responseXML.getElementsByTagName('row');
					for(var i=0;i<x.length;i++)//lay duoc danh sach cac quyen ma can bo (macanbo) co
					{
						var row2 = {};
						row2["Ma"] = x[i].getElementsByTagName('column')[0].firstChild.nodeValue;
						row2["Ten"] = x[i].getElementsByTagName('column')[1].firstChild.nodeValue;
						dt2[i] = row2;
					}
				}
			}
			http.send(params);
			var source2 =
			{
				localdata: dt2,
				datatype: "array"
			};
        	var da2 = new $.jqx.dataAdapter(source2);
			$("#chonphieu").jqxDropDownList({ source: da2,displayMember: "Ten", valueMember: "Ma", selectedIndex: 0, width: '90%', height: '25px', theme: 'energyblue' });
			
			
			// cbo loai kiem ke
			var params ="";   
			http=GetXmlHttpObject();
			var params ="";
			http.open("POST", 'get_list_loaikiemke.php', false);
			http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			http.onreadystatechange = function()
			{
				if(http.readyState == 4 && http.status == 200) 
				{
					var x=http.responseXML.getElementsByTagName('row');
					for(var i=0;i<x.length;i++)//lay duoc danh sach cac quyen ma can bo (macanbo) co
					{
						var row3 = {};
						row3["Ma"] = x[i].getElementsByTagName('column')[0].firstChild.nodeValue;
						row3["Ten"] = x[i].getElementsByTagName('column')[1].firstChild.nodeValue;
						dt3[i] = row3;
					}
				}
			}
			http.send(params);
			var source3 =
			{
				localdata: dt3,
				datatype: "array"
			};
        	var da3 = new $.jqx.dataAdapter(source3);
			$("#loaikiemke").jqxDropDownList({ source: da3,displayMember: "Ten", valueMember: "Ma", selectedIndex: 0, width: '90%', height: '25px', theme: 'energyblue' });
			
			
			// su kien chon loai kiem ke
			var loaikiemke = '';
			var tenloaikiemke = '';
			var item = $("#loaikiemke").jqxDropDownList('getSelectedItem');
			loaikiemke=item.value;
			tenloaikiemke=item.label ;
			$('#loaikiemke').bind('select', function (event) 
			{
				if (event.args) 
				{
					var item = event.args.item;
					if (item) 
					{
						loaikiemke=item.value;
						tenloaikiemke=item.label ;
					}
				}
			});
			
			
			//su kien chon phieu mau
			var phieumau = '';
			var item = $("#chonphieu").jqxDropDownList('getSelectedItem');
			phieumau=item.value;
			$('#chonphieu').bind('select', function (event) 
			{
				if (event.args) 
				{
					var item = event.args.item;
					if (item) 
					{
						phieumau=item.value;
						
						if(phieumau==-1)
						{
							frm.ngaylap.value='';
							frm.capnhat.value='';
							frm.ghichu.value='';
						}
						else
						{
							http=GetXmlHttpObject();
							var params = "maphieu="+phieumau;
							http.open("POST", 'get_info_phieumau.php', false);
							http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
							http.onreadystatechange = function()
							{
								if(http.readyState == 4 && http.status == 200) 
								{
									frm.ghichu.value=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
									frm.capnhat.value=http.responseXML.getElementsByTagName('RESULT')[2].firstChild.nodeValue;
									frm.ngaylap.value=http.responseXML.getElementsByTagName('RESULT')[1].firstChild.nodeValue;
								}
							}
							http.send(params);
							
						}
					}
				}
			});
			
			// su kien chon don vi
			var donvi = '';
			var tendonvi = '';
			var item = $("#donvi").jqxDropDownList('getSelectedItem');
				donvi=item.value;
				tendonvi=item.label ;
			$('#donvi').bind('select', function (event) 
			{
				if (event.args) 
				{
					var item = event.args.item;
					if (item) 
					{
						donvi=item.value;
						tendonvi=item.label ;
						$('#tablephieumau').jqxGrid('refreshdata');
						taobangkiemkethem(document.frm_themphieukiemke,donvi,loaikiemke,phieumau);
						
					}
				}
			});
			
			
			
			// su kien click nut them
			$("#btn_themphieukiemke").bind('click', function () 
			{
				if((loaikiemke!=-1)&&(phieumau!=-1)&&(donvi!=-1))
				{
					//insert phieu kiem ke + cophieumau
					var now = new Date(); 
					var ngay = ($('#ngaybdkk').jqxDateTimeInput('getDate')).getDate();
					var thang =($('#ngaybdkk').jqxDateTimeInput('getDate')).getMonth()+1;
					var nam =($('#ngaybdkk').jqxDateTimeInput('getDate')).getFullYear();
					var ngaybd = ngay+'/'+thang+'/'+nam;
					var ngay2 = ($('#ngayktkk').jqxDateTimeInput('getDate')).getDate();
					var thang2 =($('#ngayktkk').jqxDateTimeInput('getDate')).getMonth()+1;
					var nam2 =($('#ngayktkk').jqxDateTimeInput('getDate')).getFullYear();
					var ngaykt = ngay2+'/'+thang2+'/'+nam2;
					var diengiai = frm.txt_diengiai.value;
					var nam = now.getFullYear();
					var tenphieukiemke = tenloaikiemke.toUpperCase()+' ĐƠN VỊ '+tendonvi.toUpperCase()+' THỜI GIAN '+ngaybd;
					http=GetXmlHttpObject();
					var params = "Nam=" +nam+"&MaLoaiKK=" +loaikiemke+"&DienGiaiKiemKe=" +diengiai+"&NgayKiemKe=" +ngaybd+"&NgayKetThucKiemKe=" +ngaykt+"&MaPhieu=" +phieumau+"&MSDV=" +donvi+"&TenPhieuKiemKe=" +tenphieukiemke;
					http.open("POST",'themphieukiemke.php', false);
					http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					http.onreadystatechange = function()
					{
						if(http.readyState == 4 && http.status == 200) 
						{
							//gui lai ma phieu kiem ke
							maphieukiemke=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
						}
					}
					http.send(params);
					
					
					//insert taisankiemke
					var rowscount = $("#tablephieumau").jqxGrid('getdatainformation').rowscount;
					for(var i=0;i < rowscount;i++) 
					{
							var ma = $('#tablephieumau').jqxGrid('getcellvalue', i, "MaTaiSan");
							http=GetXmlHttpObject();
							var params = "mataisan=" +ma+"&maphieukiemke=" +maphieukiemke;
							http.open("POST",'themtaisankiemke.php', false);
							http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
							http.onreadystatechange = function()
							{
								if(http.readyState == 4 && http.status == 200) {}
							}
							http.send(params);
					}
					
					//insert conoidung
					var result;
					var rowscount = $("#tablephieumau").jqxGrid('getdatainformation').rowscount;
					for(var i=0;i < rowscount;i++) 
					{
						http=GetXmlHttpObject();
						var params = "maphieu=" +phieumau;		
						http.open("POST",'get_list_noidungphieumau.php', false);
						http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
						http.onreadystatechange = function()
						{
							if(http.readyState == 4 && http.status == 200) 
							{
								var x=http.responseXML.getElementsByTagName('row');
	
								for(var k=0;k<x.length;k++)
								{	
									var manoidung = x[k].getElementsByTagName('column')[0].firstChild.nodeValue;
									var tennoidung = x[k].getElementsByTagName('column')[1].firstChild.nodeValue;				
									var mats = $('#tablephieumau').jqxGrid('getcellvalue', i, "MaTaiSan");
									var chitietnoidung = $('#tablephieumau').jqxGrid('getcellvalue', i, manoidung);
									
									http=GetXmlHttpObject();
									var params12 = "mataisan=" +mats+"&maphieukiemke=" +maphieukiemke+"&manoidung=" +manoidung+"&chitietnoidung=" +chitietnoidung;
								
									http.open("POST",'themconoidungkiemke.php', false);
									http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
									http.onreadystatechange = function()
									{
										if(http.readyState == 4 && http.status == 200) 
										{
											result=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
										}
									}
									http.send(params12);
								}
							}
						}
						http.send(params);
						
						//luu conoidung ghichu				
						var mats = $('#tablephieumau').jqxGrid('getcellvalue', i, "MaTaiSan");
						var ctnd = $('#tablephieumau').jqxGrid('getcellvalue', i, "GhiChu");
						http=GetXmlHttpObject();
						var params13 = "mataisan=" +mats+"&maphieukiemke=" +maphieukiemke+"&manoidung=" +'GHICHU'+"&chitietnoidung=" +ctnd;
						alert(params13);
						http.open("POST",'themconoidungkiemke2.php', false);
						http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
						http.onreadystatechange = function()
						{
							if(http.readyState == 4 && http.status == 200) 
							{
								result13=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
							}
						}
						http.send(params13);
					}
					alert(result);
				}
				else
				{
					alert('Chưa đầy đủ dữ liệu.');
				}
			});	
			
}
