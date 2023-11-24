<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Dog extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'born_date',
        'size',
    ];

    public function breeds(): BelongsToMany
    {
        return $this->belongsToMany(Breed::class);
    }

    public function colors(): BelongsToMany
    {
        return $this->belongsToMany(Color::class);
    }
}
