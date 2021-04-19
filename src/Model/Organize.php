<?php


namespace App\Model;


class Organize extends Base implements ModelInterface
{
    public const DB_NAME = 'organize';

    public function getTableName(): string
    {
        return self::DB_NAME;
    }

    public function delete($id, $table = self::DB_NAME) : string
    {
        return "DELETE FROM organize WHERE activity_id={$id};";
    }

}