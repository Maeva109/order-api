<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        
        Author::factory(10)
            ->hasBooks(5)
            ->create();

        $books = Book::all()->each(function ($book) {
            $book->users()->attach(
                \App\Models\User::inRandomOrder()->take(rand(1, 5))->pluck('id')->toArray(),
                [
                    'borrowed_at' => now(),
                    'returned_at' => fake()->randomElement([null, fake()->optional()->dateTimeBetween('-1 year', 'now')]),
                ]
            );
        });
    }
}
