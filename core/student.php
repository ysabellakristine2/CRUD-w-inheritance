<?php
require_once "Database.php"; 

// Student inherits methods from parent class for easier coding
class Student extends Database {

    // method to add student
    public function addStudent(string $name, string $email): bool {
        return $this->create("students", ["name" => $name, "email" => $email]);
    }

    // method to get list of students
    public function getStudents(): array {
        return $this->read("students");
    }

    // method to update students
    public function updateStudent(int $id, array $data): bool {
        return $this->update("students", $data, "id = $id");
    }

    // method to delete student from list
    public function deleteStudent(int $id): bool {
        return $this->delete("students", "id = $id");
    }
}
?>