// JavaScript Document
/*function taobang()
{*/
		/*
			var manoidung = frm.cbo_tennoidunglon.value;
	 		var data = {};
			var theme = '';
			http=GetXmlHttpObject();
			var params ="manoidung="+ manoidung;
			alert(manoidung);
			http.open("POST",'get_info_noidungcon.php', false);
			http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			http.onreadystatechange = function()
			{
				if(http.readyState == 4 && http.status == 200) 
				{
					var x=http.responseXML.getElementsByTagName('INFO');
					for(var i=0;i<x.length;i++)//lay duoc danh sach cac quyen ma can bo (macanbo) co
					{
						var row = {};
						alert(x[i].getElementsByTagName('RESULT2')[1].firstChild.nodeValue);
						row["stt"] = i + 1;
						row["mandlon"] = x[i].getElementsByTagName('RESULT2')[1].firstChild.nodeValue;
						row["tenndlon"] = x[i].getElementsByTagName('RESULT2')[2].firstChild.nodeValue;
						row["mandcon"] = x[i].getElementsByTagName('RESULT2')[0].firstChild.nodeValue;
						row["tenndcon"] = x[i].getElementsByTagName('RESULT')[0].firstChild.nodeValue;						
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
			
 		    var dataadapter = new $.jqx.dataAdapter(source);
            initialize jqxGrid
            $("#jqsua").jqxGrid(
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
					  { text: 'STT', datafield: 'stt', width: 60, cellsalign: 'center' },
					  { text: 'Mã nội dung lớn', datafield: 'mandlon', width: 120, cellsalign: 'center' },
					  { text: 'Tên nội dung lớn',columntype: 'dropdownlist', datafield: 'tenndlon', width: 170, cellsalign: 'center' },
					  { text: 'Mã nội dung con', datafield: 'mandcon', width: 120, cellsalign: 'center' },
					  { text: 'Tên nội dung con',columntype: 'dropdownlist', datafield: 'tenndcon', width: 170, cellsalign: 'center' },
					  
                  ]
            });
			
			$("#jqsua").jqxGrid('selectionmode', 'singlerow');
			//***************************************************
		$(document).ready(function () {
            var theme = $.data(document.body, 'theme', theme);
            if (theme == undefined) theme = '';
            //addEventListeners();
			$('#updaterowbutton').jqxButton({ theme: theme, width: '160px', height: '25px' });
			$("#deleterowbutton").jqxButton({ theme: theme, width: '160px', height: '25px' });
            $("#jqxWidget").css('visibility', 'visible');
        });
		//http.send(params);
}
function click_cbo(){
	$('form[name="frm_suanoidungcon"] select[name="cbo_tennoidunglon"]').change(function(){
		
		taobang('get_info_noidungcon.php',document.frm_suanoidungcon);		
	});
}*/
function taobang(){
			var data = {};
			var manoidunglon='';
			var manoidungcon='';
			var tennoidungcon='';
			var ma = $("#cbo_tennoidunglonsua").val();
			var theme = '';
			var params= "manoidung=" + ma;
			http=GetXmlHttpObject();
			http.open("POST",'get_info_noidungcon.php', false);
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
						row["stt"] = i + 1;
						row["mandlon"] = x[i].getElementsByTagName('RESULT2')[1].firstChild.nodeValue;
						row["tenndlon"] = x[i].getElementsByTagName('RESULT2')[2].firstChild.nodeValue;
						row["mandcon"] = x[i].getElementsByTagName('RESULT2')[0].firstChild.nodeValue;
						row["tenndcon"] = x[i].getElementsByTagName('RESULT')[0].firstChild.nodeValue;						
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
 		    var dataAdapter = new $.jqx.dataAdapter(source);
//****************************************************************************************************************************
			var dropDownListSource =
            {
                datatype: "json",
                datafields: [
                    { name: 'MaND' },
					{ name: 'TenND'}
                ],
                id: 'MaND',
                url: "get_list_datanoidungcon.php",
            };

            var dropdownListAdapter = new $.jqx.dataAdapter(dropDownListSource, { autoBind: true, async: false });
            
//*****************************************************************************************************************************
            $("#jqsua").jqxGrid(
            {
                width: 640,
                source: dataAdapter,
				editable: true,
                theme: theme,
                columnsresize: true,
				selectionmode: 'singlecell',
                columns: [
					  { text: 'STT',editable: false, datafield: 'stt', width: 60, cellsalign: 'center' },
					  { text: 'Mã nội dung lớn',editable: false, datafield: 'mandlon', width: 120, cellsalign: 'center' },
					  { text: 'Tên nội dung lớn',editable: false, datafield: 'tenndlon', width: 170, cellsalign: 'center' },
					  { text: 'Mã nội dung con',editable: false, datafield: 'mandcon', width: 120, cellsalign: 'center' },
					  { text: 'Tên nội dung con',editable: true,columntype: 'dropdownlist', datafield: 'tenndcon', width: 170, cellsalign: 'center',
					  initeditor: function (row, cellvalue, editor) {
                          editor.jqxDropDownList({displayMember: 'TenND', source: dropdownListAdapter});
                     	 }
					   }	  
                  ]
            });
			$('#jqsua').jqxGrid({ autoheight: true}); 
			//$("#jqsua").jqxGrid('selectionmode', 'singlecell');
			$(document).ready(function (){
            var theme = $.data(document.body, 'theme', theme);
            if (theme == undefined) theme = '';
            //addEventListeners();
			$('#updaterowbutton').jqxButton({ theme: theme, width: '160px', height: '25px' });
			$("#deleterowbutton").jqxButton({ theme: theme, width: '160px', height: '25px' });
            $("#jqxWidget").css('visibility', 'visible');
        });
			$("#jqsua").jqxGrid('selectionmode', 'singlerow');
//*************************************************************************************************************************
			$('#jqsua').bind('rowselect', function (event) 
			{
				var args = event.args;
				var row = args.rowindex;
				manoidunglon = $('#jqsua').jqxGrid('getcellvalue', row, "mandlon");
				manoidungcon = $('#jqsua').jqxGrid('getcellvalue', row, "mandcon");
				tennoidungcon = $('#jqsua').jqxGrid('getcellvalue', row, "tenndcon");
			});
// delete row.**************************************************************************************************************
          $("#deleterowbutton").bind('click', function () 
			{
			if (confirm('Ban có chắc chắn muốn xóa không ?' ))
			{
				var data = "delete=true&manoidunglon=" +manoidunglon +"&manoidungcon=" + manoidungcon; 
				$.ajax
				({
					dataType: 'json',
					url: 'delete_noidungcon.php',
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
				}
					
            });	
//Cap nhật lại nội dung con******************************************************************************************
$("#updaterowbutton").unbind("click").click(function()
		{
			var rowcount4 = $("#jqsua").jqxGrid('getdatainformation').rowscount;
			if(rowcount4==0){
					alert("Bạn chưa chọn nội dung cho phiếu mẫu!");
			}else{			        // synchronize with the server - send update command
				/*var data1="&tenphieumaumoi=" +$("#txt_tenphieumaumoi").val() + "&ngay=" + $("#cbo_ngaysua").val()+ "&thang=" + $("#cbo_thangsua").val() + "&nam="+ $("#cbo_namsua").val() + "&ghichu="+$("#txt_ghichusua").val() + "&maphieu="+ma;
				$.ajax
					({
						dataType: 'json',
						url: 'suaphieumau.php',//them phiếu mẫu mới vào bảng phiếu mẫu
						data: data1,
						success: function (data, status, xhr)
						{}
				});	
					*/
				for(var m=0;m<rowcount4;m++){
						//var mand = $('#jqsua').jqxGrid('getcellvalue', m,'mandsua');
						manoidunglon = $('#jqsua').jqxGrid('getcellvalue',m, "mandlon");
						manoidungcon = $('#jqsua').jqxGrid('getcellvalue', m, "mandcon");
						tennoidungcon = $('#jqsua').jqxGrid('getcellvalue', m, "tenndcon");
								http=GetXmlHttpObject();
								var params = "manoidunglon=" + manoidunglon + "&tennoidungcon="+tennoidungcon;;
														
								http.open("POST", 'suanoidungcon.php', false);
								http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
								http.onreadystatechange = function()
								{
									if(http.readyState == 4 && http.status == 200) 
									{
										result=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
										alert(result);
									}
								}
								http.send(params);	
                }
				
				window.location.reload(true);		
			}
		});
	}