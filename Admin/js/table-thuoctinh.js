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
<<<<<<< .mine
				{name:'selectBox', label:'Chọn<input type="checkbox" id="selAll" title="Chọn tất cả"/>', formatter: fmtChkBox, allowHTML:true },
				{key: "ma",label:"Mã thuộc tính", sortable: true},
				{key: "ten",label:"Tên thuộc tính", sortable: true},
				{key: "giatri",label:"Giá trị thuộc tính",formatter: fmttextbox, allowHTML:true}
=======
				{name:'selectBox', label:'<button type="button" id="btnXoa" title="Xóa các mẫu tin đã chọn" style="border:none; background-color:transparent; float:left;"><img src="images/drop.png" title="Xóa các mẫu tin đã chọn" height="16"></button>Chọn <input type="checkbox" id="selAll" title="Chọn tất cả"/>', formatter: fmtChkBox2, allowHTML:true },
				{key:'them', label:'Thêm', formatter: fmtChkBox2, className:'align-center',allowHTML:true},
				{key:'sua', label:'Sửa', formatter: fmtChkBox, className:'align-center', allowHTML:true},
				{key: "stt",label:"STT", sortable: true},
				{key: "id",label:"Mã số", sortable: true},
				{key: "ten",label:"Họ tên", sortable: true,
				
						//formatter: fmttextbox, allowHTML:true
				},
				{key: "giatri",label:"Chuyên ngành", sortable: false,
						//formatter: fmttextbox, allowHTML:true
				
				},
				{key: "ghichu",label:"Khóa học", sortable: true}
		
>>>>>>> .r100
		];
	dt = new Y.DataTable({
    columns: cols,
    data   : records,
	summary: 'Danh sách thuộc tính',
    caption: 'Danh sách thuộc tính',
    render : '#mytable'
});	
	
getRecord2('get_info_thuoctinh.php');
	
function getRecord2(phpfile)
{
	http=GetXmlHttpObject();
	var params ="";
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
							giatri:x[i].getElementsByTagName('GIATRI')[0].firstChild.nodeValue,
							});
							
	
				}
				
	   }
	}
	http.send(params);
}
	
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