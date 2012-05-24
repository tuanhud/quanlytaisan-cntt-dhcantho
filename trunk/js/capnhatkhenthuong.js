var _stt = 0, _id, _hoten, _chuyennganh, _khoahoc, numRow = 0;
var flag = 0;
function getRecord(phpfile,hoivien_id)
{
	http=GetXmlHttpObject();
	var params ="hoivien_id="+hoivien_id;
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
		var x = http.responseXML.getElementsByTagName('RESULT');		
				_id    		 = x[0].getElementsByTagName('ID')[0].childNodes[0].nodeValue;
				_hoten 		 = x[0].getElementsByTagName('HOTEN')[0].childNodes[0].nodeValue;
				_chuyennganh = x[0].getElementsByTagName('CHUYENNGANH')[0].childNodes[0].nodeValue;
				_khoahoc     = x[0].getElementsByTagName('KHOAHOC')[0].childNodes[0].nodeValue;
	   }
	}
	http.send(params);
}

function autoComplete(phpfile, frm){
	var params ="idchsv="+frm.cbo_tenchsv.value;
	http=GetXmlHttpObject();
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
					   var hv_ten = new Array();					   
					   for(var i=0;i<x.length;i++)
					   {      
						hv_ten[i]= x[i].getElementsByTagName('ID')[0].firstChild.nodeValue + "\t"+ x[i].getElementsByTagName('HOTEN')[0].firstChild.nodeValue;
					   }
YUI({ filter: 'raw' }).use('datatable','autocomplete', 'autocomplete-filters', 'autocomplete-highlighters', function (Y) {
	autoCom = new Y.one('#txt_tenhoivien');	
	autoCom.plug(Y.Plugin.AutoComplete,{
    resultFilters    : 'phraseMatch',
    resultHighlighter: 'phraseMatch',
	enableCache			: false,
	maxResults		:10,
    source           : hv_ten
  	});
	//autoCom.unplug(Y.Plugin.AutoComplete);
	//Xu ly su kien chon Item
    autoCom.ac.after('select', function (e){ 
			getRecord('./get_info_hoivien.php',e.result.raw.substr(0,7));		
			dt.addRow({
            	stt   		: _stt += 1,
	            id 			: _id,
    	        hoten		: _hoten,
				chuyennganh	: _chuyennganh,
				khoahoc		: _khoahoc
        	});
			if($('#btnXoa').css("visibility", "hidden")) $('#btnXoa').css("visibility", "visible");
			var chks = dt.get('srcNode').all("tbody input.myCheckboxFmtr");
	        chks.each( function(item){
            numRow += 1;
        	});
			_stt = numRow;
			numRow = 0;
    });	
	
function importDSHV(filephp){
	http=GetXmlHttpObject();
//	var params = "idkhenthuong="+idkhenthuong;
	//mo ket noi bang phuong thuc post
	http.open("POST", filephp, false);
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//http.setRequestHeader("Content-length", params.length);
	http.setRequestHeader("Connection", "close");
	//ham xu li du lieu tra ve cua ajax send thanh cong
	http.onreadystatechange = function()
	{
		if(http.readyState == 4 && http.status == 200) 
		{
			var x=http.responseXML.getElementsByTagName('RESULT');
					   for(var i=0;i<x.length;i++)
					   {      
							/*info[i]={						
								stt:i+1,
								id:x[i].getElementsByTagName('ID')[0].firstChild.nodeValue,
								hoten:x[i].getElementsByTagName('HOTEN')[0].firstChild.nodeValue,								
								chuyennganh:x[i].getElementsByTagName('CHUYENNGANH')[0].firstChild.nodeValue,
								khoahoc:x[i].getElementsByTagName('KHOAHOC')[0].firstChild.nodeValue
								};*/
								getRecord('get_info_hoivien.php',x[i].getElementsByTagName('ID')[0].childNodes[0].nodeValue);
								dt.addRow({
            						stt   		: _stt += 1,
						            id 			: _id,
					    	        hoten		: _hoten,
									chuyennganh	: _chuyennganh,
									khoahoc		: _khoahoc
        						});
								if($('#btnXoa').css("visibility", "hidden")) $('#btnXoa').css("visibility", "visible");
								var chks = dt.get('srcNode').all("tbody input.myCheckboxFmtr");
						        chks.each( function(item){
						            numRow += 1;
					        	});
								_stt = numRow;
								numRow = 0;
						}
		}
	}
	http.send();
}
	$('#btnImport').click(function(){
		importDSHV('./get_list_hoivien_fromfile.php');
		});
numofSus = 0;
numofFai = 0;		
// JavaScript Document
function themHoivien_Khenthuong(filephp,frm, hoivien_id)
{
	var khenthuong_id = frm.cbo_tenkhenthuong.value;
	var quyetdinh = frm.txt_quyetdinh.value;
	var ngay = frm.cbo_ngay.value;
	var thang = frm.cbo_thang.value;
	var nam = frm.cbo_nam.value;
	http=GetXmlHttpObject();
	var hocki_id =frm.cbo_tenhocki.value;	
	var params = "hocki_id="+hocki_id;
	params+="&khenthuong_id="+khenthuong_id;
	params+="&quyetdinh="+quyetdinh;
	params+="&ngay="+ngay;	
	params+="&thang="+thang;
	params+="&nam="+nam;
	params+="&hoivien_id="+hoivien_id;
	//mo ket noi bang phuong thuc post
	http.open("POST", filephp, false);
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.setRequestHeader("Content-length", params.length);
	http.setRequestHeader("Connection", "close");
	//ham xu li du lieu tra ve cua ajax send thanh cong
	http.onreadystatechange = function() 
	{
		if(http.readyState == 4 && http.status == 200) 
		{
			var result=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
			if(result=='Thành công.') numofSus +=1;
			else 
			{
				numofFai += 1;
			}
		}
	}
	http.send(params);
}
	$('#btnSave').click(function(){
		//Lay du lieu tu client
	var khenthuong_id = frm.cbo_tenkhenthuong.value;
	var quyetdinh = frm.txt_quyetdinh.value;
	var ngay = frm.cbo_ngay.value;
	var thang = frm.cbo_thang.value;
	var nam = frm.cbo_nam.value;			

	if(khenthuong_id==-1) {
		alert("Bạn chưa chọn hình thức khen thưởng");
		frm.cbo_tenkhenthuong.focus();
		return;
		}
	if(quyetdinh=="") {
		alert("Bạn chưa nhập Số quyết định");
		frm.txt_quyetdinh.focus();
		return;
		}	
	if(!isValidDate(ngay, thang, nam)){
//		alert(ngay + thang + nam);
		alert("Ngày khen thưởng không hợp lệ");
		return;
		}
	try{
		var chks = dt.get('srcNode').all("tbody input.myCheckboxFmtr");
		chks.each( function(item){
			var rec = dt.getRecord( item.ancestor().ancestor() );
			themHoivien_Khenthuong('themhoivien_khenthuong.php',document.frm_capnhatkhenthuong,rec.get('id') );
//		    alert(rec.get('id'));
		   	});
		alert("Thành công : " + numofSus + "\nThất bại: " + numofFai);
		numofSus = numofFai = 0;
	}
	catch(ex)
	{
		alert("Có lỗi xảy ra: " + ex.message);
		}
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
	
	 var fmtBlank = function(o) {
        var fclass = o.column.className || null;
        if (fclass)
            o.className += ' '+fclass;
        o.value = ' ';
     }          
     var fmtChkBox = function(o){
    	var cell = '<input type="checkbox" class="myCheckboxFmtr" />';
        	o.value = cell;
	        o.className += ' align-center';
    }
	var cols = [
				{name:'selectBox', label:'Chọn <input type="checkbox" id="selAll" title="Chọn tất cả"/>', formatter: fmtChkBox, allowHTML:true },
				{name:'delete', label:'Xóa', formatter: fmtBlank, className:'align-center cell-delete'},
				{key: "stt",label:"STT", sortable: true},
				{key: "id",label:"Mã số", sortable: true},
				{key: "hoten",label:"Họ tên", sortable: true},
				{key: "chuyennganh",label:"Chuyên ngành", sortable: false},
				{key: "khoahoc",label:"Khóa học", sortable: true}
		],
    data, dt;
    // Define the removeItems function - this will be called when
    // 'Remove All Items' is pressed on the modal form and is confirmed 'yes'
    // by the nested panel.
    function removeItems() {
        dt.data.reset();
    //    panel.hide();
    }
	if(flag==0){
    // Create the DataTable.	
    dt = new Y.DataTable({
        columns: cols,
        data   : data,
        summary: 'Danh sách hội viên được khen thưởng',
        caption: 'Danh sách hội viên được khen thưởng',
        render : '#mytable'
    });		
	}		
	flag = 1;
	
	//Xoa 1 Record			
	dt.delegate("click", function(e) {
        var cell = e.currentTarget,               // the clicked TD
            rec  = this.getRecord(cell),          //  Call the helper method above to return the "data" record (a Model)
            ckey = this.getCellColumnKey( cell ),
            col  = this.getColumn(cell);         
    //
    //  If a column 'action' is available, process it
    // 
        switch( col.name || null ) {
            case 'delete':
                if( confirm("Bạn có chắc muốn xóa không ?")) {
                    dt.removeRow( rec.get('clientId') );
                }
                break; 
        }
    }, "tbody tr td", dt);

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
	// -------------------------
	//  Handle the "Process Selected Rows" BUTTON press,
	// -------------------------
    $("#btnXoa").click(function(){   
        var chks = dt.get("srcNode").all("tbody tr td input.myCheckboxFmtr");     // get all checks   
		if (confirm('Bạn có chắc muốn xóa không ?' )) {
        chks.each( function(item){
            if ( !item.get('checked') ) return;
            var rec = dt.getRecord( item.ancestor().ancestor()); // item is INPUT, first parent is TD, second is TR
	//          msg += rec.get('em_id') + ' : ' + rec.get('ename') + "\n";
			dt.removeRow( rec.get('clientId') );
        }, dt);
		if($('#selAll').is(':checked')) 
			$('#selAll').attr('checked', false);
		}
    }, dt);
});
	}
}
http.send(params);
}

function keypress(e){	
var keypressed = null;
if (window.event){
	keypressed = window.event.keyCode; //IE
}
else{ 
	keypressed = e.which; //NON-IE, Standard
}

if (keypressed < 48 || keypressed > 57){ 
	//CharCode của 0 là 48 (Theo bảng mã ASCII)
	//CharCode của 9 là 57 (Theo bảng mã ASCII)
	if (keypressed == 8 || keypressed == 127){
	//Phím Delete và Phím Back
	return;
	}
	return false;
}
}