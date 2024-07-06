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


    public function arriendo(): HasMany
    {
        return $this->hasMany(arriendoauto::class);
    }
    public function marca(): BelongsTo
    {
        return $this->BelongsTo(marca::class);
    }
    public function tipoauto(): BelongsTo
    {
        return $this->BelongsTo(tipoauto::class);
    }
}
