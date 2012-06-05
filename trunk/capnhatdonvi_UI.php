<div id="panelContent_thongtincanhan">
    <div class="yui3-widget-hd">
        Cập nhật thông tin cá nhân
    </div>
    <div class="yui3-widget-bd" align="center">
        <table width="300">
        <form name="frm_capnhatdonvi">        
        <tr>
        <td align="right" width="30%" style="font-size:11pt">Họ tên</td>
        <td><input type="text" name="txt_hoten" style="width:100%" onFocus="clearbg_text(this)"></td>
        </tr>
        <tr>
        <td align="right" style="font-size:11pt">Ngày sinh</td>
        <td>
        <select name="cbo_ngay" onfocus="clearbg_cbo(this)">
        </select>
        <select name="cbo_thang" onfocus="clearbg_cbo(this)">
        </select>
        <select name="cbo_nam" onfocus="clearbg_cbo(this)">
        </select>        
        </td>
        </tr>
        <tr>
        <td align="right" style="font-size:11pt">Đoàn/Đảng</td>
        <td>
        <select name="cbo_doandang">
			<option value="0">Đoàn viên</option>
            <option value="1">Đảng viên</option>        
        </select>
        </td>        
        </tr>
        <tr>
        <td align="right" style="font-size:11pt">Địa chỉ thường trú</td>
        <td>
        <input type="text" name="txt_diachithuongtru" style="width:100%">
        </td>
		</tr>
        <tr>
        <td align="right" style="font-size:11pt">Địa chỉ liên hệ</td>
        <td>
        <input type="text" name="txt_diachilienhe" style="width:100%">
        </td>
		</tr>
        <tr>
        <td align="right" style="font-size:11pt">Điện thoại</td>
        <td>
        <input type="text" name="txt_dienthoai" style="width:100%" maxlength="11" onFocus="clearbg_text(this)">
        </td>
		</tr>
        <tr>
        <td align="right" style="font-size:11pt">Email</td>
        <td>
        <input type="text" name="txt_email" style="width:100%" onFocus="clearbg_text(this)">
        </td>
		</tr>
		<tr>
        <td align="right" style="font-size:11pt">Dân tộc</td>
        <td>
        <select name="cbo_dantoc" onfocus="clearbg_cbo(this)">
        </select>
        </td>
		</tr>
		<tr>
        <td align="right" style="font-size:11pt">Tôn giáo</td>
        <td>
        <select name="cbo_tongiao" onfocus="clearbg_cbo(this)">
        </select>
        </td>
		</tr>                
        </form>
        </table>
    </div>
</div>
