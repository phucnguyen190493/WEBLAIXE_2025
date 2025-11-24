<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblCauHoiBangLai extends Model
{
    //use HasFactory;

    protected $table = 'tblCauHoiBangLai';

    public $timestamps = false;

    protected $fillable = ['id', 'CauHoiId', 'BangLaiId'];
    public function CauHoi(){
        return $this -> belongsTo(tblCauHoi::class, 'CauHoiId', 'id');
    }
    public function bangLai(){
        return $this -> belongsTo(tblLoaiBangLai::class, 'BangLaiId', 'id');
    }
}
