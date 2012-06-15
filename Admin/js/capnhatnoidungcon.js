// JavaScript Document
function FocusAndSelect(n){
		$(n).focus(),$(n).select()
	}
function CheckEmptyInput(n){
		return $(n).val()=="" ? ($(n).focus(),$(n).select(),!1):!0
	}
function ClearInputValue(n){$(n).val("")}

var _admin;
		$(function(){
				_admin.themnoidungcon()
				_admin.suanoidungcon()
				//_admin.xoasuathanhly()
			}),
			_admin=
			{
				themnoidungcon:function(){
						$("#btn_themnoidungcon").unbind("click").click(function()
						{
							if($("#cbo_tennoidunglon").val()==-1) {
								alert("Bạn chưa chọn tên nội dung lớn!");
								FocusAndSelect("#cbo_tennoidunglon");}
						    else if($("#cbo_tennoidungcon").val()==-1) 
								alert("Bạn chưa chọn tên nội dung con!"),
								FocusAndSelect("#cbo_tennoidungcon");
							else
							{	
									return $.ajax
									({
												url:"./themnoidungcon.php",
												type:"POST",
												data:$("#frm_themnoidungcon").serialize(),
												beforeSend:function(){},
												success:function(n){
													if(n==0)
														alert("Đã có lỗi xảy ra. Vui lòng kiểm tra lại!")		
													else if(n==1){
														alert("Thêm thành công!"),
														fillcombo('get_list_noidungcon.php',document.frm_suanoidungcon.cbo_tennoidungcon);
														fillcombo('get_list_noidungcon.php',document.frm_xoanoidungcon.cbo_tennoidungconxoa);
														document.frm_themnoidungcon.cbo_tennoidunglon.value=-1;
														document.frm_themnoidungcon.txt_manoidunglon.value='';
														document.frm_themnoidungcon.cbo_tennoidungcon.value=-1;
														FocusAndSelect("cbo_tennoidunglon")
													}
													else{
																alert("Tên đã tồn tại!")
															}																									
													},
													error:function(){},
													complete:function(){}
											}),!1
								}
							})
					},
					suanoidungcon:function(){
						$("#btn_sua").unbind("click").click(function()
						{
							alert("Thông báo");
							/*if($("#cbo_tennoidungcon").val()==-1) {
								alert("Bạn chưa chọn tên nội dung con cần sửa!");
								FocusAndSelect("#cbo_tennoidungcon");}
						    else if($("#cbo_tennoidunglon").val()==-1) {
								alert("Bạn chưa chọn tên nội dung lớn!"),
								FocusAndSelect("#cbo_tennoidunglon");}
							else if($("#cbo_tennoidungconmoi").val()==-1) {
								alert("Bạn chưa chọn tên nội dung con mới!"),
								FocusAndSelect("#cbo_tennoidungconmoi");}
							else
							{	
									return $.ajax
									({
												url:"./suanoidungcon.php",
												type:"POST",
												data:$("#frm_suanoidungcon").serialize(),
												beforeSend:function(){},
												success:function(n){
													if(n==0)
														alert("Đã có lỗi xảy ra. Vui lòng kiểm tra lại!")		
													else if(n==1){
														alert("Cập nhật thành công!"),
														fillcombo('get_list_noidungcon.php',document.frm_suanoidungcon.cbo_tennoidungcon);
														fillcombo('get_list_noidungcon.php',document.frm_xoanoidungcon.cbo_tennoidungconxoa);
														document.frm_suanoidungcon.cbo_tennoidungcon.value=-1;
														document.frm_suanoidungcon.txt_manoidungcon.value='';
														document.frm_suanoidungcon.cbo_tennoidunglon.value=-1;
														document.frm_suanoidungcon.cbo_tennoidungconmoi.value=-1;
														FocusAndSelect("cbo_tennoidungcon")
													}
													else{
																alert("Tên đã tồn tại!")
															}																									
													},
													error:function(){},
													complete:function(){}
											}),!1
								}*/
							})
					}
			}
function get_info_manoidunglonthem(filephp, frm)
{
	if(frm.cbo_tennoidunglon.value==-1)
	{
		frm.txt_manoidunglon.value='';
	}
	else
	{
		var manoidung = frm.cbo_tennoidunglon.value;
		http=GetXmlHttpObject();
		var params = "manoidung="+manoidung;
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
				var result=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
				frm.txt_manoidunglon.value = result;
			}
		}
		http.send(params);
		
		}
	}
function get_info_manoidunglonsua(filephp, frm)
{
	if(frm.cbo_tennoidunglon.value==-1)
	{
		frm.txt_manoidunglon.value='';
	}
	else
	{
		var manoidung = frm.cbo_tennoidunglon.value;
		http=GetXmlHttpObject();
		var params = "manoidung="+manoidung;
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
				var result=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
				frm.txt_manoidunglon.value = result;
			}
		}
		http.send(params);
		
		}
	}
function get_info_noidungconsua(filephp, manoidung)
{
		http=GetXmlHttpObject();
		var params = "manoidung="+manoidung;
		//mo ket noi bang phuong thuc post
		http.open("POST", filephp, false);
		//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
		http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		//http.setRequestHeader("Content-length", params.length);
		//http.setRequestHeader("Connection", "close");
		//ham xu li du lieu tra ve cua ajax send thanh cong
		http.onreadystatechange = function()
		{
			if(http.readyState == 4 && http.status == 200) 
			{
				dt.reset();
				var x=http.responseXML.getElementsByTagName('RESULT');
				for(var i=0;i<x.length;i++){
						dt.data.add({
							sothutu:x[i].getElementsByTagName('STT')[0].firstChild.nodeValue,
							manoidungcon:x[i].getElementsByTagName('MANDC')[0].firstChild.nodeValue,
							tennoidungcon:x[i].getElementsByTagName('TENNDC')[0].firstChild.nodeValue,
							manoidunglon:x[i].getElementsByTagName('MANDL')[0].firstChild.nodeValue,
							tennoidunglon:x[i].getElementsByTagName('TENNDL')[0].firstChild.nodeValue,
						    //trangthaisua:x[i].getElementsByTagName('SUA')[0].firstChild.nodeValue,
							//trangthaixoa:x[i].getElementsByTagName('XOA')[0].firstChild.nodeValue,
							});
					}
			}
		}
		http.send(params);
}
