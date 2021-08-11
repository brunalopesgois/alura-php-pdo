<?php

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

$preparedStatament = $pdo->prepare('DELETE FROM students where id = ?');
$preparedStatament->bindValue(1, 3, PDO::PARAM_INT);

var_dump($preparedStatament->execute());
