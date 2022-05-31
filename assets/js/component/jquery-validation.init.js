
"use strict";
import 'jquery-validation';
import 'jquery-validation/dist/additional-methods';

var valGetParentContainer = function (el) {
    var $element = $(el);

    if ($element.closest('.form-group-sub').length > 0) {
        return $element.closest('.form-group-sub')
    } else if ($element.closest('.bootstrap-select').length > 0) {
        return $element.closest('.bootstrap-select')
    } else {
        return $element.closest('.form-group');
    }
};

jQuery.validator.setDefaults({
    errorElement: 'div', //default input error message container
    focusInvalid: false, // do not focus the last invalid input
    ignore: ".ignore-validation, .ck-content",  // validate all fields including form hidden input

    errorPlacement: function (error, el) { // render error placement for each input type
        var $element = $(el);

        var group = valGetParentContainer($element);
        var help = group.find('.form-text');

        if (group.find('.valid-feedback, .invalid-feedback').length !== 0) {
            return;
        }

        $element.addClass('is-invalid');
        error.addClass('invalid-feedback');

        if (help.length > 0) {
            help.before(error);
        } else {
            if ($element.closest('.bootstrap-select').length > 0) {     //Bootstrap select
                $element.closest('.bootstrap-select').find('.bs-placeholder').after(error);
            } else if ($element.hasClass('select2') || $element.hasClass('select2entity')) {
                $element.closest('.field-container').find('span.select2-container').after(error);
            } else if ($element.hasClass('custom-file-input')) { //Custom file input
                $element.closest('.field-container').find('.custom-file').after(error);
            } else if ($element.closest('.input-group').length > 0) {   //Bootstrap group
                let $addonEl = $element.closest('.input-group').find('.input-group-append');
                if ($addonEl.length > 0) {
                    $addonEl.after(error);
                } else {
                    $element.after(error);
                }

            } else if ($element.closest('.field-container').length > 0) {
                $element.after(error);
            }  else {                                                   //Checkbox & radios
                if ($element.is(':checkbox')) {
                    $element.closest('.kt-checkbox').find('> span').after(error);
                } else {
                    $element.after(error);
                }
            }
        }
    },
    highlight: function (element) { // hightlight error inputs
        var group = valGetParentContainer(element);
        group.addClass('validate');
        group.addClass('is-invalid');
        $(element).removeClass('is-valid');
    },

    unhighlight: function (element) { // revert the change done by hightlight
        var group = valGetParentContainer(element);
        group.removeClass('validate');
        group.removeClass('is-invalid');
        $(element).removeClass('is-invalid');
    },

    success: function (label, element) {
        var group = valGetParentContainer(element);
        group.removeClass('validate');
        group.find('.invalid-feedback').remove();
    }
});

window.handleValidation = function ($form) {
    var validator = null;

    function shouldContinueRegularFormSubmission($form) {
        var formId = $form.attr('id');
        if (formId) {
            var event = $.Event(formId + '.submit');

            $('body').trigger(event, [$form]);

            if (event.isDefaultPrevented()) {
                return false;
            }
        }

        return true;
    }

    validator = $form.validate({
        invalidHandler: function (event, validator) {
            var errorEvent = $.Event('jq-validation-error');
            $('body').trigger(errorEvent, [validator]);
        },
        submitHandler: function (formObject) {
            var form = formObject instanceof jQuery ? formObject[0] : formObject;

            if (shouldContinueRegularFormSubmission($(form))) {
                form.submit(); // submit the form
            }
        }
    });

    const resetForm = function() {
        validator.resetForm();
        setTimeout(function () {
            $form.find('input.custom-file-input').trigger('change');
            $form.find('select.select2, select.select2entity').trigger('change');
        });

    };

    $form
        .off('reset', resetForm)
        .on('reset', resetForm);

    $form.data('validator', validator);

    //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
    $('.select2, .select2entity', $form).on('select2:select', function () {
       $form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
    });
    $('.select2, .select2entity', $form).on('select2:unselect', function () {
       $form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
    });

    //apply validation on datepicker value change.
    $('.datepicker', $form).on('changeDate', function () {
        $form.validate().element($(this));
    });

    //apply validation on file value change.
    $('.custom-file-input', $form).on('change', function () {
        $form.validate().element($(this));
    })
};

$.validator.addMethod('filesize', function (value, element, param) {
    return this.optional(element) || (element.files[0].size <= param)
}, 'File size must be less than {0} B');

$('form.jq-validate').each(function (index, el) {
    handleValidation($(el));
});
