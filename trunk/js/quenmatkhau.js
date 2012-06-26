		
		function IsValidEmail(n)
{
	var t=/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	return t.test(n)
}

function FocusAndSelect(n)
{
	$(n).focus(),$(n).select()
}
		function CloseMark(){
	$(".login_box").length!=0?$(".login_box").css("display")=="none"&&$("#mask").hide():$("#mask").hide(),$(".window").hide()
	}
		var _customer;
		$(function()
		{
			_customer.DoForGotPass(),
			_customer.RequestPass()
		
		}),
		_customer=
		{	
			
			DoForGotPass:function()
			{
				$("a.forgotpass").click(function(n)
				{
					n.preventDefault(),
					$("#mask").fadeIn(100);
					var i=$(window).height(),t=$(window).width();
					$("#dialog").css("top",i/2-$("#dialog").height()/2),
					$("#dialog").css("left",t/2-$("#dialog").width()/2),
					$("#dialog").fadeIn(100)}),
					$(".window .close").click(function(n){n.preventDefault(),CloseMark()
				})
			},
				
			RequestPass:function()
			{
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
		},
	}