$(document).ready(function () {

    $().ready(function () {
        // Validate Register form on keyup and submit
        $("#registerForm").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2,
                    accept: "[a-zA-Z]+"
                },
                password: {
                    required: true,
                    minlength: 8
                },
                email: {
                    required: true,
                    email: true,
                    remote: "/check-email"
                },
            },
            messages: {
                name: {
                    required: "Please enter your Name",
                    minlength: "Your Name must be at least 2 characters long",
                    accept: "Your Name must contain letters only"
                },
                password: {
                    required: "Please provide your Password",
                    minlength: "Your Password must be at least 8 characters long"
                },
                email: {
                    required: "Please enter your Email",
                    email: "Please enter valid Email",
                    remote: "Email already exists!"
                },
            }
        });
    });
    $('#myPassword').passtrength({
        minChars: 4,
        passwordToggle: true,
        tooltip: true,
        eyeImg: "/images/front_images/eye.svg"
    });
    $("#loginForm").validate({
        rules:{
            email:{
                required:true,
                email:true
            },
            password:{
                required:true
            }
        },
        messages:{
            email:{
                required: "Please enter your Email",
                email: "Please enter valid Email"
            },
            password:{
                required:"Please provide your Password"
            }
        }
    });
    $("#accountForm").validate({
        rules:{
            name:{
                required:true,
                minlength:2,
                accept: "[a-zA-Z]+"
            },
            address:{
                required:true,
                minlength:6
            },
            city:{
                required:true,
                minlength:2
            },
            state:{
                required:true,
                minlength:2
            },
            country:{
                required:true
            }
        },
        messages:{
            name:{
                required:"Please enter your Name",
                minlength: "Your Name must be at least 2 characters long",
                accept: "Your Name must contain letters only"
            },
            address:{
                required:"Please provide your Address",
                minlength: "Your Address must be at least 10 characters long"
            },
            city:{
                required:"Please provide your City",
                minlength: "Your City must be at least 2 characters long"
            },
            state:{
                required:"Please provide your State",
                minlength: "Your State must be at least 2 characters long"
            },
            country:{
                required:"Please select your Country"
            },
        }
    });
});
