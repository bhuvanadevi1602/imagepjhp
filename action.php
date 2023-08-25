<?php
include('config.php');

if(isset($_POST['show'])){
?>
<table>
    <thead>
    <th>S.No</th>
     <th>Username</th>
        <th>Email</th>
    </thead>
    <tbody>
        <?php
$res="select * from sample";
$exe=mysqli_query($con,$res);
//$val=mysqli_fetch_assoc($exe);
$i=0;
while($row=mysqli_fetch_assoc($exe)){
?>
<tr>
    <td><?=$i+1?></td>
    <td><?=$row['name']?></td>
    <td><?=$row['email']?></td>
</tr>
<?php
}

?>
    </tbody>
</table>

<?php
}


?>