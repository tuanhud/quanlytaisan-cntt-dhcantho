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
			_admin.themdonvitinh()
			_admin.suadonvitinh(),
			_admin.xoadonvitinh()
		}),
		_admin=
			{
			
			themdonvitinh:function()
			{
				$("#btn_themdonvitinh").unbind("click").click(function()
				{
					if(CheckEmptyInput($("#txt_tendonvitinhthem")))
					{	
						return $.ajax
						({
							url:"./themdonvitinh.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_themdonvitinh").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0)
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại.")
								else if(n==1) 
								{
									alert("Thành công.")
									fillcombo2('get_list_donvitinh.php',document.frm_xoadonvitinh.cbo_tendonvitinhxoa),
	fillcombo2('get_list_donvitinh.php',document.frm_suadonvitinh.cbo_tendonvitinhsua),
									ClearInputValue("#txt_tendonvitinhthem"),
									FocusAndSelect("#txt_tendonvitinhthem")
								}
								else if(n==2)
								{
									alert("Đơn vị tính này đã tồn tại.")
								}
								
							},
							error:function(){},
							complete:function(){}
						}),!1
					}
					
				})
			},
			
			suadonvitinh:function()
			{
				$("#btn_suadonvitinh").unbind("click").click(function()
				{
					if(CheckEmptyInput($("#txt_tendonvitinhsua")))
					{	
						return $.ajax
						({
							url:"./suadonvitinh.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_suadonvitinh").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0)
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại."),
									FocusAndSelect("#cbo_tendonvitinhsua")
								else if(n==1) 
								{
									alert("Thành công !"),
									fillcombo2('get_list_donvitinh.php',document.frm_xoadonvitinh.cbo_tendonvitinhxoa),
	fillcombo2('get_list_donvitinh.php',document.frm_suadonvitinh.cbo_tendonvitinhsua),
									ClearInputValue("#txt_tendonvitinhsua"),
									FocusAndSelect("#cbo_tendonvitinhsua")
								}
								else if(n==2)
								{
									alert("Tên đơn vị tính này đã tồn tại."),
									FocusAndSelect("#txt_tendonvitinhsua")	
								}
							},
							error:function(){},
							complete:function(){}
						}),!1
					}
					
				})
			},
			
			xoadonvitinh:function()
			{
			 $("#btn_xoadonvitinh").unbind("click").click(function()
			 {   
			 	if (confirm('Ban có chắc chắn muốn xóa không ?' ))
				{	
					if(CheckEmptyInput($("#cbo_tendonvitinhxoa")))
					{	
						return $.ajax
						({
							url:"./xoadonvitinh.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_xoadonvitinh").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0)
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại.")
								else if(n==1)
								{
									alert("Thành công !"),
									fillcombo2('get_list_donvitinh.php',document.frm_suadonvitinh.cbo_tendonvitinhsua),
									fillcombo2('get_list_donvitinh.php',document.frm_xoadonvitinh.cbo_tendonvitinhxoa),
									FocusAndSelect("#cbo_tendonvitinhxoa")
								}
								else if(n==2)
								{
									alert("Bạn chưa chọn tên đơn vị.")	
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


function get_info_donvitinh(filephp, frm)
{
	if(frm.cbo_tendonvitinhsua.value==-1)
	{
		frm.txt_tendonvitinhsua.value='';
	}
	else
	{
		var madonvitinhsua = frm.cbo_tendonvitinhsua.value;
		http=GetXmlHttpObject();
		var params = "madonvitinhsua="+madonvitinhsua;
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
				var result=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
				frm.txt_tendonvitinhsua.value = result;
			}
		}
		http.send(params);
		
		}
	}
