<?php

use Alura\Pdo\Infra\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';

$pdo = ConnectionCreator::createConnection();

$preparedStatament = $pdo->prepare('DELETE FROM students where id = ?');
$preparedStatament->bindValue(1, 3, PDO::PARAM_INT);

var_dump($preparedStatament->execute());
