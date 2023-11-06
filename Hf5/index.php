<?php

require_once "Student.php";
require_once "Subject.php";
require_once "University.php";

$uni = new University();

$uni->addSubject("101", "Adatbázis");
$uni->addSubject("102", "Webtech");
$uni->addSubject("103", "Java");
$uni->addSubject("104", "Android");
$uni->addSubject("105","Php");

$stud1 = new Student("Nagy Elemér", "201");
$stud2 = new Student("Kovács István", "202");
$stud3 = new Student("Kis Béla", "203");
$stud4 = new Student("Mezei Virág", "204");

$uni->addStudentOnSubject("101",$stud1);
$uni->addStudentOnSubject("101",$stud3);
$uni->addStudentOnSubject("101",$stud4);
$uni->addStudentOnSubject("102",$stud2);
$uni->addStudentOnSubject("102",$stud3);
$uni->addStudentOnSubject("103",$stud1);
$uni->addStudentOnSubject("103",$stud2);
$uni->addStudentOnSubject("104",$stud3);
$uni->addStudentOnSubject("105",$stud1);
$uni->addStudentOnSubject("105",$stud2);
$uni->addStudentOnSubject("105",$stud3);
$uni->addStudentOnSubject("105",$stud4);


$uni->subjects[2]->deleteStudent($stud2);
$uni->subjects[3]->deleteStudent($stud3);

$uni->deleteSubject($uni->subjects[3]);
$uni->deleteSubject($uni->subjects[4]);

$uni-> print();


$stud1->setGrade("101", 10);
$stud1->setGrade("103", 9);
$stud1->setGrade("105", 10);

$stud2->setGrade("102", 8);
$stud2->setGrade("103", 7);
$stud2->setGrade("105", 6);

$stud3->setGrade("101", 9);
$stud3->setGrade("102", 10);
$stud3->setGrade("105",8);

echo"Hallgató átlaga: " . $stud1->getAvgGrade() . "<br>";

$stud1->printGrades();
