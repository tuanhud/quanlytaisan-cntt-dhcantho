
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
			var ma='';
			//var data = {};
			ma = $("#cbo_tenphieumausua").val();
			var theme = '';
			var params= "maphieu=" + ma;
			http=GetXmlHttpObject();
			http.open("POST",'get_info_noidungsua.php', false);
			http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			http.onreadystatechange = function()
			{
				if(http.readyState == 4 && http.status == 200) 
				{
					var x=http.responseXML.getElementsByTagName('INFO');
					for(var i=0;i<x.length;i++)//lay duoc danh sach cac quyen ma can bo (macanbo) co
					{
						var row = {};
					//	alert(x[i].getElementsByTagName('RESULT2')[1].firstChild.nodeValue);
						//row["stt"] = i + 1;
						row["mandsua"] = x[i].getElementsByTagName('RESULT')[0].firstChild.nodeValue;
						row["tenndsua"] = x[i].getElementsByTagName('RESULT')[1].firstChild.nodeValue;
						row["ghichusua"] = x[i].getElementsByTagName('RESULT')[2].firstChild.nodeValue;
						//row["tenndcon"] = x[i].getElementsByTagName('RESULT')[0].firstChild.nodeValue;						
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
           /* var source =
            {
                 datatype: "json",
                 datafields: 
				 [
				 	//{ name: 'stt' },
                    { name: 'mandsua' },
                    { name: 'tenndsua' },
                    { name: 'ghichusua' },
                ],				
				id: 'mandsua',    
				root: 'Rows',
				//url: url,
				beforeprocessing: function(data)
				{		
					source.totalrecords = data[0].TotalRows;
				},						
            };*/
			
 		    var dataadapter = new $.jqx.dataAdapter(source);
           // initialize jqxGrid
            $("#jqsua").jqxGrid(
            {
                width: 550,
                source: dataadapter,
				editable: true,
                theme: theme,
				autoheight: true,
				pageable: true,
                columnsresize: true,
                columns: [
					  { text: 'Mã nội dung', editable: false, datafield: 'mandsua', width: 150, cellsalign: 'center' },
					  { text: 'Tên nội dung', editable: false, datafield: 'tenndsua', width: 150, cellsalign: 'center' },
                      { text: 'Ghi chú', editable: false, datafield: 'ghichusua', width: 250, cellsalign: 'center' },
                  ]
            });
			//chon 1 dong
			$("#jqsua").jqxGrid('selectionmode', 'singlerow');
			$('#jqsua').bind('rowselect', function (event) 
			{
				var args = event.args;
				var row = args.rowindex;
				manoidung = $('#jqsua').jqxGrid('getcellvalue', row, "mandsua");
			});
// delete row.***************************************************************************************************************************
          $("#deleterowbutton2").bind('click', function () 
			{
				var data = "delete=true&MaPhieu=" +ma +"&MaND=" + manoidung; 
				$.ajax
				({
					dataType: 'json',
					url: 'delete_noidungphieumau.php',
					data: data,
					success: function (data, status, xhr) {}		
				})
				var selectedrowindex = $("#jqsua").jqxGrid('getselectedrowindex');
                var rowscount = $("#jqsua").jqxGrid('getdatainformation').rowscount;
                if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
                    var id = $("#jqsua").jqxGrid('getrowid', selectedrowindex);
                    $("#jqsua").jqxGrid('deleterow', id);
				}
				else{
					alert("Bạn chưa chọn nội dung cần xóa!");
					}	
					
            });		
			
	function capitaliseFirstLetter2(string) 
		{
            return string.charAt(0).toUpperCase() + string.slice(1);
        }
		
//tao popup hiện thị data trong bang noidung de chọn *******************************************************************************************
		function createElements2(theme)
		{
            $('#cancel2').jqxButton({ theme: theme, height: '25px', width: '65px' });
            $('#eventWindow2').jqxWindow({ maxHeight: 400, maxWidth:400, minHeight: 30, minWidth: 150, height: 300, width: 400,
                theme: theme, resizable: false,  modalOpacity: 0.3,
                okButton: $('#save2'), cancelButton: $('#cancel2')
            });
        }
        function addEventListeners2() 
		{
            $('#showWindowButton2').mousedown(function () 
			{
				createElements2(theme);
                $('#eventWindow2').jqxWindow('show');
// lấy dữ liệu tử bang noidung đưa lên bảng trong popup  ***************************************************************************************
				var source2 =
					{
						datatype: "json",
						datafields: 
						[
							//{ name: 'stt' },
                    		{ name: 'mandsua' },
                  			{ name: 'tenndsua' },
                    		{ name: 'ghichusua' },
						],
						id: 'mandsua',
						url: 'get_info_noidung_phieumau.php',             
					};
					var dataAdapter3 = new $.jqx.dataAdapter(source2);
					$("#jqxWidget2").jqxGrid(
					{
						width: 350,
						selectionmode: 'singlerow',
						source: dataAdapter3,
						theme: theme,
						editable: true,
						autoheight: true, 
						columns: [
					 			{ text: 'Mã nội dung', editable: false, datafield: 'mandsua', width: 100, cellsalign: 'center' },
							 	{ text: 'Tên nội dung', editable: false, datafield: 'tenndsua', width: 100, cellsalign: 'center' },
                     			{ text: 'Ghi chú', editable: false, datafield: 'ghichusua', width: 180, cellsalign: 'center' },
						  ]
					});
            });
        } 
// Select 1 dong tren popup roi đổ qua bảng lớn*************************************************************************************************
 		$('#jqxWidget2').bind('rowclick', function (event) 
		{
			var args = event.args;
			var row = args.rowindex;
			var data = $('#jqxWidget2').jqxGrid('getrowdata',row);
			manoidung = $('#jqxWidget2').jqxGrid('getcellvalue', row, "mandsua");
			var i = 0,them=1;
	      	var rowscount = $("#jqsua").jqxGrid('getdatainformation').rowscount;
			for(i;i < rowscount;i++) 
			{
				   var manoidung2 = $('#jqsua').jqxGrid('getcellvalue', i, "mandsua");
				   if(manoidung2==manoidung)
				   {
						them=0;
				   }
            }
// add vao bang co lớn (Không phải popup)*******************************************************************************************************
			if(them==1)
			{
				$('#jqsua').jqxGrid('addrow',null, data);
			}
			else{alert('Đã tồn tại tên nội dung này!!!.');}
		});
// Chỉnh sửa size cua 2 button thêm và xóa******************************************************************************************************
	$(document).ready(function () {
            var theme = $.data(document.body, 'theme', theme);
            if (theme == undefined) theme = '';
            addEventListeners2();
			$('#showWindowButton2').jqxButton({ theme: theme, width: '150px', height: '25px' });
			$("#deleterowbutton2").jqxButton({ theme: theme, width: '150px', height: '25px' });
            $("#jqxWidget3").css('visibility', 'visible');
        });
// su kiện khi click vao nút luu phiếu mẫu *****************************************************************************************************
		$("#btn_luuphieumau").unbind("click").click(function()
		{
			var rowcount4 = $("#jqsua").jqxGrid('getdatainformation').rowscount;
			 if($("#txt_tenphieumaumoi").val()=="") {
					alert("Bạn chưa nhập tên phiếu mẫu mới!"),
					FocusAndSelect("#txt_tenphieumaumới");
			}else if($("#cbo_ngaysua").val()==-1) {
					alert("Bạn chưa nhập ngày!"),
					FocusAndSelect("#cbo_ngaysua");
			}else if($("#cbo_thangsua").val()==-1) {
					alert("Bạn chưa nhập tháng!"),
					FocusAndSelect("#cbo_thangsua");
			}else if($("#cbo_namsua").val()==-1) {
					alert("Bạn chưa nhập năm!"),
					FocusAndSelect("#cbo_namsua");
			}
			else if(check_date_ngaysinh($("#cbo_ngaysua option:selected").val(),$("#cbo_thangsua option:selected").val(),$("#cbo_namsua option:selected").val())){
					alert("Ngày tháng năm không hợp lệ.");FocusAndSelect("#cbo_ngaysua");
			}
			 else if(rowcount4==0){
					alert("Bạn chưa chọn nội dung cho phiếu mẫu!");
			}else{			        // synchronize with the server - send update command
				var data1="&tenphieumaumoi=" +$("#txt_tenphieumaumoi").val() + "&ngay=" + $("#cbo_ngaysua").val()+ "&thang=" + $("#cbo_thangsua").val() + "&nam="+ $("#cbo_namsua").val() + "&ghichu="+$("#txt_ghichusua").val() + "&maphieu="+ma;
				$.ajax
					({
						dataType: 'json',
						url: 'suaphieumau.php',//them phiếu mẫu mới vào bảng phiếu mẫu
						data: data1,
						success: function (data, status, xhr)
						{}
				});	
					
				for(var m=0;m<rowcount4;m++){
						var mand = $('#jqsua').jqxGrid('getcellvalue', m,'mandsua');
						var data = "update=true&mand=" + mand + "&maphieu="+ma;
					$.ajax
					({
						dataType: 'json',
						url: 'sua_noidung.php',//them nội dung vào bảng thuocphieumau
						data: data,
						success: function (data, status, xhr)
						{
						}
					});		
                }
				alert("Sửa phiếu mẫu thành công!");
				window.location.reload(true);		
			}
		});
}