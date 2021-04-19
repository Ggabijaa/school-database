<?php


namespace App\Model;


class Class_ extends Base implements ModelInterface
{
    public const DB_NAME = 'class';

    public function getTableName(): string
    {
        return self::DB_NAME;
    }


}