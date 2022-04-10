<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketBook extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 've_dat';

    public function ghe()
    {
        return $this->hasOne('App\Models\Seat', 'id', 'ghe_id');
    }

    public function nhanvien()
    {
        return $this->hasOne('App\Models\Employee', 'id', 'nhan_vien_id');
    }
     public function veban()
     {
         return $this->hasOne('App\Models\TicketSell','id','ve_ban_id');
     }
}
