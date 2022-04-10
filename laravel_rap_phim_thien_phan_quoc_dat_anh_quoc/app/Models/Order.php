<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'hoa_don';

    public function dichvu()
    {
        return $this->HasOne('App\Models\Service', 'id', 'dich_vu_id');
    }

    public function nhanvien()
    {
        return $this->HasOne('App\Models\Employee', 'id', 'nhan_vien_id');
    }
    public function vedat()
    {
        return $this->hasMany('App\Models\TicketBook', 'id', 'hoa_don_id');
    }
}
