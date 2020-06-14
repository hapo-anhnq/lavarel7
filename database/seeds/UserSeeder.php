<?php

use App\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Faker\Generator as Faker; 

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
            'name' => 'member',
            'email' => 'member@gmail.com',
            'password' => Hash::make('password'),
            'avatar' => 'user8-128x128.jpg',
            'gender' => 'male',
            'birthday' => new Carbon('1998-10-23'),
            'phone_number' => '0397833777',
            'department' => 'management',
            'role' => 'member'
        ]);

        User::create([
            'name' => 'member 1',
            'email' => 'member1@gmail.com',
            'password' => Hash::make('password'),
            'avatar' => 'user8-128x128.jpg',
            'gender' => 'male',
            'birthday' => new Carbon('1990-10-1'),
            'phone_number' => '0397833777',
            'department' => 'management',
            'role' => 'member'
        ]);

        User::create([
            'name' => 'member 2',
            'email' => 'member2@gmail.com',
            'password' => Hash::make('password'),
            'avatar' => 'user3-128x128.jpg',
            'gender' => 'female',
            'birthday' => new Carbon('1995-10-2'),
            'phone_number' => '0397833572',
            'department' => 'internship',
            'role' => 'member'
        ]);

        User::create([
            'name' => 'member 3',
            'email' => 'member3@gmail.com',
            'password' => Hash::make('password'),
            'avatar' => 'user4-128x128.jpg',
            'gender' => 'male',
            'birthday' => new Carbon('1998-10-23'),
            'phone_number' => '01234567897',
            'department' => 'internship',
            'role' => 'member'
        ]);

        User::create([
            'name' => 'member 4',
            'email' => 'member4@gmail.com',
            'password' => Hash::make('password'),
            'avatar' => 'user5-128x128.jpg',
            'gender' => 'male',
            'birthday' => new Carbon('1998-10-23'),
            'phone_number' => '09873345671',
            'department' => 'internship',
            'role' => 'member'
        ]);

        User::create([
            'name' => 'member 5',
            'email' => 'member5@gmail.com',
            'password' => Hash::make('password'),
            'avatar' => 'user6-128x128.jpg',
            'gender' => 'male',
            'birthday' => new Carbon('1998-10-23'),
            'phone_number' => '0397833777',
            'department' => 'internship',
            'role' => 'member'
        ]);
    }
}
