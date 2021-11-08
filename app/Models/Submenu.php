<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    protected $table = 'submenu';

    public function menupengunjung()
    {
        return $this->hasOne('App\Models\Menupengunjung','id','id_menu');
    }
}
