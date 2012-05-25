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
			_admin.themdonvi()
		}),
		_admin=
			{
			
			themdonvi:function()
			{
				$("#btn_themdonvi").unbind("click").click(function()
				{
					if(CheckEmptyInput($("#txt_tendonvithem")))
					{	
						return $.ajax
						({
							url:"./themdonvi.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_themdonvi").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0)
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại.")
								else 
								{
									alert("Thành công !"),
									ClearInputValue("#txt_tendonvithem"),
									FocusAndSelect("#txt_tendonvithem")
								}
							},
							error:function(){},
							complete:function(){}
						}),!1
					}
					
				})
			},
		
		}