function taobangtaisan ()
{
	 		var data = {};
			var theme = '';
		  //bat su kien chon don vi de lay ten don vi
        function addEventListeners() 
		{
            $('#showWindowButton').mousedown(function () 
			{
					var tendonvithem = document.importcanbo.tendonvithem.value;
					var masocanbo =document.importcanbo.masocanbo.value;
					var tencanbo =document.importcanbo.tencanbo.value;
					var gioitinh = document.importcanbo.gioitinh.value;
					var ngaysinh =document.importcanbo.ngaysinh.value;
					var email =document.importcanbo.email.value;
					var diachi = document.importcanbo.diachi.value;
					var sodienthoai =document.importcanbo.sodienthoai.value;
					var matkhau =document.importcanbo.matkhau.value;
					var data = "tendonvithem=" + tendonvithem + "&masocanbo=" + masocanbo + "&tencanbo=" + tencanbo + "&gioitinh=" + gioitinh + "&ngaysinh=" + ngaysinh+ "&email=" + email + "&diachi=" +diachi+ "&sodienthoai=" + sodienthoai + "&matkhau=" + matkhau; 
					$.ajax
					({
						dataType: 'json',
						url: 'data_import.php',
						data: data,
						success: function (data, status, xhr) 
						{}
					})
					
					
					var source =
					{
						 datatype: "json",
						 datafields: 
						 [
						 	{ name: 'TenDV'},
							 { name: 'MSCB'},
							 { name: 'TenCB'},
							 { name: 'GioiTinh'},
							 { name: 'NgaySinh'},
							 { name: 'Email'},
							 { name: 'DiaChi'},
							 { name: 'SDT'},
							 { name: 'MatKhau'}
							 
						],
						id:'MSCB',
						url: 'data_import.php',   
					};
					var dataadapter = new $.jqx.dataAdapter(source);
				   // initialize jqxGrid
					$("#jqxgrid").jqxGrid(
					{
						width: 900,
						selectionmode: 'singlecell',
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
							  { text: 'Tên đơn vị', editable: false, datafield: 'TenDV', width: 70, cellsalign: 'left' },
							  { text: 'Mã cán bộ', editable: false, datafield: 'MSCB', width: 150, cellsalign: 'left' },
							  { text: 'Tên cán bộ', editable: false, datafield: 'TenCB', width: 80, cellsalign: 'left' },
							  { text: 'Giới tính',editable: false, datafield: 'GioiTinh', width: 180 },
							  { text: 'Ngày sinh', datafield: 'NgaySinh', width: 80 },
							  { text: 'Email', datafield: 'Email', width: 80 },
							  { text: 'Địa chỉ', datafield: 'DiaChi', width: 80 },
							  { text: 'Số điện thoại', datafield: 'SDT', width: 80 },
							  { text: 'Mật khẩu', datafield: 'MatKhau', width: 80 },
							  
						  ]
					});

            });
        }
      
		  
        /* $("#save").click(function () 
		{
             
					var msdv = $("#jqxWidget2").jqxDropDownList('getSelectedItem').value;
					var mataisan = $("#jqxWidget3").jqxDropDownList('getSelectedItem').value;
					var soluong = $("#numericInput").jqxNumberInput('val');
					var dongia = $("#currencyInput").jqxNumberInput('val');
                    var row = 
					{ MSDV:msdv, MaTaiSan:mataisan, SoLuongCuaDonVi:soluong,DonGiaTS: dongia,TenDV:tendonvi, TenTaiSan:tentaisan  };
					$("#jqxgrid").jqxGrid('addrow', mataisan, row);
					var data = "insert=true&MSDV=" +msdv + "&MaTaiSan=" + mataisan + "&SoLuongCuaDonVi=" + soluong+ "&DonGiaTS=" + dongia; 
					$.ajax
					({
						dataType: 'json',
						url: 'themtaisanthuocdonvi.php',
						data: data,
						success: function (data, status, xhr) 
						{
							alert('Thành công.');
						}
					})
        });*/
        $(document).ready(function () {
            var theme = $.data(document.body, 'theme', theme);
            if (theme == undefined) theme = '';
            addEventListeners();
            $("#jqxWidget").css('visibility', 'visible');
        });
				

}