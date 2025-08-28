<?php
    require_once 'core/database.php'; 
    include 'core/attendance.php';
?>

<!-- I'm just winging this at this point -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sample of Inheritance Classes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <h1 class="text-2xl font-bold text-center text-blue-600 mb-6"> Attendance Form </h1>

        <form method="POST" action="core/attendance.php">
            <input type="number" name="student_id" placeholder="Student ID" required>
            <input type="date" name="date" required>
            <select name="status" required class="border rounded px-2 py-1 w-full">
                <option value="Present">Present</option>
                <option value="Absent">Absent</option>
                <option value="Late">Late</option>
            </select>
            <input type="submit" value="Record Attendance">
        </form>

    </div>

</body>
</html>
