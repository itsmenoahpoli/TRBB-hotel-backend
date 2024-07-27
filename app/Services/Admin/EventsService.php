<?php

namespace App\Services\Admin;

use App\Models\Events\Event;
use App\Repositories\Events\EventsRepository;
use App\Services\FilesService;

class EventsService extends EventsRepository
{
    public function __construct(
        private readonly Event $model,
    )
    {
        parent::__construct($model, [], []);
    }

    public function create($payload, $file = null)
    {
        $payload['banner_img'] = null;

        if ($file)
        {
            $path = $file->store('images/announcements', 'public');
            $payload['banner_img'] = FilesService::getImageFromStorage($path);
        }

        unset($payload['image']);

        return parent::create($payload);
    }
}
