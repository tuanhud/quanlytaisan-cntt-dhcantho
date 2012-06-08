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
			_admin.duyet(),
			_admin.huy()
		}),
		_admin=
			{
			
			duyet:function()
			{
				$("#btn_duyet").unbind("click").click(function()
				{
					if($("#cbo_maphieuduyet")!="-Chọn mã phiếu dự trù VPP-")
					{	
						return $.ajax
						({
							url:"./duyetphieudtvpp.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_duyetphieudutruvpp").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0)
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại.")
								else if(n==1) 
								{
									alert("Thành công."),
									fillcombo('get_list_donvi.php',document.frm_duyetphieudutruvpp.cbo_donviduyet);
	fillcombo2('get_list_nam.php',document.frm_duyetphieudutruvpp.cbo_namduyet);
	fillcombo2('get_list_quy.php',document.frm_duyetphieudutruvpp.cbo_quyduyet);
	fillcombo('get_list_donvi.php',document.frm_huyphieudutruvpp.cbo_donvihuy);
	fillcombo2('get_list_nam.php',document.frm_huyphieudutruvpp.cbo_namhuy);
	fillcombo2('get_list_quy.php',document.frm_huyphieudutruvpp.cbo_quyhuy);
	fillcombo3bien('get_list_maphieudutruvpp.php',document.frm_duyetphieudutruvpp.cbo_donviduyet,document.frm_duyetphieudutruvpp.cbo_namduyet,document.frm_duyetphieudutruvpp.cbo_quyduyet, document.frm_duyetphieudutruvpp.cbo_maphieuduyet);
								}
								else if(n==2)
								{
									alert("Bạn chưa chọn mã phiếu dự trù!")
								}
								
							},
							error:function(){},
							complete:function(){}
						}),!1
					}
					
				})
			},
			huy:function()
			{
				$("#btn_huy").unbind("click").click(function()
				{
					if($("#cbo_maphieuhuy")!="-Chọn mã phiếu dự trù VPP-")
					{	
						return $.ajax
						({
							url:"./huyphieudtvpp.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_huyphieudutruvpp").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0)
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại.")
								else if(n==1) 
								{
									alert("Thành công.")
									fillcombo('get_list_donvi.php',document.frm_duyetphieudutruvpp.cbo_donviduyet);
	fillcombo2('get_list_nam.php',document.frm_duyetphieudutruvpp.cbo_namduyet);
	fillcombo2('get_list_quy.php',document.frm_duyetphieudutruvpp.cbo_quyduyet);
	fillcombo('get_list_donvi.php',document.frm_huyphieudutruvpp.cbo_donvihuy);
	fillcombo2('get_list_nam.php',document.frm_huyphieudutruvpp.cbo_namhuy);
	fillcombo2('get_list_quy.php',document.frm_huyphieudutruvpp.cbo_quyhuy);
	fillcombo3bien('get_list_maphieudutruvpp2.php',document.frm_huyphieudutruvpp.cbo_donvihuy,document.frm_huyphieudutruvpp.cbo_namhuy,document.frm_huyphieudutruvpp.cbo_quyhuy, document.frm_huyphieudutruvpp.cbo_maphieuhuy);
								}
								else if(n==2)
								{
									alert("Bạn chưa chọn mã phiếu dự trù!")
								}
								
							},
							error:function(){},
							complete:function(){}
						}),!1
					}
					
				})
			},			
			/*xoadonvitinh:function()
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
			  
			},*/
		
		}


