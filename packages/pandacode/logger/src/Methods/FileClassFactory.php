<?php
namespace Pandacode\Logger\Methods;

use Pandacode\Logger\Singleton;

/** Log insert to File
 * class FileClassFactory
 * /* @ author Denys Petrenko < Des . Petrenko @ gmail . com >
 */

class FileClassFactory extends Singleton implements MethodInterfaceFactory
{
    /**
     * @var false|resource
     */
    private $handle;

    protected function __construct()
    {
        $file = '/storage/logs' . date("Y-m-d") .  'txt';
        $this->handle = fopen($_SERVER["DOCUMENT_ROOT"] . $file, 'a+');
    }

    /**
     * @param $level
     * @param $message
     */
    public function writeLog($level, $message)
    {
        $date = date("Y-m-d");
        $str = $level . '|' . $date . ' ' . print_r($message, true) . "\r\n";
        fwrite($this->handle, $str);
    }
}