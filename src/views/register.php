<?php 
    include('../../config/database.php');
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../public/css/input.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head> 
<body>
    <section class="p-5 register">
        <h1 class="text-center text-5xl uppercase font-semibold mt-4">Register Student</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" >
            <div class="border flex justify-evenly my-5">
                <div class="flex flex-col gap-4">
                    <div class="flex flex-col">
                        <label for="firstName" class="text-2xl font-semibold">First Name:</label>
                        <input type="text" name="firstName" class="bg-[#CDCDCD] h-[50px]">
                    </div>
                    <div class="flex flex-col">
                        <label for="lastName" class="text-2xl font-semibold">Last Name:</label>
                        <input type="text" name="lastName" class="bg-[#CDCDCD] h-[50px]">
                    </div>
                    <div class="flex flex-col">
                        <label for="age" class="text-2xl font-semibold">Age:</label>
                        <input type="number" name="age" class="bg-[#CDCDCD] h-[50px]">
                    </div>
                </div>
                <div class="flex flex-col gap-4">
                    <div class="flex flex-col">
                        <label for="section" class="text-2xl font-semibold">Email:</label>
                        <input type="text" name="email" class="bg-[#CDCDCD] h-[50px]">
                    </div> 
                    <div class="flex flex-col">
                        <label for="address" class="text-2xl font-semibold">Address:</label>
                        <input type="text" name="address" class="bg-[#CDCDCD] h-[50px]">
                    </div>
                    <div class="flex flex-col">
                        <label for="year" class="text-2xl font-semibold">Password:</label>
                        <input type="password" name="password" class="bg-[#CDCDCD] h-[50px]">
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <input type="submit" name="submit" value="Submit" 
                    class="bg-blue-300 rounded-3xl py-5 px-8">
            </div>
        </form>
    </section>
</body>
</html>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_SPECIAL_CHARS);
        $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_SPECIAL_CHARS);
        $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
        
        if (isset($_POST['submit'])) {
            if($firstName && $lastName && $age && $address && $email && $password) {

                    $hash = password_hash($password, PASSWORD_DEFAULT); 
                    // Inserting data into the database

                    $sql = "INSERT INTO students (firstName, lastName, age, email, address, password) 
                            VALUES ('$firstName', '$lastName', '$age', '$email', '$address', '$hash')";
                    echo "Student registered successfully";
  
                    try{
                        mysqli_query($conn, $sql);
                        echo "User is now registered"; 
                    }catch(mysqli_sql_exception){
                        echo "Failed to register user";
                    }

                    header('Location: login.php'); 
            }else{
                
                echo "Please fill out all fields";
            }
        }
    }
?>