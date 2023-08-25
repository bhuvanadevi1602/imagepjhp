<?php
error_reporting(0);
if(isset($_POST['submit']))
$img=count($_FILES['image']['name']);
//echo $img;
for($i=0;$i<$img;$i++){
    // echo $_FILES['image']['name'][$i];
    // echo '<br/>';
    $imgname=$_FILES['image']['name'][$i];
    $imgtemp=$_FILES['image']['tmpname'][$i];
    $path="uploads/".$imgname;
   // echo $path;
   $res=move_uploaded_file($imgtemp,$path);
   echo $res; 
//    if()){
//         $res="Success";
//     }
}
// if($res){
// echo "Success";
// }
?>

<form method="POST" enctype="multipart/form-data">
<input type="file" name="image[]" multiple>
<input type="submit" name="submit">
</form>