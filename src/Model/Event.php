<?php


namespace App\Model;


class Event extends Base implements ModelInterface
{
    public const DB_NAME = 'event_';

    public function getTableName(): string
    {
        return self::DB_NAME;
    }

}