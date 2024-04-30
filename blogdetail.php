<style>
    body{
        margin: 0;
        font-family: Arial, sans-serif;
    }
    p {
    word-spacing: 2px;
    letter-spacing: 1px;
}
</style>
<?php include 'header.php'; ?>
<?php

session_start();
require_once('functions.php');


if (isset($_GET['id'])) {
    $blogId = $_GET['id'];
    
    $blog = getBlogById($blogId);


    if ($blog) {
        echo "<h2>{$blog['title']}</h2>";
        echo "<p>{$blog['content']}</p>";
        echo "<p><strong>Status:</strong> {$blog['status']}</p>";
        echo "<p><strong>Author:</strong> {$blog['author']}</p>";
          echo "<p><strong>Created At:</strong> " . date('F j, Y', strtotime($blog['createdAt'])) . "</p>";
    } else {
        echo "Blog not found.";
    }
} else {
    echo "Blog ID not provided.";
}
?>
<?php include 'footer.php'; ?>
