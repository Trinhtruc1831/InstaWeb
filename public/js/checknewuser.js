$(document).ready(function(){  
    $("#email").keyup(function(){
        var Email = $(this).val();
        $.post("Ajax/CheckNewUser",{email:Email}, function(data){
            $("#messageEmail").html(data);
        });
    });
})