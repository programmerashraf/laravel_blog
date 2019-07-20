<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	"name"		=> "Ashraf Elsayed",
        	"email"		=> "ashrafreelancer@gmail.com",
        	"password"	=> bcrypt("ashraf"),
        	"bio"       => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem facilis sunt repellendus excepturi beatae porro debitis voluptate nulla quo veniam fuga sit molestias minus.",
        	"admin"		=> true,
        ]);
    }
}
