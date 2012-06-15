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
			_admin.themdonvi(),
			_admin.suadonvi(),
			_admin.xoadonvi()
		}),
		_admin=
			{
			
			themdonvi:function()
			{
				$("#btn_themdonvi").unbind("click").click(function()
				{
					if(CheckEmptyInput($("#txt_tendonvithem")))
					{	
						return $.ajax
						({
							url:"./themdonvi.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_themdonvi").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0)
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại.")
								else if(n==1) 
								{
									alert("Thành công !"),
									fillcombo('get_list_donvi.php',document.frm_suadonvi.cbo_tendonvisua);
									fillcombo('get_list_donvi.php',document.frm_xoadonvi.cbo_tendonvixoa);
									ClearInputValue("#txt_tendonvithem"),
									FocusAndSelect("#txt_tendonvithem")
								}
								else
								{
									alert("Đơn vị này đã tồn tại."),
									FocusAndSelect("#txt_tendonvithem")
								}
								
							},
							error:function(){},
							complete:function(){}
						}),!1
					}
					
				})
			},
			
			suadonvi:function()
			{
				$("#btn_suadonvi").unbind("click").click(function()
				{
					if(CheckEmptyInput($("#txt_tendonvisua")))
					{	
						return $.ajax
						({
							url:"./suadonvi.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_suadonvi").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0)
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại."),
									FocusAndSelect("#cbo_tendonvisua")
								else if(n==1) 
								{
									alert("Thành công."),
									fillcombo('get_list_donvi.php',document.frm_suadonvi.cbo_tendonvisua);
									fillcombo('get_list_donvi.php',document.frm_xoadonvi.cbo_tendonvixoa);
									ClearInputValue("#txt_tendonvisua"),
									FocusAndSelect("#cbo_tendonvisua")
								}
								else if(n==2)
								{
									alert("Bạn chưa thay đổi gì cả."),
									FocusAndSelect("#txt_tendonvisua")	
								}
							},
							error:function(){},
							complete:function(){}
						}),!1
					}
					
				})
			},
			
			xoadonvi:function()
			{
			 $("#btn_xoadonvi").unbind("click").click(function()
			 {   
			 	if (confirm('Ban có chắc chắn muốn xóa không ?' ))
				{	
					if($("#cbo_tendonvixoa").val()==-1){alert("Bạn chưa chọn đơn vị.");FocusAndSelect("#cbo_tendonvixoa")}
					else
					{	
						return $.ajax
						({
							url:"./xoadonvi.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_xoadonvi").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0)
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại.")
								else if(n==1)
								{
									alert("Thành công !"),
									fillcombo('get_list_donvi.php',document.frm_suadonvi.cbo_tendonvisua),
									fillcombo('get_list_donvi.php',document.frm_xoadonvi.cbo_tendonvixoa),
									FocusAndSelect("#cbo_tendonvixoa")
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


function get_info_donvi(filephp, frm)
{
	if(frm.cbo_tendonvisua.value==-1)
	{
		frm.txt_tendonvisua.value='';
	}
	else
	{
		var madonvisua = frm.cbo_tendonvisua.value;
		http=GetXmlHttpObject();
		var params = "madonvisua="+madonvisua;
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
				frm.txt_tendonvisua.value = result;
			}
		}
		http.send(params);
		
		}
	}
