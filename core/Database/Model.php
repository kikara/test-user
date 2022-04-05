<?php

namespace App\Core\Database;

use App\Core\Database\DatabaseConnection\DatabaseConnection;

class Model
{
    protected string $tablePath = '';
    protected string $tableName = '';
    protected DatabaseConnection $transformer;
    protected array $data = [];

    public function __construct()
    {
        $this->transformer = new DatabaseConnection($this->tableName, $this->tablePath);
    }

    public function getAll(): array
    {
        return $this->transformer->getAllRecords();
    }

    public function getById(int $id): array
    {
        return $this->transformer->getById($id);
    }

    public function putRow()
    {
        $this->transformer($this->data);
    }
}