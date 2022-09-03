<?php

namespace Petrenko\Framework;


use PDO;
use Pandacode\Logger\Logger;

/* @ author Denys Petrenko < Des . Petrenko @ gmail . com >
 * class Db
 */
class Db
{
    protected object $pdo;
    protected static $instance;

    protected function __construct()
    {
        $db = require ROOT . '/config/database.php';
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
        $this->pdo = new PDO($db['dns'], $db['username'], $db['password'], $options);
    }

    protected function __clone(): void
    {
    }

    /**
     * @return mixed
     */
    public static function getInstance(): Db
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @param $sql
     * @param array $param
     * @return array
     */
    public function query($sql, array $param = []): array
    {
        $PDOStatement = $this->pdo->prepare($sql);

        $result = $PDOStatement->execute($param);

        if ($result !== false) {
            return $PDOStatement->fetchAll();
        }

        echo 'ПО данному запросу ничего не нашли';
        return [];
    }


}
