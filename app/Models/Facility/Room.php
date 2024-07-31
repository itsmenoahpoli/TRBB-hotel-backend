<?php

namespace App\Models\Facilities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function room_photos() : HasMany
    {
        return $this->hasMany(\App\Models\Facility\RoomPhoto::class);
    }
}
