<?php

use Alura\Pdo\Infra\Persistence\ConnectionCreator;
use Alura\Pdo\Infra\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$pdo = ConnectionCreator::createConnection();
$studentRepository = new PdoStudentRepository($pdo);
$studentList = $studentRepository->studentsWithPhones();

var_dump($studentList);
