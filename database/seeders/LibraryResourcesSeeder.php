<?php

namespace Database\Seeders;

use App\Models\LibraryResource;
use Illuminate\Database\Seeder;

class LibraryResourcesSeeder extends Seeder
{
    public function run()
    {
        // Sample library resources data
        $resources = [
            [
                'title' => 'Introduction to Machine Learning',
                'author' => 'John Smith',
                'description' => 'A comprehensive guide to machine learning concepts and algorithms.',
                'keywords' => 'machine learning, AI, algorithms, data science',
                'type' => 'book',
                'location' => 'Shelf A1',
                'file_path' => null
            ],
            [
                'title' => 'Web Development with Laravel',
                'author' => 'Jane Doe',
                'description' => 'Learn web development using the Laravel PHP framework.',
                'keywords' => 'laravel, php, web development, framework',
                'type' => 'book',
                'location' => 'Shelf B2',
                'file_path' => null
            ],
            // Add more sample data as needed
        ];

        // Insert data into the database
        foreach ($resources as $resource) {
            LibraryResource::create($resource);
        }
    }
}