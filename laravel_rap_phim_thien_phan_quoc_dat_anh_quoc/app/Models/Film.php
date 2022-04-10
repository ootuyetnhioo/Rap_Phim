<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $table = 'phim';
    public $timestamps = false;

    public function loaiphim()
    {
        return $this->hasOne('App\Models\kindOfMovie','id','loai_phim_id');
    }
}
