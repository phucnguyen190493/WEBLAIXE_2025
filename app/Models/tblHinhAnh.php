<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblHinhAnh extends Model
{
    //use HasFactory;

    protected $table = 'tblHinhAnh';

    public $timestamps = false;

    protected $fillable = ['id', 'CauHoiId', 'stt', 'MediaId', 'noidung', 'active'];

    public function Media()
    {
        return $this->belongsTo(tblMedia::class, 'MediaId', 'id');
    }
    public function CauHoi()
    {
        return $this->belongsTo(tblCauHoi::class, 'CauHoiId', 'id');
    }
}
