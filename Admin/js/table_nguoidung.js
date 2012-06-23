function taobangtaisan ()
{
	 		var data = {};
			var data2 = {};
			var theme = '';
			var tendonvithem = '';
			var masocanbo ='';
			var tencanbo ='';
			var gioitinh = '';
			var ngaysinh ='';
			var email ='';
			var diachi = '';
			var sodienthoai ='';
			var matkhau ='';
			var result ='';
			
			var params ="";   
			http=GetXmlHttpObject();
			var params ="";
			http.open("POST", 'get_list_temp2.php', false);
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
		$("#tendonvithem").jqxDropDownList({ source: dataAdapter, selectedIndex: 0,displayMember: "Ten", valueMember: "Ma", width: '250', height: '25px', theme: theme});
		$('#tendonvithem').bind('select', function (event) 
		{
			if (event.args) 
					{
                        var item = event.args.item;
                        if (item) 
						{
                          	tendonvithem=item.value;
                         }
                    }
        });
		$("#masocanbo").jqxDropDownList({ source: dataAdapter, selectedIndex: 1,displayMember: "Ten", valueMember: "Ma", width: '250', height: '25px', theme: theme });
		$('#masocanbo').bind('select', function (event) 
		{
                    var args = event.args;
                    var item = $('#masocanbo').jqxDropDownList('getItem', args.index);
                    if (item != null) 
					{
						masocanbo=item.value;
                    }
        });
		$("#tencanbo").jqxDropDownList({ source: dataAdapter, selectedIndex: 2,displayMember: "Ten", valueMember: "Ma", width: '250', height: '25px', theme: theme });
		$('#tencanbo').bind('select', function (event) 
		{
                    var args = event.args;
                    var item = $('#tencanbo').jqxDropDownList('getItem', args.index);
                    if (item != null) 
					{
						tencanbo=item.value;
                    }
        });
		$("#gioitinh").jqxDropDownList({ source: dataAdapter, selectedIndex: 3,displayMember: "Ten", valueMember: "Ma", width: '250', height: '25px', theme: theme });
		$('#gioitinh').bind('select', function (event) 
		{
                    var args = event.args;
                    var item = $('#gioitinh').jqxDropDownList('getItem', args.index);
                    if (item != null) 
					{
						gioitinh=item.value;
                    }
        });
		$("#ngaysinh").jqxDropDownList({ source: dataAdapter, selectedIndex: 4,displayMember: "Ten", valueMember: "Ma", width: '250', height: '25px', theme: theme });
		$('#ngaysinh').bind('select', function (event) 
		{
                    var args = event.args;
                    var item = $('#ngaysinh').jqxDropDownList('getItem', args.index);
                    if (item != null) 
					{
						ngaysinh=item.value;
                    }
        });
		$("#email").jqxDropDownList({ source: dataAdapter, selectedIndex: 5,displayMember: "Ten", valueMember: "Ma", width: '250', height: '25px', theme: theme });
		$('#email').bind('select', function (event) 
		{
                    var args = event.args;
                    var item = $('#email').jqxDropDownList('getItem', args.index);
                    if (item != null) 
					{
						email=item.value;
                    }
        });
		$("#diachi").jqxDropDownList({ source:dataAdapter, selectedIndex: 6,displayMember: "Ten", valueMember: "Ma", width: '250', height: '25px', theme: theme });
		$('#diachi').bind('select', function (event) 
		{
                    var args = event.args;
                    var item = $('#diachi').jqxDropDownList('getItem', args.index);
                    if (item != null) 
					{
						diachi=item.value;
                    }
        });
		$("#sodienthoai").jqxDropDownList({ source: dataAdapter, selectedIndex: 7,displayMember: "Ten", valueMember: "Ma", width: '250', height: '25px', theme: theme });
		$('#sodienthoai').bind('select', function (event) 
		{
                    var args = event.args;
                    var item = $('#sodienthoai').jqxDropDownList('getItem', args.index);
                    if (item != null) 
					{
						sodienthoai=item.value;
                    }
        });
		$("#matkhau").jqxDropDownList({ source: dataAdapter, selectedIndex: 8,displayMember: "Ten", valueMember: "Ma", width: '250', height: '25px', theme: theme });
		$('#matkhau').bind('select', function (event) 
		{
                    var args = event.args;
                    var item = $('#matkhau').jqxDropDownList('getItem', args.index);
                    if (item != null) 
					{
						matkhau=item.value;
                    }
        });
		
		//lay gia tri cau cac combobox
		var item = $("#tendonvithem").jqxDropDownList('getSelectedItem');
		tendonvithem=item.value; 
		var item = $("#masocanbo").jqxDropDownList('getSelectedItem');
		masocanbo=item.value;
		var item = $("#tencanbo").jqxDropDownList('getSelectedItem');
		tencanbo=item.value;
		var item = $("#gioitinh").jqxDropDownList('getSelectedItem');
		gioitinh=item.value;
		var item = $("#ngaysinh").jqxDropDownList('getSelectedItem');
		ngaysinh=item.value;
		var item = $("#email").jqxDropDownList('getSelectedItem');
		email=item.value;
		var item = $("#diachi").jqxDropDownList('getSelectedItem');
		diachi=item.value;
		var item = $("#sodienthoai").jqxDropDownList('getSelectedItem');
		sodienthoai=item.value;
		var item = $("#matkhau").jqxDropDownList('getSelectedItem');
		matkhau=item.value;
		
		var data = new Array();	
		function checkEmail(n)
		{
			return n.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/)!=-1?!0:!1
	
		}
		$('#showWindowButton').jqxButton({ theme: theme, width: '150px', height: '25px' });
		$("#save").jqxButton({ theme: theme, width: '150px', height: '25px' });
		
		function loaddata()
		{
				   	var params ="";
				    http.open("POST",'get_list_temp.php', false);
					http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					http.onreadystatechange = function() 
					{
						if(http.readyState == 4 && http.status == 200) 
						{											
							var x=http.responseXML.getElementsByTagName('row');
							for(var j=0;j<x.length;j++)
							{
								var row = {};
								
								var tendonvi = x[j].getElementsByTagName('column')[parseInt(tendonvithem)-1].firstChild.nodeValue;	
								//kiem tra xem co phai la so nguyen hay khong
								var reg = /^\d+$/;
								if(reg.test(tendonvi))
								{
														http=GetXmlHttpObject();
														var params = "madonvisua="+tendonvi;
														http.open("POST", 'get_info_donvi.php', false);
														http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
														http.onreadystatechange = function()
														{
															if(http.readyState == 4 && http.status == 200) 
															{
																var result=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
																row["TenDV"] = result;

															}
														}
														http.send(params);				
								}	
								
								row["MSCB"] = x[j].getElementsByTagName('column')[parseInt(masocanbo)-1].firstChild.nodeValue;
								row["TenCB"] = x[j].getElementsByTagName('column')[parseInt(tencanbo)-1].firstChild.nodeValue;
								
								var gt = x[j].getElementsByTagName('column')[parseInt(gioitinh)-1].firstChild.nodeValue;
								if(reg.test(gt))
								{
										if(parseInt(gt)==1)
										{
											row["GioiTinh"]= 'Nam';
										}
										else
										{
											row["GioiTinh"] = 'Nữ';
										}			
								}	
								
								var ngaythang = x[j].getElementsByTagName('column')[parseInt(ngaysinh)-1].firstChild.nodeValue;
								var ngay =parseInt(ngaythang.substring(0,2));
								var thang =parseInt(ngaythang.substring(3,5));
								var nam =parseInt(ngaythang.substring(6));
								var date = new Date();
								date.setFullYear(nam,thang,ngay);
								date.setHours(0, 0, 0, 0);
								row["NgaySinh"] = date;
								
								row["Email"] = x[j].getElementsByTagName('column')[parseInt(email)-1].firstChild.nodeValue;
								row["DiaChi"] = x[j].getElementsByTagName('column')[parseInt(diachi)-1].firstChild.nodeValue;
								row["SDT"] = x[j].getElementsByTagName('column')[parseInt(sodienthoai)-1].firstChild.nodeValue;
								row["MatKhau"] = x[j].getElementsByTagName('column')[parseInt(matkhau)-1].firstChild.nodeValue;
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
								width: 1250,
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
									  { text: 'Tên đơn vị',columntype: 'dropdownlist',editable: true,datafield: 'TenDV', width: 150, cellsalign: 'left' },
									  { text: 'Mã cán bộ',editable: true,datafield: 'MSCB', width: 100, cellsalign: 'left' },
									  { text: 'Tên cán bộ',editable: true,datafield: 'TenCB', width: 200, cellsalign: 'left' },
									  { text: 'Giới tính',columntype: 'dropdownlist',editable: true,datafield: 'GioiTinh', width: 60 },
									  { text: 'Ngày sinh',editable: true, datafield: 'NgaySinh', columntype: 'datetimeinput', width: 90, cellsalign: 'right',cellsformat: 'd',
									  		validation: function (cell, value) 
											{
												  var year = value.getFullYear();
												  if (year > 2012) {
													  return { result: false, message: "Ngày sinh muộn vậy sao." };
												  }
												  return true;
											 }
									  },
									  { text: 'Email',editable: true, datafield: 'Email', width: 200 ,
									  		validation: function (cell, value) 
											{
												 if(!(checkEmail(value)))
												 {
													 return { result: false, message: "Địa chỉ Email không hợp lệ." };
												 }
												 return true;
											 }
									  },
									  { text: 'Địa chỉ',editable: true, datafield: 'DiaChi', width: 200 },
									  { text: 'Số điện thoại',editable: true, datafield: 'SDT', width: 100 },
									  { text: 'Mật khẩu',editable: true, datafield: 'MatKhau', width: 100 },
									  
								  ]
							});
						}
					}
					
					http.send(params);
		}
        $('#showWindowButton').mousedown(function () 
		{
					loaddata();
      	});
		  
        $("#save").click(function () 
		{
					var rowscount = $("#jqxgrid").jqxGrid('getdatainformation').rowscount;
					for(var i=0;i < rowscount;i++) 
					{
						   var tendv = $('#jqxgrid').jqxGrid('getcellvalue', i, "TenDV");
						   var ms = $('#jqxgrid').jqxGrid('getcellvalue', i, "MSCB");
						   var tencb = $('#jqxgrid').jqxGrid('getcellvalue', i, "TenCB");
						   var gt = $('#jqxgrid').jqxGrid('getcellvalue', i, "GioiTinh");
						   var ns = $('#jqxgrid').jqxGrid('getcellvalue', i, "NgaySinh");
						   var mail = $('#jqxgrid').jqxGrid('getcellvalue', i, "Email");
						   var dc = $('#jqxgrid').jqxGrid('getcellvalue', i, "DiaChi");
						   var sdt = $('#jqxgrid').jqxGrid('getcellvalue', i, "SDT");
						   var mk = $('#jqxgrid').jqxGrid('getcellvalue', i, "MatKhau");
								
							{
								http=GetXmlHttpObject();
								var params = "insert=true&TenDV=" +tendv + "&MSCB=" + ms + "&TenCB=" + tencb+ "&GioiTinh=" + gt+ "&NgaySinh=" +ns+ "&Email=" + mail+ "&DiaChi=" + dc+ "&SDT=" +sdt+ "&MatKhau=" +mk;
														
								http.open("POST", 'data_import.php', false);
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