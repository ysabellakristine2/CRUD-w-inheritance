
<!-- handling logic again -->
<?php
require_once 'core/database.php';
require_once 'core/attendance.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $attendance = new Attendance();

    $studentId = (int)$_POST['student_id'];
    $date = $_POST['date'];
    $status = $_POST['status'];

    if ($attendance->markAttendance($studentId, $date, $status)) {
        echo "Attendance recorded successfully!";
    } else {
        echo "Failed to record attendance.";
    }
}
