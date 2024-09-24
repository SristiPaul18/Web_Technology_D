<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
    <style>
        body {
            font-family: Georgia, 'Times New Roman', Times, serif, sans-serif;
            background-color: #f4f4f4; 
            color: #333; 
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center; 
            color: #5c4d8e;
        }
        ul {
            list-style-type: none; 
            padding: 0;
        }
        li {
            background: white; 
            margin: 10px 0; 
            padding: 15px; 
            border-radius: 8px; 
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex; 
            justify-content: space-between;
            align-items: center;
        }
        a {
            text-decoration: none; 
            color: #e74c3c; 
            font-weight: bold; 
        }
        a:hover {
            color: #c0392b;
        }
    </style>
</head>
<body>
    <h1>Admin - Manage Products</h1>
    <ul>
        <?php 
        require_once '../Models/product_model.php'; 

        $products = getAllProducts();

        if (is_array($products) && count($products) > 0) {
            $i = 0;
            while ($i < count($products)) {
                echo '<li>';
                echo $products[$i]['name'] . ' - Stock: ' . $products[$i]['stock'];
                echo ' <a href="../Controllers/product_controller.php?action=delete&id=' . $products[$i]['id'] . '">Delete</a>';
                echo '</li>';
                $i++;
            }
        } else {
            echo '<li>No products available.</li>';
        }
        ?>
    </ul>
</body>
</html>
