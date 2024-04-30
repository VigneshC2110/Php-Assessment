<?php
session_start();
require_once('functions.php');

$blogs = getAllBlogs();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }
        .blog-title a{
            color: black;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <h2>All Blogs</h2>

    <div class="blog-list">
        <?php if (!empty($blogs)): ?>
            <ul>
                <?php foreach ($blogs as $blog): ?>
                    <li>
                    <h3 class="blog-title">
    <a href="blogdetail.php?id=<?php echo $blog['id']; ?>"><?php echo $blog['title']; ?></a>
</h3>

                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No blogs found.</p>
        <?php endif; ?>
    </div>

    <?php include 'footer.php'; ?>

</body>
</html>
