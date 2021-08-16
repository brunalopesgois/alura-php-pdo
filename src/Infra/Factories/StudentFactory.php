<?php

namespace Alura\Pdo\Infra\Factories;

use Alura\Pdo\Domain\Model\Student;
use DateTime;

class StudentFactory
{
    public static function create(): Student
    {
        $nameSeed = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $shuffledName = str_shuffle($nameSeed);
        $name = substr($shuffledName, 0, 8) . " " . substr($shuffledName, 7, 8);

        $start = new DateTime('1990-01-01');
        $end = new DateTime('2010-12-31');
        $randomTimestamp = mt_rand($start->getTimestamp(), $end->getTimestamp());
        $birthDate = new DateTime();
        $birthDate->setTimestamp($randomTimestamp);
        
        return new Student(
            null,
            $name,
            $birthDate
        );
    }
}
