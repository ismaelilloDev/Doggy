<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;

class Dog extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'size',
        'image',
        'color'
    ];

    protected $appends = [
        'breed_list'
    ];

    public function breeds(): BelongsToMany
    {
        return $this->belongsToMany(Breed::class);
    }

    public function scopeSearch($query, $searchTerm)
    {
        return $query->where('name', 'like', '%' . $searchTerm . '%');
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn (string | null $value) => $value? Storage::url($value): Storage::url('dog.png'),
        );
    }

    protected function breedList(): Attribute
    {
        return Attribute::make(
            get: fn () => collect($this->breeds)->pluck('name')->join(', '),
        );
    }
}
