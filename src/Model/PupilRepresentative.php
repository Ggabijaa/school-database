<?php


namespace App\Model;


class PupilRepresentative extends Base implements ModelInterface
{
    public const DB_NAME = 'pupil_representative';

    public function getTableName(): string
    {
        return self::DB_NAME;
    }

}