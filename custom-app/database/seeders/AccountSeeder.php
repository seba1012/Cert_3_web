<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Account::create([
            'user' => config('account.user', 'admin'),
            'nombre' => config('account.name', 'admin'),
            'apellido' => config('account.last_name', 'admin'),
            'password' => Hash::make(config('account.password', 'password')),
            'perfil_id' => Profile::getIdByKey(Profile::PROFILE_ADMIN)
        ]);
    }
}
