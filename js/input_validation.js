/**
 * Created on 2/13/17.
 */
$(document).ready(function () {
    //todo validate format of email
    function validateEmail() {
        var email = document.forms["confirm_form"]["mail"].value;
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    //todo validate format of phone
    function validatePhone() {
        var phone = document.forms["confirm_form"]["tel"].value.replace(/[━.*‐.*―.*－.*\-.*ー.*\-]/gi,'');
        var ph = /^(0[5-9]0[0-9]{8}|0[1-9][1-9][0-9]{7})$/;
        return ph.test(phone);
    }

    //todo check blur input
//    for (v1 = 0; v1 < document.getElementsByName("kind").length; v1++) {
//        $(document.getElementsByName("kind").item(v1)).click(function () {
//            $("#chk_kind").css("display", "none", "important");
//        });
//    }
//    $("#facilities").change(function () {
//        $("#chk_facilities").css("display", "none", "important");
//    });
    for (v = 0; v < document.getElementsByName("consent").length; v++) {
        $(document.getElementsByName("consent").item(v)).click(function () {
          if (document.forms["confirm_form"]["consent"].value == 0) {
              $("#chk_consent").css("display", "block", "important");
          } else {
            $("#chk_consent").css("display", "none", "important");
          }
        });
    }
    for (v = 0; v < document.getElementsByName("member_sex").length; v++) {
        $(document.getElementsByName("member_sex").item(v)).click(function () {
          if (document.forms["confirm_form"]["member_sex"].value == 0) {
              $("#chk_member_sex").css("display", "block", "important");
          } else {
            $("#chk_member_sex").css("display", "none", "important");
          }
        });
    }
    $(document.getElementsByName('member_num')).change(function () {
        if (document.forms["confirm_form"]["member_num"].value == 0) {
            $("#chk_member_num").css("display", "block", "important");
        } else {
            $("#chk_member_num").css("display", "none", "important");
        }
    });
    $(document.getElementsByName('birth_year')).change(function () {
        if (document.forms["confirm_form"]["birth_year"].value == 0) {
            $("#chk_birth_day").css("display", "block", "important");
        } else {
            $("#chk_birth_day").css("display", "none", "important");
        }
    });
    $(document.getElementsByName('birth_month')).change(function () {
        if (document.forms["confirm_form"]["birth_month"].value == 0) {
            $("#chk_birth_day").css("display", "block", "important");
        } else {
            $("#chk_birth_day").css("display", "none", "important");
        }
    });
    $(document.getElementsByName('birth_day')).change(function () {
        if (document.forms["confirm_form"]["birth_day"].value == 0) {
            $("#chk_birth_day").css("display", "block", "important");
        } else {
            $("#chk_birth_day").css("display", "none", "important");
        }
    });
    $(document.getElementsByName('name')).blur(function () {
        if (document.forms["confirm_form"]["name"].value.trim() === "") {
            $("#chk_name").css("display", "block", "important");
        } else {
            $("#chk_name").css("display", "none", "important");
        }
    });
    $(document.getElementsByName('kana')).blur(function () {
        if (document.forms["confirm_form"]["kana"].value.trim() == "") {
            $("#chk_kana").css("display", "block", "important");
        } else {
            $("#chk_kana").css("display", "none", "important");
        }
    });
    $(document.getElementsByName('mail')).blur(function () {
        if ((document.forms["confirm_form"]["mail"].value.trim() !== "") && (validateEmail() === true)) {
            $("#chk_mail").css("display", "none", "important");
        } else {
            $("#chk_mail").css("display", "block", "important");
        }
    });
    $(document.getElementsByName('tel')).blur(function () {
        if ((document.forms["confirm_form"]["tel"].value.trim() !== "") && (validatePhone() === true)) {
            $("#chk_tel").css("display", "none", "important");
        } else {
            $("#chk_tel").css("display", "block", "important");
        }
    });
    $(document.getElementsByName('inspect_content')).blur(function () {
        if (document.forms["confirm_form"]["inspect_content"].value.trim() !== "") {
            $("#chk_inspect_content").css("display", "none", "important");
        } else {
            $("#chk_inspect_content").css("display", "block", "important");
        }
    });

    /*$(document.getElementsByName('pref')).blur(function () {
        if (document.forms["confirm_form"]["pref"].value.trim() === "") {
            $("#chk_pref").css("display", "block", "important");
        } else {
            $("#chk_pref").css("display", "none", "important");
        }
    });
    $(document.getElementsByName('addr1')).blur(function () {
        if (document.forms["confirm_form"]["addr1"].value.trim() === "") {
            $("#chk_addr1").css("display", "block", "important");
        } else {
            $("#chk_addr1").css("display", "none", "important");
        }
    });
    $(document.getElementsByName('zip_1')).blur(function () {
        if (document.forms["confirm_form"]["zip_1"].value.trim() === "") {
            $("#chk_zip_1").css("display", "block", "important");
        } else {
            $("#chk_zip_1").css("display", "none", "important");
        }
    });
    $(document.getElementsByName('zip_2')).blur(function () {
        if (document.forms["confirm_form"]["zip_2"].value.trim() === "") {
            $("#chk_zip_2").css("display", "block", "important");
        } else {
            $("#chk_zip_2").css("display", "none", "important");
        }
    });*/


//    $(document.getElementsByName('inspect_content')).blur(function () {
//        if (document.forms["confirm_form"]["inspect_content"].value.trim() === "") {
//            $("#chk_inspect_content").css("display", "block", "important");
//        } else {
//            $("#chk_inspect_content").css("display", "none", "important");
//        }
//    });

    //todo validate if all fields are empty.
    function validateForm() {
        var text_fields = ["name", "kana", "mail", "tel", "inspect_content"];
        var i, text_fieldname, flag = true;
        for (i = 0; i < text_fields.length; i++) {
            text_fieldname = text_fields[i];
            if ($("#confirm_form :input[name='" + text_fieldname + "']").val().trim() === "") {
                $("#chk_" + text_fieldname).css("display", "block", "important");
                flag = false;
            } else {
                $("#chk_" + text_fieldname).css("display", "none", "important");
            }
            if (text_fieldname == "mail") {
                $("#mail").on("keyup", function () {
                    if (this.value.length > 0) {
                        if (!validateEmail()) {
                            $("#chk_mail").css("display", "block", "important");
                        } else {
                            $("#chk_mail").css("display", "none", "important");
                        }
                    }
                });
            }
            if (text_fieldname == "tel") {
                $("#tel").on("keyup", function () {
                    if (this.value.length > 0) {
                        if (!validateEmail()) {
                            $("#chk_tel").css("display", "block", "important");
                        } else {
                            $("#chk_tel").css("display", "none", "important");
                        }
                    }
                });
            }
        }
        if (document.forms["confirm_form"]["member_num"].value == 0) {
            $("#chk_member_num").css("display", "block", "important");
            flag = false;
        }
        if (document.forms["confirm_form"]["birth_year"].value == 0) {
            $("#chk_birth_day").css("display", "block", "important");
            flag = false;
        }
        if (document.forms["confirm_form"]["birth_month"].value == 0) {
            $("#chk_birth_day").css("display", "block", "important");
            flag = false;
        }
        if (document.forms["confirm_form"]["birth_day"].value == 0) {
            $("#chk_birth_day").css("display", "block", "important");
            flag = false;
        }
        var radio_fields = ["consent"];
        var j, radio_fieldname;
        for (j = 0; j < radio_fields.length; j++) {
            radio_fieldname = radio_fields[j];
            if ($("input[name=" + radio_fieldname + "]:checked").val() === undefined) {
                $("#chk_" + radio_fieldname).css("display", "block", "important");
                flag = false;
            }
            if ($("input[name=" + radio_fieldname + "]:checked").val() === 0) {
                $("#chk_" + radio_fieldname).css("display", "block", "important");
                flag = false;
            }
        }
        var radio_fields = ["member_sex"];
        var j, radio_fieldname;
        for (j = 0; j < radio_fields.length; j++) {
            radio_fieldname = radio_fields[j];
            if ($("input[name=" + radio_fieldname + "]:checked").val() === undefined) {
                $("#chk_" + radio_fieldname).css("display", "block", "important");
                flag = false;
            }
        }
        if (!flag) {
            return false;
        }
        return true;
    }

    $("#confirm_form").submit(function () {
        if (!validateForm() || !validateEmail() || !validatePhone()) {
            //todo clean code
            $(".red").each(function () {
                if ($(this).css('display') === "block") {
                    $('html,body').animate({
                        scrollTop: $(this).offset().top - 200
                    }, 'slow');
                    return false;
                }
                if (!validateEmail() && !validatePhone()) {
                    $("#chk_mail").css("display", "block", "important");
                    $("#chk_tel").css("display", "block", "important");
                    $("#chk_inspect_content").css("display", "block", "important");
                    $('html,body').animate({
                        scrollTop: $("#chk_inspect_content").offset().top - 400
                    }, 'slow');
                    return false;
                }
            });
            return false;
        } else {
          return true;
        }
    });

});
