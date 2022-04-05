<?php

namespace App\Core\Database\DatabaseConnection;

use App\Core\Database\Model;
use Exception;

class DatabaseConnection
{
    private array $table = [];
    private string $tablePath;
    private string $tableName;

    /**
     * @throws Exception
     */
    public function __construct($tableName, $tablePath)
    {
        $this->tablePath = $tablePath;
        $this->tableName = $tableName;
        include $tablePath;
        eval('$this->table = $' . $tableName . ';');
        if (is_null($this->table)) {
            throw new Exception('Не найдена таблица в БД');
        }
    }

    public function getAllRecords(): array
    {
        return $this->table;
    }

    public function getById(int $id): array
    {
        return $this->table[$id] ?? [];
    }

    public function putRow(array $row)
    {
        $this->table[] = $row;
        file_put_contents(
            $this->tablePath,
            '<?php $' . $this->tableName . ' = ' . var_export($this->table, true) . ';'
        );
        return array_key_last($this->table);
    }
}