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

    public function getreport($e_f, $e_t, $bd_f, $bd_t){
        $taken_book_count_view = "CREATE VIEW taken_b_c AS SELECT user_.id as ub_id, COUNT(*) as takenCount  FROM book INNER JOIN user_ ON user_.id = book.user_id GROUP BY user_.id";
        $taken_book_count_view = "CREATE VIEW attend_c_c AS SELECT pupil.id as p_id, COUNT(*) as attendCount  FROM pupil INNER JOIN attend ON pupil.id = attend.pupil_id GROUP BY pupil.id";
      return "SELECT CONCAT(user_.name, ' ', user_.surname) as pupilName , YEAR(enrolled_at) as enrolled_at, birth_date, CONCAT(pupil_representative.name, ' ', pupil_representative.surname) as representative,
              IFNULL(takenCount, 0) as takenCount, IFNULL(attendCount, 0) as attendedCount
            FROM pupil 
            INNER JOIN user_ ON pupil.user_id = user_.id
            INNER JOIN pupil_representative ON pupil.pupil_representative_id = pupil_representative.id
            LEFT JOIN attend_c_c ON pupil.id = attend_c_c.p_id
            LEFT JOIN taken_b_c ON pupil.user_id = ub_id
            WHERE YEAR(enrolled_at) BETWEEN $e_f AND $e_t AND
         YEAR(birth_date) BETWEEN $bd_f AND $bd_t
            ORDER BY
                pupil.enrolled_at ASC,
                pupilName ASC";

    }
//SELECT * FROM pupil INNER JOIN user_ ON pupil.user_id = user_.id WHERE enrolled_at BETWEEN '2017-02-01' AND '2020-02-01'
}
