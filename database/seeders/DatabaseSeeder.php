<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create test users with explicit passwords
        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
        ]);

        // Create courses
        Course::create([
            'title' => 'Web Development Fundamentals',
            'description' => 'Learn the basics of HTML, CSS, and JavaScript to build modern websites.',
            'instructor' => 'John Smith',
            'duration' => '8 weeks',
            'price' => 99.99,
            'image_url' => 'https://via.placeholder.com/400x250/4285f4/ffffff?text=Web+Development',
        ]);

        Course::create([
            'title' => 'Python Programming',
            'description' => 'Master Python programming from beginner to advanced level.',
            'instructor' => 'Jane Doe',
            'duration' => '12 weeks',
            'price' => 149.99,
            'image_url' => 'https://via.placeholder.com/400x250/306998/ffffff?text=Python+Programming',
        ]);

        Course::create([
            'title' => 'Data Science with R',
            'description' => 'Learn data analysis and visualization using R programming language.',
            'instructor' => 'Dr. Mike Johnson',
            'duration' => '10 weeks',
            'price' => 199.99,
            'image_url' => 'https://via.placeholder.com/400x250/276dc3/ffffff?text=Data+Science+R',
        ]);

        Course::create([
            'title' => 'Mobile App Development',
            'description' => 'Build cross-platform mobile applications using React Native.',
            'instructor' => 'Sarah Wilson',
            'duration' => '14 weeks',
            'price' => 249.99,
            'image_url' => 'https://via.placeholder.com/400x250/61dafb/000000?text=Mobile+Apps',
        ]);
    }
}
