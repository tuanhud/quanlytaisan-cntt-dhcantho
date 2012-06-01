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
			_admin.themnccvpp(),
			_admin.xoanccvpp()
		}),
		_admin=
		{
				themnccvpp:function()
				{
					$("#btn_themnccvpp").unbind("click").click(function()
					{
						if($("#cbo_tenvppthem").val()==-1) FocusAndSelect("#cbo_tenvppthem");
							else if($("#cbo_tennccthem").val()==-1) FocusAndSelect("##cbo_tennccthem");												
						else
						{	
							return $.ajax
							({
								url:"./themnccvpp.php",
								type:"POST",
								//dataType:"html",
								data:$("#frm_themnccvpp").serialize(),
								beforeSend:function(){},
								success:function(n)
								{
									if(n==0)
										alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại.")
									else if(n==1) 
									{
										alert("Thành công.")

									}
									else if(n==2)
									{
										alert("Đã tồn tại.")

									}
									
								},
								error:function(){},
								complete:function(){}
							}),!1
						}
						
					})
				},		  
		  xoanccvpp:function()
			{
			 $("#btn_xoanccvpp").unbind("click").click(function()
			 {   
			 	if($("#cbo_tenvppxoa").val()==-1) FocusAndSelect("#cbo_tenvppxoa");
							else if($("#cbo_tennccxoa").val()==-1) FocusAndSelect("##cbo_tennccxoa");
				  else	if(confirm('Bạn có chắc chắn muốn xóa không ?' ))
					{	
						return $.ajax
						({
							url:"./xoanccvpp.php",
							type:"POST",
							//dataType:"html",
							data:$("#frm_xoanccvpp").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								if(n==0)
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại.")
									
								else if(n==1)
								{
									alert("Thành công.")
								
								}
							},
							error:function(){},
							complete:function(){}
						}),!1
					  }
					})				
		}
		}
function get_info_nccvpp(filephp,frm)
{
	if(frm.cbo_tenvppxoa.value==-1)
	{
		frm.cbo_tennccxoa.value=-1;
		frm.txt_diachinccxoa.value='';
		frm.txt_sdtnccxoa.value='';
	}
	else
	{
	mavpp=frm.cbo_tenvppxoa.value;
	mancc=frm.txt_tennccxoa;
	diachi=frm.txt_diachinccxoa;
	sdt=frm.txt_sdtnccxoa;
	
	http=GetXmlHttpObject();
	var params = "mavpp="+mavpp;
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
				mancc.value=x[0].getElementsByTagName('column')[0].firstChild.nodeValue;					
				diachi.value=x[0].getElementsByTagName('column')[1].firstChild.nodeValue;
				sdt.value=x[0].getElementsByTagName('column')[2].firstChild.nodeValue;
		}
	}
	http.send(params);
	}
}