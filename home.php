<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="feedstyle.css">
    <title>Tweet Feed | Bluebird</title>
</head>

<body>

    <h1>Bluebird feed</h1>
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
$x = $conn->prepare("SELECT * FROM tweets");

$x->execute();
$data = $x->fetchAll(PDO::FETCH_ASSOC);

foreach ($data as $tweet) {
    echo "<p>" . $tweet["user"] . "</p>";
    echo "<p>" . $tweet["content"] . "</p>";
    echo "<form method='POST' action='likes.php'> <input hidden name='id' value='" . $tweet["id"] . "'></form>";
    echo "<br>";
}
