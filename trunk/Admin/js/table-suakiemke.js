function FocusAndSelect(n)
{
		$(n).focus(),$(n).select()
}
function taobangkiemkesua(frm,loaikiemkesua,phieukiemkesua)
{
	 		var data = {};
			var data3 = {};
			var theme = '';
			var maphieukiemkesua;
			
			// table sua kiem ke
			{
				
				http=GetXmlHttpObject();
				var params = "MaPhieuKiemKe=" +phieukiemkesua;		
				http.open("POST",'get_list_taisankiemkesua.php', false);
				http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				http.onreadystatechange = function()
				{
					if(http.readyState == 4 && http.status == 200) 
					{
						var x=http.responseXML.getElementsByTagName('row');
						for(var i=0;i<x.length;i++)
						{	
							var row = {};
							var id = x[i].getElementsByTagName('column')[0].firstChild.nodeValue;//ma tai san
							
							// fill gia tri tai san thuoc don vi
							var tt = i+1;
							row["TT"] = tt;
							row["MaTaiSan"] = x[i].getElementsByTagName('column')[0].firstChild.nodeValue;
							row["TenTaiSan"] = x[i].getElementsByTagName('column')[1].firstChild.nodeValue;
							row["SoLuong"] = x[i].getElementsByTagName('column')[2].firstChild.nodeValue;
							row["DonGia"] = x[i].getElementsByTagName('column')[3].firstChild.nodeValue;
							row["ThanhTien"] = x[i].getElementsByTagName('column')[2].firstChild.nodeValue*x[i].getElementsByTagName('column')[3].firstChild.nodeValue;
							
							// fill gia tri thuoc tinh
							http=GetXmlHttpObject();
							var params1 = "MaTaiSan="+id;				
							http.open("POST", 'get_list_giatrithuoctinh.php', false);
							http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
							http.onreadystatechange = function()
							{
								if(http.readyState == 4 && http.status == 200)
								{
									var y=http.responseXML.getElementsByTagName('row');
									for(var k=0;k<y.length;k++)
									{
										row[y[k].getElementsByTagName('column')[0].firstChild.nodeValue] = y[k].getElementsByTagName('column')[1].firstChild.nodeValue;
									}
								} 
							}
							http.send(params1);
							
							// fill gia tri noi dung
							http=GetXmlHttpObject();
							var params2 = "MaPhieuKiemKe=" +phieukiemkesua;		
							http.open("POST",'get_list_noidungphieumausua.php', false);
							http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
							http.onreadystatechange = function()
							{
								if(http.readyState == 4 && http.status == 200) 
								{
									var z=http.responseXML.getElementsByTagName('row');
									for(var j=0;j<z.length;j++)
									{	
										var manoidung = z[j].getElementsByTagName('column')[0].firstChild.nodeValue;//ma noi dung
										http=GetXmlHttpObject();
										var params3 = "MaPhieuKiemKe=" +phieukiemkesua+"&MaTaiSan=" +id+"&MaND=" +manoidung;		
										http.open("POST",'get_list_conoidung.php', false);
										http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
										http.onreadystatechange = function()
										{
											if(http.readyState == 4 && http.status == 200) 
											{
												var w=http.responseXML.getElementsByTagName('row');
												for(var m=0;m<w.length;m++)
												{	
													if((w[m].getElementsByTagName('column')[0].firstChild.nodeValue)=='true')
														row[manoidung]=1 ;
													else if((w[m].getElementsByTagName('column')[0].firstChild.nodeValue)=='false')
														row[manoidung]=0 ;
													else
														row["GhiChu"]=w[m].getElementsByTagName('column')[0].firstChild.nodeValue ;
												}
											}
										}
										http.send(params3);
									}
								}
							}
							http.send(params2);
							
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
				var params = "MaPhieuKiemKe=" +phieukiemkesua;		
				http.open("POST",'get_list_thuoctinhkiemkesua.php', false);
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
			
			//lay cac cot noi dung
			{
				http=GetXmlHttpObject();
				var params = "MaPhieuKiemKe=" +phieukiemkesua;		
				http.open("POST",'get_list_noidungphieumausua.php', false);
				http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				http.onreadystatechange = function()
				{
					if(http.readyState == 4 && http.status == 200) 
					{
						var x=http.responseXML.getElementsByTagName('row');
						for(var k=0;k<x.length;k++)
						{	
							if(x[k].getElementsByTagName('column')[0].firstChild.nodeValue!='GHICHU')
							{
								row2[len+k]= { text: x[k].getElementsByTagName('column')[1].firstChild.nodeValue, editable: true, datafield: x[k].getElementsByTagName('column')[0].firstChild.nodeValue, columntype: 'checkbox', width: 100};
							}
						}
						row2[len+x.length]= { text:'Ghi Chú', editable: true, datafield:'GhiChu', width:300};
					}
				}
				http.send(params);
			}
			
 		    var dataadapter = new $.jqx.dataAdapter(source);
           // initialize jqxGrid
            $("#tablephieumausua").jqxGrid(
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
			$('#tablephieumausua').jqxGrid('hidecolumn', 'MaTaiSan');
			
			$("#tablephieumausua").bind('cellendedit', function (event) 
			{
				   var column = args.datafield;
				   var row = args.rowindex;
				   var value = args.value;
				   var oldvalue = args.oldvalue;
				   
			});
			$('#tablephieumausua').bind('rowselect', function (event) 
			{
				var args = event.args;
				var row = args.rowindex;
				mataisan = $('#tablephieumausua').jqxGrid('getcellvalue', row, "MaTaiSan");
			});
			
			
}






function taocombosua(frm)
{	
			var dt = {};
			var dt2 = {};
			var dt3 = {};
  			
			
			//cbo phieu kiem ke  
					http=GetXmlHttpObject();
						var params ="";
						http.open("POST", 'get_list_phieukiemkesua.php', false);
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
						$("#phieukiemkesua").jqxDropDownList({source: da2, displayMember: "Ten", valueMember: "Ma", selectedIndex: 0, width: '90%', height: '25px', theme: 'energyblue' });
			
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
			$("#loaikiemkesua").jqxDropDownList({ source: da3,displayMember: "Ten", valueMember: "Ma", selectedIndex: 0, width: '90%', height: '25px', theme: 'energyblue' });
			
			// su kien chon loai kiem ke
			var loaikiemkesua = '';
			var item = $("#loaikiemkesua").jqxDropDownList('getSelectedItem');
			loaikiemkesua=item.value;
			$('#loaikiemkesua').bind('select', function (event) 
			{
				if (event.args) 
				{
					var item = event.args.item;
					if (item) 
					{
						loaikiemkesua=item.value;
					}
				}
			});
						
			
			//su kien chon phieu kiem ke
			// 
			var phieukiemkesua = '';
			var item = $("#phieukiemkesua").jqxDropDownList('getSelectedItem');
			phieukiemkesua=item.value;
			
			$('#phieukiemkesua').bind('select', function (event) 
			{
				if (event.args) 
				{
					var item = event.args.item;
					if (item) 
					{
						phieukiemkesua=item.value;
						$('#tablephieumausua').jqxGrid('refreshdata');
						taobangkiemkesua(document.frm_suaphieukiemke,loaikiemkesua,phieukiemkesua);
						
					}
				}
			});
			
			// su kien click nut them
			$("#btn_suaphieukiemke").bind('click', function () 
			{
				if((loaikiemkesua!=-1)&&(phieukiemkesua!=-1))
				{
					//update phieu kiem ke + cophieumausua
					var now = new Date(); 
					var ngay = ($('#ngaybdkksua').jqxDateTimeInput('getDate')).getDate();
					var thang =($('#ngaybdkksua').jqxDateTimeInput('getDate')).getMonth()+1;
					var nam =($('#ngaybdkksua').jqxDateTimeInput('getDate')).getFullYear();
					var ngaybd = ngay+'/'+thang+'/'+nam;
					var ngay2 = ($('#ngayktkksua').jqxDateTimeInput('getDate')).getDate();
					var thang2 =($('#ngayktkksua').jqxDateTimeInput('getDate')).getMonth()+1;
					var nam2 =($('#ngayktkksua').jqxDateTimeInput('getDate')).getFullYear();
					var ngaykt = ngay2+'/'+thang2+'/'+nam2;
					var diengiai = document.frm_suaphieukiemke.txt_diengiaisua.value;
					var nam = now.getFullYear();
					
					http=GetXmlHttpObject();
					var params = "Nam=" +nam+"&MaLoaiKK=" +loaikiemkesua+"&DienGiaiKiemKe=" +diengiai+"&NgayKiemKe=" +ngaybd+"&NgayKetThucKiemKe=" +ngaykt+"&MaPhieu=" +phieukiemkesua;
					http.open("POST",'suaphieukiemke.php', false);
					http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					http.onreadystatechange = function()
					{
						if(http.readyState == 4 && http.status == 200) 
						{
							//gui lai ma phieu kiem ke
							//alert(http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue);
						}
					}
					http.send(params);
					
					
					//insert taisankiemke
					/*var rowscount = $("#tablephieumausua").jqxGrid('getdatainformation').rowscount;
					for(var i=0;i < rowscount;i++) 
					{
							var ma = $('#tablephieumausua').jqxGrid('getcellvalue', i, "MaTaiSan");
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
					*/
					//update conoidung
					var result;
					var rowscount = $("#tablephieumausua").jqxGrid('getdatainformation').rowscount;
					for(var i=0;i < rowscount;i++) 
					{
						http=GetXmlHttpObject();
						var params = "MaPhieuKiemKe=" +phieukiemkesua;		
						http.open("POST",'get_list_noidungphieumausua.php', false);
						http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
						http.onreadystatechange = function()
						{
							if(http.readyState == 4 && http.status == 200) 
							{
								var x=http.responseXML.getElementsByTagName('row');
								for(var k=0;k<x.length;k++)
								{	
									if(x[k].getElementsByTagName('column')[0].firstChild.nodeValue!='GHICHU')
									{
										var manoidung = x[k].getElementsByTagName('column')[0].firstChild.nodeValue;
										var tennoidung = x[k].getElementsByTagName('column')[1].firstChild.nodeValue;				
										var mats = $('#tablephieumausua').jqxGrid('getcellvalue', i, "MaTaiSan");
										var chitietnoidung = $('#tablephieumausua').jqxGrid('getcellvalue', i, manoidung);
										
										http=GetXmlHttpObject();
										var params12 = "MaTaiSan=" +mats+"&MaPhieuKiemKe=" +phieukiemkesua+"&MaND=" +manoidung+"&ChiTietND=" +chitietnoidung;
										http.open("POST",'suaconoidungphieukiemke.php', false);
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
						}
						http.send(params);
						
						//luu conoidung ghichu				
						var mats = $('#tablephieumausua').jqxGrid('getcellvalue', i, "MaTaiSan");
						var ctnd = $('#tablephieumausua').jqxGrid('getcellvalue', i, "GhiChu");
						http=GetXmlHttpObject();
						var params14 = "mataisan=" +mats+"&maphieukiemke=" +phieukiemkesua+"&manoidung=" +'GHICHU'+"&chitietnoidung=" +ctnd;
						http.open("POST",'suaconoidungphieukiemke2.php', false);
						http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
						http.onreadystatechange = function()
						{
							if(http.readyState == 4 && http.status == 200) 
							{
								result14=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
								
							}
						}
						http.send(params14);
					 }
					alert(result14); 
				}
				else
				{
					alert('Chưa đầy đủ dữ liệu.');
				}
			});	
			
			
			//xoa phieu kiem ke
			$("#btn_xoaphieukiemke").bind('click', function () 
			{
				if(phieukiemkesua!=-1)
				{
					//xoa phieu kiem ke va cophieumau , taisankiemke
					http=GetXmlHttpObject();
					var params = "MaPhieu=" +phieukiemkesua;
					http.open("POST",'xoaphieukiemke.php', false);
					http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					http.onreadystatechange = function()
					{
						if(http.readyState == 4 && http.status == 200) 
						{
							//gui lai ma phieu kiem ke
							alert(http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue);
						}
					}
					http.send(params);
				}
				else
				{
					alert('Chưa đầy đủ dữ liệu.');
				}
			});	
			
}
