<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblCauTraLoi extends Model
{
    //use HasFactory;

    protected $table = 'tblCauTraLoi';

    public $timestamps = false;

    protected $fillable = ['id', 'CauHoiId', 'stt', 'noidung', 'caudung', 'active'];

    public function CauHoi()
    {
        return $this->belongsTo(tblCauHoi::class, 'CauHoiId', 'id');
    }
}
