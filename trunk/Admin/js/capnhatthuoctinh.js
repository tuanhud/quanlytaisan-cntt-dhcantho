// JavaScript Document
function FocusAndSelect(n)
{
	$(n).focus(),$(n).select()
}
function ClearInputValue(n){$(n).val("")}
function CheckEmptyInput(n)
{
	return $(n).val()==""?($(n).focus(),$(n).select(),!1):!0
}

var _admin;
		$(function()
		{
			_admin.themthuoctinh(),
			_admin.suathuoctinh(),
			_admin.xoathuoctinh()
		}),
		_admin=
			{
			
			themthuoctinh:function()
			{
				$("#btn_themthuoctinh").unbind("click").click(function()
				{
					if(CheckEmptyInput($("#txt_tenthuoctinhthem"))&&CheckEmptyInput($("#txt_ghichuthem")))
					{	
						return $.ajax
						({
							url:"./themthuoctinh.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_themthuoctinh").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0)
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại."),
									FocusAndSelect("#txt_tenthuoctinhthem")
								else if(n==1) 
								{
									alert("Thành công !"),
									fillcombo('get_list_thuoctinh.php',document.frm_suathuoctinh.cbo_tenthuoctinhsua),
									fillcombo('get_list_thuoctinh.php',document.frm_xoathuoctinh.cbo_tenthuoctinhxoa),
									ClearInputValue("#txt_tenthuoctinhthem"),
									ClearInputValue("#txt_ghichuthem"),
									FocusAndSelect("#txt_tenthuoctinhthem")
								}
								else if(n==2)
								{
									alert("Tên thuộc tính này đã tồn tại."),
									FocusAndSelect("#txt_tenthuoctinhthem")
								}
								
							},
							error:function(){},
							complete:function(){}
						}),!1
					}
					
				})
			},
			
			suathuoctinh:function()
			{
				$("#btn_suathuoctinh").unbind("click").click(function()
				{
					if($("#cbo_tenthuoctinhsua").val()==-1)
					{FocusAndSelect("#cbo_tenthuoctinhsua")}
					//else if(CheckEmptyInput($("#txt_tenthuoctinhsua"))&&CheckEmptyInput($("#txt_ghichusua")))
					else{	
						return $.ajax
						({
							url:"./suathuoctinh.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_suathuoctinh").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0)
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại."),
									FocusAndSelect("#cbo_tenthuoctinhsua")
								else if(n==1) 
								{
									alert("Thành công."),
									fillcombo('get_list_thuoctinh.php',document.frm_suathuoctinh.cbo_tenthuoctinhsua),
									fillcombo('get_list_thuoctinh.php',document.frm_xoathuoctinh.cbo_tenthuoctinhxoa),
									ClearInputValue("#txt_tenthuoctinhsua"),
									ClearInputValue("#txt_ghichusua"),
									FocusAndSelect("#cbo_tenthuoctinhsua")
								}
								else if(n==2)
								{
									alert("Bạn chưa thay đổi gì cả."),
									FocusAndSelect("#txt_tenthuoctinhsua")	
								}
							},
							error:function(){},
							complete:function(){}
						}),!1
					}
					
				})
			},
			
			xoathuoctinh:function()
			{
			 $("#btn_xoathuoctinh").unbind("click").click(function()
			 {   
			 	if($("#cbo_tenthuoctinhxoa").val()==-1){alert("Bạn chưa chọn thuộc tính.");FocusAndSelect("#cbo_tenthuoctinhxoa");}
			 	else if(confirm('Ban có chắc chắn muốn xóa không ?' ))
				{		
						return $.ajax
						({
							url:"./xoathuoctinh.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_xoathuoctinh").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0)
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại.")
								else if(n==1)
								{
									alert("Thành công."),
									fillcombo('get_list_thuoctinh.php',document.frm_suathuoctinh.cbo_tenthuoctinhsua),
									fillcombo('get_list_thuoctinh.php',document.frm_xoathuoctinh.cbo_tenthuoctinhxoa),
									$("#cbo_tenthuoctinhxoa").val()==-1,
									FocusAndSelect("#cbo_tenthuoctinhxoa")
								}
							},
							error:function(){},
							complete:function(){}
						}),!1
					  }
					
				})
			  
			},
		
		}


function get_info_thuoctinh2(filephp, frm)
{
	if(frm.cbo_tenthuoctinhsua.value==-1)
	{
		frm.txt_tenthuoctinhsua.value='';
		frm.txt_ghichusua.value='';
	}
	else
	{
	mathuoctinhsua=frm.cbo_tenthuoctinhsua.value;
	tenthuoctinh=frm.txt_tenthuoctinhsua;
	ghichu=frm.txt_ghichusua;
	
	http=GetXmlHttpObject();
	var params = "mathuoctinhsua="+mathuoctinhsua;
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
				tenthuoctinh.value=x[0].getElementsByTagName('column')[0].firstChild.nodeValue;
				ghichu.value=x[0].getElementsByTagName('column')[1].firstChild.nodeValue;
		}
	}
	http.send(params);
	}
}
function get_info_canbo2(filephp,frm)
{
	if(frm.cbo_macanboxoa.value=='Chọn mã số cán bộ')
	{
		frm.txt_tencanboxoa.value='';
	}
	else
	{
	macanbo=frm.cbo_macanboxoa.value;
	tencanbo=frm.txt_tencanboxoa;
	
	http=GetXmlHttpObject();
	var params = "macanbo="+macanbo;
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
				tencanbo.value=x[0].getElementsByTagName('column')[1].firstChild.nodeValue;
		}
	}
	http.send(params);
	}
	}
