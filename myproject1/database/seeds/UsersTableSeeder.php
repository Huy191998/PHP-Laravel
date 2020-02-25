<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name'=>'huyadmin',
        	'isdelete'=>0,
            'role'=>1,
        	'password'=>Hash::make('123456'),
        	'remember_token'=>str_random(10),

        ]);
    }
}
//php artisan db:seed
