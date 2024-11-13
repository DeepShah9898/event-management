<?php

// database/seeders/SettingsSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        Setting::updateOrCreate(
            ['key' => 'app_name'],
            ['value' => 'Event Manager']
        );
        
        Setting::updateOrCreate(
            ['key' => 'app_email'],
            ['value' => 'support@eventmanager.com']
        );
        
        Setting::updateOrCreate(
            ['key' => 'contact_number'],
            ['value' => '123-456-7890']
        );
        
        Setting::updateOrCreate(
            ['key' => 'address'],
            ['value' => '123 Event St, Event City']
        );
    }
}
