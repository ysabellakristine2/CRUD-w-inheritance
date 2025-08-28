<?php
    require_once 'core/database.php'; 
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
        <h1 class="text-2xl font-bold text-center text-blue-600 mb-6"> Sample of a Student Attendance System with the Ability to do CRUD with Students as well</h1>

        <div class="space-y-4">
            <a href="studentForm.php" class="block w-full text-center bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded"> Add Student
            </a>
            <a href="viewStudents.php" class="block w-full text-center bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-4 rounded"> View Students
            </a>
            <a href="attendanceForm.php" class="block w-full text-center bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded"> Mark Attendance
            </a>
            <a href="viewAttendance.php" class="block w-full text-center bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded"> View Attendance of Students
            </a>
        </div>
    </div>

</body>
</html>
