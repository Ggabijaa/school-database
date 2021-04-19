<?php


namespace App\Model;


class Activity extends Base implements ModelInterface
{
    public const DB_NAME = 'activity';

    public function getTableName(): string
    {
        return self::DB_NAME;
    }

    public function insertM($parameters, $table, $number): string
    {
        $cols = array();

        foreach ($parameters as $key => $val) {
            $cols[] = "$key";
            if ($val != null) {
                $vals[] = "'{$val}'";
            } else {
                $vals[] = "";
            }
        }



        $query = "INSERT INTO $table (" . implode(', ', $cols) . ") VALUES (" . implode(', ', $vals) . ")";


        return $query;
    }
}