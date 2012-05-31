// JavaScript Document
function FocusAndSelect(n){
	
		$(n).focus(),$(n).select()
	}

function ClearInputValue(n){
		$(n).val("")
	}
function CheckEmptyInput(n){
		return $(n).val=="" ? ($(n).focus(),$(n).select(),!1) : !0
	}
	var _admin;
		$(function(){
				_admin.themloaikiemke()
				_admin.sualoaikiemke(),
				_admin.xoaloaikiemke()
			}),
			_admin=
			{
				themloaikiemke:function(){
						$("#btn_themloaikiemke").unbind("click").click(function()
						{
							//if($("#txt_tenloaikiemke").val()==-1) FocusAndSelect("#txt_tenloaikiemke");
						    if($("#txt_tenloaikiemke").val()=="") 
								alert("Bạn chưa nhập tên loại kiểm kê!"),
								FocusAndSelect("#txt_tenloaikiemke");
							else
							{	
									return $.ajax
									({
												url:"./themloaikiemke.php",
												type:"POST",
												data:$("#frm_themloaikiemke").serialize(),
												beforeSend:function(){},
												success:function(n){
													if(n==0)
														alert("Đã có lỗi xảy ra. Vui lòng kiểm tra lại!")		
													else if(n==1){
														alert("Thêm thành công!"),
														fillcombo('get_list_loaikiemke.php',document.frm_sualoaikiemke.cbo_tenloaikiemkesua);
														fillcombo('get_list_loaikiemke.php',document.frm_xoaloaikiemke.cbo_tenloaikiemkexoa);
														ClearInputValue("#txt_tenloaikiemke"),
														FocusAndSelect("txt_tenloaikiemke")
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
					sualoaikiemke:function()
			{
				$("#btn_luuloaikiemke").unbind("click").click(function()
				{
					if($("#txt_tenloaikiemkemoi").val()==-1) FocusAndSelect("#txt_tenloaikiemkemoi");
									else if($("#txt_tenloaikiemkemoi").val()=="")
									alert("Bạn chưa nhập tên mới!"),
									 FocusAndSelect("#txt_tenloaikiemkemoi");
					else
					{		
						return $.ajax
						({
							url:"./sualoaikiemke.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_sualoaikiemke").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0)
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại."),
									FocusAndSelect("#cbo_tenloaikiemke")
								else if(n==1) 
								{
									alert("Thành công !"),
									fillcombo('get_list_loaikiemke.php',document.frm_sualoaikiemke.cbo_tenloaikiemkesua);
									fillcombo('get_list_loaikiemke.php',document.frm_xoaloaikiemke.cbo_tenloaikiemkexoa);
									ClearInputValue("#txt_tenloaikiemkemoi"),
									FocusAndSelect("#cbo_tenloaikiemkesua")
								}
								else if(n==2)
								{
									alert("Tên đơn vị này đã tồn tại."),
									FocusAndSelect("#txt_tenloaikiemkemoi")	
								}
							},
							error:function(){},
							complete:function(){}
						}),!1
					}
					
				})
			},
			
			xoaloaikiemke:function()
			{
			 $("#btn_xoaloaikiemke").unbind("click").click(function()
			 {   
			 	if (confirm('Ban có chắc chắn muốn xóa không ?' ))
				{	
					if(CheckEmptyInput($("#cbo_tenloaikiemkexoa")))
					{	
						return $.ajax
						({
							url:"./xoaloaikiemke.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_xoaloaikiemke").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0)
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại.")
								else if(n==1)
								{
									alert("Thành công !"),
									fillcombo('get_list_loaikiemke.php',document.frm_sualoaikiemke.cbo_tenloaikiemkesua);
									fillcombo('get_list_loaikiemke.php',document.frm_xoaloaikiemke.cbo_tenloaikiemkexoa);
									FocusAndSelect("#cbo_tenloaikiemke")
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
function get_info_loaikiemkesua(filephp, frm)
{
	if(frm.cbo_tenloaikiemkesua.value==-1)
	{
		frm.txt_maloaikiemke.value='';
	}
	else
	{
		var maloaikiemke = frm.cbo_tenloaikiemkesua.value;
		http=GetXmlHttpObject();
		var params = "maloaikiemke="+maloaikiemke;
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
				frm.txt_maloaikiemke.value = result;
			}
		}
		http.send(params);
		
		}
	}
	
function get_info_loaikiemkexoa(filephp, frm)
{
	if(frm.cbo_tenloaikiemkexoa.value==-1)
	{
		frm.txt_maloaikiemkexoa.value='';
	}
	else
	{
		var maloaikiemke = frm.cbo_tenloaikiemkexoa.value;
		http=GetXmlHttpObject();
		var params = "maloaikiemke="+maloaikiemke;
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
				frm.txt_maloaikiemkexoa.value = result;
			}
		}
		http.send(params);
		
		}
	}