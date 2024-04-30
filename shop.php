<?php
session_start();

if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit();
}

require_once('functions.php');

$products = getAllProducts(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }
        .product-grid {
            display: grid;
            grid-gap: 20px;
            margin-left: 5px;
            grid-template-columns: auto auto auto auto auto;
        }
        .product-card {
            width: 200px; 
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
            float: left;
            margin-right: 20px; 
        }
        .product-card a{
            color: #000;
        }
        .product-image {
            width: 55%;
            height: auto;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <h2>Shop</h2>

    <div class="product-grid">
        <?php foreach ($products as $product): ?>
            <div class="product-card">
                <a href="product.php?id=<?php echo $product['id']; ?>"> 
                    <img class="product-image" src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                    <h3><?php echo $product['name']; ?></h3>
                    <p><?php echo $product['description']; ?></p>
                    <p>$<?php echo $product['price']; ?></p>
                </a>
            </div>
        <?php endforeach; ?>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
