<?php

use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;

use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$connection = ConnectionCreator::createConnection();
$repository = new PdoStudentRepository($connection);

$studentList = $repository->studentsWithPhones();


echo $studentList[1]->phones()[1]->formattedPhone();