<?php

namespace App\Models;

use App\Core\Database\Model;

class User extends Model
{
    /**
     * Столбцы моделя
     * @var array|string[]
     */
    public array $data = [
        'name',
        'surname',
        'age',
        'login',
        'password',
    ];

    public function __construct()
    {
        $this->tablePath = $_SERVER['DOCUMENT_ROOT'] . '/database/db.php';
        $this->tableName = 'table_Users';
        parent::__construct();
    }

    /**
     *  Создать нового пользователя
     * @param $data
     * @return int
     */
    public function create($data): int
    {
        $res = [];
        foreach ($this->data as $col) {
            $res[$col] = $data[$col];
        }
        $res['password'] = password_hash($res['password'], PASSWORD_DEFAULT);

        return $this->transformer->putRow($res);
    }

    /**
     * Валдиация данных по текущему моделю (Тут также требуется валидация по типу значения(string, int))
     * @param array $data
     * @return bool
     */
    public function validate(array $data): bool
    {
        foreach ($this->data as $col) {
            if (! in_array($col, array_keys($data))) {
                return false;
            } elseif (empty($data[$col])) {
                return false;
            }
        }
        return true;
    }
}