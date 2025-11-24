<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblBoCauHoi_CauHoi extends Model
{
    //use HasFactory;

    protected $table = 'tblBoCauHoi_CauHoi';

    public $timestamps = false;

    protected $fillable = ['id', 'BoCauHoiId', 'CauHoiId', 'stt', 'active'];

    public function BoCauHoi(){
        return $this->belongsTo(tblBoCauHoi::class, 'BoCauHoiId', 'id');
    }

    public function CauHoi(){
        return $this->belongsTo(tblCauHoi::class, 'CauHoiId', 'id');
    }
}
