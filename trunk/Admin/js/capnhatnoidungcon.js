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
						$("#abc").unbind("click").click(function()
						{
							if($("#cbo_tennoidungcon").val()==-1) {
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
								}
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
function get_info_noidungconsua(filephp, frm)
{
	if(frm.cbo_tennoidungcon.value==-1)
	{
		frm.txt_manoidungcon.value='';
		frm.cbo_tennoidunglon.value=-1;
		frm.txt_manoidunglon.value='';
	}
	else
	{
		var manoidung = frm.cbo_tennoidungcon.value;
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
				var x=http.responseXML.getElementsByTagName('row');
				frm.txt_manoidungcon.value = x[0].getElementsByTagName('column')[0].firstChild.nodeValue;
				alert(x[0].getElementsByTagName('column')[1].firstChild.nodeValue);
				frm.cbo_tennoidunglon.value=x[0].getElementsByTagName('column')[1].firstChild.nodeValue;
				frm.txt_manoidunglon.value=x[0].getElementsByTagName('column')[2].firstChild.nodeValue;
			}
		}
		http.send(params);
		
		}
}
//function getdata(){
//			var data = new Array();
//			http=GetXmlHttpObject();
//			var params='';
//			http.open("POST",'get_info_datanoidungcon.php', false);
//			http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//			http.onreadystatechange = function()
//			{
//				if(http.readyState == 4 && http.status == 200) 
//				{
//					var x=http.responseXML.getElementsByTagName('INFO');
//					for(var i=0;i<x.length;i++)//lay duoc danh sach cac quyen ma can bo (macanbo) co
//					{
//						var row = {};
//						var noidungcon = Math.floor(Math.random() * x.length);
//					//	alert(x[i].getElementsByTagName('RESULT2')[1].firstChild.nodeValue);
//						/*row["stt"] = i + 1;
//						row["mandlon"] = x[i].getElementsByTagName('RESULT2')[1].firstChild.nodeValue;
//						row["tenndlon"] = x[i].getElementsByTagName('RESULT2')[2].firstChild.nodeValue;
//						row["mandcon"] = x[i].getElementsByTagName('RESULT2')[0].firstChild.nodeValue;*/
//						row["tenndcon"] = x[noidungcon];						
//						data[i] = row;
//					}
//				}
//			}
//			http.send(params);
//			return data;
//	}
