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
            'email' => 'admin@dev.com',
            'password' => Hash::make('admin1234'),
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
        $admin->attachRole('admin');

        Model::reguard();
    }
}
