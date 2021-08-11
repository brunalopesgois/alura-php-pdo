<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

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
