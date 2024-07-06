<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class marca extends Model
{
    use HasFactory;
    protected $table = 'marca';
    public $timestamps = false;

    public function auto() : HasMany
    {
        return $this->hasMany(auto::class);
    }

}
