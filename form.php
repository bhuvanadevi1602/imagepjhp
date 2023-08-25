<html>
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    <body>
        <form method="POST">
        <input type="text" name="username" id="username">
            <input type="text" name="email" id="email">
            <input type="submit" name="act" id="act" value="Submit">
        </form>

        <div id="tablefetch"></div>
    </body>
</html>

<script type="text/javascript">
$(document).ready(function(){
    showUser();
    $("#act").click(function(event){
if($("#username").val()=="" && $("#email").val()=="")
    {
alert("Please Fill");
    }
    else{
        event.preventDefault();
        username=$("#username").val();
        email=$("#email").val();
      //  alert(username+email);
        $.ajax({
            url:"insert.php",
            type:"POST",
            data:{
                username:username,
                email:email,
            },
            success:function(){
         //       alert("success");
showUser();
            }
        })
    }
})
});

function showUser(){
$.ajax({    
url:'action.php',
type:'POST',
async:false,
data:{
    show:1
},
success:function(response){
$('#tablefetch').html(response);
}
});
}
</script>