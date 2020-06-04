$(document).ready(function () {

    var DF_FORM_VALIDATE = $(".js-form-order-validate");
    if (DF_FORM_VALIDATE.length) {
        validateFormOrder(DF_FORM_VALIDATE);
    }
});
$.validator.addMethod("time", function (value, element) {
    return this.optional(element) || /^(([0-1]?[0-9])|([2][0-3])):([0-5]?[0-9])(:([0-5]?[0-9]))?$/i.test(value);
}, "Please enter a valid time.");

$.validator.addMethod("checkDataOrder", function (value, element) {
    console.log(element)
    return false
}, "Invalid time format.");



$.validator.addMethod('checkHyphen', function (value, element) {
    return !checkHyphen(value)
})


$.validator.addMethod('validateOrderFood', function (value, element) {
    return $("#js-form-order .js-order").length
})

function checkHyphen(text) {
    if (text.indexOf("-") >= 0) {
        return true
    }
    return false;
}

function validateFormOrder(formJquery) {

    formJquery.validate({
        rules: {
            validate_order: {
                validateOrderFood: true
            },
            delivery_month: {
                required: true,
                max: 12,
                min: 1
            },
            delivery_date: {
                required: true,
                max: 31,
                min: 1
            },
            delivery_time_start: {
                required: true,
                time: true
            },
            delivery_time_end: {
                required: true,
                time: true
            },
            name_customer: {
                required: true
            },
            mobile: {
                required: true,
                checkHyphen: true,
                number: true,
                minlength: 9,
                maxlength: 11
            },
            email: {
                required: true,
                email: true
            },
            zip_1: {
                required: true,
                minlength: 1,
                maxlength: 8
            },
            address: {
                required: true,
                minlength: 1,
                maxlength: 255
            }
        },
        messages: {
            validate_order: {
                validateOrderFood: "商品を選択してください"
            },
            delivery_month: {
                required: "お届け日の月を入力してください",
                min: '月が正しくありません',
                max: '月が正しくありません'
            },
            delivery_date: {
                required: "お届け日の日を入力してください",
                min: '日が正しくありません',
                max: '日が正しくありません'
            },
            delivery_time_start: {
                required: "お届け時間を入力してください",
                time: "お届け時間を入力してください",
            },
            delivery_time_end: {
                required: "お届け時間を入力してください",
                time: "お届け時間を入力してください",
            },
            name_customer: {
                required: "ご担当者名を入力してください"
            },
            mobile: {
                required: '電話番号を入力してください',
                checkHyphen: 'ハイフンは不要です',
                number: '電話番号は数字を入力してください。',
                minlength: '電話番号話番号は9桁以上、11桁以下でなければなりません。',
                maxlength: '電話番号話番号は9桁以上、11桁以下でなければなりません。'
            },
            email: {
                required: "メールアドレスを入力してください",
                email: "メールアドレスを入力してください"
            },
            zip_1: {
                required: "お届け先の郵便番号を入力してください",
                minlength: '郵便番号は1桁以上、8桁以下でなければなりません。',
                maxlength: '郵便番号は1桁以上、8桁以下でなければなりません。'
            },
            address: {
                required: "お届け先住所を入力してください",
                minlength: '住所は1文字以上、255文字以下でなければなりません。',
                maxlength: '住所は1文字以上、255文字以下でなければなりません。'
            }
        },
        errorPlacement: function (error, element) {
            var element = element.closest('td')
            error.appendTo(element);
            return false
        },
    });
}