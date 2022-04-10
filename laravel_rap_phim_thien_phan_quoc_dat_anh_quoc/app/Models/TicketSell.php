<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketSell extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 've_ban';

    public function khachhang()
    {
        return $this->hasOne('App\Models\CustomerModel','id','khach_hang_id');
    }
}
