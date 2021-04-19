<?php


namespace App\Model;


class Place extends Base implements ModelInterface
{
    public const DB_NAME = 'placeclassroom';

    public function getTableName(): string
    {
        return self::DB_NAME;
    }

}