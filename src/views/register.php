<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./input.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head> 
<body>
    <section class="p-5">
        <h1 class="text-center text-5xl uppercase font-semibold mt-4">Register Student</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="border flex justify-evenly my-5">
            <div class="flex flex-col gap-4">
                <div class="flex flex-col">
                    <label for="firstName" class="text-2xl font-semibold">First Name:</label>
                    <input type="text" name="firstName" class="bg-[#CDCDCD] h-[50px]">
                </div>
                <div class="flex flex-col">
                    <label for="middleInitial" class="text-2xl font-semibold">Middle Initial:</label>
                    <input type="text" name="middleInitial" class="bg-[#CDCDCD] h-[50px]">
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
                    <label for="address" class="text-2xl font-semibold">Address:</label>
                    <input type="text" name="address" class="bg-[#CDCDCD] h-[50px]">
                </div>
                <div class="flex flex-col">
                    <label for="course" class="text-2xl font-semibold">Course:</label>
                    <input type="text" name="course" class="bg-[#CDCDCD] h-[50px]">
                </div>
                <div class="flex flex-col">
                    <label for="year" class="text-2xl font-semibold">Year:</label>
                    <input type="text" name="year" class="bg-[#CDCDCD] h-[50px]">
                </div>
                <div class="flex flex-col">
                    <label for="section" class="text-2xl font-semibold">Section:</label>
                    <input type="number" name="section" class="bg-[#CDCDCD] h-[50px]">
                </div>
                <input type="submit" name="submit" value="Submit" class="bg-blue-300 rounded-3xl py-5 px-8">
            </div>
        </form>
    </section>
</body>
</html>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_SPECIAL_CHARS);
        $middleInitial = filter_input(INPUT_POST, 'middleInitial', FILTER_SANITIZE_SPECIAL_CHARS);
        $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_SPECIAL_CHARS);
        $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS);
        $course = filter_input(INPUT_POST, 'course', FILTER_SANITIZE_SPECIAL_CHARS);
        $year = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_SPECIAL_CHARS);
        $section = filter_input(INPUT_POST, 'section', FILTER_SANITIZE_NUMBER_INT);
        
        if (isset($_POST['submit'])) {
            if($firstName && $middleInitial && $lastName && $age && $address && $course 
                && $year && $course && $section) {
                    echo "Student registered successfully";
                    header('Location: home.php');
            }else{
                echo "Please fill out all fields";
            }
        }
    }
?>