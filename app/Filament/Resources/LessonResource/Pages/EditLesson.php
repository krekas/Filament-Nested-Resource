<?php

namespace App\Filament\Resources\LessonResource\Pages;

use App\Models\Lesson;
use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\LessonResource;
use Filament\Pages\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\CourseResource;

class EditLesson extends EditRecord
{
    protected static string $resource = LessonResource::class;

    public Course $course;

    protected function getActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function resolveRecord($key): Model
    {
        $lesson = Lesson::findOrFail($key);

        $this->course = $lesson->course;

        return $lesson;
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    protected function getBreadcrumbs(): array
    {
        $resource = static::getResource();

        $breadcrumbs = [
            CourseResource::getUrl() => 'Courses',
            '#' => $this->course->title,
            $resource::getUrl('lessons', ['record' => $this->course]) => $resource::getBreadcrumb(),
            $resource::getUrl('edit', ['record' => $this->getRecord()]) => $this->getRecordTitle(),
        ];

        $breadcrumbs[] = $this->getBreadcrumb();

        return $breadcrumbs;
    }
}
