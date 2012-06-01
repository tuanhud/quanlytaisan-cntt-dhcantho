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
			_admin.themloaivpp(),
			_admin.sualoaivpp(),
			_admin.xoaloaivpp()
		}),
		_admin=
			{
			
			themloaivpp:function()
			{
				$("#btn_themloaivpp").unbind("click").click(function()
				{
					if(CheckEmptyInput($("#txt_tenloaivppthem")))
					{	
						return $.ajax
						({
							url:"./themloaivanphongpham.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_themloaivpp").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0)
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại.")
								else if(n==1) 
								{
									alert("Thành công !"),
									fillcombo('get_list_loaivpp.php',document.frm_sualoaivpp.cbo_tenloaivppsua),
									fillcombo('get_list_loaivpp.php',document.frm_xoaloaivpp.cbo_tenloaivppxoa),
									ClearInputValue("#txt_tenloaivppthem"),
									ClearInputValue("#txt_diengiailoaivppthem"),
									FocusAndSelect("#txt_tenloaivppthem")
								}
								else
								{
									alert("Loại văn phòng phẩm này đã tồn tại.")
								}
								
							},
							error:function(){},
							complete:function(){}
						}),!1
					}
					
				})
			},
			
			sualoaivpp:function()
			{
				$("#btn_sualoaivpp").unbind("click").click(function()
				{
					if(CheckEmptyInput($("#txt_tenloaivppsua")))
					{	
						return $.ajax
						({
							url:"./sualoaivanphongpham.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_sualoaivpp").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0){
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại."),
									FocusAndSelect("#cbo_tenloaivppsua")
								}
								else if(n==1) 
								{
									alert("Thành công !"),
									fillcombo('get_list_loaivpp.php',document.frm_sualoaivpp.cbo_tenloaivppsua);
									fillcombo('get_list_loaivpp.php',document.frm_xoaloaivpp.cbo_tenloaivppxoa);
									ClearInputValue("#txt_tenloaivppsua"),
									ClearInputValue("#txt_diengiailoaivppsua"),
									FocusAndSelect("#cbo_tenloaivppsua")
								}
								else
								{
									alert("Tên loại văn phòng phẩm này đã tồn tại."),
									FocusAndSelect("#txt_tenloaivppsua")	
								}
							},
							error:function(){},
							complete:function(){}
						}),!1
					}
					
				})
			},
			
			xoaloaivpp:function()
			{
			 $("#btn_xoaloaivpp").unbind("click").click(function()
			 {   
			 	if (confirm('Bạn có chắc chắn muốn xóa không ?' ))
				{	
					if(CheckEmptyInput($("#cbo_tenloaivppxoa")))
					{	
						return $.ajax
						({
							url:"./xoaloaivanphongpham.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_xoaloaivpp").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0)
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại.")
								else if(n==1)
								{
									alert("Thành công !"),
									fillcombo('get_list_loaivpp.php',document.frm_sualoaivpp.cbo_tenloaivppsua);
									fillcombo('get_list_loaivpp.php',document.frm_xoaloaivpp.cbo_tenloaivppxoa);
									ClearInputValue("#txt_tenloaivppxoa"),
									ClearInputValue("#txt_diengiailoaivppxoa"),
									FocusAndSelect("#cbo_tenloaivppxoa")
								}
								else if(n==2)
								{
									alert("Bạn chưa chọn loại văn phòng phẩm.")	
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


function get_info_loaivpp(filephp, frm)
{
	if(frm.cbo_tenloaivppsua.value==-1)
	{
		frm.txt_tenloaivppsua.value='';
		frm.txt_diengiailoaivppsua.value='';
	}
	else
	{
		var maloaivppsua = frm.cbo_tenloaivppsua.value;
		http=GetXmlHttpObject();
		var params = "maloaivppsua="+maloaivppsua;
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
				txt_tenloaivppsua.value=x[0].getElementsByTagName('column')[1].firstChild.nodeValue;
				txt_diengiailoaivppsua.value=x[0].getElementsByTagName('column')[2].firstChild.nodeValue;
			}
		}
		http.send(params);
		
		}
	}
function get_info_loaivpp2(filephp, frm)
{
	if(frm.cbo_tenloaivppxoa.value=="-1")
	{
		frm.txt_tenloaivppxoa.value='';
		frm.txt_diengiailoaivppxoa.value='';
	}
	else
	{
		var maloaivppsua = frm.cbo_tenloaivppxoa.value;
		http=GetXmlHttpObject();
		var params = "maloaivppsua="+maloaivppsua;
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
				txt_tenloaivppxoa.value=x[0].getElementsByTagName('column')[1].firstChild.nodeValue;
				txt_diengiailoaivppxoa.value=x[0].getElementsByTagName('column')[2].firstChild.nodeValue;
			}
		}
		http.send(params);
		
		}
	}