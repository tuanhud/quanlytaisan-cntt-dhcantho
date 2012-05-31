﻿// JavaScript Document
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
			_admin.themncc(),
			_admin.suancc(),
			_admin.xoancc()
		}),
		_admin=
			{
			
			themncc:function()
			{
				$("#btn_themncc").unbind("click").click(function()
				{
					if(CheckEmptyInput($("#txt_tennccthem")))
					{	
						return $.ajax
						({
							url:"./themnhacungcap.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_themncc").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0)
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại.")
								else if(n==1) 
								{
									alert("Thành công !"),
									fillcombo('get_list_nhacungcap.php',document.frm_suancc.cbo_manccsua),
									fillcombo('get_list_nhacungcap.php',document.frm_xoancc.cbo_manccxoa),
									ClearInputValue("#txt_tennccthem"),
									ClearInputValue("#txt_diachinccthem"),
									ClearInputValue("#txt_sdtnccthem"),
									FocusAndSelect("#txt_tennccthem")
								}
								else
								{
									alert("Nhà cung cấp này đã tồn tại.")
								}
								
							},
							error:function(){},
							complete:function(){}
						}),!1
					}
					
				})
			},
			
			suancc:function()
			{
				$("#btn_suancc").unbind("click").click(function()
				{
					if(CheckEmptyInput($("#txt_tennccsua")))
					{	
						return $.ajax
						({
							url:"./suanhacungcap.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_suancc").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0){
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại."),
									FocusAndSelect("#cbo_tennccsua")
								}
								else if(n==1) 
								{
									alert("Thành công !"),
									fillcombo('get_list_nhacungcap.php',document.frm_suancc.cbo_manccsua);
									fillcombo('get_list_nhacungcap.php',document.frm_xoancc.cbo_manccxoa);
									ClearInputValue("#txt_tennccsua"),
									ClearInputValue("#txt_diachinccsua"),
									ClearInputValue("#txt_sdtnccsua"),
									FocusAndSelect("#cbo_tennccsua")
								}
								else
								{
									alert("Tên nhà cung cấp này đã tồn tại."),
									FocusAndSelect("#txt_tennccsua")	
								}
							},
							error:function(){},
							complete:function(){}
						}),!1
					}
					
				})
			},
			
			xoancc:function()
			{
			 $("#btn_xoancc").unbind("click").click(function()
			 {   
			 	if (confirm('Bạn có chắc chắn muốn xóa không ?' ))
				{	
					if(CheckEmptyInput($("#cbo_manccxoa")))
					{	
						return $.ajax
						({
							url:"./xoanhacungcap.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_xoancc").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0)
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại.")
								else if(n==1)
								{
									alert("Thành công !"),
									fillcombo('get_list_nhacungcap.php',document.frm_suancc.cbo_manccsua),
									fillcombo('get_list_nhacungcap.php',document.frm_xoancc.cbo_manccxoa),
									ClearInputValue("#txt_tennccxoa"),
									ClearInputValue("#txt_diachinccxoa"),
									ClearInputValue("#txt_sdtnccxoa"),
									FocusAndSelect("#cbo_tennccxoa")
								}
								else if(n==2)
								{
									alert("Bạn chưa chọn mã nhà cung cấp.")	
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


function get_info_nhacungcap(filephp, frm)
{
	if(frm.cbo_manccsua.value==-1)
	{
		frm.txt_tennccsua.value='';
		frm.txt_diachinccsua.value='';
		frm.txt_sdtnccsua.value='';
	}
	else
	{
		var manccsua = frm.cbo_manccsua.value;
		http=GetXmlHttpObject();
		var params = "manccsua="+manccsua;
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
				var x=http.responseXML.getElementsByTagName('row');								
				txt_tennccsua.value=x[0].getElementsByTagName('column')[1].firstChild.nodeValue;
				txt_diachinccsua.value=x[0].getElementsByTagName('column')[2].firstChild.nodeValue;
				txt_sdtnccsua.value=x[0].getElementsByTagName('column')[3].firstChild.nodeValue;
			}
		}
		http.send(params);
		
		}
	}
function get_info_nhacungcap2(filephp, frm)
{
	if(frm.cbo_manccxoa.value=="-1")
	{
		frm.txt_tennccxoa.value='';
		frm.txt_diachinccxoa.value='';
		frm.txt_sdtnccxoa.value='';
	}
	else
	{
		var manccsua = frm.cbo_manccxoa.value;
		http=GetXmlHttpObject();
		var params = "manccsua="+manccsua;
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
				var x=http.responseXML.getElementsByTagName('row');								
				txt_tennccxoa.value=x[0].getElementsByTagName('column')[1].firstChild.nodeValue;
				txt_diachinccxoa.value=x[0].getElementsByTagName('column')[2].firstChild.nodeValue;
				txt_sdtnccxoa.value=x[0].getElementsByTagName('column')[3].firstChild.nodeValue;
			}
		}
		http.send(params);
		
		}
	}