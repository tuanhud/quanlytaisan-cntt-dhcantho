// JavaScript Document
function themchsv(filephp,frm)
{
	var idlchsv=frm.cbo_tenlchsv.value;
	var tenchsv=frm.txt_tenchsv.value;
	http=GetXmlHttpObject();
	var params = "idlchsv="+idlchsv;
	params+="&tenchsv="+tenchsv;
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
			if(result=='Bạn chưa nhập tên Chi hội sinh viên.' || result == 'Thất bại. Chi hội sinh viên này đã tồn tại.')
			{
				frm.txt_tenchsv.focus();
			}
			if(result=='Thành công.')
			{
				frm.reset();
				frm.txt_tenchsv.focus();
				_fillcombo('../get_list_chsv.php',document.frm_suachsv.cbo_tenlchsv,document.frm_suachsv.cbo_tenchsv);
				_fillcombo('../get_list_chsv.php',document.frm_xoachsv.cbo_tenlchsv,document.frm_xoachsv.cbo_tenchsv);
			}
		}
	}
	http.send(params);
}


function xoachsv(filephp,frm)
{
	var idchsv = frm.cbo_tenchsv.value;
	http=GetXmlHttpObject();
	var params = "idchsv="+idchsv;
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
				_fillcombo('../get_list_chsv.php',document.frm_suachsv.cbo_tenlchsv,document.frm_suachsv.cbo_tenchsv);
				_fillcombo('../get_list_chsv.php',document.frm_xoachsv.cbo_tenlchsv,document.frm_xoachsv.cbo_tenchsv);
				}
		}
	}
	http.send(params);
}

function suachsv(filephp,frm)
{
	var idchsv = frm.cbo_tenchsv.value;
	var idlchsv = frm.cbo_tenlchsv.value;
	var tenchsv_moi = frm.txt_tenchsv_moi.value;
	http=GetXmlHttpObject();
	var params="idlchsv="+idlchsv;
	params+="&idchsv="+idchsv;
	params+="&tenchsv_moi="+tenchsv_moi;
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
			if(result=='Bạn chưa chọn Chi hội sinh viên.')
			{
				frm.cbo_tenchsv.focus();
			}
			else if(result=='Thành công.')
			{
				frm.reset();
				_fillcombo('../get_list_chsv.php',document.frm_suachsv.cbo_tenlchsv,document.frm_suachsv.cbo_tenchsv);
				_fillcombo('../get_list_chsv.php',document.frm_xoachsv.cbo_tenlchsv,document.frm_xoachsv.cbo_tenchsv);
			}
			else
			{
				frm.txt_tenchsv_moi.focus();
				}
		}
	}
	http.send(params);
}
function get_info_chsv(filephp, frm){
	var idchsv = frm.cbo_tenchsv.value;	
	http=GetXmlHttpObject();
	var params="idchsv="+idchsv;
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
			frm.txt_tenchsv_moi.value = result;			
			frm.txt_tenchsv_moi.focus();
		}
	}
	http.send(params);
	}