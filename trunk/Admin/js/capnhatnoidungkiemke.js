// JavaScript Document
function FocusAndSelect(n){
		$(n).focus(),$(n).select()
	}
function CheckEmptyInput(n){
		return $(n).val()=="" ? ($(n).focus(),$(n).select(),!1):!0
	}
function ClearInputValue(n){$(n).val("")}

var _admin;
	$(function()
		{
			_admin.themnoidungkiemke(),
			_admin.suanoidungkiemke(),
			_admin.xoanoidungkiemke()
			}),
			_admin=
			{
				themnoidungkiemke:function(){
						$("#btn_themnoidungkiemke").unbind("click").click(function()
						{
							if($("#txt_tennoidungkiemke").val()==""){
								alert("Bạn chưa nhập tên nội dung kiểm kê!");
								FocusAndSelect("#txt_tennoidungkiemke");
							}
							else if($("#txt_tendonvitinhthem").val()==""){
								alert("Bạn chưa nhập đơn vị tính!");
								FocusAndSelect("#txt_tendonvitinhthem");
							}
							else{
									return $.ajax
									({
										url:"./themnoidungkiemke.php",
												type:"POST",
												data:$("#frm_themnoidungkiemke").serialize(),
												beforeSend:function(){},
												success:function(n){
													if(n==0)
														alert("Đã có lỗi xảy ra. Vui lòng kiểm tra lại!")		
													else if(n==1){
														alert("Thêm thành công!"),
														fillcombo('get_list_noidungkiemke.php',document.frm_suanoidungkiemke.cbo_tennoidungkiemkesua);
														fillcombo('get_list_noidungkiemke.php',document.frm_xoanoidungkiemke.cbo_tennoidungkiemkexoa);
														document.frm_themnoidungkiemke.txt_tennoidungkiemke.value='',
														document.frm_themnoidungkiemke.txt_tendonvitinhthem.value='',
														document.frm_themnoidungkiemke.txt_ghichu.value='',
														FocusAndSelect("txt_tennoidungkiemke")
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
					suanoidungkiemke:function(){
						$("#btn_luunoidungkiemke").unbind("click").click(function()
						{
							if($("#txt_tennoidungkiemkemoi").val()==""){
								alert("Bạn chưa nhập tên nội dung kiểm kê mới!");
								FocusAndSelect("#txt_tennoidungkiemkemoi");
							}
							else if($("#txt_tendonvitinhtsua").val()==""){
								alert("Bạn chưa nhập đơn vị tính!");
								FocusAndSelect("#txt_tendonvitinhtsua");
							}
							else{
									return $.ajax
									({
										url:"./suanoidungkiemke.php",
												type:"POST",
												data:$("#frm_suanoidungkiemke").serialize(),
												beforeSend:function(){},
												success:function(n){
													if(n==0)
														alert("Đã có lỗi xảy ra. Vui lòng kiểm tra lại!")		
													else if(n==1){
														alert("Cập nhật thành công!"),
														fillcombo('get_list_noidungkiemke.php',document.frm_suanoidungkiemke.cbo_tennoidungkiemkesua);
														fillcombo('get_list_noidungkiemke.php',document.frm_xoanoidungkiemke.cbo_tennoidungkiemkexoa);
														document.frm_suanoidungkiemke.cbo_tennoidungkiemkesua.value=-1,
														document.frm_suanoidungkiemke.txt_manoidungkiemkesua.value='',
														document.frm_suanoidungkiemke.txt_tennoidungkiemkemoi.value='',
														document.frm_suanoidungkiemke.txt_tendonvitinhsua.value='',
														document.frm_suanoidungkiemke.txt_ghichusua.value='',
														FocusAndSelect("cbo_tennoidungkiemkesua")
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
					xoanoidungkiemke:function(){
						$("#btn_xoanoidungkiemke").unbind("click").click(function()
						{
							if($("#cbo_tennoidungkiemkexoa").val()!=-1)
							{
							if(confirm('Ban có chắc chắn muốn xóa không ?' ))
							{
									return $.ajax
									({
										url:"./xoanoidungkiemke.php",
												type:"POST",
												data:$("#frm_xoanoidungkiemke").serialize(),
												beforeSend:function(){},
												success:function(n){
													if(n==0)
														alert("Đã có lỗi xảy ra. Vui lòng kiểm tra lại!")		
													else if(n==1){
														alert("Nội dung kiểm kê đã được xóa thành công!"),
														fillcombo('get_list_noidungkiemke.php',document.frm_suanoidungkiemke.cbo_tennoidungkiemkesua);
														fillcombo('get_list_noidungkiemke.php',document.frm_xoanoidungkiemke.cbo_tennoidungkiemkexoa);
														document.frm_xoanoidungkiemke.cbo_tennoidungkiemkexoa.value=-1,
														document.frm_xoanoidungkiemke.txt_manoidungkiemkexoa.value='',
														document.frm_xoanoidungkiemke.txt_tendonvitinhxoa.value='',
														document.frm_xoanoidungkiemke.txt_ghichuxoa.value='',
														FocusAndSelect("cbo_tennoidungkiemkexoa")
													}
																																			
													},
													error:function(){},
													complete:function(){}
											}),!1
								}
										else{
												alert("Bạn chưa chọn nội dung kiểm kê muốn xóa!");
												FocusAndSelect("#cbo_tennoidungkiemkexoa");
											}		
								}
							})
					}
			}
function get_info_noidungkiemkesua(filephp,frm)
{
	if(frm.cbo_tennoidungkiemkesua.value==-1)
	{
		frm.txt_manoidungkiemkesua.value='';
		frm.txt_tennoidungkiemkemoi.value='';
		frm.txt_tendonvitinhsua.value='';
		frm.txt_ghichusua.value='';
	}
	else
	{
	var manoidung=frm.cbo_tennoidungkiemkesua.value;
	
	http=GetXmlHttpObject();
	var params = "manoidung="+manoidung;
	//mo ket noi bang phuong thuc post
	http.open("POST", filephp, false);
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//http.setRequestHeader("Content-length", params.length);
	//http.setRequestHeader("Connection", "close");
	//ham xu li du lieu tra ve cua ajax send thanh cong
	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) 
		{				
				var x=http.responseXML.getElementsByTagName('row');							
			    frm.txt_manoidungkiemkesua.value=x[0].getElementsByTagName('column')[0].firstChild.nodeValue;
				frm.txt_tendonvitinhsua.value=x[0].getElementsByTagName('column')[1].firstChild.nodeValue;
				frm.txt_ghichusua.value=x[0].getElementsByTagName('column')[3].firstChild.nodeValue;
		}
	}
	http.send(params);
	}
}
function get_info_noidungkiemkexoa(filephp,frm)
{
	if(frm.cbo_tennoidungkiemkexoa.value==-1)
	{
		frm.txt_manoidungkiemkexoa.value='';
		frm.txt_tendonvitinhxoa.value='';
		frm.txt_ghichuxoa.value='';
	}
	else
	{
	var manoidung=frm.cbo_tennoidungkiemkexoa.value;
	
	http=GetXmlHttpObject();
	var params = "manoidung="+manoidung;
	//mo ket noi bang phuong thuc post
	http.open("POST", filephp, false);
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//http.setRequestHeader("Content-length", params.length);
	//http.setRequestHeader("Connection", "close");
	//ham xu li du lieu tra ve cua ajax send thanh cong
	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) 
		{				
				var x=http.responseXML.getElementsByTagName('row');							
			    frm.txt_manoidungkiemkexoa.value=x[0].getElementsByTagName('column')[0].firstChild.nodeValue;
				frm.txt_tendonvitinhxoa.value=x[0].getElementsByTagName('column')[1].firstChild.nodeValue;
				frm.txt_ghichuxoa.value=x[0].getElementsByTagName('column')[3].firstChild.nodeValue;
		}
	}
	http.send(params);
	}
}