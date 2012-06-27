// JavaScript Document
function ClearInputValue(n){
		$(n).val("")
	}
function FocusAndSelect(n){
		$(n).focus(),$(n).select()
	}
function CheckEmptyInput(n){
		return $(n).val()=="" ? ($(n).focus,$(n).select(),!1):!0
	}
function check_date_month_year(day,month,year){
		{
		var ngay = parseInt(day, 10) ;
        var thang = parseInt(month, 10) ;
        var nam = parseInt(year, 10);
		if(ngay<1&&ngay>31) return true;
        switch (thang){
            case 2:
                if ((nam%4 == 0)&&(nam%400 !=0))
				{
					if(thang==2&&ngay>29)
                    	return true;
				}
                else
				{
					if(thang==2&&ngay>28)
					{
                    	return true;
					}
				}
                break;
            case 1:
            case 3:
            case 5:
            case 7:
            case 8:
            case 10:
            case 12:
                if(ngay>31)
				return true;
                break;
            default:
                if(ngay>30)
					return true;
        }
	}
}
var _admin;
	$(function()
	{
			//_admin:themphieukiemke()
			//_admin:suaphieukiemke(),
			//_admin:xoaphieukiemke()
		}),
		
			_admin=
			{
				themphieukiemke:function()
				{
					$("#btn_themphieukiemke").unbind("click").click(function()
					{
						if($("#cbo_loaikiemkethem").vla()==-1){
							alert("Bạn chưa chọn loại kiểm kê!");
							FocusAndSelect("#cbo_loaikiemkethem");
							}
							else if($("txt_tenphieukiemke").val()==""){
								alert("Bạn chưa nhập tên phiếu kiểm kê!");
								FocusAndSelect("#txt_tenphieukiemke");
								}
								else if($("#cbo_ngauthem1 option:selected").val()==-1){
									alert("Bạn chưa chọn ngày!");
									FocusAndSelect("#cbo_ngaythem1");
									}else if($("#cbo_thangthem1 option:selected").val()==-1){
											alert("Bạn chưa chọn tháng!");
											FocusAndSelect("#cbo_thangthem1");
										}
										else if($("#cbo_namthem1 option:selected").val()==-1){
												alert("Bạn chưa chọn năm!");
												FocusAndSelect("#cbo_namthem1");
											}else if(check_date_moth_year($("#cbo_ngaythem1 option:selected").val(),$("#cbo_thangthem1 option:selected").val(),$("cbo_namthem1 option:selected").val())){
												alert("Ngày tháng năm không hợp lệ!");
												FocusAndSelect("#cbo_ngaythem1");
												}
												else if($("#cbo_ngauthem2 option:selected").val()==-1){
													alert("Bạn chưa chọn ngày!");
													FocusAndSelect("#cbo_ngaythem2");
													}else if($("#cbo_thangthem2 option:selected").val()==-1){
														alert("Bạn chưa chọn tháng!");
														FocusAndSelect("#cbo_thangthem2");
														}
														else if($("#cbo_namthem2 option:selected").val()==-1){
															alert("Bạn chưa chọn năm!");
															FocusAndSelect("#cbo_namthem2");
															}else if(check_date_moth_year($("#cbo_ngaythem2 option:selected").val(),$("#cbo_thangthem2 option:selected").val(),$("cbo_namthem2 option:selected").val())){
																alert("Ngày tháng năm không hợp lệ!");
																FocusAndSelect("#cbo_ngaythem2");
																}
																else if($("#txt_diengiai").val()==""){
																		alert("Bạn chưa nhập diễn giải");
																		FocusAndSelect("#txt_diengiai");
																	}
							else{
									return $.ajax
									({
											url:"./themphieukiemke.php",
											type:"POST",
											//dataType:"html",
											data:$("#frm_themcanbo").serialize(),
											beforeSend:function(){},
											success:function(n)
										{
											if(n==0)
												alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại.")
											else if(n==1) 
											{
												alert("Thêm thành công!");
												
											}
											else if(n==2)
											{
											alert("Đơn vị này đã tồn tại.")
											}
										},
										error:function(){},
										complete:function(){}
									}),!1
								}
						})
				},
			}