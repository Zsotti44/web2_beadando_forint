<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Erme extends Model
{
    use HasFactory;

    protected $table = 'erme';
    protected $primaryKey = 'ermeid';
    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = ['cimlet', 'tomeg', 'darab', 'kiadas', 'bevonas'];

    public function anyagok()
    {
        return $this->belongsToMany(Anyag::class, 'akod', 'ermeid', 'femid');
    }

    public function tervezok()
    {
        return $this->belongsToMany(Tervezo::class, 'tkod', 'ermeid', 'tervezoid');
    }
}
