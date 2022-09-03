<?php
namespace Pandacode\Logger\Methods;

interface MethodInterfaceFactory
{
    public function writeLog($level, $message);
}