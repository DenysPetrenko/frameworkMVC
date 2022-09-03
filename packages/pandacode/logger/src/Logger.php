<?php

namespace Pandacode\Logger;
use Pandacode\Logger\Methods\DbClassFactory;

/** class Logger
 * fabrick method for insert logs
 * /* @ author Denys Petrenko < Des . Petrenko @ gmail . com >
 */


class Logger extends Singleton
{
    /**
     * @param $context
     */
    public static function log($context)
    {
        self::method(require 'config/log.php')->writeLog(__FUNCTION__, $context);
        $log = static::getInstance();

    }

    /**
     * @param $context
     */
    public static function error($context)
    {
        self::method(require 'config/log.php')->writeLog(__FUNCTION__, $context);

    }

    /**
     * @param $class
     * @return mixed|void
     */
    public static function method($class)
    {
        $listenerClass = 'Pandacode\\Logger\\Methods\\' . ucfirst($class) . 'ClassFactory';

        if (class_exists($listenerClass)) {
            $log = static::getInstance();
            return $listenerClass::getInstance();
        } else {
            echo $listenerClass;
            exit('This class not exist' . ucfirst($class) . 'ClassFactory');
        }


    }
}