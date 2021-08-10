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
