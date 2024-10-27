<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus';
    protected $primaryKey = 'menuid';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = ['menuid', 'menu_nev','view','menu_title','parent','role','active','menu_order'];
    protected function casts(): array
    {
        return [
            'menu_nev' => 'string',
            'view' => 'string',
            'role' => 'string',
            'menu_title' => 'string',
            'parent' => 'integer',
            'menu_order' => 'integer',
            'active' => 'integer',

        ];
    }
    public function children()
    {
        return $this->hasMany(self::class, 'parent');
    }
}
