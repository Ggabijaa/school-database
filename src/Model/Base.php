<?php

namespace App\Model;

class Base
{
    public function getAll(string $table): string
    {
        return "SELECT * FROM " . $table;
    }

    public function getById(int $id, string $table): string
    {
        return "SELECT * FROM " . $table . " WHERE id=" . $id;
    }

    public function insert($parameters, $table): string
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
        return "INSERT INTO $table (" . implode(', ', $cols) . ") VALUES (" . implode(', ', $vals) . ")";
    }

    public function delete($id, $table): string
    {
        return sprintf(
            'DELETE FROM %s WHERE id = %s', $table, $id
        );
    }

    public function update($id, $parameters, $table): string
    {
        $cols = array();

        foreach ($parameters as $key => $val) {
            if ($val != null) {
                $cols[] = "$key = '{$val}'";
            } else {
                $cols[] = "$key = null";
            }
        }
        return "UPDATE $table SET " . implode(', ', $cols) . " WHERE id = $id";

    }

    public function countAll($table, $where = null): string
    {
        $cols = array();

        if ($where != null) {
            foreach ($where as $key => $val) {
                $cols[] = "$key = '$val'";
            }
            return "SELECT COUNT(*) as cnt FROM " . $table . " WHERE " . implode('AND ', $cols);
        }
        return "SELECT COUNT(*) as cnt FROM " . $table;
    }

}
