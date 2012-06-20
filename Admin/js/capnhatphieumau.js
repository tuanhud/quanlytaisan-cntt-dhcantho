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
				_admin.themphieumau()				
			}),
			_admin=
			{
				themphieumau:function()
				{
						$("#abc").unbind("click").click(function(){
						 if($("#txt_tenphieumau").val()=="") {
								alert("Bạn chưa nhập tên phiếu mẫu!"),
								FocusAndSelect("#txt_tenphieumau");
							 }else if(check_date_ngaysinh($("#cbo_ngay option:selected").val(),$("#cbo_thang option:selected").val(),$("#cbo_nam option:selected").val())){
							 	alert("Ngày tháng năm không hợp lệ.");FocusAndSelect("#cbo_ngay");
							 	}else {
								 	return $.ajax
									({
												url:"./themphieumau.php",
												type:"POST",
												data:$("#frm_themphieumau").serialize(),
												beforeSend:function(){},
												success:function(n)
												{
													if(n==0)
														alert("Đã có lỗi xảy ra. Vui lòng kiểm tra lại!")		
													else if(n==1)
													{
														alert("Thêm thành công!"),
														fillcombo('get_list_phieumau.php',document.frm_suaphieumau.cbo_tenphieumausua);
														fillcombo('get_list_phieumau.php',document.frm_xoaphieumau.cbo_tenphieumauxoa);
														document.frm_themphieumau.txt_tenphieumau.value='';
														document.frm_themphieumau.cbo_ngay.value=-1;
														document.frm_themphieumau.cbo_thang.value=-1;
														document.frm_themphieumau.cbo_nam.value=-1;
														document.frm_themphieumau.txt_ghichu.value='';
														ClearInputValue("#txt_tenphieumau"),
														FocusAndSelect("#txt_tenphieumau")
													}
													else if(n==2)
													{
																alert("Tên đã tồn tại!")
													}																									
												},
													error:function(){},
													complete:function(){}
											}),!1
								 }
							})
				}
		}
	//Them hoi vien duoc khen thuong
function capnhat_noidung(filephp,frm,manoidung)
{
	http=GetXmlHttpObject();
	
	var params ="manoidung="+manoidung;
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
			var result=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
			if(result=='Thành công.') numofSus +=1;
			else 
			{
				numofFai += 1;
			}
		}
	}
	http.send(params);
}

//Them danh sach hoi vien duoc khen thuong
function themnoidung(frm){

	try
	{
		var chks = dt.get('srcNode').all("tbody input.myCheckboxFmtr");
		chks.each( function(item){
			var rec = dt.getRecord( item.ancestor() );
			if ( item.get('checked') )
			//alert(rec.get('manoidung'));
				capnhat_noidung('them_noidung.php', frm, rec.get('manoidung'));
		   	});
	}
	catch(ex){
		alert("Có lỗi xảy ra: " + ex.message);
	}
}
function get_info_phieumausua(filephp,frm)
{
	if(frm.cbo_tenphieumausua.value==-1)
	{
		frm.txt_tenphieumaumoi.value='';
		frm.cbo_ngaysua.value=-1;
		frm.cbo_thangsua.value=-1;
		frm.cbo_thangsua.value=-1;
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
				frm.txt_ghichusua.value=x[0].getElementsByTagName('column')[0].firstChild.nodeValue;
			    frm.cbo_ngaysua.value=x[0].getElementsByTagName('column')[1].firstChild.nodeValue;
				frm.cbo_thangsua.value=x[0].getElementsByTagName('column')[2].firstChild.nodeValue;
				frm.cbo_namsua.value=x[0].getElementsByTagName('column')[3].firstChild.nodeValue;
				
		}
	}
	http.send(params);
	}
}