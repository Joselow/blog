<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        // Storage::deleteDirectory('public/posts');
        // Storage::makeDirectory('public/posts');

        $posts = Post::factory(20)->create();

        foreach ($posts as $post) {
            $images = Image::factory(3)->create([
                'idImageable' => $post->id,
                'typeImageable' => Post::class,
            ]);

            $mainImage = $images->random();
            $mainImage->update(['isMain' => true]);

            $post->tags()->attach([
                random_int(1, 4),
                random_int(5, 11),
            ]);
        }
    }
}
