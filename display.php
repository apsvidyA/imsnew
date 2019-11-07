<?php 
    include 'connection.php';
    if(isset($_GET['dis'])){
        $sql = "select * from stock_details where stock_id = '{$_GET['id']}'";
        $query = mysqli_query($db, $sql);
        $row = $query -> fetch_assoc();
        $sid = $row['stock_id'];
?>


<!DOCTYPE html>
<html>
<head>
<title>Display</title>
</head>

<body>
    <h1>PRODUCT STATUS</h1>
    <h3> Purchase ID : </h3><?php echo $row['purchase_id'];?><br><br>
    <h3> Stock ID : </h3><?php echo $sid;?><br><br>
    <h3> Stock Name: </h3><?php echo $row['stock_name'];?><br><br>
    <h3> Quantity : </h3><?php echo $row['quantity'];?><br><br>
    <h3> Department Residing : </h3><?php echo $row['dept_residing'];?><br><br>
    <h3> Consumable : </h3><?php echo $row['consumable'];?><br><br>
    <h3> Report: </h3><?php echo $row['report'];?><br><br>
    <h3> Product Status / Condition : </h3> <input type = "text" name="status" value="<?php  echo $row['product_status'];?>"><input type="submit" value="Submit" name="pstatus">
<?php
    

    if(isset($_POST['pstatus'])){
        $producstatus = mysqli_real_escape_string($db, $_POST['status']);
        $slq = 'UPDATE stock_details SET product_status = '.$producstatus.' WHERE stock_id = '.$sid.'';
        if(mysqli_query($db, $slq)){
            echo "<script>alert('Product Status added successfully');</script>";
        }
    }
}
?>


</body>
</html>

