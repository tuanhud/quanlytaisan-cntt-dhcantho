function taochartsotien() {
				var donvi=$("#cbo_donvi").val();
				var tunam=$("#cbo_tunam").val();
				var dennam=$("#cbo_dennam").val();
				var data = "donvi=" + donvi + "&tunam=" + tunam + "&dennam=" + dennam;
			/*$.ajax
				({
					//dataType: 'json',
					type: "POST",
					url: 'data_thongkesotien.php',
					data: data,
					success: function (data, status, xhr)
					{}
				});	*/
		var data = {};
	 	var params= "donvi=" + donvi + "&tunam=" + tunam + "&dennam=" + dennam;
		http=GetXmlHttpObject();
		http.open("POST",'get_list_thongketien.php', false);
		http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		http.onreadystatechange = function() 
		{
						if(http.readyState == 4 && http.status == 200) 
						{											
							var x=http.responseXML.getElementsByTagName('row');
							for(var j=0;j<x.length;j++)
							{
								var row = {};
								row["Year"] = x[j].getElementsByTagName('column')[0].firstChild.nodeValue;
								row["Money"] = x[j].getElementsByTagName('column')[2].firstChild.nodeValue;
								data[j] = row;
							}
							            // prepare chart data
						   var source =
							{
								localdata: data,
								datatype: "array",
							};
							var ten=x[0].getElementsByTagName('column')[3].firstChild.nodeValue;
							var dataAdapter = new $.jqx.dataAdapter(source);
							// prepare jqxChart settings
							var settings =
							 {
                title: "Thống Kê Kinh Phí Cấp Cho Đơn Vị " + ten,
                description: "Thông kê số tiền cấp trong giai đoạn từ "+tunam +" đến "+dennam,
                showLegend: true,
                enableAnimations: true,
                padding: { left: 5, top: 5, right: 5, bottom: 5 },
                titlePadding: { left: 90, top: 0, right: 0, bottom: 10 },
                source: dataAdapter,
                categoryAxis:
                    {
                        dataField: 'Year',
                        showGridLines: true
						
                    },
                colorScheme: 'scheme01',
                seriesGroups:
                    [
                        {
                            type: 'column',
                            columnsGapPercent: 50,
                            valueAxis:
                            {
                                unitInterval: 10,
                                displayValueAxis: true,
                                description: 'Số tiền (triệu đồng)'
                            },
                            series: [
                                    { dataField: 'Money', displayText: 'Đơn vị',showLabels: true }
                                ]
                        }
                    ]
            };
            // setup the chart
            $('#chartContainer').jqxChart(settings);
		}
						}
		http.send(params);
		}
		
function batsukienbtn_tk(){
	$("#btn_thongketien").unbind("click").click(function()
		{
			if(($("#cbo_tunam").val()=="-Chọn năm-")||($("#cbo_dennam").val()=="-Chọn năm-")||($("#cbo_donvi").val()==-1))
			alert("Bạn chưa chọn đủ thông tin để thực hiện thống kê");
			else{
				if($("#cbo_tunam").val()>$("#cbo_dennam").val())
				alert("Năm bắt đầu phải nhỏ hơn năm kết thúc thống kê");
				else{
				
				taochartsotien();	
			}
			}
			});
	}