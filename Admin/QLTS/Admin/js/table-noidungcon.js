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
			var ma = $("#cbo_tennoidunglonsua").val();
			var theme = '';
		/*	var stt= '';
			var ma= '';
			var dvt= '';
			var nsx= '';
			var dongia= '';
			var thanhtien = '';*/
			var params= "manoidung=" + ma;
			alert(params);
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
			
 		    var dataadapter = new $.jqx.dataAdapter(source);
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
			$('#jqsua').jqxGrid({ autoheight: true}); 
	}