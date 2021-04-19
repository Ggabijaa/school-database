<?php


namespace App\Model;


class Attend extends Base implements ModelInterface
{
    public const DB_NAME = 'attend';

    public function getTableName(): string
    {
        return self::DB_NAME;
    }

    public function getById(int $id, string $table = self::DB_NAME): string
    {
        return "SELECT * FROM " . self::DB_NAME . " WHERE activity_id=" . $id;
    }

    public function update($id, $parameters, $table = self::DB_NAME) : string
    {
        //dd($parameters);
        $cols = array();

        foreach ($parameters as $key => $val) {
            if ($val != null) {
                $cols[] = "$key = '{$val}'";
            } else {
                $cols[] = "$key = null";
            }
        }
        return "UPDATE $table SET " . implode(', ', $cols) . " WHERE activity_id = $id";

    }

    public function delete($id, $table = self::DB_NAME) : string
    {
        return "DELETE FROM attend WHERE activity_id={$id};";
    }
}