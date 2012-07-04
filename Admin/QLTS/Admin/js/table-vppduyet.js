// JavaScript Document
// JavaScript Document
function taopopupvppduyet(){
	 		var data = {};
			var ma = $("#cbo_maphieuduyet").val();
			var theme = '';
			var id= '';
			var ten= '';
			var dvt= '';
			var nsx= '';
			var dongia= '';
			var thanhtien = '';
			var tongtien = 0;
			var params= "ma=" + ma;
			http=GetXmlHttpObject();
			http.open("POST",'get_list_vppduyet.php', false);
			http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			http.onreadystatechange = function()
			{
				if(http.readyState == 4 && http.status == 200)
				{
					var x=http.responseXML.getElementsByTagName('row');
					for(var i=0;i<x.length;i++)
					{
						
						var row = {};
						row["id"] = x[i].getElementsByTagName('column')[0].firstChild.nodeValue;
						row["ten"] = x[i].getElementsByTagName('column')[1].firstChild.nodeValue;
						row["dvt"] = x[i].getElementsByTagName('column')[2].firstChild.nodeValue;
						row["nsx"] = x[i].getElementsByTagName('column')[3].firstChild.nodeValue;
						row["soluong"] = x[i].getElementsByTagName('column')[4].firstChild.nodeValue;
						row["dongia"] = x[i].getElementsByTagName('column')[5].firstChild.nodeValue;
						row["thanhtien"]=row["soluong"]*row["dongia"];
						tongtien=tongtien+row["thanhtien"];
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
            $("#detail_vppduyet").jqxGrid(
            {
                width: 700,
                source: dataAdapter,
				editable: true,
                theme: theme,
                columnsresize: true,
                columns: [
				  { text: 'Mã VPP', datafield: 'id', width: 60 },
                  { text: 'Tên VPP',editable: false, datafield: 'ten', width: 170 },
                  { text: 'Đơn vị tính',editable: false, datafield: 'dvt', width: 100},
                  { text: 'Nhà sản xuất',editable: false, datafield: 'nsx', width: 120 },
				  { text: 'SL',editable: false, datafield: 'soluong', width: 40 },
                  { text: 'Đơn giá',editable: false, datafield: 'dongia', minwidth: 100 },
				  { text: 'Thành tiền',editable: false, datafield: 'thanhtien',cellsformat: 'f', minwidth: 110 }
              ]
            });
			$('#detail_vppduyet').jqxGrid({ autoheight: true}); 
			$("#tongtienduyet").html(tongtien);
}