<?php

namespace App\Services\Admin\Inventory;

use App\Models\Inventory\InventorySupply;
use App\Repositories\Inventory\SuppliesRepository;

class InventorySuppliesService extends SuppliesRepository
{
    public function __construct(InventorySupply $model)
    {
        parent::__construct($model, ['users'], []);
    }
}
