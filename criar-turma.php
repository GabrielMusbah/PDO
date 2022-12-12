<?php

use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';



$connection = ConnectionCreator::createConnection();
$studentRepository = new PdoStudentRepository($connection);

//inicia uma transação, a coisa so vai realmente pro banco, quando vc da um commit -> o rollBack() volta para a versao de quando vc iniciou a transacao

$connection->beginTransaction();

try {
    $aStudent = new Student(
        null,
        'Nico Steppat',
        new DateTimeimmutable('1985-05-01')
    );

    $studentRepository->save($aStudent);

    $anotherStudent = new Student(
        null,
        'Sergio Lopes',
        new DateTimeimmutable('1985-05-01')
    );

    $studentRepository->save($anotherStudent);

    $connection->commit();

} catch (\PDOException $e){
    echo $e->getMessage();

    $connection->rollBack();
}
