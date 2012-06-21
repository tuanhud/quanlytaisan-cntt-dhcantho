function taochartnguoidung() {
				
		var data = {};
	 	var params= "";
		http=GetXmlHttpObject();
		http.open("POST",'get_list_thongkenguoidung.php', false);
		http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		http.onreadystatechange = function() 
		{
						if(http.readyState == 4 && http.status == 200) 
						{											
							var x=http.responseXML.getElementsByTagName('row');
							for(var j=0;j<x.length;j++)
							{
								var row = {};
								row["Soluong"] = x[j].getElementsByTagName('column')[0].firstChild.nodeValue;
								row["Donvi"] = x[j].getElementsByTagName('column')[1].firstChild.nodeValue;
								data[j] = row;
							}
							            // prepare chart data
						   var source =
							{
								localdata: data,
								datatype: "array",
							};
							var dataAdapter = new $.jqx.dataAdapter(source);
							// prepare jqxChart settings
							var settings =
							 {
                title: "Thống kê số người dùng của các đơn vị",
                showLegend: true,
                enableAnimations: true,
                padding: { left: 5, top: 5, right: 5, bottom: 5 },
                titlePadding: { left: 90, top: 0, right: 0, bottom: 10 },
                source: dataAdapter,
                categoryAxis:
                    {
                        dataField: 'Donvi',
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
                                unitInterval: 5,
                                displayValueAxis: true,
                                description: 'Số người'
                            },
                            series: [
                                    { dataField: 'Soluong', displayText: 'Số người',showLabels: true }
                                ]
                        }
                    ]
            };
            // setup the chart
            $('#Chartnguoidung').jqxChart(settings);
		}
						}
		http.send(params);
		}
