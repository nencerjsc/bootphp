<?php

namespace App\Modules\Currency\Models;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Helpers\SimpleHtmlDom;
class Currencies extends Model
{
    protected $fillable = [
       'name','code','value', 'symbol_left','symbol_right', 'seperator','decimal', 'status','fiat', 'default', 'checksum', 'hide','sort', 'wallet', 'wallet_admin_balance'
    ];

    static function getCode($currency)
    {
    	$code = DB::table('currencies')->find($currency);
    	return $code->code;
    }


    public static function priceVietcombank($currency_code){
        $date = date('d/m/Y');
        stream_context_set_default([
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
            ]
        ]);
        $simplehtml = new SimpleHtmlDom;
        try{
            $url = 'https://portal.vietcombank.com.vn/UserControls/TVPortal.TyGia/pListTyGia.aspx?txttungay='.$date.'&BacrhID=1&isEn=False';
            $html = $simplehtml->file_get_html($url);
            $array = null;
            if($html) {
                $table = $html->find('#ctl00_Content_ExrateView',0);
                if ($table){
                    $tr = $table->find('tr');
                    unset($tr[0]);
                    unset($tr[1]);
                    $array = array();
                    foreach ($tr as $key => $value){
                        $code = $value->find('td',1)->innertext;
                        $array[$code]['buy'] = floatval(str_replace(",","",trim($value->find('td',2)->innertext)));
                        $array[$code]['sell'] = floatval(str_replace(",","",trim($value->find('td',4)->innertext)));
                    }
                }
                return $array[$currency_code];
            }else{
                return null;
            }

        }catch(\Exception $e){
            return null;
        }
    }

}