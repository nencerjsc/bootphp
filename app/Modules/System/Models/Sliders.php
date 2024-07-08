<?php
namespace App\Modules\System\Models;

use Illuminate\Database\Eloquent\Model;

class Sliders extends Model {

  protected $table = 'sliders';
  protected $fillable = [
          'slider_name',
          'slider_image',
          'slider_text',
          'slider_url',
          'slider_btn_text',
          'slider_btn_url',
          'sort_order',
          'status',
          'lang',
          'app',
  ];
}
