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
        return "SELECT pupil.id as id, enrolled_at, user_id, class_id,
                pupil_representative_id, name, surname, birth_date, account_type, created_at, sex
                FROM pupil  
                INNER JOIN user_ u ON u.id = pupil.user_id;";
    }

    public function getPupilById(int $id, string $table): string
    {
        return "SELECT pupil.id as id, enrolled_at, user_id, class_id,
                pupil_representative_id, name, surname, birth_date, account_type, created_at, sex
                FROM pupil  
                INNER JOIN user_ u ON u.id = pupil.user_id
                WHERE pupil.id = $id";
    }


    public function getUnused(string $table = self::DB_NAME): string {
        return "SELECT *, user_.id as id FROM user_ LEFT OUTER JOIN pupil ON user_.id = pupil.user_id WHERE user_.account_type = 'pupil' AND pupil.user_id IS NULL";
    }


//    public function updatePupilBook($id, $parameters, string $table = self::DB_NAME): string {
//            $book = new Book();
//            $book->insert($parameters);
//            $this->updatePupil($id, $parameters);
//
//    }

//    function updatePupil($id, $parameters, $table = self::DB_NAME) : string
//    {
//
//        return "UPDATE pupil SET
//                enrolled_at =" .$parameters['enrolled_at'] .
//            ", user_id = ". $parameters['user_id'] .
//            ", class_id = " $parameters['class_id'] .
//            "  WHERE id = $id";
//
//    }




    public function delete($id, $table = self::DB_NAME) : string
    {
        return "DELETE FROM attend WHERE pupil_id={$id};
                DELETE FROM organize WHERE employee_id={$id};
                DELETE FROM pupil WHERE user_id={$id};
                DELETE FROM employee WHERE user_id={$id};
                DELETE FROM $table WHERE id={$id};";
    }
}