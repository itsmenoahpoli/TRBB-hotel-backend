<?php

namespace App\Services\Admin;

use App\Models\Announcements\Announcement;
use App\Repositories\Announcements\AnnouncementsRepository;
use App\Services\FilesService;

class AnnouncementsService extends AnnouncementsRepository
{
    public function __construct(
        private readonly Announcement $model
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
