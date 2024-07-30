<?php 
    include('../../config/database.php');
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT REGISTRATION SYSTEM</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head> 
<body>
    <section class="flex gap-y-8 h-full items-center">
       <div class="w-[50%]">
            <img src="../../assets/login.png" alt="">
       </div>
       <div class="text-center w-[50%] flex flex-col">
            <h3 class=" text-5xl uppercase font-semibold mb-4">Login</h3>
            <form class="flex flex-col justify-center items-center text-start gap-y-4 "
             method="post">
                <div class=" w-full text-center">
                    <label for="email" class="text-2xl font-semibold">Email:</label><br>
                    <input type="email" name="email" placeholder="Email" 
                        class=" bg-[#CDCDCD] h-[50px] w-[50%]">
                </div>
                <div class=" w-full text-center">
                    <label for="password" class="text-2xl font-semibold">Password:</label><br>
                    <input type="text" name="password"  placeholder="Password" 
                        class=" bg-[#CDCDCD] h-[50px] w-[50%]">
                </div>
                <button class="bg-[#65558F] text-white py-4 px-8 rounded-xl">Login</button>
            </form>
       </div>
    </section>
</body>
</html>

<?php 

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

        if($email && $password){

            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
 
            $sql = "SELECT * FROM students WHERE email = '$email' AND password = '$password'";
            $result = mysqli_query($conn, $sql); 
            
            if ($email && $password) {
                // Retrieve the stored hash from the database
                $sql = "SELECT password FROM students WHERE email = '$email'";
                $result = mysqli_query($conn, $sql);
        
                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_assoc($result);
                    $stored_hash = $row['password'];
        
                    // Verify the password
                    if (password_verify($password, $stored_hash)) {
                        $_SESSION['email'] = $email; 
                        echo "Login Successfully";
                        header('Location: ./homepage.php');
                        exit;
                    } else {
                        echo "Invalid email or password.";
                    }
                } else {
                    echo "Invalid email or password.";
                }
            } else {
                echo "Please fill out all fields.";
            }
            // echo "Login Successfully";
            // header('Location: ./homepage.php');  
        }
    } 
?>