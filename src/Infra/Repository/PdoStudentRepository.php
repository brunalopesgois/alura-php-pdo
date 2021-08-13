<?php

namespace Alura\Pdo\Infra\Repository;

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Domain\Repository\StudentRepository;
use DateTimeInterface;
use PDO;

class PdoStudentRepository implements StudentRepository
{
    private PDO $connection;
    
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }
    
    public function allStudents(): array
    {
        $preparedStatement = $this->connection->query('SELECT * FROM students;');
        $studentDataList = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);

        return $this->mapStudents($studentDataList);
    }

    public function studentsBirthAt(DateTimeInterface $birthDate): array
    {
        $preparedStatement = $this->connection->query('
            SELECT * FROM students WHERE birth_date = ?;
        ');
        $preparedStatement->bindValue(1, $birthDate);
        $studentDataList = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);

        return $this->mapStudents($studentDataList);
    }

    public function save(Student $student): bool
    {
        $sqlInsert = "
            INSERT INTO students (name, birth_date) VALUES (:name, :birth_date);
        ";
        $preparedStatement = $this->connection->prepare($sqlInsert);
        $preparedStatement->bindValue(':name', $student->name());
        $preparedStatement->bindValue(':birth_date', $student->birthDate()->format('Y-m-d'));

        return $preparedStatement->execute();
    }

    public function remove(Student $student): bool
    {
        $preparedStatament = $this->connection->prepare('DELETE FROM students where id = ?');
        $preparedStatament->bindValue(1, $student->id(), PDO::PARAM_INT);

        return $preparedStatament->execute();
    }

    private function mapStudents($studentDataList): array
    {
        $studentList = [];

        foreach ($studentDataList as $studentData) {
            $studentList[] = new Student(
                $studentData['id'],
                $studentData['name'],
                new \DateTimeImmutable($studentData['birth_date'])
            );
        }

        return $studentList;
    }
}
