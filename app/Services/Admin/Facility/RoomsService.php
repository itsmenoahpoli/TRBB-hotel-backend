<?php

namespace App\Services\Admin\Inventory;

use App\Models\Facilities\Room;
use App\Repositories\Facility\RoomsRepository;

class InventorySuppliesService extends RoomsRepository
{
    public function __construct(Room $model)
    {
        parent::__construct($model, ['room_photos'], []);
    }
}
