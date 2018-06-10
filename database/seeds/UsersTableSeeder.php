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
        $user = App\User::create([
            'name' => 'mostafa medht',
            'email' => 'mos@gmail.com',
            'password' => bcrypt('admin'),
            'admin' => 1
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/1.png',
            'about' => 'Loarm ipusm dolor site amet ,Loarm ipusm dolor site amet ,Loarm ipusm dolor site amet ,Loarm ipusm dolor site amet ',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com'
        ]);
    }
}
