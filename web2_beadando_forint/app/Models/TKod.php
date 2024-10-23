<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TKod extends Model
{
    use HasFactory;

    protected $table = 'tkod';
    protected $primaryKey = ['ermeid','tervezoid'];
    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = ['ermeid', 'tervezoid'];
}
