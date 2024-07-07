<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class auto extends Model
{
    use HasFactory;
    protected $table = 'auto';
    public $timestamps = false;


    public function arriendo()
    {
        return $this->hasMany(arriendoauto::class);
    }

    public function tipoauto()
    {
        return $this->belongsTo(tipoauto::class,'tipo_auto','id');
    }

    public function marca()
    {
        return $this->belongsTo(marca::class,'marca');
    }
}
