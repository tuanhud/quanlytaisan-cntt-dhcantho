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
			/*nam=frm.cbo_chonnamsua.value;
	        donvi=frm.cbo_chondonvisua.value;*/
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
				 url: 'get_list_khms.php',   
				beforeprocessing: function(data)
				{		
					source.totalrecords = data[0].TotalRows;
				},						
            };
			//var rowscount2 = $("#jqthem").jqxGrid('getdatainformation').rowscount;
			
 		    var dataadapter = new $.jqx.dataAdapter(source);
           // initialize jqxGrid
            $("#jqthem").jqxGrid(
            {
                width: 650,
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
					  { text: 'Mã tài sản', editable: false, datafield: 'mats', width: 135, cellsalign: 'left' },
					  { text: 'Tên tài sản', editable: false, datafield: 'ten', width: 160, cellsalign: 'left' },
                      { text: 'ĐVT', editable: false, datafield: 'dvt', width: 50, cellsalign: 'left' },
                      
					  { text: 'Số Lượng', editable: false, datafield: 'soluong', width: 50, cellsalign: 'left'
					  },
					  { text: 'Đơn giá (VNĐ)',editable: false,cellsformat: 'f', datafield: 'dongia', width: 115 },
					  { text: 'Thành tiền (VNĐ)',editable: false,cellsformat: 'f', datafield: 'tong', width: 140 },
                  
                  ]
				  
            });
			
}
function getRecord2(phpfile,madonvi,manam)
{
	dt.reset();
	http=GetXmlHttpObject();
	var params ="madonvi="+madonvi;
	params="manam"+manam;
	//mo ket noi bang phuong thuc post
	http.open("POST", phpfile, false);
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//http.setRequestHeader("Content-length", params.length);
	//http.setRequestHeader("Connection", "close");
	//ham xu li du lieu tra ve cua ajax send thanh cong
	http.onreadystatechange = function() {
	if(http.readyState == 4 && http.status == 200) 
	   { 
				
				var x=http.responseXML.getElementsByTagName('RESULT');
				for(var i=0;i<x.length;i++)
			   { 
					dt.addRow
					({ 
							id:x[i].getElementsByTagName('MA')[0].firstChild.nodeValue,
							ten:x[i].getElementsByTagName('TEN')[0].firstChild.nodeValue, 
					});
					//lay duoc ma can bo roi di tim danh sach cac quyen cua cac bo nay, sau do moi hiển thi len bàng checkbox 
					//gettenquyen('get_list_quyen_canbo.php',x[i].getElementsByTagName('MA')[0].firstChild.nodeValue);
			   }
				
	   }
	}
	http.send(params);
}
