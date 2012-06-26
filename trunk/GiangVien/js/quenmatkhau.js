// JavaScript Document
$(".forgot-item-btn").unbind("click").click(function()
			{
				return $("#tbxForGotEmail").val()==""?(alert("Vui lòng nhập địa chỉ Email"),
				FocusAndSelect($("#tbxForGotEmail")),!1):IsValidEmail($("#tbxForGotEmail").val())?$("#tbxForGotCaptcha").val()==""?(alert("Vui lòng nhập mã xác nhận"),
				FocusAndSelect($("#tbxForGotCaptcha")),!1):
				(
					$.ajax
					({
						url:"smtp/smtp.php",
						type:"POST",
						//dataType:"html",
						data:$("#frmgetpass").serialize(),
						beforeSend:function(){$(".fwaiting").css("display","inline")},
						success:function(n)
						{
							n=="0"?alert("Tác vụ không thành công, bạn thử kiểm tra lại thông tin nhập vào !!!"):(alert("Thông tin yêu cầu đã được gửi về địa chỉ email.\n Bạn hãy kiểm tra email để lấy thông tin mật khẩu.")
							,CloseMark())
						},
						error:function()
						{},
						
						complete:function()
						{
							$("#tbxForGotEmail").val(""),
							$("#tbxForGotCaptcha").val(""),
							$(".fwaiting").hide()
						}
					}),!1):(alert("Địa chỉ email không đúng định dạng"),
					FocusAndSelect($("#tbxForGotEmail")),!1
				)
			})
		