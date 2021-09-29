<?php
if (isset($_POST['size'])){
    $conn = \App\ProductDetail::all();
    $color = $_POST['color'];
    $size = $_POST['size'];
    $quantity = $_POST['quantity'];
    $image = $_POST['image'];
    $query = "INSERT INTO customer (color , size, quantity, image) VALUES ('$color' ,'$size', '$quantity', '$image')";
    $result =  mysqli_query($conn, $query);
    if ($result){
        echo "1";
    }else{
        echo "0";
    }

}
