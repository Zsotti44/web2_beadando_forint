<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AKod extends Model
{
    use HasFactory;

    protected $table = 'akod';
    protected $primaryKey = ['ermeid','femid'];
    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = ['femid', 'ermeid'];
}
