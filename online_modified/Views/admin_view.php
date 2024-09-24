<?php
session_start();
require_once '../Models/product_model.php';

if (isset($_POST['action']) && $_POST['action'] == 'delete') 
{
    $id = $_POST['id'] ?? '';

    if ($id && deleteProduct($id)) 
    {
        $_SESSION['message'] = "Product with ID $id has been deleted.";
    } 
    else 
    {
        $_SESSION['message'] = "Failed to delete product.";
    }
}

$products = getAllProducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        body 
        {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            background-color: #f4f4f9; 
            color: #333; 
            margin: 0;
            padding: 20px;
            line-height: 1.6;
        }
        h1 
        {
            text-align: center; 
            color: #5c4d8e;
            margin-bottom: 20px;
            font-size: 2.5em; 
        }
        .message 
        {
            background-color: #f8d7da; 
            color: #721c24; 
            text-align: center;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #f5c6cb; 
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s; 
        }
        .message:hover 
        {
            background-color: #f5c6cb; 
        }
        ul 
        {
            list-style-type: none; 
            padding: 0;
        }
        li 
        {
            background: white; 
            margin: 10px 0; 
            padding: 15px; 
            border-radius: 8px; 
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex; 
            justify-content: space-between;
            align-items: center;
        }
        input[type="submit"] 
        {
            background-color: #e74c3c; 
            color: white; 
            border: none; 
            padding: 10px 15px; 
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover 
        {
            background-color: #c0392b;
        }
        .cancelled
        {
            color: #e74c3c; 
            font-weight: bold;
        }

    </style>
    
</head>
<body>
    <h1>Admin - Manage Products</h1>

    <div class="message">
        <?php 
        
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message']; 
            unset($_SESSION['message']); 
        }
        ?>
    </div>

    <ul>
        <?php 
        if (is_array($products) && count($products) > 0) {
            for ($i = 0; $i < count($products); $i++) {
                $product = $products[$i]; 
        
                echo '<li id="product-' . $product['id'] . '">';
                
                echo $product['name'] . ' - Stock: ' . $product['stock'];
        
                if (isset($product['cancelled']) && $product['cancelled'] == 1) {
                    echo ' <span class="cancelled">(Cancelled)</span>';
                }
                
                echo '<form action="" method="post" style="margin: 0;">'; 
                echo '<input type="hidden" name="id" value="' . $product['id'] . '">';
                echo '<input type="hidden" name="action" value="delete">';
                echo '<input type="submit" value="Delete" onclick="return confirm(\'Are you sure you want to delete this product?\');">';
                echo '</form>';
                echo '</li>';
            }
        } else {
            echo '<li>No products available.</li>';
        }
        
        ?>
    </ul>
</body>
</html>
