<?php
error_reporting(0);
$connect_db=mysqli_connect("localhost","root","","ajax");
if(isset($_POST['submit'])){
    $s=array();
$total = count($_FILES['image_file']['name']);
        
        for($i=0; $i<$total; $i++){
        $images=$_FILES['image_file']['name'][$i];
        $s=array($images);
       $img.=$images.',';
        $tmpFilePath=$_FILES['image_file']['tmp_name'][$i];
        $path="uploads/".basename($images);
        if($tmpFilePath != ""){
    
        $img_name = $_FILES['image_file']['name'][$i];
        }
    }
  // print_r($img);
      
     
      if(move_uploaded_file($tmpFilePath,$path))
        {
            $sql="insert into img(img) values('$img')";
            $xe=mysqli_query($connect_db,$sql);
          $res="success"; 
        //  // $update_query="INSERT INTO project_upload (image_name,image_id)VALUES('$images','$img_id')";
            // $update_sql=$connect_db->prepare($update_query);
            // $update_sql->execute();
            if($res)
            {
                echo $res;
                // echo "<script>alert('Images Updated Successfully');</script>";
                // echo "<script>window.location.href='view_project.php'</script>";
            }
        }
        }
    
        ?>      
<form method="POST" enctype="multipart/form-data">
<input type="file" name="image_file[]" multiple>
<input type="submit" name="submit">
</form>

<!-- <input name="business_keyword[]" id="business_keyword" class="choices form-select multiple-remove" multiple="multiple" required> -->
                                              