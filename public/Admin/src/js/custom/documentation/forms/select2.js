"use strict";

// Class definition
var KTFormsSelect2Demo = function () {
    // Private functions
    var exampleCountry = function () {
        // Format options
        var optionFormat = function(item) {
            if ( !item.id ) {
                return item.text;
            }

            var span = document.createElement('span');
            var imgUrl = item.element.getAttribute('data-kt-select2-country');
            var template = '';

            template += '<img src="' + imgUrl + '" class="rounded-circle h-20px me-2" alt="image"/>';
            template += item.text;

            span.innerHTML = template;

            return $(span);
        }

        // Init Select2 --- more info: https://select2.org/
        $('#kt_docs_select2_country').select2({
            templateSelection: optionFormat,
            templateResult: optionFormat
        });
    }

    const exampleUsers = function () {
        // Format options
        var optionFormat = function(item) {
            if ( !item.id ) {
                return item.text;
            }

            var span = document.createElement('span');
            var imgUrl = item.element.getAttribute('data-kt-select2-user');
            var template = '';

            template += '<img src="' + imgUrl + '" class="rounded-circle h-20px me-2" alt="image"/>';
            template += item.text;

            span.innerHTML = template;

            return $(span);
        }

        // Init Select2 --- more info: https://select2.org/
        $('#kt_docs_select2_users').select2({
            templateSelection: optionFormat,
            templateResult: optionFormat
        });
    }

    return {
        // Public Functions
        init: function () {
            exampleCountry();
            exampleUsers();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTFormsSelect2Demo.init();
});
