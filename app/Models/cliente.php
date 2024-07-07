<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'clientes';

    protected $primaryKey = 'rut';

    protected $fillable = [
        'rut',
        'nombre',
    ];

    protected $dates = ['deleted_at'];
    
    /* arriendos NO CAMBIAR */
    public function arriendos():HasMany
    {
        return $this->hasMany(arriendoauto::class, 'rut_cliente');
    }

}
