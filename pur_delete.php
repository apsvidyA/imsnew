<?php
    include 'connection.php';
    
    

    if(isset($_GET['deleted'])){
    $sql = "delete from purchase where purchase_id = '{$_GET['did']}'";
    if(mysqli_query($db, $sql)){
        
        $con = "delete from stock_details where purchase_id = '{$_GET['did']}'";
        if(mysqli_query($db, $con)){
            echo "\n<script>alert('Records deleted successfully.');</script>";
        }
        header('location: purchase.php');  
    }

    else{
       echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
   }
    }

?>
