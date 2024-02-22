<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $user = new User;
            $user ->name = "Syalom Kristian";
            $user -> email = "admin@gmail.com";//ganti pake emailmu
            $user -> password = bcrypt("1234");//passwordnya 1234
            $user ->jabatan = "admin";
            $user ->role = "0";//kita akan membuat akun atau users in dengan role admin
            $user->save();

    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
    
}
