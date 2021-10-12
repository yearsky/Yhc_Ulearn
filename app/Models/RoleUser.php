<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table = 'role_user';
    public $timestamps = false;
    protected $guarded = array();

    public function user()
	{
		return $this->hasMany(User::class);
	}

    public function kelas()
    {
        return $this->belongsTo('App\Models\Kelas','kelas_id','id');
    }
}
