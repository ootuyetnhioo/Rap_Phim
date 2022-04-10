<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'khuyen_mai';

    public function phim()
    {
        return $this->hasOne('App\Models\Film','id','phim_id');
    }
}
