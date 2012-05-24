// JavaScript Document
function themchucvu(filephp,frm)
{
	var ban_id=frm.cbo_tenban.value;
	var chucvu_ten=frm.txt_tenchucvu.value;
	http=GetXmlHttpObject();
	var params = "ban_id="+ban_id;
	params+="&chucvu_ten="+chucvu_ten;
	//mo ket noi bang phuong thuc post
	http.open("POST", filephp, false);
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.setRequestHeader("Content-length", params.length);
	http.setRequestHeader("Connection", "close");
	//ham xu li du lieu tra ve cua ajax send thanh cong
	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) 
		{
			var result=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
			alert(result);
			if(result=='Thành công.')
			{
				frm.reset();
				_fillcombo('../get_list_chucvu.php',document.frm_suachucvu.cbo_tenchucvu,document.frm_suachucvu.cbo_tenchucvu);
				_fillcombo('../get_list_chucvu.php',document.frm_xoachucvu.cbo_tenchucvu,document.frm_xoachucvu.cbo_tenchucvu);
			}
			else if(result=='Bạn chưa chọn Ban.') frm.cbo_tenchucvu.focus();
			else frm.txt_tenchucvu.focus();
		}
	}
	http.send(params);
}

function xoachucvu(filephp,frm)
{
	var chucvu_id = frm.cbo_tenchucvu.value;
	http=GetXmlHttpObject();
	var params = "chucvu_id="+chucvu_id;
	//mo ket noi bang phuong thuc post
	http.open("POST", filephp, false);
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.setRequestHeader("Content-length", params.length);
	http.setRequestHeader("Connection", "close");
	//ham xu li du lieu tra ve cua ajax send thanh cong
	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) 
		{
			var result=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
			alert(result);
			if(result=='Thành công.')
			{
				frm.reset();
				_fillcombo('../get_list_chucvu.php',document.frm_suachucvu.cbo_tenchucvu,document.frm_suachucvu.cbo_tenchucvu);
				_fillcombo('../get_list_chucvu.php',document.frm_xoachucvu.cbo_tenchucvu,document.frm_xoachucvu.cbo_tenchucvu);
				}
		}
	}
	http.send(params);
}

function suachucvu(filephp,frm)
{
	var chucvu_id = frm.cbo_tenchucvu.value;
	var ban_id = frm.cbo_tenban.value;
	var chucvu_ten = frm.txt_tenchucvu.value;
	http=GetXmlHttpObject();
	var params="ban_id="+ban_id;
	params+="&chucvu_id="+chucvu_id;
	params+="&chucvu_ten="+chucvu_ten;
	//mo ket noi bang phuong thuc post
	http.open("POST", filephp, false);
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.setRequestHeader("Content-length", params.length);
	http.setRequestHeader("Connection", "close");
	//ham xu li du lieu tra ve cua ajax send thanh cong
	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) 
		{			
			var result=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
			alert(result);
			if(result=='Bạn chưa chọn Chức vụ.'){
				frm.cbo_tenchucvu.focus();
			}
			else if(result=='Thành công.'){
				frm.reset();
				_fillcombo('../get_list_chucvu.php',document.frm_suachucvu.cbo_tenchucvu,document.frm_suachucvu.cbo_tenchucvu);
				_fillcombo('../get_list_chucvu.php',document.frm_xoachucvu.cbo_tenchucvu,document.frm_xoachucvu.cbo_tenchucvu);			
				}
			else{
				frm.txt_tenchucvu.focus();
			}
		}
	}
	http.send(params);
}