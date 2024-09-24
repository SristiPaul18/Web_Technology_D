<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Page</title>
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
        table 
        {
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 20px; 
        }
        th, td 
        {
            padding: 15px; 
            text-align: left;
            border-bottom: 1px solid #ddd; 
        }
        th 
        {
            background-color: #5c4d8e; 
            color: white; 
        }
        tr:hover 
        {
            background-color: #f1f1f1;
        }
        .stock-over 
        {
            color: #e74c3c; 
            font-weight: bold;
        }
        .stock-available 
        {
            color: #28a745; 
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Products Ordered</h1>
    
    <?php 
    session_start();
    if (isset($_SESSION['message'])) 
    {
        echo '<div class="message">' . $_SESSION['message'] . '</div>';
        unset($_SESSION['message']); 
    }
    ?>
    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            require_once '../Models/product_model.php'; 
            $products = getAllProducts(); 

            if (is_array($products) && count($products) > 0) 
            {
                foreach ($products as $product) 
                {
                    echo '<tr>';
                    if (isset($product['cancelled']) && $product['cancelled'] == 1) 
                    {
                        echo '<td>' . $product['name'] . '</td>'; 
                        echo '<td class="stock-over">Stock Over</td>';
                    } 
                    else 
                    {
                        echo '<td>' . $product['name'] . '</td>'; 
                        echo '<td class="stock-available">In Stock</td>'; 
                    }
                    echo '</tr>';
                }
            } 
            else 
            {
                echo '<tr><td colspan="2">No products available.</td></tr>';
            }
            ?>
        </tbody>
    </table>
</body>
</html>
