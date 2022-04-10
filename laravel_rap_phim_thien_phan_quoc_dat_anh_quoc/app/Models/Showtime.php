<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    protected $table = 'suat_chieu';
    public $timestamps = false;

    public function phim()
    {
        return $this->hasOne('App\Models\Film','id','phim_id');
    }
}
