<?php 
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "student-system";
    $conn = ''; 

    try{
        $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
        echo "Connected to the database" . "<br>";
    }catch(mysqli_sql_exception){
        echo "Failed to connect to the database";
    }
?>  