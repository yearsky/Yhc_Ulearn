<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menupengunjung extends Model
{
    protected $table = 'menupengunjung';

    public function submenupengunjung()
    {
        return $this->hasMany('App\Models\Submenu','id_menu','id');
    }
}
