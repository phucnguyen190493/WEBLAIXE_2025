<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblMedia extends Model
{
    //use HasFactory;

    protected $table = 'tblMedia';

    public $timestamps = false;

    protected $fillable = ['id', 'name', 'note'];
}
