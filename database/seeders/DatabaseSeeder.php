<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Admin User',
             'email' => 'admin@admin.com',
         ]);

    }
}

/*
INSERT INTO `courses` (`id`, `title`, `created_at`, `updated_at`) VALUES ('1', 'Laravel Pennant Overview', '2023-03-26 19:19:43', '2023-03-26 19:19:43');
INSERT INTO `courses` (`id`, `title`, `created_at`, `updated_at`) VALUES ('2', 'Eloquent: The Expert Level', '2023-03-26 19:52:54', '2023-03-26 19:52:54');
INSERT INTO `lessons` (`id`, `course_id`, `title`, `created_at`, `updated_at`) VALUES ('1', '1', 'What is Pennant: First Demo', NULL, NULL);
INSERT INTO `lessons` (`id`, `course_id`, `title`, `created_at`, `updated_at`) VALUES ('2', '1', 'How It Works Under The Hood', NULL, NULL);
INSERT INTO `lessons` (`id`, `course_id`, `title`, `created_at`, `updated_at`) VALUES ('3', '1', 'Three More Use-Cases of Pennant', NULL, NULL);
INSERT INTO `lessons` (`id`, `course_id`, `title`, `created_at`, `updated_at`) VALUES ('4', '2', 'php artisan make:model - Less-Known Possible Options', NULL, NULL);
INSERT INTO `lessons` (`id`, `course_id`, `title`, `created_at`, `updated_at`) VALUES ('5', '2', 'Singular or Plural Models? What about multiple words?', NULL, NULL);
INSERT INTO `lessons` (`id`, `course_id`, `title`, `created_at`, `updated_at`) VALUES ('6', '1', 'Class Based Features', NULL, NULL);
INSERT INTO `lessons` (`id`, `course_id`, `title`, `created_at`, `updated_at`) VALUES ('8', '1', 'Customize Inactive Feature Response', '2023-03-28 14:01:55', '2023-03-30 11:25:16');
INSERT INTO `lessons` (`id`, `course_id`, `title`, `created_at`, `updated_at`) VALUES ('9', '2', 'Saving a Model: $fillable or $guarded?', '2023-03-29 18:01:28', '2023-03-29 18:01:28');
*/
