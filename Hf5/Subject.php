<?php
class Subject
{
    public string  $code;
    public string $name;
    public array $students = [] ;

    // TODO Generate getters and setters
    // TODO Generate constructor for all attributes. $students argument of the constructor can be empty

    public function __construct(string $code,string $name, array $students=[]){
        $this->code=$code;
        $this->name=$name;
        $this->students=$students;
    }

    //ToDo
    /**
     * Method accepts student name and number, creates instance of the Student class, adds inside $students array
     * and returns created instance
     *
     * @param string $name
     * @param string $studentNumber
     * @return \Student
     */

    public function getCode():String 
    {
        return $this->code;
    }

    public function setCode($code):void
    {
        $this->code=$code;
    }

    public function getName():String
    {
        return $this->name;
    }

    public function setName($name):void
    {
        $this->name=$name;
    }
    public function getStudents(): array
    {
        return $this->students;
    }

    public function setStudent($students){
        $this->students = $students;
    }

    public function addStudent(string $name, string $studentNumber): Student {
        if (!$this->isStudentExists($studentNumber)) {
            $newStudent = new Student($name, $studentNumber);
            $this->students[] = $newStudent;
            return $newStudent; 
        } else {
            throw new Exception("Student $name already exists!");
        }
    }

    // ToDo
    public function isStudentExists(string $studentNumber): bool
    {foreach ($this->students as $student)
        {
            if($student->getStudentNumber()==$studentNumber)
            {
                return true;
            }
        }
        return false;
    }

    public function deleteStudent(Student $student){
        $key = array_keys($this->students,$student);
        if ($key !== false) {
            unset($this->grades[$key]);
                echo "Hallgató törölve."."<br>" ;
            }
            else{
                echo "Hallgató törlése sikertelen." . "<br>";
            }
        }
}
