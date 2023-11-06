<?php
require "AbstractUniversity.php";
require_once "Subject.php";

class University extends AbstractUniversity
{

    public function addSubject(string $code, string $name): Subject
    {
        if (!$this->isSubjectExists($code, $name)) {
            $subject = new Subject($code, $name);
            $this->subjects[] = $subject;
            return $subject;
        } else {
            throw new Exception("Subject exists!");
        }
    }

    public function addStudentOnSubject(string $subjectCode, Student $student)
    {
        foreach ($this->subjects as $subject) {
            if ($subject->getCode() == $subjectCode) {
                $subject->addStudent($student->getName(), $student->getStudentNumber());
            }
        }
    }

    public function isSubjectExists(string $code, string $name): bool
    {
        if (count($this->subjects) == 0) return false;
        foreach ($this->subjects as $subject) {
            if ($subject->getCode() == $code && $subject->getName() == $name) {
                return true;
            }
        }
        return false;
    }

    public function getStudentsForSubject(string $subjectCode): array
    {
        foreach ($this->subjects as $subject) {
            if ($subject->getCode() == $subjectCode) {
                return $subject->getStudents();
            }
        }
        return [];
    }

    public function getNumberOfStudents(): int
    {
        $total = 0;
        foreach ($this->subjects as $subject) {
            foreach ($subject->getStudents() as $st) {
                $total++;
            }
        }
        return $total;
    }

    public function print()
    {
        foreach ($this->subjects as $subject) {
            echo $subject->getCode() . " " . $subject->getName() . "<br>";
            foreach ($subject->getStudents() as $student) {
                echo $student->getName() . " " . $student->getStudentNumber() . "<br>";
            }
            echo "<br>";
        }
    }

    public function deleteSubject(Subject $subject)
    {
        if (!empty($subject->getStudents())) {
            $key = array_search($subject, $this->subjects);
            if ($key !== false) {
                unset($this->subjects[$key]);
                echo "A kurzus törölve" . "<br>";
            }
        }
    }
}
