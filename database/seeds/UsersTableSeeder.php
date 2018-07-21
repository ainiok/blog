<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $password = Hash::make('123456');
        User::create([
            'name' => 'admin',
            'nickname'=>'admin',
            'email' => 'admin@qq.com',
            'password' => $password,
            'status' => true,
            'is_admin' => true,
            'confirm_code' => str_random(64),
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);
        factory(User::class,10)->create();
    }
}
