<?php

namespace Pandacode\Logger\Methods;

use Pandacode\Logger\Singleton;

/* @ author Denys Petrenko < Des . Petrenko @ gmail . com >
 */
class TelegramClassFactory extends Singleton implements MethodInterfaceFactory
{
    protected $botToken = '5560371108:AAGXTtPDefLxND084USNQ6PbBp0Nsv1Zzaw';
    protected $chat_id = '714863819';

    protected function __construct()
    {
    }

    /**
     * @param $level
     * @param $message
     */
    public function writeLog($level, $message)
    {

        $date = date("Y-m-d H:i:s");
        $str = $level . '|' . $date . ' ' . print_r($message, true) . "\r\n";
        $params = [
            'text' => $str,
            'chat_id' => $this->chat_id,

        ];
        $send = file_get_contents('https://api.telegram.org/bot' . $this->botToken . '/sendMessage?' . http_build_query($params));


        $ch = curl_init('https://api.telegram.org/bot' . $this->botToken . '/sendMessage');

    }
}