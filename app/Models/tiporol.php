<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class tiporol extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tipo_rol';

    public function user() : HasMany    
    {
        return $this->hasMany(User::class);
    }

}
