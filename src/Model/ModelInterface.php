<?php

namespace App\Model;

interface ModelInterface
{
    public function getTableName(): string;

    public function getAll(string $table): string;

    public function getById(int $id, string $table): string;

    public function insert($parameters, $table): string;

    public function delete($id, $table): string;

    public function update($id, $parameters, $table): string;

    public function countAll($table, $where = null): string;
}