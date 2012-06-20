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
function taobangsua()
{
	 		var data = {};
			var theme = '';
			var manoidung='';
			var tennoidung='';
			var ghichunoidung='';
            var source =
            {
                 datatype: "json",
                 datafields: 
				 [
				 	//{ name: 'stt' },
                    { name: 'mand' },
                    { name: 'tennd' },
                    { name: 'ghichu' },
                ],				
				id: 'mand',    
				root: 'Rows',
				//url: url,
				beforeprocessing: function(data)
				{		
					source.totalrecords = data[0].TotalRows;
				},						
            };
			
 		    var dataadapter = new $.jqx.dataAdapter(source);
           // initialize jqxGrid
            $("#jqthem").jqxGrid(
            {
                width: 550,
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
					  { text: 'Mã nội dung', editable: false, datafield: 'mand', width: 150, cellsalign: 'center' },
					  { text: 'Tên nội dung', editable: false, datafield: 'tennd', width: 150, cellsalign: 'center' },
                      { text: 'Ghi chú', editable: false, datafield: 'ghichu', width: 250, cellsalign: 'center' },
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
				}
				else{
					alert("Bạn chưa chọn nội dung cần xóa!");
					}	
					
            });		
			
	function capitaliseFirstLetter(string) 
		{
            return string.charAt(0).toUpperCase() + string.slice(1);
        }
		
//tao popup hiện thị data trong bang noidung de chọn *******************************************************************************************
		function createElements(theme)
		{
            $('#cancel').jqxButton({ theme: theme, height: '25px', width: '65px' });
            $('#eventWindow').jqxWindow({ maxHeight: 400, maxWidth:400, minHeight: 30, minWidth: 150, height: 300, width: 400,
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
							//{ name: 'stt' },
                    		{ name: 'mand' },
                  			{ name: 'tennd' },
                    		{ name: 'ghichu' },
						],
						id: 'mand',
						url: 'get_info_noidung_phieumau.php',             
					};
					var dataAdapter3 = new $.jqx.dataAdapter(source2);
					$("#jqxWidget3").jqxGrid(
					{
						width: 350,
						selectionmode: 'singlerow',
						source: dataAdapter3,
						theme: theme,
						editable: true,
						autoheight: true, 
						columns: [
					 			{ text: 'Mã nội dung', editable: false, datafield: 'mand', width: 100, cellsalign: 'center' },
							 	{ text: 'Tên nội dung', editable: false, datafield: 'tennd', width: 100, cellsalign: 'center' },
                     			{ text: 'Ghi chú', editable: false, datafield: 'ghichu', width: 180, cellsalign: 'center' },
						  ]
					});
            });
        } 
// Select 1 dong tren popup roi đổ qua bảng lớn*************************************************************************************************
 		$('#jqxWidget3').bind('rowclick', function (event) 
		{
			var args = event.args;
			var row = args.rowindex;
			var data = $('#jqxWidget3').jqxGrid('getrowdata',row);
			manoidung = $('#jqxWidget3').jqxGrid('getcellvalue', row, "mand");
			var i = 0,them=1;
	      	var rowscount = $("#jqthem").jqxGrid('getdatainformation').rowscount;
			for(i;i < rowscount;i++) 
			{
				   var manoidung2 = $('#jqthem').jqxGrid('getcellvalue', i, "mand");
				   if(manoidung2==manoidung)
				   {
						them=0;
				   }
            }
// add vao bang co lớn (Không phải popup)*******************************************************************************************************
			if(them==1)
			{
				$('#jqthem').jqxGrid('addrow',null, data);
			}
			else{alert('Đã tồn tại tên nội dung này!!!.');}
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
		$("#btn_themphieumau").unbind("click").click(function()
		{
			var rowcount4 = $("#jqthem").jqxGrid('getdatainformation').rowscount;
			 if($("#txt_tenphieumau").val()=="") {
					alert("Bạn chưa nhập tên phiếu mẫu!"),
					FocusAndSelect("#txt_tenphieumau");
			}else if($("#cbo_ngay").val()==-1) {
					alert("Bạn chưa nhập ngày!"),
					FocusAndSelect("#cbo_ngay");
			}else if($("#cbo_thang").val()==-1) {
					alert("Bạn chưa nhập tháng!"),
					FocusAndSelect("#cbo_thang");
			}else if($("#cbo_nam").val()==-1) {
					alert("Bạn chưa nhập năm!"),
					FocusAndSelect("#cbo_nam");
			}
			else if(check_date_ngaysinh($("#cbo_ngay option:selected").val(),$("#cbo_thang option:selected").val(),$("#cbo_nam option:selected").val())){
					alert("Ngày tháng năm không hợp lệ.");FocusAndSelect("#cbo_ngay");
			}
			 else if(rowcount4==0){
					alert("Bạn chưa chọn nội dung cho phiếu mẫu!");
			}else{			        // synchronize with the server - send update command
				var data1="&tenphieumau=" +$("#txt_tenphieumau").val() + "&ngay=" + $("#cbo_ngay").val()+ "&thang=" + $("#cbo_thang").val() + "&nam="+ $("#cbo_nam").val() + "&ghichu="+$("#txt_ghichu").val();
				$.ajax
					({
						dataType: 'json',
						url: 'themphieumau.php',//them phiếu mẫu mới vào bảng phiếu mẫu
						data: data1,
						success: function (data, status, xhr)
						{}
				});	
					
				for(var m=0;m<rowcount4;m++){
						var mand = $('#jqthem').jqxGrid('getcellvalue', m,'mand');
						var data = "insert=true&mand=" + mand ;
					$.ajax
					({
						dataType: 'json',
						url: 'them_noidung.php',//them nội dung vào bảng thuocphieumau
						data: data,
						success: function (data, status, xhr)
						{
						}
					});		
                }
				alert("Lập phiếu mẫu thành công!");
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