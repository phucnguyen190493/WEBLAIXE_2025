<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblBoCauHoi extends Model
{
    //use HasFactory;

    protected $table = 'tblBoCauHoi';

    public $timestamps = false;

    protected $fillable = ['id', 'ten', 'BangLaiId', 'stt', 'active'];

    public function BangLai()
    {
        return $this->belongsTo(tblLoaiBangLai::class, 'BangLaiId', 'id');
    }
}
