<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

$student = new Student(null, 'Moquidésia da Silva', new \DateTimeImmutable('1999-09-09'));

$sqlInsert = "
    INSERT INTO students (name, birth_date) VALUES ('{$student->name()}', '{$student->birthDate()->format('Y-m-d')}');
";

try {
    var_dump($pdo->exec($sqlInsert));
} catch (\Exception $e) {
    echo $e->getMessage();
}
