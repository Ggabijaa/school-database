<?php

namespace App\Model;

class Pupil extends Base implements ModelInterface
{
    public const DB_NAME = 'pupil';

    public function getTableName(): string
    {
        return self::DB_NAME;
    }

    public function getAll(string $table = self::DB_NAME): string {
        return "SELECT * FROM ". self::DB_NAME . " INNER JOIN user_ u ON u.id = pupil.user_id";
    }

    public function delete($id, $table = self::DB_NAME) : string
    {
        return "DELETE FROM attend WHERE pupil_id={$id};
                DELETE FROM organize WHERE employee_id={$id};
                DELETE FROM pupil WHERE user_id={$id};
                DELETE FROM employee WHERE user_id={$id};
                DELETE FROM $table WHERE id={$id};";
    }
}