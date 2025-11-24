<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblMoPhong extends Model
{
    //use HasFactory;

    protected $table = 'tblMoPhong';

    public $timestamps = false;

    protected $fillable = ['id', 'stt', 'video', 'diem5', 'diem4', 'diem3', 'diem2', 'diem1', 'diem1end', 'active'];
}
