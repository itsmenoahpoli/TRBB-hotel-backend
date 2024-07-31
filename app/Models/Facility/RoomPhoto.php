<?php

namespace App\Models\Facility;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RoomPhoto extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function room() : BelongsTo
    {
        return $this->belongsTo(\App\Models\Facilities\Room::class);
    }
}
