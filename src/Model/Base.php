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

    public function getreport($e_f, $e_t, $bd_f, $bd_t, $cf, $ct){
      return "select 
            pupil.id as pupilID,
            UCASE(CONCAT(user_.name, ' ', user_.surname)) as pupilName, 
            YEAR(enrolled_at) as enrolled_at, MONTH(enrolled_at) as eMonth,
            birth_date,
            CONCAT(pupil_representative.name, ' ', pupil_representative.surname) as representative,
            count(book.id) as takenCount,
            count(attend.activity_id) as attendedCount
            from pupil 
            inner join user_ on pupil.user_id = user_.id
            inner join pupil_representative on pupil.pupil_representative_id = pupil_representative.id
            left join book on pupil.user_id = book.user_id 
            left join attend on pupil.id = attend.pupil_id 
            WHERE YEAR(enrolled_at)
                BETWEEN $e_f AND $e_t 
                AND
            YEAR(birth_date) 
            BETWEEN $bd_f AND $bd_t
                AND
            YEAR(created_at) 
            BETWEEN $cf AND $ct
             group by pupil.user_id
            ORDER BY
                pupil.enrolled_at ASC,
                pupilName ASC;
";
    }

    public function pupilCount($e_f, $e_t, $bd_f, $bd_t, $cf, $ct){
      return "select 
                    count(*) as  pupilsCount, 
                    YEAR(enrolled_at) as enrolled_Y
                    from pupil 
                    inner join user_ on pupil.user_id = user_.id
                    WHERE YEAR(enrolled_at) 
                    BETWEEN $e_f AND $e_t 
                    AND
                    YEAR(birth_date) 
                    BETWEEN $bd_f AND $bd_t
                    AND
                    YEAR(created_at) 
                    BETWEEN $cf AND $ct
                    group by YEAR(enrolled_at);";
    }
    public function takenBookCount($e_f, $e_t, $bd_f, $bd_t, $cf, $ct){
      return "select count(book.id) as  bookCount, 
                    YEAR(enrolled_at) as enrolled_Y
                    from pupil 
                    inner join user_ on pupil.user_id = user_.id
                    left join book on pupil.user_id = book.user_id 
                    WHERE YEAR(enrolled_at)
                    BETWEEN $e_f AND $e_t 
                    AND
                    YEAR(birth_date) 
                    BETWEEN $bd_f AND $bd_t
                    AND
                    YEAR(created_at) 
                    BETWEEN $cf AND $ct
                    group by YEAR(enrolled_at)
                    ;";
    }

    public function allPupils($e_f, $e_t, $bd_f, $bd_t, $cf, $ct){
      return "select count(*) as  pupCount
                    from pupil 
                    inner join user_ on pupil.user_id = user_.id
                    WHERE YEAR(enrolled_at)
                    BETWEEN $e_f AND $e_t 
                    AND
                    YEAR(birth_date) 
                    BETWEEN $bd_f AND $bd_t
                    AND
                    YEAR(created_at) 
                    BETWEEN $cf AND $ct
                    ;";
    }

    // pupils ir ju knygos===
    // select pupil.id as pupil, count(book.id) bookCount from pupil left join book on pupil.user_id = book.user_id group by pupil.id
}
