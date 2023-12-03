<?php

namespace App\Actions;

use App\Http\Requests\SaveProductRequest;

class getFormData
{
    public static function handle(SaveProductRequest $request) {
          $form_data = $request->safe()->except(['key', 'value']);
          if ($request->has(['key', 'value'])) {
              $key =  $request->safe()->only('key')['key'];
              $value =  $request->safe()->only('value')['value'];
              if (count($key)==count($value)) {
                  $arr_data = [];
                  for ($i = 0; $i < count($key); $i++) {
                      $arr_data[$key[$i]] = $value[$i];
                  }
                  $form_data['data'] =$arr_data;
              }else {
                  return false;
              }
          }else {$form_data['data'] =null;}
          return $form_data;
    }
}
