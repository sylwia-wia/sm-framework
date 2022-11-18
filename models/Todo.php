<?php

namespace sm\models;

use PDO;
use sm\Database;
use sm\Model;

/**
 * @property int $id
 * @property string $name
 */
class Todo extends Model
{
    /**
     * @return Todo[]
     */
    static public function getAll(): array
    {
        $pdo = Database::getPdo();

        $sql = 'SELECT * FROM todo';
        $statement = $pdo->query($sql);
        return $statement->fetchAll(PDO::FETCH_CLASS, Todo::class);
    }

    static public function getOneByID(int $id): ?Todo
    {
        $pdo = Database::getPdo();
        $sql = 'SELECT * FROM todo WHERE id = :id';
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':id', $id);
        $stmt->setFetchMode(PDO::FETCH_CLASS, Todo::class);
        $stmt->execute();
        return $stmt->fetch();
    }


    static public function getAllByName(string $name): array
    {
        $pdo = Database::getPdo();
        $sql = 'SELECT * FROM todo WHERE name LIKE :name';
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':name', '%' . $name . '%');

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, Todo::class);
    }

    public function getTableName(): string
    {
        return 'todo';
    }

    public function getColumns(): array
    {
        return [
            'id',
            'name'
        ];
    }

    public function save(): bool
    {
        if ($this->id) {
            return $this->update();
        }

        $pdo = Database::getPdo();
        $sql = 'INSERT INTO todo (name) VALUES (:name)';
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':name', $this->name, PDO::PARAM_STR, 20);

        if ($stmt->execute() === false) {
            throw new \Exception('The error when saving model to database occurred');
        }

        $this->id = $pdo->lastInsertId();
        return true;
    }

    private function update(): bool
    {
        $sql = 'UPDATE todo SET name = :name WHERE id = :id';
        $pdo = Database::getPdo();
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':name', $this->name, PDO::PARAM_STR, 20);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);

        if ($stmt->execute() === false) {
            throw new \Exception('The error when saving model to database occurred');
        }

        return true;
    }

    public function delete(): bool
    {
        $pdo = Database::getPdo();
        $sql = 'DELETE FROM todo WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute() === false) {
            throw new \Exception('The error when deleting model to database occurred');
        }
        return true;
    }
}