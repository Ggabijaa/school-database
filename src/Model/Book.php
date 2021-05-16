<?php


namespace App\Model;


class Book extends Base implements ModelInterface
{
    public const DB_NAME = 'book';

    public function getTableName(): string
    {
        return self::DB_NAME;
    }

    public function getUserBooks(int $userId, string $table = self::DB_NAME): string {
        return "SELECT *
                FROM book  
                WHERE user_id = $userId";
    }



    public function insert($parameters, $table): string
    {
        $values = [];
        $str = "";

        $fields = [
            'name',
            'genre',
            'release_year',
            'author',
            'age_group',
            'user_id'
        ];

        $rowsCount = count($parameters['name']);
        $colCount = count($fields);

        for ($cnt = 0; $cnt < $rowsCount; $cnt++) {
            foreach ($fields as $key => $field) {
                if ($colCount - 1 !== $key) {
                    if ($parameters[$field][$cnt] != "")
                        $values[$cnt][] = '"' . $parameters[$field][$cnt] . '"' . ', ';
                    else {
                        $values[$cnt][] = 'null' . ', ';
                    }
                    continue;
                }
                if ($parameters[$field][$cnt] != "")
                    $values[$cnt][] = $parameters[$field][$cnt];
                else {
                    $values[$cnt][] = 'null';
                }
            }
        }

        for ($cnt = 0; $cnt < sizeof($values); $cnt++) {
            $str .= '(' . implode("", $values[$cnt]) . ')';
            if ($cnt < sizeof($values) - 1) {
                $str .= ',';
            }
        }

        return "INSERT INTO " . self::DB_NAME . " (" . implode(', ', $fields) . ") VALUES $str";
    }
}