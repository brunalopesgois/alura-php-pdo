<?php

$databasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

echo 'conectei';

// try {
//     $pdo->exec('CREATE TABLE students (id INTEGER PRIMARY KEY, name TEXT, birth_date TEXT);');
//     echo 'tabela criada';
// } catch (\Exception $e) {
//     echo $e->getMessage();
// }

try {
    $pdo->exec(
        'CREATE TABLE phones (
            id INTEGER PRIMARY KEY,
            area_code TEXT,
            number TEXT,
            student_id INTEGER,
            FOREIGN KEY(student_id) REFERENCES students(id)
        );'
    );
    echo 'tabela criada';
} catch (\Exception $e) {
    echo $e->getMessage();
}
