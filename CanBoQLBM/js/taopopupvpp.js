// JavaScript Document
function taopopup(){
	 		var data = {};
			var theme = '';
			var id= '';
			var ten= '';
			var dvt= '';
			var nsx= '';
			var dongia= '';
			var tongtien= 0;
			
			http=GetXmlHttpObject();
			var params ="";
			http.open("POST",'get_list_vpp.php', false);
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
						row["dongia"] = x[i].getElementsByTagName('column')[4].firstChild.nodeValue;
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
            $("#jqxgrid2").jqxGrid(
            {
                width: 750,
                source: dataAdapter,
				editable: true,
                theme: theme,
                columnsresize: true,
                columns: [
				  { text: 'Mã VPP', datafield: 'id', width: 70 },
                  { text: 'Tên VPP',editable: false, datafield: 'ten', width: 200 },
                  { text: 'Đơn vị tính',editable: false, datafield: 'dvt', width: 100},
                  { text: 'Nhà sản xuất',editable: false, datafield: 'nsx', width: 200 },
                  { text: 'Đơn giá',editable: false, datafield: 'dongia', minwidth: 200 }
              ]
            });
			$('#jqxgrid2').bind('rowclick', function (event) 
			{
  				var args = event.args;
				var row = args.rowindex;
				//kiem tra trung du lieu
				var i = 0,them=1;
	      		var rowscount = $("#jqxgrid").jqxGrid('getdatainformation').rowscount;
				var ma1 = $('#jqxgrid2').jqxGrid('getcellvalue',row,"id");
				for(i;i < rowscount;i++) 
				{
					   
					   var ma2 = $('#jqxgrid').jqxGrid('getcellvalue', i, "id");
					   if(ma2==ma1)
					   {
						    alert("Văn phòng phẩm này đã tồn tại");
							them=0;
							break;
					   }
           		 }
				if(them==1)
				{
					var data = $('#jqxgrid2').jqxGrid('getrowdata', row);
				//	add vào trong bang o form
					$("#jqxgrid").jqxGrid('addrow',null, data);
					var rowscount2 = $("#jqxgrid").jqxGrid('getdatainformation').rowscount;
					$('#jqxgrid2').jqxGrid('hiderow',row);
					$("#jqxgrid").jqxGrid('setcellvalue', rowscount2-1, "soluong", "1");
				//	gan gia tri cho cot thanh tien
				//
				var rowscount3 = $("#jqxgrid").jqxGrid('getdatainformation').rowscount;
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
					}					
		
			});
			
}