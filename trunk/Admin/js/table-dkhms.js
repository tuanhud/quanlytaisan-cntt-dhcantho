var records;
var dt;
// -------------------------
//  Create Table 
// -------------------------      
function createTable(){
	
	YUI().use('datatable', function (Y)
 {	
	
	//Tao button Delete tren moi dong		 	
	var fmtBlank = function(o) 
	{
        var fclass = o.column.className || null;
        if (fclass)
            o.className += ' '+fclass;
        o.value = '<img src="images/drop.png" title="Xóa mẫu tin đã chọn" height="16">';
     }          
	 
	//Tao checkbox tren moi dong 
    var fmtChkBox = function(o)
	{
    	var cell = '<input type="checkbox" class="myCheckboxFmtr" />';
        	o.value = cell;
	        o.className += 'align-center';
    }
	var fmtChkBox2 = function(o)
	{
    	var cell = '<input type="checkbox" class="myCheckboxFmtr" />';
        	o.value = cell;
	        o.className += 'align-center';
    }
	var fmttextbox = function(o)
	{
    	var cell = '<input type="text" class="textbox" />';
        	o.value = cell;
	        o.className += 'align-center';
    }
	//Cac Column cua Bang
	var cols = [
				{name:'selectBox', label:'Chọn<input type="checkbox" id="selAll" title="Chọn tất cả"/>', formatter: fmtChkBox, allowHTML:true },
			//	{key: "ma",label:"Mã tài sản", sortable: true},
				{key: "ten",label:"Tên tài sản", sortable: true},
				{key:'tinhnang', label:'Tính năng',sortable: true},
				{key:'donvitinh', label:'ĐVT',sortable: true},
				{key: "soluong",label:"Số lượng",formatter: fmttextbox, allowHTML:true},
				{key: "dongia",label:"Đơn giá",formatter: fmttextbox, allowHTML:true},
				{key:'thanhtien', label:'Thành tiền',sortable: true},
				{key:'thuyetminh', label:'Thuyết minh',sortable: true},
		];
		
	dt = new Y.DataTable({
    columns: cols,
    data   : records, 
	summary: 'Danh sách tài sản - thiết bị',
    caption: 'Danh sách tài sản - thiết bị',
    render : '#mytable',
	
});	
	

	
	// -------------------------
	//  Delete 1 record
	// -------------------------      			
	dt.delegate("click", function(e) {
        var cell = e.currentTarget,               // the clicked TD
            rec  = this.getRecord(cell),          //  Call the helper method above to return the "data" record (a Model)
            ckey = this.getCellColumnKey( cell ),
            col  = this.getColumn(cell);
			         
    	//If a column 'action' is available, process it
        switch( col.name || null ) {
            case 'delete':
                if( confirm("Bạn có chắc muốn xóa không ?")) {
                    dt.removeRow( rec.get('clientId') );
                }
                break; 
        }
    }, "tbody tr td", dt); 			    

// -------------------------
//  Delete all current record if it's checked
// -------------------------      
	$('#btnXoa').click(function(){	
	
        var chks = dt.get("srcNode").all("tbody tr td input.myCheckboxFmtr");     // get all checks   
		if (confirm('Bạn có chắc muốn xóa không ?' )) {
        chks.each( function(item){
            if ( !item.get('checked') ) return;
            var rec = dt.getRecord( item.ancestor().ancestor()); // item is INPUT, first parent is TD, second is TR
			//msg += rec.get('em_id') + ' : ' + rec.get('ename') + "\n";
			dt.removeRow( rec.get('clientId') );
        }, dt);		
		}
	});
	// -------------------------
	//   Click handler on "Select" TH checkbox, toggle the settings of all rows
	// -------------------------
    Y.one("#selAll").on("click", function(e){		
        var selAll = this.get('checked');   // the checked status of the TH checkbox
    //  Get a NodeList of each of INPUT with class="myCheckboxFmtr" in the TBODY       
	var chks = dt.get('srcNode').all("tbody input.myCheckboxFmtr");
        chks.each( function(item){
            item.set('checked', selAll);    // set the individual "checked" to the TH setting			
        	});
    	});
		
	/************************************
     Method to take an existing TD or TR Node element as input "target" and scan
     the dataset (ModelList) for the underlying data record (a Model).
     @method getRecord
     @param target {Node} Either a TR or TD Node
     @returns {Model} Data record or false (or -1 if not found)
     ************************************/
     //FIXME: if target is numeric or string, not working yet ... Node only works
     Y.DataTable.prototype.getRecord = function( target ) {
        var rs = this.get('data');
        var tag = target.get('tagName').toLowerCase();
        var row = ( tag === 'td' ) ? target.ancestor() : ( tag === 'tr' ) ? target : null;
        if ( !row ) return false;
        if ( Y.Lang.isNumber(row) )         // assume row is rowindex
            return rs.item(row) || false;
        else if ( row instanceof Y.Node || Y.Lang.isString(row) ) {
            var crow = ( Y.Lang.isString(row) ) ? row : row.get('id');  // matches based on DOM id
            var rec = -1;
            rs.some( function(item) {
                if ( item.get('clientId') === crow ) {
                    rec = item;
                    return true;
                }
            });
            return rec;
        }              
        return false;
     }
	 
	 	/**
     Helper method to return the column's key property associated with the current TD.
     Uses DataTable's current method of identifying a class on TD as "yui3-datatable-col-XXX"
     where XXX is the column 'key' (or 'name')
     @method getDTColumnKey
     @param tdTarget {Node} The TD cell to return column key to
     @returns ckey {String} column key name      
     **/
     Y.DataTable.prototype.getCellColumnKey = function( tdTarget ) {
        var DT_COL_CLASS = this.getClassName('col');
        var regex = new RegExp( DT_COL_CLASS+'-(.*)'),      // currently creates /yui3-datatable-col-(.*) to grab column key
            tdclass = tdTarget.get('className').split(" "),
            ckey    = -1;
     //
     //  Scan through the TD class(es), checking for a match
     // 
        Y.Array.some( tdclass, function(item){
            var mitem = item.match( regex );
            if ( mitem && mitem[1] ) {
                ckey = mitem[1].replace(/^\s+|\s+$/g,"");   // trim all spaces
                return true;
            }
        });
        return ckey || false;
     }

	     /**
     Method to scan the "columns" Array for the target and return the requested column.
     The requested "target" can be either of ;
        a column index,
        or a TD Node,
        or a column "key", column "name" or "_yuid" (in that order).
      
     @method getColumn
     @param target {Number | Node | String} Either the column index, the TD node or a column ID
     @returns {Object} Column
     **/
    Y.DataTable.prototype.getColumn = function( target ) {
        var cs = this.get('columns'),
            ckey = null;
        if (Y.Lang.isNumber(target) )
            return cs[target];  //return cs.keys[col];
        else if ( Y.Lang.isString(target) || target instanceof Y.Node ) {   // check for 'key' or then 'name', finally '_yuid'
            ckey = ( target instanceof Y.Node ) ? ckey = this.getCellColumnKey( target ) : ckey;
            col = ( ckey ) ? ckey : target;
        // Check if a column "key"
            var cm = -1;
            Y.Array.some( cs, function(citem) {
                if ( citem['key'] === col ) {
                    cm = citem;
                    return true;
                }
            });
            if ( cm !== -1) return cm;  // found one, bail !!
        // If not found, Check if a column "name"
            Y.Array.some( cs, function(citem) {
                if ( citem.name === col ) {
                    cm = citem;
                    return true;
                }
            });
            if ( cm!==-1 ) return cm;
        // If not found, Check if a column "_yui" something
            Y.Array.some( cs, function(citem) {
                if ( citem._yuid === col ) {
                    cm = citem;
                    return true;
                }
            });
            return cm;
        } else
            return false;
     }	 
});
}
function createTable2(){
	
	YUI().use('datatable', function (Y)
 {	
	
	//Tao button Delete tren moi dong		 	
	var fmtBlank = function(o) 
	{
        var fclass = o.column.className || null;
        if (fclass)
            o.className += ' '+fclass;
        o.value = '<img src="images/drop.png" title="Xóa mẫu tin đã chọn" height="16">';
     }          
	 
	//Tao checkbox tren moi dong 
    var fmtChkBox = function(o)
	{
    	var cell = '<input type="checkbox" class="myCheckboxFmtr" />';
        	o.value = cell;
	        o.className += 'align-center';
    }
	var fmtChkBox2 = function(o)
	{
    	var cell = '<input type="checkbox" class="myCheckboxFmtr" />';
        	o.value = cell;
	        o.className += 'align-center';
    }
	var fmttextbox = function(o)
	{
    	var cell = '<input type="text" class="textbox" />';
        	o.value = cell;
	        o.className += 'align-center';
    }
	//Cac Column cua Bang
	var cols = [
				{name:'selectBox', label:'Chọn<input type="checkbox" id="selAll" title="Chọn tất cả"/>', formatter: fmtChkBox, allowHTML:true },
			//	{key: "ma",label:"Mã tài sản", sortable: true},
				{key: "ten",label:"Tên tài sản", sortable: true},
				{key:'tinhnang', label:'Tính năng',sortable: true},
				{key:'donvitinh', label:'ĐVT',sortable: true},
				{key: "soluong",label:"Số lượng",formatter: fmttextbox, allowHTML:true},
				{key: "dongia",label:"Đơn giá",formatter: fmttextbox, allowHTML:true},
				{key:'thanhtien', label:'Thành tiền',sortable: true},
				{key:'thuyetminh', label:'Thuyết minh',sortable: true},
		];
		
	dt = new Y.DataTable({
    columns: cols,
    data   : records, 
	summary: 'Danh sách tài sản - thiết bị',
    caption: 'Danh sách tài sản - thiết bị',
    render : '#mytable2',
	
});	
	

	
	// -------------------------
	//  Delete 1 record
	// -------------------------      			
	dt.delegate("click", function(e) {
        var cell = e.currentTarget,               // the clicked TD
            rec  = this.getRecord(cell),          //  Call the helper method above to return the "data" record (a Model)
            ckey = this.getCellColumnKey( cell ),
            col  = this.getColumn(cell);
			         
    	//If a column 'action' is available, process it
        switch( col.name || null ) {
            case 'delete':
                if( confirm("Bạn có chắc muốn xóa không ?")) {
                    dt.removeRow( rec.get('clientId') );
                }
                break; 
        }
    }, "tbody tr td", dt); 			    

// -------------------------
//  Delete all current record if it's checked
// -------------------------      
	$('#btnXoa').click(function(){	
	
        var chks = dt.get("srcNode").all("tbody tr td input.myCheckboxFmtr");     // get all checks   
		if (confirm('Bạn có chắc muốn xóa không ?' )) {
        chks.each( function(item){
            if ( !item.get('checked') ) return;
            var rec = dt.getRecord( item.ancestor().ancestor()); // item is INPUT, first parent is TD, second is TR
			//msg += rec.get('em_id') + ' : ' + rec.get('ename') + "\n";
			dt.removeRow( rec.get('clientId') );
        }, dt);		
		}
	});
	// -------------------------
	//   Click handler on "Select" TH checkbox, toggle the settings of all rows
	// -------------------------
    Y.one("#selAll").on("click", function(e){		
        var selAll = this.get('checked');   // the checked status of the TH checkbox
    //  Get a NodeList of each of INPUT with class="myCheckboxFmtr" in the TBODY       
	var chks = dt.get('srcNode').all("tbody input.myCheckboxFmtr");
        chks.each( function(item){
            item.set('checked', selAll);    // set the individual "checked" to the TH setting			
        	});
    	});
		
	/************************************
     Method to take an existing TD or TR Node element as input "target" and scan
     the dataset (ModelList) for the underlying data record (a Model).
     @method getRecord
     @param target {Node} Either a TR or TD Node
     @returns {Model} Data record or false (or -1 if not found)
     ************************************/
     //FIXME: if target is numeric or string, not working yet ... Node only works
     Y.DataTable.prototype.getRecord = function( target ) {
        var rs = this.get('data');
        var tag = target.get('tagName').toLowerCase();
        var row = ( tag === 'td' ) ? target.ancestor() : ( tag === 'tr' ) ? target : null;
        if ( !row ) return false;
        if ( Y.Lang.isNumber(row) )         // assume row is rowindex
            return rs.item(row) || false;
        else if ( row instanceof Y.Node || Y.Lang.isString(row) ) {
            var crow = ( Y.Lang.isString(row) ) ? row : row.get('id');  // matches based on DOM id
            var rec = -1;
            rs.some( function(item) {
                if ( item.get('clientId') === crow ) {
                    rec = item;
                    return true;
                }
            });
            return rec;
        }              
        return false;
     }
	 
	 	/**
     Helper method to return the column's key property associated with the current TD.
     Uses DataTable's current method of identifying a class on TD as "yui3-datatable-col-XXX"
     where XXX is the column 'key' (or 'name')
     @method getDTColumnKey
     @param tdTarget {Node} The TD cell to return column key to
     @returns ckey {String} column key name      
     **/
     Y.DataTable.prototype.getCellColumnKey = function( tdTarget ) {
        var DT_COL_CLASS = this.getClassName('col');
        var regex = new RegExp( DT_COL_CLASS+'-(.*)'),      // currently creates /yui3-datatable-col-(.*) to grab column key
            tdclass = tdTarget.get('className').split(" "),
            ckey    = -1;
     //
     //  Scan through the TD class(es), checking for a match
     // 
        Y.Array.some( tdclass, function(item){
            var mitem = item.match( regex );
            if ( mitem && mitem[1] ) {
                ckey = mitem[1].replace(/^\s+|\s+$/g,"");   // trim all spaces
                return true;
            }
        });
        return ckey || false;
     }

	     /**
     Method to scan the "columns" Array for the target and return the requested column.
     The requested "target" can be either of ;
        a column index,
        or a TD Node,
        or a column "key", column "name" or "_yuid" (in that order).
      
     @method getColumn
     @param target {Number | Node | String} Either the column index, the TD node or a column ID
     @returns {Object} Column
     **/
    Y.DataTable.prototype.getColumn = function( target ) {
        var cs = this.get('columns'),
            ckey = null;
        if (Y.Lang.isNumber(target) )
            return cs[target];  //return cs.keys[col];
        else if ( Y.Lang.isString(target) || target instanceof Y.Node ) {   // check for 'key' or then 'name', finally '_yuid'
            ckey = ( target instanceof Y.Node ) ? ckey = this.getCellColumnKey( target ) : ckey;
            col = ( ckey ) ? ckey : target;
        // Check if a column "key"
            var cm = -1;
            Y.Array.some( cs, function(citem) {
                if ( citem['key'] === col ) {
                    cm = citem;
                    return true;
                }
            });
            if ( cm !== -1) return cm;  // found one, bail !!
        // If not found, Check if a column "name"
            Y.Array.some( cs, function(citem) {
                if ( citem.name === col ) {
                    cm = citem;
                    return true;
                }
            });
            if ( cm!==-1 ) return cm;
        // If not found, Check if a column "_yui" something
            Y.Array.some( cs, function(citem) {
                if ( citem._yuid === col ) {
                    cm = citem;
                    return true;
                }
            });
            return cm;
        } else
            return false;
     }	 
});
}
function getRecord2(phpfile,madonvi)
{
	http=GetXmlHttpObject();
	var params ="madonvi="+madonvi;
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
					dt.data.add({ 
							ma:x[i].getElementsByTagName('MA')[0].firstChild.nodeValue, 
							ten:x[i].getElementsByTagName('TEN')[0].firstChild.nodeValue, 
							soluong:x[i].getElementsByTagName('SOLUONG')[0].firstChild.nodeValue, 
							dongia:x[i].getElementsByTagName('DONGIA')[0].firstChild.nodeValue, 
							});
							
	
				}
				
	   }
	}
	http.send(params);
}


function table() {
	var loader = new YAHOO.util.YUILoader();
	loader.loadOptional = true;
	loader.filter = 'raw';
	loader.require("reset-fonts-grids","base","datatable","calendar");
	loader.insert({ 
		onSuccess: function() 
		{
			var formatterDispatcher = function (elCell, oRecord, oColumn,oData)
			{
				var meta = oRecord.getData('meta_' + oColumn.key);
				oColumn.editorOptions = meta.editorOptions;
				switch (meta) 
				{
					case 'Number':
						YAHOO.widget.DataTable.formatNumber.call(this,elCell, oRecord, oColumn,oData);
						break;
					case 'Date':
						YAHOO.widget.DataTable.formatDate.call(this,elCell, oRecord, oColumn,oData);
						break;
					case 'Text':
						YAHOO.widget.DataTable.formatText.call(this,elCell, oRecord, oColumn,oData);
						break;
					case 'YesNoMaybe':
						elCell.innerHTML = oData;
						break;
				}
			};
			
			var editors = 
			{
				Text: new YAHOO.widget.TextboxCellEditor(),
				Number:new YAHOO.widget.TextboxCellEditor(
				{
					validator:function (val)
					{ 
						val = parseFloat(val);
						if (YAHOO.lang.isNumber(val)) {return val;}
					}
				}),
				Date:new YAHOO.widget.DateCellEditor(),
				YesNoMaybe:new YAHOO.widget.RadioCellEditor(
				{
					radioOptions:["yes","no","maybe"],disableBtns:true
				})
			};
			var myColumnDefs = [
				{key:"Rows",label:'&nbsp;',className:'th'},
				{key:"A",formatter:formatterDispatcher,editor:new YAHOO.widget.BaseCellEditor()},
				{key:"B",formatter:formatterDispatcher,editor:new YAHOO.widget.BaseCellEditor()},
				{key:"C",formatter:formatterDispatcher,editor:new YAHOO.widget.BaseCellEditor()}

			];

			var ds = new YAHOO.util.DataSource([
				{Rows:1,A:1,meta_A:'Number',B:new Date(),meta_B:'Date',C:'hello world!',meta_C:'Text'},
				{Rows:2,B:42,meta_B:'Number',A:new Date(2005,10,2),meta_A:'Date',C:'long time no see',meta_C:'Text'},
				{Rows:3,C:1,meta_C:'Number',B:new Date(),meta_B:'Date',A:'hello world!',meta_A:'Text'},
				{Rows:4,C:'yes',meta_C:'YesNoMaybe',B:new Date(),meta_B:'Date',A:'hello world!',meta_A:'Text'}
			]);
			ds.responseType = YAHOO.util.DataSource.TYPE_JSARRAY;
			ds.responseSchema = {
				fields: ['Rows','A','meta_A','B','meta_B','C','meta_C']
			};

			var dt = new YAHOO.widget.DataTable("tableContainer", myColumnDefs,ds);
			
			
			dt.subscribe("cellClickEvent", function (oArgs) 
			{
				var target = oArgs.target,
					record = this.getRecord(target),
					column = this.getColumn(target),
					type = record.getData('meta_' + column.key);
					

				column.editor = editors[type];
				this.showCellEditor(target);  
			});
		}
	});
}