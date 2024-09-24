<?php
session_start();
require_once '../Models/product_model.php'; 

$action = isset($_GET['action']);

if ($action == 'delete') {
    $id = isset($_GET['id']);

    if (deleteProduct($id)) {
        echo "Product with ID $id deleted successfully!";
    } else {
        echo "Failed to delete product.";
    }

    header('Location: ../index.php?action=admin');
    exit();
}

?>
