<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MedicalVisit extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'dog_id'
    ];

    protected $appends = [
        'dog_name'
    ];

    public function dog(): BelongsTo
    {
        return $this->belongsTo(Dog::class);
    }

    protected function dogName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->dog->name,
        );
    }
}
