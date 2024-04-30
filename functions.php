<?php

session_start();

include 'db.php';

//Retrieve products from the db
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

//Retrieve blogs from the db
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

//Retrieve a single product by ID
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

//Retrieve a single blog by ID
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

//Get user by email
function getUserByEmail($email) {
    global $conn;
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    if ($user) {
        // Set session variables if user found
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_name'] = $user['name'];
    }
    return $user;
}
//Create a new user
function createUser($name, $email, $password) {
    global $conn;
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // Set session variables after successful registration
        $_SESSION['user_id'] = mysqli_insert_id($conn);
        $_SESSION['user_email'] = $email;
        $_SESSION['user_name'] = $name;
    }
    return $result;
}

?>
