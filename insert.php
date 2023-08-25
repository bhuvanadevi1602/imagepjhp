
<?php
include('config.php');
//echo "hello";
//if(isset($_POST["act"])){
    $firstname=$_POST['username'];
    $email=$_POST['email'];

    $eql="insert into sample(name,email) values('$firstname','$email')";
   //print_r("Hello");die();
    $exe=mysqli_query($con,$eql);

//}

?>
