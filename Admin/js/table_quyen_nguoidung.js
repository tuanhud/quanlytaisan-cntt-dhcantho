var records;
var dt;
// -------------------------
//  Create Table 
// -------------------------      
function createTable_nguoidung(){
	
	YUI().use('datatable', function (Y)
 {	
	
	//Tao button Delete tren moi dong		 	
	var fmtBlank = function(o) 
	{
        var fclass = o.column.className || null;
        if (fclass)
            o.className += ' '+fclass;
        o.value = ' ';
     }          
	
	//Tao checkbox
	 var ADMIN = function(o)
	{
    	var cell = '<input type="checkbox" class="ADMIN" />';
        	o.value = cell;
	        o.className += 'align-center';
    }
	 var CBQLBM = function(o)
	{
    	var cell = '<input type="checkbox" class="CBQLBM" />';
        	o.value = cell;
	        o.className += 'align-center';
    }
	 var GV = function(o)
	{
    	var cell = '<input type="checkbox" class="GV" />';
        	o.value = cell;
	        o.className += 'align-center';
    }
    var DUYETVPP = function(o)
	{
    	var cell = '<input type="checkbox" class="DUYETVPP" />';
        	o.value = cell;
	        o.className += 'align-center';
    }
	var DUYETKHMS = function(o)
	{
    	var cell = '<input type="checkbox" class="DUYETKHMS"/>';
        	o.value = cell;
	        o.className += 'align-center';
    }
	var QLKK = function(o)
	{
    	var cell = '<input type="checkbox" class="QLKK" />';
        	o.value = cell;
	        o.className += 'align-center';
    }
	var LOCKKK = function(o)
	{
    	var cell = '<input type="checkbox" class="LOCKKK" />';
        	o.value = cell;
	        o.className += 'align-center';
    }
	var QLVPP = function(o)
	{
    	var cell = '<input type="checkbox" class="QLVPP" />';
        	o.value = cell;
	        o.className += 'align-center';
    }
	var QLKHMS = function(o)
	{
    	var cell = '<input type="checkbox" class="QLKHMS" />';
        	o.value = cell;
	        o.className += 'align-center';
    }
	var PDTVPP = function(o)
	{
    	var cell = '<input type="checkbox" class="PDTVPP" />';
        	o.value = cell;
	        o.className += 'align-center';
    }
	var DUYETKHMSBM = function(o)
	{
    	var cell = '<input type="checkbox" class="DUYETKHMSBM" />';
        	o.value = cell;
	        o.className += 'align-center';
    }
	var fmtChkBox9 = function(o)
	{
    	var cell = '<input type="checkbox" class="myCheckboxFmtr9" />';
        	o.value = cell;
	        o.className += 'align-center';
    }
	var fmtChkBox10 = function(o)
	{
    	var cell = '<input type="checkbox" class="myCheckboxFmtr10" />';
        	o.value = cell;
	        o.className += 'align-center';
    }

	//Cac Column cua Bang
	var cols = [
				{name:'canbo', label:'<p align="center">Cán bộ</p>',className:'align-center',
				children:
				[
						{key: "id",label:'<p align="center">Mã cán bộ</p>', sortable: true},
						{key: "ten",label:'<p align="center">Họ tên</p>', sortable: true},
				]},
				{name:'quyendn', label:'<p align="center">Quyền đăng nhập</p>',className:'align-center',
				children:
				[
				  {name:'ADMIN', label:'<p align="center">ADMIN</p>',formatter:ADMIN,allowHTML:true},
				  {name:'CBQLBM',label:'<p align="center">CBQLBM</p>',formatter:CBQLBM,allowHTML:true},
				  {name:'GV',label:'<p align="center">GV</p>',formatter:GV,allowHTML:true},
				]
				},
				{name:'donvi', label:'<p align="center">Quyền Admin</p>',className:'align-center',
				children:
				[
					{name:'vpp', label:'<p align="center">Duyệt</p>',
					children:
					[
						{name:'DUYETVPP', label:'VPP', formatter:DUYETVPP,allowHTML:true},
						{name:'DUYETKHMS', label:'KHMS', formatter: DUYETKHMS,allowHTML:true},
					]},
					{name:'QLKK', label:'<p align="center">QLKK</p>',
						children:
						[
							{name:'QLKK', label:'Quản lý kiểm kê', formatter: QLKK,allowHTML:true},
							{name:'KHOAKK', label:'LOCK KK', formatter: LOCKKK,allowHTML:true},
						]
					},
					{name:'QLVPP', label:'QLVPP',formatter: QLVPP,allowHTML:true},
					{name:'QLKHMS',label:'QLKHMS',formatter: QLKHMS,allowHTML:true},
					
				]},
				{name:'khoa', label:'<p align="center">Quyền cán bộ quản lý</p>',className:'align-center',
				children:
				[
					{name:'DUYET', label:'<p align="center">Duyệt</p>',
					children:
					[
						{name:'PDTVPP', label:'Lập phiếu dự trù VPP',formatter:PDTVPP,allowHTML:true},
						{name:'DUYETKHMSBM', label:'Duyệt KHMS', formatter: DUYETKHMSBM, allowHTML:true},
					]},
				]},
		
		];
	dt = new Y.DataTable({
    columns: cols,
    data   : records, 
	summary: 'Danh sách người dùng - quyền ',
    caption: 'Danh sách người dùng - quyền',
    render : '#mytable'
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
	dt.reset();
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

