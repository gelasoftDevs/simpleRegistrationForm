$(document).ready(function () {
    /* Catch the sign up button click event */
    $("#signUp").click(function () {
        /* Send the request to teh server */
        $.ajax({
            type: 'POST', // The request type POST or GET
            url: "app/controller.php", // The URL to the controller
            dataType: 'html', // The data type json, html, img etc...
            async: true, // async or sync
            /* The main request body */
            data: {
                action: "signUp", // The action that we are catching at controller.php
                username: $('#username').val(), // Get the username user input
                email:    $("#email").val(), // Get the email user input
                password: $('#password').val() // Get the password user input
            },
            success: function (data) {
                /* We are getting here, if everything is ok */
                alert("User registered!");
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                /* If something goes wrong we're comming here */
                alert(errorThrown);
            }
        });
    });
});