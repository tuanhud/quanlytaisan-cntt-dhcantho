// JavaScript Document
function themDSHV(filephp,frm)
{
	var idchsv = frm.cbo_tenchsv.value;
	var idhocki = frm.cbo_tenhocki.value;
	var file_import = frm.file_import.value;
	http=GetXmlHttpObject();
	var params = "idchsv="+idchsv;
	params+= "&idhocki="+idhocki;
	params+= "&file_import="+file_import;
	
	//mo ket noi bang phuong thuc post
	http.open("POST", filephp, false);
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.setRequestHeader("Content-length", params.length);
	http.setRequestHeader("Connection", "close");
	//ham xu li du lieu tra ve cua ajax send thanh cong
	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) 
		{
			var result=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
			alert(result);
			if(result=='Thành công') frm.reset();
		}
	}
	http.send(params);
}

function themHoivien(filephp,frm1,frm2,frm3)
{
	var flag = 0;
	var id=frm1.txt_id.value;
	var matkhau=frm1.txt_matkhau.value;
	var xacnhanmatkhau = frm1.txt_xacnhanmatkhau.value;	
	
	var hocki = frm2.cbo_tenhocki.value;
	var lchsv = frm2.cbo_tenlchsv.value;
	var chsv=frm2.cbo_tenchsv.value;
	var clb=frm2.cbo_tenclb.value;
	
	var hoten=frm3.txt_hoten.value;
		if(hoten==""){
			frm3.img_hoten.title = 'Tên không được rỗng';
			frm3.img_hoten.style.visibility = "visible";
			flag = 1;
		}
	var gioitinh=frm3.cbo_gioitinh.value;
	var ngaysinh=frm3.cbo_ngay.value;
	var thangsinh=frm3.cbo_thang.value;
	var namsinh=frm3.cbo_nam.value;
	if(!isValidDate(ngaysinh,thangsinh,namsinh))
		{
			frm3.img_ngaysinh.title = 'Ngày sinh không hợp lệ';
			frm3.img_ngaysinh.style.visibility = "visible";
			flag = 1;
		}
	var doandang=frm3.cbo_doandang.value;
	var diachithuongtru=frm3.txt_diachithuongtru.value;
	var diachilienhe=frm3.txt_diachilienhe.value;
	var dienthoai=frm3.txt_dienthoai.value;
	reg2=/^0[0-9]+$/;
	isValidPhone = reg2.test(dienthoai);
	if(!isValidPhone){
			frm3.img_dienthoai.title = 'Điện thoại không hợp lệ';
			frm3.img_dienthoai.style.visibility = "visible";
			flag = 1;
		}
	var email=frm3.txt_email.value;	
	reg1=/^[0-9A-Za-z]+[0-9A-Za-z_]*@[\w\d.]+.\w{2,4}$/;
    isValidEmail=reg1.test(email);
	if(!isValidEmail){
			frm3.img_email.title = 'Email không hợp lệ';
			frm3.img_email.style.visibility = "visible";
			flag = 1;
		}
	var khoahoc=frm3.cbo_khoahoc.value;	
	var chuyennganh=frm3.cbo_tenchuyennganh.value;
	if(chuyennganh==-1 || chuyennganh==""){
		frm3.img_chuyennganh.title = 'Bạn chưa chọn Chuyên ngành';
		frm3.img_chuyennganh.style.visibility = "visible";
		flag = 1;
		}
	var dantoc=frm3.cbo_tendantoc.value;
	if(dantoc==-1){
		frm3.img_dantoc.title = 'Bạn chưa chọn Dân tộc';
		frm3.img_dantoc.style.visibility = "visible";
		flag = 1;
		}
	var tongiao=frm3.cbo_tentongiao.value;
	if(tongiao==-1){
		frm3.img_tongiao.title = 'Bạn chưa Tôn giáo';
		frm3.img_tongiao.style.visibility = "visible";
		flag = 1;
		}
	
	http=GetXmlHttpObject();
	var params = "id="+id;
	params+= "&xacnhanmatkhau="+xacnhanmatkhau;
	params+= "&matkhau="+matkhau;
	
	params+= "&hocki="+hocki;
	params+= "&lchsv="+lchsv;
	params+= "&chsv="+chsv;
	params+= "&clb="+clb;
	
	params+= "&hoten="+hoten;
	params+= "&gioitinh="+gioitinh;	
	params+= "&ngaysinh="+ngaysinh;
	params+= "&thangsinh="+thangsinh;
	params+= "&namsinh="+namsinh;
	params+= "&doandang="+doandang;
	params+= "&diachithuongtru="+diachithuongtru;
	params+= "&diachilienhe="+diachilienhe;
	params+= "&dienthoai="+dienthoai;
	params+= "&email="+email;	
	params+= "&khoahoc="+khoahoc;
	params+= "&chuyennganh="+chuyennganh;
	params+= "&dantoc="+dantoc;
	params+= "&tongiao="+tongiao;
	
	params+= "&flag="+flag;
	
	//mo ket noi bang phuong thuc post
	http.open("POST", filephp, false);
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.setRequestHeader("Content-length", params.length);
	http.setRequestHeader("Connection", "close");
	//ham xu li du lieu tra ve cua ajax send thanh cong
	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) 
		{
			var result=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
			alert(result);
			if(result=='Thành công.'){
			window.location = './index.php';
			}
		}
	}
	http.send(params);
}

function checkID(filephp,frm)
{
	var id = frm.txt_id.value;
	if(id.length!=7){
		frm.img_id.title = 'Mã số phải có chiều dài là 7 ký tự';
		frm.img_id.style.visibility = "visible";
		return;
		}
	else 
	{
		frm.img_id.style.visibility = "hidden";
	}
	http=GetXmlHttpObject();
	var params = "id="+id;
	//mo ket noi bang phuong thuc post
	http.open("POST", filephp, false);
	//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.setRequestHeader("Content-length", params.length);
	http.setRequestHeader("Connection", "close");
	//ham xu li du lieu tra ve cua ajax send thanh cong
	http.onreadystatechange = function()
	{
		if(http.readyState == 4 && http.status == 200) 
		{
			var result=http.responseXML.getElementsByTagName('RESULT')[0].firstChild.nodeValue;
			if(result==1){
				frm.img_id.title = 'Mã số này đã tồn tại';
				frm.img_id.style.visibility = "visible";
				return;			
				}
			else
			{
				frm.img_id.style.visibility = "hidden";
				return;
				}
						
		}
	}
	http.send(params);
}

function checkMatkhau(frm)
{
	var matkhau = frm.txt_matkhau.value;
	if(matkhau.length<6){
		frm.img_matkhau.title = 'Mật khẩu có chiều dài tối thiểu là 6 ký tự';
		frm.img_matkhau.style.visibility = "visible";
		return;
		}
	else 
	{
		frm.img_matkhau.style.visibility = "hidden";
		return;
	}
}
function checkXacnhanmatkhau(frm){
	var xacnhanmatkhau = frm.txt_xacnhanmatkhau.value;
	if(xacnhanmatkhau!=frm.txt_matkhau.value){
		frm.img_xacnhanmatkhau.title = 'Xác nhận mật khẩu không đúng';
		frm.img_xacnhanmatkhau.style.visibility = "visible";
		return;
		}
	else 
	{
		frm.img_xacnhanmatkhau.style.visibility = "hidden";
		return;
	}
}
function checklchsv(frm){
	var lchsv = frm.cbo_tenlchsv.value;
	if(lchsv == -1){
		frm.img_lchsv.title = 'Bạn chưa chọn Liên chi hội sinh viên';
		frm.img_lchsv.style.visibility = "visible";
		return;
		}
	else
	{
		frm.img_lchsv.style.visibility = "hidden";
		return;
		}
	}
function checkchsv(frm){
	var chsv = frm.cbo_tenchsv.value;
	if(chsv == -1){
		frm.img_chsv.title = 'Bạn chưa chọn Chi hội sinh viên';
		frm.img_chsv.style.visibility = "visible";
		return;
		}
	else
	{
		frm.img_chsv.style.visibility = "hidden";
		return;
		}
	}

function createKhoahoc(txt,cbo)
{
	var id = txt.value;
	var temp = 0;
	cbo.options.length=0;
	var oOption = document.createElement("OPTION");
	   oOption.text="Khóa";
	   oOption.value="0";
	   cbo.add(oOption)
	temp = parseInt(id.substring(1,3),10) + 26;		
	for(var i=temp-2;i<=temp+2;i++)
				{	
					 	var oOption = document.createElement("OPTION");
					   oOption.text=i;
					   oOption.value=i;
					   cbo.add(oOption)
				}
	cbo.selectedIndex = 3;
	}	
function keypress_char(e){
var keypressed = null;
if (window.event){
	keypressed = window.event.keyCode; //IE
}
else{ 
	keypressed = e.which; //NON-IE, Standard
}
if (keypressed >= 48 && keypressed <= 57){ 
	//CharCode của 0 là 48 (Theo bảng mã ASCII)
	//CharCode của 9 là 57 (Theo bảng mã ASCII)
	/*if (keypressed == 8 || keypressed == 127){
	//Phím Delete và Phím Back
	return;
	}*/
	return false;
}
}
function keypress_num(e){
var keypressed = null;
if (window.event){
	keypressed = window.event.keyCode; //IE
}
else{ 
	keypressed = e.which; //NON-IE, Standard
}
if (keypressed < 48 || keypressed > 57){ 	
	return false;
}
}
function focus_(img){
	img.style.visibility = "hidden";
	}