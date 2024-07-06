<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class arriendoauto extends Model
{
    use HasFactory;
    protected $table = 'arriendo_auto';
    public $timestamps = false;

    public function auto(): BelongsTo
    {
        return $this->belongsTo(auto::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
