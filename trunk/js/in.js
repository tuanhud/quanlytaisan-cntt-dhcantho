function timkiemDSHV_LCHSV_CHSV_NHHK(phpfile){
	
	http=GetXmlHttpObject();
	//var params ="ngay="+ngay;
	//mo ket noi bang phuong thuc post
	http.open("POST", phpfile, false);
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//http.setRequestHeader("Content-length", params.length);
	http.setRequestHeader("Connection", "close");
	//ham xu li du lieu tra ve cua ajax send thanh cong
	http.onreadystatechange = function() {
	if(http.readyState == 4 && http.status == 200) 
	   {
					   var x=http.responseXML.getElementsByTagName('RESULT');
					   var info = new Array();
					   for(var i=0;i<x.length;i++)
					   {      
							info[i]={
								stt:x[i].getElementsByTagName('STT')[0].firstChild.nodeValue,
								maso:x[i].getElementsByTagName('MASO')[0].firstChild.nodeValue,
								hoten:x[i].getElementsByTagName('HOTEN')[0].firstChild.nodeValue,
								chuyennganh:x[i].getElementsByTagName('CHUYENNGANH')[0].firstChild.nodeValue,
								khoahoc:x[i].getElementsByTagName('KHOAHOC')[0].firstChild.nodeValue,
								dantoc:x[i].getElementsByTagName('DANTOC')[0].firstChild.nodeValue,
								tongiao:x[i].getElementsByTagName('TONGIAO')[0].firstChild.nodeValue
								};
						}
		YUI().use("datatable-sort", function (Y) {
    var simpleCols = [
	{key: "stt",label:"STT", sortable: true},
	{key: "maso",label:"Mã số", sortable: true},
	{key: "hoten",label:"Họ tên", sortable: true},
	{key: "chuyennganh",label:"Chuyên ngành", sortable: false},
	{key: "khoahoc",label:"Khóa học", sortable: true},
	{key: "dantoc",label:"Dân tộc", sortable: false},
	{key: "tongiao",label:"Tôn giáo", sortable: false}	
	],
    simpleData = info,
    /*labeledCols = [
        {key:"mfr_parts_database_id", label:"Mfr Part ID", abbr:"ID"},
        {key:"mfr_parts_database_name", label:"Mfr Part Name", abbr:"Name"},
        {key:"mfr_parts_database_price", label:"Wholesale Price", abbr:"Price"}
    ],
    labeledData = [
        {mfr_parts_database_id:"ga_3475", mfr_parts_database_name:"gadget", mfr_parts_database_price:"$6.99"},
        {mfr_parts_database_id:"sp_9980", mfr_parts_database_name:"sprocket", mfr_parts_database_price:"$3.75"},
        {mfr_parts_database_id:"wi_0650", mfr_parts_database_name:"widget", mfr_parts_database_price:"$4.25"}
    ],*/

    dt1 = new Y.DataTable.Base({columnset:simpleCols, recordset:simpleData, summary:"Price sheet for inventory parts", caption:"Danh sách hội viên"}).plug(Y.Plugin.DataTableSort)
	.render("#mytable");
    /*dt2 = new Y.DataTable.Base({columnset:labeledCols, recordset:labeledData, summary:"Price sheet for inventory parts", caption:"These columns have labels and abbrs"}).render("#labels");*/
});
	   }
	}
	http.send();
}