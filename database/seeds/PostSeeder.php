<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Post::create([
            "title"=>"This is title for my post",
            "body"=>"Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at",
            "category_id"=>1,
            "user_id"=>1,
            "slug"=>\Illuminate\Support\Str::slug("This is title for my post"),
            "image"=>config("defaults.image"),
        ]);
    }
}
