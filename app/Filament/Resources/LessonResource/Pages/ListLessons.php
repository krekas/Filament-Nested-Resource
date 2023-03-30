<?php

namespace App\Filament\Resources\LessonResource\Pages;

use App\Filament\Resources\LessonResource;
use App\Models\Course;
use Filament\Pages\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;
use App\Filament\Resources\CourseResource;

class ListLessons extends ListRecords
{
    protected static string $resource = LessonResource::class;

    public Course $course;

    public function mount(): void
    {
        parent::mount();

        $this->course = Course::findOrFail(request('record'));
    }

    protected function getActions(): array
    {
        return [
            CreateAction::make()
                ->url(fn (): string => LessonResource::getUrl('create', ['record' => request('record')])),
        ];
    }

    protected function getBreadcrumbs(): array
    {
        $resource = static::getResource();

        $breadcrumbs = [
            CourseResource::getUrl() => 'Courses',
            '#' => $this->course->title,
            $resource::getUrl('lessons', ['record' => request('record')]) => $resource::getBreadcrumb(),
        ];

        $breadcrumbs[] = $this->getBreadcrumb();

        return $breadcrumbs;
    }

    protected function getSubheading(): string|Htmlable|null
    {
        return 'Viewing lessons for course: ' . $this->course->title;
    }
}
