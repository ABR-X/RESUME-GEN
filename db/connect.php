<?php 
    $con=new mysqli('localhost','root','','abrt_cv_gen');
    if(!$con){
        die(mysqli_error($con));
    }
?>  