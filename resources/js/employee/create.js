var EmployeeCreate = function () {
	var initFormValidations = function () {
		var EmployeeForm = $('.create-employee-form');

		EmployeeForm.validate({
			ignore: [],
			errorClass: 'invalid-feedback animated fadeInDown',
			errorElement: 'div',
			errorPlacement: function (error, e) {
				$(e).parents('.form-group').append(error);
			},
			highlight: function (e) {
				$(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
			},
			unhighlight: function (e) {
				$(e).closest('.form-group').removeClass('is-invalid').removeClass('is-invalid');
			},
			success: function (e) {
				$(e).closest('.form-group').removeClass('is-invalid');
				$(e).remove();
			},
			rules: {
				'first_name': {
					required: true,
				},
				'last_name': {
					required: true,
				},
				'company_id': {
					required: true,
				},
				'email': {
					required: true,
				},
				'phone':{
					required: true,
				}
			},
			messages: {
			}
		});
	};
	return {
		init: function () {
			initFormValidations();
		}
	};
}();

// Initialize when page loads
jQuery(function () {
	EmployeeCreate.init();
});
