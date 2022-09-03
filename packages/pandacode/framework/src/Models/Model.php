<?php

namespace Petrenko\Framework\Models;


use Petrenko\Framework\Db;

/** Class Model
 *  @ author Denys Petrenko < Des . Petrenko @ gmail . com >
 */
abstract class Model
{


    /**
     * @var Db
     */
    protected Db $pdo;
    /**
     * @var string
     */
    protected string $table;

    /**
     * @var bool
     */
    protected bool $created_at = false;
    /**
     * @var bool
     */
    protected bool $update_at = false;
    /**
     * @var bool
     */
    protected bool $closeSelection = false;


    public function __construct()
    {
        $this->pdo = Db::getInstance();
    }

    /**
     * @return array
     */
    public function findAll(): array
    {

        $sql = "SELECT  * FROM $this->table";
        if ($this->closeSelection) {
            $res = $this->pdo->query($sql);
        }
        return $this->pdo->query($sql);
    }

    /**
     * @param $column
     * @param $operator
     * @param $id
     * @return array
     */
    public function where($column, $operator, $id): array
    {
        $sql = "SELECT * FROM $this->table WHERE  $column, $operator, '$id'";

        $pdo = $this->pdo->query($sql);
        return $this->pdo->query($sql);
    }

    /**
     * @param array $array
     * @return array
     */
    public function insert(array $array): array
    {

        $array = array_map( static function ($val) {
                return htmlspecialchars($val);
            },
            $array
        );

        $arr = [
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ];
        $array = array_merge($array, $arr);

        $keysString = implode(',', array_keys($array));

        $valuesString = implode('\',\'', array_values($array));

        $sql = "INSERT INTO $this->table ($keysString) VALUES ('$valuesString')";

        return $this->pdo->query($sql);
    }

    /**
     * @param array $array
     * @return array
     */
    public function update(array $array): array
    {
        $array = array_map(function ($val) {
            return htmlspecialchars($val);
        }, $array);

        $arr = [
            'updated_at' => date('Y-m-d'),
        ];
        $array = array_merge($array, $arr);

        $valuesPairs = '';
        foreach (array_keys($array) as $key) {
            if ($key !== 'id') {
                $valuesPairs .= "`$key`=:$key, ";
            }
        }

        if ($valuesPairs === '') {
            return [];
        }

        $valuesPairs = rtrim($valuesPairs, ', ');

        $sql = "UPDATE $this->table SET $valuesPairs WHERE `id`=:id";

        return $this->pdo->query($sql, $array);


    }

    /**
     * @param int $id
     * @return array
     */
    public function delete(int $id): array
    {
        $sql = "DELETE FROM $this->table WHERE id = $id";
        return $this->pdo->query($sql);
    }

    /**
     * @param string $param
     * @param string $order
     * @param int $limit
     * @return array
     */
    public function order(string $param, string $order, int $limit = 0): array
    {
        $sql = "SELECT *  FROM $this->table WHERE 1 ORDER BY `$param` $order" . ($limit ? " LIMIT $limit" : '');
        return $this->pdo->query($sql);
    }

    /**
     * @param $search
     * @param $operator
     * @param $id
     * @return array
     */
    public function whereOne($search, $operator, $id): array
    {
        self::where($search, $operator, $id);
        $sql = "SELECT * FROM $this->table WHERE  $search, $operator, '$id' LIMIT 1";
        return $this->pdo->query($sql);
    }

}