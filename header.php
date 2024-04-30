<header>
    <style>
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
        }

        header h1 {
            margin: 0;
            padding: 10px;
        }

        nav {
            background-color: #666;
            padding: 10px 0;
            align-items: center;
            display: flex;
            justify-content: space-between;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0 0 0 13px;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        #signup-btn {
            background-color: #007bff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        #signup-btn:hover {
            background-color: #0056b3;
        }

        a {
            text-decoration: none;
            color: #fff;
        }

        .right-corner {
            padding-right: 18px;
        }
        form.search {
    width: 388px;
}
        .imgwidth {
            width: 40px;
            height: 40px;
            margin-top: 9px;
            border-radius: 20px;
        }

        span {
    width: 10%;
    display: flex;
    flex-direction: column-reverse;
    align-items: center;
    position: relative;
    bottom: 8px;
}
        #signup-form button {
            background-color: #007bff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        #signup-form {
            display: none;
            margin-top: 20px;
        }

        #signup-form button:hover {
            background-color: #0056b3;
        }
       .search input[type="text"] {
    border: none;
    border-radius: 10px;
    height: 28px;
    width: 73%;
}
.search{
    margin: 0;
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
        }
  .searchbtn[type="submit"]:hover{
            transform: scale(1.1, 1.1);
            background-color: rgb(78 64 167);
        }
    </style>
    <h1>B & P</h1>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="blog.php">Blog</a></li>
        </ul>
        <form class="search" action="search.php" method="GET">
    <input type="text" name="query" placeholder="Search...">
    <button class="searchbtn" type="submit">Search</button>
</form>

   <div class="right-corner">
    <?php 
        session_start(); 

        if(isset($_SESSION['user_name'])){
            echo "<span><a href='logout.php' class='menu'>Logout</a><img class='imgwidth' src='image/pro.webp'></span>";
        } else {
            echo "<a class='signup-btn' href='signup.php' id='signup-toggle'>Sign Up</a>";
        }
    ?>
</div>

    </nav>
</header>
