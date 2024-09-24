<?php
require_once 'db.php';

function getProduct($id) 
{
    $con = con(); 
    $sql = "SELECT * FROM products WHERE id = '$id'";
    $res = mysqli_query($con, $sql);
    return $res;
}

function getAllProducts() 
{
    $con = con();
    $sql = "SELECT * FROM products";
    $res = mysqli_query($con, $sql);
    
    $products = [];
    if ($res && mysqli_num_rows($res) > 0) 
    {
        while ($row = mysqli_fetch_assoc($res)) 
        {
            $products[] = $row;
        }
    }
    return $products; 
}

function deleteProduct($id) 
{
    $con = con();
    $sql = "UPDATE products SET cancelled = 1 WHERE id = '$id'";
    $res = mysqli_query($con, $sql);
    return $res;
}

?>
