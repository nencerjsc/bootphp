<?php

namespace App\Modules\Frontend\Controllers;

use App\Helpers\CurlHelper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Log;
use Cache;


class TelegramController extends FrontendController
{

    public function webhook(Request $request)
    {

        Log::info(['telegram' => $request->all()]);
        $BOT_TOKEN = getSiteInfo('telegram_token');
        $update = $request->all();
        if ($BOT_TOKEN && isset($update["message"]["chat"]["id"]) && isset($update["message"]["text"])) {
            $chatId = $update["message"]["chat"]["id"];
            $message = explode(" ",$update["message"]["text"]);

            ///Lấy mã group ID
            if (isset($message[0]) && $message[0] == '/group') {
                $content = "Mã nhóm là: $chatId \n";
                $this->sendMessage($BOT_TOKEN, $chatId, $content);
            }

        }

    }


    public function sendMessage($BOT_TOKEN, $chat_id, $text)
    {
        $param = [
            'chat_id' => $chat_id,
            'text' => $text,
        ];
        $this->command('sendMessage', $BOT_TOKEN, $param);
    }

    public function command($method, $BOT_TOKEN, $data)
    {

        $url = "https://api.telegram.org/bot$BOT_TOKEN/$method";
        if (!$curld = curl_init()) {
            exit;
        }
        curl_setopt($curld, CURLOPT_POST, true);
        curl_setopt($curld, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curld, CURLOPT_URL, $url);
        curl_setopt($curld, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($curld);
        curl_close($curld);
        return $output;
    }

    public function setWebhook(){
        $BOT_TOKEN = getSiteInfo('telegram_token');
        if($BOT_TOKEN){
            $url = "https://api.telegram.org/bot".$BOT_TOKEN."/setWebhook?url=".url('front.telegram.api');
            $result = CurlHelper::curl_get($url);
            return $result;
        }
    }

    public function getChatID(){
        $BOT_TOKEN = getSiteInfo('telegram_token');
        if($BOT_TOKEN){
            $url = "https://api.telegram.org/bot".$BOT_TOKEN."/getUpdates";
            $result = CurlHelper::curl_get($url);
            dd($result);
        }
    }

    public function testSend(){
        $BOT_TOKEN = getSiteInfo('telegram_token');
        $chat_id = getSiteInfo('telegram_chat_id');
        if($BOT_TOKEN && $chat_id){
            $content = "Test Telegram";
            $content .= "IT WORKS GREAT!";
            $this->sendMessage($BOT_TOKEN, $chat_id, $content);
        }

    }

}