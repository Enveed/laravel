<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        if ($this->command->confirm('Do you want to refresh the database?', true)) {
            $this->command->call('migrate:refresh');
            $this->command->info('Database was refreshed!');
        }

        Cache::tags(['blog-post'])->flush();
        // \App\Models\User::factory(10)->create();
        $this->call([
            UsersTableSeeder::class,
            BlogPostsTableSeeder::class,
            CommentsTableSeeder::class,
            TagsTableSeeder::class,
            BlogPostTagTableSeeder::class
        ]);
    }
}
