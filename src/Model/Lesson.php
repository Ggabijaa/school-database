<?php


namespace App\Model;


class Lesson extends Base implements ModelInterface
{
    public const DB_NAME = 'lesson';

    public function getTableName(): string
    {
        return self::DB_NAME;
    }

}