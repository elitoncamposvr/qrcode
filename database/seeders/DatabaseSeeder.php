<?php

namespace Database\Seeders;

use App\Http\Controllers\CodeFamilyController;
use App\Models\CodeClass;
use App\Models\CodeFamily;
use App\Models\CodeGroup;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('mIJu05e/00'),
        ]);

        CodeFamily::factory()->count(15)->create();

        CodeClass::factory()->count(15)->create();

        CodeGroup::factory()->count(15)->create();
    }
}
