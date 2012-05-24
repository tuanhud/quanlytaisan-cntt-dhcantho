function SLHV_NHHK(phpfile,namhoc, hocki){
	http=GetXmlHttpObject();
	var params ="idnamhoc="+ namhoc;
	params +="&idhocki="+ hocki;
	//mo ket noi bang phuong thuc post
	http.open("POST", phpfile, false);
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.setRequestHeader("Content-length", params.length);
	http.setRequestHeader("Connection", "close");
	//ham xu li du lieu tra ve cua ajax send thanh cong
	http.onreadystatechange = function() {
	if(http.readyState == 4 && http.status == 200) 
	   {
					   var x=http.responseXML.getElementsByTagName('RESULT');
					   var slhv = new Array();
					   for(var i=0;i<x.length;i++)
					   {      
							slhv[i]={
								category:x[i].getElementsByTagName('ROW')[0].firstChild.nodeValue,
								values:x[i].getElementsByTagName('COLUMN')[0].firstChild.nodeValue
								};
						}
(function() {
    YUI().use('charts', function (Y){ 
	   	document.getElementById('mychart').innerHTML="";
		var myDataValues = slhv;
		var myTooltip = {
    styles: { 
        backgroundColor: "#333",
        color: "#eee",
        borderColor: "#fff",
        textAlign: "center"
    },
    markerLabelFunction: function(categoryItem, valueItem, itemIndex, series, seriesIndex)
    {
        var msg = document.createElement("div"),
        underlinedTextBlock = document.createElement("span"),
        boldTextBlock = document.createElement("div");
        underlinedTextBlock.style.textDecoration = "underline";
        boldTextBlock.style.marginTop = "5px";
        boldTextBlock.style.fontWeight = "bold";
        underlinedTextBlock.appendChild(document.createTextNode( 
                                        categoryItem.axis.get("labelFunction").apply(this, [categoryItem.value, categoryItem.axis.get("labelFormat")])));
        boldTextBlock.appendChild(document.createTextNode(valueItem.axis.get("labelFunction").apply(this, [valueItem.value, {prefix:"Số lượng: ", decimalPlaces:0}])));   
        msg.appendChild(underlinedTextBlock);
        msg.appendChild(document.createElement("br"));
        msg.appendChild(boldTextBlock); 
        return msg; 
    }
};

 //Define our axes for the chart.
    var myAxes = {
        financials:{
            keys:["values"],
			type:"numeric",
			title: "Số lượng",
            styles:{
                majorTicks:{
                    display: "none"
                },
			label: {
				color:'#ff0000'
				},
				title:{
					color:'#0000ff'
			}
            }
        },
        dateRange:{
            keys:["category"],
			position:"bottom",
            type:"category",
			title: "Liên chi hội sinh viên",
            styles:{
                majorTicks:{
                    display: "none"
                },
				label: {
                    rotation:-45,
					color:'#ff0000',
                    margin:{top:5}
                },
				title:{
					color:'#0000ff'
					}
            }
        }
    };

        	var mychart = new Y.Chart({
				dataProvider:myDataValues, 
				render:"#mychart", 
				type:"column",
				axes:myAxes, 
				tooltip: myTooltip,
				horizontalGridlines: {
                            		styles: {
			                                line: {
            			                        color: "#dad8c9"
                                				}
                            				}
                        		}				
				});
    	});
		})();
	   }
	}
	http.send(params);
}

function SLHV_NHHK_LCHSV(phpfile,namhoc, hocki, lchsv){
	http=GetXmlHttpObject();
	var params ="idnamhoc="+ namhoc;
	params +="&idhocki="+ hocki;
	params +="&idlchsv="+ lchsv;
	//mo ket noi bang phuong thuc post
	http.open("POST", phpfile, false);
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.setRequestHeader("Content-length", params.length);
	http.setRequestHeader("Connection", "close");
	//ham xu li du lieu tra ve cua ajax send thanh cong
	http.onreadystatechange = function() {
	if(http.readyState == 4 && http.status == 200) 
	   {
					   var x=http.responseXML.getElementsByTagName('RESULT');
					   var slhv = new Array();
					   for(var i=0;i<x.length;i++)
					   {      
							slhv[i]={
								category:x[i].getElementsByTagName('ROW')[0].firstChild.nodeValue,
								values:x[i].getElementsByTagName('COLUMN')[0].firstChild.nodeValue
								};
						}
(function() {
    YUI().use('charts', function (Y){ 
	   	document.getElementById('mychart').innerHTML="";
		var myDataValues = slhv;
		var myTooltip = {
    styles: { 
        backgroundColor: "#333",
        color: "#eee",
        borderColor: "#fff",
        textAlign: "center"
    },
    markerLabelFunction: function(categoryItem, valueItem, itemIndex, series, seriesIndex)
    {
        var msg = document.createElement("div"),
        underlinedTextBlock = document.createElement("span"),
        boldTextBlock = document.createElement("div");
        underlinedTextBlock.style.textDecoration = "underline";
        boldTextBlock.style.marginTop = "5px";
        boldTextBlock.style.fontWeight = "bold";
        underlinedTextBlock.appendChild(document.createTextNode( 
                                        categoryItem.axis.get("labelFunction").apply(this, [categoryItem.value, categoryItem.axis.get("labelFormat")])));
        boldTextBlock.appendChild(document.createTextNode(valueItem.axis.get("labelFunction").apply(this, [valueItem.value, {prefix:"Số lượng: ", decimalPlaces:0}])));   
        msg.appendChild(underlinedTextBlock);
        msg.appendChild(document.createElement("br"));
        msg.appendChild(boldTextBlock); 
        return msg; 
    }
};

 //Define our axes for the chart.
    var myAxes = {
        financials:{
            keys:["values"],
			type:"numeric",
			title: "Số lượng",
            styles:{
                majorTicks:{
                    display: "none"
                },
			label: {
				color:'#ff0000'
				},
				title:{
					color:'#0000ff'
			}
            }
        },
        dateRange:{
            keys:["category"],
			position:"bottom",
            type:"category",
			title: "Chi hội sinh viên",
            styles:{
                majorTicks:{
                    display: "none"
                },
				label: {
                    rotation:-45,
					color:'#ff0000',
                    margin:{top:5}
                },
				title:{
					color:'#0000ff'
					}
            }
        }
    };

        	var mychart = new Y.Chart({
				dataProvider:myDataValues, 
				render:"#mychart", 
				type:"column",
				axes:myAxes, 
				tooltip: myTooltip,
				horizontalGridlines: {
                            		styles: {
			                                line: {
            			                        color: "#dad8c9"
                                				}
                            				}
                        		}				
				});
    	});
		})();
	   }
	}
	http.send(params);
}

function SLHV_LCHSV_CHSV(phpfile,lchsv,chsv){
	http=GetXmlHttpObject();
	var params ="idlchsv="+ lchsv;
	params +="&idchsv="+ chsv;
	//mo ket noi bang phuong thuc post
	http.open("POST", phpfile, false);
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.setRequestHeader("Content-length", params.length);
	http.setRequestHeader("Connection", "close");
	//ham xu li du lieu tra ve cua ajax send thanh cong
	http.onreadystatechange = function() {
	if(http.readyState == 4 && http.status == 200) 
	   {
					   var x=http.responseXML.getElementsByTagName('RESULT');
					   var slhv = new Array();
					   for(var i=0;i<x.length;i++)
					   {      
							slhv[i]={
								category:x[i].getElementsByTagName('ROW')[0].firstChild.nodeValue,
								values:x[i].getElementsByTagName('COLUMN')[0].firstChild.nodeValue
								};
						}
(function() {
    YUI().use('charts', function (Y){ 
	   	document.getElementById('mychart').innerHTML="";
		var myDataValues = slhv;
		var myTooltip = {
    styles: { 
        backgroundColor: "#333",
        color: "#eee",
        borderColor: "#fff",
        textAlign: "center"
    },
    markerLabelFunction: function(categoryItem, valueItem, itemIndex, series, seriesIndex)
    {
        var msg = document.createElement("div"),
        underlinedTextBlock = document.createElement("span"),
        boldTextBlock = document.createElement("div");
        underlinedTextBlock.style.textDecoration = "underline";
        boldTextBlock.style.marginTop = "5px";
        boldTextBlock.style.fontWeight = "bold";
        underlinedTextBlock.appendChild(document.createTextNode( 
                                        categoryItem.axis.get("labelFunction").apply(this, [categoryItem.value, categoryItem.axis.get("labelFormat")])));
        boldTextBlock.appendChild(document.createTextNode(valueItem.axis.get("labelFunction").apply(this, [valueItem.value, {prefix:"Số lượng: ", decimalPlaces:0}])));   
        msg.appendChild(underlinedTextBlock);
        msg.appendChild(document.createElement("br"));
        msg.appendChild(boldTextBlock); 
        return msg; 
    }
};

 //Define our axes for the chart.
    var myAxes = {
        financials:{
            keys:["values"],
			type:"numeric",
			title: "Số lượng",
            styles:{
                majorTicks:{
                    display: "none"
                },
			label: {
				color:'#ff0000'
				},
				title:{
					color:'#0000ff'
			}
            }
        },
        dateRange:{
            keys:["category"],
			position:"bottom",
            type:"category",
			title: "Năm học",
            styles:{
                majorTicks:{
                    display: "none"
                },
				label: {
                    rotation:-45,
					color:'#ff0000',
                    margin:{top:5}
                },
				title:{
					color:'#0000ff'
					}
            }
        }
    };

        	var mychart = new Y.Chart({
				dataProvider:myDataValues, 
				render:"#mychart", 
				type:"column",
				axes:myAxes, 
				tooltip: myTooltip,
				horizontalGridlines: {
                            		styles: {
			                                line: {
            			                        color: "#dad8c9"
                                				}
                            				}
                        		}				
				});
    	});
		})();
	   }
	}
	http.send(params);
}