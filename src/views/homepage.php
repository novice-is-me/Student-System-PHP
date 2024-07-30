<?php 
    session_start();
    include('../../config/database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section>
        <h1>Homepage</h1> 
    </section>
</body>
</html>

<?php
    echo $_SESSION['email'] . "<br>";
    echo $_SESSION['password'] . "<br>";

    if($_SESSION['email'] && $_SESSION['password']){
        echo "Hello there user!";
     } 

?>