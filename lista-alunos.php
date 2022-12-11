<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$caminhoBanco = __DIR__ . '/banco.sqlite';

$pdo = new PDO('sqlite:' . $caminhoBanco);

$studentDataList = $statement = $pdo->query('SELECT * FROM students;');

$studentList = [];

foreach ($studentDataList as $studentData){
    $studentList[] = new Student($studentData['id'], $studentData['name'], new \DateTimeImmutable($studentData['birth_date']));
}

var_dump($studentList);