<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable=['option_name', 'option_value'];


    public static function setOption($optionName, $optionValue)
    {
        $model = self::where("option_name", '=', $optionName)->first();
        if(empty($model)){
            self::firstOrCreate(['option_name'=>$optionName, 'option_value'=>$optionValue]);
        }else{
            $model->option_name = $optionName;
            $model->option_value = $optionValue;
            $model->save();
        }
        return true;
    }

    public static function getOption($optionName)
    {
        $option = self::where('option_name', '=', $optionName)->first();
        return !empty($option) ? $option->option_value: null;
    }
}
