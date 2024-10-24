<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class menu extends Model
{
    use HasFactory;

    protected $table = 'menu';
    protected $primaryKey = 'menuid';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = ['menuid', 'menu_nev','view','menu_title','parent','role'];
    protected function casts(): array
    {
        return [
            'menu_nev' => 'string',
            'view' => 'string',
            'role' => 'string',
            'menu_title' => 'string',
            'parent' => 'integer',
        ];
    }
}
