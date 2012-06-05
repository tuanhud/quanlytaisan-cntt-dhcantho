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
			_admin.importnguoidung()
		}),
		_admin=
		{
			
			importnguoidung:function()
			{
				$("#btnimport").unbind("click").click(function()
				{	
						$.ajax
						({
							url:"./importnguoidung.php",
							type:"POST",
							//dataType:"html",
							data:$("#importnguoidung").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								alert(n);
								
							},
							error:function(){},
							complete:function(){}
						})
					
					
				})
			
			}
		} 