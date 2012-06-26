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
function taobang()
{
	 		var data = {};
			var theme = '';
			
            var source =
            {
                 datatype: "json",
                 datafields: 
				 [
				 	//{ name: 'stt' },
                    { name: 'mats' },
                    { name: 'ten' },
                    { name: 'dvt' },
                    
					{ name: 'soluong',type: 'int' },
                    { name: 'dongia',type: 'float' },
					{ name: 'tong',type: 'float' },
                ],				
				id: 'mats',    
				root: 'Rows',
				
				beforeprocessing: function(data)
				{		
					source.totalrecords = data[0].TotalRows;
				},						
            };
			
 		    var dataadapter = new $.jqx.dataAdapter(source);
           // initialize jqxGrid
            $("#jqthem").jqxGrid(
            {
                width: 640,
				selectionmode: 'singlecell',
				altrows: true,
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
					  { text: 'Mã tài sản', editable: false, datafield: 'mats', width: 130, cellsalign: 'left' },
					  { text: 'Tên tài sản', editable: false, datafield: 'ten', width: 150, cellsalign: 'left' },
                      { text: 'ĐVT', editable: false, datafield: 'dvt', width: 50, cellsalign: 'left' },
                      
					  { text: 'Số Lượng', datafield: 'soluong',cellsalign: 'right',columntype: 'numberinput',value:0, width: 70, 
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
			 $("#jqthem").jqxGrid('selectionmode', 'singlerow');
// delete row.********************************************************************************************************************************
          $("#deleterowbutton").bind('click', function () 
			{
				var selectedrowindex = $("#jqthem").jqxGrid('getselectedrowindex');
                var rowscount = $("#jqthem").jqxGrid('getdatainformation').rowscount;
                if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
                    var id = $("#jqthem").jqxGrid('getrowid', selectedrowindex);
                    $("#jqthem").jqxGrid('deleterow', id);
					$('#jqthem').jqxGrid('refreshdata');
					//tinh gia tri tong thanh tien
					var rowscount3 = $("#jqthem").jqxGrid('getdatainformation').rowscount;
					var tongtien=0;
					for(var k=0; k < rowscount3;k++) 
						{ 
						var tien = $('#jqthem').jqxGrid('getcellvalue', k, "tong");
						tongtien=tongtien+tien;						   
						}
					$("#tongtien").html(tongtien);
					}
				
				else{
					alert("Bạn chưa chọn chi tiết VPP!");
					}	
					
            });
			$("#jqthem").bind('cellvaluechanged', function (event) {
			//gan gia tri cho cot thanh tien
					var rowscount2 = $("#jqthem").jqxGrid('getdatainformation').rowscount;
					for(var j=0; j < rowscount2;j++) 
						{ 
							var tien=0
						   var sl = $('#jqthem').jqxGrid('getcellvalue', j, "soluong");
						   var dg = $('#jqthem').jqxGrid('getcellvalue', j, "dongia");
						   tien=sl*dg;
						   $("#jqthem").jqxGrid('setcellvalue', j, "tong", tien);
						   
						}
					//tinh gia tri tong thanh tien
					var rowscount3 = $("#jqthem").jqxGrid('getdatainformation').rowscount;
					var tongtien=0;
					for(var k=0; k < rowscount3;k++) 
						{ 
						var tien = $('#jqthem').jqxGrid('getcellvalue', k, "tong");
						tongtien=tongtien+tien;						   
						}
					$("#tongtien").html(tongtien);
					});
	function capitaliseFirstLetter(string) 
		{
            return string.charAt(0).toUpperCase() + string.slice(1);
        }
		
//tao popup hiện thị data trong bang noidung de chọn *******************************************************************************************
		function createElements(theme)
		{
            $('#cancel').jqxButton({ theme: theme, height: '25px', width: '65px' });
            $('#eventWindow').jqxWindow({ maxHeight: 600, maxWidth:600, minHeight: 550, minWidth: 600, height: 400, width: 500,
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
// lấy dữ liệu tử bang noidung đưa lên bảng trong popup  ***************************************************************************************
				var source2 =
					{
						datatype: "json",
						datafields: 
						[
					{ name: 'mats' },
                    { name: 'ten' },
                    { name: 'dvt' },
                   
					
                    { name: 'dongia' },
					
						],
						id: 'mats',
						url: 'get_info_kehoachmuasam.php',             
					};
					var dataAdapter3 = new $.jqx.dataAdapter(source2);
					$("#jqxWidget3").jqxGrid(
					{
						width: 550,
						selectionmode: 'singlerow',
						source: dataAdapter3,
						theme: theme,
						editable: true,
						autoheight: true, 
						columns: [
				  { text: 'Mã tài sản',editable: false, datafield: 'mats', width: 100 },
                  { text: 'Tên tài sản',editable: false, datafield: 'ten', width: 200 },
                  { text: 'Đơn vị tính',editable: false, datafield: 'dvt', width: 100},
                  
                  { text: 'Đơn giá',editable: false, datafield: 'dongia', minwidth: 200 }
						  ]
					});
            });
        } 
// Select 1 dong tren popup roi đổ qua bảng lớn*************************************************************************************************
 		/*$('#jqxWidget3').bind('rowclick', function (event) 
		{
			var args = event.args;
			var row = args.rowindex;
			var data = $('#jqxWidget3').jqxGrid('getrowdata',row);
			manoidung = $('#jqxWidget3').jqxGrid('getcellvalue', row, "mats");
			var i = 0,them=1;
	      	var rowscount = $("#jqthem").jqxGrid('getdatainformation').rowscount;
			for(i;i < rowscount;i++) 
			{
				   var manoidung2 = $('#jqthem').jqxGrid('getcellvalue', i, "mats");
				   if(manoidung2==manoidung)
				   {
						them=0;
				   }
            }*/
// add vao bang co lớn (Không phải popup)*******************************************************************************************************
			/*if(them==1)
			{
				$('#jqthem').jqxGrid('addrow',null, data);
			}
			else{alert('Đã tồn tại tên nội dung này!!!.');}
		});*/
		//tong tien
			$('#jqxWidget3').bind('rowclick', function (event) 
			{
				
  				var args = event.args;
				var row = args.rowindex;
				var data = $('#jqxWidget3').jqxGrid('getrowdata',row);
				//kiem tra trung du lieu
				var i = 0,them=1;
	      		var rowscount = $("#jqthem").jqxGrid('getdatainformation').rowscount;
				var ma1 = $('#jqxWidget3').jqxGrid('getcellvalue', row, "mats");
				for(i;i < rowscount;i++) 
				{
					   
					   var ma2 = $('#jqthem').jqxGrid('getcellvalue', i, "mats");
					   if(ma2==ma1)
					   {
							them=0;
							break;
					   }
           		 }
				if(them==1)
				{
					//var data = $('#jqthem').jqxGrid('getrowdata', row);
						
					//add vào trong bang o form
					$("#jqthem").jqxGrid('addrow',null, data);
					$('#jqxWidget3').jqxGrid('hiderow',row);
					
					}					
				else{
					alert("Tài sản này đã tồn tại!");
					}
			});
// Chỉnh sửa size cua 2 button thêm và xóa******************************************************************************************************
	$(document).ready(function () {
            var theme = $.data(document.body, 'theme', theme);
            if (theme == undefined) theme = '';
            addEventListeners();
			$('#showWindowButton').jqxButton({ theme: theme, width: '150px', height: '25px' });
			$("#deleterowbutton").jqxButton({ theme: theme, width: '150px', height: '25px' });
            $("#jqxWidget").css('visibility', 'visible');
        });
// su kiện khi click vao nút thêm phiếu mẫu *****************************************************************************************************
		$("#btn_luu").unbind("click").click(function()
		{
			var rowcount4 = $("#jqthem").jqxGrid('getdatainformation').rowscount;
			 if(rowcount4==0){
				alert("Bạn chưa chọn tài sản!");
			}
			else{			        // synchronize with the server - send update command
				var data1="";
				$.ajax
					({
						dataType: 'json',
						url: 'themyeucauthietbi.php',
						data: data1,
						success: function (data, status, xhr)
						{}
				});	
					
				for(var m=0;m<rowcount4;m++){
					var mats = $('#jqthem').jqxGrid('getcellvalue', m,'mats');
					var soluong = $('#jqthem').jqxGrid('getcellvalue', m,'soluong');
					var dongia = $('#jqthem').jqxGrid('getcellvalue', m,'dongia');
						var data = "insert=true&mats=" + mats + "&soluong=" + soluong+ "&dongia=" + dongia;
					$.ajax
					({
						dataType: 'json',
						url: 'themyeucauthietbi1.php',
						data: data,
						success: function (data, status, xhr)
						{
						}
					});		
                }
				alert("Yêu cầu thiết bị thành công!");
				window.location.reload(true);		
			}
		});
		/*$(document).ready(function () {
            var theme = $.data(document.body, 'theme', theme);
            if (theme == undefined) theme = '';
			 addEventListeners();
			$('#showWindowButton').jqxButton({ theme: theme, width: '150px', height: '25px' });
			$("#deleterowbutton").jqxButton({ theme: theme, width: '150px', height: '25px' });
            $("#jqxWidget").css('visibility', 'visible');
			
        });*/
}