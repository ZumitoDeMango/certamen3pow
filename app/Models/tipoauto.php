<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class tipoauto extends Model
{
    use HasFactory;
    protected $table = 'tipo_auto';
    public $timestamps = false;

    public function auto() : HasMany
    {
        return $this->hasMany(auto::class);
    }

}
