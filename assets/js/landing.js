import 'jquery-form';
const $ = require('jquery');

function onFormSubmit(event, form) {
    event.preventDefault();
    form.ajaxSubmit({
        success: (data) => {
            $('.lbl-result').text(new Number(data.result).toFixed(2));
        },
        error: function (e) {
            $('.lbl-result').text('Error!');
        },
        complete: function () {

        }
    });
}


$(document).ready(() => {
    handleValidation($('#calculator-form'));
    $('body').off('calculator-form.submit').on('calculator-form.submit', (event, form) => onFormSubmit(event, form));
});
