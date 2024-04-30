<?php

session_start();

include 'db.php';

function createUser($name, $email, $password) {
    global $conn;
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['user_id'] = mysqli_insert_id($conn);
        $_SESSION['user_email'] = $email;
        $_SESSION['user_name'] = $name;
    }
    return $result;
}

function getUserByEmail($email) {
    global $conn;
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_name'] = $user['name'];
    }
    return $user;
}

function getAllProducts() {
    global $conn;
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
    $products = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }
    return $products;
}

function getAllBlogs() {
    global $conn;
    $sql = "SELECT * FROM blogs";
    $result = $conn->query($sql);
    $blogs = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $blogs[] = $row;
        }
    }
    return $blogs;
}

function getProductById($id) {
    global $conn;
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

function getBlogById($id) {
    global $conn;
    $sql = "SELECT * FROM blogs WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}
?>
