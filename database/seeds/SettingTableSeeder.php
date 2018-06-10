<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
            'site_name' => "Graduation Project",
            'address' => 'Egypt,Assuit University',
            'contact_number' => '0123456789',
            'contact_email' => 'info@graduationproject.com'
        ]);
    }
}
