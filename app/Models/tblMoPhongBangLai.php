<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblMoPhongBangLai extends Model
{
    //use HasFactory;

    protected $table = 'tblMoPhongBangLai';

    public $timestamps = false;

    protected $fillable = ['id', 'MoPhongId', 'BangLaiId', 'stt'];

    public function MoPhong() 
    {
        return $this->belongsTo(tblMoPhong::class, 'MoPhongId', 'id');
    }
    public function BangLai()
    {
        return $this->belongsTo(tblLoaiBangLai::class, 'BangLaiId', 'id');
    }
}
