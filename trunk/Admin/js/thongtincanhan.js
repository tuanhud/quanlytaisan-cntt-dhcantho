function get_full_info_hoivien(phpfile, frm, hoivien_id){
	http=GetXmlHttpObject();
	var params = "hoivien_id="+hoivien_id;
	//mo ket noi bang phuong thuc post
	http.open("POST", phpfile, false);
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//http.setRequestHeader("Content-length", params.length);
	//http.setRequestHeader("Connection", "close");

	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) 
		{
			frm.txt_hoten.value=http.responseXML.getElementsByTagName('HOTEN')[0].firstChild.nodeValue;
			frm.cbo_ngay.value=http.responseXML.getElementsByTagName('DAY')[0].firstChild.nodeValue;
			frm.cbo_thang.value=http.responseXML.getElementsByTagName('MONTH')[0].firstChild.nodeValue;
			frm.cbo_nam.value=http.responseXML.getElementsByTagName('YEAR')[0].firstChild.nodeValue;			
			frm.cbo_doandang.value=http.responseXML.getElementsByTagName('HOIVIEN_DOANDANG')[0].firstChild.nodeValue;
			frm.txt_diachithuongtru.value=http.responseXML.getElementsByTagName('HOIVIEN_DIACHITHUONGTRU')[0].firstChild.nodeValue;
			frm.txt_diachilienhe.value=http.responseXML.getElementsByTagName('HOIVIEN_DIACHILIENHE')[0].firstChild.nodeValue;
			frm.txt_dienthoai.value=http.responseXML.getElementsByTagName('HOIVIEN_DIENTHOAI')[0].firstChild.nodeValue;
			frm.txt_email.value=http.responseXML.getElementsByTagName('HOIVIEN_EMAIL')[0].firstChild.nodeValue;
			frm.cbo_dantoc.value=http.responseXML.getElementsByTagName('DANTOC_ID')[0].firstChild.nodeValue;
			frm.cbo_tongiao.value=http.responseXML.getElementsByTagName('TONGIAO_ID')[0].firstChild.nodeValue;									
		}
	}
	http.send(params);	
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

function capnhatThongtincanhan(filephp,frm)
{
	var hoten = frm.txt_hoten;
	if(hoten.value==null || hoten.value == ""){
		hoten.value='Bạn chưa nhập họ tên';;
		hoten.style.backgroundColor = '#FF9933';
		return;
		}
	var ngaysinh=frm.cbo_ngay;
	var thangsinh=frm.cbo_thang;
	var namsinh=frm.cbo_nam;
	if(!isValidDate(ngaysinh.value,thangsinh.value,namsinh.value))
		{		
		ngaysinh.style.backgroundColor = '#FF9933';
		thangsinh.style.backgroundColor = '#FF9933';
		namsinh.style.backgroundColor = '#FF9933';
		return;
		}
	var doandang=frm.cbo_doandang;
	var diachithuongtru=frm.txt_diachithuongtru;
	var diachilienhe=frm.txt_diachilienhe;
	var dienthoai=frm.txt_dienthoai;
	reg2=/^0[0-9]+$/;
	isValidPhone = reg2.test(dienthoai.value);
	if(!isValidPhone){
		dienthoai.value = 'Số điện thoại không hợp lệ';
		dienthoai.style.backgroundColor = '#FF9933';
		return;
		}
	var email=frm.txt_email;	
	reg1=/^[0-9A-Za-z]+[0-9A-Za-z_]*@[\w\d.]+.\w{2,4}$/;
    isValidEmail=reg1.test(email.value);
	if(!isValidEmail){
		email.value = 'Email không hợp lệ';
		email.style.backgroundColor = '#FF9933';		
		return;
		}
	var dantoc = frm.cbo_dantoc;
	if(dantoc.value==-1){
		dantoc.style.backgroundColor = '#FF9933';
		return;
		}
	var tongiao = frm.cbo_tongiao;
	if(tongiao.value==-1){
		tongiao.style.backgroundColor = '#FF9933';
		return;
		}	
	http=GetXmlHttpObject();
	var params = "hoten="+hoten.value;
	params+= "&ngaysinh="+ngaysinh.value;
	params+= "&thangsinh="+thangsinh.value;
	params+= "&namsinh="+namsinh.value;
	params+= "&doandang="+doandang.value;
	params+= "&diachithuongtru="+diachithuongtru.value;
	params+= "&diachilienhe="+diachilienhe.value;
	params+= "&dienthoai="+dienthoai.value;	
	params+= "&email="+email.value;
	params+= "&dantoc="+dantoc.value;
	params+= "&tongiao="+tongiao.value;	
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