function get_DSHV_LCHSV_CHSV_NHHK(phpfile,frm){		
	var idnamhoc = frm.cbo_tennamhoc.value;
	var idhocki = frm.cbo_tenhocki.value;
	var idlchsv = frm.cbo_tenlchsv.value;
	var idchsv = frm.cbo_tenchsv.value;
	http=GetXmlHttpObject();
	var params ="";
	if(idnamhoc != -1) 	params +="&idnamhoc="+ idnamhoc;
	if(idhocki != -1) 	params +="&idhocki="+ idhocki;
	if(idlchsv != -1) 	params +="&idlchsv="+ idlchsv;
	if(idchsv!=-1) 		params +="&idchsv="+ idchsv;
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
					   var data = new Array();
					   if(idlchsv != -1 && idchsv==-1)
					   {
					   	   for(var i=0;i<x.length;i++)
					   			{      
								data[i]={						
									stt:i+1,
									id:x[i].getElementsByTagName('ID')[0].firstChild.nodeValue,
									hoten:x[i].getElementsByTagName('HOTEN')[0].firstChild.nodeValue,
									chsv:x[i].getElementsByTagName('CHSV')[0].firstChild.nodeValue,
									//lchsv:x[i].getElementsByTagName('LCHSV')[0].firstChild.nodeValue,
									chuyennganh:x[i].getElementsByTagName('CHUYENNGANH')[0].firstChild.nodeValue,
									khoahoc:x[i].getElementsByTagName('KHOAHOC')[0].firstChild.nodeValue
									};
								 }
					   }
					   else if(idchsv!=-1 && idchsv!=0)
					   {
					   	   for(var i=0;i<x.length;i++)
					   			{      
								data[i]={						
									stt:i+1,
									id:x[i].getElementsByTagName('ID')[0].firstChild.nodeValue,
									hoten:x[i].getElementsByTagName('HOTEN')[0].firstChild.nodeValue,
									//chsv:x[i].getElementsByTagName('CHSV')[0].firstChild.nodeValue,
									//lchsv:x[i].getElementsByTagName('LCHSV')[0].firstChild.nodeValue,
									chuyennganh:x[i].getElementsByTagName('CHUYENNGANH')[0].firstChild.nodeValue,
									khoahoc:x[i].getElementsByTagName('KHOAHOC')[0].firstChild.nodeValue
									};
								 }
					   }
					   else
					   {
					   	   for(var i=0;i<x.length;i++)
					   			{      
								data[i]={						
									stt:i+1,
									id:x[i].getElementsByTagName('ID')[0].firstChild.nodeValue,
									hoten:x[i].getElementsByTagName('HOTEN')[0].firstChild.nodeValue,
									chsv:x[i].getElementsByTagName('CHSV')[0].firstChild.nodeValue,
									lchsv:x[i].getElementsByTagName('LCHSV')[0].firstChild.nodeValue,
									chuyennganh:x[i].getElementsByTagName('CHUYENNGANH')[0].firstChild.nodeValue,
									khoahoc:x[i].getElementsByTagName('KHOAHOC')[0].firstChild.nodeValue
									};
								 }
					   }

YUI({
	filter: 'raw', combine: false,
	gallery: 'gallery-2011.04.13-22-38'
}).use(
	'datatable-datasource',
	'datasource-arrayschema',
	'gallery-querybuilder',
	'gallery-formmgr',
	'gallery-paginator',
	'array-extras',
	'datatable-sort',
function(Y)
{
	document.getElementById('query').innerHTML="";
	/*if(document.getElementById('controls').style.visibility == 'hidden')
	document.getElementById('controls').style.visibility = 'visible';*/
	document.getElementById('pg').innerHTML="";
	document.getElementById('table').innerHTML="";
	function generateRequest()
	{
		var state    = pg.getState();
		state.filter = query.toDatabaseQuery();
		return state;
	}

	function sendRequest()
	{
		table.datasource.load(
		{
			request: generateRequest()
		});
	}

// Raw data
// QueryBuilder

	var var_list =
	[
		{
			name: 'id',
			type: 'string',
			text: 'Mã số'
		},
		{
			name: 'hoten',
			type: 'string',
			text: 'Họ tên'
		},
		{
			name: 'khoahoc',
			type: 'number',
			text: 'Khóa học',
			validation: 'yiv-integer:[0,]'
		}
	];

	var ops =
	{
		string:
		[
			{ value: 'contains',    text: 'Có chứa' },
			{ value: 'starts-with', text: 'Bắt đầu với' }
		],

		number:
		[
			{ value: 'equal',   text: '=' },
			{ value: 'less',    text: '<=' },
			{ value: 'greater', text: '>=' }
		]
	};

	var query = new Y.QueryBuilder(var_list, ops);
	query.render('#query');

	var form = new Y.FormManager('frm_timkiemDSHV_LCHSV_CHSV_NHHK');
	form.prepareForm();

	function filter(e)
	{
		e.halt();
		if (form.validateForm())
		{
			pg.setPage(1, true);
			sendRequest();
		}
	}

/*	Y.on('click', function()
	{
		query.reset();
		sendRequest();
	},
	'#reset');*/

	Y.on('click', filter, '#apply');
//	Y.on('submit', filter, '#query-form');

	// filtering

	var filters =
	{
		string:
		{
			contains: function(value, filter)
			{
				return (value.toLowerCase().indexOf(filter.toLowerCase()) >= 0);
			},
			'starts-with': function(value, filter)
			{
				return (value.toLowerCase().substr(0, filter.length) == filter.toLowerCase());
			}/*,
			'ends-with': function(value, filter)
			{
				return (value.toLowerCase().substr(-filter.length) == filter.toLowerCase());
			}*/
		},

		number:
		{
			equal: function(value, filter)
			{
				return (parseInt(value, 10) == parseInt(filter, 10));
			},
			less: function(value, filter)
			{
				return (parseInt(value, 10) <= parseInt(filter, 10));
			},
			greater: function(value, filter)
			{
				return (parseInt(value, 10) >= parseInt(filter, 10));
			}
		}
	};

	var var_type = {};
	for (var i=0; i<var_list.length; i++)
	{
		var_type[ var_list[i].name ] = var_list[i].type;
	}

	function filterData(
		/* array */	data,
		/* array */	filter)
	{
		for (var i=0; i<filter.length; i++)
		{
			data = applyFilter(data, filter[i]);
		}
		return data;
	}

	function applyFilter(
		/* array */	data,
		/* array */	filter)
	{
		var key  = filter[0];
		var op   = filter[1];
		var val  = filter[2];
		var type = var_type[key];

		return Y.Array.filter(data, function(v)
		{
			return filters[type][op](v[key], val);
		});
	}

// Data Source

	// Wrap ordinary data source to implement filtering and pagination.
	// (All DataSource*Schema plugins prevent DataSource._defDataFn from executing.)

	function FilterDataSource()
	{
		FilterDataSource.superclass.constructor.apply(this, arguments);
	}

	FilterDataSource.NAME = "filterdatasource";

	Y.extend(FilterDataSource, Y.DataSource.Local,
	{
		_defRequestFn: function(e)
		{
			var self    = this;
			var payload = e.details[0];

			this.get('source').sendRequest(
			{
				request: e.request,
				callback:
				{
					success: function(e1)
					{
						payload.data = e1.response.results;
						payload.meta = e1.response.meta;
						self.fire('data', payload);
					},
					failure: function(e1)
					{
						payload.error = e1.error;
						self.fire('data', payload);
					}
				}
			});
		},

		_defDataFn: function(e)
		{
			var data = filterData(e.data, e.request.filter);
			var response =
			{
				results: data.slice(e.request.recordOffset, e.request.recordOffset + e.request.rowsPerPage),
				meta:
				{
					totalRecords: data.length
				}
			};

			this.fire("response", Y.mix({response: response}, e));
		}
	});

	// configure data source
	if(idlchsv!=-1 && idchsv==-1)
	{
	var schema =
			{
				resultFields:
				[
				'stt', 'id', 'hoten', 'chsv', 'chuyennganh', 'khoahoc'
				]
			};
	}
	else if(idchsv!=-1 && idchsv!=0)
	{
			var schema =
			{
				resultFields:
				[
				'stt', 'id', 'hoten','chuyennganh', 'khoahoc'
				]
			};
		}
	else
	{
			var schema =
			{
				resultFields:
				[
				'stt', 'id', 'hoten', 'chsv','lchsv' ,'chuyennganh', 'khoahoc'
				]
			};
		}
	var ds1 = new Y.DataSource.Local({source: data});
	ds1.plug(
	{
		fn:  Y.Plugin.DataSourceArraySchema,
		cfg: {schema:schema}
	});

	var ds = new FilterDataSource({source: ds1});

// Paginator

	function updatePaginator(
		/* object */	state)
	{
		this.setPage(state.page, true);
		this.setRowsPerPage(state.rowsPerPage, true);
		sendRequest();
	}

	var pg = new Y.Paginator(
	{
		totalRecords: 5,
		rowsPerPage: 5,
		template: '{FirstPageLink} {PreviousPageLink} {PageLinks} {NextPageLink} {LastPageLink} <span class="rpp">Số dòng hiển thị:</span> {RowsPerPageDropdown}',
		rowsPerPageOptions:    [5,10,15],
		firstPageLinkLabel:    '|&lt;',
		previousPageLinkLabel: '&lt;',
		nextPageLinkLabel:     '&gt;',
		lastPageLinkLabel:     '&gt;|'
	});
	pg.on('changeRequest', updatePaginator);
	pg.render('#pg');

	ds.on('response', function(e)
	{
		pg.setTotalRecords(e.response.meta.totalRecords, true);
		pg.render();
	});

// DataTable

	if(idlchsv!=-1 && idchsv==-1){
	var cols =
	[
	{key: "stt",label:"STT", sortable: true},
	{key: "id",label:"Mã số", sortable: true},
	{key: "hoten",label:"Họ tên", sortable: true},
	{key: "chsv",label:"CHSV", sortable: false},
	//{key: "lchsv",label:"LCHSV", sortable: false},
	{key: "chuyennganh",label:"Chuyên ngành", sortable: false},
	{key: "khoahoc",label:"Khóa học", sortable: true}
	];
	}
	else if(idchsv!=-1 && idchsv!=0){
	var cols =
	[
	{key: "stt",label:"STT", sortable: true},
	{key: "id",label:"Mã số", sortable: true},
	{key: "hoten",label:"Họ tên", sortable: true},
	//{key: "chsv",label:"CHSV", sortable: false},
	//{key: "lchsv",label:"LCHSV", sortable: false},
	{key: "chuyennganh",label:"Chuyên ngành", sortable: false},
	{key: "khoahoc",label:"Khóa học", sortable: true}
	];
		}
	else{
	var cols =
	[
	{key: "stt",label:"STT", sortable: true},
	{key: "id",label:"Mã số", sortable: true},
	{key: "hoten",label:"Họ tên", sortable: true},
	{key: "chsv",label:"CHSV", sortable: false},
	{key: "lchsv",label:"LCHSV", sortable: false},
	{key: "chuyennganh",label:"Chuyên ngành", sortable: false},
	{key: "khoahoc",label:"Khóa học", sortable: true}
	];
		}
	var table = new Y.DataTable({columns: cols});
	table.plug(Y.Plugin.DataTableDataSource, {datasource: ds});

	table.render("#table");

	sendRequest();
});
	   }
	}
	http.send(params);
}

//Danh sach hoi vien theo tung CLB cua tung nam hoc - hoc ki
function get_DSHV_CLB_NHHK(phpfile,frm){
	var namhoc_id = frm.cbo_tennamhoc.value;
	var hocki_id = frm.cbo_tenhocki.value;
	var clb_id = frm.cbo_tenclb.value;
	http=GetXmlHttpObject();
	var params ="";
	if(namhoc_id != -1) 	params +="&namhoc_id="+ namhoc_id;
	if(hocki_id != -1) 	params +="&hocki_id="+ hocki_id;
	if(clb_id!=-1) 		params +="&clb_id="+ clb_id;
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
					   var data = new Array();
					   if(clb_id == -1)
					   {
					   	   for(var i=0;i<x.length;i++)
					   			{      
								data[i]={						
									stt:i+1,
									id:x[i].getElementsByTagName('ID')[0].firstChild.nodeValue,
									hoten:x[i].getElementsByTagName('HOTEN')[0].firstChild.nodeValue,
									chsv_lchsv:x[i].getElementsByTagName('CHSV')[0].firstChild.nodeValue + ' - ' + x[i].getElementsByTagName('LCHSV')[0].firstChild.nodeValue,
									clb:x[i].getElementsByTagName('CLB')[0].firstChild.nodeValue,
									chuyennganh:x[i].getElementsByTagName('CHUYENNGANH')[0].firstChild.nodeValue,
									khoahoc:x[i].getElementsByTagName('KHOAHOC')[0].firstChild.nodeValue
									};
								 }
					   }
					   else 
					   {
					   	   for(var i=0;i<x.length;i++)
					   			{      
								data[i]={						
									stt:i+1,
									id:x[i].getElementsByTagName('ID')[0].firstChild.nodeValue,
									hoten:x[i].getElementsByTagName('HOTEN')[0].firstChild.nodeValue,
									chsv_lchsv:x[i].getElementsByTagName('CHSV')[0].firstChild.nodeValue + ' - ' + x[i].getElementsByTagName('LCHSV')[0].firstChild.nodeValue,									
									chuyennganh:x[i].getElementsByTagName('CHUYENNGANH')[0].firstChild.nodeValue,
									khoahoc:x[i].getElementsByTagName('KHOAHOC')[0].firstChild.nodeValue									};
								 }
					   }
YUI({
	filter: 'raw', combine: false,
	gallery: 'gallery-2011.04.13-22-38'
}).use(
	'datatable-datasource',
	'datasource-arrayschema',
	'gallery-querybuilder',
	'gallery-formmgr',
	'gallery-paginator',
	'array-extras',
	'datatable-sort',
function(Y)
{
	document.getElementById('query').innerHTML="";
	/*if(document.getElementById('controls').style.visibility == 'hidden')
	document.getElementById('controls').style.visibility = 'visible';*/
	document.getElementById('pg').innerHTML="";
	document.getElementById('table').innerHTML="";
	function generateRequest()
	{
		var state    = pg.getState();
		state.filter = query.toDatabaseQuery();
		return state;
	}

	function sendRequest()
	{
		table.datasource.load(
		{
			request: generateRequest()
		});
	}

// Raw data
// QueryBuilder

	var var_list =
	[
		{
			name: 'id',
			type: 'string',
			text: 'Mã số'
		},
		{
			name: 'hoten',
			type: 'string',
			text: 'Họ tên'
		},
		{
			name: 'khoahoc',
			type: 'number',
			text: 'Khóa học',
			validation: 'yiv-integer:[0,]'
		}
	];

	var ops =
	{
		string:
		[
			{ value: 'contains',    text: 'Có chứa' },
			{ value: 'starts-with', text: 'Bắt đầu với' }
		],

		number:
		[
			{ value: 'equal',   text: '=' },
			{ value: 'less',    text: '<=' },
			{ value: 'greater', text: '>=' }
		]
	};

	var query = new Y.QueryBuilder(var_list, ops);
	query.render('#query');

	var form = new Y.FormManager('frm_timkiemDSHV_CLB_NHHK');
	form.prepareForm();

	function filter(e)
	{
		e.halt();
		if (form.validateForm())
		{
			pg.setPage(1, true);
			sendRequest();
		}
	}

/*	Y.on('click', function()
	{
		query.reset();
		sendRequest();
	},
	'#reset');*/

	Y.on('click', filter, '#apply');
//	Y.on('submit', filter, '#query-form');

	// filtering

	var filters =
	{
		string:
		{
			contains: function(value, filter)
			{
				return (value.toLowerCase().indexOf(filter.toLowerCase()) >= 0);
			},
			'starts-with': function(value, filter)
			{
				return (value.toLowerCase().substr(0, filter.length) == filter.toLowerCase());
			}/*,
			'ends-with': function(value, filter)
			{
				return (value.toLowerCase().substr(-filter.length) == filter.toLowerCase());
			}*/
		},

		number:
		{
			equal: function(value, filter)
			{
				return (parseInt(value, 10) == parseInt(filter, 10));
			},
			less: function(value, filter)
			{
				return (parseInt(value, 10) <= parseInt(filter, 10));
			},
			greater: function(value, filter)
			{
				return (parseInt(value, 10) >= parseInt(filter, 10));
			}
		}
	};

	var var_type = {};
	for (var i=0; i<var_list.length; i++)
	{
		var_type[ var_list[i].name ] = var_list[i].type;
	}

	function filterData(
		/* array */	data,
		/* array */	filter)
	{
		for (var i=0; i<filter.length; i++)
		{
			data = applyFilter(data, filter[i]);
		}
		return data;
	}

	function applyFilter(
		/* array */	data,
		/* array */	filter)
	{
		var key  = filter[0];
		var op   = filter[1];
		var val  = filter[2];
		var type = var_type[key];

		return Y.Array.filter(data, function(v)
		{
			return filters[type][op](v[key], val);
		});
	}

// Data Source

	// Wrap ordinary data source to implement filtering and pagination.
	// (All DataSource*Schema plugins prevent DataSource._defDataFn from executing.)

	function FilterDataSource()
	{
		FilterDataSource.superclass.constructor.apply(this, arguments);
	}

	FilterDataSource.NAME = "filterdatasource";

	Y.extend(FilterDataSource, Y.DataSource.Local,
	{
		_defRequestFn: function(e)
		{
			var self    = this;
			var payload = e.details[0];

			this.get('source').sendRequest(
			{
				request: e.request,
				callback:
				{
					success: function(e1)
					{
						payload.data = e1.response.results;
						payload.meta = e1.response.meta;
						self.fire('data', payload);
					},
					failure: function(e1)
					{
						payload.error = e1.error;
						self.fire('data', payload);
					}
				}
			});
		},

		_defDataFn: function(e)
		{
			var data = filterData(e.data, e.request.filter);
			var response =
			{
				results: data.slice(e.request.recordOffset, e.request.recordOffset + e.request.rowsPerPage),
				meta:
				{
					totalRecords: data.length
				}
			};

			this.fire("response", Y.mix({response: response}, e));
		}
	});

	// configure data source
	if(clb_id == -1)
	{
	var schema =
			{
				resultFields:
				[
				'stt', 'id', 'hoten', 'chsv_lchsv','clb', 'chuyennganh', 'khoahoc'
				]
			};
	}
	else
	{
			var schema =
			{
				resultFields:
				[
				'stt', 'id', 'hoten','chsv_lchsv','chuyennganh', 'khoahoc'
				]
			};
		}	
	var ds1 = new Y.DataSource.Local({source: data});
	ds1.plug(
	{
		fn:  Y.Plugin.DataSourceArraySchema,
		cfg: {schema:schema}
	});

	var ds = new FilterDataSource({source: ds1});

// Paginator

	function updatePaginator(
		/* object */	state)
	{
		this.setPage(state.page, true);
		this.setRowsPerPage(state.rowsPerPage, true);
		sendRequest();
	}

	var pg = new Y.Paginator(
	{
		totalRecords: 5,
		rowsPerPage: 5,
		template: '{FirstPageLink} {PreviousPageLink} {PageLinks} {NextPageLink} {LastPageLink} <span class="rpp">Số dòng hiển thị:</span> {RowsPerPageDropdown}',
		rowsPerPageOptions:    [5,10,15],
		firstPageLinkLabel:    '|&lt;',
		previousPageLinkLabel: '&lt;',
		nextPageLinkLabel:     '&gt;',
		lastPageLinkLabel:     '&gt;|'
	});
	pg.on('changeRequest', updatePaginator);
	pg.render('#pg');

	ds.on('response', function(e)
	{
		pg.setTotalRecords(e.response.meta.totalRecords, true);
		pg.render();
	});

// DataTable

	if(clb_id==-1){
	var cols =
	[
	{key: "stt",label:"STT", sortable: true},
	{key: "id",label:"Mã số", sortable: true},
	{key: "hoten",label:"Họ tên", sortable: true},
	{key: "chsv_lchsv",label:"LCHSV - CHSV", sortable: false},
	{key: "clb",label:"CLB", sortable: false},
	{key: "chuyennganh",label:"Chuyên ngành", sortable: false},
	{key: "khoahoc",label:"Khóa học", sortable: true}
	];
	}
	else{
	var cols =
	[
	{key: "stt",label:"STT", sortable: true},
	{key: "id",label:"Mã số", sortable: true},
	{key: "hoten",label:"Họ tên", sortable: true},
	{key: "chsv_lchsv",label:"LCHSV - CHSV", sortable: false},
	{key: "chuyennganh",label:"Chuyên ngành", sortable: false},
	{key: "khoahoc",label:"Khóa học", sortable: true}
	];
}
	var table = new Y.DataTable({columns: cols});
	table.plug(Y.Plugin.DataTableDataSource, {datasource: ds});

	table.render("#table");

	sendRequest();
});
	   }
	}
	http.send(params);
}