<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'ghe_ngoi';

    public function phongchieu()
    {
        return $this->hasOne('App\Models\CinemaRoom', 'id', 'phong_chieu_id');
    }
}
