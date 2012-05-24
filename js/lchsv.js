// JavaScript Document
function themlchsv(filephp,frm)
{
	var tenlchsv=frm.txt_tenlchsv.value;
	
	http=GetXmlHttpObject();
	var params = "tenlchsv="+tenlchsv;
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
			if(result=='Bạn chưa nhập tên Liên chi hội sinh viên.' || result == 'Thất bại. Liên chi hội sinh viên này đã tồn tại.')
			{
				frm.txt_tenlchsv.focus();
			}
			if(result=='Thành công.')
			{
				frm.reset();
				frm.txt_tenlchsv.focus();
				//Cap nhat lai danh sach LCHSV trong form SuaLCHSV
				fillcombo('../get_list_lchsv.php',document.frm_sualchsv.cbo_tenlchsv);			
				//Cap nhat lai danh sach LCHSV trong form XoaLCHSV
				fillcombo('../get_list_lchsv.php',document.frm_xoalchsv.cbo_tenlchsv);	
			}
		}
	}
	http.send(params);
}


function xoalchsv(filephp,frm)
{
	var idlchsv = frm.cbo_tenlchsv.value;
	http=GetXmlHttpObject();
	var params = "idlchsv="+idlchsv;
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
			if(result=='Thành công.'){
			//Cap nhat lai danh sach LCHSV trong form SuaLCHSV
			fillcombo('../get_list_lchsv.php',document.frm_sualchsv.cbo_tenlchsv);
			//Cap nhat lai danh sach LCHSV trong form XoaLCHSV
			fillcombo('../get_list_lchsv.php',document.frm_xoalchsv.cbo_tenlchsv);			

				}
		}
	}
	http.send(params);
}

function sualchsv(filephp,frm)
{
	var idlchsv = frm.cbo_tenlchsv.value;
	var tenlchsv_moi = frm.txt_tenlchsv_moi.value;
	http=GetXmlHttpObject();
	var params="idlchsv="+idlchsv;
	params+="&tenlchsv_moi="+tenlchsv_moi;
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
			if(result=='Bạn chưa nhập tên Liên chi hội sinh viên.' || result == 'Thất bại. Liên chi hội sinh viên này đã tồn tại.')
			{
				frm.txt_tenlchsv_moi.focus();
			}
			if(result=='Thành công.')
			{
				frm.reset();
		//Cap nhat lai danh sach LCHSV trong form SuaLCHSV
		fillcombo('../get_list_lchsv.php',document.frm_sualchsv.cbo_tenlchsv);
		//Cap nhat lai danh sach LCHSV trong form XoaLCHSV
		fillcombo('../get_list_lchsv.php',document.frm_xoalchsv.cbo_tenlchsv);	

			}
		}
	}
	http.send(params);
}
function get_info_lchsv(filephp, frm){
	var idlchsv = frm.cbo_tenlchsv.value;	
	http=GetXmlHttpObject();
	var params="idlchsv="+idlchsv;
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
			frm.txt_tenlchsv_moi.value = result;						
		}
	}
	http.send(params);
	}