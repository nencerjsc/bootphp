<?php

namespace App\Modules\System\Models;
use Illuminate\Database\Eloquent\Model;
use DB;

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


}
