<?php

namespace App;

use Dcblogdev\PdoWrapper\Database;

trait DB
{
    public static function GetDB() : Database {
        $options = [
            'username' => 'root',
            'database' => 'school',
            'password' => 'password',
            'type' => 'mysql',
            'charset' => 'utf8',
            'host' => 'localhost',
            'port' => '3306'
        ];

        return new Database($options);
    }
}

