<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\HasMany;

class cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';
    public $timestamps = false;
    protected $primaryKey = 'rut';
    protected $keyType = 'string';

    protected $fillable = [
        'rut',
        'nombre',
    ];
    
    /* arriendos NO CAMBIAR */
    public function arriendos():HasMany
    {
        return $this->hasMany(arriendoauto::class, 'rut_cliente');
    }

}
