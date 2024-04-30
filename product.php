<?php
session_start();
require_once('functions.php');

if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    $product = getProductById($productId); 
} else {
    header("Location: shop.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <style>
     body {
    font-family: Arial, sans-serif;
    margin: 0;
}

.product-details {
    margin: 0 auto;
    text-align: center; 
}
.product-details img {
    width: 16%;
    margin-bottom: 20px;
}
header {
    height: 115px;
    background-color: #333;
    color: #fff;
    padding: 10px 0;
}
.product-details h2 {
    font-size: 24px;
    margin-bottom: 10px;
}
h2{
    margin-bottom: 0;
}
.product-details p {
    margin-bottom: 10px;
}

.product-details p.price {
    font-weight: bold;
    color: #007bff;
}

    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <h2>Product Detail</h2>

    <?php if (!empty($product)): ?>
        <div class="product-details">
            <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
            <h3><?php echo $product['name']; ?></h3>
            <p><?php echo $product['description']; ?></p>
            <p>$<?php echo $product['price']; ?></p>
        </div>
    <?php else: ?>
        <p>No product found with the provided ID.</p>
    <?php endif; ?>

    <?php include 'footer.php'; ?>
</body>
</html>
