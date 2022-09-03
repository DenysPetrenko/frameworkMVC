<?php
namespace Pandacode\Logger;
class Singleton
{
    /**
     * @var array
     */
    private static array $instances = [];

    protected function __construct()
    {

    }

    protected function __clone(): void
    {
    }

    /**
     * @return mixed|static
     */
    public static function getInstance()
    {
        $class = static::class;
        if (!isset(self::$instances[$class])) {
            self::$instances[$class] = new static();
        }
        return self::$instances[$class];
    }
}