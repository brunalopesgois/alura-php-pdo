<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infra\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';

$pdo = ConnectionCreator::createConnection();

$student = new Student(null, 'Clotilde dos Santos', new \DateTimeImmutable('1988-08-08'));

$sqlInsert = "
    INSERT INTO students (name, birth_date) VALUES (:name, :birth_date);
";
$statament = $pdo->prepare($sqlInsert);
$statament->bindValue(':name', $student->name());
$statament->bindValue(':birth_date', $student->birthDate()->format('Y-m-d'));

try {
    if ($statament->execute()) {
        echo "aluno incluído";
    }
} catch (\Exception $e) {
    echo $e->getMessage();
}
