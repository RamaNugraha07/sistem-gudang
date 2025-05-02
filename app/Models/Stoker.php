<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Stoker extends Model
{
    protected $table = 'md_user';
    protected $primaryKey = 'id_user';
    public $timestamps = false;

    public static function check_login($data)
    {
        return DB::selectOne("
            SELECT * FROM md_user 
            WHERE email = ? AND password = ?
            ", [
            $data['email'],
            $data['password']
        ]);
    }

    public function mutasis()
    {
        return $this->hasMany(Mutasi::class);
    }
}
