<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        $admin = User::create([
            'name' => 'admin',
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@dev.com',
            'phone' => '1234567',
            'address' => 'Demo addess, street',
            'city' => 'Demo city',
            'country_id' => 1,
            'state_id' => 1,
            'zipcode' => '5555555',
            'terms' => 1,
            'password' => Hash::make('admin1234'),
            'email_verified_at' => \Carbon\Carbon::now(),
        ]);

        $admin->attachRole('admin');

        Model::reguard();
    }
}
