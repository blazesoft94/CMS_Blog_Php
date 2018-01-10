$("#signupSubmit").click(function(e){
    if ($("#pass1")[0].value!==$("#pass2")[0].value){
        alert("passwords do not match");
        e.preventDefault();
    }
    else if($("#emailAvailability").text()=="Email available" && $("#usernameAvailability").text()=="Username availabe" && $("#passMatch").text()=="Passwords Matched"){
        $.ajax({
            url: "create_user.php",
            data: 'username='+$("#signupUsername").val()+"&password="+$("#pass1").val()+"&firstname="+$("#firstname").val()+"&lastname="+$("#lastname").val()+"&email="+$("#signupEmail").val(),
            type: "POST",
            success: function(d){
                var data = JSON.parse(d);
                if(data.added=="true"){
                    $("#signUp .form-group").slideUp("200", function(){
                        $("#signupEnd").slideDown("100");
                        
                    });
                    $("#signupSubmit").fadeOut();
                }
                else{
                    console.log("couldn't add");
                }
            },
            error: function(error){console.log("Error with ajax:".error)}
            
        });
        e.preventDefault();
    }
    else{
        console.log("some problem");
        e.preventDefault();
    }
    
});

$("#signupCancel").click(function(e){
    $("#signUp .form-group").slideDown();
    $("#signupEnd").slideUp();
    $("#signupSubmit").fadeIn();
    $("#signUp .form-group input").val("");
    $("#signUp .form-group span").text("");
});

$("#signinButton").click(function(e){
    $("#signIn #wrongUsername").slideUp();
    $("#signIn #wrongPassword").slideUp();
    $.ajax({
        url: "sign_in.php",
        data: 'username='+$("#signinUsername").val()+"&password="+$("#signinPassword").val(),
        type: "POST",
        success: function(d){
            var data = JSON.parse(d);
            if(data.login=="false"){
                if(data.username=="false"){
                    $("#signIn #wrongUsername").slideDown();
                }
                else{
                    $("#signIn #wrongPassword").slideDown();
                }
            }
            else{
                $("#signinSubmit").click();
            }
        },
        error: function(error){console.log("Error with ajax:".error)}
        
    });
    
});
$("#signinUsername, #signinPassword").on("keypress", function(e){
    if(e.which==13){
        e.preventDefault();
        $("#signinButton").click();
    }
});

document.getElementById("pass2").addEventListener("keyup",function(){
    if ($("#pass1")[0].value!==$("#pass2")[0].value){
        $("#passMatch").text("Passwords Don't Match");
        $("#passMatch").addClass("text-danger");
        $("#passMatch").removeClass("text-success");
    }
    else{
        
        $("#passMatch").text("Passwords Matched");
        $("#passMatch").addClass("text-success");
        $("#passMatch").removeClass("text-danger");
    }
});

document.getElementById("signupUsername").addEventListener("change",function(){
    $.ajax({
        url: "check_username_availability.php",
        data: 'username='+$("#signupUsername").val(),
        type: "POST",
        success: function(d){
            var data = JSON.parse(d);
            if(data.available=="true"){
                $("#usernameAvailability").text("Username availabe");
                $("#usernameAvailability").addClass("text-success");
                $("#usernameAvailability").removeClass("text-danger");
            }
            else{
                $("#usernameAvailability").text("Username not availabe");
                $("#usernameAvailability").addClass("text-danger");
                $("#usernameAvailability").removeClass("text-success");
            }
        },
        error: function(error){console.log("Error with ajax:".error)}
        
    });
});
document.getElementById("signupEmail").addEventListener("change",function(){
    var email = $("#signupEmail").val();
    if(email.match(/^[a-z0-9]+([._][a-z]+)?@[a-z]+\.[a-z]+$/)){
        $.ajax({
            url: "check_email_availability.php",
            data: 'email='+$("#signupEmail").val(),
            type: "POST",
            success: function(d){
                var data = JSON.parse(d);
                if(data.available=="true"){
                    $("#emailAvailability").text("Email available");
                    $("#emailAvailability").addClass("text-success");
                    $("#emailAvailability").removeClass("text-danger");
                }
                else{
                    $("#emailAvailability").text("Email already used");
                    $("#emailAvailability").addClass("text-danger");
                    $("#emailAvailability").removeClass("text-success");
                }
            },
            error: function(error){console.log("Error with ajax:".error)}
            
        });
    }
    else{
        $("#emailAvailability").text("Invalid Email");
        $("#emailAvailability").addClass("text-danger");
        $("#emailAvailability").removeClass("text-success");
    }
});

$("#logout").on("click", function(){
    $("#logoutButton").click();
});