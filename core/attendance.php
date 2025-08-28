<?php
require_once "Database.php"; // calling masterclass like Gordon Ramsey in Hell's Kitchen

/* attendance class uses database as its parent
ngl sir, this is how I learned how to do inheritance correctly*/
class Attendance extends Database {
    public function markAttendance(int $studentId, string $date, string $status): bool {
        return $this->create("attendance", [
            "student_id" => $studentId,
            "date" => $date,
            "status" => $status
        ]);
    }

    // gets attendance by reading set in database.php
    public function getAttendance(): array {
        return $this->read("attendance");
    }

    // updates attendance easily using inheritance
    public function updateAttendance(int $id, array $data): bool {
        return $this->update("attendance", $data, "id = $id");
    }

    // deletes attendance
    public function deleteAttendance(int $id): bool {
        return $this->delete("attendance", "id = $id");
    }
}
?>