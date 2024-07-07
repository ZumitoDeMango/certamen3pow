<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';
    protected $primaryKey = 'rut';
    protected $keyType = 'string';
    public $timestamps = false;
    public $incrementing = false;

    public function arriendos():HasMany
    {
        return $this->hasMany(arriendoauto::class, 'rut_cliente');
    }

}
