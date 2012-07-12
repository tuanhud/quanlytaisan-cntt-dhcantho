function taobangdanhsachnguoidung ()
{
	 		var data = {};
			var data2 = {};
			var theme = '';
			var result ='';
			
		
		var data = new Array();	
		function checkEmail(n)
		{
			return n.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/)!=-1?!0:!1
	
		}
		$('#delete').jqxButton({ theme: theme, width: '150px', height: '25px' });
		$("#save").jqxButton({ theme: theme, width: '150px', height: '25px' });
		
		var dropDownListSource =
            {
                datatype: "json",
                datafields: [
                    { name: 'MSDV' },
					{ name: 'TenDV'}
                ],
                id: 'Ma',
                url: "get_list_donvi3.php",
            };

            var dropdownListAdapter = new $.jqx.dataAdapter(dropDownListSource, { autoBind: true, async: false });
		
					var params ="";
					http=GetXmlHttpObject();
				    http.open("POST",'get_list_canbo2.php', false);
					http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					http.onreadystatechange = function() 
					{
						if(http.readyState == 4 && http.status == 200) 
						{											
							var x=http.responseXML.getElementsByTagName('row');
							for(var j=0;j<x.length;j++)
							{
								var row = {};
								var tendonvi = x[j].getElementsByTagName('column')[1].firstChild.nodeValue;
								{
														http=GetXmlHttpObject();
														var params = "madonvisua="+tendonvi;
														http.open("POST", 'get_info_donvi.php', false);
														http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
														http.onreadystatechange = function()
														{
															if(http.readyState == 4 && http.status == 200) 
															{
																row["TenDV"]=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
															}
														}
														http.send(params);				
								}		
								row["MSCB"] = x[j].getElementsByTagName('column')[0].firstChild.nodeValue;
								row["TenCB"] = x[j].getElementsByTagName('column')[2].firstChild.nodeValue;
								row["GioiTinh"]= x[j].getElementsByTagName('column')[3].firstChild.nodeValue;
								var ngay = x[j].getElementsByTagName('column')[4].firstChild.nodeValue;
								var thang = x[j].getElementsByTagName('column')[5].firstChild.nodeValue;
								var nam = x[j].getElementsByTagName('column')[6].firstChild.nodeValue;
								var date = new Date();
								date.setFullYear(nam,thang,ngay);
								date.setHours(0, 0, 0, 0);
								row["NgaySinh"] = date;
								row["Email"] = x[j].getElementsByTagName('column')[7].firstChild.nodeValue;
								row["DiaChi"] = x[j].getElementsByTagName('column')[8].firstChild.nodeValue;
								row["SDT"] = x[j].getElementsByTagName('column')[9].firstChild.nodeValue;
								row["MatKhau"] = x[j].getElementsByTagName('column')[10].firstChild.nodeValue;
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
								width: 1200,
								selectionmode: 'singlerow',
								source: dataAdapter,
								theme: theme,
								editable: true,
								autoheight: true,
								pageable: true,
								columns: [
									  { text: 'Tên đơn vị',columntype: 'dropdownlist',editable: true,datafield: 'TenDV', width: 150, cellsalign: 'left',initeditor: function (row, cellvalue, editor) {
                          editor.jqxDropDownList({displayMember: 'TenDV',valueMember: 'MSDV', source: dropdownListAdapter})
									   }
						   },
									  { text: 'Mã cán bộ',editable: true,datafield: 'MSCB', width: 100, cellsalign: 'left' },
									  { text: 'Tên cán bộ',editable: true,datafield: 'TenCB', width: 200, cellsalign: 'left' },
									  { text: 'Giới tính',columntype: 'dropdownlist',editable: true,datafield: 'GioiTinh', width: 60 },
									  { text: 'Ngày sinh',editable: true, datafield: 'NgaySinh', columntype: 'datetimeinput', width: 90, cellsalign: 'right',cellsformat: 'd', },
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
						   
						   var ngay = ns.getDate();
						   var thang =ns.getMonth();
						   var nam =ns.getFullYear();
						   var mail = $('#jqxgrid').jqxGrid('getcellvalue', i, "Email");
						   var dc = $('#jqxgrid').jqxGrid('getcellvalue', i, "DiaChi");
						   var sdt = $('#jqxgrid').jqxGrid('getcellvalue', i, "SDT");
						   var mk = $('#jqxgrid').jqxGrid('getcellvalue', i, "MatKhau");
								
							{
								http=GetXmlHttpObject();
								var params = "insert=true&TenDV=" +tendv + "&MSCB=" + ms + "&TenCB=" + tencb+ "&GioiTinh=" + gt+ "&NgaySinh=" +ngay+"&ThangSinh="+ thang+"&NamSinh="+nam+ "&Email=" + mail+ "&DiaChi=" + dc+ "&SDT=" +sdt+ "&MatKhau=" +mk;				
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
					alert("Thành công.");
					
					
			
        });
        $(document).ready(function () {
            var theme = $.data(document.body, 'theme', theme);
            if (theme == undefined) theme = '';
            $("#jqxWidget").css('visibility', 'visible');
        });
				
}
