<?php

namespace App\Filament\Resources\LessonResource\Pages;

use App\Filament\Resources\LessonResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateLesson extends CreateRecord
{
    protected static string $resource = LessonResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $path = explode('/', request()->fingerprint['path']);

        $data['course_id'] = $path[3];

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        $path = explode('/', request()->fingerprint['path']);

        return LessonResource::getUrl('lessons', ['record' => $path[3]]);
    }
}
