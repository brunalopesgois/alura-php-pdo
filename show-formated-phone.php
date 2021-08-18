<?php

use Alura\Pdo\Domain\Model\Phone;
use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$student = new Student(1, 'João Silva', new \DateTimeImmutable('1999-08-08'));
$phone = new Phone(1, '11', '40028922');
$student->addPhone($phone);

echo $phone->formattedPhone();
