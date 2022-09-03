<?php

namespace Pandacode\Logger\Methods;


use Pandacode\Logger\Singleton;

/** class DbClassFactory, insert log to DB
 * /* @ author Denys Petrenko < Des . Petrenko @ gmail . com >
 */

class DbClassFactory extends Singleton implements MethodInterfaceFactory
{
    /**
     * @var \PDO
     */
    private $connect;

       protected function __construct()
    {
        $this->connect = new \PDO('mysql:host=nix_2_mysql; dbname = logs', 'myapp', 'myapp');
    }

    /**
     * @param $level
     * @param $message
     */
    public function writeLog($level, $message)
    {
        $datetime = date("Y-m-d H:i:s");
        $message = trim(htmlspecialchars($message));
        $level = __FUNCTION__;
        $http_code = http_response_code();
        $log = static::getInstance();

        $log->connect->query("INSERT INTO  nix2.logs (datetime, level, message, http_code) VALUES ('$datetime', '$level', '$message', '$http_code')");

    }

}

