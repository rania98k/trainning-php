<?php
include('inc/db.php'); 
$sql = "DELETE FROM employees WHERE id='" . $_GET["id"] . "'";

$run = mysqli_query($mysqli,$sql);

if($run == true){
			
    echo "<script> 
            alert('Employee Deleted');
            window.open('dashboard.php','_self');
          </script>";
}else{
    echo "<script> 
    alert('Failed to delete');
    </script>";
}

mysqli_close($mysqli);
?>