<?php

namespace App\Repositories\Inventory;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\BaseRepository;

class SuppliesRepository extends BaseRepository
{
    public function __construct(
        private readonly Model $model,
        private readonly array $relationships = [],
        private readonly array $shownRelationshipsInList = []

    )
    {
        parent::__construct($model, $relationships, $shownRelationshipsInList);
    }
}
