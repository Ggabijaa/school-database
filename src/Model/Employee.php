<?php


namespace App\Model;


class Employee extends Base implements ModelInterface
{
    public const DB_NAME = 'employee';

    public function getTableName(): string
    {
        return self::DB_NAME;
    }

    public function getAll(string $table = self::DB_NAME): string {
        return "SELECT * FROM ". $table . " INNER JOIN user_ u ON u.id = employee.user_id";
    }

    public function getUnused(string $table = self::DB_NAME): string {
        return "SELECT *, user_.id as id FROM user_ LEFT OUTER JOIN employee ON user_.id = employee.user_id WHERE user_.account_type = 'employee' AND employee.user_id IS NULL";
    }
}