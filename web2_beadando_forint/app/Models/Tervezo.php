<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tervezo extends Model
{
    use HasFactory;

    protected $table = 'tervezo';
    protected $primaryKey = 'tid';
    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = ['tid', 'nev'];
}
