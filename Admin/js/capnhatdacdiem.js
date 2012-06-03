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
			_admin.themdd(),
			_admin.suadd(),
			_admin.xoadd(),
			_admin.themddvpp(),
			_admin.suaddvpp(),
			_admin.xoaddvpp()
		}),
		_admin=
			{
			
			themdd:function()
			{
				$("#btn_themdd").unbind("click").click(function()
				{
					if(CheckEmptyInput($("#txt_tenddthem")))
					{	
						return $.ajax
						({
							url:"./themdacdiem.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_themdd").serialize(),
							beforeSend:function(){},
							success:function(n)
							
							{
								if(n==0)
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại.")
								else if(n==1) 
								{
									alert("Thành công !"),
									fillcombo2('get_list_dacdiem.php',document.frm_xoadd.cbo_tenddxoa);
		fillcombo2('get_list_dacdiem.php',document.frm_suadd.cbo_tenddsua);
		fillcombo2('get_list_dacdiem.php',document.frm_themddvpp.cbo_dacdiemvppthem);
									ClearInputValue("#txt_tenddthem"),
									ClearInputValue("#txt_ghichuddthem")
								}
								else
								{
									alert("Đặc điểm này đã tồn tại.")
								}
								
							},
							error:function(){},
							complete:function(){}
						}),!1
					}
					
				})
			},
			
			suadd:function()
			{
				$("#btn_luudd").unbind("click").click(function()
				{
					if(CheckEmptyInput($("#txt_tenddsua")))
					{	
						return $.ajax
						({
							url:"./suadacdiem.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_suadd").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0){
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại."),
									FocusAndSelect("#cbo_tenddsua")
								}
								else if(n==1) 
								{
									alert("Thành công !"),
									fillcombo2('get_list_dacdiem.php',document.frm_xoadd.cbo_tenddxoa);
		fillcombo2('get_list_dacdiem.php',document.frm_suadd.cbo_tenddsua);
		$('form[name="frm_suadd"] select[name="cbo_tenddsua"]').change(function(){
		get_info_dacdiem('get_info_dacdiem.php',document.frm_suadd);
		});
		$('form[name="frm_xoadd"] select[name="cbo_tenddxoa"]').change(function(){
		get_info_dacdiem2('get_info_dacdiem.php',document.frm_xoadd);
		});
									ClearInputValue("#txt_tenddsua"),
									ClearInputValue("#txt_ghichuddsua"),
									FocusAndSelect("#cbo_tennsxsua")
						}
								else
								{
									alert("Tên đặc điểm này đã tồn tại."),
									FocusAndSelect("#txt_tenddsua")	
								}
							},
							error:function(){},
							complete:function(){}
						}),!1
					}
					
				})
			},
			
			xoadd:function()
			{
			 $("#btn_xoadd").unbind("click").click(function()
			 {   
			 	if (confirm('Bạn có chắc chắn muốn xóa không ?' ))
				{	
					if(CheckEmptyInput($("#cbo_tenddxoa")))
					{	
						return $.ajax
						({
							url:"./xoadacdiem.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_xoadd").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0)
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại.")
								else if(n==1)
								{
									alert("Thành công !")
								fillcombo2('get_list_dacdiem.php',document.frm_xoadd.cbo_tenddxoa);
		fillcombo2('get_list_dacdiem.php',document.frm_suadd.cbo_tenddsua);
		$('form[name="frm_suadd"] select[name="cbo_tenddsua"]').change(function(){
		get_info_dacdiem('get_info_dacdiem.php',document.frm_suadd);
		});
		$('form[name="frm_xoadd"] select[name="cbo_tenddxoa"]').change(function(){
		get_info_dacdiem2('get_info_dacdiem.php',document.frm_xoadd);
		});
									ClearInputValue("#txt_tenddsua"),
									ClearInputValue("#txt_ghichuddxoa"),
									ClearInputValue("#txt_ghichuddsua")
						}
								else if(n==2)
								{
									alert("Bạn chưa chọn đặc điểm.")	
								}
							},
							error:function(){},
							complete:function(){}
						}),!1
					  }
					}
					
				})
			  
			},
		themddvpp:function()
					{
						$("#btn_themddvpp").unbind("click").click(function()
						{
							if(CheckEmptyInput($("#cbo_tenvppthem")) && CheckEmptyInput($("#cbo_dacdiemvppthem")) && CheckEmptyInput($("#txt_ghichuddvppthem")))
							{	
								return $.ajax
								({
									url:"./themdacdiemvpp.php",
									type:"POST",
									//dataType:"html",
									data:$("#frm_themddvpp").serialize(),
									beforeSend:function(){},
									success:function(n)
									
									{
										if(n==0)
											alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại.")
										else if(n==1) 
										{
											alert("Thành công !"),
											fillcombo('get_list_vpp.php',document.frm_themddvpp.cbo_tenvppthem);
		fillcombo2('get_list_dacdiem.php',document.frm_themddvpp.cbo_dacdiemvppthem);
		fillcombo('get_list_vpp2.php',document.frm_suaddvpp.cbo_vppsua);
									fillcombo('get_list_vpp2.php',document.frm_xoaddvpp.cbo_vppxoa);
									fillcombo('get_list_vpp2.php',document.frm_xoaddvpp.cbo_vppxoa);
											ClearInputValue("#txt_ghichuddvppthem"),
											FocusAndSelect("#txt_tenddthem")
										}
										else
										{
											alert("Đặc điểm của văn phòng này đã tồn tại.")
										}
										
									},
									error:function(){},
									complete:function(){}
								}),!1
							}
							
						})
					},
					suaddvpp:function()
			{
				$("#btn_suaddvpp").unbind("click").click(function()
				{
					if(CheckEmptyInput($("#txt_ghichuddvppsua")))
					{	
						return $.ajax
						({
							url:"./suadacdiemvpp.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_suaddvpp").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0){
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại."),
									FocusAndSelect("#cbo_vppsua")
								}
								else if(n==1) 
								{
									alert("Thành công !"),
									fillcombo('get_list_vpp2.php',document.frm_suaddvpp.cbo_vppsua);
									fillcombo('get_list_vpp2.php',document.frm_xoaddvpp.cbo_vppxoa);
									ClearInputValue("#cbo_ddvppsua"),
									ClearInputValue("#txt_ghichuddvppsua")
						}
							},
							error:function(){},
							complete:function(){}
						}),!1
					}
					
				})
			},
			xoaddvpp:function()
			{
			 $("#btn_xoaddvpp").unbind("click").click(function()
			 {   
			 	if (confirm('Bạn có chắc chắn muốn xóa không ?' ))
				{	
					if(CheckEmptyInput($("#txt_chitietddvppxoa")))
					{	
						return $.ajax
						({
							url:"./xoadacdiemvpp.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_xoaddvpp").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0)
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại.")
								else if(n==1)
								{
									alert("Thành công !")
								fillcombo('get_list_vpp2.php',document.frm_suaddvpp.cbo_vppsua);
									fillcombo('get_list_vpp2.php',document.frm_xoaddvpp.cbo_vppxoa);
									ClearInputValue("#cbo_ddvppsua"),
									ClearInputValue("#txt_chitietddvppxoa")
						}
								else if(n==2)
								{
									alert("Bạn chưa chọn đặc điểm.")	
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


function get_info_dacdiem(filephp, frm)
{
	if(frm.cbo_tenddsua.value==-1)
	{
		frm.txt_ghichuddsua.value='';
		frm.txt_tenddsua.value='';
	}
	else
	{
		var motaddsua = frm.cbo_tenddsua.value;
		http=GetXmlHttpObject();
		var params = "motaddsua="+motaddsua;
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
				txt_ghichuddsua.value=x[0].getElementsByTagName('column')[1].firstChild.nodeValue;
				txt_tenddsua.value=x[0].getElementsByTagName('column')[0].firstChild.nodeValue;
			}
		}
		http.send(params);
		
		}
	}
function get_info_chitiet(filephp, frm)
{
	if(frm.cbo_vppsua.value==-1)
	{
		frm.txt_ghichuddvppsua.value='';
	}
	else if(frm.cbo_ddvppsua.value==-1)
		frm.txt_ghichuddvppsua.value='';
	else
	{
		var mavpp = frm.cbo_vppsua.value;
		var mota = frm.cbo_ddvppsua.value;
		http=GetXmlHttpObject();
		var params = "mavpp="+mavpp;
		params +="&mota="+mota;
	/*	var params = "mota="+mota;*/
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
				txt_ghichuddvppsua.value=x[0].getElementsByTagName('column')[2].firstChild.nodeValue;
			}
		}
		http.send(params);
		}
	}
function get_info_chitiet2(filephp, frm)
{
	if(frm.cbo_vppxoa.value==-1)
	{
		frm.txt_ghichuddvppxoa.value='';
	}
	else if(frm.cbo_ddvppxoa.value==-1)
		frm.txt_ghichuddvppxoa.value='';
	else
	{
		var mavpp = frm.cbo_vppxoa.value;
		var mota = frm.cbo_ddvppxoa.value;
		http=GetXmlHttpObject();
		var params = "mavpp="+mavpp;
		params +="&mota="+mota;
	/*	var params = "mota="+mota;*/
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
				txt_chitietddvppxoa.value=x[0].getElementsByTagName('column')[2].firstChild.nodeValue;
			}
		}
		http.send(params);
		}
	}
function get_info_dacdiem2(filephp, frm)
{
	if(frm.cbo_tenddxoa.value==-1)
	{
		frm.txt_ghichuddxoa.value='';
	}
	else
	{
		var motaddsua = frm.cbo_tenddxoa.value;
		http=GetXmlHttpObject();
		var params = "motaddsua="+motaddsua;
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
				txt_ghichuddxoa.value=x[0].getElementsByTagName('column')[1].firstChild.nodeValue;
			}
		}
		http.send(params);

		}
	}