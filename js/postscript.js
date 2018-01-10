$("#viewResults").on("click",function(e){
    e.preventDefault();
    $("#poll-form").slideUp("100", function(){
    });
    $("#poll-result").slideDown("100");
});

$("#submitVote").on("click", function(e){
    console.log($(".vote:checked").val());
    console.log('submitVote=true&vote='+$(".vote:checked").val()+"&post_id="+$("#poll_post_id").val()+"&user_id="+$("#poll_user_id").val());
    $.ajax({
        url: "add_poll.php",
        data: 'submitVote=true&vote='+$(".vote:checked").val()+"&post_id="+$("#poll_post_id").val()+"&user_id="+$("#poll_user_id").val(),
        type: "POST",
        success: function(d){
            console.log("the data is:",d);
            var data = JSON.parse(d);
            if(data.pollAdded=="true"){
                $("#viewResults").click();
            }
            else{
                console.log("couldn't register vote");
            }
        },
        error: function(error){console.log("Error with ajax:".error)}
        
    });

    $.ajax({
        url: "poll_result.php",
        data: 'poll_result=true&post_id='+$("#poll_post_id").val(),
        type: "POST",
        success: function(d){
            console.log("the poll_result data is:",d);
            var data = JSON.parse(d);
            if(data.yes){
                $("#poll-result-yes").text(data.yes+" Yes");
                $("#poll-result-no").text(data.no+" No");
                $(".progress-bar-success").css("width",data.yes_percentage+"%");
                $(".progress-bar-danger").css("width",data.no_percentage+"%");
                
            }
        },
        error: function(error){console.log("Error with result ajax:".error)}
        
    });

});