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
					if($("#cbo_makhms")!="-Chọn mã kế hoạch mua sắm-")
					{	
						return $.ajax
						({
							url:"./duyetkehoachms.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_duyetkhms").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0)
									alert("Vui lòng kế hoạch mua sắm!")
								else if(n==1) 
								{
									alert("Đã duyệt.")
									
		    taobangtaisan(document.frm_duyetkhms.cbo_makhms);
			taobangtaisan(document.frm_duyetkhms.cbo_makhms);
			//fillcombo2('get_list_nam.php',document.frm_duyetkhms.cbo_nam);
	        //fillcombo('get_list_donvi.php',document.frm_duyetkhms.cbo_chondonvi);
			
			//taobang();
			/*$('form[name="frm_duyetkhms"] select[name="cbo_nam"]').change(function()
	{		
			
			fillcombo2bien('get_list_makhms.php',document.frm_duyetkhms.cbo_chondonvi,document.frm_duyetkhms.cbo_nam,document.frm_duyetkhms.cbo_makhms);
	       
			
		});*/
								}
								else if(n==2)
								{
									alert("Bạn chưa chọn mã phiếu kế hoạch mua sắm!")
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
				$("#btn_boduyet").unbind("click").click(function()
				{
					if($("#cbo_makhms")!="-Chọn mã kế hoạch mua sắm-")
					{	
						return $.ajax
						({
							url:"./huyduyetkhms.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_duyetkhms").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0)
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại.")
								else if(n==1) 
								{
									alert("Thành công!")
									taobangtaisan(document.frm_duyetkhms.cbo_makhms);
									taobangtaisan(document.frm_duyetkhms.cbo_makhms);
			//fillcombo2('get_list_nam.php',document.frm_duyetkhms.cbo_nam);
	        //fillcombo('get_list_donvi2.php',document.frm_duyetkhms.cbo_chondonvi);
			
			//taobang();
			/*$('form[name="frm_duyetkhms"] select[name="cbo_nam"]').change(function()
	{		
			
			fillcombo2bien('get_list_makhms.php',document.frm_duyetkhms.cbo_chondonvi,document.frm_duyetkhms.cbo_nam,document.frm_duyetkhms.cbo_makhms);
	
			
		});*/
								}
								else if(n==2)
								{
									alert("Bạn chưa chọn mã kế hoạch mua sắm!")
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


