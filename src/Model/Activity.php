<?php


namespace App\Model;


class Activity extends Base implements ModelInterface
{
    public const DB_NAME = 'activity';

    public function getTableName(): string
    {
        return self::DB_NAME;
    }

    public function insert($parameters, $table): string
    {
        $values = [];
        $str = "";

        $fields = [
            'name',
            'starts_at',
            'participants_number',
            'seats_number'
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