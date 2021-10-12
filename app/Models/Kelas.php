<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table ='table_kelas';

    public function User()
    {
        return $this->hasMany(User::class);
    }

}
