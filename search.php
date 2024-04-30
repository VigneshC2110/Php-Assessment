<?php
session_start();

if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit();
}

require_once('db.php');

$searchResults = [];
$noResultsMessage = "";

if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];

    $sqlProducts = "SELECT * FROM products WHERE name LIKE '%$searchQuery%'";
    $resultProducts = $conn->query($sqlProducts);

    if ($resultProducts->num_rows > 0) {
        while ($row = $resultProducts->fetch_assoc()) {
            $searchResults['products'][] = $row;
        }
    }

    $sqlBlogs = "SELECT * FROM blogs WHERE title LIKE '%$searchQuery%'";
    $resultBlogs = $conn->query($sqlBlogs);

    if ($resultBlogs->num_rows > 0) {
        while ($row = $resultBlogs->fetch_assoc()) {
            $searchResults['blogs'][] = $row;
        }
    }
    if (empty($searchResults)) {
        $noResultsMessage = "No products or blogs found matching '$searchQuery'";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }

img {
    width: 13%;
}
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <h2>Search Results</h2>

    <?php if (!empty($searchResults['products'])): ?>
    <h3>Products</h3>
    <ul>
        <?php foreach ($searchResults['products'] as $product): ?>
            <li>
                <h4><?php echo $product['name']; ?></h4>
                <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                <p>Description: <?php echo $product['description']; ?></p>
                <p>Price: <?php echo $product['price']; ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if (!empty($searchResults['blogs'])): ?>
    <h3>Blogs</h3>
    <ul>
        <?php foreach ($searchResults['blogs'] as $blog): ?>
            <li>
                <h4><?php echo $blog['title']; ?></h4>
                <p>Content: <?php echo $blog['content']; ?></p>
                <p>Status: <?php echo $blog['status']; ?></p>
                <p>Author: <?php echo $blog['author']; ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

    <?php include 'footer.php'; ?>
</body>
</html>
