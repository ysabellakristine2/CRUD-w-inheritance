<?php
    require_once 'core files/database.php'; 
    include 'core files/student.php';
?>

<!-- Hopefully this works -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sample of Inheritance Classes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <h1 class="text-2xl font-bold text-center text-blue-600 mb-6"> Add Students</h1>

        <div class="space-y-4">
            <h2>Student Form</h2>
                <form method="POST" action="student_action.php">
                    <input type="text" name="name" placeholder="Student Name" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="submit" value="Add Student">
                </form>
        </div>
    </div>

</body>
</html>
