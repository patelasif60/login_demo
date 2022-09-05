var CompanyCreate = function () {

	var initFormValidations = function () {
		var ComapanyForm = $('.create-comapny-form');

		ComapanyForm.validate({
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
				'name': {
					required: true,
				},
				'address': {
					required: true,
				},
				'email': {
					required: true,
				},
				'website': {
					required: true,
				},
				'logo': {
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
	CompanyCreate.init();
});
 function readLogoURL(input) {
 	$('.js-thumbnail').removeClass('d-none');
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
           $('.logo_preview_container').attr('src',e.target.result)
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#logo").change(function() {
    readLogoURL(this);
});
