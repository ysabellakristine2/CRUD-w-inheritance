<?php
require_once 'core/database.php';
require_once 'core/student.php';

$student = new Student("student_db");

// at this point, i'm winging this
if (!isset($_GET['id'])) {
    die("Student ID is required.");
}

$id = (int)$_GET['id'];

if ($student->deleteStudent($id)) {
    header("Location: viewStudents.php");
    exit;
} else {
    die("Failed to delete student.");
}
