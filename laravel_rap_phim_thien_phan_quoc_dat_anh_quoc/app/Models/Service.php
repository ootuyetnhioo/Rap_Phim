<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'dich_vu';

    public function loaidichvu()
    {
        return $this->hasOne('App\Models\KindOfService', 'id', 'loai_dich_vu_id');
    }
}
