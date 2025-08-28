<?php
require_once 'core/database.php';
require_once 'core/student.php';

$student = new Student("student_db");

// checks for id
if (!isset($_GET['id'])) {
    die("Student ID is required.");
}

$id = (int)$_GET['id'];

// fetches data
$students = $student->getStudents(); 
$studentData = null;
foreach ($students as $s) {
    if ($s['id'] == $id) {
        $studentData = $s;
        break;
    }
}

if (!$studentData) {
    die("Student not found.");
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    if ($student->updateStudent($id, ['name' => $name, 'email' => $email])) {
        header("Location: viewStudents.php");
        exit;
    } else {
        $error = "Failed to update student.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
    <h1 class="text-2xl font-bold text-center text-blue-600 mb-6">Edit Student</h1>

    <?php if (!empty($error)): ?>
        <p class="text-red-500 mb-4"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST" class="space-y-4">
        <input type="text" name="name" value="<?= htmlspecialchars($studentData['name']) ?>" placeholder="Name" required class="border rounded px-2 py-1 w-full">
        <input type="email" name="email" value="<?= htmlspecialchars($studentData['email']) ?>" placeholder="Email" required class="border rounded px-2 py-1 w-full">
        <input type="submit" value="Update Student" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded w-full">
    </form>

    <div class="mt-6 text-center">
        <a href="viewStudents.php" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">⬅ Back</a>
    </div>
</div>

</body>
</html>
