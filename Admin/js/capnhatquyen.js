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
			_admin.themquyen(),
			_admin.suaquyen(),
			_admin.xoaquyen()
		}),
		_admin=
			{
			
			themquyen:function()
			{
				$("#btn_themquyen").unbind("click").click(function()
				{
					if(CheckEmptyInput($("#txt_tenquyen"))&&CheckEmptyInput($("#txt_diengiai")))
					{	
						return $.ajax
						({
							url:"./themquyen.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_themquyen").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0)
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại.")
								else if(n==1) 
								{
									alert("Thành công !"),
									fillcombo('get_list_quyen.php',document.frm_suaquyen.cbo_tenquyensua);
									fillcombo('get_list_quyen.php',document.frm_xoaquyen.cbo_tenquyenxoa);
									ClearInputValue($("#txt_tenquyen")),
									ClearInputValue($("#txt_diengiai")),
									FocusAndSelect($("#txt_tenquyen"))
								}
								else if(n==2)
								{
									alert("Quyền này đã tồn tại."),
									FocusAndSelect($("#txt_tenquyen"))
								}
								
							},
							error:function(){},
							complete:function(){}
						}),!1
					}
					
				})
			},
			
			suaquyen:function()
			{
				$("#btn_suaquyen").unbind("click").click(function()
				{
					if($("#cbo_tenquyensua").val()==-1)
					{
						FocusAndSelect("#cbo_tenquyensua")
					}
					else if(CheckEmptyInput($("#txt_tenquyensua"))&&CheckEmptyInput($("#txt_diengiaisua")))
					{	
						return $.ajax
						({
							url:"./suaquyen.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_suaquyen").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0)
									alert("Bạn chưa thay đổi gì cả."),
									FocusAndSelect("#txt_tenquyensua")
								else if(n==1) 
								{
									alert("Thành công."),
									fillcombo('get_list_quyen.php',document.frm_suaquyen.cbo_tenquyensua);
									fillcombo('get_list_quyen.php',document.frm_xoaquyen.cbo_tenquyenxoa);
									ClearInputValue($("#txt_tenquyensua")),
									ClearInputValue($("#txt_diengiaisua")),
									FocusAndSelect($("#cbo_tenquyensua"))
								}
								else if(n==2)
								{
									alert("Tên quyền này đã tồn tại."),
									FocusAndSelect("#txt_tenquyensua")	
								}
							},
							error:function(){},
							complete:function(){}
						}),!1
					}
					
				})
			},
			
			xoaquyen:function()
			{
			 $("#btn_xoaquyen").unbind("click").click(function()
			 {   
			 	if (confirm('Ban có chắc chắn muốn xóa không ?' ))
				{	
					if(CheckEmptyInput($("#cbo_tenquyenxoa")))
					{	
						return $.ajax
						({
							url:"./xoaquyen.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_xoaquyen").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0)
									alert("Bạn chưa thay đổi gì cả.")
								else if(n==1)
								{
									alert("Thành công."),
									fillcombo('get_list_quyen.php',document.frm_suaquyen.cbo_tenquyensua);
									fillcombo('get_list_quyen.php',document.frm_xoaquyen.cbo_tenquyenxoa);
									ClearInputValue($("#txt_diengiaixoa")),
									FocusAndSelect($("#cbo_tenquyenxoa"))
								}
								else if(n==2)
								{
									alert("Bạn chưa chọn tên quyền.")	
								}
							},
							error:function(){},
							complete:function(){}
						}),!1
					  }
					}
					
				})
			  
			},
		
		}


function get_info_quyen(filephp, frm)
{
	if(frm.cbo_tenquyensua.value==-1)
	{
		frm.txt_tenquyensua.value='';
		frm.txt_diengiaisua.value='';
	}
	else
	{
		maquyen = frm.cbo_tenquyensua.value;
		tenquyensua=frm.txt_tenquyensua;
		diengiai=frm.txt_diengiaisua;
		http=GetXmlHttpObject();
		var params = "maquyen="+maquyen;
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
				tenquyensua.value=x[0].getElementsByTagName('column')[1].firstChild.nodeValue;
				diengiai.value=x[0].getElementsByTagName('column')[2].firstChild.nodeValue;
				frm.txt_tenquyensua.focus();
			}
		}
		http.send(params);
		
		}
	}
function get_info_quyen2(filephp,frm)
{
	if(frm.cbo_tenquyenxoa.value==-1)
	{
		frm.txt_diengiaixoa.value='';
	}
	else
	{
	maquyen=frm.cbo_tenquyenxoa.value;
	diengiai=frm.txt_diengiaixoa;
	
	http=GetXmlHttpObject();
	var params = "maquyen="+maquyen;
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
				diengiai.value=x[0].getElementsByTagName('column')[2].firstChild.nodeValue;
		}
	}
	http.send(params);
	}
}