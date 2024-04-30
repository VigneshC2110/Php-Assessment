<?php
session_start();
require_once('functions.php');

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($name) || empty($email) || empty($password)) {
        $message = "All fields are required.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $result = createUser($name, $email, $hashed_password);
        
        if ($result) {
            $_SESSION['user_id'] = $result;
            $_SESSION['user_name'] = $name;
            $_SESSION['user_email'] = $email;
            header("Location: login.php");
            exit();
        } else {
            $message = "Error: Unable to sign up. Please try again later.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }
        .search{
            margin: 0;
            box-shadow: none;
            padding: 0;
            width: 388px;
        }
        .searchbtn[type="submit"] {
            background-color: rgb(106, 90, 205);
            color: white;
            border-radius: 5px;
            border: none;
            width: 23%;
            height: 25px;
            margin-bottom: 6px;
            transition: 0.3s;
            cursor: pointer;
            position:unset ;
        }
  .searchbtn[type="submit"]:hover{
            transform: scale(1.1, 1.1);
            background-color: rgb(78 64 167);
        }
        form {
            box-shadow: 1px 1px 14px 9px #d9d9d9;
            width: 42%;
            margin: 90px auto;
            padding: 7px;
        }
        h2 {
            text-align: center;
        }
        input {
            width: 92%;
            height: 30px;
            margin-top: 5px;
            margin-bottom: 5px;
            border-radius: 8px;
            border: 1px solid;
            outline: none;
            font-family: "Poppins", sans-serif;
            transition: 0.3s;
        }
        input:focus {
            width: 97%;
        }
        label {
            font-size: 17px;
            font-weight: 600;
        }
        button[type="submit"] {
            background-color: rgb(60, 179, 113);
            color: white;
            border-radius: 5px;
            border: none;
            width: 17%;
            position: relative;
            left: 39%;
            height: 30px;
            margin-bottom: 6px;
            transition: 0.3s;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            transform: scale(1.1, 1.1);
            background-color: rgb(38 133 80);
        }
        form a{
            color: blue;
        }
        form a:hover{
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <h2>Sign Up</h2>
    <div class="signup-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <button type="submit">Sign Up</button>
        
        <p>If already Signup?<a href="login.php">Login</a></p>
    </form>
    </div>
    <?php include 'footer.php'; ?>

</script>
</body>
</html>
