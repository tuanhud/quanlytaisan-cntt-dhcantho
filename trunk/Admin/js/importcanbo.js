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
			_admin.importcanbo()
		}),
		_admin=
			{
			
			importcanbo:function()
			{
				$("#btn_capnhat").unbind("click").click(function()
				{
					if(CheckEmptyInput($("#tendonvithem")))
					{	
						return $.ajax
						({
							url:"./importcanbo.php",
							type:"POST",
							//dataType:"html",
							data:$("#importcanbo").serialize(),
							beforeSend:function(){},
							success:function(n)
							{
								var tb ='Đã lưu mẩu tin thành công.';
								alert (tb);
								/*if(n==0)
									alert("Đã xảy ra lỗi.\nBạn hãy kiểm tra lại.")
								else if(n==1) 
								{
									alert("Thành công !"),
									fillcombo('get_list_donvi.php',document.frm_suadonvi.cbo_tendonvisua);
									fillcombo('get_list_donvi.php',document.frm_xoadonvi.cbo_tendonvixoa);
									ClearInputValue("#txt_tendonvithem"),
									FocusAndSelect("#txt_tendonvithem")
								}
								else
								{
									alert("Đơn vị này đã tồn tại."),
									FocusAndSelect("#txt_tendonvithem")
								}*/
								
							},
							error:function(){},
							complete:function(){}
						}),!1
					}
					
				})
			},
			
		}


function get_info_donvi(filephp, frm)
{
	if(frm.cbo_tendonvisua.value==-1)
	{
		frm.txt_tendonvisua.value='';
	}
	else
	{
		var madonvisua = frm.cbo_tendonvisua.value;
		http=GetXmlHttpObject();
		var params = "madonvisua="+madonvisua;
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
				frm.txt_tendonvisua.value = result;
			}
		}
		http.send(params);
		
		}
	}


function clearbg_text(txt){
	txt.value="";
	txt.style.backgroundColor="#FFFFFF";
	}
function clearbg_cbo(cbo){
	cbo.style.backgroundColor="#FFFFFF";
	}	
function createPanel_thongtincanhan(phpfile_getinfo, phpfile_update,frm,hoivien_id){
YUI().use('transition', 'panel', function (Y) {
    var openBtn = Y.one('#hoten'),
        panel, bb, result;

    function showPanel() {
        get_full_info_hoivien(phpfile_getinfo, frm, hoivien_id);
		panel.show();
        bb.transition({
            duration: 0.5,
            top     : '140px'
        });
    }

    function hidePanel() {
        bb.transition({
            duration: 0.5,
            top     : '-300px'
        }, function () {
            panel.hide();
        });
    }
	
    panel = new Y.Panel({
        srcNode: '#panelContent_thongtincanhan',
        width  : 350,
        xy     : [500, -300],
        zIndex : 5,
        modal  : true,
        visible: false,
        render : true,
        buttons: [
            {
                value  : 'Lưu',
                section: 'footer',
                action : function (e) {			
						capnhatThongtincanhan(phpfile_update,frm);
						if(result=="Thành công"){
							hidePanel();		
							}
                }
            },
			{
                value  : 'Đóng',
                section: 'footer',
                action : function (e) {
                    e.preventDefault();
                    hidePanel();
                }
            }			
        ]
    });

    bb = panel.get('boundingBox');

    openBtn.on('click', function (e) {
        showPanel();
    });

function capnhatdonvi(filephp,frm)
{
	var hoten = frm.txt_tendonvi.value;
	if(hoten.value==null || hoten.value == ""){
		hoten.value='Bạn chưa nhập họ tên';;
		hoten.style.backgroundColor = '#FF9933';
		return;
		}
	
	http=GetXmlHttpObject();
	var params = "hoten="+hoten.value;
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
			result=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
			if(result=="Thành công"){
				alert(result);
				}
		}
	}
	http.send(params);
}
});
}