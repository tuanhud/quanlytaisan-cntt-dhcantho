// JavaScript Document
function FocusAndSelect(n){
		$(n).focus(),$(n).select()
	}
function CheckEmptyInput(n){
		return $(n).val()=="" ? ($(n).focus(),$(n).select(),!1):!0
	}
function ClearInputValue(n){$(n).val("")}
var _admin;
		$(function(){
				_admin.themthanhly()
				//_admin.suathanhly(),
				//_admin.xoasuathanhly()
			}),
			_admin=
			{
				themthanhly:function(){
						$("#btn_themthanhly").unbind("click").click(function()
						{
							if($("#cbo_tentaisanthanhlythem").val()==-1) {
								alert("Bạn chưa chọn tài sản thanh lý!");
								FocusAndSelect("#cbo_tentaisanthanhlythem");}
						    else if($("#txt_soluongtaisan").val()=="") 
								alert("Bạn chưa nhập số lượng tài sản!"),
								FocusAndSelect("#txt_soluongtaisan");
							else
							{	
									return $.ajax
									({
												url:"./themthanhly.php",
												type:"POST",
												data:$("#frm_themthanhly").serialize(),
												beforeSend:function(){},
												success:function(n){
													if(n==0)
														alert("Đã có lỗi xảy ra. Vui lòng kiểm tra lại!")		
													else if(n==1){
														alert("Thêm thành công!"),
														fillcombo('get_list_taisan.php',document.frm_suathanhly.cbo_tentaisanthanhlysua);
														fillcombo('get_list_taisan.php',document.frm_xoathanhly.cbo_tentaisanthanhlyxoa);
														document.frm_themthanhly.cbo_tentaisanthanhlythem.value=-1;
														document.frm_themthanhly.txt_mataisanthem.value='';
														document.frm_themthanhly.txt_soluongtaisan.value='';
														document.frm_themthanhly.cbo_namthem.value=-1;
														document.frm_themthanhly.txt_diengiai.value='';
														ClearInputValue("#cbo_tentaisanthanhlythem"),
														FocusAndSelect("cbo_tentaisanthanhlythem")
													}
													else{
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

function get_info_mataisan(filephp, frm)
{
	if(frm.cbo_tentaisanthanhlythem.value==-1)
	{
		frm.txt_mataisanthem.value='';
	}
	else
	{
		var mataisan = frm.cbo_tentaisanthanhlythem.value;
		http=GetXmlHttpObject();
		var params = "mataisan="+mataisan;
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
				var result=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
				frm.txt_mataisanthem.value = result;
			}
		}
		http.send(params);
		
		}
	}
