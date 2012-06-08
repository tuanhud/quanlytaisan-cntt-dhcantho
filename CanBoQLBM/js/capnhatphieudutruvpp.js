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
			_admin.xoaphieu()
		}),
		_admin=
			{

			xoaphieu:function()
			{
			 $("#btn_xoa").unbind("click").click(function()
			 {   
			 	if (confirm('Bạn có chắc chắn muốn xóa không ?' ))
				{	
					if(($("#cbo_maphieuhuy").val()=="-Chọn mã phiếu dự trù VPP-") || ($("#cbo_maphieuhuy").val()==''))
					{
						alert("Bạn chưa chọn mã phiếu dự trù.");
						FocusAndSelect("#cbo_maphieuhuy")
						}
					else
					{	
						return $.ajax
						({
							url:"./xoaphieudutru.php",
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
									alert("Thành công !")
									fillcombo('get_list_donvi.php',document.frm_huyphieudutruvpp.cbo_donvihuy);
	fillcombo2('get_list_nam.php',document.frm_huyphieudutruvpp.cbo_namhuy);
	fillcombo2('get_list_quy.php',document.frm_huyphieudutruvpp.cbo_quyhuy);
									fillcombo3bien('get_list_maphieudutruvpp.php',document.frm_huyphieudutruvpp.cbo_donvihuy,document.frm_huyphieudutruvpp.cbo_namhuy,document.frm_huyphieudutruvpp.cbo_quyhuy, document.frm_huyphieudutruvpp.cbo_maphieuhuy);
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