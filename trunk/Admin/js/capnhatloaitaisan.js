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
			_admin.themloaitaisan(),
			_admin.sualoaitaisan(),
			_admin.xoaloaitaisan()
		}),
		_admin=
			{
			
			themloaitaisan:function()
			{
				$("#btn_themloaitaisan").unbind("click").click(function()
				{
					if(CheckEmptyInput($("#txt_tenloaitaisanthem"))&&CheckEmptyInput($("#txt_diengiaithem")))
					{	
						return $.ajax
						({
							url:"./themloaitaisan.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_themloaitaisan").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0)
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại.")
								else if(n==1) 
								{
									alert("Thành công !")
									fillcombo('get_list_loaitaisan.php',document.frm_sualoaitaisan.cbo_tenloaitaisansua),
									fillcombo('get_list_loaitaisan.php',document.frm_xoaloaitaisan.cbo_tenloaitaisanxoa),
									ClearInputValue($("#txt_tenloaitaisanthem")),
									ClearInputValue($("#txt_diengiaithem")),
									FocusAndSelect($("#txt_tenloaitaisanthem"))
								}
								else if(n==2)
								{
									alert("Loại tài sản này đã tồn tại.")
									//FocusAndSelect($("#txt_tenquyen"))
								}
								
							},
							error:function(){},
							complete:function(){}
						}),!1
					}
					
				})
			},
			
			sualoaitaisan:function()
			{
				$("#btn_sualoaitaisan").unbind("click").click(function()
				{
					if($("#cbo_tenloaitaisansua").val()==-1)
					{
						FocusAndSelect("#cbo_tenloaitaisansua")
					}
					else if(CheckEmptyInput($("#txt_tenloaitaisansua"))&&CheckEmptyInput($("#txt_diengiaisua")))
					{	
						return $.ajax
						({
							url:"./sualoaitaisan.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_sualoaitaisan").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0)
									alert("Bạn chưa thay đổi gì cả."),
									FocusAndSelect("#txt_tenloaitaisansua")
								else if(n==1) 
								{
									alert("Thành công !")
									fillcombo('get_list_loaitaisan.php',document.frm_sualoaitaisan.cbo_tenloaitaisansua),
									fillcombo('get_list_loaitaisan.php',document.frm_xoaloaitaisan.cbo_tenloaitaisanxoa),
									ClearInputValue($("#txt_tenloaitaisansua")),
									ClearInputValue($("#txt_diengiaisua")),
									FocusAndSelect($("#cbo_tenloaitaisansua"))
								}
								else if(n==2)
								{
									alert("Tên loại tài sản này đã tồn tại."),
									FocusAndSelect("#txt_tenloaitaisansua")	
								}
							},
							error:function(){},
							complete:function(){}
						}),!1
					}
					
				})
			},
			
			xoaloaitaisan:function()
			{
			 $("#btn_xoaloaitaisan").unbind("click").click(function()
			 {   
			 	if (confirm('Ban có chắc chắn muốn xóa không ?' ))
				{	
					if(CheckEmptyInput($("#cbo_tenloaitaisanxoa")))
					{	
						return $.ajax
						({
							url:"./xoaloaitaisan.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_xoaloaitaisan").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0)
									alert("Bạn chưa thay đổi gì cả.")
								else if(n==1)
								{
									alert("Thành công."),
									fillcombo('get_list_loaitaisan.php',document.frm_sualoaitaisan.cbo_tenloaitaisansua),
									fillcombo('get_list_loaitaisan.php',document.frm_xoaloaitaisan.cbo_tenloaitaisanxoa),
									ClearInputValue($("#txt_diengiaixoa")),
									FocusAndSelect($("#cbo_tenloaitaisanxoa"))
								}
								else if(n==2)
								{
									alert("Bạn chưa chọn tên loại tài sản.")	
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


function get_info_loaitaisan(filephp, frm)
{
	if(frm.cbo_tenloaitaisansua.value==-1)
	{
		frm.txt_tenloaitaisansua.value='';
		frm.txt_diengiaisua.value='';
	}
	else
	{
		maloai = frm.cbo_tenloaitaisansua.value;
		tenloaitaisan=frm.txt_tenloaitaisansua;
		diengiaisua=frm.txt_diengiaisua;
		http=GetXmlHttpObject();
		var params = "maloai="+maloai;
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
				tenloaitaisan.value=x[0].getElementsByTagName('column')[1].firstChild.nodeValue;
				diengiaisua.value=x[0].getElementsByTagName('column')[2].firstChild.nodeValue;
				frm.txt_tenloaitaisansua.focus();
			}
		}
		http.send(params);
		
		}
	}
function get_info_loaitaisan2(filephp,frm)
{
	if(frm.cbo_tenloaitaisanxoa.value==-1)
	{
		frm.txt_diengiaixoa.value='';
	}
	else
	{
	maloai=frm.cbo_tenloaitaisanxoa.value;
	diengiai=frm.txt_diengiaixoa;
	
	http=GetXmlHttpObject();
	var params = "maloai="+maloai;
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