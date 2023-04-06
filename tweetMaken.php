<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tweetstyle.css">
    <title>Post a tweet | Bluebird</title>
</head>

<body>

    <h1>Post a tweet!</h1>

    <form method="POST" autocomplete="off">
        <input type="text" name="username" placeholder="Username">
        <br>
        <input type="text" name="content" placeholder="Type your tweet">
        <input type="submit">
    </form>
    <footer> Copyright ©
        <script>
            document.write(new Date().getFullYear());
        </script>
        BlueBird. All Rights Reserved
    </footer>
</body>

</html>

<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

if (isset($_POST["content"])) {
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=bluebird", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    //"INSERT INTO tweets (content, username)
    //VALUES('coole eerste tweet', 'marcel')"
    $x = $conn->prepare("INSERT INTO tweets (content, user)
                    VALUES('{$_POST["content"]}', '{$_POST["username"]}')");

    $x->execute();
    header("location: home.php");
}
