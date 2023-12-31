<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Breed extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function dogs(): BelongsToMany
    {
        return $this->belongsToMany(Dog::class);
    }
}
