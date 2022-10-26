<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Models\Writer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([ 'username'=>'luk3v', 'email'=>'luke.vanhaezebrouck@gmail.com', 'password'=>'password' ]);

        $technology = Category::create(['slug'=>'technology', 'name'=>'Technology']);
        $business = Category::create(['slug'=>'business', 'name'=>'Business']);
        $health = Category::create(['slug'=>'health', 'name'=>'Health']);

        $rytr = Writer::create(['name'=>'Rytr', 'slug'=>'rytr', 'url'=>'https://rytr.me/', 'avatar'=>'writer_avatars/rytr.png']);

        Post::factory()->create([ 'writer_id'=>$rytr->id ]);
    }
}
