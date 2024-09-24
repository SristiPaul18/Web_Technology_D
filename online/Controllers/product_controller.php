<?php
session_start();
require_once '../Models/product_model.php'; 

$action = isset($_GET['action']);

if ($action == 'delete') {
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

    if (deleteProduct($id)) {
        echo "Product with ID $id deleted successfully!";
    } else {
        echo "Failed to delete product.";
    }

    header('Location: ../index.php?action=admin');
    exit();
}

if ($action == 'admin') {
    include '../Views/admin_view.php';
} else {
    include '../Views/order_view.php';
}
?>
