<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->name = 'André Maia';
        $user->email = 'afmc89@gmail.com';
        $user->password = bcrypt('123456');
        $user->save();
       
        $user = new \App\User();
        $user->name = 'Cátia Coelho';
        $user->email = 'catiacoelho89@gmail.com';
        $user->password = bcrypt('123456');
        $user->save();
    }
}
