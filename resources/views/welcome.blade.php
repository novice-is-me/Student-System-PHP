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
    <section class="flex flex-col items-center w-[100%] gap-y-8">
        <div class="flex flex-col items-center gap-y-8">
            <img src="{{asset('assets/users.png')}}" alt="" class="w-[50%]">
            <h1 class=" text-4xl font-[Roboto] font-bold">STUDENT REGISTRATION SYSTEM</h1>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
            <div class="flex flex-col gap-y-4">
                <button class=" bg-[#65558F] text-white py-4 px-8 rounded-xl" 
                    name="login">Login</button>
                <button class=" bg-[#65558F] text-white py-4 px-8 rounded-xl" 
                    name="register" >Sign Up</button>
            </div>
        </form>
    </section>
</body>
</html>

<?php 
    if(isset($_POST['login'])){
        header("Location: ./login.php"); 
    }
    
    if(isset($_POST['register'])){
        header("Location: ./register.php");
    }
?>