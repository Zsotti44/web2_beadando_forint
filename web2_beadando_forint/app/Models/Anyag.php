<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Anyag extends Model
{
    use HasFactory;

    protected $table = 'anyag';
    protected $primaryKey = 'femid';
    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = ['femid', 'femnev'];
}
