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

    /**
     * Получить все записи
     * @return array
     */
    public function getAll(): array
    {
        return $this->transformer->getAllRecords();
    }

    /**
     * Получить по идентификатору
     * @param int $id
     * @return array
     */
    public function getById(int $id): array
    {
        return $this->transformer->getById($id);
    }

    /**
     * Внести запись, на текущем уровне нет валидации требуется проводить валидацию на уровне реализации конкретной модели
     */
    public function putRow()
    {
        $this->transformer($this->data);
    }
}