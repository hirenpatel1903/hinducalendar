$(function() {

    $(document).mouseup(function (e) { 

        $("#signupfrm").validate({
            ignore: [],
            rules: {
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    email : true
                },
                mobile: {
                    required: true,
                    maxlength: 10,
                    number: true
                },
                password: {
                    required: true,
                    minlength: 6,
                },
                conf_password: {
                    required: true,
                    equalTo : "#password"
                }
            },
            messages: {
                name: {
                    required: "Name is required."
                },
                email: {
                    required: "Email is required.",
                    email : "Email is not valid.",
                },
                mobile: {
                    required: "Number is required.",
                    maxlength: "Enter 10 Digit only.",
                    number: "Only number input."
                },
                password: {
                    required: "Password is required.",
                    minlength: "Password should more then 6 character."
                },
                conf_password: {
                    required: "Password is required.",
                    equalTo: "Password and confirm password doesn't match."
                },
            },
            submitHandler: function (form) {
                if($("form").validate().checkForm()){                    
                    $(".submitbutton").attr("type","button");
                    $(".submitbutton").addClass("disabled");                    
                    form.submit();
                }    
            },
        });

        $("#signinfrm").validate({
            ignore: [],
            rules: {
                email: {
                    required: true,
                    email : true
                },
                password: {
                    required: true,
                    minlength: 6,
                }
            },
            messages: {
                email: {
                    required: "Email is required.",
                    email : "Email is not valid.",
                },
                password: {
                    required: "Password is required.",
                    minlength: "Password should more then 6 character."
                },
            },
            submitHandler: function (form) {
                if($("form").validate().checkForm()){                    
                    $(".submitbutton").attr("type","button");
                    $(".submitbutton").addClass("disabled");                    
                    form.submit();
                }    
            },
        });
    });
});