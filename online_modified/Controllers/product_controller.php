<?php
session_start();
require_once __DIR__ . '/../Models/product_model.php'; //ERROR WAS HERE

$action = '';
if (isset($_GET['action'])) 
{
    $action = $_GET['action'];
}

if ($action == 'delete') 
{
    $id = $_GET['id'];
    if (!isset($id)) 
    {
        $id = '';
    }
    if (deleteProduct($id)) 
    {
        $_SESSION['message'] = "The order has been canceled."; 
    } 
    else 
    {
        $_SESSION['message'] = "Failed to cancel the order.";
    }
    header('Location: ../Views/order_view.php'); 
    exit();
}
?>
