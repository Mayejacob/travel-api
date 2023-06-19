<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Travel extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = ['is_public','slug','name','description','number_of_days'];
    // public function numberOfNights()
    // {
    //     return Attribute::make(
    //         get: fn ($value, $attributes) => $attributes['number_of_days'] - 1
    //     );
    // }
    public function tours()
    {
        return $this->hasMany(Tour::class);
    }
    public function getNumberOfNightsAttribute()
    {
        return $this->number_of_days - 1;
    }
}

 