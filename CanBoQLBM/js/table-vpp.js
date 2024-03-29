function taobangvpp ()
{
	 		var data = {};
			var theme = '';
            var source =
            {
                 datatype: "json",
                 datafields: 
				 [
				 	{ name: 'id' },
                    { name: 'ten' },
                    { name: 'dvt' },
                    { name: 'nsx' },
					{ name: 'soluong',type: 'int'},
                    { name: 'dongia',type: 'float' },
					{ name: 'tong',type: 'float' },
                ],
				id: 'id',    
				root: 'Rows',
				beforeprocessing: function(data)
				{		
					source.totalrecords = data[0].TotalRows;
				},				
            
				
            };
			
 		    var dataadapter = new $.jqx.dataAdapter(source);
           // initialize jqxGrid
            $("#jqxgrid").jqxGrid(
            {
                width: 690,
				selectionmode: 'singlecell',
				altrows: true,
                source: dataadapter,
                theme: theme,
				editable: true,
				autoheight: true,
				pageable: true,
                columnsresize: true,
                columns: [
					  { text: 'Mã VPP', editable: false, datafield: 'id', width: 60, cellsalign: 'left' },
					  { text: 'Tên văn phòng phẩm', editable: false, datafield: 'ten', width: 150, cellsalign: 'left' },
                      { text: 'ĐVT', editable: false, datafield: 'dvt', width: 50, cellsalign: 'left' },
                      { text: 'Nhà sản xuất',columntype: 'dropdownlist',editable: false, datafield: 'nsx', width: 120 },
					  { text: 'Số Lượng', datafield: 'soluong',editable: true,cellsalign: 'right',columntype: 'numberinput', width: 70, 
						  validation: function (cell, value) {
							  if(value > 0)
							  return true;
							  else
							  return { result: false, message: "Số lượng phải lớn hơn không!" };
                      	},
						initeditor: function (row, cellvalue, editor) {
                          editor.jqxNumberInput({ decimalDigits: 0});
                      	}
					  },
					  { text: 'Đơn giá (VNĐ)',editable: false,cellsformat: 'f', datafield: 'dongia', width: 100 },
					  { text: 'Thành tiền (VNĐ)',editable: false,cellsformat: 'f', datafield: 'tong', width: 140 },
                  ]
            });
			
			//chon 1 dong
			 $("#jqxgrid").jqxGrid('selectionmode', 'singlerow');
	        // delete row.
          $("#deleterowbutton").bind('click', function () 
			{
				var selectedrowindex = $("#jqxgrid").jqxGrid('getselectedrowindex');
                var rowscount = $("#jqxgrid").jqxGrid('getdatainformation').rowscount;
                if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
                    var id = $("#jqxgrid").jqxGrid('getrowid', selectedrowindex);
                    $("#jqxgrid").jqxGrid('deleterow', id);
					$('#jqxgrid2').jqxGrid('refreshdata');
					//tinh gia tri tong thanh tien
					var rowscount3 = $("#jqxgrid").jqxGrid('getdatainformation').rowscount;
					var tongtien=0;
					for(var k=0; k < rowscount3;k++) 
						{ 
						var tien = $('#jqxgrid').jqxGrid('getcellvalue', k, "tong");
						tongtien=tongtien+tien;						   
						}
					$("#tongtien").html(tongtien);
					}
				
				else{
					alert("Bạn chưa chọn chi tiết VPP!");
					}	
            });
           $("#jqxgrid").bind('cellvaluechanged', function (event) {
			   //gan gia tri cho cot thanh tien
					var rowscount2 = $("#jqxgrid").jqxGrid('getdatainformation').rowscount;
					for(var j=0; j < rowscount2;j++) 
						{ 
							var tien=0
						   var sl = $('#jqxgrid').jqxGrid('getcellvalue', j, "soluong");
						   var dg = $('#jqxgrid').jqxGrid('getcellvalue', j, "dongia");
						   tien=sl*dg;
						   $("#jqxgrid").jqxGrid('setcellvalue', j, "tong", tien);
						   
						}
					//tinh gia tri tong thanh tien
					var rowscount3 = $("#jqxgrid").jqxGrid('getdatainformation').rowscount;
					var tongtien=0;
					for(var k=0; k < rowscount3;k++) 
						{ 
						var tien = $('#jqxgrid').jqxGrid('getcellvalue', k, "tong");
						tongtien=tongtien+tien;						   
						}
					$("#tongtien").html(tongtien);
			});
			
			
			
	function capitaliseFirstLetter(string) 
		{
            return string.charAt(0).toUpperCase() + string.slice(1);
        }
		function createElements(theme)
		{
            $('#cancel').jqxButton({ theme: theme, height: '25px', width: '65px' });
            $('#eventWindow').jqxWindow({ maxHeight: 600, maxWidth:800, minHeight: 30, minWidth: 250, height: 600, width: 800,
                theme: theme, resizable: false, isModal: true, modalOpacity: 0.3,
                okButton: $('#save'), cancelButton: $('#cancel')
            });
        }
        function addEventListeners() 
		{
            $('#showWindowButton').mousedown(function () 
			{
				createElements(theme);
                $('#eventWindow').jqxWindow('show');
            });
        }  
        $(document).ready(function () {
            var theme = $.data(document.body, 'theme', theme);
            if (theme == undefined) theme = '';
            addEventListeners();
            $("#jqxWidget").css('visibility', 'visible');
        });
		// them vao csdl
		$("#btn_lap").unbind("click").click(function()
		{
			var rowcount4 = $("#jqxgrid").jqxGrid('getdatainformation').rowscount;
			if($("#cbo_namthem").val()=="-Chọn năm-"){
				alert("Bạn chưa chọn năm!");
			}
			else if($("#cbo_quythem").val()=="-Chọn quý-"){
				alert("Bạn chưa chọn quý!");
			}
			else if(rowcount4==0){
				alert("Bạn chưa chọn VPP cho phiếu!");
			}
			else{			        // synchronize with the server - send update command
				var data1="nam=" +$("#cbo_namthem").val() + "&quy=" + $("#cbo_quythem").val();
				$.ajax
					({
						dataType: 'json',
						url: 'data_phieudutruvpp2.php',
						data: data1,
						success: function (data, status, xhr)
						{}
				});	
					
				for(var m=0;m<rowcount4;m++){
						var id = $('#jqxgrid').jqxGrid('getcellvalue', m,'id');
					var soluong = $('#jqxgrid').jqxGrid('getcellvalue', m,'soluong');
					var gia = $('#jqxgrid').jqxGrid('getcellvalue', m,'dongia');
						var data = "id=" + id + "&soluong=" + soluong+ "&dongia=" + gia;
					$.ajax
					({
						dataType: 'json',
						url: 'data_phieudutruvpp.php',
						data: data,
						success: function (data, status, xhr)
						{
						}
					});		
                }
				alert("Lập phiếu dự trù thành công!");
				window.location.reload(true);		
			}
		});
		$("#btn_xoa").unbind("click").click(function()
		{
			if($("#cbo_maphieuhuy").val()==-1){
				alert("Bạn chưa chọn mã phiếu dự trù!");
			}
			else{
				var dataxoa="maphieu=" +$("#cbo_maphieuhuy").val();
				$.ajax
					({
						dataType: 'json',
						url: 'xoaphieudutru.php',
						data: dataxoa,
						success: function (data, status, xhr)
						{}
				});	
					
			}
			alert("Xóa phiếu dự trù thành công!");
			fillcombo2('get_list_nam.php',document.frm_huyphieudutruvpp.cbo_namhuy);
	fillcombo2('get_list_quy.php',document.frm_huyphieudutruvpp.cbo_quyhuy);
	fillcombo2bien('get_list_maphieudutruvpp.php',document.frm_huyphieudutruvpp.cbo_namhuy,document.frm_huyphieudutruvpp.cbo_quyhuy, document.frm_huyphieudutruvpp.cbo_maphieuhuy);
		});
}