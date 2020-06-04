$(document).ready(function() {

    var DF_FORM_VALIDATE = $(".js-form-order-validate");
    if(DF_FORM_VALIDATE.length){
        validateFormOrder(DF_FORM_VALIDATE);
    }
});
$.validator.addMethod("time", function(value, element) {  
    return this.optional(element) || /^(([0-1]?[0-9])|([2][0-3])):([0-5]?[0-9])(:([0-5]?[0-9]))?$/i.test(value);  
}, "Please enter a valid time.");

// $.validator.addMethod("time24", function(value, element) {
//     if (!/^\d{2}:\d{2}:\d{2}$/.test(value)) return false;
//     var parts = value.split(':');
//     if (parts[0] > 23 || parts[1] > 59 || parts[2] > 59) return false;
//     return true;
// }, "Invalid time format.");

$.validator.addMethod("checkDataOrder", function(value, element) {
    console.log(element)
    return false
}, "Invalid time format.");



$.validator.addMethod('checkHyphen', function (value, element) {
    return !checkHyphen(value)
})


$.validator.addMethod('validateOrderFood', function (value, element) {
    return $("#js-form-order .js-order").length
})

function checkHyphen(text){
    if( text.indexOf("-") >= 0 ){
        return true
    }
    return false;
}

function validateFormOrder(formJquery){

    // var trOrder = $(document).find(".js-validate-rule-add .js-food-number")
    // console.log(trOrder)
    // if( trOrder.length ){
    //     for (let index = 0; index < trOrder.length; index++) {
            
    //         trOrder[index].rules("add", { 
    //             number:true,
    //             min: 10
    //         })
    //     }
    // }
    
    
    formJquery.validate({
        rules: {
            validate_order: {
                validateOrderFood: true
            },
            delivery_month : {
                required : true,
                number   : true,
                max: 12,
                min: 1
            },
            delivery_date : {
                required : true,
                number   : true,
                max: 31,
                min: 1
            },
            delivery_time_start : {
                required : true,
                time : true
            },
            delivery_time_end : {
                required : true,
                time : true
            },
            name_customer: {
                required : true
            },
            mobile: {
                required: true,
                checkHyphen: true,
                number   : true,
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
                validateOrderFood : "vui lòng nhập bảng order"
            }
        },
        errorPlacement: function(error, element) {
            var element = element.closest('td')
            error.appendTo(element);
            return false
        },
    });
}