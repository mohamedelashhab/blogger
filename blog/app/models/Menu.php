<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['title', 'page_id'];

    public function page()
    {
        return $this->belongsTo('App\models\Page');
    }
}
