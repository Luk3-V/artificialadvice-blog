<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
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
        $user = User::factory()->create([ 'name'=>'John Doe' ]);

        $personal = Category::create(['slug'=>'personal', 'name'=>'Personal']);
        $work = Category::create(['slug'=>'work', 'name'=>'Work']);
        $hobby = Category::create(['slug'=>'hobby', 'name'=>'Hobby']);

        Post::factory(5)->create([ 'user_id'=>$user->id, 'category_id'=>$work->id ]);
        Post::factory(10)->create();

        Comment::factory(7)->create([ 'post_id'=>1 ]);
    }
}
