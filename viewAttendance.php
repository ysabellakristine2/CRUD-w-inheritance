<?php
require_once 'core/database.php'; 
require_once 'core/attendance.php';

// creates instance of the object
$attendance = new Attendance();

//fetch records from subclass
$records = $attendance->getAttendance();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Attendance</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-3xl">
    <h1 class="text-2xl font-bold text-center text-blue-600 mb-6">Student Attendance Records</h1>

    <!-- at this point I have war flashbacks tbh -->
    <?php if (!empty($records)): ?>
        <div class="overflow-x-auto">
            <table class="table-auto border-collapse border border-gray-300 w-full text-sm">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2">ID</th>
                        <th class="border border-gray-300 px-4 py-2">Student ID</th>
                        <th class="border border-gray-300 px-4 py-2">Date</th>
                        <th class="border border-gray-300 px-4 py-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($records as $row): ?>
                        <tr class="hover:bg-gray-100">
                            <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($row['id']) ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($row['student_id']) ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($row['date']) ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($row['status']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p class="text-center text-gray-600">No attendance records found.</p>
    <?php endif; ?>

    <div class="mt-6 text-center">
        <a href="index.php" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
            ⬅ Back to Home
        </a>
    </div>
</div>

</body>
</html>
