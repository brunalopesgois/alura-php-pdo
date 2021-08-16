<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infra\Factories\StudentFactory;
use Alura\Pdo\Infra\Persistence\ConnectionCreator;
use Alura\Pdo\Infra\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$connection = ConnectionCreator::createConnection();
$studentRepository = new PdoStudentRepository($connection);

// realizo processos de definição da turma

$connection->beginTransaction();
for ($i=0; $i < 5; $i++) {
    $studentRepository->save(StudentFactory::create());
}
$connection->commit();

var_dump($studentRepository->allStudents());
