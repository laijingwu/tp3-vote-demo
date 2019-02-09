$(document).ready(function() {
	var btn_login = $('#btn-login');
	btn_login.css('background-color', '#818181');
	btn_login.css('border-color', '#818181');
	btn_login.attr('disabled', 'disabled');
	$('#student-input').keyup(function(event) {
		var form_section = $('#login-form .form-group').eq(0);
		if ($(this).val() == '') {
			form_section.addClass('has-error has-feedback');
			btn_login.css('background-color', '#818181');
			btn_login.css('border-color', '#818181');
			btn_login.attr('disabled', 'disabled');
		} else {
			form_section.removeClass('has-error has-feedback');
			btn_login.css('background-color', '');
			btn_login.css('border-color', '');
			btn_login.removeAttr('disabled');
		}
	});
	btn_login.click(function() {
		$('#login-form').submit();
	});
});