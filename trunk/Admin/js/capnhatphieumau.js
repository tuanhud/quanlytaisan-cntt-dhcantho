// JavaScript Document
var numofSus = numofFai = 0;
function FocusAndSelect(n){
	
		$(n).focus(),$(n).select()
	}

function ClearInputValue(n){
		$(n).val("")
	}
function CheckEmptyInput(n){
		return $(n).val=="" ? ($(n).focus(),$(n).select(),!1) : !0
	}
function check_date_ngaysinh(day,month,year)
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
		var _admin;
				$(function(){
						_admin.xoaphieumau()
					}),
					_admin=
					{
					xoaphieumau:function()
						{
						 $("#btn_xoaphieumau").unbind("click").click(function()
						 {  
						  if (confirm('Ban có chắc chắn muốn xóa không ?' ))
							{	
								if(CheckEmptyInput($("#cbo_tenphieumauxoa")))
								{	
									return $.ajax
									({
										url:"./xoaphieumau.php",
										type:"POST",
										//dataType:"html",
										data:$("#frm_xoaphieumau").serialize(),
										beforeSend:function(){},
										success:function(n)
										{
											if(n==0)
												alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại.")
											else if(n==1)
											{
												alert("Xóa thành công !"),
												fillcombo('get_list_phieumau2.php',document.frm_suaphieumau.cbo_tenphieumausua);
												fillcombo('get_list_phieumau.php',document.frm_xoaphieumau.cbo_tenphieumauxoa);
												FocusAndSelect("#cbo_tenphieumauxoa");
											}
											else if(n==2)
											{
												alert("Bạn chưa chọn phiếu mẫu.")	
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
			
function get_info_phieumausua(filephp,frm)
{
	if(frm.cbo_tenphieumausua.value==-1)
	{
		frm.txt_tenphieumaumoi.value='';
		frm.cbo_ngaysua.value=-1;
		frm.cbo_thangsua.value=-1;
		frm.cbo_namsua.value=-1;
		frm.txt_ghichusua.value='';
	}
	else
	{
	var maphieu=frm.cbo_tenphieumausua.value;
	
	http=GetXmlHttpObject();
	var params = "maphieu="+maphieu;
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
				frm.txt_ghichusua.value=x[0].getElementsByTagName('column')[1].firstChild.nodeValue;
			    frm.cbo_ngaysua.value=x[0].getElementsByTagName('column')[2].firstChild.nodeValue;
				frm.cbo_thangsua.value=x[0].getElementsByTagName('column')[3].firstChild.nodeValue;
				frm.cbo_namsua.value=x[0].getElementsByTagName('column')[4].firstChild.nodeValue;
				
		}
	}
	http.send(params);
	}
}
function get_info_phieumauxoa(filephp,frm)
{
	if(frm.cbo_tenphieumauxoa.value==-1)
	{
		frm.txt_maphieumauxoa.value='';
		frm.cbo_ngayxoa.value=-1;
		frm.cbo_thangxoa.value=-1;
		frm.cbo_namxoa.value=-1;
		frm.txt_ghichuxoa.value='';
	}
	else
	{
	var maphieu=frm.cbo_tenphieumauxoa.value;
	
	http=GetXmlHttpObject();
	var params = "maphieu="+maphieu;
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
				frm.txt_maphieumauxoa.value=x[0].getElementsByTagName('column')[0].firstChild.nodeValue;
				frm.txt_ghichuxoa.value=x[0].getElementsByTagName('column')[1].firstChild.nodeValue;
			    frm.cbo_ngayxoa.value=x[0].getElementsByTagName('column')[2].firstChild.nodeValue;
				frm.cbo_thangxoa.value=x[0].getElementsByTagName('column')[3].firstChild.nodeValue;
				frm.cbo_namxoa.value=x[0].getElementsByTagName('column')[4].firstChild.nodeValue;
				
		}
	}
	http.send(params);
	}
}