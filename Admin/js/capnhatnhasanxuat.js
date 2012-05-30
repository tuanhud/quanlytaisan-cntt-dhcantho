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
			_admin.themnsx(),
			_admin.suansx(),
			_admin.xoansx()
		}),
		_admin=
			{
			
			themnsx:function()
			{
				$("#btn_themnsx").unbind("click").click(function()
				{
					if(CheckEmptyInput($("#txt_tennsxthem")))
					{	
						return $.ajax
						({
							url:"./themnhasanxuat.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_themnsx").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0)
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại.")
								else if(n==1) 
								{
									alert("Thành công !"),
									fillcombo2('get_list_nhasanxuat.php',document.frm_suansx.cbo_mansxsua),
									fillcombo2('get_list_nhasanxuat.php',document.frm_xoansx.cbo_mansxxoa),
									ClearInputValue("#txt_tennsxthem"),
									FocusAndSelect("#txt_tennsxthem")
								}
								else
								{
									alert("Nhà sản xuất này đã tồn tại.")
								}
								
							},
							error:function(){},
							complete:function(){}
						}),!1
					}
					
				})
			},
			
			suansx:function()
			{
				$("#btn_suansx").unbind("click").click(function()
				{
					if(CheckEmptyInput($("#txt_tennsxsua")))
					{	
						return $.ajax
						({
							url:"./suanhasanxuat.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_suansx").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0){
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại."),
									FocusAndSelect("#cbo_tennsxsua")
								}
								else if(n==1) 
								{
									alert("Thành công !"),
									fillcombo2('get_list_nhasanxuat.php',document.frm_suansx.cbo_mansxsua);
									fillcombo2('get_list_nhasanxuat.php',document.frm_xoansx.cbo_mansxxoa);
									ClearInputValue("#txt_tennsxsua"),
									FocusAndSelect("#cbo_tennsxsua")
								}
								else
								{
									alert("Tên nhà sản xuất này đã tồn tại."),
									FocusAndSelect("#txt_tennsxsua")	
								}
							},
							error:function(){},
							complete:function(){}
						}),!1
					}
					
				})
			},
			
			xoansx:function()
			{
			 $("#btn_xoansx").unbind("click").click(function()
			 {   
			 	if (confirm('Bạn có chắc chắn muốn xóa không ?' ))
				{	
					if(CheckEmptyInput($("#cbo_mansxxoa")))
					{	
						return $.ajax
						({
							url:"./xoanhasanxuat.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_xoansx").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0)
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại.")
								else if(n==1)
								{
									alert("Thành công !"),
									fillcombo2('get_list_nhasanxuat.php',document.frm_suansx.cbo_mansxsua),
									fillcombo2('get_list_nhasanxuat.php',document.frm_xoansx.cbo_mansxxoa),
									ClearInputValue("#txt_tennsxxoa"),
									FocusAndSelect("#cbo_tennsxxoa")
								}
								else if(n==2)
								{
									alert("Bạn chưa chọn mã nhà sản xuất.")	
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


function get_info_nhasanxuat(filephp, frm)
{
	if(frm.cbo_mansxsua.value=="-Chọn mã nhà sản xuất-")
	{
		frm.txt_tennsxsua.value='';
	}
	else
	{
		var mansxsua = frm.cbo_mansxsua.value;
		http=GetXmlHttpObject();
		var params = "mansxsua="+mansxsua;
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
				frm.txt_tennsxsua.value = result;
			}
		}
		http.send(params);
		
		}
	}
function get_info_nhasanxuat2(filephp, frm)
{
	if(frm.cbo_mansxxoa.value=="-Chọn mã nhà sản xuất-")
	{
		frm.txt_tennsxxoa.value='';
	}
	else
	{
		var mansxsua = frm.cbo_mansxxoa.value;
		http=GetXmlHttpObject();
		var params = "mansxsua="+mansxsua;
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
				frm.txt_tennsxxoa.value = result;
			}
		}
		http.send(params);
		
		}
	}