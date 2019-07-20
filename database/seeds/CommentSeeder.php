<?php

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Comment::create([
            "username"=>"Ashraf Elsayed",
            "post_id"=>1,
            "content"=>"This is comment for testing",
        ]);
    }
}
