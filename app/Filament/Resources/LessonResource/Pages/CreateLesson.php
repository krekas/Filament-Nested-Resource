<?php

namespace App\Filament\Resources\LessonResource\Pages;

use App\Models\Course;
use App\Filament\Resources\LessonResource;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\CourseResource;

class CreateLesson extends CreateRecord
{
    protected static string $resource = LessonResource::class;

    public Course $course;

    public function mount(): void
    {
        parent::mount();

        $this->course = Course::findOrFail(request('record'));
    }

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

    protected function getBreadcrumbs(): array
    {
        $resource = static::getResource();

        $breadcrumbs = [
            CourseResource::getUrl() => 'Courses',
            '#' => $this->course->title,
            $resource::getUrl('lessons', ['record' => $this->course]) => $resource::getBreadcrumb(),
        ];

        $breadcrumbs[] = $this->getBreadcrumb();

        return $breadcrumbs;
    }
}
