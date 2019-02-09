$(document).ready(function() {
	var btn_login = $('#btn-login');
	btn_login.css('background-color', '#818181');
	btn_login.css('border-color', '#818181');
	btn_login.attr('disabled', 'disabled');
	$('#student-id-input').keyup(function(event) {
		var form_section = $('#login-form .form-group').eq(0);
		if ($(this).val() == '') {
			form_section.addClass('has-error has-feedback');
			form_section.children('.form-control-feedback').show();
			form_section.children('.control-label').show();
			btn_login.css('background-color', '#818181');
			btn_login.css('border-color', '#818181');
			btn_login.attr('disabled', 'disabled');
		} else {
			form_section.children('.form-control-feedback').hide();
			form_section.children('.control-label').hide();
			$('#login-form .form-group').eq(0).removeClass('has-error has-feedback');
			btn_login.css('background-color', '');
			btn_login.css('border-color', '');
			btn_login.removeAttr('disabled');
		}
	});
});