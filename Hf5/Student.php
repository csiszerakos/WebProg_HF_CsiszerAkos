<?php


class Student
{
    private string $name;
    private string $studentNumber;
    private array $grades;

    // TODO Generate constructor with both arguments.
    // TODO Generate getters and setters for both arguments

    //Konstruktor megírása 
    public function __construct(string $name, string $studentNumber){
        $this->name=$name;
        $this->studentNumber=$studentNumber;
        $this->grades = [];
    }

    //getter metodusok

    public function getStudentNumber(){
        return $this->studentNumber;
}
    public function getName(){
        return $this->name;
    }

    public function getGrade(){
        return $this->grades;
    }

    //setterek

    public function setStudentNumber(string $studentNumber){
        $this->studentNumber=$studentNumber;
    }
    public function setName(string $name){
        $this->name=$name;
    }

    public function setGrade( $code, $grade){
        $this->grades[$code] = $grade;
    }

    public function getAvgGrade(){
        $average = 0.0;

        if(!empty($this->grades)){
            $sum = 0;
            foreach ($this->grades as $grade) {
                $sum += $grade;
            }
            $average = $sum / count($this->grades);
        }
        return $average;
    }

    public function printGrades(){
        echo $this->name . " jegyei: <br>";
        foreach ($this->grades as $code=>$grade){
            echo $code . " - " . $grade . "<br>";
        }
    }



}