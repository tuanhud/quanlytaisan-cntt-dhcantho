// JavaScript Document
function FocusAndSelect(n){
		$(n).focus(),$(n).select()
	}
function CheckEmptyInput(n){
		return $(n).val()=="" ? ($(n).focus(),$(n).select(),!1):!0
	}
function ClearInputValue(n){$(n).val("")}
function checkNumber(n){
		var so=[0-9];
		if(!so.test($(n).val())){
				return false;
			}
	}
var _admin;
		$(function(){
				_admin.themthanhly()
				_admin.suathanhly(),
				_admin.xoathanhly()
			}),
			_admin=
			{
				themthanhly:function(){
						$("#btn_themthanhly").unbind("click").click(function()
						{
							var tstl= parseInt($("#txt_soluongtaisan").val());
							var tshc=parseInt($("#txt_sltshienco").val());
							if($("#cbo_tentaisanthanhlythem").val()==-1) {
								alert("Bạn chưa chọn tài sản thanh lý!");
								FocusAndSelect("#cbo_tentaisanthanhlythem");
								} else if($("#txt_soluongtaisan").val()==""){ 
									alert("Bạn chưa nhập số lượng tài sản!"),
									FocusAndSelect("#txt_soluongtaisan");
									}
									/*else if(checkNumber("#txt_soluongtaisan")==false){
											alert("Số lượng tài sản phải là số!!!");
										FocusAndSelect("#txt_soluongtaisan");
										}*/
								else if(tstl > tshc){
										alert("Số lượng tài sản thanh lý vượt quá số lượng hiện có!!!");
										FocusAndSelect("#txt_soluongtaisan");
								}else
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
														document.frm_themthanhly.txt_sltshienco.value='';
														document.frm_themthanhly.txt_soluongtaisan.value='';
														document.frm_themthanhly.txt_diengiai.value='';
														ClearInputValue("#cbo_tentaisanthanhlythem"),
														FocusAndSelect("#cbo_tentaisanthanhlythem")
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
					},
					suathanhly:function(){
						$("#btn_luuthanhly").unbind("click").click(function()
						{
							//var tstl= parseInt($("#txt_soluongtaisan").val());
							//var tshc=parseInt($("#txt_sltshienco").val());
							/*if($("#cbo_tentaisanthanhlythem").val()==-1) {
								alert("Bạn chưa chọn tài sản thanh lý!");
								FocusAndSelect("#cbo_tentaisanthanhlythem");
								} else*/ if($("#txt_soluongtaisansua").val()==""){ 
									alert("Bạn chưa nhập số lượng tài sản!"),
									FocusAndSelect("#txt_soluongtaisansua");
									}
								/*else if(tstl > tshc){
										alert("Số lượng tài sản thanh lý vượt quá số lượng hiện có!!!");
										FocusAndSelect("#txt_soluongtaisan");
								}*/else
								{	
									return $.ajax
									({
												url:"./suathanhly.php",
												type:"POST",
												data:$("#frm_suathanhly").serialize(),
												beforeSend:function(){},
												success:function(n){
													if(n==0){
														alert("Thành công.")	}	
													else if(n==1){
														alert("Cập nhật thành công!"),
														fillcombo('get_list_taisan.php',document.frm_suathanhly.cbo_tentaisanthanhlysua);
														fillcombo('get_list_taisan.php',document.frm_xoathanhly.cbo_tentaisanthanhlyxoa);
														document.frm_suathanhly.cbo_namthanhlysua.value="-Chọn năm-";
														document.frm_suathanhly.cbo_mathanhlysua.value="-Chọn mã-";
														document.frm_suathanhly.txt_tentaisanthanhlysua.value='';
														document.frm_suathanhly.txt_mataisansua.value='';
														document.frm_suathanhly.txt_soluongtaisansua.value='';
														document.frm_suathanhly.txt_sltshiencosua.value='';
														document.frm_suathanhly.txt_diengiaisua.value='';
														ClearInputValue("#cbo_tentaisanthanhlysua"),
														FocusAndSelect("#cbo_tentaisanthanhlysua")
													}
													else{
																alert("Số lượng tài sản chưa thanh lý chỉ còn!")
															}																									
													},
													error:function(){},
													complete:function(){}
											}),!1
								}
							})
					},
					xoathanhly:function(){
						$("#btn_xoathanhly").unbind("click").click(function()
						{
						
							//var tstl= parseInt($("#txt_soluongtaisan").val());
							//var tshc=parseInt($("#txt_sltshienco").val());
							if($("#cbo_namthanhlyxoa").val()=="-Chọn năm-") {
								alert("Bạn chưa chọn năm!");
								FocusAndSelect("#cbo_namthanhlyxoa");
								} else if($("#cbo_mathanhlyxoa").val()=="-Chọn mã-" || $("#cbo_mathanhlyxoa").val()==''){ 
									alert("Bạn chưa chọn mã thanh lý!"),
									FocusAndSelect("#cbo_mathanhlyxoa");
									}
							/*	else if(tstl > tshc){
										alert("Số lượng tài sản thanh lý vượt quá số lượng hiện có!!!");
										FocusAndSelect("#txt_soluongtaisan");
								}*/else
								{	
									if(confirm("Bạn có muốn tiếp tục xóa không?"))
									{
									return $.ajax
									({
												url:"./xoathanhly.php",
												type:"POST",
												data:$("#frm_xoathanhly").serialize(),
												beforeSend:function(){},
												success:function(n){
													if(n==0)
														alert("Thành công.")		
													else if(n==1){
														alert("Xóa thành công!"),
														fillcombo('get_list_taisan.php',document.frm_suathanhly.cbo_tentaisanthanhlysua);
														fillcombo('get_list_taisan.php',document.frm_xoathanhly.cbo_tentaisanthanhlyxoa);
														document.frm_xoathanhly.txt_tentaisanthanhlyxoa.value='';
														document.frm_xoathanhly.txt_mataisanxoa.value='';
														document.frm_xoathanhly.txt_soluongtaisanxoa.value='';
														document.frm_xoathanhly.txt_diengiaixoa.value='';
														ClearInputValue("#cbo_mathanhlyxoa"),
														FocusAndSelect("#cbo_mathanhlyxoa")
														}																									
													},
													error:function(){},
													complete:function(){}
											}),!1
									}
								}
							})
					}
			}

function get_info_ma_soluong_taisan(filephp, frm)
{
	if(frm.cbo_tentaisanthanhlythem.value==-1)
	{
		frm.txt_mataisanthem.value='';
		//frm.txt_soluongtaisan.value='';
		frm.txt_sltshienco.value='';
		//frm.txt_diengiai.value='';
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
				var x=http.responseXML.getElementsByTagName('row');
				frm.txt_mataisanthem.value =x[0].getElementsByTagName('column')[0].firstChild.nodeValue;
				frm.txt_sltshienco.value=x[0].getElementsByTagName('column')[1].firstChild.nodeValue;
			}
		}
		http.send(params);
		
		}
	}
function get_info_thanhlysua(filephp, frm)
{
	if((frm.cbo_mathanhlysua.value=="-Chọn mã-") || (frm.cbo_mathanhlysua.value=='') )
	{
		frm.txt_tentaisanthanhlysua.value="";
		frm.txt_mataisansua.value="";
		frm.txt_soluongtaisansua.value="";
		frm.txt_sltshiencosua.value="";
		frm.txt_diengiaisua.value="";
	}
	else
	{
		var mathanhly = frm.cbo_mathanhlysua.value;
		http=GetXmlHttpObject();
		var params = "mathanhly="+mathanhly;
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
				frm.txt_tentaisanthanhlysua.value=x[0].getElementsByTagName('column')[0].firstChild.nodeValue;
				frm.txt_mataisansua.value=x[0].getElementsByTagName('column')[1].firstChild.nodeValue;
				frm.txt_soluongtaisansua.value=x[0].getElementsByTagName('column')[2].firstChild.nodeValue;
				frm.txt_sltshiencosua.value=x[0].getElementsByTagName('column')[3].firstChild.nodeValue;
				frm.txt_diengiaisua.value=x[0].getElementsByTagName('column')[4].firstChild.nodeValue;
			}
		}
		
		http.send(params);
		//http.send();
		}
	}
function get_info_thanhlyxoa(filephp, frm)
{
	if((frm.cbo_mathanhlyxoa.value=="-Chọn mã-") || (frm.cbo_mathanhlyxoa.value=='') )
	{
		frm.txt_tentaisanthanhlyxoa.value="";
		frm.txt_mataisanxoa.value="";
		frm.txt_soluongtaisanxoa.value="";
		//frm.txt_sltshiencosua.value="";
		frm.txt_diengiaixoa.value="";
	}
	else
	{
		var mathanhly = frm.cbo_mathanhlyxoa.value;
		http=GetXmlHttpObject();
		var params = "mathanhly="+mathanhly;
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
				frm.txt_tentaisanthanhlyxoa.value=x[0].getElementsByTagName('column')[0].firstChild.nodeValue;
				frm.txt_mataisanxoa.value=x[0].getElementsByTagName('column')[1].firstChild.nodeValue;
				frm.txt_soluongtaisanxoa.value=x[0].getElementsByTagName('column')[2].firstChild.nodeValue;
				//frm.txt_sltshiencosua.value=x[0].getElementsByTagName('column')[3].firstChild.nodeValue;
				frm.txt_diengiaixoa.value=x[0].getElementsByTagName('column')[4].firstChild.nodeValue;
			}
		}
		
		http.send(params);
		//http.send();
		}
	}
