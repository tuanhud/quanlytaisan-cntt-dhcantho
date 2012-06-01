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

//kiem tra dia chi email co hop le hay khong
function checkEmail(n)
{
	return n.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/)!=-1?!0:!1
	
}

function get_info_taisan(filephp,frm)
{
	if(frm.cbo_tentaisansua.value==-1)
	{
		frm.txt_tentaisansua.value='';
		frm.cbo_donvitinhsua.value=-1;
		frm.txt_tinhtrangsua.value='';
	}
	else
	{
	mataisan=frm.cbo_tentaisansua.value;
	tenmoi=frm.txt_tentaisansua;
	donvitinh=frm.cbo_donvitinhsua;
	tinhtrang=frm.txt_tinhtrangsua;
	
	http=GetXmlHttpObject();
	var params = "mataisan="+mataisan;
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
				tenmoi.value=x[0].getElementsByTagName('column')[0].firstChild.nodeValue;					
				donvitinh.value=x[0].getElementsByTagName('column')[1].firstChild.nodeValue;
				tinhtrang.value=x[0].getElementsByTagName('column')[2].firstChild.nodeValue;
		}
	}
	http.send(params);
	}
}
/*function get_info_canbo2(filephp,frm)
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
*/

var _admin;
		$(function()
		{
			_admin.themtaisan(),
			_admin.suataisan(),
			_admin.xoataisan()
		}),
		
		_admin=
		{
				themtaisan:function()
				{
					$("#btn_themtaisan").unbind("click").click(function()
					{
						if($("#cbo_tenloaitaisanthem").val()==-1) FocusAndSelect("#cbo_tenloaitaisanthem");
							else if($("#txt_tentaisanthem").val()=='') FocusAndSelect("#txt_tentaisanthem");
								else if($("#cbo_donvitinhthem option:selected").val()==-1) FocusAndSelect("#cbo_donvitinhthem");
									else if($("#txt_tinhtrangthem").val()=='') FocusAndSelect("#txt_tinhtrangthem");
												
						else
						{	
							return $.ajax
							({
								url:"./themtaisan.php",
								type:"POST",
								//dataType:"html",
								data:$("#frm_themtaisan").serialize(),
								beforeSend:function(){},
								success:function(n)
								{
									if(n==0)
										alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại.")
									else if(n==1) 
									{
										alert("Thành công."),
										document.frm_themtaisan.cbo_tenloaitaisanthem.value=-1,
										document.frm_themtaisan.txt_tentaisanthem.value='',
										document.frm_themtaisan.cbo_donvitinhthem.value=-1,
										document.frm_themtaisan.txt_tinhtrangthem.value=''
									}
									else if(n==2)
									{
										alert("Tài sản này đã tồn tại."),
										document.frm_themtaisan.txt_tentaisanthem.focus()
									}
									
								},
								error:function(){},
								complete:function(){}
							}),!1
						}
						
					})
				},
		  suataisan:function()
		  {
			  $("#btn_suataisan").unbind("click").click(function()
			  {
						if($("#cbo_tenloaitaisansua option:selected").val()==-1) FocusAndSelect("#cbo_tenloaitaisansua");
							else if($("#cbo_tentaisansua option:selected").val()==-1) FocusAndSelect("#cbo_tentaisansua");
								else if($("#txt_tentaisansua ").val()=='') FocusAndSelect("#txt_tentaisansua");
									else if($("#cbo_donvitinhsua option:selected").val()==-1) FocusAndSelect("#cbo_donvitinhsua");
										else if($("#txt_tinhtrangsua ").val()=='') FocusAndSelect("#txt_tinhtrangsua");
									
						else
						{	
							return $.ajax
							({
								url:"./suataisan.php",
								type:"POST",
								//dataType:"html",
								data:$("#frm_suataisan").serialize(),
								beforeSend:function(){},
								success:function(n)
								{
									if(n==0)
										alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại.")
									else if(n==1)
									{
										alert("Thành công !")
										//fillcombo2('get_list_canbo.php',document.frm_suacanbo.cbo_macanbosua);
										//fillcombo2('get_list_canbo.php',document.frm_xoacanbo.cbo_macanboxoa);
										document.frm_suataisan.cbo_tenloaitaisansua.value=-1,
										_fillcombo('get_list_taisan2.php',document.frm_suataisan.cbo_tenloaitaisansua, document.frm_suataisan.cbo_tentaisansua),
										document.frm_suataisan.txt_tentaisansua.value='',
										document.frm_suataisan.cbo_donvitinhsua.value=-1,
										document.frm_suataisan.txt_tinhtrangsua.value=''
									}
									else if(n==2)
									{
										alert("Bạn chưa thay đổi gì cả.");	
									}
								},
								error:function(){},
								complete:function(){}
							}),!1
						}
			   })
		  },
		  
		  xoataisan:function()
			{
			 $("#btn_xoataisan").unbind("click").click(function()
			 {   
			 	if($("#cbo_tenloaitaisanxoa option:selected").val()==-1){ alert("Bạn chưa chọn loại tài sản."); FocusAndSelect("#cbo_tenloaitaisanxoa");}
					else if($("#cbo_tentaisanxoa option:selected").val()==-1){ alert("Bạn chưa chọn tài sản."); FocusAndSelect("#cbo_tentaisanxoa");}	
				  else	if(confirm('Ban có chắc chắn muốn xóa không ?' ))
					{	
						return $.ajax
						({
							url:"./xoataisan.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_xoataisan").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0)
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại."),
									document.frm_xoataisan.cbo_tenloaitaisanxoa.focus()
								else if(n==1)
								{
									alert("Thành công."),
									document.frm_xoataisan.cbo_tenloaitaisanxoa.value=-1,
									_fillcombo('get_list_taisan2.php',document.frm_xoataisan.cbo_tenloaitaisanxoa, document.frm_xoataisan.cbo_tentaisanxoa),
									FocusAndSelect("#cbo_tenloaitaisanxoa")
								}
							},
							error:function(){},
							complete:function(){}
						}),!1
					  }
					})
			  
				}
		
				
		}
	